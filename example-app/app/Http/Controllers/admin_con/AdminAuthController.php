<?php

namespace App\Http\Controllers\admin_con;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    /*show login page*/
    public function index()
    {
        return view('admin.index'); 
    }

    /*login check*/
    public function adminlogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = DB::table('tbl_admin')
                    ->where('username', $request->username)
                    ->where('password', $request->password)
                    ->first();

        if ($admin) {
            session([
                'admin_id' => $admin->id,
                'admin_username' => $admin->username,
                'admin_name' => $admin->first_name,
                'admin_password' => $admin->password,
            ]);

            $logindata = [
                "user_id"=>$admin->id,
                "username"=>$admin->username,
                "password"=>$admin->password,
                "device_id"=>uniqid().$_SERVER['REMOTE_ADDR'],
                "ip_address"=>$_SERVER['REMOTE_ADDR'],
                "login_date"=>now(),
                "login_time"=>now(),
            ];
            DB::Table('login_details')->insert($logindata);

            return redirect()->route('admin/dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }


    /*dashboard page*/
    public function dashboard()
    {
        checkAdminSession();
        return view('admin/dashboard');
    }




    /*logout*/
    public function logout()
    {
        session()->flush();
        return redirect('/admin');
    }






























}
