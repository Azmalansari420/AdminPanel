<?php

$requestid = $this->input->get('requestid');


/*qrcode show*/
$this->db->order_by("id", "RANDOM");
$this->db->limit(1);
$qrcode = $this->db->get_where('qrcode',array('status'=>1,))->result_object();
if(!empty($qrcode))
{
    $name = $qrcode[0]->name;
    $upi_id = $qrcode[0]->upi_id;
    $image = $qrcode[0]->image;
}


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
    .title
    {
        text-align: center;
    }

    .title {
      font-size: 18px;
      font-weight: bold;
    }

    .copy-btn {
      margin-left: 10px;
      padding: 5px 10px;
      background-color: #28a745;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
    }

    .copy-btn:hover {
      background-color: #218838;
    }
</style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4 text-white">QR Code</h3>
        </div>

                
        <div class="container">
            <div class="my-profile-detail">
                <!-- <h6 class="title">Welcome To GOA KING</h6> -->
                <div class="text-center">
                    <h6 class="title">Name:- <?=$name ?></h6>
                    <h6 class="title">
                      UPI ID:-
                      <span id="upi-id"><?=$upi_id ?></span>
                      <button class="copy-btn" onclick="copyToClipboard()">Copy</button>
                    </h6>
                    <img src="<?=base_url() ?>media/uploads/qrcode/<?=$image ?>">

                    <p class="mt-4" style="color:red;font-size: 18px;font-weight: 600;">UPI ID या QR CODE पै पेमेंट करके नीचे पेमेंट का UTR नंबर डाल दो !</p>
                </div>



                <form class="edit-form-wrap">
                    <div class="single-input-wrap">
                        <label>Unique Transaction Reference *</label>
                        <input type="number" class="form-control utr_no" placeholder="6 to 12 Digital UTR Number">
                    </div>
                    
                    <a class="btn btn-base w-100 mt-2 submit-btn" href="javascript:void(0);">Submit</a>
                </form>
            </div>
        </div>
          <?php include('include/menubar.php'); ?>
    </div>     

   <?php include('include/allscript.php'); ?>


   <script>
  function copyToClipboard() {
    const upiId = document.getElementById('upi-id').textContent;
    navigator.clipboard.writeText(upiId).then(() => {
        toaster('UPI ID copied to clipboard!', 'success');
    }).catch(err => {
      console.error('Failed to copy: ', err);
    });
  }



/*addd UTR No*/
  $(document).on("click", ".submit-btn",(function(e) {
      add_utrno();
    }));

    function add_utrno()
    {
        var utr_no = $(".utr_no").val();
        var requestid = <?=$requestid ?>;

        if(utr_no=='')
        {
            toaster("Enter UTR No", 'error');
            return false;
        }
        

        var form = new FormData();
        form.append("utr_no", utr_no);
        form.append("requestid", requestid);

        var settings = {
          "url": "<?=base_url() ?>api/Wallet/add_utrn_number",
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
          toaster(response.message, 'error');
          if(response.status==200)
          {
            window.location.href= response.url;
          }
        });
    }














</script>
</body>
</html>