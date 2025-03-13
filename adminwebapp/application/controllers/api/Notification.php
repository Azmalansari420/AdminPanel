<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller 
{
     
    public function __construct()
    {
        parent::__construct();
    }



    public function notificationlist()
    {
        $result = array();
        $html = '';
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
        $notification = $this->db->get_where('notification',array('type'=>1,))->result_object();
        
        if(!empty($notification))
        {
            $response_data['data'] = $notification;
            $html = $this->load->view('app/user/include/notification-list',$response_data,true);

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





    /*status change*/
    public function clciktoupdatenotification_status()
        {
            $result = array();
            $status = '';
            $id = $this->input->post('id');
            $user_id = $this->input->post('user_id');
            
            if(!empty($id) && !empty($user_id))
            {
                // Check if the user has already marked this notification as read
                $this->db->where('notification_id', $id);
                $this->db->where('user_id', $user_id);
                $notification_status = $this->db->get('notification_status')->row();

                if ($notification_status) 
                {
                    $this->db->where('id', $notification_status->id);
                    $this->db->update('notification_status', array('status' => 1));
                }
                else
                {
                   $insertdata = array(
                        'notification_id' => $id,
                        'user_id' => $user_id,
                        'status' => 1  
                    );
                    $this->db->insert('notification_status', $insertdata); 
                }

                $unread_count = count_unread_notifications($user_id);

                $ticket = $this->db->get_where('notification_status',array('notification_id'=>$id))->result_object();                
                $status = notification_status($ticket[0]->status);

                $result['status']  = "200";
                $result['message'] = "Mark as Read.";
                $result['data']  = $insertdata;
                $result['status']  = $status;
                $data['unread_count'] = $unread_count;
            }
            else
            {
                $result['message'] = "User not found";
                $result['status']  = "400";
                $result['data']    = array();
                $result['status']  = '';
                $data['unread_count'] = $unread_count;
            }
            echo json_encode($result);
        }




































}