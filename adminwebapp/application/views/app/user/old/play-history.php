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
        <div class="title-area">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4 text-white">Play History</h3>
        </div>

       

                
        <div class="container">


          <div class="mt-4 load-more">
            <!-- load here -->
          </div>
          <div style="text-align: center;margin-top: 15px;">
            <a class="btn btn-base w-100 mt-2 load-more-btn" href="javascript:void(0);">Load More</a>
            <!-- <button class="btn btn-primary btn-sm load-more-btn" ></button> -->
          </div>

            
        </div>
          <?php include('include/menubar.php'); ?>
    </div>     

   <?php include('include/allscript.php'); ?>
   <?php include('include/chat-btn.php'); ?>


<script>
  $(document).on("click", ".load-more-btn",(function(e) {
        click_btn = $(this);
      load_more();
    }));

    var page = 0;
    function load_more()
    {
        var click_btn = '.load-more-btn';

        $(click_btn).text('Wait..');
        $(click_btn).attr('disabled',true);

        var form = new FormData();
        form.append("page", page); 

        var settings = {
          "url": "<?=base_url() ?>api/user/play_history",
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
            if(response.status==200)
            {
              if(page==0)
                    $('.load-more').html(response.data);
                else
                    $(".load-more").append(response.data);
                page++;
                $(click_btn).show();
            }
            else
          {
            $(click_btn).hide();
            toaster(response.message, 'success');
          }
          $(click_btn).text('Load More');
          $(click_btn).attr('disabled',false);


        });
    }

    load_more();

    
</script>

</body>
</html>