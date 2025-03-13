<?php

class Product extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Product',
						   	'table_name'=>'product',
						   	'upload_path'=>'media/uploads/product/',
						   	'load_path'=>'admin/product/',
						   	'redirect_path'=>'admin_con/product/',
						   	'back_url'=>'product',
						   	'add_url'=>'product',
						   	'edit_url'=>'product',
						   	'delete_url'=>'product',
						   	'view_url'=>'product',
						   	'status_value'=>'product',
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



	//insert

	function add()
	{
		$this->chech_admin_login();
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');
								
			$data['cat_id'] = $this->input->post('cat_id');			
			$data['sub_cat_id'] = $this->input->post('sub_cat_id');	

			if($_FILES['thumb_img']['name']!='')
			{
				$thumb_img = rand().'.'.explode(".", $_FILES['thumb_img']['name'])[1];
				$path2 = $this->arr_values['upload_path'].$thumb_img;
				move_uploaded_file($_FILES['thumb_img']['tmp_name'],$path2);
			}
			else
			{
				$thumb_img = "";
			}
			$data['thumb_img'] = $thumb_img;

			if($_FILES['thumb_img2']['name']!='')
			{
				$thumb_img2 = rand().'.'.explode(".", $_FILES['thumb_img2']['name'])[1];
				$path2 = $this->arr_values['upload_path'].$thumb_img2;
				move_uploaded_file($_FILES['thumb_img2']['tmp_name'],$path2);
			}
			else
			{
				$thumb_img2 = "";
			}
			$data['thumb_img2'] = $thumb_img2;

			$data['name'] = $this->input->post('name');	
			$data['slug'] = $this->input->post('slug');
			if(empty($data['slug']))
			{
				$slug = slug($data['name']);
			}			
			else
			{
				$slug = slug($data['slug']);
			}
			$data['slug'] = $slug;	

			$data['rating'] = $this->input->post('rating');				
			$data['sku'] = $this->input->post('sku');
			$data['small_info'] = $this->input->post('small_info');			
			$data['video_link'] = $this->input->post('video_link');		
			$data['description'] = $this->input->post('description');			
			$data['additional_info'] = $this->input->post('additional_info');		
			$data['avalibility'] = $this->input->post('avalibility');			
			$data['feauture_product'] = $this->input->post('feauture_product');			
			$data['tranding_product'] = $this->input->post('tranding_product');			
			$data['new_arrival'] = $this->input->post('new_arrival');			
			$data['our_best'] = $this->input->post('our_best');			
			$data['status'] = $this->input->post('status');	
			$data['addeddate'] = date('y-m-d h:i:sA');

			$size_id = $this->input->post('size_id');
			$color_id = $this->input->post('color_id');			
			$price = $this->input->post('price');			
			$cut_price = $this->input->post('cut_price');			

			$image_arra = array();
			foreach ($size_id as $key => $value)
			{
				if(isset($_FILES['image'.$key]['name']))
				{

					$images_name = $_FILES['image'.$key]['name'];
					$images_temp = $_FILES['image'.$key]['tmp_name'];
				}
				if(!empty($images_name))
				{
					$m_images = array();
					foreach ($images_name as $keyimg => $valueimg)
					{

						$ext = explode(".",$images_name[$keyimg]);
						$ext = end($ext);


						$thumb_img = str_replace($ext,".",slug(rand().$keyimg.$images_name[$keyimg])).$ext;
						$path2 = $this->arr_values['upload_path'].$thumb_img;
						if(move_uploaded_file($images_temp[$keyimg],$path2))
						{
							$m_images[] = $thumb_img;
						}
					}
					$image_arra[] = array(
						"size_id"=>$size_id[$key],
						"color_id"=>$color_id[$key],
						"price"=>$price[$key],
						"cut_price"=>$cut_price[$key],
						"images"=>$m_images,
					);					
				}
			}

			$all_image_color_size = json_encode($image_arra);
			$data['all_images'] = $all_image_color_size;

			$this->crud->insert($this->arr_values['table_name'],$data);



	        $insert_id = $this->db->insert_id();
	        $this->db->delete("all_images",array("p_id"=>$insert_id,));
	        if(!empty($image_arra))
	        {
	        	foreach ($image_arra as $key => $value)
	        	{	  	
	        		foreach ($value['images'] as $keyimg => $valueimg)
	        		{
		        		$images_data = array(
		        			"size_id"=>$value['size_id'],
		        			"color_id"=>$value['color_id'],
		        			"price"=>$value['price'],
		        			"cut_price"=>$value['cut_price'],
		        			"p_id"=>$insert_id,
		        			"image"=>$valueimg,
		        		);
		        		$this->db->insert('all_images',$images_data);
		        	}
	        	}
	        }
			$this->session->set_flashdata('message','<div class="alert alert-success">Record has been successfully saved.</div>');			
			redirect($this->arr_values['redirect_path'].'listing');	
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$this->load->view($this->arr_values['load_path'].'add',$data);
	}


	function edit()
	{
		$this->chech_admin_login();
		$args=func_get_args();

		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			$data['cat_id'] = $this->input->post('cat_id');			
			$data['sub_cat_id'] = $this->input->post('sub_cat_id');	

			if($_FILES['thumb_img']['name']!='')
			{
				$thumb_img = rand().'.'.explode(".", $_FILES['thumb_img']['name'])[1];
				$path3 = $this->arr_values['upload_path'].$thumb_img;
				move_uploaded_file($_FILES['thumb_img']['tmp_name'],$path3);
			}
			else
			{
				$thumb_img = $_POST['oldthumb_img'];
			}
			$data['thumb_img'] = $thumb_img;
			
			if($_FILES['thumb_img2']['name']!='')
			{
				$thumb_img2 = rand().'.'.explode(".", $_FILES['thumb_img2']['name'])[1];
				$path3 = $this->arr_values['upload_path'].$thumb_img2;
				move_uploaded_file($_FILES['thumb_img2']['tmp_name'],$path3);
			}
			else
			{
				$thumb_img2 = $_POST['oldthumb_img2'];
			}
			$data['thumb_img2'] = $thumb_img2;

			$data['name'] = $this->input->post('name');	
			$data['slug'] = $this->input->post('slug');
			if(empty($data['slug']))
			{
				$slug = slug($data['name']);
			}			
			else
			{
				$slug = slug($data['slug']);
			}
			$data['slug'] = $slug;			
			$data['rating'] = $this->input->post('rating');			
			$data['sku'] = $this->input->post('sku');
			$data['avalibility'] = $this->input->post('avalibility');			
			$data['small_info'] = $this->input->post('small_info');			
			$data['video_link'] = $this->input->post('video_link');		
			$data['description'] = $this->input->post('description');			
			$data['additional_info'] = $this->input->post('additional_info');		
			$data['feauture_product'] = $this->input->post('feauture_product');			
			$data['tranding_product'] = $this->input->post('tranding_product');			
			$data['new_arrival'] = $this->input->post('new_arrival');			
			$data['our_best'] = $this->input->post('our_best');	
			$data['status'] = $this->input->post('status');
			$data['modifieddate'] = date('y-m-d h:i:sA');

			$size_id = $this->input->post('size_id');
			$color_id = $this->input->post('color_id');
			$price = $this->input->post('price');
			$cut_price = $this->input->post('cut_price');

			$image_arra = array();
			foreach ($size_id as $key => $value)
			{
				if(isset($_FILES['image'.$key]['name']))
				{
					$images_name = $_FILES['image'.$key]['name'];
					$images_temp = $_FILES['image'.$key]['tmp_name'];
					$oldimage = $this->input->post('oldimage'.$key);
				}
				$m_images = array();

				if(!empty($oldimage))
				{
					foreach ($oldimage as $keyold => $valueold) {
						$m_images[] = $valueold;
					}
				}
				if(!empty($images_name))
				{
					foreach ($images_name as $keyimg => $valueimg)
					{
						$ext = explode(".",$images_name[$keyimg]);
						$ext = end($ext);

						$thumb_img = str_replace($ext,".",slug(rand().$keyimg.$images_name[$keyimg])).$ext;
						$path2 = $this->arr_values['upload_path'].$thumb_img;
						if(move_uploaded_file($images_temp[$keyimg],$path2))
						{
							$m_images[] = $thumb_img;
						}
					}
					$image_arra[] = array(
						"size_id"=>$size_id[$key],
						"color_id"=>$color_id[$key],
						"price"=>$price[$key],
						"cut_price"=>$cut_price[$key],
						"images"=>$m_images,
					);					
				}
			}

			$all_image_color_size = json_encode($image_arra);
			$data['all_images'] = $all_image_color_size;

			$this->crud->update($this->arr_values['table_name'],$args[0],$data);

			$insert_id = $args[0];
			$this->db->delete("all_images",array("p_id"=>$insert_id,));
	        if(!empty($image_arra))
	        {
	        	foreach ($image_arra as $key => $value)
	        	{	  	
	        		foreach ($value['images'] as $keyimg => $valueimg)
	        		{
		        		$images_data = array(
		        			"size_id"=>$value['size_id'],
		        			"color_id"=>$value['color_id'],
		        			"price"=>$value['price'],
		        			"cut_price"=>$value['cut_price'],
		        			"p_id"=>$insert_id,
		        			"image"=>$valueimg,
		        		);
		        		$this->db->insert('all_images',$images_data);
		        	}
	        	}
	        }
			$this->session->set_flashdata('message','<div class="alert alert-success">Record has been successfully Updated.</div>');
		    redirect($this->arr_values['redirect_path'].'listing');	
		}
		
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'edit',$data);
	}
	


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




	//----list dekhney ke lia 

	function listing()
	{
		$this->chech_admin_login();
		$this->db->order_by("id desc");
		$data['ALLDATA'] = $this->crud->get_data($this->arr_values['table_name']);

		$data['page_title'] = $this->arr_values['page_title'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['add_url'] = base_url('admin_con/'.$this->arr_values['add_url'].'/add');
		$data['edit_url'] = base_url('admin_con/'.$this->arr_values['edit_url'].'/edit/');
		$data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');
		$data['view_url'] = base_url('admin_con/'.$this->arr_values['view_url'].'/view/');
		$data['status_value'] = base_url('admin_con/'.$this->arr_values['status_value'].'/new_status');
		$data['upload_path'] = $this->arr_values['upload_path'];
		
		$this->load->view($this->arr_values['load_path'].'list',$data);
	}




	//----------------view

	function view()
	{
		$this->chech_admin_login();
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




	public function addmore_image()
	{
		$data = array();
		$data['i'] = $this->input->post("i");
		$this->load->view("admin/product/add-image",$data);
	}

	// public function statusupdate()
	// {	
	// 	//echo "string";
	// 	$data['status'] = $_GET['l_status'];
	// 	$this->crud->update($this->arr_values['table_name'],$_GET['ld'],$data);
	// 	redirect($this->arr_values['redirect_path'].'listing');	
	// }







	











}