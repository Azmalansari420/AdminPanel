<?php

class Game_result extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Result',
						   	'table_name'=>'game_result',
						   	'upload_path'=>'media/uploads/game_result/',
						   	'load_path'=>'admin/game_result/',
						   	'redirect_path'=>'admin_con/game_result/',
						   	'back_url'=>'game_result',
						   	'add_url'=>'game_result',
						   	'edit_url'=>'game_result',
						   	'delete_url'=>'game_result',
						   	'view_url'=>'game_result',
						   	'table_url'=>'admin/game_result/table',
						   	'status_value'=>'game_result',
						   	'multiple_delete'=>'admin_con/game_result/delete_all',
						   	'pagination_url'=>'admin_con/game_result/get_table_data',
						   	'controller_name'=>'game_result',
						   	'page_name'=>'game_result.php',
						   	'pagination_limit'=>'10',
						   ); 


   //--check user login or not
	public function __construct()
    {
    	parent::__construct(); 
        chech_admin_login(); 
        check_controller_access(9);
    }



	//insert

	function add()
	{
		check_controller_inner_access(9,2);
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');
						
			$data['game_id'] = $game_id = $this->input->post('game_id');			
			$data['year'] = date('Y');
			$data['month'] = date('M');
			$data['number'] = $number = $this->input->post('number');
			$data['create_on'] = $create_on = $this->input->post('create_on');
			$data['string_time'] = strtotime($this->input->post('create_on')." ".$this->input->post('number_time'));


			/*game jodi*/
			$game_bet  = $this->db->get_where('game_bet',array('game_id'=>$game_id,'date'=>$create_on,'number'=>$number))->result_object();
			$numbers = [];
			foreach($game_bet as $key => $value)
			{
				$amount_to_distribute = $value->amount * game_win_amount; // ₹1 = ₹95
        		$user_id = $value->user_id; 

				$numbers[] = array(
					"id"=>$value->id,
					"game_id"=>$value->game_id,
					"number"=>$value->number,
					"amount"=>$amount_to_distribute,
				);

				$request_id = time();
				$user_id = $user_id;
		        $add_type = 3;
		        $type = "credit";
		        $amount = $amount_to_distribute;
		        $message = 'Game Win in '.gamename($game_id) .' ('.$value->number.')';
		        $this->crud->wallet_credit_debit($request_id,$user_id, $type, $add_type,$amount, $message, );
			}

			/*haruf no ander 1*/
			$first_digit = substr($number, 0, 1);
			$modified_first_digit = '0' . $first_digit;
			$game_haruf_ander_bet = $this->db->get_where('game_bet', array('game_id' => $game_id, 'date' => $create_on, 'game_type' => 2))->result_object();

			$matching_users = [];
			if (!empty($game_haruf_ander_bet)) 
			{
			    foreach ($game_haruf_ander_bet as $key => $value) {
			        $current_first_digit = substr($value->number, 0, 1); 
			        $current_modified_first_digit = '0' . $current_first_digit;

			        if ($current_modified_first_digit == $modified_first_digit) 
			        {
			            $matching_users[] = array(
			                "id" => $value->id,
			                "user_id" => $value->user_id,
			                "number" => $value->number,
			                "amount" => $value->amount,
			            );

			            $amount_to_distribute = $value->amount * game_win_amount;

			            // Credit the wallet
			            $request_id = time();
			            $user_id = $value->user_id;
			            $add_type = 3;
			            $type = "credit";
			            $amount = $amount_to_distribute;
			            $message = 'Game Win in ' . gamename($game_id) . ' Ander (' . $value->number . ')';
			            $this->crud->wallet_credit_debit($request_id, $user_id, $type, $add_type, $amount, $message);
			        }
			    }
			}

			// print_r($current_modified_first_digit);
			// die;

			/*haruf no bahar 1*/
			$last_digit = substr($number, -1);
			$modified_last_digit = '0' . $last_digit;
			$game_haruf_bahar_bet = $this->db->get_where('game_bet', array('game_id' => $game_id, 'date' => $create_on, 'game_type' => 3))->result_object();

			$matching_users = [];
			if (!empty($game_haruf_bahar_bet)) 
			{
			    foreach ($game_haruf_bahar_bet as $key => $value) 
			    {
			        $current_last_digit = substr($value->number, -1);
			        $current_modified_last_digit = '0' . $current_last_digit;

			        if ($current_modified_last_digit == $modified_last_digit) 
			        {
			            $matching_users[] = array(
			                "id" => $value->id,
			                "request_id" => $value->request_id,
			                "user_id" => $value->user_id,
			                "number" => $value->number,
			                "amount" => $value->amount,
			            );

			            $amount_to_distribute = $value->amount * game_win_amount;

			            $request_id = time();
			            $user_id = $value->user_id;
			            $add_type = 3;
			            $type = "credit";
			            $amount = $amount_to_distribute;
			            $message = 'Game Win in ' . gamename($game_id) . ' Bahar (' . $value->number . ')';
			            $this->crud->wallet_credit_debit($request_id, $user_id, $type, $add_type, $amount, $message);
			        }
			    }
			}

			// print_r($current_modified_last_digit);
			// die;
						

			$data['status'] = $this->input->post('status');			
			$data['addeddate'] = date('Y-m-d H:i:s');

			$this->crud->insert($this->arr_values['table_name'],$data);
			
			$this->session->set_flashdata('message','Record has been Successfully Saved..');
			redirect($this->arr_values['redirect_path'].'listing');	
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$this->load->view($this->arr_values['load_path'].'add',$data);
	}


	//----list dekhney ke lia 

	function listing()
	{		
		check_controller_inner_access(9,1);
		$data['page_title'] = $this->arr_values['page_title'];
		$data['add_url'] = base_url('admin_con/'.$this->arr_values['add_url'].'/add');
		
		$data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');
		$data['status_value'] = base_url('admin_con/'.$this->arr_values['status_value'].'/new_status');
		$data['pagination_url'] = $this->arr_values['pagination_url'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['multiple_delete'] = base_url($this->arr_values['multiple_delete']);
		$this->load->view($this->arr_values['load_path'].'list',$data);
	}


	public function get_table_data() 
	{
	  check_controller_inner_access(9,1);
	  $search = $this->input->post('search');
	  $limit = $this->arr_values['pagination_limit'];
	  $offset = $this->input->post('offset');

	  $this->db->order_by('id desc');
	  $this->db->like('year', $search);
	  $this->db->like('number', $search);
	  $this->db->like('create_on', $search);
	  $this->db->like('month', $search);
	  $this->db->like('game_id', $search);
	  $this->db->or_like('id', $search);
	  $data['ALLDATA'] = $this->db->get($this->arr_values['table_name'], $limit, $offset)->result();

	  $total_rows = $this->db->count_all_results($this->arr_values['table_name']);
	  $pagination_links = '';
	  $current_page = ($offset / $limit) + 1;

	  if ($total_rows > $limit) {
	    for ($i = 0; $i < ceil($total_rows / $limit); $i++) 
	    {
			  $pagination_links .= '<a href="#" class="pagination-link btn btn-primary btn-sm ' . ($i == $current_page - 1 ? 'active-page' : '') . '" style="margin: 5px 3px; border-radius: 25%; font-weight: bold;" data-offset="' . ($i * $limit) . '">' . ($i + 1) . '</a>';
			}
	  }

	  if (!empty($pagination_links)) {
	    $data['pagination_links'] = $pagination_links;
	  } else {
	    $data['pagination_links'] = '';
	  }


	  $total_pages = ceil($total_rows / $limit);

	  $data['upload_path'] = $this->arr_values['upload_path'];
	  $data['view_url'] = base_url('admin_con/'.$this->arr_values['view_url'].'/view/');
	  $data['edit_url'] = base_url('admin_con/'.$this->arr_values['edit_url'].'/edit/');
	  $data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');

	  $definevariable = array(
	  	'ALLDATA' => $data['ALLDATA'],
	  	'upload_path'=>$data['upload_path'],
	  	'view_url'=>$data['view_url'],
	  	'edit_url'=>$data['edit_url'],
	  	'delete_url'=>$data['delete_url'],
	  	'limit'=>$limit,
	  	'total_rows'=>$total_rows,
	  	'offset'=>$offset,
	  	'total_pages'=>$total_pages,
	  );

	  $html = $this->load->view($this->arr_values['table_url'], $definevariable, true);
	  echo json_encode(array('html' => $html, 'pagination_links' => $data['pagination_links'],'limit'=>$limit));
}




	//------------delete 

	public function delete()
	  {
	  	check_controller_inner_access(9,4);
	  	$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete($this->arr_values['table_name']);
		$this->session->set_flashdata('message','Record has been Successfully Delete..');
	  }

	  /*-------delete multiple*/
	  function delete_all()
		{
			check_controller_inner_access(9,4);
			$ids = $this->input->post('id');
		    if (!empty($ids)) 
		    {
		    	$this->db->where_in('id', $ids);
		        $this->db->delete($this->arr_values['table_name']);
		        $this->session->set_flashdata('message','Record has been Successfully Delete..');
		    }
		}


	//----------------edit

	function edit()
	{
		check_controller_inner_access(9,3);		 
		$args=func_get_args();
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			$data['game_id'] = $this->input->post('game_id');			
			$data['year'] = date('Y');
			$data['month'] = date('M');
			$data['number'] = $this->input->post('number');
			$data['create_on'] = $this->input->post('create_on');
			$data['string_time'] = strtotime($this->input->post('create_on')." ".$this->input->post('number_time'));

			$data['status'] = $this->input->post('status');						
			$data['modifieddate'] = date('Y-m-d H:i:s');

			$this->crud->update($this->arr_values['table_name'],$args[0],$data);
			

			$this->session->set_flashdata('message','Record has been successfully Updated.');
		    redirect($this->arr_values['redirect_path'].'listing');	
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'edit',$data);
	}





	//----------------view

	function view()
	{
		check_controller_inner_access(9,5);		 
		$args=func_get_args();
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'view',$data);
	}


//---------------------status

	public function status_change()
	{
		if(isset($_POST['submit']))
		{						
			$id = $this->input->post('id');						
			$data['status'] = $this->input->post('status');		
			$this->db->update($this->arr_values['table_name'],$data,array("id"=>$id));
			$this->session->set_flashdata('message','<div class="alert alert-success">Record has been successfully Updated.</div>');
		    redirect($this->arr_values['redirect_path'].'listing');	
		}

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