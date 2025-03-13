<?php
class Admins extends CI_Model
{
	public $tb_admin= "tbl_admin";
	
	function adminLogin($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);	
		$data= $this->db->get("tbl_admin");
		return $data->result();		
	}
	
	function selectAdmin()
	{
		$data= $this->db->get('tbl_admin');
		return $data->result();
	}
	
	function selectAdminData($id)
	{
		$this->db->where('id',$id);
		$data= $this->db->get('tbl_admin');
		return $data->result();
	}
	
	function checkadminemail($email)
	{
		$this->db->where('emailid', $email);
		$data= $this->db->get("tbl_admin");
		return $data->result();		
	}
	
	function updatetoken($id,$data)
	{
		$this->db->where('id', $id);
		return $this->db->update('tbl_admin',$data);
	}
	
	function selectAdminForgotkey($arg)
	{
		$this->db->where('forgot_key', $arg);
		$data= $this->db->get('tbl_admin');
		return $data->result();
	}
	
	function updateAdminDetails($data)
	{
		return $this->db->update('tbl_admin',$data);
	}
	
	function updateAdmin($id,$data)
	{
		$this->db->where('id', $id);
		return $this->db->update('tbl_admin',$data);
	}
	
}

?>