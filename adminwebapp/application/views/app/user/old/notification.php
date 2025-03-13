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
    .single-page-area .title-area {
    padding: 10px 10px 10px;
}
    .single-page-area {
        padding-top: 60px;
    }
    .notification-card h6 {
    font-weight: 600;
}
.notification-card {
    justify-content: space-between;
}
</style>
    
    <div class="single-page-area">
        <div class="title-area justify-content-between">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4 text-white">Notifications</h3>
            <div class="balance"><?=$full_detail->wallet ?> <span><img src="<?=base_url() ?>assets/coin.png" alt="img"></span></div> 
        </div>

       
        <div class="container">
            <div class="notification-wrap">
                <?php
                    $this->db->select('n.*, ns.status as read_status');
                    $this->db->from('notification n');
                    $this->db->join('notification_status ns', 'n.id = ns.notification_id AND ns.user_id = '.$full_detail->id, 'left');
                    $this->db->order_by('n.id desc');
                    $notifications = $this->db->get()->result();

                    foreach($notifications as $data) { ?>
                <div class="notification-card">
                    <div class="details">
                        <h6><?=$data->title ?></h6>
                        <p><?=$data->message ?></p>
                        <span><?=date('d M, Y',strtotime($data->addeddate)) ?></span>
                        <span class="badge status-value<?=$data->id ?> badge-light rounded-pill text-bg-<?=($data->read_status == 1) ? 'success' : 'warning'?> small">
                                <?=($data->read_status == 1) ? 'Read' : 'Un Read'?>
                            </span>
                    </div>
                    <?php if($data->read_status == 0): ?>
                    <div class="form-check mb-2">
                        <input class="form-check-input hide0btn<?=$data->id ?> mark-as-read" type="checkbox " id="jodiCutCheckbox" data-id="<?=$data->id ?>">
                    </div>
                    <?php endif; ?>
                </div>
            <?php } ?>
                
            </div>
            <!-- <div style="text-align: center;margin-top: 15px;">
                <a class="btn btn-base w-100 mt-2 load-more-btn" href="javascript:void(0);">Load More</a>
              </div> -->
        </div>
        <?php include('include/menubar.php'); ?>     
    </div>  

    

    <?php include('include/allscript.php'); ?>


<script>
   const user_id = '<?=$full_detail->id ?>';
   var id = 0;
   var type = 0;
   $(document).on("click", ".mark-as-read",(function(e) {
    id = $(this).data('id');
    clciktoupdateticket_status();
    }));



   function clciktoupdateticket_status()
    {      
        var form = new FormData();
        form.append("user_id", user_id);
        form.append("id", id);

        var settings = {
          "url": "<?=base_url() ?>api/notification/clciktoupdatenotification_status",
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
          $(".status-value"+id).html(response.status);
          $(".hide0btn"+id).hide();
        });
    }

</script>

</body>
</html>