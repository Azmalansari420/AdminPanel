<?php

class Edit_profile extends CI_Controller
{


	//-define everything for here
	protected $arr_values = array(
							'page_title'=>'Update Profile',
						   	'table_name'=>'tbl_admin',
						   	'upload_path'=>'media/uploads/',
						   	'load_path'=>'admin/edit_profile',
						   	'redirect_path'=>'admin/dashboard',
						   ); 



	///------author for login--
	 public function __construct()
    {
        parent::__construct(); 
        chech_admin_login(); 
    }

	//---edit function in left menu

	function edit()
	{
		 
		$args=func_get_args();

		if(isset($_POST['submit']))
		{

			if($_FILES['image']['name']!='')
			{
				$image = time().'.'.explode(".", $_FILES['image']['name'])[1];
				$path = $this->arr_values['upload_path'].$image;
				move_uploaded_file($_FILES['image']['tmp_name'],$path);
			}

			else
			{
				$image = $_POST['oldimage'];
			}

			$first_name = $this->input->post('first_name');			
			$last_name = $this->input->post('last_name');			
			$username = $this->input->post('username');			
			$password = $this->input->post('password');	
			$email = $this->input->post('email');			
			$mobile = $this->input->post('mobile');			
			$address = $this->input->post('address');			
			$gender = $this->input->post('gender');			
			$dob = $this->input->post('dob');			
			$martial = $this->input->post('martial');			
			$age = $this->input->post('age');			
			$country = $this->input->post('country');			
			$state = $this->input->post('state');	

			$updatedata = array(
				"image"=>$image,
				"first_name"=>$first_name,
				"last_name"=>$last_name,
				"username"=>$username,
				"password"=>$password,
				"email"=>$email,
				"mobile"=>$mobile,
				"address"=>$address,
				"gender"=>$gender,
				"dob"=>$dob,
				"martial"=>$martial,
				"age"=>$age,
				"country"=>$country,
				"state"=>$state,
			);		
			
			$this->crud->update($this->arr_values['table_name'],$this->session->userdata("id"),$updatedata);
			$this->session->set_flashdata('message','Record has been successfully Updated..');
			redirect($this->arr_values['redirect_path']);	
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['EDITDATA'] = $this->crud->fetchdatabyid($this->session->userdata("id"),$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'],$data);
	}


}