<?php
namespace App\Http\Controllers\admin_con;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class Contact extends Controller
{
    protected $arr_values = array(
                            'page_title'=>'Contact',
                            'table_name'=>'contact',
                            'upload_path'=>'media/uploads/contact/',
                            'table_data_page_url'=>'admin/contact/table',
                            'table_data_pagination_limit'=>15,
                            'load_list_path'=>'admin/contact/list',
                            /*add page*/
                            'view_page_url'=>'admin/contact/view',
                            /*delete*/
                            'delete_single_url'=>'admin_con/contact/delete_data',
                            'multiple_delete'=>'admin_con/contact/multiple_delete_data',
                            'check_image'=>false,  
                           ); 




    // Display all contact
    public function listing()
    {
        checkAdminSession();
        $page_title = $this->arr_values['page_title'];
        $upload_path = $this->arr_values['upload_path'];
        $table_data_page_url = $this->arr_values['table_data_page_url'];
        $table_data_pagination_limit = $this->arr_values['table_data_pagination_limit'];
        $view_page_url = $this->arr_values['view_page_url'];
        $delete_single_url = $this->arr_values['delete_single_url'];
        $multiple_delete = $this->arr_values['multiple_delete'];

        $ALLDATA = DB::table($this->arr_values['table_name'])->orderBy('id', 'desc')->get();
        return view($this->arr_values['load_list_path'], compact('ALLDATA','page_title', 'upload_path','table_data_page_url','table_data_pagination_limit',"delete_single_url","multiple_delete","view_page_url"));
    }
    /*get table from ajax*/
    public function getTableData(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $this->arr_values['table_data_pagination_limit'];
        $offset = $request->input('offset', 0);

        $upload_path = $this->arr_values['upload_path'];
        $view_page_url = $this->arr_values['view_page_url'];
        

        $query = DB::table($this->arr_values['table_name']);
        if (!empty($search)) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('mobile', 'LIKE', "%{$search}%")
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

        $view = view($this->arr_values['table_data_page_url'], compact('ALLDATA', 'totalRows', 'totalPages','offset','upload_path','view_page_url'))->render();

        return response()->json([
            'html' => $view,
            'pagination_links' => $paginationLinks,
            'limit' => $limit,
        ]);
    }


   /*---------------view page--------------*/
   public function view_page_url($id)
    {
        checkAdminSession();
        $page_title = $this->arr_values['page_title'];
        $upload_path = $this->arr_values['upload_path'];
        $EDITDATA = DB::table($this->arr_values['table_name'])->where('id', $id)->first();
        if (!$EDITDATA) {
            return redirect()->route($this->arr_values['load_list_path'])->with('message', 'not found.');
        }
        return view($this->arr_values['view_page_url'], compact('EDITDATA','page_title','upload_path'));
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
