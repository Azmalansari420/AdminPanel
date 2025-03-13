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

        .my-profile-detail {
            margin-top: 10px;
        }
   
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
    .widget-body {
        padding: 15px 0 0px;
        background: inherit!important;
    }
    .widget {
        background: inherit!important;
            margin-bottom: 0;
    }


    .money-btn 
    {
        position: inherit !important;
        background: #000000 !important;
        color: #ffffff !important;
        border-radius: 7px;
        padding: 0px 20px;
        height: 35px;
        line-height: 1;
        margin: 0 0 5px 0;
    }
    .money-btn:after {
        content: inherit;
    }

    .money-btn2 {
    position: inherit !important;
    background: #000000 !important;
    color: #ffffff !important;
    border-radius: 7px;
    padding: 0px 20px;
    height: 35px;
    line-height: 1;
    margin: 0 0 5px 0;
    }
    .money-btn2:after {
        content: inherit;
    }


    span.show-small {
        font-size: x-small;
        position: relative;
        left: 10px;
        top: -4px;
    }

    .box-xolor {
        border-radius: 16px;
        background: var(--white-color, #fff);
        box-shadow: 0px 3px 8px -1px rgba(71, 50, 50, 0.05), 0px 0px 1px 0px rgba(12, 26, 75, 0.24);
        padding: 16px 16px 20px;
        margin-bottom: 26px;
    }


/*tabele*/

.my-profile-detail {
  padding: 0px 10px 14px;
/*  padding: 15px;*/
  border: 1px solid #ccc;
  border-radius: 8px;
  background-color: #fff;
}

.title {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

.scrollable-table {
  max-height: 100%; /* Set the height limit for the scrollable area */
  overflow-y: auto; /* Enable vertical scrolling */
  overflow-x: auto; /* Enable horizontal scrolling if needed */
  border: 1px solid #ccc;
  border-radius: 8px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

thead {
  background-color: #f8f8f8;
  position: sticky;
  top: 0; /* Keeps header visible while scrolling */
  z-index: 1;
}

th, td {
    padding: 5px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    font-size: 10px;
    color: black;
    font-weight: 700;
}

th {
        font-size: 10px;
  font-weight: bold;
}

tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}

tbody tr:hover {
  background-color: #f1f1f1;
}

.my-profile-detail .title {
    text-align: center;
}


.add-more-btn {
    background: red;
    color: white;
    padding: 3px 4px;
    border-radius: 5px;
}

</style>
    
    <div class="single-page-area">
        <div class="title-area justify-content-between">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4 text-white">Wallet</h3>
            <div class="balance"><?=$full_detail->wallet ?> <span><img src="<?=base_url() ?>assets/coin.png" alt="img"></span></div> 
        </div>

      
        <div class="container">
            <div class="row flex-row">
                <div class="widget has-shadow">
                    <div class="widget-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="justify-content: space-between;">
                          <li class="nav-item" role="presentation" style="width: 48%;">
                            <button class="nav-link w-100 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" style="background-color: green;">Add Point</button>
                          </li>
                          <li class="nav-item" role="presentation" style="width: 48%;">
                            <button class="nav-link w-100" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="background-color: orangered;">Withdraw</button>
                          </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                            <div class="my-profile-detail box-xolor">
                                <form class="edit-form-wrap">
                                    <div class="single-input-wrap">
                                        <label>Select Type</label>
                                        <select class="form-control pay_type" >
                                            <option value="" selected>---Select Type---</option>
                                            <option value="1">Gpay</option>
                                            <option value="2">Phone Pay</option>
                                            <option value="3">PayTM</option>
                                        </select>
                                    </div>
                                    <div class="single-input-wrap">
                                        <label>Amount</label>
                                        <input type="text" class="form-control amount" placeholder="Enter Your Amount" id="w_amount" required>
                                    </div>

                                    <div class="text-center">
                                        <?php  
                                        $buttons = explode(",", "100,500,1000,1500,2000,2500,3000,3500");
                                        foreach ($buttons as $key => $value) {
                                        ?>
                                        <button type="button" class="btn btn-default money-btn" data-amt="<?=$value ?>"><?=$value ?></button>
                                        <?php } ?>
                                    </div>                                    
                                    
                                    <a class="btn btn-base w-100 mt-2 submit-btn" href="javascript:void(0);">Continue</a>
                                </form>
                            </div>

                            <!-- wallet History -->
                            <div class="my-profile-detail box-xolor mt-0  mb-0">
                              <h6 class="title pt-3">Wallet History</h6>
                              <div class="scrollable-table">
                                <table>
                                  <thead>
                                    <tr>
                                      <th>S No.</th>
                                      <th>Request ID</th>
                                      <th>Pay Mode</th>
                                      <th>Date</th>
                                      <th>Points</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody class="add-point-load-more">
                                      <!-- addd point  -->
                                  </tbody>
                                </table>

                                <div style="text-align: center;margin-top: 8px;margin-bottom: 5px;">
                                    <a href="javascript:void(0);" class="add-point-load-more-btn add-more-btn">Load More</a>
                                </div>
                              </div>
                            </div>

                          </div>

                          <!-- withdraw -->
                          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="my-profile-detail box-xolor">
                                <form class="edit-form-wrap">
                                    <div class="single-input-wrap">
                                        <label>Amount</label>
                                        <input type="text" class="form-control w-amount" placeholder="Enter Your Amount" id="w_amount2" readonly required>
                                    </div>


                                    <div class="text-center">
                                        <?php  
                                        $buttons = explode(",", "100,500,1000,1500,2000,2500,3000,3500");
                                        foreach ($buttons as $key => $value) {
                                        ?>
                                        <button type="button" class="btn btn-default money-btn2 mb-2" data-amt="<?=$value ?>"><?=$value ?></button>
                                        <?php } ?>
                                    </div>  

                                    <div class="text-center">
                                        <p style="color:red;font-weight: 600;">आप सिर्फ जीता हुआ पैसा ही अपने अकाउंट में निकाल सकते हो<br>Withdraw Time :- सुबह 10 से रात 10 बजे तक</p>
                                    </div>

                                    <div class="single-input-wrap">
                                        <label>UPI NO</label>
                                        <input type="text" class="form-control upi_no" placeholder="Enter Your UPI NO"  required>
                                    </div> 

                                    <div class="single-input-wrap">
                                        <label>Bank Name</label>
                                        <input type="text" class="form-control bank_name" placeholder="Enter Your Bank Name"  required>
                                    </div> 

                                    <div class="single-input-wrap">
                                        <label>Account Holder Name</label>
                                        <input type="text" class="form-control ac_name" placeholder="Enter Your Account Holder Name"  required>
                                    </div>                                   
                                    
                                    <div class="single-input-wrap">
                                        <label>Account Number</label>
                                        <input type="text" class="form-control ac_no" placeholder="Enter Your Account Number"  required>
                                    </div> 
                                    <div class="single-input-wrap">
                                        <label>Confirm Account Number</label>
                                        <input type="text" class="form-control con_ac_no" placeholder="Enter Your Confirm Account Number"  required>
                                    </div>  
                                    <div class="single-input-wrap">
                                        <label>IFSC Code</label>
                                        <input type="text" class="form-control ifsc_code" placeholder="Enter Your IFSC Code"  required>
                                    </div>                                   
                                    
                                    <a class="btn btn-base w-100 mt-2 withdraw-submit-btn" href="javascript:void(0);">Withdraw</a>
                                </form>
                            </div>

                            <div class="my-profile-detail box-xolor mt-0  mb-0">
                              <h6 class="title pt-3">Withdraw History</h6>
                              <div class="scrollable-table">
                                <table>
                                  <thead>
                                    <tr>
                                      <th>S No.</th>
                                      <th>Request ID</th>
                                      <th>Date</th>
                                      <th>Amount</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody class="withdraw-data">
                                    <!-- withdraw dataa -->                                    
                                  </tbody>
                                </table>
                                <div style="text-align: center;margin-top: 8px;margin-bottom: 5px;">
                                    <a href="javascript:void(0);" class="withdraw-load-more-btn add-more-btn">Load More</a>
                                </div>
                              </div>
                            </div>
                          </div>

                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

                
        
          <?php include('include/menubar.php'); ?>
    </div>     

    <?php include('include/chat-btn.php'); ?>
    <?php include('include/allscript.php'); ?>


<script type="text/javascript">
    var amount = 0;
    $(document).on("click", ".money-btn",(function(e) {
        amount = $(this).data('amt');    
        $("#w_amount").val(amount);
    }));


    $(document).on("click", ".money-btn2",(function(e) {
        amount = $(this).data('amt');    
        $("#w_amount2").val(amount);
    }));



/*addd point request*/
  $(document).on("click", ".submit-btn",(function(e) {
      add_point();
    }));

    function add_point()
    {
        var pay_type = $(".pay_type").val();
        var amount = $(".amount").val();

        if(pay_type=='')
        {
            toaster("Select Type", 'error');
            return false;
        }
        if(amount=='')
        {
            toaster("Enter Amount.", 'error');
            return false;
        }
        if(amount<=100)
        {
            toaster("Minimum Amount 100.", 'error');
            return false;
        }

        var form = new FormData();
        form.append("pay_type", pay_type);
        form.append("amount", amount);

        var settings = {
          "url": "<?=base_url() ?>api/Wallet/add_point_request",
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

/*add pointy list*/

    $(document).on("click", ".add-point-load-more-btn",(function(e) {
        click_btn = $(this);
      add_point_data();
    }));

    var page = 0;
    function add_point_data()
    {
        var click_btn = '.add-point-load-more-btn';

        $(click_btn).text('Wait..');
        $(click_btn).attr('disabled',true);

        var form = new FormData();
        form.append("page", page); 

        var settings = {
          "url": "<?=base_url() ?>api/wallet/add_point_data",
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
                    $('.add-point-load-more').html(response.data);
                else
                    $(".add-point-load-more").append(response.data);
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

    add_point_data();

    







    /*withdraw request*/
    $(document).on("click", ".withdraw-submit-btn",(function(e) {
      withdraw_request();
    }));

    function withdraw_request()
    {
        var amount = $(".w-amount").val();
        var upi_no = $(".upi_no").val();
        var bank_name = $(".bank_name").val();
        var ac_name = $(".ac_name").val();
        var ac_no = $(".ac_no").val();
        var con_ac_no = $(".con_ac_no").val();
        var ifsc_code = $(".ifsc_code").val();

        if(amount=='')
        {
            toaster("Select Amount", 'error');
            return false;
        }
        if(amount<=100)
        {
            toaster("Minimum Amount 100.", 'error');
            return false;
        }
        if(upi_no=='')
        {
            toaster("Enter UPI NO.", 'error');
            return false;
        }
        if(bank_name=='')
        {
            toaster("Enter Bank Name.", 'error');
            return false;
        }
        if(ac_name=='')
        {
            toaster("Enter A/C Name.", 'error');
            return false;
        }
        if(ac_no=='')
        {
            toaster("Enter A/C No.", 'error');
            return false;
        }
        
        if(ac_no!=con_ac_no)
        {
            toaster("Confirm Account No Not Match.", 'error');
            return false;
        }
        if(ifsc_code=='')
        {
            toaster("Enter IFSC Code.", 'error');
            return false;
        }

        
        var form = new FormData();
        form.append("amount", amount);
        form.append("upi_no", upi_no);
        form.append("bank_name", bank_name);
        form.append("ac_name", ac_name);
        form.append("ac_no", ac_no);
        form.append("ifsc_code", ifsc_code);

        var settings = {
          "url": "<?=base_url() ?>api/Wallet/withdraw_request",
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

    /*withdraw data*/
    $(document).on("click", ".withdraw-load-more-btn",(function(e) {
        click_btn = $(this);
      withdraw_data();
    }));

    var page = 0;
    function withdraw_data()
    {
        var click_btn = '.withdraw-load-more-btn';

        $(click_btn).text('Wait..');
        $(click_btn).attr('disabled',true);

        var form = new FormData();
        form.append("page", page); 

        var settings = {
          "url": "<?=base_url() ?>api/wallet/withdraw_req__data",
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
                    $('.withdraw-data').html(response.data);
                else
                    $(".withdraw-data").append(response.data);
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

    withdraw_data();












</script>





</body>
</html>