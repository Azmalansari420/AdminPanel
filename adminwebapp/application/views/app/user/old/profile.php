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
    <style>
    .single-page-area .title-area {
        padding: 16px 20px 15px;
    }
    .single-page-area {
        padding-top: 60px;
    }
    .profile-details {
        margin-top: 24px;
        border-radius: 0;
    }
</style>
    
    <div class="single-page-area">
        <div class="title-area justify-content-between">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">Profile</h3>
            <div class="balance"> <?=$full->detail->wallet ?> <span><img src="<?=base_url() ?>assets/img/icon/dollar-sign.png" alt="img"></span></div> 
        </div>
        <div class="container">
            <div class="my-profile-wrap">
                <div class="media">
                    <img class="thumb" src="<?=base_url() ?>assets/img/comment/my-profile.png" alt="img">
                    <div class="media-body">
                        <h6 class="profile-name">Devon Lane</h6>
                        <p class="profile-mail">devon@gmail.com</p>
                    </div>
                    <img class="star star1" src="<?=base_url() ?>assets/img/icon/star.png" alt="img">
                    <img class="star star2" src="<?=base_url() ?>assets/img/icon/star.png" alt="img">
                </div>
            </div>
        </div>
        <div class="profile-details" style="background-image: url(<?=base_url() ?>assets/img/other/profile-bg.png);">
            <ul>
                <li>
                    <h6>06</h6>
                    <span>Total Game </span>
                </li>
                <li>
                    <h6>20</h6>
                    <span>Total Wins  </span>
                </li>
                <li>
                    <h6>15</h6>
                    <span>Total Loses </span>
                </li>
            </ul>
        </div>
        <div class="container">
            <ul class="profile-list-inner">
                <li>
                    <a class="single-profile-wrap" href="edit-profile.php"><i class="fa fa-user"></i> My Profile <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href="change-pass.php"><i class="fas fa-lock"></i> Change Password <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href="user-wallet.php"><i class="fa fa-wallet"></i> Wallet <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <div class="single-profile-wrap">
                        <i class="fas fa-bell"></i>
                        Push Notification
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </li>
                <li>
                    <a class="single-profile-wrap" href=""><i class="fas fa-users"></i> Top Players <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href=""><i class="fas fa-chart-line"></i> Statistics <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href="about.php"><i class="fas fa-user"></i> About Us<i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href="term-condition.php"><i class="fas fa-lock"></i> Term & Conditions <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href=""><i class="fas fa-question"></i>FAQ's <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href=""><i class="fas fa-exclamation-triangle"></i>Privacy Policy <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href=""><i class="fas fa-star"></i>Rate App <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href=""><i class="fas fa-share"></i>Share App <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href=""><i class="fas fa-sign-out-alt"></i>Log Out <i class="ri-arrow-right-s-line"></i></a>
                </li>                
            </ul>
        </div>
          <?php include('include/menubar.php'); ?>
    </div>     

   <?php include('include/allscript.php'); ?>
</body>
</html>