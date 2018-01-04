<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $userdata;

	public function __construct(){
   		parent::__construct();

   		$this->userdata = $this->session->userdata('userdata');
   		$this->load->library(array('form_validation','email'));
   		$this->load->model('Home_model');
  	}

	public function template($body, $data = array()){
		$a_page = array();
		
		if(!empty($this->session->userdata('userdata'))){	
			$data['userdata'] = $this->session->userdata('userdata');
			$data['fullname'] = $data['userdata']['user_fname'].' '.$data['userdata']['user_lname'];
		}

		$a_page['header']  = $this->load->view('template/template_header', $data,TRUE);
		$a_page['sidebar'] = $this->load->view('template/template_sidebar', $data,TRUE);
		$a_page['body']    = $this->load->view($body, $data,TRUE);
		$a_page['footer']  = $this->load->view('template/template_footer','',TRUE);

		$this->load->view('template/template_index', $a_page);
	}

	public function index()
	{
		$data = array();				

		if(!empty($this->session->userdata('userdata'))){			
			$this->template('dashboard', $data);	
		}else{
			if($_POST){
				$_POST['user_password'] = md5($_POST['user_password']);
				$_POST['user_status']	= 1;
				$login = $this->Home_model->login($_POST);				
				
				if(!$login){
					$data['msgClass'] = "error-msg-container";
					$data['msg'] 	  = "Username/Password not found or is inactive!";
				}else{
					$this->session->set_userdata('userdata', $login);
					redirect('/', 'refresh');
				}
			}

			$this->load->view('login', $data);	
		}
	}

	public function require_login(){
		if(empty($this->session->userdata('userdata'))){
			redirect('/', 'refresh');
		}
		
		//$this->session->sess_destroy();
		//print_r($this->session->userdata('userdata'));
	}

	public function register(){		
		$data = array();				

		//if form is submitted
		if($_POST){
			$this->form_validation->set_rules('user_fname', 'First Name', 'required');
			$this->form_validation->set_rules('user_lname', 'Last Name', 'required');
			$this->form_validation->set_rules('user_email', 'Email', 'required|callback_email_unique');
			$this->form_validation->set_rules('user_password', 'Password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[user_password]');

			if ($this->form_validation->run() == FALSE){
				$data['msgClass'] = "error-msg-container";
				$data['errors']   = validation_errors();
			}else{
				unset($_POST['confirm_password']);
				$_POST['user_password']   = md5($_POST['user_password']);
				$_POST['user_registered'] = date('Y-m-d');
				$insert = $this->Home_model->register($_POST);
				if($insert){
					//send email to user for verification
					$this->email->from('info@codeigniter.com', 'Custom Name');
					$this->email->to('kevinpoy07@gmail.com'); //sample
					//$this->email->cc('another@another-example.com');
					//$this->email->bcc('them@their-example.com');

					$this->email->subject('Email Test');
					$this->email->message('Testing the email class.');

					if($this->email->send()){
						$data['msgClass'] = "success-msg-container";
						$data['msg'] 	  = 'Successfully Registered! Please verify your email to start using this site!';
						
					}else{
						$data['msgClass'] = "error-msg-container";
						$data['msg'] 	  = "Failed to send email for verification. Please contact us!";	
					}

					unset($_POST);			
				}else{
					$data['msgClass'] = "error-msg-container";
					$data['msg'] 	  = "Failed to register. Try again!";
				}
			}

		}

		$this->load->view('register', $data);
	}

	//check if email already exists
	public function email_unique($email){
		$exists = $this->Home_model->checkEmail($email);	
		if($exists){			
			$this->form_validation->set_message('email_unique', 'Email already used.');					
			return false;
		}else{			
			return true;
		}
	}

	public function logout($userid){
		$logout = $this->Home_model->update_login_status($userid, 0);
		if($logout){
			$this->session->sess_destroy();
			redirect('/', 'refresh');
		}
	}

	public function profile(){
		$this->require_login();
		//$this->userdata
		$data = array();
		
		$profile = $this->Home_model->profile($this->userdata['user_id']);
		if($profile){
			//print_x($profile);
			$profile = populate_blank($profile);
			$data['profile'] = $profile;
		}

		if($this->input->is_ajax_request()){
			$this->load->view('update_profile', $data);
		}else{
			$this->template('profile', $data);	
		}		
	}

	public function fetch_email(){
		$this->require_login();
		$data = array();

		$email = $this->Home_model->fetch_email('user_email', $this->userdata['user_id']);
		$data['profile'] = $email;

		$this->load->view('update_credentials', $data);		
	}

	public function update_profile(){
		$data = array();
		if(!empty($_POST)){
			$update = $this->Home_model->update_profile($this->userdata['user_id'], $_POST);
			if($update){
				die(json_encode(1));
			}else{
				die(json_encode(0));
			}
		}else{
			die(json_encode(0));
		}

		//$this->load->view('update_profile', $data);
	}

	public function update_credentials(){
		$data = array();
		$data['title'] = 'Oops!';

		if(!empty($_POST)){
			//check if password is true
			$check = $this->Home_model->check_password(md5($_POST['user_current_password']), $this->userdata['user_id']);
			if($check){
				//check if new password are equal
				if($_POST['new_password'] == $_POST['confirm_new_password']){
					$newpassword = array('user_password' => md5($_POST['confirm_new_password']));
					$where 		 = array('user_id'       => $this->userdata['user_id']);
					$update 	 = $this->Home_model->general_update($newpassword, $where);
					if($update){
						$data['title']   = 'Success!';
						$data['type']    = 'green';
						$data['message'] = 'Successfully updated password!';						
					}else{
						$data['type']    = 'red';
						$data['message'] = 'Failed to update password. Please try again.';
					}					
				}else{
					$data['type']    = 'red';
					$data['message'] = 'New password is not equal.';
				}
			}else{
				$data['type']    = 'red';
				$data['message'] = 'Must enter correct current password.';
			}			
		}else{
			$data['type']    = 'red';
			$data['message'] = 'Must fill in all fields.';
		}

		die(json_encode($data));
	}

	public function test(){
		$data = array();
		//choices format = chapter_number_choicenumber
		$data['fullname'] = "Test test";
		$data['data'] = "";

		if($_POST){
			$data['data'] = $_POST;
		}

		$this->template('test', @$data);
	}


}
