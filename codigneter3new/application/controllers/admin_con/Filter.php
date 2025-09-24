<?php
require_once FCPATH . 'vendor/autoload.php';
class Filter extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Filter',
						   	'table_name'=>'filter',
						   	'upload_path'=>'media/uploads/filter/',
						   	'load_path'=>'admin/filter/',
						   	'redirect_path'=>'admin_con/filter/',
						   	'back_url'=>'filter',
						   	'add_url'=>'filter',
						   	'edit_url'=>'filter',
						   	'delete_url'=>'filter',
						   	'view_url'=>'filter',
						   	'table_url'=>'admin/filter/table',
						   	'status_value'=>'filter',
						   	'multiple_delete'=>'admin_con/filter/delete_all',
						   	'pagination_url'=>'admin_con/filter/get_table_data',
						   	'controller_name'=>'filter',
						   	'page_name'=>'filter.php',
						   	'pagination_limit'=>'15',
						   	'formURL'=>'admin_con/filter/UpdateData',
						   	'excellink'=>'admin_con/filter/download_excel',
						   ); 


   //--check user login or not
	public function __construct()
    {
    	parent::__construct(); 
        chech_admin_login(); 
        check_controller_access(3);
    }




    function UpdateData()
	{
		


		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			$id = $this->input->post('id');			
			
			$title = $this->input->post('title');			
			$slug = slug($title);
			$sub_title = $this->input->post('sub_title');			
			$content = $this->input->post('content');			
			$status = $this->input->post('status');			
			$getdatetime = date('Y-m-d H:i:s');


			$insertdata = array(
				"title"=>$title,
				"slug"=>slug($title),
				"sub_title"=>$sub_title,
				"content"=>$content,
				"status"=>$status,	
			);

			if($_FILES['image']['name']!='')
			{
				$bimage = time().'.'.explode(".", $_FILES['image']['name'])[1];
				$path = $this->arr_values['upload_path'].$bimage;
				move_uploaded_file($_FILES['image']['tmp_name'],$path);
				$insertdata['image'] = $bimage;
			}
			else
			{
				$bimage = $this->input->post('oldimage');
			}


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


			$old_slug = '';
			$old_slug_data = $this->db->select("slug")->get_where($this->arr_values['table_name'],array("id"=>$insert_id,))->result_object();
			if(!empty($old_slug_data))
	    	{
	    		$old_slug = $old_slug_data[0]->slug;
	    	}
			$slug = $this->crud->insert_slug($slug,$insert_id,$this->arr_values['table_name'],$this->arr_values['controller_name'],$old_slug,$this->arr_values['page_name']);
			$this->crud->insert_meta_tags($slug,$old_slug);
			$update_data['slug'] = $slug;
			$this->db->update($this->arr_values['table_name'],$update_data,array("id"=>$insert_id,));

			$this->session->set_flashdata('message','Record has been Successfully Saved..');
			redirect($this->arr_values['redirect_path'].'listing');	
		}

	}



	//insert

	function add()
	{
		check_controller_inner_access(3,2);
		
		$data['page_title'] = 'Add '.$this->arr_values['page_title'];
		$data['formURL'] = $this->arr_values['formURL'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$this->load->view($this->arr_values['load_path'].'form',$data);
	}


	//----list dekhney ke lia 

	function listing()
	{		
		check_controller_inner_access(3,1);
		$data['page_title'] = $this->arr_values['page_title'];
		$data['excellink'] = $this->arr_values['excellink'];
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

	    $search       = $this->input->post('search');
	    $from_date    = $this->input->post('from_date');
	    $to_date      = $this->input->post('to_date');
	    $status   = $this->input->post('status');
	    
	    $limit        = $this->arr_values['pagination_limit'];
	    $offset       = $this->input->post('offset');

	    $this->db->from($this->arr_values['table_name']);

	    // ✅ Apply filters only if values are given
	    if (!empty($from_date) && !empty($to_date)) {
	        $this->db->where('addeddate >=', $from_date);
	        $this->db->where('addeddate <=', $to_date);
	    } elseif (!empty($from_date)) {
	        $this->db->where('addeddate >=', $from_date);
	    } elseif (!empty($to_date)) {
	        $this->db->where('addeddate <=', $to_date);
	    }

	    if ($status !== null && $status !== '' && $status != '--Select Status --') {
		    $this->db->where('status', (int)$status);
		}

	    // if (!empty($tracking_no) && $tracking_no != '--Select Tracking No --') {
	    //     $this->db->where('tracking_no', $tracking_no);
	    // }

	    // ✅ Search filter (optional)
	    if (!empty($search)) {
	        $this->db->group_start();
	        $this->db->like('name', $search);
	        $this->db->or_like('id', $search);
	        $this->db->group_end();
	    }

	    $this->db->order_by('id desc');
	    $this->db->limit($limit, $offset);

	    $data['ALLDATA'] = $this->db->get()->result();

	    // ✅ Count total rows for pagination
	    $this->db->from($this->arr_values['table_name']);

	    if (!empty($from_date) && !empty($to_date)) {
	        $this->db->where('addeddate >=', $from_date);
	        $this->db->where('addeddate <=', $to_date);
	    } elseif (!empty($from_date)) {
	        $this->db->where('addeddate >=', $from_date);
	    } elseif (!empty($to_date)) {
	        $this->db->where('addeddate <=', $to_date);
	    }

	    if ($status !== null && $status !== '' && $status != '--Select Status --') {
		    $this->db->where('status', (int)$status);
		}

	    // if (!empty($tracking_no) && $tracking_no != '--Select Tracking No --') {
	    //     $this->db->where('tracking_no', $tracking_no);
	    // }

	    if (!empty($search)) {
	        $this->db->group_start();
	        $this->db->like('name', $search);
	        $this->db->or_like('id', $search);
	        $this->db->group_end();
	    }

	    $total_rows = $this->db->count_all_results();

	    $current_page = ($offset / $limit) + 1;
	    $total_pages = ceil($total_rows / $limit);
	    $pagination_links = ''; 

	    if ($total_pages > 1) 
	    {
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
	    $data['excellink'] = $this->arr_values['excellink'];

	    $definevariable = array(
	        'ALLDATA'       => $data['ALLDATA'],
	        'upload_path'   => $this->arr_values['upload_path'],
	        'view_url' => $data['view_url'],
	        'edit_url' => $data['edit_url'],
	        'delete_url' => $data['delete_url'],
	        'excellink' => $data['excellink'],
	        'limit'         => $limit,
	        'total_rows'    => $total_rows,
	        'offset'        => $offset,
	        'total_pages'   => $total_pages,
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
	  	check_controller_inner_access(3,4);
	  	$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete($this->arr_values['table_name']);
		$this->session->set_flashdata('message','Record has been Successfully Delete..');
	  }

	  /*-------delete multiple*/
	  function delete_all()
		{
			check_controller_inner_access(3,4);
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
		check_controller_inner_access(3,3);		 
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
		check_controller_inner_access(3,5);		 
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








	public function download_excel()
	{

	    $this->load->database();

	    $status = $this->input->get('status');
	    $search = $this->input->get('search');

	    $this->db->from($this->arr_values['table_name']);
	    if ($status !== null && $status !== '' && $status != '--Select Status --') {
	        $this->db->where('status', (int)$status);
	    }
	    if (!empty($search)) {
	        $this->db->group_start();
	        $this->db->like('name', $search);
	        $this->db->or_like('id', $search);
	        $this->db->group_end();
	    }
	    $rows = $this->db->get()->result_array();

	    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
	    $sheet = $spreadsheet->getActiveSheet();

	    // Header
	    $headers = ['ID','Name','Status','Added Date'];
	    $col = 'A';
	    foreach ($headers as $h) {
	        $sheet->setCellValue($col.'1', $h);
	        $col++;
	    }

	    // Data
	    $rowNum = 2;
	    foreach ($rows as $r) {
	        $sheet->setCellValue('A'.$rowNum, $r['id']);
	        $sheet->setCellValue('B'.$rowNum, $r['name']);
	        $sheet->setCellValue('C'.$rowNum, $r['status']);
	        $sheet->setCellValue('D'.$rowNum, $r['addeddate']);
	        $rowNum++;
	    }

	    $filename = 'export_'.date('Ymd_His').'.xlsx';
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment;filename="'.$filename.'"');
	    header('Cache-Control: max-age=0');

	    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
	    $writer->save('php://output');
	    exit;
	}




	// public function statusupdate()
	// {	
	// 	//echo "string";
	// 	$data['status'] = $_GET['l_status'];
	// 	$this->crud->update($this->arr_values['table_name'],$_GET['ld'],$data);
	// 	redirect($this->arr_values['redirect_path'].'listing');	
	// }



}