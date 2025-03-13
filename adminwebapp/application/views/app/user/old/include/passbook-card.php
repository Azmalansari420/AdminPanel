<?php
foreach($data as $aValue)
{

?>

<style>
  .entry-title {
      font-size: 11px;
      font-weight: bold;
  }
  .entry-amount {
    font-size: 15px;
  }
</style>
<div class="passbook-entry">
                <div class="entry-header">
                  <span class="entry-title"><?=$aValue->message ?></span>
                  <?php
                  if($aValue->type=="debit")
                    { ?>
                  <span class="entry-amount negative">- <?=currency_simble($aValue->amount) ?></span>
                  <?php } else{?>
                  <span class="entry-amount positive">+ <?=currency_simble($aValue->amount) ?></span>
                  <?php } ?>
                </div>
                <div class="entry-footer">
                  <span class="entry-location"><?=date('d-m-Y h:i A',strtotime($aValue->date_time)) ?></span>
                  <a href="#!" class="view-details">Balance: <?=currency_simble($aValue->balance) ?></a>
                </div>
              </div>

<?php } ?>