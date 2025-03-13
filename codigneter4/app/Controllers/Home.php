<?php

namespace App\Controllers;
use App\Models\EmailModel;

class Home extends BaseController
{


    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }






















    /*website */
    public function all($page = null)
    {
        $data = [];
        $table_name = '';
        $p_id = '';
        // Get the full base URL
        $request = service('request');
        $base = base_url();
        $slug = $url = $request->getUri()->getSegment(1);
        if(empty($page))
        {
            $url = 'home';
            $page = 'index.php';
        }
        // Check if the slug exists in the database
        $slug_data = $this->db->table("slugs")
            ->where("slug", $url)
            ->get()
            ->getResultObject();

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
            if (count($count) == 1) {
                $page = $count[0] . '.php';
            } else {
                $page = $count[0] . '.' . $count[1];
            }
        }

        $check_page = ROOTPATH . 'app/Views/website/' . $page;

        $meta_data = load_meta_tags();
        $data['meta_data'] = $meta_data;
        $data['sitesetting'] = ($this->db->table('site_setting')->getWhere(["id"=>1,])->getRow());
        $data['db'] = $this->db;
        $data['request'] = $this->request;
        $data['slug'] = $slug;
        $data['id'] = 0;


        if (file_exists($check_page)) {

            if (!empty($table_name)) {
                $data['row_data'] = $this->db->table($table_name)
                    ->where("id", $p_id)
                    ->get()
                    ->getRow();
                if(!empty($data['row_data']))
                {
                    $data['id'] = $data['row_data']->id;
                }
                $data['EDITDATA'] = $data['row_data'];

            }

            return view('website/' . $page, $data);
        } else {
            return view('website/404', $data);
        }
    }





   public function enquiry_form()
    {

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $mobile = $this->request->getPost('mobile');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');
        $addeddate = date('Y-m-d H:i:s');

        $insertData = [
            "name"    => $name,
            "email"   => $email,
            "mobile"  => $mobile,
            "subject" => $subject,
            "message" => $message,
            "addeddate" => $addeddate,
        ];


        $this->db->table("contact")->insert($insertData); 

        return redirect()->to(base_url('thankyou'))->with('success', 'Enquiry submitted successfully!');
    }





    /*with mailer*/
    // public function enquiry_form()
    // {

    //     $name = $this->request->getPost('name');
    //     $email = $this->request->getPost('email');
    //     $mobile = $this->request->getPost('mobile');
    //     $subject = $this->request->getPost('subject');
    //     $message = $this->request->getPost('message');
    //     $addeddate = date('Y-m-d H:i:s');

    //     $insertData = [
    //         "name"    => $name,
    //         "email"   => $email,
    //         "mobile"  => $mobile,
    //         "subject" => $subject,
    //         "message" => $message,
    //         "addeddate" => $addeddate,
    //     ];

    //     $emailMessage = "
    //         <h3 align='center'>Form Details</h3>
    //         <table border='1' width='100%' cellpadding='5' cellspacing='5'>
    //             <tr><td width='30%'>Name</td><td width='70%'>$name</td></tr>
    //             <tr><td width='30%'>Phone</td><td width='70%'>$mobile</td></tr>
    //             <tr><td width='30%'>Email</td><td width='70%'>$email</td></tr>
    //             <tr><td width='30%'>Subject</td><td width='70%'>$subject</td></tr>
    //             <tr><td width='30%'>Message</td><td width='70%'>$message</td></tr>
    //         </table>
    //     ";

    //     // Load the EmailModel
    //     $emailModel = new EmailModel();
    //     $emailSent = $emailModel->sendEmail($email, $subject, $emailMessage);

    //     $this->db->table("contact")->insert($insertData); 

    //     return redirect()->to(base_url('thankyou'))->with('success', 'Enquiry submitted successfully!');
    // }






















}
