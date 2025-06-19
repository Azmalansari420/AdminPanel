<?php

class Multipleimage extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Multiple Image',
						   	'table_name'=>'multipleimage',
						   	'upload_path'=>'media/uploads/multipleimage/',
						   	'load_path'=>'admin/multipleimage/',
						   	'redirect_path'=>'admin_con/multipleimage/',
						   	'back_url'=>'multipleimage',
						   	'add_url'=>'multipleimage',
						   	'edit_url'=>'multipleimage',
						   	'delete_url'=>'multipleimage',
						   	'view_url'=>'multipleimage',
						   	'table_url'=>'admin/multipleimage/table',
						   	'add_more_url'=>'admin/multipleimage/add-single-image',
						   	'add_more_multiple'=>'admin/multipleimage/add-multiple-image',
						   	'load_more_singleimage'=>'admin_con/multipleimage/load_more_singleimage',
						   	'load_more_multiimage'=>'admin_con/multipleimage/load_more_multiimage',
						   	'status_value'=>'multipleimage',
						   	'multiple_delete'=>'admin_con/multipleimage/delete_all',
						   	'pagination_url'=>'admin_con/multipleimage/get_table_data',
						   	'controller_name'=>'multipleimage',
						   	'page_name'=>'multipleimage.php',
						   	'pagination_limit'=>'15',
						   	'formURL'=>'admin_con/multipleimage/UpdateData',
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
			
			/*-----multiple image--------*/

			// 1. Keep old images if editing
			$oldImages = $this->input->post('oldmultiple_image_json');
			if (!empty($oldImages)) {
			    $allimage = $oldImages; // append to final array
			}

			// 2. Process new uploaded images
			if (!empty($_FILES['multiple_image_json']['name'][0])) {
			    $filename = $_FILES['multiple_image_json']['name'];
			    $tempname = $_FILES['multiple_image_json']['tmp_name'];

			    foreach ($filename as $key => $value) {
			        if (!empty($filename[$key])) {
			            $unique_name = time() . '_' . $filename[$key]; // avoid filename clash
			            $path = $this->arr_values['upload_path'] . $unique_name;

			            if (move_uploaded_file($tempname[$key], $path)) {
			                $allimage[] = $unique_name;
			            }
			        }
			    }
			}
			$multiple_image_json = !empty($allimage) ? json_encode($allimage) : '';

			/*-----Add More --------*/

			$get_single_data = array();
			$uploaded_images = array();

			// Get POST data
			$single_title = $this->input->post('single_title');
			$single_sub_title = $this->input->post('single_sub_title');
			$old_images = $this->input->post('single_image_old');

			// Get FILES data
			$images_name = $_FILES['single_image']['name'];
			$images_temp = $_FILES['single_image']['tmp_name'];

			foreach ($single_title as $key => $title) {
			    $image_name = isset($images_name[$key]) ? $images_name[$key] : '';
			    $image_tmp = isset($images_temp[$key]) ? $images_temp[$key] : '';

			    // Upload new image or retain old one
			    if (!empty($image_name)) {
			        $new_filename = uniqid().$key.$image_name;
			        $upload_path = $this->arr_values['upload_path'].$new_filename;
			        if (move_uploaded_file($image_tmp, $upload_path)) {
			            $uploaded_images[$key] = $new_filename;
			        } else {
			            $uploaded_images[$key] = isset($old_images[$key]) ? $old_images[$key] : '';
			        }
			    } else {
			        $uploaded_images[$key] = isset($old_images[$key]) ? $old_images[$key] : '';
			    }

			    // Push to final array
			    $get_single_data[] = array(
			        'single_title' => $single_title[$key],
			        'single_sub_title' => $single_sub_title[$key],
			        'single_image' => $uploaded_images[$key],
			    );
			}

			// Final JSON for DB
			if (empty($get_single_data) || (count($get_single_data) == 1 && empty($get_single_data[0]['single_title']) && empty($get_single_data[0]['single_sub_title']) && empty($get_single_data[0]['single_image']))) {
			    $single_image = '';
			} else {
			    $single_image = json_encode($get_single_data);
			}



			/*------multiple image ---*/
			$multidata = array();

			$multiple_title = $this->input->post('multiple_title');
			$multiple_sub_title = $this->input->post('multiple_sub_title');

			if (!empty($multiple_title)) {
			    foreach ($multiple_title as $key2 => $value2) {
			        
			        $m_multiple_images = array();

			        // If old images exist (for update mode), include them first
			        if (!empty($_POST['multiple_image_old' . $key2])) {
			            foreach ($_POST['multiple_image_old' . $key2] as $oldImage) {
			                $m_multiple_images[] = $oldImage;
			            }
			        }

			        // New uploaded images
			        if (isset($_FILES['multiple_image' . $key2]['name'])) {
			            $multiple_images_name = $_FILES['multiple_image' . $key2]['name'];
			            $multiple_images_temp = $_FILES['multiple_image' . $key2]['tmp_name'];

			            foreach ($multiple_images_name as $keyimg => $valueimg) {
			                if (!empty($valueimg)) {
			                    $thumb_img = rand() . $valueimg;
			                    $path2 = $this->arr_values['upload_path'] . $thumb_img;

			                    if (move_uploaded_file($multiple_images_temp[$keyimg], $path2)) {
			                        $m_multiple_images[] = $thumb_img;
			                    }
			                }
			            }
			        }

			        // Push only if there’s some data
			        if (!empty($value2) || !empty($multiple_sub_title[$key2]) || !empty($m_multiple_images)) {
			            $multidata[] = array(
			                "multiple_title"      => $value2,
			                "multiple_sub_title"  => $multiple_sub_title[$key2],
			                "multiple_image"      => $m_multiple_images
			            );
			        }
			    }
			}

			// Final JSON encode
			if (empty($multidata)) {
			    $multiple_images = '';
			} else {
			    $multiple_images = json_encode($multidata);
			}


			$status = $this->input->post('status');			
			$getdatetime = date('Y-m-d H:i:s');

			/*----`````insert data----*/
			$insertdata = array(

				"multiple_image_json"=>$multiple_image_json,
				"single_image"=>$single_image,
				"multiple_images"=>$multiple_images,
				"status"=>$status,
				"addeddate"=>$addeddate,
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
		check_controller_inner_access(3,2);
		$data['page_title'] = 'Add '.$this->arr_values['page_title'];
		$data['formURL'] = $this->arr_values['formURL'];
		$data['add_more_url'] = $this->arr_values['add_more_url'];
		$data['add_more_multiple'] = $this->arr_values['add_more_multiple'];
		$data['load_more_singleimage'] = $this->arr_values['load_more_singleimage'];
		$data['load_more_multiimage'] = $this->arr_values['load_more_multiimage'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$this->load->view($this->arr_values['load_path'].'form',$data);
	}


	//----list dekhney ke lia 

	function listing()
	{		
		check_controller_inner_access(3,1);
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
        $this->db->like('title', $search);
        $this->db->or_like('id', $search);
        $this->db->group_end();
        $this->db->order_by('id desc');
        // Fetch paginated data
        $data['ALLDATA'] = $this->db->get($this->arr_values['table_name'], $limit, $offset)->result();

        // Rebuild query for count
        $this->db->group_start();
        $this->db->like('title', $search);
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
		$data['add_more_url'] = $this->arr_values['add_more_url'];
		$data['load_more_singleimage'] = $this->arr_values['load_more_singleimage'];
		$data['load_more_multiimage'] = $this->arr_values['load_more_multiimage'];
		$data['add_more_multiple'] = $this->arr_values['add_more_multiple'];
		$data['load_more_multiimage'] = $this->arr_values['load_more_multiimage'];
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



	/*----add more single image----*/

	public function load_more_singleimage() 
	{
	    $data['count'] = $this->input->post('count');
	    $this->load->view($this->arr_values['add_more_url'], $data);
	}


	/*----add more multiple image----*/

	public function load_more_multiimage() 
	{
	    $data['i'] = $this->input->post("i");
	    $this->load->view($this->arr_values['add_more_multiple'], $data);
	}



















/*---sub cat dataa--*/
	public function sub_categ()
	{	
		$id = $this->input->post('id');
		$city = $this->db->get_where('sub_categories',array('cat_id'=>$id,))->result_object();
		$html = '<option disabled selected>Select Sub Categogies</option>';
		foreach ($city as $key => $value) {
			$html .= '
				<option value="'.$value->id.'">'.$value->name.'</option>
			';
		}		
		$data['status'] = "200";
		$data['data'] = $html;		
		echo json_encode($data);
	}



}