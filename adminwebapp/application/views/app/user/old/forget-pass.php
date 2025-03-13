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
                    <img class="light-logo" src="<?=base_url() ?>assets/logo.png" alt="img" style="width: 100%;">
                </div>
                <h3>Forgot Password</h3>
                <p class="p-color-size">Enter the email address associated with your GOA KING account</p>
                <form class="default-form-wrap">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/message.svg" alt="img"></label>
                                <input type="text" class="form-control" placeholder="***0@gmail.com">
                            </div>
                        </div>

                    </div>
                    <a class="btn btn-base w-100 " href="home.php">Submit</a>
                </form>
               

                <span class="another-way-link a-class">Back to Login? <a style="font-size: 18px;" href="login.php">Sign In</a></span>
            </div>           
        </div>
    </div>
    

    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>

    

      <?php include('include/allscript.php'); ?>
</body>
</html>