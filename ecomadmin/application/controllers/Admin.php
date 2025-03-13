<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 

{

	// ----------------index---------

	function index()
	{
		$this->Isadmin_login();
		if(isset($_POST['submit']))
		{
			$username= $this->input->post('username');
			$password= $this->input->post('password');
			$recaptcha = $_POST['g-recaptcha-response'];
        	$secret_key = g_captcha_secret_key;
        	$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
        		. $secret_key . '&response=' . $recaptcha;
        	$response = file_get_contents($url);
        	$response = json_decode($response);
        	if ($response->success != true) {
        	    redirect(base_url('admin'));
        		die;
        	}
        	
			$row= $this->admins->adminLogin($username, $password);
			if(count($row)==1)
			{
			// $this->session->sess_destroy();
				foreach($row as $val)
					{
						$data= array('USERID' =>$val->id,
								'USERNAME' => $val->username,
								'logged_in' => true,
								'id' => $val->id,
								);
							$this->session->set_userdata($data);
					}
				redirect('admin/dashboard');
			}
			else
			{
			  $this->session->set_flashdata('message','<div class="alert alert-danger">Invalid Username and Password.</div>');
			}
		}
		$this->load->view('admin/index');
	}


	//---lock screen

	function lockscreen()
	{
		$this->chech_admin_login();
		// $this->Isadmin_login();
		if(isset($_POST['submit']))
		{
			$username= $this->input->post('username');
			$password= $this->input->post('password');
			$row= $this->admins->adminLogin($username, $password);
			if(count($row)==1)
			{
				foreach($row as $val)
					{

						$data= array('USERID' =>$val->id,
								'USERNAME' => $val->username,
								'logged_in' => true,
								'id' => $val->id,
								);
							$this->session->set_userdata($data);
					}
				redirect('admin/dashboard');
			}
			else
			{
			  $this->session->set_flashdata('message','<div class="alert alert-danger">Invalid Password.</div>');
			}
		}
		$this->load->view('admin/lockscreen');
	}


// ----------dashboard---------

	function dashboard()
	{
		$this->chech_admin_login();

		$date = date("Y-m-d H:i:s");

		$this->db->select_sum("after_discount_final_price");
		$this->db->group_by("addeddate");
		$get_b_list = $this->db->get_where("finalorder")->result_object();
		foreach ($get_b_list as $key => $value) {
			$days_chart_amount_array[] = $value->after_discount_final_price;
		}

		$this->db->group_by("addeddate");
		$get_b_list = $this->db->get_where("finalorder")->result_object();
		foreach ($get_b_list as $key => $value) {
			$days_chart_array[] = date('d M Y',strtotime($value->addeddate));
		}

		$data_categories = json_encode($days_chart_array);
		$chart_data = json_encode($days_chart_amount_array);

 		$data['data_categories'] = $data_categories;
		$data['chart_data'] =  $chart_data;

		$this->load->view('admin/dashboard',$data);
	}

//---------------logout---

	function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message','<div class="alert alert-success">You have been successsully logout.</div>');
		redirect('admin/index');
	}



// -------------chech_admin_login-----------


	function chech_admin_login()
	{
		$ci = & get_instance();
		$USERID      = $ci->session->userdata('USERID');	
		$USERNAME      = $ci->session->userdata('USERNAME');	
		$logged_in      = $ci->session->userdata('logged_in');	
		if($USERID=="" && $USERNAME=="")
		{
			redirect('admin/index');
		}
	}



// ---------------------Isadmin_login-------

	function Isadmin_login()
	{
		$ci = & get_instance();
		$USERID      = $ci->session->userdata('USERID');	
		$USERNAME      = $ci->session->userdata('USERNAME');	
		$logged_in      = $ci->session->userdata('logged_in');	
		if($USERID!="" && $USERNAME!="")
		{
			redirect('admin/dashboard');
		}
	}




}