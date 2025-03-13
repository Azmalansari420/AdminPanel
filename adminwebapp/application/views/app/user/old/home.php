<?php
$about =  $this->db->get_where('content',array('id'=>4))->result_object();
$headline =  $this->db->get_where('content',array('id'=>5))->result_object();
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
   </style>
   <body class='sc5'>
      <!-- preloader area start -->
      <?php include('include/loader.php'); ?>
      <!-- preloader area end -->
      <div class="body-overlay" id="body-overlay"></div>
      <div class="container">
         <div class="main-home-area">
          <!-- top bar -->
            <div class="profile-area">
               <div class="media">
                  <a href="edit-profile.php" class="thumb">
                  <img src="<?=base_url() ?>media/uploads/users/<?=$full_detail->profile_image ?>" alt="img" onerror="this.src='<?=base_url() ?>media/uploads/users/user-profile.png'" width="44px" height="44px">
                  </a>
                  <div class="media-body">
                     <span class="profile-name">Hello, <?=$full_detail->name ?></span>
                     <div class="balance"> 
                        <span> <img src="<?=base_url() ?>assets/coin.png" alt="img"> </span>
                        <strong>&nbsp; <?=$full_detail->wallet ?> </strong> 
                     </div>
                  </div>
               </div>
               <div class="btn-wrap">
                  <!-- <a class="icon-btn" href=""><i class="ri-search-line"></i></a> -->
                  <a class="icon-btn" href="notification.php"><i class="ri-notification-3-line"></i> <span class="badge"><?=count_unread_notifications($full_detail->id) ?></span></a>
               </div>
            </div>

            <!-- bannert -->  
            <div class="banner-slider owl-carousel pd-top-110 mb-1">
               <?php
                  $this->db->order_by('id desc');
                  $slider = $this->db->get_where('slider',array('status'=>1,))->result_object();
                  foreach($slider as $data)
                    { ?>
               <div class="item">
                  <img src="<?=base_url() ?>media/uploads/slider/<?=$data->image ?>" alt="img">
               </div>
               <?php } ?>
            </div>

            <!-- marquee -->
            <div class="marquee-line">
               <marquee><?=$headline[0]->content ?></marquee>
            </div>

            <?php
            $gamename = "Wait";
            // Fetch today's last number
            $this->db->where('DATE(create_on)', date('Y-m-d')); 
            $this->db->order_by("id desc");
            $this->db->limit(1);
            $number = $this->db->get_where("game_result")->result_object();

            if (!empty($number)) {
                $number = $number[0];
                $data = $this->crud->selectDataByMultipleWhere('game', array('status' => 1, "id" => $number->game_id));
               if (!empty($data[0]))
               {
                  $gamename = $data[0]->name;
               }
               else
               {
                  $gamename = "Wait";

               }
             }
            ?>

            <!-- last game redult -->
            <div class="live-result-box">
               <h3 class="game-name"><?=$gamename?></h3>
               <div class="result-box">
                  <img src="<?=base_url() ?>assets/img/icon/trophy.svg" alt="Winner Left" class="winner-image">
                  <div class="number" style="color: #000000;background: #ffffff;"><?php if(!empty($number->number)){ echo $number->number;} else{echo 'XX';} ?></div>
                  <img src="<?=base_url() ?>assets/img/icon/trophy.svg" alt="Winner Right" class="winner-image">
               </div>
            </div>

            <div class="text-box-2">
               <?=$about[0]->content ?>
            </div>

            <!-- upcoming Game -->
            <div class="result-box-name">
               <p>Upcoming Games</p>
            </div>
            <div class="upcoming-games">
               <div class="game-row">

                <?php
                  $time = date("H:i:s"); // Get the current time in 24-hour format
                  $this->db->order_by('order_by asc');
                  $games = $this->db->get_where('game', array('status' => 1))->result_object();

                  foreach ($games as $data) {
                      // Convert open_time and close_time to 24-hour format for comparison
                      $open_time = date('H:i:s', strtotime($data->open_time));
                      $close_time = date('H:i:s', strtotime($data->close_time));

                      // Check if the close time is before the open time (spanning midnight)
                      if ($close_time < $open_time) {
                          // If close_time is before open_time, it means the range spans over midnight
                          if ($time >= $open_time || $time <= $close_time) {
                              $open_class = "open";
                              $open_status = "Open";
                              $open_url = "game-select.php?game_id=$data->id&id=$device_id";
                          } else {
                              $open_class = "";
                              $open_status = "Close";
                              $open_url = "javascript:void(0);";
                          }
                      } else {
                          // Normal case when the range does not span midnight
                          if ($time >= $open_time && $time <= $close_time) {
                              $open_class = "open";
                              $open_status = "Open";
                              $open_url = "game-select.php?game_id=$data->id&id=$device_id";
                          } else {
                              $open_class = "";
                              $open_status = "Close";
                              $open_url = "javascript:void(0);";
                          }
                      }
                      ?>

                         <a href="<?=$open_url ?>" class="game-card">
                             <div class="game-header">
                                 <div class="game-icon"><?=$data->short_name ?></div>
                                 <div class="status <?=$open_class ?>"><?=$open_status ?></div>
                             </div>
                             <h3 class="game-title"><?=$data->name ?></h3>
                             <div class="game-time"><?=date('h:i A', strtotime($data->result_time)) ?></div>
                             <p class="game-detail">Start Time: <strong><?=date('h:i A', strtotime($open_time)) ?></strong></p>
                             <p class="game-detail">Close Time: <strong><?=date('h:i A', strtotime($close_time)) ?></strong></p>
                         </a>

                     <?php } ?>



                  


               </div>
            </div>

            <!-- live result  -->
            <div class="result-box-name">
               <p>GOA KING Live  Result Of <?php echo date("d M Y") ?></p>
            </div>
            <?php
            $this->db->order_by('order_by asc');
            $game = $this->db->get_where('game',array('status'=>1,))->result_object();
            foreach($game as $data)
               {
                  $todayNumberValue = "xx";
                  $yesterdayNumberValue = "xx";

                  $this->db->where('DATE(create_on)', date('Y-m-d'));
                  $this->db->order_by("id desc");
                  $this->db->limit(1);
                  $todayNumber = $this->db->get_where("game_result",array('game_id'=>$data->id))->result_object();
                  if (!empty($todayNumber)) 
                  {
                     $todayNumber = $todayNumber[0];
                     $todayNumberValue = $todayNumber->number;
                  }

                  // Fetch yesterday's number for the same game_id
                  $this->db->where('DATE(create_on)', date('Y-m-d', strtotime('-1 day')));
                  $this->db->order_by("id desc");
                  $this->db->limit(1);
                  $yesterdayNumber = $this->db->get_where("game_result",array('game_id'=>$data->id))->result_object();
                   if (!empty($yesterdayNumber)) 
                   {
                       $yesterdayNumber = $yesterdayNumber[0];
                       $yesterdayNumberValue = $yesterdayNumber->number;
                   }

                  

                  // print_r($number);


                ?>
            <div class="result-card">
               <div class="result-card-content">
                  <div class="result-card-left">
                     <div class="icon-box"><?=$data->short_name ?></div>
                     <div class="market-details">
                        <h3><?=$data->name ?></h3>
                        <p>Last Winning Number:- <?=$yesterdayNumberValue ?></p>
                     </div>
                  </div>
                  <div class="result-card-right">
                     <div class="winning-number"><?=$todayNumberValue ?></div>
                  </div>
               </div>
            </div>
         <?php } ?>

          
            
            <?php include('include/menubar.php'); ?>
         </div>
      </div>
      <?php include('include/chat-btn.php'); ?>
      <?php include('include/allscript.php'); ?>
   </body>
</html>