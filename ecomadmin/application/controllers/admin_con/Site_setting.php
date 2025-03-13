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




	function chech_admin_login()
	{
		$ci = & get_instance();
	    if(empty($ci->session->userdata('id')))
	    {
	      redirect(base_url().'admin');
	    }
	}


	//---edit function in left menu

	function edit()
	{
		$this->chech_admin_login();
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

			$data['logo'] = $image;
			$data['mobile'] = $this->input->post('mobile');
			$data['alt_mobile'] = $this->input->post('alt_mobile');			
			$data['email'] = $this->input->post('email');
			$data['alt_email'] = $this->input->post('alt_email');
			$data['address'] = $this->input->post('address');
			$data['map'] = $this->input->post('map');
			$data['facebook'] = $this->input->post('facebook');
			$data['instagram'] = $this->input->post('instagram');
			$data['youtube'] = $this->input->post('youtube');
			$data['twitter'] = $this->input->post('twitter');
			
			$this->crud->update($this->arr_values['table_name'],$args[0],$data);
			$this->session->set_flashdata('message','<div class="alert alert-success">Record has been successfully updated.</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'edit',$data);
	}


}