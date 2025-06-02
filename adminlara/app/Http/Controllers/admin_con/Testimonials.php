<?php
namespace App\Http\Controllers\admin_con;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class Testimonials extends Controller
{
    protected $arr_values = array(
                            'page_title'=>'Testimonials',
                            'table_name'=>'testimonials',
                            'upload_path'=>'media/uploads/testimonials/',
                            'table_data_page_url'=>'admin/testimonials/table',
                            'table_data_pagination_limit'=>15,
                            'load_list_path'=>'admin/testimonials/list',
                            /*add page*/
                            'add_page_view'=>'admin/testimonials/add',
                            'add_page_link'=>'testimonials/add',
                            'add_in_database_url'=>'admin_con/testimonials/add_data',
                            /*edit page*/
                            'edit_page_url'=>'admin/testimonials/edit',
                            'update_in_database_url'=>'admin_con/testimonials/update_data',
                            'status_url'=>'admin/testimonials/update_status',
                            /*delete*/
                            'delete_single_url'=>'admin_con/testimonials/delete_data',
                            'multiple_delete'=>'admin_con/testimonials/multiple_delete_data',
                            'check_image'=>true,    

                           ); 




    // Display all testimonials
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
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('position', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%")
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
    public function add_page_url()
    {
        checkAdminSession();
        $page_title = $this->arr_values['page_title'];
        $add_in_database_url = $this->arr_values['add_in_database_url'];
        return view($this->arr_values['add_page_view'], compact('page_title','add_in_database_url'));
    }
    // add new data
    public function datastore_in_database(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $uploadPath = public_path($this->arr_values['upload_path']);
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $imageName = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($uploadPath, $imageName);
        }

        $name = $request->input('name');
        $position = $request->input('position');
        $content = $request->input('content');
        $status = $request->input('status');
        $addeddate = now();

        $insertdata = [
            "name"=>$name,
            "slug"=>slug($name),
            "position"=>$position,
            "content"=>$content,
            "image"=>$imageName,
            "status"=>$status,
            "addeddate"=>$addeddate
        ];

        DB::table($this->arr_values['table_name'])->insert($insertdata);
        return redirect()->route($this->arr_values['load_list_path'])->with('message', 'Added Successfully.');
    }


    /*--------------------update/edit page----------------------------*/
    public function edit_page_url($id)
    {
        checkAdminSession();
        $page_title = $this->arr_values['page_title'];
        $upload_path = $this->arr_values['upload_path'];
        $update_in_database_url = $this->arr_values['update_in_database_url'];
        $EDITDATA = DB::table($this->arr_values['table_name'])->where('id', $id)->first();
        if (!$EDITDATA) {
            return redirect()->route($this->arr_values['load_list_path'])->with('message', 'not found.');
        }
        return view($this->arr_values['edit_page_url'], compact('EDITDATA','page_title','upload_path','update_in_database_url'));
    }

    /*update*/
    public function dataupdate_in_database(Request $request, $id)
    {
        date_default_timezone_set('Asia/Kolkata');

        $uploadPath = public_path($this->arr_values['upload_path']);
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        $imageName = $request->input('oldimage'); 
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($uploadPath, $imageName);

            // Delete old image
            $oldImagePath = $uploadPath . $request->input('oldimage');
            if (!empty($request->input('oldimage')) && file_exists($oldImagePath) && is_file($oldImagePath)) 
            {
                unlink($oldImagePath);
            } else {
                logger('Old image not found or is invalid: ' . $request->input('oldimage'));
            }
        }

        $name = $request->input('name');
        $position = $request->input('position');
        $content = $request->input('content');
        $status = $request->input('status');
        $modifieddate = now();

        $upadatedata = [
            "name"=>$name,
            "slug"=>slug($name),
            "position"=>$position,
            "content"=>$content,
            "image"=>$imageName,
            "status"=>$status,
            "modifieddate"=>$modifieddate
        ];
        DB::table($this->arr_values['table_name'])->where('id', $id)->update($upadatedata);
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


    

































































    

















}
