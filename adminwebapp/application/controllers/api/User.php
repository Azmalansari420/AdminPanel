<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
     
    public function __construct()
    {
        parent::__construct();
    }




    /*per bet play history*/
    public function passbook()
    {
        $result = array();
        $html = '';
        $user_id = $this->session->userdata("user")['id']; 
        $page = $this->input->post("page");
        $limit = 10;
        $offset = 0;

        if($page>0)
        {
            $offset = $page*$limit;
        }
        $this->db->limit($limit,$offset);

        $today = date('Y-m-d');
        $this->db->order_by('id desc');
        $notification = $this->crud->selectDataByMultipleWhere('user_history',array('user_id'=>$user_id,));

        if(!empty($notification))
        {
            $response_data['data'] = $notification;
            $html = $this->load->view('app/user/include/passbook-card',$response_data,true);

            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = $html;
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'No More';
            $result['data'] = [];
        }
        echo json_encode($result);
    }



    /*per bet play history*/
    public function play_history()
    {
        $result = array();
        $html = '';
        $user_id = $this->session->userdata("user")['id']; 
        $page = $this->input->post("page");
        $limit = 10;
        $offset = 0;

        if ($page > 0) {
            $offset = $page * $limit;
        }

        $this->db->limit($limit, $offset);

        $today = date('Y-m-d');
        $this->db->group_by('request_id');
        $this->db->order_by('id desc');
        $notification = $this->crud->selectDataByMultipleWhere('game_bet', array('user_id' => $user_id));

        if (!empty($notification)) {
            // Calculate the total amount for each request_id
            foreach ($notification as $key => $aValue) {
                $totalAmount = 0;
                // Get the related data for the request_id
                $betDetails = $this->crud->selectDataByMultipleWhere('game_bet', array('request_id' => $aValue->request_id));
                foreach ($betDetails as $bet) {
                    $totalAmount += $bet->amount;
                }
                // Add totalAmount to the result data
                $notification[$key]->totalAmount = $totalAmount;
            }

            $response_data['data'] = $notification;
            $html = $this->load->view('app/user/include/play-history-card', $response_data, true);

            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = $html;
        } else {
            $result['status'] = '400';
            $result['message'] = 'No More';
            $result['data'] = [];
        }
        echo json_encode($result);
    }




    /*----click to update profule image--*/
    public function update_image()
    {
        $result = array();
        $user_data = array();        
      
        $user_id = $this->input->post('user_id');
        $image = $this->input->post('image');
       
        if(!empty($user_id))
        {
            if ($image)
            {
                $image_content = base64_decode(explode(",", $image)[1]);
                $image_time = time().$user_id.'user_profile.png';
                $image_path = 'media/uploads/users/'.$image_time;

                if(file_put_contents($image_path, $image_content)) 
                {
                    $user_data = array(
                        "profile_image"=>$image_time,
                    );
                    if($this->db->update("users",$user_data,array('id' => $user_id, )))
                    {
                        $result['message'] = "Update successfully.";
                        $result['status']  = "200";
                    }
                    else
                    {
                        $result['message'] = "Update not successfully.";
                        $result['status']  = "400";
                    }                   
                }
            }
            else
            {
                $result['message'] = "Upload Image first.";
                $result['status']  = "400";
            }            
        }
        else
        {
            $result['message'] = "Please Enter Crrect User ID.";
            $result['status']  = "400";
        }
        echo json_encode($result);      
    }



    /*-----click to update profile data----------*/
    public function update_profile()
    {
        $result = array();

        $user_id = $this->input->post("user_id");
        $name = $this->input->post("name");
        // $mobile = $this->input->post("mobile");
        $email = $this->input->post("email");
        


        $checkemail = $this->crud->selectDataByMultipleWhere('users',array('email'=>$email,'id !=' => $user_id));
        if(!empty($checkemail))
        {
            $result['message'] = "Email Already Registerd.";
            $result['status']  = "400";
            $result['data']    = array();
            echo json_encode($result);
            die;
        }
        

        $user = $this->db->get_where("users",array('id'=>$user_id,))->result_object();
        if(!empty($user))
        {
            $data = array(                
                "name"=>$name,
                // "mobile"=>$mobile,
                "email"=>$email,
            );
            $this->db->update("users",$data,array("id"=>$user_id,));

            $result['status']  = "200";
            $result['message'] = "Update Successfully.";
            $result['data']  = $data;
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }



    /*update passweoerf*/
    public function password_update()
    {
        
        $user_id = $this->session->userdata("user")['id']; 
        $oldpassword = $this->input->post("oldpassword");
        $npassword = $this->input->post("npassword");
        $cpassword = $this->input->post("cpassword");

        $user = $this->db->get_where("users",array('id'=>$user_id,))->result_object();
        if(!empty($user))
        {
            $user = $user[0];
            if($user->password!=$oldpassword)
            {
                $result['status']  = "400";
                $result['message'] = "Old password not match...";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }
            if($npassword!=$cpassword)
            {
                $result['status']  = "400";
                $result['message'] = "Confirm password not match...";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }
            if($user->password == $npassword) 
            {
                $result['status'] = "400";
                $result['message'] = "New password cannot be the same as old password.";
                $result['data'] = array();
                echo json_encode($result);
                die;
            }

            $data = array(
                "password"=>$npassword,
            );
            $this->db->update("users",$data,array("id"=>$user_id,));
            $result['status']  = "200";
            $result['message'] = "Update successfully...";
            $result['action']  = "add";            
            $result['data']    = array();
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['balance']  = "0";
            $result['data']    = array();
        }
        echo json_encode($result);
    }

    
































   



    


    


    /*contacct Enquiry*/

       public function contact_enquiry()
    {
        $result = array();

        $user_id = $this->input->post("user_id");
        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $mobile = $this->input->post("mobile");
        $subject = $this->input->post("subject");
        $message = $this->input->post("message");
        $addeddate = date('Y-m-d H:i:s ');
       
        if(!empty($user_id))
        {
            $insertdata = array(                
                "name"=>$name,
                "mobile"=>$mobile,
                "email"=>$email,
                "subject"=>$subject,
                "message"=>$message,
                "user_id"=>$user_id,
                "addeddate"=>$addeddate,
            );
            
            $this->db->insert("contact",$insertdata);

            $result['status']  = "200";
            $result['message'] = "Enquiry Submit Successfully.";
            $result['data']  = $insertdata;
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }


    

 

  











































  /*---stilll not used---*/

   

   

   
   
    
}
