<?php

class Finalorder extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Orders',
						   	'table_name'=>'finalorder',
						   	'upload_path'=>'media/uploads/finalorder/',
						   	'load_path'=>'admin/finalorder/',
						   	'redirect_path'=>'admin_con/finalorder/',
						   	'back_url'=>'finalorder',
						   	'add_url'=>'finalorder',
						   	'edit_url'=>'finalorder',
						   	'invoice_url'=>'finalorder',
						   	'delete_url'=>'finalorder',
						   	'view_url'=>'finalorder',
						   	'status_value'=>'finalorder',
						   ); 


   //--check user login or not
	function chech_admin_login()
	{
		$ci = & get_instance();
	    if(empty($ci->session->userdata('id')))
	    {
	      redirect(base_url().'admin');
	    }
	}




	//----list dekhney ke lia 

	function listing()
	{
		$this->chech_admin_login();
		$this->db->order_by("id desc");
		$status = 0;
		if(isset($_GET['status']))
		{
			$status = $_GET['status'];
		}
		$data['ALLDATA'] = $this->crud->selectDataByMultipleWhere($this->arr_values['table_name'],array('status'=>$status,));

		$data['page_title'] = $this->arr_values['page_title'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['add_url'] = base_url('admin_con/'.$this->arr_values['add_url'].'/add');
		$data['edit_url'] = base_url('admin_con/'.$this->arr_values['edit_url'].'/edit/');
		$data['invoice_url'] = base_url('admin_con/'.$this->arr_values['invoice_url'].'/invoice/');
		$data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');
		$data['view_url'] = base_url('admin_con/'.$this->arr_values['view_url'].'/view/');
		$data['status_value'] = base_url('admin_con/'.$this->arr_values['status_value'].'/new_status');
		$data['upload_path'] = $this->arr_values['upload_path'];
		
		$this->load->view($this->arr_values['load_path'].'list',$data);
	}


	//------------delete 

	 public function delete($id)//for deleting the user
	  {
	    $delete=$this->crud->delete($this->arr_values['table_name'],$id);
	      if($delete)
	        {
	          echo "Success";
	        }
	     else
	        {
	          echo "Error";
	        }
	  }







	//----------------view

	function view()
	{
		$this->chech_admin_login();
		$args=func_get_args();
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['invoice_url'] = base_url('admin_con/'.$this->arr_values['invoice_url'].'/invoice/');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'view',$data);
	}



	function invoice()
	{
		$this->chech_admin_login();
		$args=func_get_args();
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$data['page_title'] = $this->arr_values['page_title'];
		$this->load->view($this->arr_values['load_path'].'invoice',$data);
	}



	public function status_change()
	{

		if(isset($_POST['submit']))
		{						
			$id = $this->input->post('id');						
			$data['status'] = $this->input->post('status');		
			$this->db->update('finalorder',$data,array("id"=>$id));
			$this->session->set_flashdata('message','<div class="alert alert-success">Record has been successfully Updated.</div>');
		   redirect($_SERVER['HTTP_REFERER']);
		}

		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],'finalorder');
		$this->load->view('admin/finalorder/edit',$data);

	}
	



	public function new_status()
	{
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		$this->db->update($this->arr_values['table_name'],array('status'=>$status),array('id'=>$id));
		$status_html = status($status);
		$data['data'] = array("status"=>$status_html,);
		echo json_encode($data);
	}






	// public function statusupdate()
	// {	
	// 	//echo "string";
	// 	$data['status'] = $_GET['l_status'];
	// 	$this->crud->update($this->arr_values['table_name'],$_GET['ld'],$data);
	// 	redirect($this->arr_values['redirect_path'].'listing');	
	// }



}