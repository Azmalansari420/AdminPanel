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
    "4"=>"Today Orders",
    "5"=>"All Orders",
    "6"=>"Categories",
    "7"=>"Product",
    "8"=>"Color",
    "9"=>"Size",
    "10"=>"Coupon Code",
    "11"=>"Notification",
    "12"=>"App Enquiry",
    "13"=>"Users",
    "14"=>"Un-read Orders",
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



/*-----------------basic add fetured----------------*/


function show_home($value)
{
  if($value==1)
  {
    $string = '<button class="btn btn-sm btn-primary">Yes</button>';
  }

  else if($value==0)
  {
    $string = '<button class="btn btn-sm btn-dark">No</button>';
  }

  return $string;
}


/*for admin*/
function category($value)
{
  $ci =& get_instance();
  $category = $ci->crud->selectDataByMultipleWhere('categories',array('id'=>$value));
  if(!empty($category))
  {
    $name = '<button class="btn btn-sm btn-dark">'.$category[0]->name.'</button>';
  }
  else
  {
    $name = '<button class="btn btn-sm btn-dark">Not Found.</button>';
  }
  return $name;
}
// for app

function category_app($value)
{
  $ci =& get_instance();
  $category = $ci->crud->selectDataByMultipleWhere('categories',array('id'=>$value));
  if(!empty($category))
  {
    $name = $category[0]->name;
  }
  else
  {
    $name = 'Not Found';
  }
  return $name;
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
    $string = '<span class="btn btn-dark btn-sm"> Razorpay</span>';
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
  $shiipi_amt = 0;
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

  $user_id = $ci->session->userdata("user")['id'];

  $coupon_apply = $ci->db->get_where('order_coupon',array('user_id'=>$user_id))->result_object();
  if(!empty($coupon_apply[0]->coupon)) 
  {
      $coupon = $coupon_apply[0]->coupon;
      $coupen_type = $coupon_apply[0]->coupen_type;
  }   

  $cartpro = $ci->crud->selectDataByMultipleWhere('add_to_temp_cart',array('user_id'=>$user_id));
  foreach ($cartpro as $key => $value) 
  {
      $p_id = $value->p_id;
      $allimages = $ci->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$value->p_id,));     
      $product_total = $allimages[0]->sale_price*$value->quantity;

      $sub_total += $product_total;
      // product wise checked amount
      if($coupen_type==2)
      {
        $order_coupon = $ci->db->get_where('order_coupon',array('coupon'=>$coupon,"status"=>0,'user_id'=>$user_id,))->result_object();
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
    $order_coupon = $ci->db->get_where('order_coupon',array('coupon'=>$coupon,"status"=>0,'user_id'=>$user_id,))->result_object();
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
  // $image = base_url() . 'assets/coin.png';
  // return '<img src="' . $image . '" width="20px"> ' . number_format($value, 2);

  return '₹ '.number_format($value,2);
}


function count_cart()
{
  $ci = & get_instance();
  $user_id = $ci->session->userdata("user")['id']; 
  $add_cart = $ci->db->get_where('add_to_temp_cart',array('user_id'=>$user_id,))->result_object();
  $count = count($add_cart);
  return $count;
}

function count_wishlist()
{
  $ci = & get_instance();
  $user_id = $ci->session->userdata("user")['id']; 
  $add_wishlist = $ci->db->get_where('add_to_temp_wishlist',array('user_id'=>$user_id,))->result_object();
  $count = count($add_wishlist);
  return $count;
}


function cart_products()
{
  $ci = & get_instance();
  $user_id = $ci->session->userdata("user")['id']; 

  $ci->db->order_by('id desc');
  $add_to_cart = $ci->crud->selectDataByMultipleWhere('add_to_temp_cart',array('user_id'=>$user_id));
  return $add_to_cart;
}

function wishlist_cart()
{
  $ci = & get_instance();
  $user_id = $ci->session->userdata("user")['id']; 
  $add_cart = $ci->db->get_where('add_to_temp_wishlist',array('user_id'=>$user_id,))->result_object();
  // $count = count($add_cart);
  return $add_cart;
}





/*webview order*/
function order_statusforweb($value)
{
  if($value==0)
  {
    $string = '<a href="javascript:void(0);" class="badge badge-lg badge-outline-info me-4"><i class="fa-solid fa-circle"></i><span>Payment Pending</span></a>';
  }
  if($value==1)
  {
    $string = '<a href="javascript:void(0);" class="badge badge-lg badge-outline-dark me-4"><i class="fa-solid fa-circle"></i><span>Confirm</span></a>';
  }
  else if($value==2)
  {
    $string = '<a href="javascript:void(0);" class="badge badge-lg badge-outline-info me-4"><i class="fa-solid fa-circle"></i><span>On Delivery</span></a>';
  }
  else if($value==3)
  {
    $string = '<button class="btn btn-sm btn-primary">Shipped Order</button>';
  }
  else if($value==4)
  {
    $string = '<a href="javascript:void(0);" class="badge badge-lg badge-outline-success me-4"><i class="fa-solid fa-circle"></i><span>Completed</span></a>';
  }
  else if($value==5)
  {
    $string = '<a href="javascript:void(0);" class="badge badge-lg badge-outline-danger me-4"><i class="fa-solid fa-circle"></i><span>Canceled</span></a>';
  }

  return $string;
} 


function finalorder($status='')
{
  $ci = & get_instance();
  $user_id = $ci->session->userdata("user")['id']; 
  if(!empty($status))
  {
    $add_cart = $ci->db->get_where('finalorder',array('user_id'=>$user_id,'order_status'=>$status))->result_object();
  }
  else
  {
    $ci->db->order_by('id desc');
    $add_cart = $ci->db->get_where('finalorder',array('user_id'=>$user_id,))->result_object();
  }
  return $add_cart;
}


function statename($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('state',array('id'=>$id,));
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
function cityname($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('city',array('id'=>$id,));
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

/*notiufication type*/
function notificationtype($value)
{
  if($value==1)
  {
    $string = '<button class="btn btn-sm btn-primary">Notification</button>';
  }
  else if($value==2)
  {
    $string = '<button class="btn btn-sm btn-primary">App Notification</button>';
  }
 
  return $string;
} 


/*calculate hour and time*/

function gettimediffrence($addeddate)
{
  $targetDateTime = $addeddate;
  $targetDateTime = strtotime($targetDateTime);

  $currentDateTime = time();

  $diffInSeconds = abs($currentDateTime - $targetDateTime);
  $hours = floor($diffInSeconds / 3600);
  $minutes = floor(($diffInSeconds % 3600) / 60);
  $seconds = $diffInSeconds % 60;

  if ($hours > 0) {
      echo "$hours hour" . ($hours > 1 ? 's' : '');
  }
  if ($minutes > 0) {
      echo " $minutes Min" . ($minutes > 1 ? 's' : '');
  }
  // if ($seconds > 0) {
  //     echo " $seconds sec" . ($seconds > 1 ? 's' : '');
  // }
}


function generate_user_id() 
{
  $ci = & get_instance();
  $ci->db->select_max('user_id');
  $query = $ci->db->get('users');
  $last_user_id = $query->row()->user_id;
  
  if ($last_user_id == NULL || $last_user_id == 0) 
  {
    $next_user_id = 100;
  } 
  else 
  {
    $next_user_id = $last_user_id + 1;
  } 
  return $next_user_id;
}



/*game name*/

function gamename($value)
{
  $ci =& get_instance();
  $category = $ci->crud->selectDataByMultipleWhere('game',array('id'=>$value));
  if(!empty($category))
  {
    $name = $category[0]->name;
  }
  else
  {
    $name = 'Not Found';
  }
  return $name;
}





function add_point_status($value)
{
  $string = '';
  if($value==1)
  {
    $string = 'PROCESS';
  }
  else if($value==2)
  {
    $string = 'PENDING';
  }
  else if($value==3)
  {
    $string = 'SUCCESS';
  }
  else if($value==4)
  {
    $string = 'REJECT';
  }
  return $string;
}


function add_point_type($value)
{
  $string = '';
  if($value==1)
  {
    $string = 'Gpay';
  }
  else if($value==2)
  {
    $string = 'PhonePay';
  }
  else if($value==3)
  {
    $string = 'PayTM';
  }
  else if($value==4)
  {
    $string = '';
  }
  return $string;
}


function username($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users',array('id'=>$id,));
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




function notification_status($value)
{
  if($value==0)
  {
    $string = '<span class="badge badge-light rounded-pill text-bg-warning small">unRead</span> ';
  }
  else if($value==1)
  {
    $string = '<span class="badge badge-light rounded-pill text-bg-success small">Read</span>';
  }
  return $string;
} 


function count_unread_notifications($user_id)
{
  $ci = & get_instance();
  // $notification = $ci->db->get_where('notification',array('type'=>1,))->result_object();
  // if(!empty($notification))
  // {
  //   foreach($notification as $data)
  //   {
  //     $this->db->where('notification_id', $data->id);
  //     $this->db->where('user_id', $user_id);
  //     $notification_status = $this->db->get('notification_status')->row();

  //     if ($notification_status) 
  //     {
  //         $this->db->where('id', $notification_status->id);
  //         $this->db->update('notification_status', array('status' => 1));
  //     }
  //   }
  // }
    

  //   $query = $ci->db->get();
  //   return $query->row()->unread_count;
}







































/*------------------------------web view--------------------*/
function encode_token($data)
{
  $data = json_encode($data);
  return base64_encode(base64_encode(base64_encode($data)));
}
function decode_token($data)
{
  $data = base64_decode(base64_decode(base64_decode($data)));
  return $data = json_decode($data);
}



function set_user_session()
{
  $ci =& get_instance();
  $device_id = $ci->input->get("device_id");
  $firebase_token = $ci->input->get("firebase_token");
  if(!empty($device_id))
  {
    $ci->session->set_userdata(array("device_id"=>$device_id,));
    $ci->session->set_userdata(array("firebase_token"=>$firebase_token,));
  }
  else
  {
    $device_id = uniqid();
    if(empty($ci->session->userdata('device_id')))
    {
      $ci->session->set_userdata(array("device_id"=>$device_id,));
      $ci->session->set_userdata(array("firebase_token"=>$firebase_token,));
    }
  }
}


function user_app_logged_in($page='',$login_required_pages='',$login_not_required_pages='')
{

  $count = explode(".", $page);
  if(count($count)>0) $page = $count[0];
  else $page = $count[0].'.'.$count[1];

    $ci =& get_instance();
    $id = 0;
    $status = 0;
    $role = 0;
    $device_id = $ci->session->userdata("device_id");
    if(!empty($device_id))
    {
      $check_login = $ci->db->order_by('id desc')->limit(1)->get_where("login_history",array('device_id'=>$device_id,"status"=>1,))->result_object();
      if(!empty($check_login))
      {
        $check_login = $check_login[0];
        $user_id = $check_login->user_id;
        $role = $check_login->role;
        $password = $check_login->password;
        $access_token = $check_login->access_token;
        $firebase_token = $check_login->firebase_token;

        $user = $ci->db->get_where("users",array('id'=>$user_id,"role"=>$role,))->result_object();
        if(!empty($user))
        {
          $user = $user[0];
          if($user->password==$check_login->password)
          {
            $data = array(
              "user"=>array("id"=>$user_id,"role"=>$role,"password"=>$password,'access_token'=>$access_token,"device_id"=>$device_id,),
            );
            $ci->session->set_userdata($data);
            $ci->session->set_userdata(array("access_token"=>$access_token,));
            $ci->session->set_userdata(array("device_id"=>$device_id,));
            $ci->session->set_userdata(array("firebase_token"=>$firebase_token,));
            $status = 1;
          }
          else
            $status = 5; // password not match            
        }
        else
        {
          $status = 4; // account not found
        }          
      }
      else $status = 3; // not loged in
    }
    else
    {
      $status = 2; // session not set
    }

    if(in_array($page, $login_required_pages) && $status!=1)
    {
      $status = 6; // send on login page
    }
    if(in_array($page, $login_not_required_pages) && $status==1)
    {
      $status = 7; // send on home page
    }
    return $status;
}


function get_user_app()
{
  $ci =& get_instance();
  $table_name = 'users';
  $user_session = $ci->session->userdata("user");
  if(!empty($user_session))
  {
    $id = $user_session['id'];
    $role = $user_session['role'];
    $where = array("id"=>$id,);
    $user = $ci->db->get_where($table_name,$where)->result_object();
    if(!empty($user))
    {
      $user = $user[0];
      if($role==1)
      {
        $data['image'] = base_url('upload/').$user->profile_image;
      }
      else
      {
        $data['image'] = base_url('upload/').$user->profile_image;
      }
      $data['full_detail'] = $user;
      return $data;
    }
    else
      return FALSE;
  }
  else
    return FALSE;
}








// function token_auth()
// {
//     $ci =& get_instance();
//     $result = [];
//     $headers = getallheaders();

//     $access_token = $ci->session->userdata('access_token');
    
//     if(isset($headers['token']) || !empty($access_token))
//     {
//       if(empty($access_token))
//         $token_string = $headers['token'];
//       else
//         $token_string = $access_token;
        
//       $token_array = decode_token($token_string);
//       if(!empty($token_array->user_id)) $user_id = $token_array->user_id; else $user_id = 0;
//       if(!empty($token_array->password)) $password = $token_array->password;else $password = '';
//       if(!empty($token_array->hours)) $hours = $token_array->hours;else $hours = 0;
//       if(!empty($token_array->date_time)) $date_time = $token_array->date_time;else $date_time = '';

//       $datetime_1 = $date_time; 
//       $datetime_2 = date("Y-m-d H:i:s"); 
//       $start_datetime = new DateTime($datetime_1); 
//       $diff = $start_datetime->diff(new DateTime($datetime_2)); 
//       $total_minutes = ($diff->days * 24 * 60); 
//       $total_minutes += ($diff->h * 60); 
//       $total_minutes += $diff->i; 
//       $total_hours = $total_minutes/60;
//       if($total_hours<=$hours || 1==1)
//       {
//           $user = $ci->db->get_where("users",array("id"=>$user_id,))->result_object();          
//           if(!empty($user))
//           {
//               $user = $user[0];
//               if($user->password!=$password)
//               {
//                   $result['status'] = "401";
//                   $result['message'] = "Invailid user...";
//                   $result['data'] = [];
//                   echo json_encode($result);
//                   die;
//               }
//               else
//               {
//                 return $token_array;
//               }
//           }
//           else
//           {
//               $result['status'] = "401";
//               $result['message'] = "Invailid user...";
//               $result['data'] = [];
//               echo json_encode($result);
//               die;
//           }
//       }
//       else
//       {
//           $result['status'] = "401";
//           $result['message'] = "Token Expired...";
//           $result['data'] = [];
//           echo json_encode($result);
//           die;
//       }
//     }
//     else
//     {
//         $result['status'] = "401";
//         $result['message'] = "Token Required...";
//         $result['data'] = [];
//         echo json_encode($result);
//         die;
//     } 
// }