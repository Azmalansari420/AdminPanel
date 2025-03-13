<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include('include/allcss.php'); ?>
</head>
<body class='sc5'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    <style>
   
    .single-page-area {
        padding-top: 50px;
    }
    .profile-details {
        margin-top: 24px;
        border-radius: 0;
    }
    .profile-list-inner li .single-profile-wrap 
    {
        background: #5b0100;
    }
    .vh-60 {
        height: 86vh !important;
    }
    .successful-msg-page p {
        max-width: fit-content;
        margin: 0 auto 20px;
        font-weight: 700;
        font-size: 20px;
    }
</style>
    
    <div class="single-page-area">
        <div class="title-area justify-content-between">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4 text-white"><?=website_name ?></h3>
            <div class="balance"><?=$full_detail->wallet ?> <span><img src="<?=base_url() ?>assets/coin.png" alt="img"></span></div> 
        </div>

                
        <div class="container">
            <div class="align-items-center d-flex justify-content-center vh-60">
                <div class="successful-msg-page text-center">
                    <div class="icon">
                        <img src="<?=base_url() ?>assets/img/icon/user.png" alt="img">
                    </div>
                    <h3>Success!</h3>
                    <p>आपका पॉइंट अनुरोध सफलतापूर्वक भेज दिया गया! अंक शीघ्र ही जमा कर दिए जाएंगे, आमतौर पर 5 से 10 मिनट के भीतर।</p>
                    <a class="btn btn-base w-100" href="home.php">Go Home</a>               
                </div>           
            </div>
        </div>
          <?php include('include/menubar.php'); ?>
    </div>     

   <?php include('include/allscript.php'); ?>
   <?php include('include/chat-btn.php'); ?>
</body>
</html>