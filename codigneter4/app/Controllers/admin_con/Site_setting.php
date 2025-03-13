<?php

namespace App\Controllers\admin_con;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use App\Models\Crud;

class Site_setting extends BaseController
{
    protected $arr_values = [
        'page_title'      => 'Setting',
        'table_name'      => 'site_setting',
        'upload_path'     => 'uploads/site_setting/',
        'load_path'       => 'admin/site_setting/',
        'get_table_data'  => 'admin/site_setting/get_table_data',
        'update_status'   => 'admin/site_setting/update_status',
        'edit_url'        => 'admin/site_setting/edit_page/',
        'update_page'     => 'admin/site_setting/update_page/',
        'add_message'     => 'Setting Added Successfully',
        'update_message'  => 'Setting Update Successfully',
        'failed_message'  => 'Setting Update Failed',
    ];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->crud = new Crud();
        check_controller_access(2);
    }



  


    public function edit_page($id)
    {
        check_controller_inner_access(2,3);
        $data['EDITDATA'] = $this->db->table($this->arr_values['table_name'])->where('id', $id)->get()->getRow();
        $data['page_title'] = $this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['update_page'] = $this->arr_values['update_page'];
        return view($this->arr_values['load_path'] . 'edit', $data);
    }

    public function update_dataURL($id)
    {
        check_controller_inner_access(2,3);
        $mobile = $this->request->getPost('mobile');
        $alt_mobile = $this->request->getPost('alt_mobile');
        $whatsapp_no = $this->request->getPost('whatsapp_no');
        $email = $this->request->getPost('email');
        $alt_email = $this->request->getPost('alt_email');
        $address = $this->request->getPost('address');
        $facebook = $this->request->getPost('facebook');
        $twitter = $this->request->getPost('twitter');
        $instagram = $this->request->getPost('instagram');
        $youtube = $this->request->getPost('youtube');
        $map = $this->request->getPost('map');

        // Handle image upload
        $logo = $this->request->getFile('logo');
        $oldlogo = $this->request->getPost('oldlogo');

        if ($logo && $logo->isValid()) 
        {
            $logoName = $logo->getName();
            $uploadPath = FCPATH . $this->arr_values['upload_path'];

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            if (!$logo->move($uploadPath)) 
            {
                $logoName = '';
            }
        }
        else 
        {
            $logoName = $oldlogo;
        }

        // Prepare the data to update
        $updatedata = [
            'mobile' => $mobile,
            'alt_mobile' => $alt_mobile,
            'whatsapp_no' => $whatsapp_no,
            'email' => $email,
            'alt_email' => $alt_email,
            'address' => $address,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube,
            'map' => $map,
            'logo' => $logoName,
        ];

        $updateStatus = $this->db->table($this->arr_values['table_name'])
                   ->where('id', $id) 
                   ->update($updatedata);


        if ($updateStatus) 
        {
            session()->setFlashdata('message', $this->arr_values['update_message']);
            return redirect()->back();
        } else {
            session()->setFlashdata('message', $this->arr_values['failed_message']);
            return redirect()->back();
        }
    }

   
  













}
