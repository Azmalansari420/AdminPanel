<?php
$about =  $this->db->get_where('content',array('id'=>2))->result_object();
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

    .about-box>h5 {
    text-align: center;
    font-weight: 700;
}

.about-box>p {
    color: black;
    font-weight: 700;
}


</style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4 text-white">Privacy Policy</h3>
        </div>

       

                
        <div class="container">
            <div class="about-box mt-3">
                <?=$about[0]->content ?>


            </div>
        </div>
          <?php include('include/menubar.php'); ?>
    </div>     

   <?php include('include/allscript.php'); ?>
</body>
</html>