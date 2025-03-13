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
            <div class="profile-area">
                <div class="media">
                    <a href="" class="thumb">
                        <img src="assets/img/profile.png" alt="img">
                    </a>
                    <div class="media-body">
                        <span class="profile-name">Hello, Devon Lane</span>
                        <div class="balance">500 <span><img src="assets/coin.png" alt="img"></span></div>
                    </div>
                </div>
                <div class="btn-wrap">
                    <!-- <a class="icon-btn" href=""><i class="ri-search-line"></i></a> -->
                    <a class="icon-btn" href="notification.php"><i class="ri-notification-3-line"></i> <span class="badge">2</span></a>
                </div>
            </div>

            <!-- bannert -->  

            <div class="banner-slider owl-carousel pd-top-110 mb-1">
                <div class="item">
                    <img src="assets/img/banner/0217896453.jpg" alt="img">
                </div>
                <div class="item">
                    <img src="assets/img/banner/0278346951.jpg" alt="img">
                </div>
            </div>

            <!-- marquee -->
            <div class="marquee-line">
               <marquee>This text will scroll from right to left</marquee>
            </div>

            <!-- text box -->
            <div class="text-box-2">
                <p class="mb-0 text-white">🔥 भरोसे का एक ही नाम 🔥<br>
                🙏बाबा जी खाईवाल 🙏</br>
                <?php echo date("d M Y") ?> </p>
            </div>

            


            <div class="live-result-box">
              <h3 class="game-name">DISAWAR</h3>
              <div class="result-box">
                <img src="assets/img/icon/trophy.svg" alt="Winner Left" class="winner-image">
                <div class="number">42</div>
                <img src="assets/img/icon/trophy.svg" alt="Winner Right" class="winner-image">
              </div>
            </div>

            <div class="text-box-2">
                <p class="mb-0 text-white"> NOTE <br>
                👉 बिंदास होके खेलो भाईयो 👉 सबसे फास्ट पेमेंट मिलती है 
                👉  कोई भी गेम कभी भी लगाओ ऑटोमैटिक सिस्टम है रेट 10के 950 मिलते हैं <br>🙏 जय बाबा सागरनाथ अघोरी की 🙏</br>
                </p>
            </div>

            <div class="result-box-name">
               <p>GOA KING Live  Result Of <?php echo date("d M Y") ?></p>
            </div>


            <!-- <div> -->
                <!-- <div class="market-header">
                  <span class="span-market">Market Name/Time</span>
                  <span>
                    <a class="header-button">Previous Result</a>
                    <a class="header-button">Today Result</a>
                  </span>
                </div> -->


                <div class="card">
                  <div class="card-content">
                    <div class="card-left">
                      <div class="icon-box">DB</div>
                      <div class="market-details">
                        <h3>DELHI BAZAR</h3>
                        <p>Last winning number</p>
                      </div>
                    </div>
                    <div class="card-right">
                      <div class="winning-number">XX</div>
                    </div>
                  </div>
                </div>


                <div class="result-card blue">
                  <h3 class="market-name">SILVER CITY</h3>
                  <div class="timing">
                    <span>Open Time <strong>7:00 AM</strong></span>
                    <span>|</span>
                    <span>Close Time <strong>11:45 AM</strong></span>
                    <span>|</span>
                    <span>Result At <strong>12:00 PM</strong></span>
                  </div>
                  <div class="result-numbers">
                    <span class="result">14</span>
                    <span class="result secondary">XX</span>
                  </div>
                </div>

            <!-- </div> -->







            

            
            
            <?php include('include/menubar.php'); ?>


        </div>
    </div>  


    <?php include('include/allscript.php'); ?>

</body>
</html>

.market-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 9px;
    background: linear-gradient(90deg, #d64b00, #ff6900);
    color: white;
    font-size: 13px;
    font-weight: bold;
    border-radius: 8px;
}


span.span-market{
    font-size: 13px;
    font-weight: 600;
}

.header-button {
  background-color: #8a1c00;
  color: white;
  border: none;
  border-radius: 15px;
  padding: 5px 10px;
  cursor: pointer;
  font-size: 14px;
/*  margin-left: 10px;*/
}

.header-button:hover {
  background-color: #a52e00;
}

.result-card {
  margin: 10px auto;
  padding: 15px;
  border-radius: 10px;
  width: 90%;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  color: white;
}

.result-card.gray {
  background-color: #d3d3d3;
  color: black;
}

.result-card.blue {
  background-color: #0099ff;
}

.market-name {
  font-size: 18px;
  font-weight: bold;
  margin: 0;
}

.timing {
  display: flex;
  justify-content: space-between;
  margin: 10px 0;
  font-size: 14px;
  font-weight: bold;
}

.result-numbers {
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.result {
  font-size: 22px;
  font-weight: bold;
  margin-left: 10px;
}

.result.secondary {
  font-size: 20px;
  opacity: 0.7;
}
