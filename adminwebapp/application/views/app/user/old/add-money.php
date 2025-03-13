<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include('include/allcss.php'); ?>
</head>
<body class='sc5 dark'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    <style>
    	.single-page-area .title-area {
		    padding: 14px 20px 14px;
		}
		.single-page-area {
		    padding-top: 25px;
		}
    </style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">Deposit</h3>
        </div>
        <div class="container">
            <div class="payment-method-card">
                <h6>Select Payment Method</h6>
                <div class="payment-method-select">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1"><img src="<?=base_url() ?>assets/img/card/2.png" alt="img"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2"><img src="<?=base_url() ?>assets/img/card/3.png" alt="img"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3"><img src="<?=base_url() ?>assets/img/card/4.png" alt="img"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                        <label class="form-check-label" for="inlineRadio4"><img src="<?=base_url() ?>assets/img/card/5.png" alt="img"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
                        <label class="form-check-label" for="inlineRadio5"><img src="<?=base_url() ?>assets/img/card/6.png" alt="img"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option6">
                        <label class="form-check-label" for="inlineRadio6"><img src="<?=base_url() ?>assets/img/card/7.png" alt="img"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio7" value="option7">
                        <label class="form-check-label" for="inlineRadio7"><img src="<?=base_url() ?>assets/img/card/8.png" alt="img"></label>
                    </div>
                </div>
            </div>
            <div class="amount-wrap">
                <div class="title-wrap">
                    <h6>Amount To Deposit</h6>
                    <span>$500 - 10,000</span>
                </div>
                <div class="single-input-wrap">
                    <input type="text" class="form-control" placeholder="$ 500">
                </div>
            </div>
            <button class="btn btn-base w-100" data-bs-toggle="modal" data-bs-target="#deposit-success-modal">Continue</button>
        </div>
         <?php include('include/menubar.php'); ?>        
    </div>  

    

    <div class="modal fade filter-modal-popup" id="deposit-success-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap text-center">
                        <div class="icon">
                            <i class="ri-check-line"></i>
                        </div>
                        <h3 class="title"> Deposit Success!</h3>
                        <p>You have successfully deposited funds in your wallet!</p>
                        <a class="btn btn-base w-100" href="">Got It</a>               
                    </div>
                </div>              
            </div>            
        </div>
    </div>

    <?php include('include/allscript.php'); ?>
</body>
</html>