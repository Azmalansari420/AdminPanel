<?php
$sitesetting =  $this->db->get_where('site_setting',array('id'=>1))->result_object();
$box1 =  $this->db->get_where('content',array('id'=>6))->result_object();
$box2 =  $this->db->get_where('content',array('id'=>7))->result_object();
?>
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
</style>
    
    <div class="single-page-area">
        <div class="title-area justify-content-between">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4 text-white">Help Center</h3>
            <div class="balance"><?=$full_detail->wallet ?> <span><img src="<?=base_url() ?>assets/coin.png" alt="img"></span></div> 
        </div>

        

       

                
        <div class="container">


            <div class="text-box-2 mt-4">
                <?=$box1[0]->content ?>
            </div>

            <p style="color: green;margin-top: 5px;font-weight: 600;font-size: 14px;text-align: center;">NOTE:- अगर आपको गेम खेलने मैं या और भी कोई समस्या हो तो आप chat पे दबाए ।</p>

            <div class="text-box-2 mt-2">
                <?=$box2[0]->content ?>
            </div>

            <p style="color: green;margin-top: 5px;font-weight: 600;font-size: 14px;text-align: center;">गेम खेलना सीखने के लिए BUTTON  पे क्लिक करें</p>

            <div class="mt-3 d-flex justify-content-around">
                <a class="video-btn" href="<?=$sitesetting[0]->deposite ?>">Deposite</a>
                <a class="video-btn" href="<?=$sitesetting[0]->withdraw ?>">Withdraw</a>
                <a class="video-btn" href="<?=$sitesetting[0]->game_play ?>">Game Play</a>
            </div>

            
        </div>
          <?php include('include/menubar.php'); ?>
    </div>     

    <?php include('include/chat-btn.php'); ?>
   <?php include('include/allscript.php'); ?>
</body>
</html>