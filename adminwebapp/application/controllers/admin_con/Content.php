<?php

class content extends CI_Controller
{
	///------author for login--


	protected $arr_values = array(
	   	'page_title'=>'Content',
	   	'table_name'=>'content',
	   	'upload_path'=>'media/uploads/content/',
	   	'load_path'=>'admin/content/',
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

			$data['content'] = $this->input->post('content');
			
			$this->crud->update($this->arr_values['table_name'],$args[0],$data);
			$this->session->set_flashdata('message','Successfully Updated.');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'edit',$data);
	}


}