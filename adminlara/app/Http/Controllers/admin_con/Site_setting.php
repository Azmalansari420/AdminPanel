<?php

namespace App\Http\Controllers\admin_con;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class Site_setting extends Controller
{

  

    protected $arr_values = array(
                            'page_title'=>'Site Setting',
                            'table_name'=>'site_setting',
                            'upload_path'=>'media/uploads/site_setting/',
                            'load_path'=>'admin.site_setting.edit',
                            'redirect_route_path'=>'admin.site_setting.edit',
                           );


    public function loadForm($id)
    {
        checkAdminSession();
        $page_title = $this->arr_values['page_title'];
        $upload_path = $this->arr_values['upload_path'];
        $redirect_route_path = $this->arr_values['redirect_route_path'];

        $EDITDATA = DB::table($this->arr_values['table_name'])->where('id',$id)->get();

        return view('admin.site_setting.edit', compact('page_title', 'upload_path', 'redirect_route_path', 'EDITDATA'));
    }


    

    /*update data*/
    public function submitForm(Request $request, $id)
    {
        

        $imageName = $request->input('oldlogo'); 
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $imageName = uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path($this->arr_values['upload_path']), $imageName);

            // Delete old image
            $oldImagePath = public_path($this->arr_values['upload_path'] . $request->input('oldlogo'));
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $data = [
            'mobile' => $request->input('mobile'),
            'alt_mobile' => $request->input('alt_mobile'),
            'email' => $request->input('email'),
            'alt_email' => $request->input('alt_email'),
            'address' => $request->input('address'),
            'facebook' => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'twitter' => $request->input('twitter'),
            'youtube' => $request->input('youtube'),
            'map' => $request->input('map'),
            'logo' => $imageName, 
        ];

        try {
            DB::table($this->arr_values['table_name'])->where('id', $id)->update($data);
            return redirect()->route($this->arr_values['redirect_route_path'], ['id' => $id])->with('message', 'Setting updated successfully!');
        } 
        catch (\Exception $e) {
            \Log::error('Failed to update: ' . $e->getMessage()); // Log the error for debugging
            return redirect()->back()->with('message', 'Failed to update. Please try again.');
        }
    }















}
