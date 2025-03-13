<table class="table table-striped table-td-valign-middle table-bordered bg-white">
  <thead>
    <tr>
      <th width="1%">#</th>
      <th>Date</th>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Subject</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i = 1;
    foreach ($ALLDATA as $key => $data) { 
    ?>
    <tr>
      <td>
         <label>
           <?=$i++; ?>
         <input type="checkbox" name="multiple_delete[]" value="<?php echo $data->id; ?>" class="multiple_delete">
         </label>
      </td>
      <td><?=date("d/m/Y : h:i A",strtotime($data->addeddate)) ?></td>
      <td><?=$data->name ?></td>
      <td><?=$data->email ?></td>
      <td><?=$data->mobile ?></td>
      <td><?=$data->subject ?></td>
      
      <td class="btn-col text-nowrap" width="1%">
        <!-- <a href="" class="btn btn-info btn-xs m-r-2">View</a> -->
        <a href="<?=$edit_url.$data->id; ?>" class="btn btn-success btn-xs m-r-2">View</a>
        <a href="javascript:void(0);" class="btn btn-danger btn-xs text-white delete-btn-ajax" data-id="<?=$data->id ?>">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="5">
      Total Data: <?= $total_rows ?> | Total Pages: <?= $total_pages ?>
    </td>
    </tr>
  </tfoot>
</table>

<script>
     $('.delete-btn-ajax').on('click', function(event) {
      event.preventDefault();
      var id = $(this).data('id');
      Swal.fire({
         title: "Are you sure?",
         showDenyButton: true,
         showCancelButton: true,
         confirmButtonText: "Yes",
      }).then((result) => {
         if (result.isConfirmed) {
            $.ajax({
               type: 'GET',
               url: '<?= base_url($singledelete_url) ?>/' + id,
               success: function(response) {
                  if (response.status === 'success') {
                      Swal.fire('Deleted!', '', 'success');
                      location.reload();
                  } else {
                      Swal.fire('Error', 'Failed to delete the slider', 'error');
                  }
               }
            });
         }
      });
   });
</script>