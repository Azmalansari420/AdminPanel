<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	

	//////---------------------final order

	public function final_cart()
	{
		if(isset($_POST['submit']))
		{
			$order_id = time();
			$data['user_id'] = temp_session_id();
			$data['f_name'] = $this->input->post('f_name');
			$data['l_name'] = $this->input->post('l_name');
			$data['compony_name'] = $this->input->post('compony_name');
			$data['country'] = $this->input->post('country');			
			$data['house_str_no'] = $this->input->post('house_str_no');
			$data['apartment'] = $this->input->post('apartment');
			$data['city'] = $this->input->post('city');
			$data['state'] = $this->input->post('state');
			$data['pincode'] = $this->input->post('pincode');
			$data['mobile'] = $this->input->post('mobile');			
			$data['email'] = $this->input->post('email');			
			$data['order_note'] = $this->input->post('order_note');
			$order_amount = applied_coupon('','');
			
			$data['shipping_charge'] = $order_amount['shipping_charge'];
			$data['sub_total'] = $order_amount['sub_total'];
			$data['finalprice'] = $order_amount['finalprice'];
			$data['after_discount_final_price'] = $order_amount['after_discount_final_price'];
		    $data['addeddate'] = date('y-m-d');
			$data['order_id'] = $order_id;
			$data['payment_type'] = 1;

			// $data['payment_method'] = $this->input->post('payment_method');
						
			$temp = $this->crud->selectDataByMultipleWhere('add_to_temp_cart',array('temp_user_id'=>temp_session_id()));
            foreach($temp as $value)
            {
                $product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$value->p_id,));
               
                $order_data['user_id'] = temp_session_id();
                $order_data['order_id'] = $order_id;
                $order_data['p_id'] = $value->p_id;
                $order_data['size_id'] = $value->size_id;
                $order_data['color_id'] = $value->color_id;
                $order_data['quantity'] = $value->quantity;
            

                if($this->crud->insert('orders',$order_data))
                {
                	$this->db->delete("add_to_temp_cart",array("temp_user_id"=>temp_session_id(),));
                	$this->db->update("order_coupon",array("order_id"=>$order_id,'status'=>1,),array('user_id'=>temp_session_id(),'status'=>0,));
                }

            }

			$this->crud->insert('finalorder',$data);
			redirect('thankyou');

			// if($payment_method==1)
	        //     redirect('order?order_id='.$order_id,);
	        // else if($payment_method==2)
	        //     redirect('razorpay/make_payment?order_id='.$order_id,);

		}		
	}


	

	public function couponcode()
	{
		$number = $this->input->post('coupon');
		$user_id = temp_session_id();
        $coupon_data = $this->crud->selectDataByMultipleWhere('coupen_code',array('name'=>$number));

        if(!empty($coupon_data))
        {
        	$coupon_data = $coupon_data[0];
        	$query = $this->crud->selectDataByMultipleWhere('order_coupon',array('coupon'=>$number,"user_id"=>$user_id,"status"=>0,));
        	
        	if(empty($query))
        		$this->db->insert("order_coupon",array("coupon"=>$coupon_data->name,"discount"=>$coupon_data->amount,"type"=>$coupon_data->type,'user_id'=>$user_id,));
        	    $this->session->set_flashdata('coupon_mesg','<div class="alert alert-success">Coupon Applied successfully.....</div>');
        }
        else
        {
        	$this->session->set_flashdata('coupon_mesg','<div class="alert alert-danger">Wrong Coupon Code.....</div>');

        }
        redirect($_SERVER['HTTP_REFERER']);
	}


	function delete_coupon()
	{
		$user_id = temp_session_id();
		$this->db->delete('order_coupon',array('user_id'=>$user_id,'status'=>0,));
		$this->session->set_flashdata('coupon_mesg','<div class="alert alert-success">Coupon has been successfully deleted.</div>');
        redirect($_SERVER['HTTP_REFERER']);
	}



































}
