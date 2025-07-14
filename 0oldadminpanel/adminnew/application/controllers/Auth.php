<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {






/*-----login------*/
function login()
	{
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			$email = $this->input->post('email');
			$password= $this->input->post('password');
			        	
			$row = $this->db->get_where('registration',array('email'=>$email,'password'=>$password,'status'=>1,))->result_object();

			if(count($row)==1)
			{
				foreach($row as $val)
					{
						$data = [];
						$url = '';
						if($val->role==1)
						{
							$data = array(
								"hospital"=>
									array('user_id' =>$val->id,
										'role' => $val->role,
										'username' => $val->email,
										'password' => $val->password,
										'logged_in' => true,
									),
							);
							$url = base_url('hospital/dashboard');
						}
						else if($val->role==2)
						{
							$data = array(
								"physician"=>
									array('user_id' =>$val->id,
										'role' => $val->role,
										'username' => $val->email,
										'password' => $val->password,
										'logged_in' => true,
									),
							);
							$url = base_url('physician/dashboard');
						}
						else if($val->role==3)
						{
							$data = array(
								"ambulance"=>
									array('user_id' =>$val->id,
										'role' => $val->role,
										'username' => $val->email,
										'password' => $val->password,
										'logged_in' => true,
									),
							);
							$url = base_url('ambulance/dashboard');;
						}
						else if($val->role==4)
						{
							$data = array(
								"pathology"=>
									array('user_id' =>$val->id,
										'role' => $val->role,
										'username' => $val->email,
										'password' => $val->password,
										'logged_in' => true,
									),
							);
							$url = base_url('pathology/dashboard');
						}
						else if($val->role==5)
						{
							$data = array(
								"users"=>
									array('user_id' =>$val->id,
										'role' => $val->role,
										'username' => $val->email,
										'password' => $val->password,
										'logged_in' => true,
									),
							);
							$url = base_url('users/dashboard');
						}
						$this->session->set_userdata($data);

							$insertdata = array(
								"user_id"=>$val->id,
								"username"=>$val->email,
								"password"=>$val->password,
								"device_id"=>uniqid().$_SERVER['REMOTE_ADDR'],
								"ip_address"=>$_SERVER['REMOTE_ADDR'],
								"login_date"=>date("Y-m-d"),
								"login_time"=>date("H:i:s"),
							);
							$this->db->insert('login_details',$insertdata);
					}
				redirect($url);
			}
			else
			{
			  $this->session->set_flashdata('login_msg','<div class="alert alert-danger">Wrong Email Or Password.</div>');
			 redirect($_SERVER['HTTP_REFERER']);

			}
		}
	}




/*---hospital Register--*/

	public function hospital_register()
	{
		$role = 1;			
		$username = $this->input->post('username');	
		$slug = slug($username);	
		$mobile = $this->input->post('mobile');			
		$email = $this->input->post('email');			
		$password = $this->input->post('password');
		$status = 1;
		$addeddate = date('Y-m-d H:i:s');

		$data = array(
			"role"=>$role,
			"username"=>$username,
			"slug"=>$slug,
			"mobile"=>$mobile,
			"email"=>$email,
			"password"=>$password,
			"status"=>$status,
			"addeddate"=>$addeddate,
		);

		$check_email = $this->crud->selectDataByMultipleWhere('registration',array('email'=>$email));
		if(empty($check_email))
		{
			$this->crud->insert('registration',$data);
			$insert_id = $this->db->insert_id();
			$old_slug = '';
			$old_slug_data = $this->db->select("slug")->get_where('registration',array("id"=>$insert_id,))->result_object();
			if(!empty($old_slug_data))
    		{
    			$old_slug = $old_slug_data[0]->slug;
    		}
			$slug = $this->crud->insert_slug($slug,$insert_id,'registration','hospital-details',$old_slug,'hospital-details');
			$this->crud->insert_meta_tags($slug,$old_slug);
			$update_data['slug'] = $slug;
			$this->db->update('registration',$update_data,array("id"=>$insert_id,));

			$this->session->set_flashdata('login_msg','<div class="alert alert-success">Account Has Been successfully Create.</div>');
			redirect('login');
		}			
		else
		{
			$this->session->set_flashdata('login_msg','<div class="alert alert-danger">Email Already Used.</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}		
	}


/*-------------physician_register---------------------------*/
	public function physician_register()
	{
		$role = 2;			
		$username = $this->input->post('username');	
		$slug = slug($username);	
		$mobile = $this->input->post('mobile');			
		$email = $this->input->post('email');			
		$password = $this->input->post('password');
		$status = 1;
		$addeddate = date('Y-m-d H:i:s');

		$data = array(
			"role"=>$role,
			"username"=>$username,
			"slug"=>$slug,
			"mobile"=>$mobile,
			"email"=>$email,
			"password"=>$password,
			"status"=>$status,
			"addeddate"=>$addeddate,
		);

		$check_email = $this->crud->selectDataByMultipleWhere('registration',array('email'=>$email));
		if(empty($check_email))
		{
			$this->crud->insert('registration',$data);
			$insert_id = $this->db->insert_id();
			$old_slug = '';
			$old_slug_data = $this->db->select("slug")->get_where('registration',array("id"=>$insert_id,))->result_object();
			if(!empty($old_slug_data))
    		{
    			$old_slug = $old_slug_data[0]->slug;
    		}
			$slug = $this->crud->insert_slug($slug,$insert_id,'registration','physician-details',$old_slug,'physician-details');
			$this->crud->insert_meta_tags($slug,$old_slug);
			$update_data['slug'] = $slug;
			$this->db->update('registration',$update_data,array("id"=>$insert_id,));

			$this->session->set_flashdata('login_msg','<div class="alert alert-success">Account Has Been successfully Create.</div>');
			redirect('login');
		}			
		else
		{
			$this->session->set_flashdata('login_msg','<div class="alert alert-danger">Email Already Used.</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}		
	}

/*--------------------ambulance-----------------------*/
	public function ambulance_register()
	{
		$role = 3;			
		$username = $this->input->post('username');	
		$slug = slug($username);	
		$mobile = $this->input->post('mobile');			
		$email = $this->input->post('email');			
		$password = $this->input->post('password');
		$status = 1;
		$addeddate = date('Y-m-d H:i:s');

		$data = array(
			"role"=>$role,
			"username"=>$username,
			"slug"=>$slug,
			"mobile"=>$mobile,
			"email"=>$email,
			"password"=>$password,
			"status"=>$status,
			"addeddate"=>$addeddate,
		);

		$check_email = $this->crud->selectDataByMultipleWhere('registration',array('email'=>$email));
		if(empty($check_email))
		{
			$this->crud->insert('registration',$data);
			$insert_id = $this->db->insert_id();
			$old_slug = '';
			$old_slug_data = $this->db->select("slug")->get_where('registration',array("id"=>$insert_id,))->result_object();
			if(!empty($old_slug_data))
    		{
    			$old_slug = $old_slug_data[0]->slug;
    		}
			$slug = $this->crud->insert_slug($slug,$insert_id,'registration','ambulance-details',$old_slug,'ambulance-details');
			$this->crud->insert_meta_tags($slug,$old_slug);
			$update_data['slug'] = $slug;
			$this->db->update('registration',$update_data,array("id"=>$insert_id,));

			$this->session->set_flashdata('login_msg','<div class="alert alert-success">Account Has Been successfully Create.</div>');
			redirect('login');
		}			
		else
		{
			$this->session->set_flashdata('login_msg','<div class="alert alert-danger">Email Already Used.</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}		
	}


	/*------------pathology---------------------*/

	public function pathology_register()
	{
		$role = 4;			
		$username = $this->input->post('username');	
		$slug = slug($username);	
		$mobile = $this->input->post('mobile');			
		$email = $this->input->post('email');			
		$password = $this->input->post('password');
		$status = 1;
		$addeddate = date('Y-m-d H:i:s');

		$data = array(
			"role"=>$role,
			"username"=>$username,
			"slug"=>$slug,
			"mobile"=>$mobile,
			"email"=>$email,
			"password"=>$password,
			"status"=>$status,
			"addeddate"=>$addeddate,
		);

		$check_email = $this->crud->selectDataByMultipleWhere('registration',array('email'=>$email));
		if(empty($check_email))
		{
			$this->crud->insert('registration',$data);
			$insert_id = $this->db->insert_id();
			$old_slug = '';
			$old_slug_data = $this->db->select("slug")->get_where('registration',array("id"=>$insert_id,))->result_object();
			if(!empty($old_slug_data))
    		{
    			$old_slug = $old_slug_data[0]->slug;
    		}
			$slug = $this->crud->insert_slug($slug,$insert_id,'registration','ambulance-details',$old_slug,'ambulance-details');
			$this->crud->insert_meta_tags($slug,$old_slug);
			$update_data['slug'] = $slug;
			$this->db->update('registration',$update_data,array("id"=>$insert_id,));

			$this->session->set_flashdata('login_msg','<div class="alert alert-success">Account Has Been successfully Create.</div>');
			redirect('login');
		}			
		else
		{
			$this->session->set_flashdata('login_msg','<div class="alert alert-danger">Email Already Used.</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}		
	}




	/*------user register-------------------*/

	public function User_register()
	{
		$role = 5;			
		$logo = '1677049590.jpg';			
		$username = $this->input->post('username');	
		$slug = slug($username);	
		$mobile = $this->input->post('mobile');			
		$email = $this->input->post('email');			
		$password = $this->input->post('password');
		$status = 1;
		$addeddate = date('Y-m-d H:i:s');

		$data = array(
			"logo"=>$logo,
			"role"=>$role,
			"username"=>$username,
			"slug"=>$slug,
			"mobile"=>$mobile,
			"email"=>$email,
			"password"=>$password,
			"status"=>$status,
			"addeddate"=>$addeddate,
		);

		$check_email = $this->crud->selectDataByMultipleWhere('registration',array('email'=>$email));
		if(empty($check_email))
		{
			$this->crud->insert('registration',$data);
			$insert_id = $this->db->insert_id();
			$old_slug = '';
			$old_slug_data = $this->db->select("slug")->get_where('registration',array("id"=>$insert_id,))->result_object();
			if(!empty($old_slug_data))
    		{
    			$old_slug = $old_slug_data[0]->slug;
    		}
			$slug = $this->crud->insert_slug($slug,$insert_id,'registration','ambulance-details',$old_slug,'ambulance-details');
			$this->crud->insert_meta_tags($slug,$old_slug);
			$update_data['slug'] = $slug;
			$this->db->update('registration',$update_data,array("id"=>$insert_id,));

			$this->session->set_flashdata('login_msg','<div class="alert alert-success">Account Has Been successfully Create.</div>');
			redirect('login');
		}			
		else
		{
			$this->session->set_flashdata('login_msg','<div class="alert alert-danger">Email Already Used.</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}		
	}








































 public function logout($role)
 {
 	$login_data = [];
 	$login_name = '';
 	if($role==1)
 	{
 		$login_data = $this->session->userdata('hospital'); 		
 		$login_name = 'hospital';
 	}
	if($role==2)
	{
		$login_data = $this->session->userdata('physician');		
		$login_name = 'physician';
	}
	if($role==3)
	{
		$login_data = $this->session->userdata('ambulance');		
		$login_name = 'ambulance';
	}
	if($role==4)
	{
		$login_data = $this->session->userdata('pathlogy');		
		$login_name = 'pathlogy';
	}
	if($role==5)
	{
		$login_data = $this->session->userdata('users');		
		$login_name = 'users';
	}

	if(!empty($login_data))
	{
		$this->session->unset_userdata($login_name);
		redirect(base_url('login'));
	}
	else
	{
		redirect(base_url());
	}
	$this->session->set_flashdata('message','<div class="alert alert-success">You have been successsully logout.</div>');
}

	public function export_single_database() 
	{
	    $table_name = $this->input->get('table_name');
	    $this->load->dbutil();
	    $prefs = array(
	        'format' => 'zip',
	        'filename' => $table_name,
	        'tables' => array($table_name)
	    );
	    $backup =& $this->dbutil->backup($prefs);
	    if ($backup) {
	        $this->load->helper('file');
	        write_file('./path/to/backup/directory/'.$table_name.'.zip', $backup);
	        $this->load->helper('download');
	        force_download($table_name.'.zip', $backup);
	    } else {
	        echo 'Backup failed!';
	    }
	}


	public function export_all_database() 
	{
	    $this->load->dbutil();
	    $prefs = array(
	        'format' => 'zip',
	        'filename' => website_name
	    );
	    $backup =& $this->dbutil->backup($prefs);
	    if ($backup) {
	        $this->load->helper('file');
	        write_file('./path/to/backup/directory/database.zip', $backup);
	        $this->load->helper('download');
	        force_download('database.zip', $backup);
	    } else {
	        echo 'Backup failed!';
	    }
	}


	public function delete_table() 
	{
	    $table_name = $this->input->get('table_name');
	    if ($this->db->table_exists($table_name)) 
	    {
	        $this->db->query("DROP TABLE IF EXISTS $table_name");
	        echo "Table $table_name deleted successfully!";
	    } else {
	        echo "Table $table_name does not exist!";
	    }
	}


	public function drop_current_database() 
	{
	    $database_name = $this->db->database;
	    $this->db->query("DROP DATABASE IF EXISTS $database_name");
	    if ($this->db->error()) {
	        echo "Error dropping database";
	    } else {
	        echo "Database $database_name dropped successfully!";
	    }
	}





















}