<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

	
	// ----------------add to wishlist button on home/// 2 in 1-------
	public function add()
	{
		$p_id = $this->input->post('p_id');
		$temp_user_id = temp_session_id();
		$quantity = $this->input->post('quantity');
		$data = array(
			"p_id"=>$p_id,
			"quantity"=>$quantity,
			"temp_user_id"=>$temp_user_id,
		);

		$get_cart = $this->crud->selectDataByMultipleWhere('add_to_wishlist',array("p_id"=>$p_id,"temp_user_id"=>$temp_user_id,));

		if(empty($get_cart))
		{
		 $this->crud->insert('add_to_wishlist',$data);
		}
		else
		{
			$this->db->update('add_to_wishlist',$data,array("temp_user_id"=>$temp_user_id,"p_id"=>$p_id,));
		}
	}

	//-----------------update cart-------------

	public function update(){

	    $id = $this->input->post('id');
	    $quantity = $this->input->post('quantity');

	    $data = array(
	        'quantity' => $quantity
	        );
	    $this->db->update('add_to_wishlist',$data,array("id"=>$id,));
	
	}

	// ---------------------------delete cart--------

	public function add_to_wishlist_delete()
	{
		$id = $this->input->post('id');
		$data=$this->crud->selectDataByMultipleWhere('add_to_wishlist',array('id'=>$id));
		$this->crud->delete('add_to_wishlist',$id);
		$this->session->set_flashdata('message','<div class="alert alert-success">Record has been successfully deleted.</div>');
	}


	
	


	//-----update cart

	public function update_wishlist($wishlist_id,$p_id)
	{
		$p_id = $p_id;
		$session_id = $data['temp_user_id'] = temp_session_id();
		$product = $this->db->get_where("product",array("id"=>$p_id,))->result_object();

		$allimage = $this->db->get_where("all_images",array("id"=>$p_id,))->result_object();

		$color_id = 0;
        $this->db->group_by('color_id');
        $this->db->limit(1);
        $this->db->select("color_id");
        $color = $this->db->get_where('all_images',array('p_id'=>$p_id,))->result_object();
        if(!empty($color))
        {
            foreach ($color as $key => $value) 
            { 
                $color_id = $value->color_id;
                break;
            } 
        }
        $size_id = 0;
        $this->db->group_by('size_id');
        $this->db->limit(1);
        $this->db->select("size_id");
        $color = $this->db->get_where('all_images',array('p_id'=>$p_id,))->result_object();
        if(!empty($color))
        {
            foreach ($color as $key => $value) 
            { 
                $size_id = $value->size_id;
                break;
            } 
        }


		if(!empty($product))
		{
			$product = $product[0];
			$insert_detail = array(
				"p_id"=>$product->id,
				"color_id"=>$color_id,
				"size_id"=>$size_id,
				"quantity"=>1,
				"temp_user_id"=>temp_session_id(),
			);


			$getolddata = $this->crud->selectDataByMultipleWhere('add_to_temp_cart',array('p_id'=>$p_id,'color_id'=>$color_id,'size_id'=>$size_id,'temp_user_id'=>$session_id));

			if(empty($getolddata))
			{
				$this->crud->insert('add_to_temp_cart',$insert_detail);
				$this->db->delete("add_to_wishlist",array("id"=>$wishlist_id,));
				$this->session->set_flashdata('message','<div class="alert alert-success">Iteam Add to Cart successfully.</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$this->db->delete("add_to_wishlist",array("id"=>$wishlist_id,));
				$this->session->set_flashdata('message','<div class="alert alert-success">Iteam Already Added......</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}

				
		}
		else
		{
			echo 'Product Not exist..';
		}


	}



	//-------apply coupoin

	// public function ven_coupon()
 //    {
	// 		$number = $this->input->post('coupon_code');
 //            $total_amount = $this->input->post('total_amount');
 //            $query = $this->crud->selectDataByMultipleWhere('coupen_code',array('name'=>$number,));
 //            if (empty($query)) {
                
 //                $data['message'] = 'Invalid Coupon Code...';
 //                $data['status'] = '400';
 //                $coupon_amount = 0;
 //            }
 //            else
 //            {
 //            	$coupon_data = $query[0];
 //            	$total_amount -= $coupon_data->amount;
 //            	$coupon_amount = $coupon_data->amount;

 //            	$this->db->delete("coupon_use",array("user_id"=>temp_session_id(),"status"=>0,));

	//             	$data['user_id'] = temp_session_id();
	// 				$data['order_id'] = '';
	// 				$data['coupon_id'] = $coupon_data->id;
	// 	            $data['coupon_name'] = $coupon_data->name;
	// 	            $data['coupon_amount'] = $coupon_data->amount;
	// 	            $data['type'] = $coupon_data->type;
	// 	            $data['status'] = '0';
		           
	// 	            $this->crud->insert('coupon_use',$data);




 //                $data['message'] = 'Coupon Apply Successfully..';
 //                $data['status'] = '200';
 //            }
 //                $data['total_amount'] = '₹'.$total_amount;
 //                $data['coupon_amount'] = '-₹'.$coupon_amount;
 //            echo json_encode($data);
 //    }








}
