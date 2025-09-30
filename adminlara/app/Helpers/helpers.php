<?php

use Illuminate\Support\Facades\Session;

  /*statsus*/
  function status($value)
    {
      if($value==1)
      {
        $string = '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">
                      <small>
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">        
                          <circle cx="12" cy="12" r="8" fill="#3cb72c"></circle>
                        </svg>
                      </small>Show
                   </p>';
      }
      else if($value==0)
      {
        $string = '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">
                      <small>
                         <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="8" fill="#F42B3D"></circle>
                         </svg>
                      </small>Hide
                   </p>';
      }
      return $string;
    }


  /*slug*/
  function slug($string) 
  { 
    $string = trim($string);$string=strtolower($string);
    $string =preg_replace("/[^a-z0-9_ोौेैा्ीिीूुंःअआइईउऊएऐओऔकखगघचछजझञटठडढतथदधनपफबभमयरलवसशषहश्रक्षटठडढङणनऋड़\s-]/u", "", $string);
    $string = preg_replace("/[\s-]+/", " ", $string);
    $string = preg_replace("/[\s]/", '-', $string);
    return $string ;
  }

  /*------------only date ------*/
  function dateformet($date)
  {
    $dateformet = date('d M, Y',strtotime($date));
    return $dateformet;
  }
  /*------------only date ------*/
  function dateTimeformet($date)
  {
    $dateformet = date('d M, Y h:i A',strtotime($date));
    return $dateformet;
  }

  function checkAdminSession()
    {
        if (!session()->has('admin_id')) {
            echo '<script>window.location = "' . route('admin/logout') . '";</script>';
            exit; // Stop further execution
        }
    }


function countryname($id)
{
    return DB::table('country')->where('id', $id)->value('name') ?? '';
}


function statename($id)
{
    return DB::table('state')->where('id', $id)->value('name') ?? '';
}





















































function insert_slug($slug, $p_id, $table_name, $controller_name, $old_slug = '', $page_name = '')
{
    $data = [
        "slug"            => $slug,
        "table_name"      => $table_name,
        "page_name"       => $page_name,
        "controller_name" => $controller_name,
        "p_id"            => $p_id,
    ];

    DB::table('slugs')->where(['table_name' => $table_name, 'p_id' => $p_id])->delete();

    if (!DB::table('slugs')->where('slug', $slug)->exists()) {
        DB::table('slugs')->insert($data);
    } else {
        for ($i = 1; $i <= 10; $i++) {
            $slug2 = $slug . '-' . $i;
            if (!DB::table('slugs')->where('slug', $slug2)->exists()) {
                $data['slug'] = $slug2;
                DB::table('slugs')->insert($data);
                $slug = $slug2;
                break;
            }
        }
    }
    return $slug;
}


function insert_meta_tags($slug, $old_slug = '')
{
    $data = [
        "meta_title"       => Request::input("meta_title"),
        "meta_keyword"     => Request::input("meta_keyword"),
        "meta_description" => Request::input("meta_description"),
        "meta_auther"      => Request::input("meta_auther"),
        "slug"             => $slug,
    ];

    DB::table('meta_tags')->where('slug', $old_slug)->delete();

    if (!DB::table('meta_tags')->where('slug', $slug)->exists()) {
        DB::table('meta_tags')->insert($data);
    } else {
        DB::table('meta_tags')->where('slug', $slug)->update($data);
    }
}

function custom_meta_tags($slug = '')
    {
        if (empty($slug)) {
            // Use request path if slug not passed
            $currentUrl = Request::path();
            $slug = ($currentUrl === '/' || $currentUrl === '') ? 'home' : $currentUrl;
        }

        // Try to get meta data
        $meta = DB::table('meta_tags')
            ->select('meta_title', 'meta_keyword', 'meta_description', 'meta_auther')
            ->where('slug', $slug)
            ->first();

        if (!$meta) {
            $meta = DB::table('meta_tags')
                ->select('meta_title', 'meta_keyword', 'meta_description', 'meta_auther')
                ->where('slug', 'home')
                ->first();
        }

        if (!$meta) {
            return '';
        }

        $html = '';
        $html .= '<title>' . $meta->meta_title . '</title>' . PHP_EOL;
        $html .= '<meta name="keywords" content="' . $meta->meta_keyword . '">' . PHP_EOL;
        $html .= '<meta name="description" content="' . $meta->meta_description . '">' . PHP_EOL;
        $html .= '<meta name="meta_auther" content="' . $meta->meta_auther . '">' . PHP_EOL;

        return $html;
    }


    /*--admin activity--*/
  function activity_record()
  {
    date_default_timezone_set('Asia/Kolkata');

    $ip_addreass = Request::ip();
    $current_url = url()->current();
    $timestamp = now();
    $admin_id = session('admin_id');
    $admin_username = session('admin_username');
    $admin_password = session('admin_password');

    $insertdata = array(
      "ip_addreass"=>$ip_addreass,
      "url"=>$current_url,
      "date"=>$timestamp,
      "time"=>$timestamp,
      "admin_id"=>$admin_id,
      "admin_username"=>$admin_username,
      "admin_password"=>$admin_password,
    );

    $result = DB::table('activity_records')->insert($insertdata);
    return $result;
  }


  

































