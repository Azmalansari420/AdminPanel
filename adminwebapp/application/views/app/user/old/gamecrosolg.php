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

     .main-footer-bottom {
    border-radius: 0;
  }
  .footer-btn {
    background: white;
    padding: 7px 10px;
    font-weight: 800;
    font-size: 17px;
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



  .grid 
  {
    display: grid;
    grid-template-columns: repeat(2, 0fr);
    width: 100%;
    gap: 11px;
    justify-content: center;
/*    justify-content: start;*/
}

  .grid-item {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    border: 2px solid #007BFF;
    border-radius: 10px;
    padding: 0;
    background-color: black;
    height: 86px;
    width: 100px;
}

.game-title {
    text-align: center;
/*    text-align: start;*/
  }

  .grid-item .number {
    font-size: 14px;
    color: white;
    margin-top: 10px;
}

  .grid-item input {
    width: 100%;
  padding: 5px;
  border: 1px solid #007BFF;
  border-radius: 5px;
  text-align: center;
  background-color: black;
  color: white;

    height: 50px;
    font-size: 15px;
}

.form-check .form-check-label {
    color: #000000;
    font-size: 16px;
    font-weight: 800;
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
                <span class="number">Crossing</span>
                <input type="number" name="crossing" placeholder="Bet" id="crossing-input">
              </div>
              <div class="grid-item">
                <span class="number">Amount</span>
                <input type="number" name="amount" placeholder="Bet" class="bet-amount" id="bet-amount">
              </div>

              <!-- Checkbox for Jodi Cut -->
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="jodiCutCheckbox">
                <label class="form-check-label ms-2" for="jodiCutCheckbox">
                  Jodi Cut
                </label>
              </div>
            </div>

            <div class="game-title mt-4">
              <p><span class="crossing-no"></span> * <span class="get-no"></span></p>
            </div>

            <div class="grid">
              <div class="grid-item" id="get-number-container" style="display: none;">
                <input type="number" name="get-number" placeholder="Bet" id="get-number-input" style="height: 86px; font-size: 20px;">
              </div>
            </div>







            <div class="main-footer-bottom d-block text-center">
              <div class="row">
                <div class="col-6 p-0">
                  <div class="footer-btn">
                    <a href="" class="" style="color: black;">Total:- <span id="printed-amount">0</span></a>
                  </div>
                </div>
                <div class="col-6 p-0">
                  <div class="footer-btn" style="background: blue;">
                    <a href="javascript:void(0);" style="color: white;"class="place-bet-btn">Play Now</a>
                  </div>
                </div>
              </div>                 
            </div>
                
            

        </div>
    </div>  


    <?php include('include/allscript.php'); ?>


<script>



  // Select elements
  const crossingInput = document.getElementById("crossing-input");
  const getNumberContainer = document.getElementById("get-number-container");
  const getNumberInput = document.getElementById("get-number-input");
  const crossingNoSpan = document.querySelector(".crossing-no");
  const getNoSpan = document.querySelector(".get-no");
  const jodiCutCheckbox = document.getElementById("jodiCutCheckbox");
  const gameTitle = document.querySelector(".game-title");

  // Add event listeners
  jodiCutCheckbox.addEventListener("change", updateValues);
  crossingInput.addEventListener("input", updateValues);

  function updateValues() {
      const crossingValue = crossingInput.value;

      // Validate if crossingValue is between 0 and 9, including handling 0 specifically
      if (crossingValue >= 0 && crossingValue <= 9) {
          gameTitle.style.display = "block"; // Show the game-title box
          getNumberContainer.style.display = "block"; // Show the get-number input field

          // Calculate the value for getNumber based on Jodi Cut selection
          let getValue = jodiCutCheckbox.checked
              ? crossingValue
              : crossingValue * 11;

          // Format crossingValue and getValue to include leading zero
          const formattedCrossingValue = crossingValue.toString().padStart(2, '0');
          const formattedGetValue = getValue.toString().padStart(2, '0');

          // Update spans and input field
          getNumberInput.value = formattedGetValue;
          crossingNoSpan.textContent = formattedCrossingValue;
          getNoSpan.textContent = formattedGetValue; // Show "00" in get-no
      } else {
          // Hide the game-title and get-number field if value is out of range
          getNumberInput.value = ""; // Clear get-number input field
          crossingNoSpan.textContent = ""; // Clear crossing-no span
          getNoSpan.textContent = ""; // Clear get-no span
          gameTitle.style.display = "none"; // Hide the game-title box
      }
  }

  /* Bet Amount */
  const betAmountInput = document.querySelector('.bet-amount');
  const printedAmount = document.getElementById('printed-amount');

  betAmountInput.addEventListener('input', () => {
      const amount = betAmountInput.value; // Get the value from the input
      printedAmount.textContent = amount; // Update the displayed amount
      console.log(`Entered Amount: ${amount}`); // Print the value to the console
      console.log(`Entered Get Number Input: ${getNumberInput.value}`); // Print the get-number value to the console
  });





  $(document).on("click", ".place-bet-btn", function(e) {
      place_bet();
  });

  function place_bet() 
  {
      var game_id = <?=$game_id ?>;
      var number = $("#get-number-input").val();
      var amount = $("#bet-amount").val();
           
      var form = new FormData();
      form.append("game_id", game_id);
      form.append("number", number);
      form.append("amount", amount);

      if(number=="")
      {
        toaster("Enter Crossing No.", 'error');
        return false;
      }
      if(amount=="")
      {
        toaster("Enter Amount.", 'error');
        return false;
      }

      
      var settings = {
          url: "<?=base_url() ?>api/game/crossing_place_bet",
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
            toaster(response.message, 'success');
            $(".update-wallet").html(response.data.update_wallet_amount);
            $("#crossing-input").val('');  // Reset the crossing input
            $("#bet-amount").val('');  // Reset the amount input
            $("#get-number-input").val('');
            document.getElementById('printed-amount').textContent = '0';
            $("#get-number-container").hide();
            $(".game-title").hide();

          }
      });
  }





</script>


</script>




</body>
</html>