<?php
class Main_Model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

function can_login($username, $pass)
{
	$this->db->where('username',$username);
	$this->db->where('pass',$pass);
	$query = $this->db->get('users');

	if($query->num_rows()>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}	
}