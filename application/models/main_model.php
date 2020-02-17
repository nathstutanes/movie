<?php
class MActor extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

function can_login($username, $password)
{
	$this->db->where('username',$username);
	$this->db->where('password',$password);
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