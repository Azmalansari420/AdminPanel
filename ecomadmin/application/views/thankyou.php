<?php $this->load->view('header'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style>
        section {
/*    padding-top: 75px;*/
    margin: 50px 0;
}
.thankyou .box {
    max-width: 100%;
    margin: 0 auto;
    text-align: center;
    box-shadow: 0px 0px 10px 0px #ccc;
    padding: 50px 30px;
    border-radius: 25px;
}
.thankyou .box span.fa-check {
    height: 80px;
    width: 80px;
    background: #229d1c;
    color: #fff;
    font-size: 41px;
    border-radius: 100px;
    line-height: 80px;
    margin-bottom: 20px;
}

.thankyou .box h4 {
    font-weight: 800;
    font-size: 40px;
    margin-bottom: 14px;
}
.thankyou .box h5 {
    display: inline-block;
    padding: 10px 35px;
    background: #e3e9ff;
    border-radius: 35px;
    margin: 10px 0 15px 0;
    font-weight: 600;
}
.thankyou .des {
    font-size: 18px;
    text-align: center;
    line-height: 30px;
    margin-bottom: 0;
}

@media (min-width: 1200px)

{
    .h4, h4 {
    font-size: 1.5rem;
}
}
     </style>

     <section class="thankyou">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                  <div class="box">
                    <span class="fa fa-check" aria-hidden="true"></span>
                    <h4>Thank You</h4>
                    <!-- <h5>Your Total Score : <span>90</span></h5> -->
                  <p class="des">Your Order Has Been successfully Placed. <br>Our specialist will contact you shortly to help<br> you out with the process.</p>
                  </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('footer'); ?>
    
    