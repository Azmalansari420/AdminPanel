<?php

class Game_bet extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Game Bet',
						   	'table_name'=>'game_bet',
						   	'upload_path'=>'media/uploads/game_bet/',
						   	'load_path'=>'admin/game_bet/',
						   	'redirect_path'=>'admin_con/game_bet/',
						   	'back_url'=>'game_bet',
						   	'add_url'=>'game_bet',
						   	'edit_url'=>'game_bet',
						   	'delete_url'=>'game_bet',
						   	'view_url'=>'game_bet',
						   	'table_url'=>'admin/game_bet/table',
						   	'status_value'=>'game_bet',
						   	'multiple_delete'=>'admin_con/game_bet/delete_all',
						   	'pagination_url'=>'admin_con/game_bet/get_table_data',
						   	'controller_name'=>'game_bet',
						   	'page_name'=>'game_bet.php',
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
						
			$data['name'] = $this->input->post('name');			
			$slug = slug($data['name']);
			$data['slug'] = $slug;
			$data['short_name'] = $this->input->post('short_name');			
			$data['open_time'] = $this->input->post('open_time');			
			$data['close_time'] = $this->input->post('close_time');			
			$data['result_time'] = $this->input->post('result_time');			
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
		$this->load->view($this->arr_values['load_path'].'edit',$data);
	}


	public function get_table_data() 
	{
	  check_controller_inner_access(9,1);
	  $search = $this->input->post('search');
	  $limit = $this->arr_values['pagination_limit'];
	  $offset = $this->input->post('offset');

	  $this->db->order_by('id desc');
	  $this->db->like('name', $search);
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
		
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
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



	// public function get_gamebet()
	// {
	//     // Retrieve input parameters
	//     $select_date = $this->input->get('select_date');						
	//     $game_id = $this->input->get('game_id');

	    
	//     $game_bet = $this->db->get_where('game_bet', array('game_id' => $game_id, 'date' => $select_date))->result_object();
	    
	//     $formatted_data = [];

	//     foreach ($game_bet as $bet) 
	//     {
	//         $formatted_data[] = [
	//             'id' => $bet->id,
	//             'game_type' => $bet->game_type,
	//             'game_type_name' => $bet->game_type_name,
	//             'game_id' => $bet->game_id,
	//             'number' => $bet->number,
	//             'amount' => $bet->amount,
	//             'date' => $bet->date,
	//             'time' => $bet->time,
	//         ];
	//     }

	//     $data['game_bet'] = ($formatted_data);

	//     // Load the view
	//     $data['page_title'] = $this->arr_values['page_title'];
	// 	$data['upload_path'] = $this->arr_values['upload_path'];
	// 	$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
	//     $this->load->view($this->arr_values['load_path'] . 'edit', $data);
	// }

	public function get_gamebet()
	{
	    $select_date = $this->input->get('select_date');						
	    $game_id = $this->input->get('game_id');

	    // Calculate total bet amount for game_type = 1
	    $this->db->select('SUM(amount) as total_bet_amount');
	    $this->db->where('game_type', 1);
	    $this->db->where('game_id', $game_id);
	    $this->db->where('date', $select_date);
	    $total_bet = $this->db->get('game_bet')->row(); // Get the result as an object
	    $total_bet_amount_gametype1 = $total_bet ? $total_bet->total_bet_amount : 0;
	    /**/
	    $this->db->select('CAST(number AS UNSIGNED) as number, SUM(amount) as total_amount, game_type, game_type_name, game_id, date, time');
	    $this->db->where('game_type', 1);
	    $this->db->where('game_id', $game_id);
	    $this->db->where('date', $select_date);
	    $this->db->group_by('number'); 
	    $this->db->order_by('CAST(number AS UNSIGNED)', 'ASC');
	    $game_bet = $this->db->get('game_bet')->result_object();

	    $formatted_datagame1 = [];
	    foreach ($game_bet as $bet) 
	    {
	        $formatted_number = str_pad($bet->number, 2, '0', STR_PAD_LEFT);
	        $formatted_datagame1[] = [
	            'number' => $formatted_number, 
	            'total_amount' => $bet->total_amount,
	            'game_type' => $bet->game_type,
	            'game_type_name' => $bet->game_type_name,
	            'game_id' => $bet->game_id,
	            'date' => $bet->date,
	            'time' => $bet->time,
	        ];
	    }


	    /*type 2 */
	   	$this->db->select('SUM(amount) as total_bet_amount');
        $this->db->where('game_type', 2);
        $this->db->where('game_id', $game_id);
        $this->db->where('date', $select_date);
        $total_bet2 = $this->db->get('game_bet')->row();
        $total_bet_amount_gametype2 = $total_bet2 ? $total_bet2->total_bet_amount : 0;

        $this->db->select('number, SUM(amount) as total_amount, game_type, game_type_name, game_id, date, time');
        $this->db->where('game_type', 2);
        $this->db->where('game_id', $game_id);
        $this->db->where('date', $select_date);
        $this->db->group_by('number');
        $this->db->order_by('number', 'ASC'); 
        $game_bet2 = $this->db->get('game_bet')->result_object();     

        $formatted_datagame2 = [];
        foreach ($game_bet2 as $bet) 
        {
            $formatted_number2 = $bet->number; 
            $formatted_datagame2[] = [
                'number' => $formatted_number2, 
                'total_amount' => $bet->total_amount,
                'game_type' => $bet->game_type,
                'game_type_name' => $bet->game_type_name,
                'game_id' => $bet->game_id,
                'date' => $bet->date,
                'time' => $bet->time,
            ];
        }

	    /*type 3 */
	   	$this->db->select('SUM(amount) as total_bet_amount');
        $this->db->where('game_type', 3);
        $this->db->where('game_id', $game_id);
        $this->db->where('date', $select_date);
        $total_bet3 = $this->db->get('game_bet')->row();
        $total_bet_amount_gametype3 = $total_bet3 ? $total_bet3->total_bet_amount : 0;



        $this->db->select('number, SUM(amount) as total_amount, game_type, game_type_name, game_id, date, time');
        $this->db->where('game_type', 3);
        $this->db->where('game_id', $game_id);
        $this->db->where('date', $select_date);
        $this->db->group_by('number');
        $this->db->order_by('number', 'ASC'); 
        $game_bet3 = $this->db->get('game_bet')->result_object(); 



        $formatted_datagame3 = [];
        foreach ($game_bet3 as $bet3) 
        {

            $formatted_number3 = $bet3->number; 
            $formatted_datagame3[] = [
                'number' => $formatted_number3, 
                'total_amount' => $bet3->total_amount,
                'game_type' => $bet3->game_type,
                'game_type_name' => $bet3->game_type_name,
                'game_id' => $bet3->game_id,
                'date' => $bet3->date,
                'time' => $bet3->time,
            ];
        }

        // die;

        /*game 1*/
	    $data['game_bet'] = $formatted_datagame1;
	    $data['total_bet_amount_gametype1'] = $total_bet_amount_gametype1;
	    /*hgame 2*/
	    $data['game_bet2'] = $formatted_datagame2;
	    $data['total_bet_amount_gametype2'] = $total_bet_amount_gametype2;
	    /*game 3*/
	    $data['game_bet3'] = $game_bet3 = $formatted_datagame3;
	    $data['total_bet_amount_gametype3'] = $total_bet_amount_gametype3; 

	    // print_r($game_bet3);
	    // die;

	    $data['page_title'] = $this->arr_values['page_title'];
	    $data['upload_path'] = $this->arr_values['upload_path'];
	    $data['back_url'] = base_url('admin_con/' . $this->arr_values['back_url'] . '/listing');
	    $this->load->view($this->arr_values['load_path'] . 'edit', $data);
	}







	// public function statusupdate()
	// {	
	// 	//echo "string";
	// 	$data['status'] = $_GET['l_status'];
	// 	$this->crud->update($this->arr_values['table_name'],$_GET['ld'],$data);
	// 	redirect($this->arr_values['redirect_path'].'listing');	
	// }



}