<?php

class Role extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Role',
						   	'table_name'=>'role',
						   	'upload_path'=>'media/uploads/role/',
						   	'load_path'=>'admin/role/',
						   	'redirect_path'=>'admin_con/role/',
						   	'back_url'=>'role',
						   	'add_url'=>'role',
						   	'edit_url'=>'role',
						   	'delete_url'=>'role',
						   	'view_url'=>'role',
						   	'table_url'=>'admin/role/table',
						   	'status_value'=>'role',
						   	'multiple_delete'=>'admin_con/role/delete_all',
						   	'pagination_url'=>'admin_con/role/get_table_data',
						   	'controller_name'=>'role',
						   	'page_name'=>'role.php',
						   	'pagination_limit'=>'10',
						   	'formURL'=>'admin_con/role/UpdateData',
						   ); 


   //--check user login or not
	 public function __construct()
    {
        parent::__construct(); 
        chech_admin_login(); 
        check_controller_access(0);
    }



    function UpdateData()
	{
		
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			$id = $this->input->post('id');		

			$name = $this->input->post('name');			
			$slug = slug($name);
			$access = [];
     		$main_access = [];
			$access_count = $this->input->post('access_count');
	    	$main_access = $this->input->post('main_access');

	     	foreach ($access_count as $key => $value)
	     	{
		     	$access_inner = $this->input->post('inner_access'.$key);
		     	if(!empty($access_inner)) $access[$key] = $access_inner;
			     	else $access[$key] = [];

		     	if(!empty($main_access_input))
		     	{
		     		$main_access[] = $main_access_input;
		     	}
	     	}
     		$inner_access = $access;
     		$all_access = array("main_access"=>$main_access,"inner_access"=>$inner_access,);
			$role_access = json_encode($all_access);
			$status = $this->input->post('status');			
			$getdatetime = date('Y-m-d H:i:s');

			$insertdata = array(
				"name"=>$name,
				"slug"=>$slug,
				"role_access"=>$role_access,
				"status"=>$status,
			);

			if(empty($id))
			{	
				$insertdata["addeddate"]=$getdatetime;
				$this->crud->insert($this->arr_values['table_name'],$insertdata);
				$insert_id = $this->db->insert_id();
			}
			else
			{
				$insertdata["modifieddate"]=$getdatetime;
				$this->db->update($this->arr_values['table_name'],$insertdata,["id"=>$id]);
				$insert_id = $id;
			}
			$this->session->set_flashdata('message','Record has been Successfully Saved..');
			redirect($this->arr_values['redirect_path'].'listing');	
		}

	}



	//insert

	function add()
	{
		check_controller_inner_access(0,2);
		
		$data['page_title'] = 'Add '.$this->arr_values['page_title'];
		$data['formURL'] = $this->arr_values['formURL'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$this->load->view($this->arr_values['load_path'].'form',$data);
	}


	//----list dekhney ke lia 

	function listing()
	{		
		check_controller_inner_access(0,1);
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
        check_controller_inner_access(3, 1);

        $search = $this->input->post('search');
        $limit = $this->arr_values['pagination_limit'];
        $offset = $this->input->post('offset');

        // Apply search filters
        $this->db->group_start();
        $this->db->like('name', $search);
        $this->db->or_like('id', $search);
        $this->db->group_end();
        $this->db->order_by('id desc');
        // Fetch paginated data
        $data['ALLDATA'] = $this->db->get($this->arr_values['table_name'], $limit, $offset)->result();

        // Rebuild query for count
        $this->db->group_start();
        $this->db->like('name', $search);
        $this->db->or_like('id', $search);
        $this->db->group_end();
        $total_rows = $this->db->count_all_results($this->arr_values['table_name']);

        $current_page = ($offset / $limit) + 1;
        $total_pages = ceil($total_rows / $limit);
        $pagination_links = '';

        if ($total_pages > 1) {
            // Previous link
            if ($current_page > 1) {
                $prev_offset = ($current_page - 2) * $limit;
                $pagination_links .= '<a href="javascript:void(0)" class="pagination-link btn btn-sm btn-dark" data-offset="' . $prev_offset . '">&lt;</a>';
            }

            // Always show first 2 pages
            for ($i = 1; $i <= min(2, $total_pages); $i++) {
                $offset_val = ($i - 1) * $limit;
                $pagination_links .= '<a href="javascript:void(0)" class="pagination-link btn btn-primary btn-sm ' . ($i == $current_page ? 'active-page' : '') . '" data-offset="' . $offset_val . '">' . $i . '</a>';
            }

            // Show dots if needed
            if ($current_page > 4) {
                $pagination_links .= '<span style="margin: 0 5px;">...</span>';
            }

            // Show current-1, current, current+1 if in range
            for ($i = max(3, $current_page - 1); $i <= min($total_pages - 2, $current_page + 1); $i++) {
                $offset_val = ($i - 1) * $limit;
                $pagination_links .= '<a href="javascript:void(0)" class="pagination-link btn btn-primary btn-sm ' . ($i == $current_page ? 'active-page' : '') . '" data-offset="' . $offset_val . '">' . $i . '</a>';
            }

            // Show dots if needed
            if ($current_page < $total_pages - 3) {
                $pagination_links .= '<span style="margin: 0 5px;">...</span>';
            }

            // Always show last 2 pages
            for ($i = max($total_pages - 1, 3); $i <= $total_pages; $i++) {
                $offset_val = ($i - 1) * $limit;
                $pagination_links .= '<a href="javascript:void(0)" class="pagination-link btn btn-primary btn-sm ' . ($i == $current_page ? 'active-page' : '') . '" data-offset="' . $offset_val . '">' . $i . '</a>';
            }

            // Next link
            if ($current_page < $total_pages) {
                $next_offset = $current_page * $limit;
                $pagination_links .= '<a href="javascript:void(0)" class="pagination-link btn btn-sm btn-dark" data-offset="' . $next_offset . '">&gt;</a>';
            }
        }

        $data['pagination_links'] = $pagination_links;

        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['view_url'] = base_url('admin_con/' . $this->arr_values['view_url'] . '/view/');
        $data['edit_url'] = base_url('admin_con/' . $this->arr_values['edit_url'] . '/edit/');
        $data['delete_url'] = base_url('admin_con/' . $this->arr_values['delete_url'] . '/delete/');

        $definevariable = array(
            'ALLDATA' => $data['ALLDATA'],
            'upload_path' => $data['upload_path'],
            'view_url' => $data['view_url'],
            'edit_url' => $data['edit_url'],
            'delete_url' => $data['delete_url'],
            'limit' => $limit,
            'total_rows' => $total_rows,
            'offset' => $offset,
            'total_pages' => $total_pages,
        );

        $html = $this->load->view($this->arr_values['table_url'], $definevariable, true);

        echo json_encode(array(
            'html' => $html,
            'pagination_links' => $pagination_links,
            'limit' => $limit
        ));
    }




	//------------delete 

	public function delete()
	  {
	  	check_controller_inner_access(0,4);
	  	$id = $this->input->post('id');
		  $this->db->where('id', $id);
		  $this->db->delete($this->arr_values['table_name']);
		  $this->session->set_flashdata('message','Record has been Successfully Delete..');
	  }

	  /*-------delete multiple*/
	  function delete_all()
		{
			check_controller_inner_access(0,4);
			$ids = $this->input->post('id');
		    if (!empty($ids)) {
		        $this->db->where_in('id', $ids);
		        $this->db->delete($this->arr_values['table_name']);
		        $this->session->set_flashdata('message','Record has been Successfully Delete..');
		    }
		}


	//----------------edit

	function edit()
	{
		check_controller_inner_access(0,3);
		$args=func_get_args();

		$data['formURL'] = $this->arr_values['formURL'];
		$data['page_title'] = 'Update '.$this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		if(!empty($data['EDITDATA']))
		{
			$data['EDITDATA'] = $data['EDITDATA'][0];
			$this->load->view($this->arr_values['load_path'].'form',$data);
		}
		else
		{
			// $this->load->view($this->arr_values['load_path'].'404',$data);			
		}
	}





	//----------------view

	function view()
	{
		check_controller_inner_access(0,5);
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