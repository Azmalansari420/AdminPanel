<?php

namespace App\Controllers\admin_con;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use App\Models\Crud;

class Tbl_admin extends BaseController
{
    protected $arr_values = [
        'page_title'      => 'Assign User',
        'table_name'      => 'tbl_admin',
        'upload_path'     => 'uploads/tbl_admin/',
        'load_path'       => 'admin/tbl_admin/',
        'add_page'        => 'admin/tbl_admin/add_page',
        'add_new_entryURL'=> 'admin/tbl_admin/add_new_entryURL',
        'get_table_data'  => 'admin/tbl_admin/get_table_data',
        'update_status'   => 'admin/tbl_admin/update_status',
        'multiple_delete' => 'admin/tbl_admin/delete_all',
        'edit_url'        => 'admin/tbl_admin/edit_page/',
        'update_page'     => 'admin/tbl_admin/update_page/',
        'singledelete_url'=> 'admin/tbl_admin/singledelete',
        'delete_all'      => 'admin/tbl_admin/delete_all',
        'pagination_limit'=> 15,
        'table_url'       => 'admin/tbl_admin/table',
        'controller_name' => 'tbl_admin',
        'page_name'       => 'tbl_admin.php',
        'add_message'     => 'Added Successfully',
        'update_message'  => 'Updated Successfully',
        'failed_message'  => 'Update Failed',
    ];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->crud = new Crud();
        check_controller_access(1);
    }



    public function listing()
    {
        check_controller_inner_access(1,1);
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
        check_controller_inner_access(1,1);        
        // Request parameters
        $search = $this->request->getPost('search');
        $limit = $this->arr_values['pagination_limit'];
        $offset = $this->request->getPost('offset');

        // Database query
        $builder = $this->db->table($this->arr_values['table_name']);
        $builder->where('type', 2);
        $builder->groupStart() // Start grouping
            ->like('username', $search)
            ->orLike('id', $search)
        ->groupEnd(); // End grouping
        $builder->orderBy('id', 'DESC');
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
        check_controller_inner_access(1,5);
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
        check_controller_inner_access(1,2);
        $data['page_title'] = $this->arr_values['page_title'];
        $data['add_new_entryURL'] = $this->arr_values['add_new_entryURL'];
        return view($this->arr_values['load_path'] . 'add', $data);
    }

    // add data
    public function add_new_entryURL()
    {
        check_controller_inner_access(1,2);
        $table_name = $this->arr_values['table_name'];

        $type = 2; 
        $role = $this->request->getPost('role');

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');                            

        $getrole_access = $this->db->table('role')->where('id',$role)->get();
        $rolesget = $getrole_access->getResult();        
        $access = $rolesget[0]->role_access;        

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $status = $this->request->getPost('status');
        $addeddate = date('Y-m-d H:i:s');

       

        $insertdata = [
            'type' => $type,
            'role' => $role,
            'access' => $access,
            'username' => $username,
            'password' => $password,
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
        check_controller_inner_access(1,3);
        $data['EDITDATA'] = $this->db->table($this->arr_values['table_name'])->where('id', $id)->get()->getRow();
        $data['page_title'] = $this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['update_page'] = $this->arr_values['update_page'];
        return view($this->arr_values['load_path'] . 'edit', $data);
    }




    public function update_dataURL($id)
    {
        check_controller_inner_access(1,3);
        $table_name = $this->arr_values['table_name'];

        $type = 2; 
        $role = $this->request->getPost('role');

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');                            

        $getrole_access = $this->db->table('role')->where('id',$role)->get();
        $rolesget = $getrole_access->getResult();        
        $access = $rolesget[0]->role_access;        

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $status = $this->request->getPost('status');
        $modifieddate = date('Y-m-d H:i:s');


        // Prepare the data to update
        $updatedata = [
            'type' => $type,
            'role' => $role,
            'access' => $access,
            'username' => $username,
            'password' => $password,
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
        check_controller_inner_access(1,4);
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
        check_controller_inner_access(1,4);
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
