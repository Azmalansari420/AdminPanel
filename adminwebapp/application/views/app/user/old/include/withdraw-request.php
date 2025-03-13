
<?php
foreach($data as $key => $aValue)
{

?>
<tr>
  <td><?=$key +1 ?></td>
  <td><?=$aValue->requestid ?></td>
  <td><?=date('d-m-Y',strtotime($aValue->addeddate)) ?></td>
  <td><img src="<?=base_url() ?>assets/coin.png" alt="img" width="10px"> <?=$aValue->amount ?></td>
  <td><?=add_point_status($aValue->status) ?></td>
</tr>
<?php } ?>