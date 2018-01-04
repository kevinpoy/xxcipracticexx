<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
	private $table = "tbl_user";

	function __construct(){
   		parent::__construct();   		
  	}

    public function general_update($data, $where){
      $this->db->set($data);
      $this->db->where($where);
      if($this->db->update($this->table)){
        return true;
      }else{
        return false;
      }
    }

  	public function register($data){
  		$this->db->insert($this->table, $data);
  		return ($this->db->affected_rows() != 1) ? false : true;
  	}

  	public function checkEmail($email){  		
  		$this->db->select('user_email');  		
  		$this->db->like('user_email', $email);
  		$result = $this->db->get($this->table);

  		if($result->num_rows() > 0){
  			return true;
  		}else{
  			return false;
  		}
  	}

    public function check_password($currentPword, $userid){
      $this->db->select('user_id');
      $this->db->where('user_password', $currentPword);
      $this->db->where('user_id', $userid);
      $result = $this->db->get($this->table);
      if($result->num_rows() > 0){
        return true;
      }else{
        return false;
      }
    }

  	public function login($data){
  		$this->db->select('user_id,user_fname,user_lname');
  		$this->db->where($data);
  		$result = $this->db->get($this->table);
  		
  		if($result->num_rows() > 0){
  			$this->update_login_status($result->row('user_id'), 1);
  			return $result->row_array();
  		}else{
  			return false;
  		}
  	}

  	public function update_login_status($id, $status){
  		//$l = 1-login, 0-logout
  		$this->db->set('user_islogin', $status);
  		$this->db->where('user_id', $id);
  		if($this->db->update($this->table)){
  			return true;
  		}else{
  			return false;
  		}
  	}

  	public function profile($id){
  		$this->db->select('*');
  		$this->db->where('user_id', $id);
  		$result = $this->db->get($this->table);

  		return $result->row_array();
  	}

  	public function update_profile($userid, $data){
  		$this->db->set($data);
  		$this->db->where('user_id', $userid);
  		if($this->db->update($this->table)){
  			return true;
  		}else{
  			return false;
  		}
  	}

    public function fetch_email($column, $id){
      $this->db->select($column);
      $this->db->where('user_id', $id);
      $result = $this->db->get($this->table);
      return $result->row_array();
    }
}
?>