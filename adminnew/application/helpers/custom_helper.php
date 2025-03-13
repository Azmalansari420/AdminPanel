<?php


 function slug($string) 
 { 
  $string = trim($string);$string=strtolower($string);
  $string =preg_replace("/[^a-z0-9_ोौेैा्ीिीूुंःअआइईउऊएऐओऔकखगघचछजझञटठडढतथदधनपफबभमयरलवसशषहश्रक्षटठडढङणनऋड़\s-]/u", "", $string);
  $string = preg_replace("/[\s-]+/", " ", $string);
  $string = preg_replace("/[\s]/", '-', $string);
  return $string ;
 }

 
function status($value)
{
  if($value==1)
  {
    $string = '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">        
                      <circle cx="12" cy="12" r="8" fill="#3cb72c"></circle>
                    </svg>
                  </small>Show
               </p>';
  }

  else if($value==0)
  {
    $string = '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                     <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="8" fill="#F42B3D"></circle>
                     </svg>
                  </small>Hide
               </p>';
  }

  return $string;
}


function admin_logedin_detail()
{
    $ci =& get_instance();
    $id = $ci->session->userdata("id");
    return $ci->db->get_where("tbl_admin",array("id"=>$id,))->result_object()[0];
}

 /*----is admin login ceck -----------*/
  function isadmin_login()
  {
    $ci = & get_instance();
    $adminid = $ci->session->userdata('adminid');   
    if($adminid!=="")
    {
      redirect('admin/dashboard');
    }
  }

// -------------chech_admin_login-----------
  function chech_admin_login()
  {
    $ci = & get_instance();
    $adminid = $ci->session->userdata('adminid');  
    $username = $ci->session->userdata('username');  
    $password = $ci->session->userdata('password');  
    $logged_in = $ci->session->userdata('logged_in'); 

    $checkuser = $ci->db->get_where('tbl_admin',array('id'=>$adminid,'password'=>$password))->result_object();
    if(empty($checkuser))
    {
      $ci->session->sess_destroy();
      redirect('admin/index');
    }

    if($adminid=="" && $username=="")
    {
      redirect('admin/index');
    }
  }



/*---------crete use session--------*/


function temp_session_id($user_id='')
  {
    $ci =& get_instance();
    if(empty($user_id))
    {
      if(empty($ci->session->userdata("user")))
      {
        if(empty($ci->session->userdata("temp_session_id")))
        {
          $temp_session_id = session_id();
        }
        else
        {
          $temp_session_id = $ci->session->userdata("temp_session_id");
        }
      }
      else
      {
        $temp_session_id = $ci->session->userdata("user")['id'];
      }
    }
    else
    {
      $temp_session_id = $user_id;
    }
    return $temp_session_id;
  }




/*---------------users------------*/
function chech_users_login()
{
  $ci =& get_instance();
  $login_data = $ci->session->userdata('users');
  if(!empty($login_data)) 
  {
    $role = $login_data['role'];
    $id = $login_data['user_id'];
    $password = $login_data['password'];
    $user = $ci->db->get_where("registration",array("id"=>$id,"password"=>$password,"status"=>1,))->result_object();
    if(empty($user))
    {
      $ci->session->unset_userdata('users');
      redirect(base_url('login'));
    }
  }
  else
  {
    $ci->session->unset_userdata('users');
    redirect(base_url('login'));
  }
}

function users_data()
{
  $ci =& get_instance();
  $login_data = $ci->session->userdata('users');
  $id = $login_data['user_id'];
  $user = $ci->db->get_where("registration",array("id"=>$id,))->result_object();
  return $user[0];
}


 
function user_status($value)
{
  if($value==1)
  {
    $string = '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">        
                      <circle cx="12" cy="12" r="8" fill="#3cb72c"></circle>
                    </svg>
                  </small>Active
               </p>';
  }

  else if($value==0)
  {
    $string = '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                     <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="8" fill="#F42B3D"></circle>
                     </svg>
                  </small>Deactive
               </p>';
  }

  return $string;
}


/*sizename*/
function sizename($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('size',array('id'=>$id,));
  return $size[0]->name;
}
/*color name*/
function colorname($id)
{
  $ci = & get_instance();
  $color = $ci->crud->selectDataByMultipleWhere('color',array('id'=>$id,));
  return $color[0]->name;
}
/*discount percentage */
function discount($original_price,$cut_price){
  $diff = ($original_price-$cut_price);
  $divid = ($diff*100);
  $pers = ($divid/$original_price);
  return substr($pers,0,2);
 }
/*coupon type*/
function coupontype($value)
{
  if($value==2)
  {
    $string = '<button class="btn btn-sm btn-dark">Amount</button>';
  }
  else if($value==1)
  {
    $string = '<button class="btn btn-sm btn-dark">Percentage</button>';
  }
  return $string;
} 
/*payment type*/
function paymenttype($value)
{
  $string = '';
  if($value==1)
  {
    $string = '<span class="btn btn-primary btn-sm"> COD</span>';
  }
  else if($value==2)
  {
    $string = '<span class="btn btn-dark btn-sm"> Online</span>';
  }
  return $string;
}
/*coupon type*/
function coupon_type_cart($value)
{
  $string = '';
  if($value==1)
  {
    $string = '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">Cart Amount</p>';
  }
  else if($value==2)
  {
    $string = '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">Product Wise</p>';
  }
  return $string;
}
/*apply coupon code*/
function applied_coupon($coupon,$order_id='')
{
  $ci = & get_instance();
  $shiipi_amt = shippingcharge;
  $coupon = 0;
  $coupen_type = 0;
  $sub_total = 0; 
  $product_total = 0;
  $after_discount_final_price = 0;
  $discount = 0;
  $discount_amount = 0;
  $type = 0;
  $finalprice = 0;
  $shipping_charge = $shiipi_amt;

  $coupon_apply = $ci->db->get_where('order_coupon',array('user_id'=>temp_session_id()))->result_object();
  if(!empty($coupon_apply[0]->coupon)) 
  {
      $coupon = $coupon_apply[0]->coupon;
      $coupen_type = $coupon_apply[0]->coupen_type;
  }    

  $cartpro = $ci->crud->selectDataByMultipleWhere('add_to_temp_cart',array('user_id'=>temp_session_id()));
  foreach ($cartpro as $key => $value) 
  {
      $p_id = $value->p_id;
      $allimages = $ci->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$value->p_id,));     
      $product_total = $allimages[0]->sale_price*$value->quantity;

      $sub_total += $product_total;
      // product wise checked amount
      if($coupen_type==2)
      {
        $order_coupon = $ci->db->get_where('order_coupon',array('coupon'=>$coupon,"status"=>0,'user_id'=>temp_session_id(),))->result_object();
        if(!empty($order_coupon))
        {
          $order_coupon = $order_coupon[0];
          $coupen_product_wise = $ci->db->get_where('coupen_product_wise',array("coupon_id"=>$order_coupon->coupon_id,"p_id"=>$p_id,))->result_object();
          if(!empty($coupen_product_wise))
          {
            $coupen_product_wise = $coupen_product_wise[0];
            $type = $coupen_product_wise->type;
            $amount = $coupen_product_wise->amount;
            if($type==1)
            {
              // percent
              $discount = $amount;
              $discount_amount = $product_total*$amount/100;
            }
            else
            {
              // flat
              $discount = $amount;
              $discount_amount = $amount;
            }
          }          
        }
      }
  }
  $after_discount_final_price = $finalprice = $sub_total+$shipping_charge-$discount_amount;

  /*checkout cart amount*/
  if($coupen_type==1)
  {
    $order_coupon = $ci->db->get_where('order_coupon',array('coupon'=>$coupon,"status"=>0,'user_id'=>temp_session_id(),))->result_object();
    if(!empty($order_coupon))
    {
      $order_coupon = $order_coupon[0];
      $type = $order_coupon->type;
      $amount = $order_coupon->discount;
      if($type==1)
      {
        // percent
        $discount = $amount;
        $discount_amount = $finalprice*$amount/100;
        $after_discount_final_price = $finalprice-$discount_amount;
      }
      else
      {
        // flat
        $discount_amount = $amount;
        $discount = $amount;
        $after_discount_final_price = $finalprice-$discount;
      }
    }
  }

  return $return_array = array(
    "type"=>$type,
    "sub_total"=>$sub_total,
    "discount"=>$discount,
    "discount_amount"=>$discount_amount,
    "shipping_charge"=>$shipping_charge,
    "finalprice"=>$finalprice,
    "after_discount_final_price"=>$after_discount_final_price,
  );
  
}

/*order status*/
function order_status($value)
{
  if($value==0)
  {
    $string = '<button class="btn btn-sm btn-primary">Confirm Order</button>';
  }
  else if($value==2)
  {
    $string = '<button class="btn btn-sm btn-primary">Warehouse</button>';
  }
  else if($value==3)
  {
    $string = '<button class="btn btn-sm btn-primary">Shipped Order</button>';
  }
  else if($value==4)
  {
    $string = '<button class="btn btn-sm btn-primary">Deliverd</button>';
  }
  else if($value==5)
  {
    $string = '<button class="btn btn-sm btn-primary">Cancel</button>';
  }

  return $string;
} 

/*price formet*/
function currency_simble($value)
{
  return 'Rs '.number_format($value,2);
}


function count_cart()
{
  $ci = & get_instance();
  $add_cart = $ci->db->get_where('add_to_temp_cart',array('user_id'=>temp_session_id(),))->result_object();
  $count = count($add_cart);
  return $count;
}

function wishlist_cart()
{
  $ci = & get_instance();
  $add_cart = $ci->db->get_where('add_to_temp_wishlist',array('user_id'=>temp_session_id(),))->result_object();
  $count = count($add_cart);
  return $count;
}

function categoryname($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('categories',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->name;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}










/*-------------------role wise ----------------------------*/
/*--access array*/
function access_array()
{
  $access_array = array(
    "1"=>"List",
    "2"=>"Add",
    "3"=>"Edit",
    "4"=>"Delete",
  );
  return $access_array;
}
/*--side menu--*/
function menuname()
{
  $access_array = array(
    "0"=>"Create Role",
    "1"=>"Assign Role",
    "2"=>"Site Settings",
    "3"=>"Slider",
    "4"=>"Testimonials",
    "5"=>"Contact Us",
  );
  return $access_array;
}

/*-get user data--*/
function get_user()
{
  $ci =& get_instance();
  $id = 0;
  $usersession = $ci->session->userdata("adminid");
  $table_name = "tbl_admin";
  if(!empty($usersession))
  {
    $id = $usersession;
    $where = array("id"=>$id,);    
    $user = $ci->db->get_where($table_name,$where)->result_object();
    if(!empty($user))
    {
      $user = $user[0];
      $data['full_detail'] = $user;
      return $data;
    }
    else
      return FALSE;
  }
  else
  {
    redirect('admin/dashboard');
  }
}

/*--------check controller access----*/
function check_controller_access($controller_id)
{
  $ci =& get_instance();
  $user = get_user()['full_detail'];
  $role = $user->role;
  $type = $user->type;
  $check_main_access = true;
  if($type!=1)
  {

      $role_data = $ci->db->get_where("role",array("id"=>$role,))->result_object();
      $check_main_access = false;
      if(!empty($role_data))
      {
        $access = $role_data[0]->role_access;
        $access = json_decode($access);
        $main_access = $access->main_access;          
        // print_r($main_access);
        if(in_array($controller_id,$main_access))
          $check_main_access = true;        
      }      
      if($check_main_access==false)
        redirect(base_url('admin/access_denied'));    
  }
  return $check_main_access;
}


/*---check page access*/
function check_controller_inner_access($controller_id,$inner_id)
{
  $ci =& get_instance();
  $user = get_user()['full_detail'];
  $role = $user->role;
  $type = $user->type;
  $check_main_access = true;
  if($type!=1)
  {

      $role_data = $ci->db->get_where("role",array("id"=>$role,))->result_object();
      $check_main_access = false;
      if(!empty($role_data))
      {
        $access = $role_data[0]->role_access;
        $access = json_decode($access);
        $main_access = $access->main_access;          
        if(!empty($access->inner_access[$controller_id]))
        {
          $inner_access = $access->inner_access[$controller_id];
          // print_r($inner_access);
          if(in_array($inner_id,$inner_access))
            $check_main_access = true;                  
        }
      }
      if($check_main_access==false)
        redirect(base_url('admin/access_denied'));   
  }
  return $check_main_access;
}