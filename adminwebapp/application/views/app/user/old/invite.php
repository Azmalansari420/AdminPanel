<!DOCTYPE html>
<html lang="zxx">
<head>
     <?php include('include/allcss.php'); ?>
</head>
<body class='sc5 dark'>
    <!-- preloader area start -->
   <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    <style type="text/css">
        .single-page-area .title-area {
        padding: 15px 20px 20px;
    }
    .invite-wrap {
         margin-top: 0; 
    }
    </style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href="profile.html"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">Invite  </h3>
        </div>
        <div class="container">
            <div class="invite-wrap">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <h4>Refer a friend</h4>
                <p>Share your code with friends. When they
                    use it for the first Sign in, you and your
                    friends earn $10.00</p>
                <div class="input-wrap">
                    <input type="text" class="form-control" placeholder="AHDJAEL2021RV1">
                    <button type="button" class="btn-clipboard"><i class="far fa-clone"></i></button>
                </div>
                <div class="text-center">
                    <div class="or-border"><span>Or</span></div>
                    <ul class="social-area mt-4">
                        <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.google.com/"><img class="google" src="assets/img/icon/google.svg" alt="img"></a></li>
                        <li><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php include('include/menubar.php'); ?>       
    </div>  

    <!-- Modal -->
    <div class="modal fade filter-modal-popup" id="card-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap text-center">
                        <div class="icon">
                            <i class="ri-check-line"></i>
                        </div>
                        <h3 class="title"> Success!</h3>
                        <p>Your Payment method has been successfully added</p>
                        <a class="btn btn-base w-100" href="main-home.html">Back To Home</a>               
                    </div>
                </div>              
            </div>            
        </div>
    </div>

    <?php include('include/allscript.php'); ?>
</body>
</html>