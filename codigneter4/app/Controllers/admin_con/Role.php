<?php

namespace App\Controllers\admin_con;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use App\Models\Crud;

class Role extends BaseController
{
    protected $arr_values = [
        'page_title'      => 'Role',
        'table_name'      => 'role',
        'upload_path'     => 'uploads/role/',
        'load_path'       => 'admin/role/',
        'add_page'        => 'admin/role/add_page',
        'add_new_entryURL'=> 'admin/role/add_new_entryURL',
        'get_table_data'  => 'admin/role/get_table_data',
        'update_status'   => 'admin/role/update_status',
        'multiple_delete' => 'admin/role/delete_all',
        'edit_url'        => 'admin/role/edit_page/',
        'update_page'     => 'admin/role/update_page/',
        'singledelete_url'=> 'admin/role/singledelete',
        'delete_all'      => 'admin/role/delete_all',
        'pagination_limit'=> 15,
        'table_url'       => 'admin/role/table',
        'controller_name' => 'role',
        'page_name'       => 'role.php',
        'add_message'     => 'role Added Successfully',
        'update_message'  => 'role Updated Successfully',
        'failed_message'  => 'role Update Failed',
    ];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->crud = new Crud();
        check_controller_access(0);
    }



    public function listing()
    {
        check_controller_inner_access(0,1);
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
        check_controller_inner_access(0,1);
        // Request parameters
        $search = $this->request->getPost('search');
        $limit = $this->arr_values['pagination_limit'];
        $offset = $this->request->getPost('offset');

        // Database query
        $builder = $this->db->table($this->arr_values['table_name']);
        $builder->orderBy('id', 'DESC');
        $builder->like('name', $search);
        $builder->orLike('id', $search);
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

    /*click to upadte status*/
    public function clicktoupdatestatus()
    {
        check_controller_inner_access(0,5);
        $status = $this->request->getPost('status');
        $id = $this->request->getPost('id');

        $builder = $this->db->table($this->arr_values['table_name']);
        $builder->update(['status' => $status], ['id' => $id]);
        $status_html = status($status);
        $data = [
            'data' => [
                'status' => $status_html
            ]
        ];
        return $this->response->setJSON($data);
    }

    /*add neeww*/

    public function add_page()
    {
        check_controller_inner_access(0,2);
        $data['page_title'] = $this->arr_values['page_title'];
        $data['add_new_entryURL'] = $this->arr_values['add_new_entryURL'];
        return view($this->arr_values['load_path'] . 'add', $data);
    }

    // add data
    public function add_new_entryURL()
    {
        check_controller_inner_access(0,2);
        $table_name = $this->arr_values['table_name'];

        $name = $this->request->getPost('name');
        $slug = slug($name);


        $access = [];
        $main_access = [];

        $access_count = $this->request->getPost('access_count');
        $main_access = $this->request->getPost('main_access');

        foreach ($access_count as $key => $value)
        {
            $access_inner = $this->request->getPost('inner_access'.$key);
            if(!empty($access_inner)) $access[$key] = $access_inner;
                else $access[$key] = [];

            if(!empty($main_access_input))
            {
                $main_access[] = $main_access_input;
            }
        }
        $inner_access = $access;
        $all_access = array("main_access"=>$main_access,"inner_access"=>$inner_access,);
        $role_access = json_encode($all_access);

        $status = $this->request->getPost('status');
        $addeddate = date('Y-m-d H:i:s');

       

        $insertdata = [
            'name' => $name,
            'slug' => $slug,
            'role_access' => $role_access,
            'addeddate' => $addeddate,
            'status' => $status,
        ];

        $this->db->table($table_name)->insert($insertdata); 

        /*----------*/   
        session()->setFlashdata('message', $this->arr_values['add_message']);
        return redirect()->to(base_url($this->arr_values['load_path']));
        
    }


    public function edit_page($id)
    {
        check_controller_inner_access(0,3);
        $data['EDITDATA'] = $this->db->table($this->arr_values['table_name'])->where('id', $id)->get()->getRow();
        $data['page_title'] = $this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['update_page'] = $this->arr_values['update_page'];
        return view($this->arr_values['load_path'] . 'edit', $data);
    }




    public function update_dataURL($id)
    {
        check_controller_inner_access(0,3);
        $table_name = $this->arr_values['table_name'];
        $name = $this->request->getPost('name');
        $status = $this->request->getPost('status');
        $slug = slug($name);

        $access = [];
        $main_access = [];

        $access_count = $this->request->getPost('access_count');
        $main_access = $this->request->getPost('main_access');

        foreach ($access_count as $key => $value)
        {
            $access_inner = $this->request->getPost('inner_access'.$key);
            if(!empty($access_inner)) $access[$key] = $access_inner;
                else $access[$key] = [];

            if(!empty($main_access_input))
            {
                $main_access[] = $main_access_input;
            }
        }
        $inner_access = $access;
        $all_access = array("main_access"=>$main_access,"inner_access"=>$inner_access,);
        $role_access = json_encode($all_access);

        $modifieddate = date('Y-m-d H:i:s');


        // Prepare the data to update
        $updatedata = [
            'name' => $name,
            'slug' => $slug,
            'role_access' => $role_access,
            'modifieddate' => $modifieddate,
            'status' => $status,
        ];

        $updateStatus = $this->db->table($table_name)->where('id', $id)->update($updatedata);

       

        if ($updateStatus) 
        {
            session()->setFlashdata('message', $this->arr_values['update_message']);
            return redirect()->to(base_url($this->arr_values['load_path']));
        } else {
            session()->setFlashdata('message', $this->arr_values['failed_message']);
            return redirect()->back();
        }
    }

    /*single delete*/
    public function singledelete($id)
    {
        check_controller_inner_access(0,4);
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
        check_controller_inner_access(0,4);
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
