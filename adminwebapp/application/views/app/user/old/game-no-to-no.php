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
                <span class="number">From</span>
                <input type="number" name="from_number" placeholder="Number" id="from-input">
              </div>
              <div class="grid-item">
                <span class="number">To</span>
                <input type="number" name="to_number" placeholder="Number" id="to-input">
              </div>
              <div class="grid-item">
                <span class="number">Amount</span>
                <input type="number" name="amount" placeholder="Bet" id="amount-input">
              </div>
            </div>

            <div class="mt-3">
              <a class="btn btn-base w-100" href="javascript:void(0);"  id="add-btn">Add</a>
            </div>

            <div class="added-number-list" style="display: none;">
              <h6 class="title  mt-4">Added Numbers</h6>
              <div class="scrollable-table">
                <table>
                  <thead>
                    <tr>
                      <th>Number</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody id="number-list">
                    <!-- Dynamic rows will be added here -->
                  </tbody>
                </table>
              </div>
              <!-- <h6>Total Amount: <span >0</span></h6> -->
            </div>


            <!-- store a;; value here before send -->
            <input type="hidden" id="numbers" name="numbers">
            <input type="hidden" id="amounts" name="amounts">



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
    
   document.getElementById('add-btn').addEventListener('click', function () {
    const fromNumber = parseInt(document.getElementById('from-input').value);
    const toNumber = parseInt(document.getElementById('to-input').value);
    const amount = parseInt(document.getElementById('amount-input').value);

    if (isNaN(fromNumber) || isNaN(toNumber) || isNaN(amount)) {
        toaster("Please enter valid numbers in all fields.", 'error');
        return;
    }

    if (fromNumber > toNumber) {
        toaster('"From" must be less than or equal to "To."', 'error');
        return;
    }

    const numberList = document.getElementById('number-list');
    numberList.innerHTML = '';

    let totalAmount = 0;
    let numbers = []; // This will hold all the numbers in the range
    let amounts = []; // This will hold the corresponding amounts for each number

    for (let i = fromNumber; i <= toNumber; i++) {
        // Format numbers as "00", "01", ..., "09", "10", "11", ...
        let formattedNumber = i.toString().padStart(2, '0');

        const row = document.createElement('tr');
        row.innerHTML = `<td>${formattedNumber}</td><td>${amount}</td>`;
        numberList.appendChild(row);

        numbers.push(formattedNumber); // Add formatted number to the array
        amounts.push(amount); // Add corresponding amount to the array
        totalAmount += amount;
    }

    // Send the numbers and amounts to the backend when placing the bet
    document.getElementById('total-amount').textContent = totalAmount;
    document.querySelector('.added-number-list').style.display = 'block';

    // Save the numbers and amounts in hidden fields to send them in the AJAX request
    document.getElementById('numbers').value = JSON.stringify(numbers);
    document.getElementById('amounts').value = JSON.stringify(amounts);
});

   
// Place bet logic
$(document).on("click", ".place-bet-btn", function(e) {
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
        url: "<?=base_url() ?>api/game/numbertonumber_place_bet",
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

            $("#from-input").val('');
            $("#to-input").val('');
            $("#amount-input").val('');  // Reset the amount input as well

            // Hide the added number list table
            document.querySelector('.added-number-list').style.display = 'none'; 

            // Reset the total bet display
            document.getElementById('total-amount').textContent = '0';
        } else {
            // Handle error in response
            toaster(response.message, 'error');
        }
    }).fail(function() {
        // Handle AJAX failure
        toaster("An error occurred while placing the bet.", 'error');
    });
}






  </script>


</body>
</html>