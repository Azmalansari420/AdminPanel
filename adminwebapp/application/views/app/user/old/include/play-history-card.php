<?php
// $totalamount = 0;
foreach($data as $aValue) 
{

  $totalAmount = $aValue->totalAmount;
  
?>

<style>
  
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
</style>
<div class="passbook-entry">
  <div class="entry-header">
    <span class="entry-title"><?=$aValue->game_type_name ?></span>
    <span class="entry-amount negative">-  <?=currency_simble($totalAmount) ?></span>
  </div>
  <div class="entry-details">
    <span class="entry-date"><?=date("Y-m-d", strtotime($aValue->date)) ?> - <?=date("h:i A", strtotime($aValue->time)) ?></span>
    <!-- <span class="entry-balance">Number: <?=$aValue->number ?></span> -->
  </div>
  <div class="entry-footer">
    <span class="entry-location"><?=gamename($aValue->game_id) ?></span>
    <a href="javascript:void(0);" class="view-details" style="color: #ffff00;" data-id="<?=$aValue->id ?>">View Details</a>
  </div>
</div>

<div class="game-details" id="game-details-<?=$aValue->id ?>" style="display:none;">
  <div class="scrollable-table">
    <table>
      <thead>
        <tr>
          <th>S No.</th>
          <th>Number</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody class="">
        <?php
        $notification = $this->crud->selectDataByMultipleWhere('game_bet',array('request_id'=>$aValue->request_id,));
        foreach($notification as $key => $requestdata)
          { 
            
          ?>
          <tr>
            <td><?=$key+1 ?></td>
            <td><?=$requestdata->number ?></td>
            <td><?=$requestdata->amount ?> </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
</div>

<?php } ?>

<script>
  $(document).on("click", ".view-details", function () {
    var gameId = $(this).data("id"); 
    var detailsDiv = $("#game-details-" + gameId);
    detailsDiv.toggle();
});
</script>