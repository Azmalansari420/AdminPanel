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


  // function check_admin_login()
  //   {
  //       if (Session::has('admin_id')) {
  //           // Admin is logged in
  //           return null;  // No redirection needed
  //       } else {
  //           $previousUrl = request()->url();  
  //           Session::put('last_visited_url', $previousUrl);  

  //           // Redirect to login page
  //           return redirect('/admin')->with('error', 'Please login to continue.');
  //       }
  //   }


































