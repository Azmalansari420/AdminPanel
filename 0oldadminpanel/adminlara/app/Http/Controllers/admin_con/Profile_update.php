<?php
namespace App\Http\Controllers\admin_con;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class Profile_update extends Controller
{
    

	protected $arr_values = array(
                            'page_title'=>'Update Profile',
                            'table_name'=>'tbl_admin',
                            'upload_path'=>'media/uploads/',
                            'load_path'=>'admin/update-profile',
                            'redirect_route_path'=>'admin/profile_form',
                           );

    


	public function loadForm()
    {
        checkAdminSession();
        // check_admin_login();
        $page_title = $this->arr_values['page_title'];
        $upload_path = $this->arr_values['upload_path'];
        $redirect_route_path = $this->arr_values['redirect_route_path'];
        $load_path = $this->arr_values['load_path'];
        $EDITDATA = DB::table($this->arr_values['table_name'])->where('id', session('admin_id'))->get();
        return view('admin.profile-form', compact('page_title', 'upload_path', 'redirect_route_path' ,'load_path' ,'EDITDATA'));
    }




    /*update data*/
    public function submitForm(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) 
        {
            $imageName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $uploadPath = $this->arr_values['upload_path'];
            $request->file('image')->move(public_path($uploadPath), $imageName);
        } 
        else 
        {
            $imageName = $request->input('oldimage');
        }


        $first_name = $request->input('first_name');         
        $last_name = $request->input('last_name');           
        $username = $request->input('username');         
        $password = $request->input('password'); 
        $email = $request->input('email');           
        $mobile = $request->input('mobile');         
        $address = $request->input('address');           
        $gender = $request->input('gender');         
        $dob = $request->input('dob');           
        $martial = $request->input('martial');           
        $age = $request->input('age');           
        $country = $request->input('country');           
        $state = $request->input('state');

        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'mobile' => $mobile,
            'address' => $address,
            'gender' => $gender,
            'dob' => $dob,
            'martial' => $martial,
            'age' => $age,
            'country' => $country,
            'state' => $state,
            'image' => $imageName,
        ];

        $adminId = session('admin_id');
        // print_r($data);
        // die;
        if($adminId) {
            DB::table($this->arr_values['table_name'])->where('id', $adminId)->update($data);            
            return redirect()->route($this->arr_values['redirect_route_path'])->with('message', 'Profile updated successfully!');
        }
        else 
        {
            return redirect()->back()->with('message', 'Failed to update profile. Please try again.');
        }
    }






}