<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function print_x($array){
	print_r('<pre>');
	print_r($array);
	print_r('</pre>');
}

function populate_blank($data){
	foreach($data as $key => $val){
		if(empty($val)){
			$val = "-";
		}
		$data[$key] = $val;
	}

	return $data;
}

?>