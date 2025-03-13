<?php

namespace App\Controllers\admin_con;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;

class AdminController extends BaseController
{

    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    public function index()
    {
        return view('admin/login');  // Loads login.php view
    }

    public function access_denied()
    {
        return view('admin/access-denied');  // Loads login.php view
    }




    public function login()
    {
        $session = session();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $check = $this->db->table('tbl_admin')
            ->where(['username' => $username, 'status' => 1])
            ->get()
            ->getRow();

        if($check) 
        { 
            if ($password === $check->password) 
            {
                $sessionData = [
                    "isLoggedIn" => true,
                    "username"   => $username,
                    "id"         => $check->id,
                ];

                $session->set("admin",$sessionData);

                return redirect()->to(base_url('admin/dashboard'));
            } 
            else {
                $session->setFlashdata('error', 'Invalid Username or Password');
                return redirect()->to(base_url('admin'));  // Redirect back to login
            }
        } 
        else 
        {
            $session->setFlashdata('error', 'Invalid Username or Password');
            return redirect()->to(base_url('admin')); 
        }
    }

    /*dashbaord*/
    public function dashboard()
    {
        $data['sessionData'] = getAdminId();
        if (!isAdminLoggedIn()) {
            return redirect()->to(base_url('admin')); 
        }        
        return view('admin/dashboard',$data);
    }




    /*update admin setting*/

    public function edit_profile()
    {
        $sessionData = getAdminId();  // Retrieve admin session
        if (!$sessionData) {
            return redirect()->to(base_url('admin'));
        }
        $admin_id = $sessionData->id;

        $check = $this->db->table('tbl_admin')
            ->where('id', $admin_id)
            ->get()
            ->getRow();
        $data['EDITDATA'] = $check;
        
        return view('admin/edit-profile',$data);
    }


    public function update_edit_profile()
    {
        $data['sessionData'] = getAdminId();
        $sessionData = getAdminId();  // Retrieve admin session
        if (!$sessionData) {
            return redirect()->to(base_url('admin'));
        }
        $admin_id = $sessionData->id;

        // Fetch the posted data from the form
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $mobile = $this->request->getPost('mobile');
        $email = $this->request->getPost('email');
        $gender = $this->request->getPost('gender');
        $dob = $this->request->getPost('dob');
        $martial = $this->request->getPost('martial');
        $age = $this->request->getPost('age');
        $country = $this->request->getPost('country');
        $state = $this->request->getPost('state');
        $address = $this->request->getPost('address');

        // Handle the image upload
        $image = $this->request->getFile('image');
        $uploadPath = FCPATH . 'uploads/'; 
        $bimage = '';  

        if ($image && $image->isValid() && !$image->hasMoved()) 
        {
            $newName = time() . '.' . $image->getExtension();
            $image->move($uploadPath, $newName);  
            $bimage = $newName;  
        } else 
        {
            $oldImage = $this->request->getPost('oldimage');
            if ($oldImage) {
                $bimage = $oldImage; 
            }
        }

        $check = $this->db->table('tbl_admin')
            ->where('id', $admin_id)
            ->get()
            ->getRow();
        $data['EDITDATA'] = $check;

        if ($check) 
        {
            $updatedata = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "username" => $username,
                "mobile" => $mobile,
                "email" => $email,
                "gender" => $gender,
                "dob" => $dob,
                "martial" => $martial,
                "age" => $age,
                "country" => $country,
                "state" => $state,
                "address" => $address,
                "image" => $bimage, 
                "password" => $password,
            ];

           
            // Update the admin profile in the database
            $this->db->table('tbl_admin')->update($updatedata, ['id' => $admin_id]);
            session()->setFlashdata('message', 'Profile updated successfully!');
            return redirect()->to(base_url('admin/dashboard'));
        } else {
            session()->setFlashdata('message', 'Admin not found');
        }

        return redirect()->to(base_url('admin/edit_profile'));
    }





































    /*logout*/
    public function logout()
    {
        $session = session();
        $session->remove('admin');
        return redirect()->to(base_url('admin'));
    }


}
