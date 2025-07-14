<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 

{

	// ----------------index---------

	function index()
	{
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');
			
			$username= $this->input->post('username');
			$password= $this->input->post('password');

			if(captcha_validation== true)
			{
				$recaptcha = $_POST['g-recaptcha-response'];
	        	$secret_key = g_captcha_secret_key;
	        	$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
	        		. $secret_key . '&response=' . $recaptcha;
	        	$response = file_get_contents($url);
	        	$response = json_decode($response);
	        	if ($response->success != true) {
	        		 $this->session->set_flashdata('message','Captcha Not Verified..');
	        	    redirect(base_url('admin'));
	        		die;
	        	}
			}

        	
			$row= $this->admins->adminLogin($username, $password);
			if(count($row)==1)
			{
				foreach($row as $val)
					{
						$data= array('adminid' =>$val->id,
								'username' => $val->username,
								'password' => $val->password,
								'logged_in' => true,
								'id' => $val->id,
								);
							$this->session->set_userdata($data);
							$insertdata = array(
								"user_id"=>$val->id,
								"username"=>$val->username,
								"password"=>$val->password,
								"device_id"=>uniqid().$_SERVER['REMOTE_ADDR'],
								"ip_address"=>$_SERVER['REMOTE_ADDR'],
								"login_date"=>date("Y-m-d"),
								"login_time"=>date("H:i:s"),
							);
							$this->db->insert('login_details',$insertdata);
					}
					$last_url = $this->session->userdata('last_url');
					if(!empty($last_url)) {
				    redirect($last_url);
					} else {
					    redirect('admin/dashboard');
					}
				// redirect('admin/dashboard');
			}
			else
			{
			  $this->session->set_flashdata('message','Invalid Username or Password...');
			}
		}
		$this->load->view('admin/index');
	}


	function access_denied()
	{
		$this->load->view('admin/access-denied');
	}

	

// ----------forget password---------

	function forget_password()
	{
		if(isset($_POST['submit']))
		{
			$email = $this->input->post('email');
			$check_user = $this->crud->selectDataByMultipleWhere('tbl_admin',array('email'=>$email,));

			if(!empty($check_user))
			{
				$check_user = $check_user[0];
				$user_id = $check_user->id;
				$string = time().$user_id.$email;
				$hash_string = hash('sha256', $string);
				$currentdata = date('Y-m-d H:i');
				$hash_expiry = date('Y-m-d H:i',strtotime($currentdata.'1 days'));
				$data = array(
					"hash_key"=>$hash_string,
					"hash_expiry"=>$hash_expiry,
				);
				$resetlink = base_url().'admin/create_password?hash_key='.$hash_string;
				$message = '<p>Your Reset Link</p>'.$resetlink;
				$subject = "Password Reset Link";
				$sendmail = $this->email->sendmail_forget_pawd($email,$subject,$message);
				if($sendmail==true)
				{
					$this->db->update('tbl_admin',$data,array('email'=>$email));
			  		$this->session->set_flashdata('message','Reset Password Link Sent Your Email.');
			  		redirect(base_url('forget-password'));
				}
				else
				{
			  		$this->session->set_flashdata('message','Email Sending Error.');
				}
			}
			else
			{
			  $this->session->set_flashdata('message','Email Not Found.');
			}
		}

		$this->load->view('admin/forget-password');
	}




	function create_password()
	{
		if($this->input->get('hash_key'))
		{
			$hash_key = $this->input->get('hash_key');
			$data['hash_key'] = $hash_key;
			$tbladmin = $this->crud->selectDataByMultipleWhere('tbl_admin',array('hash_key'=>$hash_key,));
			if(!empty($tbladmin))
			{
				$tbladmin = $tbladmin[0];
				$hash_expiry = $tbladmin->hash_expiry;
				$currentdate = date('Y-m-d H:i');
				if($currentdate < $hash_expiry)
				{
					if(isset($_POST['submit']))
					{
						$password = $this->input->post('password');
						if(!empty($password))
						{
							$data = array(
								"password"=>$password,
								"hash_key"=>null,
								"hash_expiry"=>null,
							);

							$this->db->update('tbl_admin',$data,array('hash_key'=>$hash_key));
			  				$this->session->set_flashdata('message','Password Changed successfully.');
			  				redirect(base_url('Admin/index'));

						}
						else
						{
			  				$this->session->set_flashdata('message','Link is Expirey.');
						}
					}
					else
					{
						$this->load->view('admin/create-password',$data);
					}
				}
				else
				{
			  		$this->session->set_flashdata('message','Link is Expirey.');
			  		redirect(base_url('forget-password'));	

				}
			}
			else
			{
			  $this->session->set_flashdata('message','Invalid Link.');	
			  exit;
			}
		}
	}


	function dashboard()
	{
		chech_admin_login();
		$this->load->view('admin/dashboard');
	}

//---------------logout---

	function logout()
	{
		$get_user_id = $this->session->userdata('id');
		$this->db->update('login_details',array('logout_date'=>date("Y-m-d"),'logout_time'=>date("H:i:s"),'login_status'=>1,),array('user_id'=>$get_user_id,'login_status'=>0));
		$this->session->unset_userdata('id');
		// $this->session->sess_destroy();
		$this->session->set_flashdata('message','You have been successsully logout.');
		redirect('admin/index');
	}







}