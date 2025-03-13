<?php

namespace App\Controllers\admin_con;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use App\Models\Crud;

class Slider extends BaseController
{
    protected $arr_values = [
        'page_title'      => 'Slider',
        'table_name'      => 'slider',
        'upload_path'     => 'uploads/slider/',
        'load_path'       => 'admin/slider/',
        'add_page'        => 'admin/slider/add_page',
        'add_new_entryURL'=> 'admin/slider/add_new_entryURL',
        'get_table_data'  => 'admin/slider/get_table_data',
        'update_status'   => 'admin/slider/update_status',
        'multiple_delete' => 'admin/slider/delete_all',
        'edit_url'        => 'admin/slider/edit_page/',
        'update_page'     => 'admin/slider/update_page/',
        'singledelete_url'=> 'admin/slider/singledelete',
        'delete_all'      => 'admin/slider/delete_all',
        'pagination_limit'=> 15,
        'table_url'       => 'admin/slider/table',
        'controller_name' => 'slider',
        'page_name'       => 'slider.php',
        'add_message'     => 'Slider Added Successfully',
        'update_message'  => 'Slider Updated Successfully',
        'failed_message'  => 'Slider Update Failed',
    ];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->crud = new Crud();
        check_controller_access(3);
    }



    public function listing()
    {
        check_controller_inner_access(3,1);
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
        check_controller_inner_access(3,1);
        // Request parameters
        $search = $this->request->getPost('search');
        $limit = $this->arr_values['pagination_limit'];
        $offset = $this->request->getPost('offset');

        // Database query
        $builder = $this->db->table($this->arr_values['table_name']);
        $builder->orderBy('id', 'DESC');
        $builder->like('image', $search);
        $builder->orLike('title', $search);
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
        check_controller_inner_access(3,5);
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
        check_controller_inner_access(3,2);
        $data['page_title'] = $this->arr_values['page_title'];
        $data['add_new_entryURL'] = $this->arr_values['add_new_entryURL'];
        return view($this->arr_values['load_path'] . 'add', $data);
    }

    // add data
    public function add_new_entryURL()
    {
        check_controller_inner_access(3,2);

        $table_name = $this->arr_values['table_name'];

        $title = $this->request->getPost('title');
        $slug = slug($title);
        $sub_title = $this->request->getPost('sub_title');
        $content = $this->request->getPost('content');
        $status = $this->request->getPost('status');
        $addeddate = date('Y-m-d H:i:s');

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $imageName = $image->getName();
            $image->move(FCPATH . $this->arr_values['upload_path']);
        } else 
        {
            $imageName = '';
        } 

        $insertdata = [
            'title' => $title,
            'slug' => $slug,
            'sub_title' => $sub_title,
            'content' => $content,
            'image' => $imageName,
            'addeddate' => $addeddate,
            'status' => $status,
        ];

        $this->db->table($table_name)->insert($insertdata); 

        // $builder = $this->db->table($table_name);
        // $builder->insert($insertdata);

        /*meta tags */
        $insert_id =  $this->db->insertID();
        $old_slug = $this->crud->getOldSlug($table_name,$insert_id);
        $slug = $this->crud->insertSlug($slug, $insert_id, $table_name, $this->arr_values['controller_name'], $old_slug, $this->arr_values['page_name']);
        $this->crud->insertMetaTags($slug, $old_slug, $this->request->getPost());
        $this->crud->updateSlug($insert_id, $slug);
        /*----------*/   
        session()->setFlashdata('message', $this->arr_values['add_message']);
        return redirect()->to(base_url($this->arr_values['load_path']));
        
    }


    public function edit_page($id)
    {
        check_controller_inner_access(3,3);

        $data['EDITDATA'] = $this->db->table($this->arr_values['table_name'])->where('id', $id)->get()->getRow();
        $data['page_title'] = $this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['update_page'] = $this->arr_values['update_page'];
        return view($this->arr_values['load_path'] . 'edit', $data);
    }




    public function update_dataURL($id)
    {
         check_controller_inner_access(3,3);
        $table_name = $this->arr_values['table_name'];

        $title = $this->request->getPost('title');
        $slug = slug($title); // Assuming you have a 'slug' helper function
        $sub_title = $this->request->getPost('sub_title');
        $content = $this->request->getPost('content');
        $modifieddate = date('Y-m-d H:i:s');
        $status = $this->request->getPost('status');

        // Handle image upload
        $image = $this->request->getFile('image');
        $oldimage = $this->request->getPost('oldimage');

        if ($image && $image->isValid()) 
        {
            $imageName = $image->getName();
            $uploadPath = FCPATH . $this->arr_values['upload_path'];

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            if (!$image->move($uploadPath)) 
            {
                $imageName = '';
            }
        } 
        else 
        {
            $imageName = $oldimage;
        }

        // Prepare the data to update
        $updatedata = [
            'title' => $title,
            'slug' => $slug,
            'sub_title' => $sub_title,
            'content' => $content,
            'image' => $imageName,
            'modifieddate' => $modifieddate,
            'status' => $status,
        ];

        $updateStatus = $this->db->table($table_name)
                   ->where('id', $id) 
                   ->update($updatedata);

       
        /*meta tags */
        $insert_id =  $id;
        $old_slug = $this->crud->getOldSlug($table_name,$insert_id);
        $slug = $this->crud->insertSlug($slug, $insert_id, $table_name, $this->arr_values['controller_name'], $old_slug, $this->arr_values['page_name']);
        $this->crud->insertMetaTags($slug, $old_slug, $this->request->getPost());
        $this->crud->updateSlug($insert_id, $slug);

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
         check_controller_inner_access(3,4);
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
         check_controller_inner_access(3,4);
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
