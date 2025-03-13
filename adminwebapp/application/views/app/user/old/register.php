<?php
$id = $this->input->get('id');
if(!empty($id) && $id!='undefined')
{
    $id = $id;
}
else
{
    $id = uniqid();
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
<style>
    
    .register-page {
      margin-top: 0px; 
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
    .register-page .another-way-link {
        margin-top: 10px;
        margin-bottom: 26px;
    }
    .vh-100 {
    height: 114vh !important;
}
</style>
<body class='sc5-2'>
    <!-- preloader area start -->
     <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>

    
    <div class="container">
        <div class="align-items-center d-flex justify-content-center vh-100">
            <div class="register-page">
                <div class="logo-area text-center">
                    <img class="light-logo" src="<?=base_url() ?>assets/logo.png" alt="img" style="width: 100%;">
                </div>
                <h3>Create an Account</h3>
                <p class="p-color-size">Let’s us know what your Name, Email, Mobile, and your Password</p>
                <form class="default-form-wrap">
                    <input type="hidden" name="id" value="<?=$id ?>" id="id">
                    <input type="hidden" name="token" value="<?=$token ?>" id="token">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/profile.svg" alt="img"></label>
                                <input type="text" class="form-control" placeholder="Enter your Name" id="name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/message.svg" alt="img"></label>
                                <input type="email" class="form-control" placeholder="Enter your Email" id="email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/mobile.svg" alt="img"></label>
                                <input type="number" class="form-control" placeholder="Enter your Mobile" id="mobile">
                            </div>
                        </div>                        
                        
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img"></label>
                                <input type="password" class="form-control" placeholder="Create Password" id="password">
                            </div>
                        </div>                       
                        
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img"></label>
                                <input type="password" class="form-control" placeholder="Confirm Password" id="con_password">
                            </div>
                        </div>


                    </div>
                    <a class="btn btn-base w-100 register-btn" href="javascript:void(0);" >Register Now</a>
                </form>
                

                <span class="another-way-link a-class">Already have an account? <a href="login.php" style="font-size: 18px;">Sign In</a></span>
            </div>           
        </div>
    </div>

    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>

      <?php include('include/allscript.php'); ?>


<script>

    $(document).on("click", ".register-btn",(function(e) {
      login_distibuter();
    }));

    function login_distibuter()
    {
        var device_id = $("#id").val();
        var firebase_token = $("#token").val();

        var name = $("#name").val();
        var email = $("#email").val();
        var mobile = $("#mobile").val();
        var password = $("#password").val();
        var con_password = $("#con_password").val();

        if(name=="")
        {
            toaster("Enter Your Name.", 'error');
            return false;
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            toaster("Invalid Email Address.", 'error');
            return false;
        }
        if(mobile=="")
        {
            toaster("Enter Mobile No.", 'error');
            return false;
        }
        if(password=="")
        {
            toaster("Enter Your Password.", 'error');
            return false;
        }
        if(password!=con_password)
        {
            toaster("Confirm Password Not Match.", 'error');
            return false;
        }

        var form = new FormData();
        form.append("name", name);
        form.append("email", email);
        form.append("mobile", mobile);
        form.append("password", password);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);

        var settings = {
          "url": "<?=base_url() ?>api/auth/registration",
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
          toaster(response.message, 'success');
          if(response.status == 200) {
                toaster(response.message, 'success');
                setTimeout(function(){
                    window.location.href = response.url;
                }, 1000);
            }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>




</body>

</html>