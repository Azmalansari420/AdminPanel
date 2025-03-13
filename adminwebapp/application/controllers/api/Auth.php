<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
     
    public function __construct()
    {
        parent::__construct();
        $this->otp = rand(999,9999);
        $this->otp = 1234;
    }
    public function index()
    {
        echo "string";
    }

    public function token_session($user)
    {
        $device_id = $this->input->post('device_id');
        $password = $this->input->post('password');
        $firebase_token = $this->input->post('firebase_token');
        $date_time = date("Y-m-d H:i:s");
        $token_data = array("user_id"=>$user['id'],"password"=>$user['password'],"hours"=>token_hours,"date_time"=>$date_time,"role"=>$user['role'],"device_id"=>$device_id,);
        $access_token = encode_token($token_data);
        $password = $user['password'];

        $login_detail = array(
            "user_id"=>$user['id'],
            "role"=>$user['role'],
            "ip_address"=>$_SERVER['REMOTE_ADDR'],
            "date"=>date("Y-m-d"),
            "time"=>date("H:i:s"),
            "status"=>1,
            "device_id"=>$device_id,
            "password"=>$password,
            "firebase_token"=>$firebase_token,
            "access_token"=>$access_token,
        );
        $this->db->insert("login_history",$login_detail);
        $data = array(
            "user"=>array("id"=>$user['id'],"role"=>$user['role'],"password"=>$user['password'],),
        );
        $this->session->set_userdata($data);
        $this->session->set_userdata(array("access_token"=>$access_token,));
        return $access_token;
    }

    /*login*/
    public function login()
    { 
        $result = array();
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');
        
        $user = $this->db->get_where("users",array('mobile'=>$mobile))->result_array();

        $today = strtotime(date("Y-m-d"));
        $access_token = '';
        $user_detail2 = array(
                    "token"=>"",
                );
        if(!empty($user))
        {
            $user = $user[0];
            
            if($user['status']==1)
            {
                if($user['password']==$password)
                {
                    $access_token = $this->token_session($user);
                    $user_id = $user['id'];
                    $user_detail2['token'] = $access_token;

                    $url = '';
                    if($user['role']==1)
                    {                           
                        $url = base_url('app/user/home.php?device_id='.$device_id.'&token='.$firebase_token);
                    }
                    
                    $result['message'] = "login successfully";
                    $result['status']  = "200";
                    $result['action']    = "login";
                    $result['url']    = $url;
                    $result['data']    = $user_detail2;

                }
                else
                {
                    $result['message'] = "Wrong Password... ";
                    $result['status']  = "400";
                    $result['data']    = $user_detail2;
                }
            }
            else
            {
                $result['message'] = "Your Account Is Blocked...";
                $result['status']  = "400";
                $result['data']    = $user_detail2;
            }
        
        }
        else
        {
            $result['message'] = "Wrong Mobile No.";
            $result['status']  = "400";
            $result['data']    = $user_detail2;
        }
        echo json_encode($result);
    }





    /*register*/
    public function registration()
    { 
        $result = array();
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');

        $role = 1;
        $user_id  = generate_user_id();
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');
        $profile_image = 'user-profile.png';
        $status = 1;
        $date_time = date("Y-m-d H:i:s");
        
        $user = $this->db->get_where("users",array('mobile'=>$mobile))->result_array();
        $insertdata = array(
                "role"=>$role,
                "user_id"=>$user_id,
                "name"=>$name,
                "email"=>$email,
                "mobile"=>$mobile,
                "password"=>$password,
                "profile_image"=>$profile_image,
                "status"=>$status,
                "date_time"=>$date_time,
            );
        $url = base_url('app/user/login.php?device_id='.$device_id.'&token='.$firebase_token);

        if(empty($user))
        {

            $this->db->insert('users',$insertdata);
            $result['message'] = "Register Successfully";
            $result['status']  = "200";
            $result['data']    = $insertdata;
            $result['url']    = $url;
        
        }
        else
        {
            $result['message'] = "Mobile No Already Registerd.";
            $result['status']  = "400";
            $result['data']    = $insertdata;
            $result['url']    = "";
        }
        echo json_encode($result);
    }


    /*forget password*/
    public function forget_password() 
    {
        $result = array();
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');
        $email = $this->input->post('email');
        $user = $this->db->get_where("users",array('email'=>$email))->result_array();

        $message = "";

        if(!empty($user)) 
        {
            $user = $user[0]; // Corrected $user_detail2 to $user
            $name = $user['name']; // Accessing array elements using $
            $password = $user['password']; // Accessing array elements using $
            $subject = "Forget Password"; // Added semicolon here
            $message = 'Hey '.$name.' Your Old Password Is '.$password.'. Login & Update Your Password. Thanks you using Our App. Team ' . website_name; // Concatenated website_name

            $this->email->sendmail_bygmail($email,$subject,$message);
            
            $result['message'] = "Check Your Email";
            $result['status'] = "200";
            $result['data'] = $message;
        } 
        else 
        {
            $result['message'] = "Wrong Email.";
            $result['status'] = "400";
            $result['data'] = "";
        }
        echo json_encode($result);
    }

    
    


    /* login by otp start */
        // public function login_otp_send()
        // {
        //     $result = array();
        //     $phone = $this->input->post('mobile');
        //     $email = $this->input->post('email');
        //     $device_id = $this->input->post('device_id');
        //     $firebase_token = $this->input->post('firebase_token');



        //     $check_mobile = $this->db->get_where("users",array('mobile'=>$phone,"is_delete"=>0,))->result_array();
        //     $check_email = $this->db->get_where("users",array('email'=>$email,"is_delete"=>0,))->result_array();
        //     $today = strtotime(date("Y-m-d"));
        //     $user_detail2 = array(
        //             );

        //     if(empty($check_mobile))
        //     {
        //         $result['message'] = "This Mobile Not Exist...";
        //         $result['status']  = "400";
        //         $result['data']    = [];
        //         echo json_encode($result);
        //         die;
        //     }        
        //     $date_time = date("Y-m-d H:i:s");
        //     $otp = $this->otp;


        //     $user = $check_mobile[0];


        //     if(empty($this->db->get_where("users_temp",array('mobile'=>$phone,))->result_array()))
        //         $row = $this->db->insert("users_temp",array("exp_time"=>$date_time,"email"=>$email,"mobile"=>$phone,"type"=>$user['role'],"otp"=>$otp,));
        //     else
        //         $row = $this->db->update("users_temp",array("exp_time"=>$date_time,"email"=>$email,"mobile"=>$phone,"type"=>$user['role'],"otp"=>$otp,),array("mobile"=>$phone,));
        //     if($row)
        //     {
        //         $data = array(
        //             "to"=>$email,
        //             "subject"=>"Sign up otp",
        //             "content"=>"This is your one time password ".$otp,
        //             "otp"=>$otp,
        //         );
        //         // $tamplate = $this->parser->parse("mailtamplate/otp",$data,true);
        //         // $this->custom->sendEmail($data,$tamplate);
        //         $result['message'] = "Otp send successfully...";
        //         $result['status']  = "200";
        //     }
        //     else
        //     {
        //         $result['message'] = "Otp not send successfully...";
        //         $result['status']  = "400";
        //         $result['data']    = $user_detail2;
        //     }               
        //     echo json_encode($result);
        // }
        // public function login_by_otp()
        // { 
        //     $result = array();
        //     $phone = $this->input->post('mobile');
        //     $type = $this->input->post('type');
        //     $device_id = $this->input->post('device_id');
        //     $firebase_token = '';

        //     $otp1 = $this->input->post('otp1');
        //     $otp2 = $this->input->post('otp2');
        //     $otp3 = $this->input->post('otp3');
        //     $otp4 = $this->input->post('otp4');
        //     $otp = $otp1.$otp2.$otp3.$otp4;


        //     $this->db->where(" mobile='$phone' or email='$phone' ");
        //     $user = $this->db->get_where("users")->result_array();
        //     $today = strtotime(date("Y-m-d"));
        //     $access_token = '';
        //     $user_detail2 = array(
        //                 "token"=>"",
        //             );



        //     $temp_data = $this->db->get_where("users_temp",array('mobile'=>$phone,"otp"=>$otp,))->result_object();
        //     if(empty($temp_data))
        //     {
        //         $result['message'] = "Invailid otp...";
        //         $result['status']  = "400";
        //         $result['data']    = array();
        //         echo json_encode($result);
        //         die;
        //     }
        //     $temp_data = $temp_data[0];
        //     $datetime_1 = $temp_data->exp_time; 
        //     $datetime_2 = date("Y-m-d H:i:s"); 
        //     $start_datetime = new DateTime($datetime_1); 
        //     $diff = $start_datetime->diff(new DateTime($datetime_2)); 
        //       // echo $diff->days.' Days total<br>'; 
        //       // echo $diff->y.' Years<br>'; 
        //       // echo $diff->m.' Months<br>'; 
        //       // echo $diff->d.' Days<br>'; 
        //       // echo $diff->h.' Hours<br>'; 
        //       // echo $diff->i.' Minutes<br>'; 
        //       // echo $diff->s.' Seconds<br>';
        //     $total_minutes = ($diff->days * 24 * 60); 
        //     $total_minutes += ($diff->h * 60); 
        //     $total_minutes += $diff->i; 
        //     $total_hours = $total_minutes/60;

        //     if($total_minutes>=otp_hours)
        //     {
        //         $result['message'] = "Otp expired...";
        //         $result['status']  = "400";
        //         $result['data']    = array();
        //         echo json_encode($result);
        //         die;
        //     }




        //     if(!empty($user))
        //     {
        //         $user = $user[0];
        //         $password = $user['password'];
                
        //         if($user['status']=="Active" || $user['status']==1)
        //         {
        //             if($type==$user['role'] || 1==1)
        //             {
        //                 if($user['password']==$password)
        //                 {
        //                     $access_token = $this->token_session($user);

        //                     $user_id = $user['id'];
        //                     $user_detail2['token'] = $access_token;

        //                     $result['message'] = "login successfully";
        //                     $result['status']  = "200";
        //                     $result['data']    = $user_detail2;
        //                 }
        //                 else
        //                 {
        //                     $result['message'] = "Wrong Password... ";
        //                     $result['status']  = "400";
        //                     $result['data']    = $user_detail2;
        //                 }
        //             }
        //             else
        //             {
        //                 $result['message'] = "Yor are not authorised for this login";
        //                 $result['status']  = "400";
        //                 $result['data']    = $user_detail2;
        //             }
        //         }
        //         else
        //         {
        //             $result['message'] = "Your Account Is Blocked...";
        //             $result['status']  = "400";
        //             $result['data']    = $user_detail2;
        //         }
            
        //     }
        //     else
        //     {
        //         $result['message'] = "Wrong Mobile no.";
        //         $result['status']  = "400";
        //         $result['data']    = $user_detail2;
        //     }
        //     echo json_encode($result);
        // }
    /* login by otp end */


    /* signup by otp start */
        // public function sign_up()
        // {
        //     $result = array();
        //     $referral_id = $this->input->post('referral_id');
        //     $phone = $this->input->post('mobile');
        //     $name = $this->input->post('name');
        //     $password = $this->input->post('password');
        //     $cpassword = $this->input->post('cpassword');
        //     $type = $this->input->post('type');
        //     $device_id = $this->input->post('device_id');
        //     $firebase_token = $this->input->post('firebase_token');


        //     $check_mobile = $this->db->get_where("users",array('mobile'=>$phone,"is_delete"=>0,))->result_array();
        //     // $check_email = $this->db->get_where("users",array('email'=>$email,"is_delete"=>0,))->result_array();
            
        //     $today = strtotime(date("Y-m-d"));
        //     $user_detail2 = array(
        //             );

        //     if(strlen($phone)!=10)
        //     {
        //         $result['message'] = "Mobile No. Only 10 Digit";
        //         $result['status']  = "400";
        //         $result['data']    = [];
        //         echo json_encode($result);
        //         die;
        //     }


        //     if(!empty($check_mobile))
        //     {
        //         $result['message'] = "This Mobile Allready Use...";
        //         $result['status']  = "400";
        //         $result['data']    = [];
        //         echo json_encode($result);
        //         die;
        //     }

        //     if($password!=$cpassword)
        //     {
        //         $result['message'] = "Confirm Password not match...";
        //         $result['status']  = "400";
        //         $result['data']    = $user_detail2;
        //         echo json_encode($result);
        //         die;
        //     }      

        //     if(empty($password))
        //     {
        //         $result['message'] = "Password is mandatory...";
        //         $result['status']  = "400";
        //         $result['data']    = $user_detail2;
        //         echo json_encode($result);
        //         die;
        //     } 


        //     if(!empty($referral_id))
        //     {
        //         $check_referral = $this->db->get_where("users",array('id'=>$referral_id,"is_delete"=>0,))->result_array();
        //         if(empty($check_referral))
        //         {
        //             $result['message'] = "Wrong referral...";
        //             $result['status']  = "400";
        //             $result['data']    = [];
        //             echo json_encode($result);
        //             die;
        //         }
        //     }


        //     $user_data = array(
        //         "fname"=>$name,
        //         // "referral_id"=>$referral_id,
        //         "mobile"=>$phone,
        //         "password"=>$password,
        //         "role"=>$type,
        //         "image"=>"user.png",
        //         "status"=>1,
        //     );
        //     $user_data['date_time'] = date("Y-m-d H:i:s");
        //     $date_time = date("Y-m-d H:i:s");
        //     $user_data = json_encode($user_data);
            
            
        //     $otp = $this->otp;
        //     if(empty($this->db->get_where("users_temp",array('mobile'=>$phone,))->result_array()))
        //         $row = $this->db->insert("users_temp",array("data"=>$user_data,"exp_time"=>$date_time,"mobile"=>$phone,"type"=>$type,"otp"=>$otp,"device_id"=>$device_id,));
        //     else
        //         $row = $this->db->update("users_temp",array("data"=>$user_data,"exp_time"=>$date_time,"mobile"=>$phone,"type"=>$type,"otp"=>$otp,"device_id"=>$device_id,),array("mobile"=>$phone,));
        //     if($row)
        //     {
        //         $email = '';
        //         $data = array(
        //             "to"=>$email,
        //             "subject"=>"Sign up otp",
        //             "content"=>"This is your one time password ".$otp,
        //             "otp"=>$otp,
        //         );
        //         // $tamplate = $this->parser->parse("mailtamplate/otp",$data,true);
        //         // $this->custom->sendEmail($data,$tamplate);
        //         $result['message'] = "Otp send successfully...";
        //         $result['status']  = "200";
        //         $result['action']  = "login";
        //         $result['url']  = base_url(user_app.'otp?mobile='.$phone);
        //     }
        //     else
        //     {
        //         $result['message'] = "Otp not send successfully...";
        //         $result['status']  = "400";
        //         $result['data']    = $user_detail2;
        //     }
            
                   
        //     echo json_encode($result);
        // }
        // public function sign_up_otp_verify()
        // {
        //     $result = array();
        //     $mobile = $this->input->post('mobile');
        //     $otp1 = $this->input->post('otp1');
        //     $otp2 = $this->input->post('otp2');
        //     $otp3 = $this->input->post('otp3');
        //     $otp4 = $this->input->post('otp4');
        //     $otp = $otp1.$otp2.$otp3.$otp4;
        //     $type = $this->input->post('type');
        //     $check_mobile = $this->db->get_where("users",array('mobile'=>$mobile,))->result_array();
        //     $today = strtotime(date("Y-m-d"));
        //     $user_detail2 = [];

        //     $temp_data = $this->db->get_where("users_temp",array('mobile'=>$mobile,"otp"=>$otp,))->result_object();
        //     if(empty($temp_data))
        //     {
        //         $result['message'] = "Invailid otp...";
        //         $result['status']  = "400";
        //         $result['data']    = array();
        //         echo json_encode($result);
        //         die;
        //     }
        //     $temp_data = $temp_data[0];
        //     $user_data_array = (array) json_decode($temp_data->data);
        //     $device_id = $temp_data->device_id;
            
            

        //     foreach ($user_data_array as $key => $value)
        //     {
        //         if($key!='category' && $key!='service')
        //         {
        //             if($key=='aadhar_front' || $key=='aadhar_back' || $key=='pan_front' || $key=='pan_back')
        //             {
        //                 // $explode = explode(",", $value);
        //                 // $ext = explode("/",(explode(";",$explode[0]))[0])[1];
        //                 // $image_content = base64_decode($explode[1]);
        //                 // $image_time = time().$key.'.'.$ext;
        //                 // if(file_put_contents(APPPATH.'../upload/'.$image_time,$image_content))
        //                 // {
        //                 //     $user_data[$key] = $image_time;
        //                 // }  
        //             }
        //             else
        //             {
        //                 if($value=='undefined')
        //                     $user_data[$key] = '';
        //                 else
        //                     $user_data[$key] = $value;
        //             }
        //         }
        //     }
        //     $password = $user_data['password'];           



        //     $datetime_1 = $temp_data->exp_time; 
        //     $datetime_2 = date("Y-m-d H:i:s"); 
        //     $start_datetime = new DateTime($datetime_1); 
        //     $diff = $start_datetime->diff(new DateTime($datetime_2)); 
        //       // echo $diff->days.' Days total<br>'; 
        //       // echo $diff->y.' Years<br>'; 
        //       // echo $diff->m.' Months<br>'; 
        //       // echo $diff->d.' Days<br>'; 
        //       // echo $diff->h.' Hours<br>'; 
        //       // echo $diff->i.' Minutes<br>'; 
        //       // echo $diff->s.' Seconds<br>';
        //     $total_minutes = ($diff->days * 24 * 60); 
        //     $total_minutes += ($diff->h * 60); 
        //     $total_minutes += $diff->i; 
        //     $total_hours = $total_minutes/60;

        //     if($total_minutes>=otp_hours && 1==2)
        //     {
        //         $result['message'] = "Otp expired...";
        //         $result['status']  = "400";
        //         $result['data']    = array();
        //         echo json_encode($result);
        //         die;
        //     }



        //     $user_data['date_time'] = date("Y-m-d H:i:s");
        //     $user_id = 0;
        //     $this->db->limit(1);
        //     $this->db->order_by("user_id desc");
        //     $last_user = $this->db->get_where("users")->result_object();
        //     if(empty($last_user))
        //     {
        //         $user_id = 100;
        //     }
        //     else
        //     {
        //         $last_user = $last_user[0];
        //         $user_id = $last_user->user_id+1;
        //     }




        //     $user_data['user_id'] = $user_id;
        //     $check1 = $this->db->limit(1)->select("id")->get_where("users",array("mobile"=>$mobile,))->result_object();
        //     if(empty($check1))
        //     {
        //         $user_data['profile_image'] = 'user.png';
        //         $user_data['kyc_step'] = '0';
        //         $user_data['paytm_status'] = '1';
        //         $user_data['point_transfer'] = '1';
        //         $user_data['betting_status'] = '1';
        //         if($this->db->insert("users",$user_data))
        //         {
        //             $insert_id = $this->db->insert_id();

        //             $setting = $this->db->get_where("setting")->result_object()[0];
        //             if($setting->signup_reward>0)
        //             {
        //                 $type = 'credit';
        //                 $amount = $setting->signup_reward;
        //                 $message = "Signup reward";
        //                 $this->custom->wallet_credit_debit($insert_id,$type,$amount,$message,0);
        //             }


        //             $row = true;
        //         }
        //         else
        //         {
        //             $row = false;
        //         }
        //     }
        //     else
        //     {
        //         $insert_id = $check1[0]->id;
        //         $row = true;
        //     }
        //     if($row)
        //     {
        //         $user = $this->db->get_where("users",array("id"=>$insert_id,))->result_array()[0];
        //         $access_token = $this->token_session($user);

        //         $result['message'] = "Sign up successfully...";
        //         $result['status']  = "200";
        //         $result['data']    = $user_detail2;
        //     }
        //     else
        //     {
        //         $result['message'] = "Sign up not successfully...";
        //         $result['status']  = "400";
        //         $result['data']    = $user_detail2;
        //     }        
        //     echo json_encode($result);
        // }
        // public function resend_otp()
        // {
        //     $result = array();
        //     $phone = $this->input->post('mobile');
        //     $user_detail2 = array();
        //     $date_time = date("Y-m-d H:i:s");
            
        //     $otp = $this->otp;
        //     $row = $this->db->update("users_temp",array("otp"=>$otp,"exp_time"=>$date_time,),array("mobile"=>$phone,));
        //     if($row)
        //     {
        //         // $data = array(
        //         //     "to"=>$email,
        //         //     "subject"=>"Sign up otp",
        //         //     "content"=>"This is your one time password ".$otp,
        //         //     "otp"=>$otp,
        //         // );
        //         $result['message'] = "Otp Resend successfully...";
        //         $result['status']  = "200";
        //     }
        //     else
        //     {
        //         $result['message'] = "Otp not send successfully...";
        //         $result['status']  = "400";
        //         $result['data']    = $user_detail2;
        //     }
                 
        //     echo json_encode($result);
        // }
    /* signup by otp end */






    /*  forgot password by otp start */
        // public function forgot_password_otp()
        // {
        //     $result = array();
        //     $phone = $this->input->post('mobile');
        //     $email = $this->input->post('email');
        //     $device_id = $this->input->post('device_id');
        //     $firebase_token = $this->input->post('firebase_token');



        //     $check_mobile = $this->db->get_where("users",array('mobile'=>$phone,"is_delete"=>0,))->result_array();
        //     $check_email = $this->db->get_where("users",array('email'=>$email,"is_delete"=>0,))->result_array();
        //     $today = strtotime(date("Y-m-d"));
        //     $user_detail2 = array(
        //             );

        //     if(empty($check_mobile))
        //     {
        //         $result['message'] = "This Mobile Not Exist...";
        //         $result['status']  = "400";
        //         $result['data']    = [];
        //         echo json_encode($result);
        //         die;
        //     }        
        //     $date_time = date("Y-m-d H:i:s");
            
        //     $user = $check_mobile[0];
        //     $otp = $this->otp;
        //     if(empty($this->db->get_where("users_temp",array('mobile'=>$phone,))->result_array()))
        //         $row = $this->db->insert("users_temp",array("exp_time"=>$date_time,"email"=>$email,"mobile"=>$phone,"type"=>$user['role'],"otp"=>$otp,));
        //     else
        //         $row = $this->db->update("users_temp",array("exp_time"=>$date_time,"email"=>$email,"mobile"=>$phone,"type"=>$user['role'],"otp"=>$otp,),array("mobile"=>$phone,));
        //     if($row)
        //     {
        //         $data = array(
        //             "to"=>$email,
        //             "subject"=>"Sign up otp",
        //             "content"=>"This is your one time password ".$otp,
        //             "otp"=>$otp,
        //         );
        //         // $tamplate = $this->parser->parse("mailtamplate/otp",$data,true);
        //         // $this->custom->sendEmail($data,$tamplate);
        //         $result['message'] = "Otp send successfully...";
        //         $result['status']  = "200";
        //     }
        //     else
        //     {
        //         $result['message'] = "Otp not send successfully...";
        //         $result['status']  = "400";
        //         $result['data']    = $user_detail2;
        //     }               
        //     echo json_encode($result);
        // }
        // public function forgot_otp_verify()
        // {
        //     $result = array();
        //     $mobile = $this->input->post('mobile');
        //     $otp1 = $this->input->post('otp1');
        //     $otp2 = $this->input->post('otp2');
        //     $otp3 = $this->input->post('otp3');
        //     $otp4 = $this->input->post('otp4');
        //     $otp = $otp1.$otp2.$otp3.$otp4;
            
            
        //     $today = strtotime(date("Y-m-d"));
        //     $user_detail2 = [];

        //     $temp_data = $this->db->get_where("users_temp",array('mobile'=>$mobile,"otp"=>$otp,))->result_object();
        //     if(empty($temp_data))
        //     {
        //         $result['message'] = "Invailid otp...";
        //         $result['status']  = "400";
        //         $result['data']    = array();
        //         echo json_encode($result);
        //         die;
        //     }
        //     $temp_data = $temp_data[0];
        //     $datetime_1 = $temp_data->exp_time; 
        //     $datetime_2 = date("Y-m-d H:i:s"); 
        //     $start_datetime = new DateTime($datetime_1); 
        //     $diff = $start_datetime->diff(new DateTime($datetime_2)); 
        //       // echo $diff->days.' Days total<br>'; 
        //       // echo $diff->y.' Years<br>'; 
        //       // echo $diff->m.' Months<br>'; 
        //       // echo $diff->d.' Days<br>'; 
        //       // echo $diff->h.' Hours<br>'; 
        //       // echo $diff->i.' Minutes<br>'; 
        //       // echo $diff->s.' Seconds<br>';
        //     $total_minutes = ($diff->days * 24 * 60); 
        //     $total_minutes += ($diff->h * 60); 
        //     $total_minutes += $diff->i; 
        //     $total_hours = $total_minutes/60;

        //     if($total_minutes>=otp_hours)
        //     {
        //         $result['message'] = "Otp expired...";
        //         $result['status']  = "400";
        //         $result['data']    = array();
        //         echo json_encode($result);
        //         die;
        //     }

        //     $this->session->set_userdata(array("temp_session_id"=>$mobile,));

        //     $result['message'] = "OTP match successfully...";
        //     $result['status']  = "200";
        //     $result['data']    = [];           
        //     echo json_encode($result);
        // }
        // public function newpassword()
        // {
        //     $result = array();
        //     $mobile = $this->input->post('mobile');
        //     $npassword = $this->input->post('npassword');
        //     $cpassword = $this->input->post('cpassword');
            
            
        //     $today = strtotime(date("Y-m-d"));
        //     $user_detail2 = [];

        //     $temp_data = $this->db->select('id')->get_where("users",array('mobile'=>$mobile,))->result_object();
        //     if(empty($temp_data))
        //     {
        //         $result['message'] = "Error...";
        //         $result['status']  = "400";
        //         $result['data']    = [];
        //         echo json_encode($result);
        //         die;
        //     }
        //     if($npassword!=$cpassword)
        //     {
        //         $result['message'] = "Confirm Password not match...";
        //         $result['status']  = "400";
        //         $result['data']    = [];
        //         echo json_encode($result);
        //         die;
        //     }      

        //     if(empty($npassword))
        //     {
        //         $result['message'] = "Password is mandatory...";
        //         $result['status']  = "400";
        //         $result['data']    = [];
        //         echo json_encode($result);
        //         die;
        //     }
        //     if($this->db->update("users",array("password"=>$npassword,),array("mobile"=>$mobile,)))
        //     {
        //         $this->session->unset_userdata('temp_session_id');
        //         $result['message'] = "Create successfully...";
        //         $result['status']  = "200";
        //         $result['data']    = [];
        //     }
        //     else
        //     {
        //         $result['message'] = "Create Not successfully...";
        //         $result['status']  = "400";
        //         $result['data']    = [];
        //     }

        //     echo json_encode($result);
        // }
    /*  forgot password by otp end */










    




    public function logout()
    {
        $u = $this->session->userdata('user');
        if(!empty($u))
        {
            $id = $this->session->userdata['user']['id'];
            $this->db->update("login_history",array("status"=>0,),array("user_id"=>$id,"status"=>1,));

            
            $this->session->unset_userdata('user');
            $this->session->unset_userdata('role');
            redirect(base_url(user_app.'login.php?device_id='.$this->session->userdata("device_id").'&firebase_token='.$this->session->userdata("firebase_token")));
        }
        else
        {
            redirect(base_url(user_app.'login.php?device_id='.$this->session->userdata("device_id").'&firebase_token='.$this->session->userdata("firebase_token")));
        }
    }
    
    public function device_logout()
    {
        $u = $this->session->userdata('user');
        $device_id = $this->input->post('device_id');
        
        // $id = $this->session->userdata['user']['id'];
        $this->db->update("login_history",array("status"=>0,),array("device_id"=>$device_id,"status"=>1,));
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('role'); 

        $result['message'] = "successfully...";
        $result['status']  = "200";
        $result['data']    = [];  
        echo json_encode($result);     
    }



}