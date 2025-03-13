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
            <h3 class="ps-4 text-white">Update Profile</h3>
        </div>

        <div class="container">
            <div class="my-profile-wrap">
                <div class="media">

                   

                    <label class="thumb">
                        <img src="<?=base_url() ?>media/uploads/users/<?=$full_detail->profile_image ?>" alt="img" class="user-image">
                        <div class="icon">
                            <input type="file" name="image" accept="image/*" class="upload_image" data-target=".user_profile_image" style="display: none;">
                            <i class="fa fa-camera"></i>
                        </div>
                    </label>

                    <div class="media-body">
                        <h6 class="profile-name"><?=$full_detail->name ?></h6>
                        <p class="profile-mail"><?=$full_detail->email ?></p>
                    </div>
                </div>
            </div>
        </div>

                
        <div class="container">
            <div class="my-profile-detail">
                <h6 class="title">User Information</h6>
                <form class="edit-form-wrap">
                    <div class="single-input-wrap">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Devon Dee" id="name" value="<?=$full_detail->name ?>" >
                    </div>

                    <div class="single-input-wrap">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="devon@gmail.com" id="email" value="<?=$full_detail->email ?>">
                    </div>
                    <div class="single-input-wrap">
                        <label>Mobile</label>
                        <input type="number" class="form-control" placeholder="91-9874563210" id="mobile" value="<?=$full_detail->mobile ?>" disabled>
                    </div>
                    
                    <a class="btn btn-base w-100 mt-4 submit-btn" href="javascript:void(0);">Update</a>
                </form>
            </div>
        </div>
          <?php include('include/menubar.php'); ?>
    </div>     

   <?php include('include/allscript.php'); ?>



<script>
    const user_id = '<?=$full_detail->id ?>';

    $(".upload_image").on('change', function(){
         var files = [];
         var j=1;      
         for (var i = 0; i < this.files.length; i++)
         {
           if (this.files && this.files[i]) 
           {
               var reader = new FileReader();
               reader.onload = function (e) {                
               update_profile_image(e.target.result);
                   j++;
               }
               reader.readAsDataURL(this.files[i]);
           }
         }
      });

    function  update_profile_image(image)
      {
           var form = new FormData();
           form.append("user_id", user_id);
           form.append("image", image);
           var settings = {
             "url": "<?=base_url() ?>api/user/update_image",
             "method": "POST",
             "processData": false,
             "mimeType": "multipart/form-data",
             "contentType": false,
             "dataType": "json",
             "data": form
           };
           $.ajax(settings).done(function (response) {
            toaster(response.message, 'success');
            if(response.status==200)
            {
                 $(".user_profile_image").attr('src',image);
                 $(".user-image").attr('src',image);
            }
           });
      }


      /**/

      $(document).on("click", ".submit-btn",(function(e) {
          update_profile();
        }));

        function update_profile()
        {
            var name = $("#name").val();
            var mobile = $("#mobile").val();
            var email = $("#email").val();

            
            var form = new FormData();
            form.append("user_id", user_id);        
            form.append("name", name);
            form.append("mobile", mobile);
            form.append("email", email);

            var settings = {
              "url": "<?=base_url() ?>api/user/update_profile",
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
              console.log(response.data.name);
              toaster(response.message, 'success');
              $('.profile-name').html(response.data.name)
              $('.profile-mail').html(response.data.email)
            });
        }
</script>





</body>
</html>