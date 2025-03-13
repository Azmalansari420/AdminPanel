<?php
$device_id = $this->input->get('device_id');
if(!empty($device_id) && $device_id!='undefined')
{
    $device_id = $device_id;
}
else
{
    $device_id = uniqid();
}

$token = $this->input->get('token');
if(!empty($token) && $token!='undefined')
{
    $token = $token;
}
else
{
    $token = rand();
}


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include('include/allcss.php'); ?>
</head>
<body class='sc5-2'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
  
<style>
    .vh-100 {
        height: 89vh !important;
    }
    .default-form-wrap .single-input-wrap input {
        padding: 0 48px 2px 56px;
        border-radius: 16px;
        border: 1px solid;
    }
    .single-input-wrap input {
        font-size: 16px;
        color: black!important;
    }
    .a-class{
        color: black;
        font-weight: 600;
    }
    .default-form-wrap .single-input-wrap input {
        border: 1px solid black;
        font-size: 18px;
    }
</style>  
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>

    <div class="container">
        <div class="align-items-center d-flex justify-content-center vh-100">
            <div class="register-page">
                <div class="logo-area text-center">
                    <img class="light-logo" src="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>" alt="img" style="width: 100%;">
                </div>
                <h3>Let’s login.</h3>
                <p class="p-color-size">Let’s us know what your Mobile No, and your password</p>
                <form class="default-form-wrap" action="<?=base_url('api/auth/login') ?>" method="post">
                    <input type="hidden" name="device_id" value="<?=$device_id ?>" id="device_id">
                    <input type="hidden" name="token" value="<?=$token ?>" id="firebase_token">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/mobile.svg" alt="img"></label>
                                <input type="text" class="form-control" placeholder="Enter your Mobile" id="mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img"></label>
                                <input type="password" class="form-control" placeholder="Password" id="password">
                            </div>
                        </div>
                        <div class="text-end"><a class="a-class" href="forget-pass.php">Forgot password?</a></div>
                    </div>
                    <a class="btn btn-base w-100 login-btn" href="javascript:void(0);">Sign In</a>
                </form>
               

                <span class="another-way-link a-class">Create an new account? <a style="font-size: 18px;" href="register.php">Sign Up</a></span>
            </div>           
        </div>
    </div>
    

    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>

    

      <?php include('include/allscript.php'); ?>


<script>

    $(document).on("click", ".login-btn",(function(e) {
      login_distibuter();
    }));

    function login_distibuter()
    {
        var device_id = $("#device_id").val();
        var firebase_token = $("#firebase_token").val();
        var mobile = $("#mobile").val();
        var password = $("#password").val();

        if(mobile=='')
        {
            toaster("Enter Your Mobile No.", 'error');
            return false;
        }
        if(password=='')
        {
            toaster("Enter Your Password.", 'error');
            return false;
        }

        var form = new FormData();
        form.append("mobile", mobile);
        form.append("password", password);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);

        var settings = {
          "url": "<?=base_url() ?>api/auth/login",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          toaster(response.message, 'error');
          if(response.status==200)
          {
            window.location.href= response.url;
          }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>








</body>
</html>