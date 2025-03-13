<?php
   use CodeIgniter\Database\BaseConnection;


   /*for controller*/
   function check_admin_login()
    {
        $session = session(); // Load session
        $admin = $session->get('admin'); // Retrieve admin session

        if (!$admin || !isset($admin['isLoggedIn']) || $admin['isLoggedIn'] !== true) {
            return redirect()->to(base_url('admin'))->send(); // Redirect if not logged in
        }
    }

   
   /*check if admin login or not*/
   function isAdminLoggedIn()
   {
       $session = session();
       return $session->get('admin') ? true : false;
   }
   
   /*get admin id*/
   function getAdminId()
   {
       $db = \Config\Database::connect();
       $session = session();  
       $adminSession = $session->get('admin');
   
       if (!$adminSession) {
           return null;
       }
   
       $admin_id = $adminSession['id'];
       $check = $db->table('tbl_admin')
           ->where('id', $admin_id)
           ->get()
           ->getRow();
   
       return $check ?? null;
   }
   
   
   /*status*/
   function status($value)
   {
     $string = '';
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
   
   
   
   /*slug*/
   
   function slug($string) 
    { 
     $string = trim($string);$string=strtolower($string);
     $string =preg_replace("/[^a-z0-9_ोौेैा्ीिीूुंःअआइईउऊएऐओऔकखगघचछजझञटठडढतथदधनपफबभमयरलवसशषहश्रक्षटठडढङणनऋड़\s-]/u", "", $string);
     $string = preg_replace("/[\s-]+/", " ", $string);
     $string = preg_replace("/[\s]/", '-', $string);
     return $string ;
    }
   
   
    function load_meta_tags()
   {
       $html = '';
       
       $db = \Config\Database::connect();
       $request = \Config\Services::request();
       $url = $request->getUri()->getPath(); 
       
       if (empty($url)) {
           $url = 'home';
       }
   
       // Select meta fields
       $meta_select = "page_name, meta_title, meta_keyword, meta_description, meta_auther";
       
       // Fetch meta data
       $meta_data = $db->table("meta_tags")
           ->select($meta_select)
           ->where("slug", $url)
           ->get()
           ->getResultObject();
   
       // Initialize meta variables
       $meta_title = '';
       $meta_keyword = '';
       $meta_description = '';
       $meta_auther = '';
   
       if (!empty($meta_data)) {
           $meta_data = $meta_data[0];
           $meta_title = $meta_data->meta_title;
           $meta_keyword = $meta_data->meta_keyword;
           $meta_description = $meta_data->meta_description;
           $meta_auther = $meta_data->meta_auther;
       } else {
           // Fetch default home meta tags
           $meta_data = $db->table("meta_tags")
               ->select($meta_select)
               ->where(["slug" => 'home'])
               ->limit(1)
               ->get()
               ->getResultObject();
   
           if (!empty($meta_data)) {
               $meta_data = $meta_data[0];
               $meta_title = $meta_data->meta_title;
               $meta_keyword = $meta_data->meta_keyword;
               $meta_description = $meta_data->meta_description;
               $meta_auther = $meta_data->meta_auther;
           }
       }
   
       // Generate meta tags HTML
       $html = '
           <title>' . esc($meta_title) . '</title>
           <meta name="keywords" content="' . esc($meta_keyword) . '">
           <meta name="description" content="' . esc($meta_description) . '"> 
           <meta name="author" content="' . esc($meta_auther) . '">
       ';
   
       return $html;
   }
   
   function activityRecord()
   {
       $sessionData = getAdminId();
       if (!$sessionData) {
           return redirect()->to(base_url('admin'));
       }
   
       $admin_id = $sessionData->id;
       $username = $sessionData->username;
       $password = $sessionData->password;
   
       $ip_address = service('request')->getIPAddress();
       $current_url = current_url();
       $date = date('Y-m-d');
       $time = date('h:i:s A');
   
       $insertData = [
           'ip_addreass'    => $ip_address,
           'url'            => $current_url,
           'date'           => $date,
           'time'           => $time,
           'admin_id'       => $admin_id,
           'admin_username' => $username,
           'admin_password' => $password
       ];
   
       $db = \Config\Database::connect();
       $builder = $db->table('activity_records');
       return $builder->insert($insertData); 
   }
   

/*roles*/
    function access_array()
    {
      $access_array = array(
        "1"=>"List",
        "2"=>"Add",
        "3"=>"Edit",
        "4"=>"Delete",
        // "5"=>"Status Update",
        // "6"=>"View",
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
        "4"=>"Contact Enquiry",
      );
      return $access_array;
    }

    /*check admin login */
    function get_user()
    {
        $session = session();
        $db = \Config\Database::connect();

        $userId = $session->get('admin')['id'] ?? null;

        if (!$userId) {
            return redirect()->to(base_url('admin'));
        }

        $user = $db->table('tbl_admin')->where('id', $userId)->get()->getRow();

        return ['full_detail' => $user ?? null];
    }

    

    /*--------check controller access----*/
    function check_controller_access($controller_id)
    {
        $db = \Config\Database::connect();
        $user = get_user()['full_detail'] ?? null;

        // If the user is not logged in, redirect to access denied
        if (!$user) {
            header("Location: " . base_url('admin/access_denied'));
            exit;
        }

        $role = $user->role;
        $type = $user->type;

        
        if ($type == 1) {
            return true;
        }

        // Get role access data
        $role_data = $db->table('role')->where('id', $role)->get()->getRow();

        if (!$role_data) 
        {
            header("Location: " . base_url('admin/access_denied'));
            exit;
        }

        // Check if the role has access to the given controller ID
        $access = json_decode($role_data->role_access, true);
        $main_access = $access['main_access'] ?? [];

        if (!in_array($controller_id, $main_access)) {
            header("Location: " . base_url('admin/access_denied'));
            exit;
        }

        return true; // User has access
    }




    /*---check page access*/
    function check_controller_inner_access($controller_id, $inner_id)
    {
        $db = \Config\Database::connect();
        $user = get_user()['full_detail'] ?? null;

        // If the user is not logged in, redirect and stop execution
        if (!$user) {
            header("Location: " . base_url('admin/access_denied'));
            exit;
        }

        $role = $user->role;
        $type = $user->type;

        // Super admin (type == 1) has full access
        if ($type == 1) {
            return true;
        }

        // Get role access data
        $role_data = $db->table('role')->where('id', $role)->get()->getRow();

        if (!$role_data) {
            header("Location: " . base_url('admin/access_denied'));
            exit;
        }

        $access = json_decode($role_data->role_access, true);
        $main_access = $access['main_access'] ?? [];
        
        // Check if the user has main controller access
        if (!in_array($controller_id, $main_access)) {
            header("Location: " . base_url('admin/access_denied'));
            exit;
        }

        // Check if the user has inner page access
        if (!isset($access['inner_access'][$controller_id]) || !in_array($inner_id, $access['inner_access'][$controller_id])) {
            header("Location: " . base_url('admin/access_denied'));
            exit;
        }

        return true; // User has access
    }

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   ?>