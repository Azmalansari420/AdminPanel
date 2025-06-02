<?php
namespace App\Http\Controllers\admin_con;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class Multipleimage extends Controller
{
    protected $arr_values = array(
                            'page_title'=>'Multipleimage',
                            'table_name'=>'multipleimage',
                            'upload_path'=>'media/uploads/multipleimage/',
                            'table_data_page_url'=>'admin/multipleimage/table',
                            'table_data_pagination_limit'=>15,
                            'load_list_path'=>'admin/multipleimage/list',
                            /*add page*/
                            'add_page_view'=>'admin/multipleimage/add',
                            'add_page_link'=>'multipleimage/add',
                            'add_in_database_url'=>'admin_con/multipleimage/add_data',
                            /*edit page*/
                            'edit_page_url'=>'admin/multipleimage/edit',
                            'update_in_database_url'=>'admin_con/multipleimage/update_data',
                            'status_url'=>'admin/multipleimage/update_status',
                            /*delete*/
                            'delete_single_url'=>'admin_con/multipleimage/delete_data',
                            'multiple_delete'=>'admin_con/multipleimage/multiple_delete_data',
                            'check_image'=>false,  

                            /*add-single-image*/ 
                            'add_more_singlepage'=>'admin/multipleimage/add-single-image', 
                            'add_more_singlepage_route'=>'admin/multipleimage/load_more_singleimage', 
                            /*add-multiple-image*/ 
                            'add_more_multipage'=>'admin/multipleimage/add-multiple-image', 
                            'add_more_multipage_route'=>'admin/multipleimage/load_more_multiimage', 
                            'controller_name'=>'multipleimage',
                            'page_name'=>'multipleimage-details',

                           ); 




    // Display all multipleimage
    public function listing()
    {
        checkAdminSession();
        $page_title = $this->arr_values['page_title'];
        $upload_path = $this->arr_values['upload_path'];
        $table_data_page_url = $this->arr_values['table_data_page_url'];
        $table_data_pagination_limit = $this->arr_values['table_data_pagination_limit'];
        $add_page_link = $this->arr_values['add_page_link'];
        $edit_page_url = $this->arr_values['edit_page_url'];
        $status_url = $this->arr_values['status_url'];
        $delete_single_url = $this->arr_values['delete_single_url'];
        $multiple_delete = $this->arr_values['multiple_delete'];

        $ALLDATA = DB::table($this->arr_values['table_name'])->orderBy('id', 'desc')->get();
        return view($this->arr_values['load_list_path'], compact('ALLDATA','page_title', 'upload_path','table_data_page_url','table_data_pagination_limit','add_page_link',"edit_page_url","status_url","delete_single_url","multiple_delete"));
    }
    /*get table from ajax*/
    public function getTableData(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $this->arr_values['table_data_pagination_limit'];
        $offset = $request->input('offset', 0);

        $upload_path = $this->arr_values['upload_path'];
        $edit_page_url = $this->arr_values['edit_page_url'];

        $query = DB::table($this->arr_values['table_name']);
        if (!empty($search)) {
            $query->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('id', 'LIKE', "%{$search}%");
        }

        $totalRows = $query->count();
        $ALLDATA = $query->offset($offset)->limit($limit)->orderBy('id', 'desc')->get();
        $totalPages = ceil($totalRows / $limit);
        $currentPage = ($offset / $limit) + 1;
        $paginationLinks = '';
        for ($i = 0; $i < $totalPages; $i++) 
        {
            $paginationLinks .= '<a href="#" class="pagination-link btn btn-primary btn-sm ' . ($i == $currentPage - 1 ? 'active-page' : '') . '" style="margin: 5px 3px; border-radius: 25%; font-weight: bold;" data-offset="' . ($i * $limit) . '">' . ($i + 1) . '</a>';
        }

        $view = view($this->arr_values['table_data_page_url'], compact('ALLDATA', 'totalRows', 'totalPages','offset','upload_path','edit_page_url'))->render();

        return response()->json([
            'html' => $view,
            'pagination_links' => $paginationLinks,
            'limit' => $limit,
        ]);
    }


    /*--------------------add-----------------------*/
    public function add_page_url(Request $request)
    {
        checkAdminSession();
        $count = $request->input('count', 0);
        $upload_path = $this->arr_values['upload_path'];
        $page_title = $this->arr_values['page_title'];
        $add_in_database_url = $this->arr_values['add_in_database_url'];
        $add_more_singlepage = $this->arr_values['add_more_singlepage'];
        $add_more_singlepage_route = $this->arr_values['add_more_singlepage_route'];
        $add_more_multipage_route = $this->arr_values['add_more_multipage_route'];
        return view($this->arr_values['add_page_view'], compact('page_title','add_in_database_url','add_more_singlepage','add_more_singlepage_route','count','upload_path',"add_more_multipage_route"));
    }
    // add new data
    public function datastore_in_database(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $uploadPath = public_path($this->arr_values['upload_path']);
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        /*multiple image uploads*/
        if ($request->hasFile('multiple_image_json')) 
        {
            $allImages = [];
            foreach ($request->file('multiple_image_json') as $file) 
            {
                if ($file->isValid()) {
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move($uploadPath, $imageName);
                    $allImages[] = $imageName;
                }
            }
            $multiple_image_json = json_encode($allImages);
        } 
        else 
        {
            $multiple_image_json = null;
        }


        /*add more card with single image*/        
        $getSingleData = [];
        $singleTitles = $request->input('single_title', []);
        $singleSubTitles = $request->input('single_sub_title', []);
        $images = $request->file('single_image');

        if ($images && is_array($images)) 
        {
            foreach ($singleTitles as $key => $title) 
            {
                $mImages = [];
                if (isset($images[$key]) && $images[$key]) 
                {
                    $image = $images[$key];
                    if ($image->isValid()) {
                        $thumbImg = uniqid() . '_' . $image->getClientOriginalName();
                        $image->move($uploadPath, $thumbImg);
                        $mImages[] = $thumbImg;
                    }
                }
                $getSingleData[] = [
                    "single_title" => $singleTitles[$key] ?? null,
                    "single_sub_title" => $singleSubTitles[$key] ?? null,
                    "single_image" => $mImages,
                ];
            }
        }
        if(!empty($getSingleData))
        {
            $single_image_data = json_encode($getSingleData);
        }
        else
        {
            $single_image_data = null;
        }

        /* ------add more with multiple image------*/
        $multidata = [];
        $multiple_title = $request->input('multiple_title');
        $multiple_sub_title = $request->input('multiple_sub_title');

        foreach ($multiple_title as $key2 => $value2) 
        {
            if ($request->hasFile('multiple_image' . $key2)) 
            {
                $multiple_images = $request->file('multiple_image' . $key2);
                $m_multiple_images = [];

                foreach ($multiple_images as $keyimg => $image) {
                    $thumb_img = uniqid() . '_' . $image->getClientOriginalName();
                    $path = $image->move($uploadPath, $thumb_img);
                    $m_multiple_images[] = $thumb_img;
                }
                $multidata[] = [
                    "multiple_title" => $multiple_title[$key2],
                    "multiple_sub_title" => $multiple_sub_title[$key2],
                    "multiple_image" => $m_multiple_images,
                ];
            }
        }
        if (!empty($multidata)) {
            $multiple_images = json_encode($multidata);
        } else {
            $multiple_images = null;
        }
        $status = $request->input('status');
        $addeddate = now();

        $insertdata = [
            "status"=>$status,
            "multiple_image_json"=>$multiple_image_json,
            "single_image_data"=>$single_image_data,
            "multiple_images"=>$multiple_images,
            "addeddate"=>$addeddate
        ];

        $insert_id = DB::table($this->arr_values['table_name'])->insertGetId($insertdata);

        /*table controller*/
        $old_slug_data = DB::table($this->arr_values['table_name'])->where('id', $insert_id)->select('slug')->first();
        $old_slug = $old_slug_data->slug ?? '';
        $new_slug = insert_slug(
            $slug,
            $insert_id,
            $this->arr_values['table_name'],
            $this->arr_values['controller_name'],
            $old_slug,
            $this->arr_values['page_name']
        );
        insert_meta_tags($new_slug, $old_slug);
        DB::table($this->arr_values['table_name'])->where('id', $insert_id)->update(['slug' => $new_slug]);

        return redirect()->route($this->arr_values['load_list_path'])->with('message', 'Added Successfully.');
    }


    /*--------------------update/edit page----------------------------*/
    public function edit_page_url(Request $request,$id)
    {
        checkAdminSession();
        $count = $request->input('count', 0);
        $page_title = $this->arr_values['page_title'];
        $upload_path = $this->arr_values['upload_path'];
        $update_in_database_url = $this->arr_values['update_in_database_url'];
        $add_more_singlepage = $this->arr_values['add_more_singlepage'];
        $add_more_singlepage_route = $this->arr_values['add_more_singlepage_route'];
        $add_more_multipage_route = $this->arr_values['add_more_multipage_route'];
        $EDITDATA = DB::table($this->arr_values['table_name'])->where('id', $id)->first();
        if (!$EDITDATA) {
            return redirect()->route($this->arr_values['load_list_path'])->with('message', 'not found.');
        }
        return view($this->arr_values['edit_page_url'], compact('EDITDATA','page_title','upload_path','update_in_database_url','add_more_singlepage','add_more_singlepage_route','count','add_more_multipage_route'));
    }

    /*------------update------------*/
    public function dataupdate_in_database(Request $request, $id)
    {
        date_default_timezone_set('Asia/Kolkata');

        $uploadPath = public_path($this->arr_values['upload_path']);
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        
        /*multiple image uploads*/
        if ($request->hasFile('multiple_image_json')) 
        {
            $allImages = [];
            foreach ($request->file('multiple_image_json') as $file) 
            {
                if ($file->isValid()) {
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move($uploadPath, $imageName);
                    $allImages[] = $imageName;
                }
            }
            if ($request->has('oldmultiple_image_json')) {
                $allImages = array_merge($request->oldmultiple_image_json, $allImages);
            }
            $multiple_image_json = json_encode($allImages);

        } 
        else 
        {
            $multiple_image_json = $request->oldmultiple_image_json ? json_encode($request->oldmultiple_image_json) : null;
        }

        /*add more card with single image*/ 
        $getSingleData = [];
        $singleTitles = $request->input('single_title', []);
        $singleSubTitles = $request->input('single_sub_title', []);
        $newImages = $request->file('single_image');
        $oldImages = $request->input('single_image_old', []); 

        foreach ($singleTitles as $key => $title) 
        {
            $mImages = [];
            if (isset($newImages[$key]) && $newImages[$key]) 
            {
                $image = $newImages[$key];
                if ($image->isValid()) {
                    $thumbImg = uniqid() . '_' . $image->getClientOriginalName();
                    $image->move($uploadPath, $thumbImg);
                    $mImages[] = $thumbImg;
                }
            }
            if (!empty($oldImages[$key])) 
            {
                $mImages[] = $oldImages[$key];
            }

            $getSingleData[] = [
                "single_title" => $singleTitles[$key] ?? null,
                "single_sub_title" => $singleSubTitles[$key] ?? null,
                "single_image" => $mImages,
            ];
        }
        $single_image_data = !empty($getSingleData) ? json_encode($getSingleData) : null;

        /* add more with multiple image*/

        $multidata = [];
        $multiple_title = $request->input('multiple_title');
        $multiple_sub_title = $request->input('multiple_sub_title');
        

        foreach ($multiple_title as $key2 => $value2) 
        {
            $multi_images_array = [];
            if ($request->hasFile('multiple_image' . $key2)) {
                $multiple_images = $request->file('multiple_image' . $key2);

                foreach ($multiple_images as $image) 
                {
                    $imageName = uniqid() . $image->getClientOriginalName();
                    $image->move($uploadPath, $imageName);
                    $multi_images_array[] = $imageName;
                }

            }

            $multiple_image_old = $request->input('multiple_image_old' . $key2);
            if (!empty($multiple_image_old)) {
                $multi_images_array = array_merge($multi_images_array, $multiple_image_old);
            }

            $multidata[] = [
                "multiple_title" => $multiple_title[$key2],
                "multiple_sub_title" => $multiple_sub_title[$key2],
                "multiple_image" => $multi_images_array,
            ];
        }

        $multiple_images = json_encode($multidata);

   



        $status = $request->input('status');
        $modifieddate = now();

        $upadatedata = [
            "multiple_image_json"=>$multiple_image_json,
            "single_image_data"=>$single_image_data,
            "multiple_images"=>$multiple_images,
            "status"=>$status,
            "modifieddate"=>$modifieddate
        ];


        DB::table($this->arr_values['table_name'])->where('id', $id)->update($upadatedata);
        /*table controller*/
        $insert_id = $id;
        $old_slug_data = DB::table($this->arr_values['table_name'])->where('id', $insert_id)->select('slug')->first();
        $old_slug = $old_slug_data->slug ?? '';
        $new_slug = insert_slug(
            $slug,
            $insert_id,
            $this->arr_values['table_name'],
            $this->arr_values['controller_name'],
            $old_slug,
            $this->arr_values['page_name']
        );
        insert_meta_tags($new_slug, $old_slug);
        DB::table($this->arr_values['table_name'])->where('id', $insert_id)->update(['slug' => $new_slug]);
        
        return redirect()->route($this->arr_values['load_list_path'])->with('message', 'Updated Successfully.');
    }

    /*----------------------------status update----------------------------*/
    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $request->validate([
            'id' => 'required|integer|exists:' . $this->arr_values['table_name'] . ',id',
            'status' => 'required|boolean'
        ]);

        DB::table($this->arr_values['table_name'])
            ->where('id', $id)
            ->update(['status' => $status]);
        $statusHtml = status($status);
        return response()->json([
            'success' => true,
            'data' => ['status' => $statusHtml]
        ]);
    }


    
    /*-------------------------------single delete----------------------------*/
    public function delete_data($id)
    {
        $check_image = $this->arr_values['check_image'];
        $category = DB::table($this->arr_values['table_name'])->where('id', $id)->first();
        if($category) 
        {
            if ($check_image == true) 
            {
                if ($category->image && file_exists(public_path($this->arr_values['upload_path'] . $category->image))) {
                    unlink(public_path($this->arr_values['upload_path'] . $category->image));
                }
            }
            DB::table($this->arr_values['table_name'])->where('id', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Deleted Successfully.'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Not found.'
        ]);
    }

    /*delete multiple*/
    public function multiple_delete_data(Request $request)
    {
        $ids = $request->input('id');
        $check_image = $this->arr_values['check_image'];

        if (!empty($ids)) {
            if ($check_image == true) {
                $categories = DB::table($this->arr_values['table_name'])->whereIn('id', $ids)->get();
                foreach ($categories as $category) {
                    if ($category->image && file_exists(public_path($this->arr_values['upload_path'] . $category->image))) {
                        unlink(public_path($this->arr_values['upload_path'] . $category->image));
                    }
                }
            }
            DB::table($this->arr_values['table_name'])->whereIn('id', $ids)->delete();
            session()->flash('message', 'Records have been successfully deleted.');
            return response()->json(['status' => 'success', 'message' => 'Records deleted successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'No records selected']);
    }


    


    /*----add more single image----*/

   public function load_more_singleimage(Request $request) 
    {
        $count = $request->count;
        $upload_path = $this->arr_values['upload_path'];
        $page_title = $this->arr_values['page_title'];
        $add_in_database_url = $this->arr_values['add_in_database_url'];
        return view($this->arr_values['add_more_singlepage'], compact('page_title', 'add_in_database_url', 'count','upload_path'));
    }

    /*add ore multiple image*/
    public function load_more_multiimage(Request $request)
    {
        $count = $request->input('count');
        return view($this->arr_values['add_more_multipage'], compact('count'));  // Pass count to the view
    }


































































    

















}
