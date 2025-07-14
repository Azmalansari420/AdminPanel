<?php

class Site_setting extends CI_Controller
{
	///------author for login--


	protected $arr_values = array(
	   	'page_title'=>'Site Setting',
	   	'table_name'=>'site_setting',
	   	'upload_path'=>'media/uploads/site_setting/',
	   	'load_path'=>'admin/site_setting/',
	   ); 




	 public function __construct()
    {
        parent::__construct(); 
        chech_admin_login(); 
        check_controller_access(2);
    }


	//---edit function in left menu

	function edit()
	{
		check_controller_inner_access(2,3);
		$args=func_get_args();

		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			if($_FILES['logo']['name'])
			{
				$image = time().'.'.explode(".", $_FILES['logo']['name'])[1];
				$path = $this->arr_values['upload_path'].$image;
				move_uploaded_file($_FILES['logo']['tmp_name'],$path); 
			}
			else
			{
				$image = $_POST['oldimage'];
			}

			$mobile = $this->input->post('mobile');
			$alt_mobile = $this->input->post('alt_mobile');			
			$email = $this->input->post('email');
			$alt_email = $this->input->post('alt_email');
			$address = $this->input->post('address');
			$map = $this->input->post('map');
			$facebook = $this->input->post('facebook');
			$instagram = $this->input->post('instagram');
			$youtube = $this->input->post('youtube');
			$twitter = $this->input->post('twitter');

			$updatedata = array(
				"logo"=>$image,
				"mobile"=>$mobile,
				"alt_mobile"=>$alt_mobile,
				"email"=>$email,
				"alt_email"=>$alt_email,
				"address"=>$address,
				"map"=>$map,
				"facebook"=>$facebook,
				"instagram"=>$instagram,
				"youtube"=>$youtube,
				"twitter"=>$twitter,
			);
			
			$this->crud->update($this->arr_values['table_name'],$args[0],$updatedata);
			$this->session->set_flashdata('message','Successfully Updated.');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'edit',$data);
	}


}