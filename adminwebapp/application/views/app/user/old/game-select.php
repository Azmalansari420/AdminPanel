<?php
$game_id = $this->input->get('game_id');

$gamedetail = $this->db->get_where('game',array('id'=>$game_id))->result_object();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<?php include('include/allcss.php'); ?>
</head>
<style>
    .pd-top-110 {
        padding-top: 35px;
    }
    .select-game-box {
    margin-bottom: 15px;
}
.main-home-area 
{
  padding-top: 16px;
  padding-bottom: 60px;
}

    
</style>
<body class='sc5'>
    <!-- preloader area start -->
   <?php include('include/loader.php'); ?>

    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    
    <div class="container">
        <div class="main-home-area">

            <div class="profile-area">
                <div class="media">
                    <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
                    <div class="media-body">
                        <span class="profile-name" style="font-size: 18px;"><?php if(!empty($gamedetail[0]->name)) echo $gamedetail[0]->name; ?></span>
                    </div>
                </div>
                <div class="btn-wrap">
                    <a class="icon-btn" href="home.php">
                        <i class="ri-home-3-line"></i> 
                    </a>
                </div>
            </div>


            <div class="result-box-name mt-5">
               <p><?php if(!empty($gamedetail[0]->name)) echo $gamedetail[0]->name; ?></p>
               <p class="closing-time" style="color: red;">Closing Time : <?php if(!empty($gamedetail[0]->close_time)) echo date('h:i A',strtotime($gamedetail[0]->close_time)) ?></p>
            </div>

            

            <div class="game-list mt-5">

                <a href="game-jodi.php?game_id=<?=$game_id ?>" class="game-select-box green">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#fff">
                      <path d="M8 5v14l11-7z"/>
                    </svg>
                    <p style="color: white;">Jodi</p>
                </a>
                <a href="game-harup.php?game_id=<?=$game_id ?>" class="game-select-box blue">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#fff">
                      <path d="M8 5v14l11-7z"/>
                    </svg>
                    <p style="color: white;">Harup (Ander - Bahar)</p>
                </a>
                <a href="game-crossing.php?game_id=<?=$game_id ?>" class="game-select-box purple">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#fff">
                      <path d="M8 5v14l11-7z"/>
                    </svg>
                    <p style="color: white;">Crossing</p>
                </a>
                <a href="game-no-to-no.php?game_id=<?=$game_id ?>" class="game-select-box orange">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#fff">
                      <path d="M8 5v14l11-7z"/>
                    </svg>
                    <p style="color: white;">Number to Number</p>
                </a>
                <a href="game-copy-paste.php?game_id=<?=$game_id ?>" class="game-select-box black">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#fff">
                      <path d="M8 5v14l11-7z"/>
                    </svg>
                    <p style="color: white;">Copy Paste</p>
                </a>
            </div>
                
            


            <?php include('include/menubar.php'); ?>

        </div>
    </div>  

    <?php include('include/chat-btn.php'); ?>
    <?php include('include/allscript.php'); ?>





</body>
</html>