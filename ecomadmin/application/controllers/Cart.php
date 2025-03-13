<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	

	// ----------------add to cart button on home/// 2 in 1-------


	public function add()
	{
		$p_id = $this->input->post('p_id');
		$temp_user_id = temp_session_id();
		$quantity = $this->input->post('quantity');
		$color_val = $this->input->post('color_val');
		$size_val = $this->input->post('size_val');
		$data = array(
			"p_id"=>$p_id,
			"quantity"=>$quantity,
			"color_id"=>$color_val,
			"size_id"=>$size_val,
			"temp_user_id"=>$temp_user_id,
		);
		$get_cart = $this->crud->selectDataByMultipleWhere('add_to_temp_cart',array("p_id"=>$p_id,"temp_user_id"=>$temp_user_id,'color_id'=>$color_val,'size_id'=>$size_val,));

		if(empty($get_cart))
		{
		 $this->crud->insert('add_to_temp_cart',$data);
		}
		else
		{
			$this->db->update('add_to_temp_cart',$data,array("temp_user_id"=>$temp_user_id,"p_id"=>$p_id,'color_id'=>$color_val,'size_id'=>$size_val,));
		}
	}

	//-----------------update cart-------------

	function update(){

	    $id = $this->input->post('id');
	    $quantity = $this->input->post('quantity');

	    $data = array(
	        'quantity' => $quantity
	        );
	    $this->db->update('add_to_temp_cart',$data,array("id"=>$id,));
	
	}

	// ---------------------------delete cart--------

	function add_to_cart_delete()
	{
		$id = $this->input->post('id');
		$data=$this->crud->selectDataByMultipleWhere('add_to_temp_cart',array('id'=>$id));
		$this->crud->delete('add_to_temp_cart',$id);
		$this->session->set_flashdata('message','<div class="alert alert-success">Record has been successfully deleted.</div>');
	}

	// function update_cart_item(){

	//     $result = array();
    // 	$p_id = $this->input->post('p_id');
    // 	$temp_user_id = temp_session_id();
    // 	$quantity = $this->input->post('quantity');

    // 	$user_data= array(                
    //             "p_id"=>$p_id,
    //             "temp_user_id"=>$temp_user_id,
    //             "quantity"=>$quantity,
    //         );

    // 	if(!empty($p_id))
    // 	{
    // 		$this->db->update("add_to_temp_cart",$user_data,array('p_id'=>$p_id,'temp_user_id'=>$temp_user_id,));
	//         $result['message'] = "Quantity Update successfully";
	//         $result['status']  = "200";
	//         $result['data']    = $user_data;
    // 	}
    // 	else
    //     {
    //         $result['message'] = "Wrong Product ID";
    //         $result['status']  = "400";
    //         $result['data']    = $user_data;
    //     }
    //     echo json_encode($result);
	
	// }



	// --ajax & jquary-----
	// public function update_cart()
	// {
	// 		$id = $this->input->post('product_id');
	// 		$data['quantity'] = $this->input->post('quantity');	
	// 		$session_id = $data['temp_user_id'] = temp_session_id();
	// 		$get_cart = $this->crud->selectDataByMultipleWhere('add_to_temp_cart',array("id"=>$id,));
	// 		if(empty($get_cart))
	// 		{
	// 			$this->crud->insert('add_to_temp_cart',$data);
	// 			redirect($_SERVER['HTTP_REFERER']);
	// 		}
	// 		else
	// 		{
	// 			$this->db->update('add_to_temp_cart',$data,array("temp_user_id"=>$session_id,"id"=>$id,));
	// 			redirect($_SERVER['HTTP_REFERER']);
	// 		}	
	// }



	






































}
