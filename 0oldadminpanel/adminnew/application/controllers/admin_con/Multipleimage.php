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
						   ); 


   //--check user login or not
	public function __construct()
    {
    	parent::__construct(); 
        chech_admin_login(); 
        check_controller_access(3);
    }



	//insert

	function add()
	{
		check_controller_inner_access(3,2);
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');
			/*-----multiple image--------*/
			$filename = $_FILES['multiple_image_json']['name'];
			$tempname = $_FILES['multiple_image_json']['tmp_name'];
			$allimage = array();
			foreach ($filename as $key => $value) 
			{
			  $imagename = $filename[$key];
			  if(!empty($imagename))
			  {
				  $path = $this->arr_values['upload_path'].$imagename;
				  move_uploaded_file($tempname[$key],$path);
				  $allimage[] = $imagename;
			  }
			}
			if(empty($allimage)) 
			{
			    $multiple_image_json = '';
			} 
			else 
			{
			    $multiple_image_json = json_encode($allimage);
			}

			/*-----Add More --------*/

			$get_single_data = array();
			$m_images = array();

			$single_title = $this->input->post('single_title');
			$single_sub_title = $this->input->post('single_sub_title');

			$images_name = $_FILES['single_image']['name'];
			$images_temp = $_FILES['single_image']['tmp_name'];

			if(!empty($images_name))
			{
				foreach($images_name as $keyimg => $value)
				{
					$thumb_img = uniqid().$keyimg.$images_name[$keyimg];
					$path2 = $this->arr_values['upload_path'].$thumb_img;
					if(move_uploaded_file($images_temp[$keyimg],$path2))
					{
						$m_images[] = $thumb_img;							
					}		
				}				

				if(!empty($single_title))
				{
					foreach($single_title as $key => $value)
					{
						$get_single_data[] = array(
							"single_title"=>$single_title[$key],
							"single_sub_title"=>$single_sub_title[$key],
							"single_image"=>$m_images[$key],
						);
					}
				}
			}

			if(empty($get_single_data) || (count($get_single_data) == 1 && empty($get_single_data[0]['single_title']) && empty($get_single_data[0]['single_sub_title']) && empty($get_single_data[0]['single_image'])))
			{
				$single_image = '';
			} 
			else 
			{
			    $single_image = json_encode($get_single_data);
			}


			/*------multiple image ---*/
			$multidata = array();

			$multiple_title = $this->input->post('multiple_title');
			$multiple_sub_title = $this->input->post('multiple_sub_title');

			foreach ($multiple_title as $key2 => $value2) 
			{
			    if(isset($_FILES['multiple_image'.$key2]['name']))
				{
					$multiple_images_name = $_FILES['multiple_image'.$key2]['name'];
					$multiple_images_temp = $_FILES['multiple_image'.$key2]['tmp_name'];
				}
				if(!empty($multiple_images_name))
				{
					$m_multiple_images = array();

					foreach ($multiple_images_name as $keyimg => $valueimg)
					{
						$thumb_img = rand().$multiple_images_name[$keyimg];
						$path2 = $this->arr_values['upload_path'].$thumb_img;
						if(move_uploaded_file($multiple_images_temp[$keyimg],$path2))
						{
							$m_multiple_images[] = $thumb_img;
						}
					}				

				    $multidata[] = array(
				        "multiple_title"=>$multiple_title[$key2],
				        "multiple_sub_title"=>$multiple_sub_title[$key2],
				        "multiple_image"=>$m_multiple_images,
				    );
			    }
			}

			if (empty($multidata) || (count($multidata) == 1 && empty($multidata[0]['multiple_title']) && empty($multidata[0]['multiple_sub_title']) && empty($multidata[0]['multiple_image']))) 
			{
				$multiple_images = '';
			} 
			else 
			{
			    $multiple_images = json_encode($multidata);
			}			
			$status = $this->input->post('status');			
			$addeddate = date('Y-m-d H:i:s');

			/*----`````insert data----*/
			$insertdata = array(
				"multiple_image_json"=>$multiple_image_json,
				"single_image"=>$single_image,
				"multiple_images"=>$multiple_images,
				"status"=>$status,
				"addeddate"=>$addeddate,
			);
			$this->crud->insert($this->arr_values['table_name'],$insertdata);
			
			$this->session->set_flashdata('message','Record has been Successfully Saved..');
			redirect($this->arr_values['redirect_path'].'listing');	
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['add_more_url'] = $this->arr_values['add_more_url'];
		$data['add_more_multiple'] = $this->arr_values['add_more_multiple'];
		$data['load_more_singleimage'] = $this->arr_values['load_more_singleimage'];
		$data['load_more_multiimage'] = $this->arr_values['load_more_multiimage'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$this->load->view($this->arr_values['load_path'].'add',$data);
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
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			$filename = $_FILES['multiple_image_json']['name'];
			$tempname = $_FILES['multiple_image_json']['tmp_name'];
			$oldimage = $this->input->post('oldmultiple_image_json');

			$allimage = array();
			$newimage = array();
			foreach ($filename as $key => $value) {
			  if(!empty($value)) {
			    $imagename = $filename[$key];
			    $path = $this->arr_values['upload_path'].$imagename;
			    move_uploaded_file($tempname[$key],$path);
			    $newimage[] = $imagename;
			  }
			}
			$oldimage = $this->input->post('oldmultiple_image_json');
			if (!is_array($oldimage)) {
			    $oldimage = array();
			}
			$allimage = array_merge($oldimage, $newimage);

			$multiple_image_json = json_encode($allimage);

			

			/*-----Add More --------*/


			$get_single_data = array();
			$m_images = array();
			$single_title = $this->input->post('single_title');
			$single_sub_title = $this->input->post('single_sub_title');

			$images_name = $_FILES['single_image']['name'];
			$images_temp = $_FILES['single_image']['tmp_name'];
			$single_image_old = $this->input->post('single_image_old');

			$image_count = 0;
			$old_image_count = 0;

			if (!empty($single_image_old)) {
			    foreach ($single_image_old as $keyold => $valueold) {
			        if (!empty($images_name[$keyold])) {
			            $thumb_img = uniqid() . $keyold . $images_name[$keyold];
			            $path2 = $this->arr_values['upload_path'] . $thumb_img;
			            if (move_uploaded_file($images_temp[$keyold], $path2)) {
			                $m_images[$keyold] = $thumb_img;
			            } else {
			                $m_images[$keyold] = $valueold;
			            }
			        } else {
			            $m_images[$keyold] = $valueold;
			        }
			        $old_image_count++;
			    }
			}

			if (!empty($images_name)) {
			    foreach ($images_name as $keyimg => $value) {
			        if ($keyimg >= $old_image_count) {
			            $thumb_img = uniqid() . $keyimg . $images_name[$keyimg];
			            $path2 = $this->arr_values['upload_path'] . $thumb_img;
			            if (move_uploaded_file($images_temp[$keyimg], $path2)) {
			                $m_images[$keyimg] = $thumb_img;
			            }
			        }
			    }
			}

			if (!empty($single_title)) {
			    foreach ($single_title as $key => $value) {
			        if (!empty($m_images[$key])) {
			            $get_single_data[] = array(
			                "single_title" => $single_title[$key],
			                "single_sub_title" => $single_sub_title[$key],
			                "single_image" => $m_images[$key],
			            );
			        }
			    }
			}

			$getallsingledata = json_encode($get_single_data);
			$single_image = $getallsingledata;

			/*------multiple image ---*/

			$multidata = array();
			$multiple_title = $this->input->post('multiple_title');
			$multiple_sub_title = $this->input->post('multiple_sub_title');


			foreach ($multiple_title as $key2 => $value2) 
			{
				$multi_images_array = array();

				if(!empty($_FILES['multiple_image'.$key2]['name']))
				{
					$multiple_image_name = $_FILES['multiple_image'.$key2]['name'];
					$multiple_image_temp = $_FILES['multiple_image'.$key2]['tmp_name'];
				}

				$multiple_image_old = $this->input->post('multiple_image_old'.$key2);

				if(!empty($multiple_image_old))
				{
					foreach ($multiple_image_old as $keyold => $valueold){
						$multi_images_array[] = $valueold;
					}
				}
				if(!empty($multiple_image_name))
				{
					foreach ($multiple_image_name as $keyimg => $valueimg)
					{			
						$multi_img_thumb = rand().$keyimg.$multiple_image_name[$keyimg];
						$path2 = $this->arr_values['upload_path'].$multi_img_thumb;
						if(move_uploaded_file($multiple_image_temp[$keyimg],$path2))
						{
							$multi_images_array[] = $multi_img_thumb;
						}						
					}
				}

			    $multidata[] = array(
			        "multiple_title"=>$multiple_title[$key2],
			        "multiple_sub_title"=>$multiple_sub_title[$key2],
			        "multiple_image"=>$multi_images_array,
			    );
			}

			$getallmulti_image = json_encode($multidata);
			$multiple_images = $getallmulti_image;			

			$status = $this->input->post('status');						
			$modifieddate = date('Y-m-d H:i:s');


			/*==========update data=========*/
			$updatedata = array(
				"multiple_image_json"=>$multiple_image_json,
				"single_image"=>$single_image,
				"multiple_images"=>$multiple_images,
				"status"=>$status,
				"modifieddate"=>$modifieddate,
			);

			$this->crud->update($this->arr_values['table_name'],$args[0],$updatedata);
			
			$this->session->set_flashdata('message','Record has been successfully Updated.');
		    redirect($this->arr_values['redirect_path'].'listing');	
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['add_more_url'] = $this->arr_values['add_more_url'];
		$data['load_more_singleimage'] = $this->arr_values['load_more_singleimage'];
		$data['load_more_multiimage'] = $this->arr_values['load_more_multiimage'];
		$data['add_more_multiple'] = $this->arr_values['add_more_multiple'];
		$data['load_more_multiimage'] = $this->arr_values['load_more_multiimage'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'edit',$data);
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