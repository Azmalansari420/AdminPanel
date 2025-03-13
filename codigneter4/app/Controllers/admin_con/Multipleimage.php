<?php

namespace App\Controllers\admin_con;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use App\Models\Crud;

class Multipleimage extends BaseController
{
    protected $arr_values = [
        'page_title'      => 'Multipleimage',
        'table_name'      => 'multipleimage',
        'upload_path'     => 'uploads/multipleimage/',
        'load_path'       => 'admin/multipleimage/',
        'add_page'        => 'admin/multipleimage/add_page',
        'add_new_entryURL'=> 'admin/multipleimage/add_new_entryURL',
        'get_table_data'  => 'admin/multipleimage/get_table_data',
        'update_status'   => 'admin/multipleimage/update_status',
        'multiple_delete' => 'admin/multipleimage/delete_all',
        'edit_url'        => 'admin/multipleimage/edit_page/',
        'update_page'     => 'admin/multipleimage/update_page/',
        'singledelete_url'=> 'admin/multipleimage/singledelete',
        'delete_all'      => 'admin/multipleimage/delete_all',
        'pagination_limit'=> 15,
        'table_url'       => 'admin/multipleimage/table',
        'controller_name' => 'multipleimage',
        'page_name'       => 'multipleimage.php',
        'add_message'     => 'multipleimage Added Successfully',
        'update_message'  => 'multipleimage Updated Successfully',
        'failed_message'  => 'multipleimage Update Failed',
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
        $builder->orderBy('id', 'DESC');
        $builder->like('status', $search);
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

        
        // Initialize an array for image names
        $imageNames = [];
        $images = $this->request->getFiles();
        if (isset($images['multiple_image_json'])) 
        {
            foreach ($images['multiple_image_json'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName(); 
                    $image->move(FCPATH . $this->arr_values['upload_path'], $newName);
                    $imageNames[] = $newName;
                }
            }
        }
        $multiple_image_json = json_encode($imageNames); 

        /*add more with single image*/
        $titles = $this->request->getPost('single_title');
        $subtitles = $this->request->getPost('single_sub_title');
        $images = $this->request->getFiles();

        $imageData = [];
        foreach ($titles as $key => $title) 
        {
            // Handle image upload
            if (isset($images['single_image'][$key]) && $images['single_image'][$key]->isValid() && !$images['single_image'][$key]->hasMoved()) {
                $newImageName = $images['single_image'][$key]->getRandomName();
                $images['single_image'][$key]->move(FCPATH . $this->arr_values['upload_path'], $newImageName);
            }

            // Store each entry as an array
            $imageData[] = [
                'single_title' => $title,
                'single_sub_title' => $subtitles[$key] ?? '',
                'single_image' => $newImageName
            ];
        }
        $single_image = json_encode($imageData);


        /*add more with multiple image*/
        $multiple_title = $this->request->getPost('multiple_title');
        $multiple_sub_title = $this->request->getPost('multiple_sub_title');
        $multiple_images = $this->request->getFiles(); // Get all uploaded files

        $multiimageData = [];

        if ($multiple_title && is_array($multiple_title)) 
        {
            foreach ($multiple_title as $key => $title) 
            {
                $multiImageNames = []; 

                if (isset($multiple_images["multiple_image{$key}"]) && is_array($multiple_images["multiple_image{$key}"])) 
                {
                    foreach ($multiple_images["multiple_image{$key}"] as $image) 
                    {
                        if ($image->isValid() && !$image->hasMoved()) 
                        {
                            $newImageName = $image->getRandomName();
                            $image->move(FCPATH . $this->arr_values['upload_path'], $newImageName);
                            $multiImageNames[] = $newImageName;
                        }
                    }
                }

                $multiimageData[] = [
                    'multiple_title' => $title,
                    'multiple_sub_title' => $multiple_sub_title[$key] ?? '',
                    'multiple_image' => json_encode($multiImageNames)
                ];
            }
        }

        $get_multiple_images = json_encode($multiimageData);




        $status = $this->request->getPost('status');
        $addeddate = date('Y-m-d H:i:s');

        $insertdata = [
            'multiple_image_json' => $multiple_image_json,
            'single_image' => $single_image,
            'multiple_images' => $get_multiple_images,
            'status' => $status,
            'addeddate' => $addeddate,
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
        
        $modifieddate = date('Y-m-d H:i:s');
        $status = $this->request->getPost('status');


        /*multiple image */
        $imageNames = [];
        // Get old images (if any)
        $oldImages = $this->request->getPost('oldmultiple_image_json');
        if (!empty($oldImages)) {
            $imageNames = $oldImages; // Keep old images
        }
        // Process new images
        $images = $this->request->getFiles();
        if (isset($images['multiple_image_json'])) {
            foreach ($images['multiple_image_json'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName(); // Generate a unique name
                    $image->move(FCPATH . $this->arr_values['upload_path'], $newName);
                    $imageNames[] = $newName;
                }
            }
        }
        // Convert image names to JSON for database storage
        $multiple_image_json = json_encode($imageNames);


        /*add more with single image*/
        $titles = $this->request->getPost('single_title');
        $subtitles = $this->request->getPost('single_sub_title');
        $oldImages = $this->request->getPost('single_image_old');
        $images = $this->request->getFiles();

        $imageData = [];
        foreach ($titles as $key => $title) 
        {
            $newImageName = $oldImages[$key] ?? '';
            // Handle image upload
            if (isset($images['single_image'][$key]) && $images['single_image'][$key]->isValid() && !$images['single_image'][$key]->hasMoved()) {
                $newImageName = $images['single_image'][$key]->getRandomName();
                $images['single_image'][$key]->move(FCPATH . $this->arr_values['upload_path'], $newImageName);
            }
            // Store each entry as an array
            $imageData[] = [
                'single_title' => $title,
                'single_sub_title' => $subtitles[$key] ?? '',
                'single_image' => $newImageName
            ];
        }
        $single_image = json_encode($imageData);

        /* Add more with multiple images */
        $multiple_title = $this->request->getPost('multiple_title');
        $multiple_sub_title = $this->request->getPost('multiple_sub_title');
        $multiple_image_old = $this->request->getPost('multiple_image_old'); // Old images as an array
        $multiple_images = $this->request->getFiles(); // New uploaded files
        $removed_images = $this->request->getPost('remove_images'); // Images marked for deletion

        $multiimageData = [];

        if (!empty($multiple_title) && is_array($multiple_title)) {
            foreach ($multiple_title as $key => $title2) {
                // Ensure old images are an array
                $multiImageNames = isset($multiple_image_old[$key]) ? (array)$multiple_image_old[$key] : [];

                // Remove images that were deleted by the user
                if (!empty($removed_images[$key])) {
                    $multiImageNames = array_diff($multiImageNames, $removed_images[$key]);
                }

                // Process new images (if uploaded)
                if (!empty($multiple_images["multiple_image"][$key]) && is_array($multiple_images["multiple_image"][$key])) {
                    foreach ($multiple_images["multiple_image"][$key] as $image) {
                        if ($image->isValid() && !$image->hasMoved()) {
                            $newImageName = $image->getRandomName();
                            $image->move(FCPATH . $this->arr_values['upload_path'], $newImageName);
                            $multiImageNames[] = $newImageName; // Append new image
                        }
                    }
                }

                $multiimageData[] = [
                    'multiple_title' => $title2,
                    'multiple_sub_title' => $multiple_sub_title[$key] ?? '',
                    'multiple_image' => json_encode($multiImageNames) // Store images as JSON
                ];
            }
        }

        // Convert array to JSON before saving to the database
        $get_multiple_image = json_encode($multiimageData);



    
        // Prepare the data to update
        $updatedata = [
            'multiple_image_json' => $multiple_image_json,
            'single_image' => $single_image,
            'multiple_images' => $get_multiple_image,
            'modifieddate' => $modifieddate,
            'status' => $status,
        ];

        $updateStatus = $this->db->table($table_name)
                   ->where('id', $id) 
                   ->update($updatedata);

               
        
        
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



/*-------------------------------------------------------------------*/
    
    public function load_more_singleimage()
    {
        $count = $this->request->getPost('count'); 
        $data['count'] = $count;
        return view($this->arr_values['load_path'] . 'add-single-image', $data);
    }




    public function load_more_multiimage()
    {
        $i = $this->request->getPost('i'); 
        $data['i'] = $i;
        return view($this->arr_values['load_path'] . 'add-multiple-image', $data);
    }

















}
