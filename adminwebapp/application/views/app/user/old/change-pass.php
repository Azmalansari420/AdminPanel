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
            <h3 class="ps-4 text-white">Update Password</h3>
        </div>

       

                
        <div class="container">
            <div class="my-profile-detail">
                <h6 class="title">Change Your Password</h6>
                <form class="edit-form-wrap">
                    <div class="single-input-wrap">
                        <label>Enter Old Password</label>
                        <input type="text" class="form-control oldpassword" placeholder="Enter Old Password">
                    </div>
                    <div class="single-input-wrap">
                        <label>Enter New Password</label>
                        <input type="text" class="form-control npassword" placeholder="Enter New Password">
                    </div>
                    <div class="single-input-wrap">
                        <label>Enter Confirm Password</label>
                        <input type="text" class="form-control cpassword" placeholder="Enter Confirm Password" >
                    </div>
                   
                    <a class="btn btn-base w-100 mt-4 submit-btn" href="javascript:void(0);">Update</a>
                </form>
            </div>
        </div>
          <?php include('include/menubar.php'); ?>
    </div>     

   <?php include('include/allscript.php'); ?>

<script>

    $(document).on("click", ".submit-btn",(function(e) {
      change_password();
    }));

    function change_password()
    {
        var oldpassword = $(".oldpassword").val();
        var npassword = $(".npassword").val();
        var cpassword = $(".cpassword").val();

        if(oldpassword=="")
        {
            toaster("Enter Old Password.", 'error');
            return false;
        }
        if(npassword=="")
        {
            toaster("Enter New Password.", 'error');
            return false;
        }
        if(cpassword=="")
        {
            toaster("Enter Confirm Password.", 'error');
            return false;
        }

        var form = new FormData();
        form.append("oldpassword", oldpassword);
        form.append("npassword", npassword);
        form.append("cpassword", cpassword);

        var settings = {
          "url": "<?=base_url() ?>api/user/password_update",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) 
        {
          // console.log(response);
            toaster(response.message, 'error');
            if(response.status==200)
            {
                $(".oldpassword").val();
                $(".npassword").val();
                $(".cpassword").val();
              toaster(response.message, 'success');
            }
        });
    }

    

</script>









</body>
</html>