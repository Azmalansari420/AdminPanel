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

  .grid {
    display: grid;
    width: 100%;
    gap: 11px;
    justify-content: center;
    grid-template-columns: repeat(3, 0fr);
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

/*table*/
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
    font-size: 12px;
    color: black;
    font-weight: 700;
}

th {
        font-size: 14px;
  font-weight: bold;
}

tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}

tbody tr:hover {
  background-color: #f1f1f1;
}


.single-checkbox-inner {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 12px;
}
button.remove-btn {
    background: red;
    color: white;
    border: none;
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
    <span class="number">Number</span>
    <input type="number" name="get-number" id="get-number-input" placeholder="Number" required>
  </div>
  <div class="grid-item">
    <span class="number">Amount</span>
    <input type="number" name="amount" id="amount-input" placeholder="Bet" required>
  </div>
</div>

<div class="single-checkbox-inner">
  <div class="form-radio">
    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="with-palti" checked>
    <label class="form-check-label ms-1" for="exampleRadios1">With Palti</label>
  </div>
  <div class="form-radio">
    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="without-palti">
    <label class="form-check-label ms-1" for="exampleRadios2">Without Palti</label>
  </div>
</div>

<div class="mt-3">
  <a class="btn btn-base w-100" href="javascript:void(0);" id="add-btn">Add</a>
</div>

<div class="added-number-list" style="display: none;">
  <h6 class="title mt-4">Added Numbers</h6>
  <div class="scrollable-table">
    <table>
      <thead>
        <tr>
          <th>Number</th>
          <th>Amount</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody id="number-list">
        <!-- Dynamic rows will be added here -->
      </tbody>
    </table>
  </div>
</div>



<input type="hidden" id="numbers" name="numbers" />
<input type="hidden" id="amounts" name="amounts" />

            <div class="main-footer-bottom d-block text-center">
              <div class="row">
                <div class="col-6 p-0">
                  <div class="footer-btn">
                    <a href="" class="" style="color: black;">Total:- <span id="total-amount">0</span></a>
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
document.getElementById("add-btn").addEventListener("click", function () {
  const numberInput = document.getElementById("get-number-input").value;
  const amountInput = document.getElementById("amount-input").value;

  // Check which radio button is selected
  const withPalti = document.getElementById("exampleRadios1").checked;

  if (!numberInput || !amountInput) {
    toaster("Please enter both number and amount!", "error");
    return;
  }

  const number = numberInput.trim();
  const amount = parseFloat(amountInput);
  const combinations = [];
  const usedPairs = new Set(); // Track used pairs
  const usedDigits = new Set(); // Track used digits

  // Generate combinations
  for (let i = 0; i < number.length; i++) {
    if (usedDigits.has(number[i])) continue; // Skip if digit is already used

    for (let j = i + 1; j < number.length; j++) {
      if (usedDigits.has(number[j])) continue; // Skip if digit is already used

      const pair1 = `${number[i]}${number[j]}`;
      const pair2 = `${number[j]}${number[i]}`;

      if (withPalti) {
        // Add both forward and reverse combinations (e.g., 12 and 21)
        combinations.push(pair1);
        combinations.push(pair2);
        usedDigits.add(number[i]);
        usedDigits.add(number[j]);
        usedPairs.add(pair1);
        usedPairs.add(pair2);
      } else {
        // Add only forward combination (e.g., 12 but not 21)
        if (!usedPairs.has(pair1) && !usedPairs.has(pair2)) {
          combinations.push(pair1);
          usedDigits.add(number[i]);
          usedDigits.add(number[j]);
          usedPairs.add(pair1);
        }
      }

      break; // Ensure a digit pairs only once
    }
  }

  // Handle leftover digits (single digits)
  for (let i = 0; i < number.length; i++) {
    if (!usedDigits.has(number[i])) {
      const singlePair = `${number[i]}${number[i]}`;
      combinations.push(singlePair); // Pair the digit with itself
      usedDigits.add(number[i]);
    }
  }

  // Add combinations to the table with Remove buttons
  const numberList = document.getElementById("number-list");
  numberList.innerHTML = ""; // Clear previous rows
  combinations.forEach((comb) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${comb}</td>
      <td>${amount}</td>
      <td><button class="remove-btn" data-combination="${comb}" data-amount="${amount}">Remove</button></td>
    `;
    numberList.appendChild(row);
  });

  // Show the table if hidden
  document.querySelector(".added-number-list").style.display = "block";

  // Function to calculate total amount and update hidden inputs
  const updateTotal = () => {
    const rows = numberList.querySelectorAll("tr");
    let totalAmount = 0;
    const remainingNumbers = [];
    const remainingAmounts = [];

    rows.forEach((row) => {
      const number = row.querySelector("td").textContent;
      const amount = parseFloat(row.querySelector("td:nth-child(2)").textContent);
      remainingNumbers.push(number);
      remainingAmounts.push(amount);
      totalAmount += amount;
    });

    // Update the total amount display
    $("#total-amount").html(totalAmount);

    // Update hidden inputs
    document.getElementById("numbers").value = JSON.stringify(remainingNumbers);
    document.getElementById("amounts").value = JSON.stringify(remainingAmounts);

    console.log("Remaining Numbers:", remainingNumbers);
    console.log("Remaining Amounts:", remainingAmounts);
    console.log("Total Amount:", totalAmount);
  };

  updateTotal();

  // Add event listeners to remove buttons
  numberList.querySelectorAll(".remove-btn").forEach((btn) => {
    btn.addEventListener("click", function () {
      const combination = this.getAttribute("data-combination");
      const row = this.closest("tr");
      row.remove(); // Remove the row

      console.log(`Removed Combination: ${combination}`);
      updateTotal(); // Recalculate total
    });
  });
});



// Place bet logic
$(document).on("click", ".place-bet-btn", function (e) {
    place_bet();
});

function place_bet() {
    var game_id = <?= $game_id ?>;
    var form = new FormData();

    // Get numbers and amounts from hidden inputs
    const numbers = document.getElementById("numbers").value;
    const amounts = document.getElementById("amounts").value;

    // Validate the numbers and amounts
    if (!numbers || !amounts || numbers === "[]" || amounts === "[]") {
        toaster("Please add valid numbers and amounts.", "error");
        return;
    }

    try {
        // Parse numbers and amounts to ensure valid JSON
        const parsedNumbers = JSON.parse(numbers);
        const parsedAmounts = JSON.parse(amounts);

        // Ensure arrays are not empty
        if (!Array.isArray(parsedNumbers) || !Array.isArray(parsedAmounts) || parsedNumbers.length === 0 || parsedAmounts.length === 0) {
            toaster("Please add valid numbers and amounts.", "error");
            return;
        }
    } catch (error) {
        // Handle JSON parsing errors
        toaster("Invalid numbers or amounts data.", "error");
        return;
    }

    // Append data to FormData
    form.append("game_id", game_id);
    form.append("numbers", numbers); // Send numbers as JSON string
    form.append("amounts", amounts); // Send amounts as JSON string

    // AJAX settings for the request
    var settings = {
        url: "<?=base_url() ?>api/game/copypaste_place_bet",
        method: "POST",
        dataType: "json",
        timeout: 0,
        processData: false,
        mimeType: "multipart/form-data",
        contentType: false,
        data: form,
    };

    // Send the AJAX request
    $.ajax(settings)
        .done(function (response) {
            console.log(response);
            if (response.status == 200) {
                // Success response
                toaster(response.message, "success");
                $(".update-wallet").html(response.data.update_wallet_amount);

                // Reset all inputs and UI
                $("#get-number-input").val("");
                $("#amount-input").val(""); // Reset the amount input
                document.querySelector(".added-number-list").style.display = "none"; // Hide the table
                document.getElementById("total-amount").textContent = "0"; // Reset the total amount
                document.getElementById("numbers").value = "[]"; // Clear numbers
                document.getElementById("amounts").value = "[]"; // Clear amounts
            } else {
                // Handle error in response
                toaster(response.message, "error");
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            // Handle AJAX failure
            console.error("AJAX Error:", textStatus, errorThrown);
            toaster("An error occurred while placing the bet.", "error");
        });
}

</script>



</body>
</html>