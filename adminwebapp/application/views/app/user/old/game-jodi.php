<?php
$game_id = $this->input->get('game_id');
$gamedetail = $this->db->get_where('game',array('id'=>$game_id))->result_object();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<?php include('include/allcss.php'); ?>
</head>
<style>
  

.main-home-area 
{
  padding-top: 16px;
  padding-bottom: 60px;
}


.tabs {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
  width: 100%;
}

.tabs button {
  flex: 1;
    background-color: black;
    color: white;
    border: none;
    font-size: 16px;
    padding: 5px 10px;
    cursor: pointer;
    border-bottom: 2px solid white;
    border-radius: 5px;
        margin: 0px 4px;
}

.tabs {
    display: flex
;
    justify-content: space-between;
    margin-bottom: 20px;
    width: 100%;
}




.grid {
    display: grid;
    grid-template-columns: repeat(5, 0fr);
    width: 100%;
    gap: 11px;
    justify-content: center;
}

/*.grid-item {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    height: 71px;
    border: 2px solid #007BFF;
    border-radius: 10px;
    padding: 0;
    background-color: black;
    width: 70px;
}*/

.grid-item {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    height: 60px;
    border: 2px solid #007BFF;
    border-radius: 10px;
    padding: 0;
    background-color: black;
    width: 60px;
}

/*.grid-item .number {
  font-size: 14px;
  color: white;
  margin-bottom: 5px;
}*/
.grid-item .number {
    font-size: 14px;
    color: white;
    margin-bottom: 0px;
}

.grid-item input {
  width: 100%;
  padding: 5px;
  font-size: 12px;
  border: 1px solid #007BFF;
  border-radius: 5px;
  text-align: center;
  background-color: black;
  color: white;
}

.grid-item input::placeholder {
  color: #888;
}

.number {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: #000000;
    margin: 0 10px;
    width: 60px;
    height: 40px;
    background: #000000;
    border-radius: 9px;
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
                    <a class="btn back-page-btn"  href="home.php"><i class="ri-arrow-left-s-line"></i></a>
                    <div class="media-body">
                        <span class="profile-name" style="font-size: 18px;"><?php if(!empty($gamedetail[0]->name)) echo $gamedetail[0]->name; ?></span>
                    </div>
                </div>
                <div class="btn-wrap">
                    <div class="balance"> 
                        <span> <img src="<?=base_url() ?>assets/coin.png" alt="img" width="20px"> &nbsp; </span>
                        <strong class="update-wallet"> <?=$full_detail->wallet ?> </strong> 
                     </div>
                </div>
            </div>




            <?php include('include/game-category.php'); ?>


            <div class="grid">
              <div class="grid-item">
                <span class="number">01</span>
                <input type="number" name="01" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">02</span>
                <input type="number" name="02" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">03</span>
                <input type="number" name="03" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">04</span>
                <input type="number" name="04" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">05</span>
                <input type="number" name="05" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">06</span>
                <input type="number" name="06" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">07</span>
                <input type="number" name="07" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">08</span>
                <input type="number" name="08" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">09</span>
                <input type="number" name="09" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">10</span>
                <input type="number" name="10" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">11</span>
                <input type="number" name="11" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">12</span>
                <input type="number" name="12" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">13</span>
                <input type="number" name="13" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">14</span>
                <input type="number" name="14" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">15</span>
                <input type="number" name="15" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">16</span>
                <input type="number" name="16" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">17</span>
                <input type="number" name="17" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">18</span>
                <input type="number" name="18" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">19</span>
                <input type="number" name="19" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">20</span>
                <input type="number" name="20" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">21</span>
                <input type="number" name="21" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">22</span>
                <input type="number" name="22" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">23</span>
                <input type="number" name="23" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">24</span>
                <input type="number" name="24" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">25</span>
                <input type="number" name="25" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">26</span>
                <input type="number" name="26" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">27</span>
                <input type="number" name="27" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">28</span>
                <input type="number" name="28" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">29</span>
                <input type="number" name="29" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">30</span>
                <input type="number" name="30" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">31</span>
                <input type="number" name="31" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">32</span>
                <input type="number" name="32" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">33</span>
                <input type="number" name="33" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">34</span>
                <input type="number" name="34" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">35</span>
                <input type="number" name="35" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">36</span>
                <input type="number" name="36" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">37</span>
                <input type="number" name="37" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">38</span>
                <input type="number" name="38" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">39</span>
                <input type="number" name="39" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">40</span>
                <input type="number" name="40" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">41</span>
                <input type="number" name="41" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">42</span>
                <input type="number" name="42" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">43</span>
                <input type="number" name="43" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">44</span>
                <input type="number" name="44" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">45</span>
                <input type="number" name="45" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">46</span>
                <input type="number" name="46" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">47</span>
                <input type="number" name="47" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">48</span>
                <input type="number" name="48" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">49</span>
                <input type="number" name="49" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">50</span>
                <input type="number" name="50" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">51</span>
                <input type="number" name="51" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">52</span>
                <input type="number" name="52" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">53</span>
                <input type="number" name="53" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">54</span>
                <input type="number" name="54" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">55</span>
                <input type="number" name="55" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">56</span>
                <input type="number" name="56" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">57</span>
                <input type="number" name="57" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">58</span>
                <input type="number" name="58" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">59</span>
                <input type="number" name="59" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">60</span>
                <input type="number" name="60" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">61</span>
                <input type="number" name="61" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">62</span>
                <input type="number" name="62" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">63</span>
                <input type="number" name="63" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">64</span>
                <input type="number" name="64" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">65</span>
                <input type="number" name="65" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">66</span>
                <input type="number" name="66" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">67</span>
                <input type="number" name="67" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">68</span>
                <input type="number" name="68" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">69</span>
                <input type="number" name="69" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">70</span>
                <input type="number" name="70" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">71</span>
                <input type="number" name="71" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">72</span>
                <input type="number" name="72" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">73</span>
                <input type="number" name="73" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">74</span>
                <input type="number" name="74" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">75</span>
                <input type="number" name="75" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">76</span>
                <input type="number" name="76" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">77</span>
                <input type="number" name="77" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">78</span>
                <input type="number" name="78" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">79</span>
                <input type="number" name="79" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">80</span>
                <input type="number" name="80" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">81</span>
                <input type="number" name="81" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">82</span>
                <input type="number" name="82" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">83</span>
                <input type="number" name="83" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">84</span>
                <input type="number" name="84" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">85</span>
                <input type="number" name="85" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">86</span>
                <input type="number" name="86" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">87</span>
                <input type="number" name="87" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">88</span>
                <input type="number" name="88" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">89</span>
                <input type="number" name="89" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">90</span>
                <input type="number" name="90" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">91</span>
                <input type="number" name="91" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">92</span>
                <input type="number" name="92" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">93</span>
                <input type="number" name="93" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">94</span>
                <input type="number" name="94" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">95</span>
                <input type="number" name="95" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">96</span>
                <input type="number" name="96" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">97</span>
                <input type="number" name="97" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">98</span>
                <input type="number" name="98" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">99</span>
                <input type="number" name="99" placeholder="Bet" class="bet-input">
              </div>
              <div class="grid-item">
                <span class="number">00</span>
                <input type="number" name="00" placeholder="Bet" class="bet-input">
              </div>



            </div>


<style>
  .main-footer-bottom {
    border-radius: 0;
  }
  .footer-btn {
    background: white;
    padding: 7px 10px;
    font-weight: 800;
    font-size: 17px;
  }
</style>

            <div class="main-footer-bottom d-block text-center">
              <div class="row">
                <div class="col-6 p-0">
                  <div class="footer-btn">
                    <a href="" class="" style="color: black;">Total:- <span id="total-bet">0</span></a>
                  </div>
                </div>
                <div class="col-6 p-0">
                  <div class="footer-btn" style="background: blue;">
                    <a href="javascript:void(0);" style="color: white;"class="place-bet-btn">Play Now</a>
                    <!-- <a href="javascript:void(0);" style="color: white;" data-bs-toggle="modal" data-bs-target="#success-modal" class="place-bet-btn">Play Now</a> -->
                  </div>
                </div>
              </div>                 
            </div>
                
            

        </div>
    </div>  


    <?php include('include/allscript.php'); ?>










<script>
    function calculateTotal() 
    {
      let total = 0;
      const inputs = document.querySelectorAll('.bet-input');
      inputs.forEach(input => {
        const value = parseFloat(input.value); 
        if (!isNaN(value)) 
        {
          total += value; 
          console.log(`${input.name} - ${value}`);
        }
      });

      document.getElementById('total-bet').textContent = total;
    }

    const betInputs = document.querySelectorAll('.bet-input');
    betInputs.forEach(input => {
      input.addEventListener('input', calculateTotal);
    });


  /*game bet*/
 $(document).on("click", ".place-bet-btn", function(e) {
      place_bet();
  });

  function place_bet() 
  {
      var game_id = <?=$game_id ?>;
           
      var form = new FormData();
      form.append("game_id", game_id);

      const inputs = document.querySelectorAll('.bet-input');
      inputs.forEach(input => 
      {
          const number = input.name; 
          const amount = parseFloat(input.value);

          if (number === '') 
          {
            toaster("Select a Number", 'error');
            isValid = false; 
            return false;
          }

          if (isNaN(amount)) {
              toaster("Enter a Valid Amount", 'error');
              isValid = false;
              return false; 
          }

          if (!isNaN(amount)) {
              form.append("number[]", number);
              form.append("amount[]", amount);
          }
      });

      var settings = {
          url: "<?=base_url() ?>api/game/jodi_place_bet",
          method: "POST",
          dataType: "json",
          timeout: 0,
          processData: false,
          mimeType: "multipart/form-data",
          contentType: false,
          data: form
      };

      $.ajax(settings).done(function(response) 
      {
          console.log(response);
          if (response.status == 200) 
          {
            $(".update-wallet").html(response.data.update_wallet_amount);
            toaster(response.message, 'success');
            inputs.forEach(input => {
                input.value = ''; // Reset input value
            });
            document.getElementById('total-bet').textContent = '0';

          }
          else
          {
            toaster(response.message, 'error');

          }
      });
  }
















  </script>

</body>
</html>