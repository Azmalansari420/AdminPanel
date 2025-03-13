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

.show-number {
    display: contents;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    border: 2px solid #007BFF;
    border-radius: 10px;
    padding: 0;
    background-color: black;
    height: 53px;
    width: 74px;
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
                <input type="number" name="crossing" placeholder="(0-7)" id="crossing-input">
              </div>
              <div class="grid-item">
                <span class="number">Amount</span>
                <input type="number" name="amount" placeholder="Amount" class="bet-amount" id="bet-amount">
              </div>

              <input type="hidden" id="numbers" name="numbers">
              <input type="hidden" id="amounts" name="amounts">

              <!-- Checkbox for Jodi Cut -->
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="jodiCutCheckbox">
                <label class="form-check-label ms-2" for="jodiCutCheckbox">
                  Jodi Cut
                </label>
              </div>
            </div>

            <div class="grid show-number" id="get-number-container" style="display: none;"></div>


            <!-- <div class="grid">
              <div class="grid-item" id="get-number-container" style="display: none;">
                <input type="number" name="get-number" placeholder="Bet" id="get-number-input" style="height: 86px; font-size: 20px;">
              </div>
            </div> -->







            <div class="main-footer-bottom d-block text-center">
              <div class="row">
                <div class="col-6 p-0">
                  <div class="footer-btn">
                    <a href="javascript:void(0);" class="" style="display: flex;color: black;justify-content: center;">Total:- <span id="printed-amount"> 0 </span></a>
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


function generateCombinations() {
  const crossingInput = document.getElementById("crossing-input").value;
  const amountInput = document.getElementById("bet-amount").value;
  const jodiCutCheckbox = document.getElementById("jodiCutCheckbox").checked;
  const getNumberContainer = document.getElementById("get-number-container");
  const totalAmountContainer = document.getElementById("printed-amount");

  // Validate that the input only contains digits
  if (!/^\d+$/.test(crossingInput)) {
    alert("Please enter only digits.");
    getNumberContainer.style.display = "none";
    totalAmountContainer.style.display = "none";
    return;
  }

  const digits = crossingInput.split("");
  let combinations = [];
  let amounts = [];

  // Generate combinations based on the number of digits in crossingInput
  digits.forEach((d1) => {
    digits.forEach((d2) => {
      combinations.push(d1 + d2);
    });
  });

  // Filter combinations for Jodi Cut (if enabled)
  if (jodiCutCheckbox) {
    // List of combinations to remove for Jodi Cut
    const invalidCombinations = ["00", "11", "22", "33", "44", "55", "66", "77", "88", "99"];
    
    combinations = combinations.filter((combo) => {
      // If the combo is one of the "same number" pairs, remove it
      return !invalidCombinations.includes(combo);
    });
  }

  // Display combinations in the input fields
  getNumberContainer.style.display = combinations.length ? "contents" : "none";
  getNumberContainer.innerHTML = ""; // Clear previous inputs

  combinations.forEach((combo) => {
    const inputField = document.createElement("input");
    inputField.type = "text";
    inputField.name = "get-number";
    inputField.value = combo;
    inputField.style =
      "color: white; text-align: center; border: 2px solid #007BFF; border-radius: 10px; padding: 0; background-color: black; height: 53px; width: 74px; margin: 5px;";
    inputField.readOnly = true;
    getNumberContainer.appendChild(inputField);

    // Collect numbers and amounts for sending via AJAX
    amounts.push(amountInput);
  });

  // Calculate and display the total amount
  let totalAmount = 0;
  combinations.forEach(() => {
    totalAmount += parseFloat(amountInput);
  });

  // Display total amount
  totalAmountContainer.style.display = "block";
  totalAmountContainer.textContent = `₹${totalAmount}`;

  // Log the combinations and amounts for debugging
  console.log("Combinations:", combinations);
  console.log("Amounts:", amounts);
  console.log("Total Amount: ₹", totalAmount);

  // Store the combinations and amounts in hidden input fields for submission
  document.getElementById("numbers").value = JSON.stringify(combinations);
  document.getElementById("amounts").value = JSON.stringify(amounts);
}

// Add event listeners for the inputs
document.getElementById("crossing-input").addEventListener("input", generateCombinations);
document.getElementById("bet-amount").addEventListener("input", generateCombinations);
document.getElementById("jodiCutCheckbox").addEventListener("change", generateCombinations);
































/*----API--*/

$(document).on("click", ".place-bet-btn", function (e) {
  place_bet();
});

function place_bet() {
  var game_id = <?=$game_id ?>;
  var isValid = true;  // Declare isValid for validation

  var form = new FormData();
  form.append("game_id", game_id);

  // Get numbers and amounts from hidden inputs
  const numbers = document.getElementById('numbers').value;
  const amounts = document.getElementById('amounts').value;

  // Validate the numbers and amounts
  if (!numbers || !amounts) {
    toaster("Please add valid numbers and amounts.", 'error');
    return;
  }

  form.append("numbers", numbers); // Send as JSON string
  form.append("amounts", amounts);  // Send as JSON string

  // AJAX settings for the request
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

  // Send the AJAX request
  $.ajax(settings).done(function(response) {
    console.log(response);
    if (response.status == 200) {
      toaster(response.message, 'success');
      $(".update-wallet").html(response.data.update_wallet_amount);


      // Reset the form inputs
      $("#crossing-input").val('');
      $("#bet-amount").val('');
      $("#jodiCutCheckbox").prop("checked", false);
      // Reset the hidden inputs for numbers and amounts
      $("#numbers").val('');
      $("#amounts").val('');

      $("#get-number-container").hide(); 
      document.getElementById('total-amount').textContent = '0';
      document.querySelector('.added-number-list').style.display = 'none'; 
    } else {
      // Handle error in response
      toaster(response.message, 'error');
    }
  }).fail(function() {
    // Handle AJAX failure
    toaster(response.message, 'error');
  });
}







</script>


</script>




</body>
</html>