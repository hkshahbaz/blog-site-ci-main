<?php

class Login_model extends CI_Model
{
	public function valid_login($username,$password)
	{
		$q = $this->db->where(['uname'=> $username,'password'=>$password])
					->get('users');
		if($q->num_rows())
		{
			return $q->row()->id;
		
		}
			return false;
	}
}