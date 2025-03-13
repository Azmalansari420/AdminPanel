<?php

namespace App\Controllers\admin_con;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use App\Models\Crud;

class Contact extends BaseController
{
    protected $arr_values = [
        'page_title'      => 'Contact',
        'table_name'      => 'contact',
        'upload_path'     => 'uploads/contact/',
        'load_path'       => 'admin/contact/',
        'add_page'        => 'admin/contact/add_page',
        'add_new_entryURL'=> 'admin/contact/add_new_entryURL',
        'get_table_data'  => 'admin/contact/get_table_data',
        'update_status'   => 'admin/contact/update_status',
        'multiple_delete' => 'admin/contact/delete_all',
        'edit_url'        => 'admin/contact/edit_page/',
        'update_page'     => 'admin/contact/update_page/',
        'singledelete_url'=> 'admin/contact/singledelete',
        'delete_all'      => 'admin/contact/delete_all',
        'pagination_limit'=> 15,
        'table_url'       => 'admin/contact/table',
        'controller_name' => 'contact',
        'page_name'       => 'contact.php',
        'add_message'     => 'contact Added Successfully',
        'update_message'  => 'contact Updated Successfully',
        'failed_message'  => 'contact Update Failed',
    ];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->crud = new Crud();
        check_controller_access(4);
    }



    public function listing()
    {
        check_controller_inner_access(4,1);
        $data['page_title'] = $this->arr_values['page_title'];
        $data['add_page'] = $this->arr_values['add_page'];
        $data['get_table_data'] = $this->arr_values['get_table_data'];
        $data['update_status'] = $this->arr_values['update_status'];
        $data['multiple_delete'] = $this->arr_values['multiple_delete'];
        $data['delete_all'] = $this->arr_values['delete_all'];

        $data['ALLDATA'] = $this->db->table($this->arr_values['table_name'])->get()->getResult();
        return view($this->arr_values['load_path'] . 'list', $data);
    }

    /*load all table data with logic/search*/
    public function getTableData()
    {    
        check_controller_inner_access(4,1);    
        // Request parameters
        $search = $this->request->getPost('search');
        $limit = $this->arr_values['pagination_limit'];
        $offset = $this->request->getPost('offset');

        // Database query
        $builder = $this->db->table($this->arr_values['table_name']);
        $builder->orderBy('id', 'DESC');
        $builder->like('name', $search);
        $builder->orLike('email', $search);
        $builder->orLike('mobile', $search);
        $query = $builder->get($limit, $offset);
        $data['ALLDATA'] = $query->getResult();

        // Total rows for pagination
        $totalRowsBuilder = $this->db->table($this->arr_values['table_name']);
        $total_rows = $totalRowsBuilder->countAllResults();
        
        // Pagination links
        $pagination_links = '';
        $current_page = ($offset / $limit) + 1;

        if ($total_rows > $limit) {
            for ($i = 0; $i < ceil($total_rows / $limit); $i++) {
                $activeClass = ($i == $current_page - 1) ? 'active-page' : '';
                $pagination_links .= '<a href="javascript:void(0);" class="pagination-link btn btn-primary btn-sm ' . $activeClass . '" style="margin: 5px 3px; border-radius: 25%; font-weight: bold;" data-offset="' . ($i * $limit) . '">' . ($i + 1) . '</a>';
            }
        }

        $data['pagination_links'] = $pagination_links ?: '';
        $total_pages = ceil($total_rows / $limit);

        // URLs
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['edit_url'] = base_url($this->arr_values['edit_url']);
        $data['singledelete_url'] = $this->arr_values['singledelete_url'];


        $defineVariable = [
            'ALLDATA' => $data['ALLDATA'],
            'upload_path' => $data['upload_path'],
            'edit_url' => $data['edit_url'],
            'singledelete_url' => $data['singledelete_url'],
            'limit' => $limit,
            'total_rows' => $total_rows,
            'offset' => $offset,
            'total_pages' => $total_pages,
        ];

        $html = view($this->arr_values['table_url'], $defineVariable);

        return $this->response->setJSON([
            'html' => $html,
            'pagination_links' => $data['pagination_links'],
            'limit' => $limit
        ]);
    }



   

    public function edit_page($id)
    {
        check_controller_inner_access(4,3);
        $data['EDITDATA'] = $this->db->table($this->arr_values['table_name'])->where('id', $id)->get()->getRow();
        $data['page_title'] = $this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['update_page'] = $this->arr_values['update_page'];
        return view($this->arr_values['load_path'] . 'edit', $data);
    }




    /*single delete*/
    public function singledelete($id)
    {
        check_controller_inner_access(4,4);
        $builder = $this->db->table($this->arr_values['table_name']);
        $deleteStatus = $builder->delete(['id' => $id]);
        if ($deleteStatus) 
        {
            return $this->response->setJSON(['status' => 'success']);
        } 
        else 
        {
            return $this->response->setJSON(['status' => 'error']);
        }
    }

    /*delte multiple*/
    public function delete_all()
    {
        check_controller_inner_access(4,4);
        $ids = $this->request->getPost('id');
        
        if (!empty($ids)) {
            $builder = $this->db->table($this->arr_values['table_name']);
            $deleteStatus = $builder->whereIn('id', $ids)->delete();

            if ($deleteStatus) {
                return $this->response->setJSON(['status' => 'success']);
            } else {
                return $this->response->setJSON(['status' => 'error']);
            }
        }
    }













}
