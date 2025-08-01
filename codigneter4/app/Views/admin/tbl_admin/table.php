<table class="table table-striped table-td-valign-middle table-bordered bg-white">
  <thead>
    <tr>
      <th width="1%"><input type="checkbox" id="select-all"></th>
      <th>Role</th>
      <th>Username</th>
      <th>Password</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $this->db = \Config\Database::connect();
    $i = 1;
    foreach ($ALLDATA as $key => $data) { 
      $roleQuery = $this->db->table('role')->where('id', $data->role)->get();
      $roles = $roleQuery->getResult(); 
      // print_r($roles[0]->name);
      // die;
    ?>
    <tr>
      <td>
         <label>
           <?=$i++; ?>
         <input type="checkbox" name="multiple_delete[]" value="<?php echo $data->id; ?>" class="multiple_delete">
         </label>
      </td>
     
      <td><?php if(!empty($roles)) echo $roles[0]->name; ?></td>
      <td><?=$data->username ?></td>
      <td><?=$data->password ?></td>
      <td>
        <div class="switcher switcher-success">
         <span id="statusbyid<?=$data->id ?>"><?php echo status($data->status); ?> </span>
          <input type="checkbox" name="customSwitch-<?=$data->id ?>" id="customSwitch-<?=$data->id ?>" <?php if($data->status==1)echo'checked'; ?> onclick="click_here(<?=$data->id ?>)">
          <label for="customSwitch-<?=$data->id ?>"></label>
        </div>
      </td>
      <td class="btn-col text-nowrap" width="1%">
        <!-- <a href="" class="btn btn-info btn-xs m-r-2">View</a> -->
        <a href="<?=$edit_url.$data->id; ?>" class="btn btn-success btn-xs m-r-2">Update</a>
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
  $('#select-all').on('click', function () {
    $('.multiple_delete').prop('checked', this.checked);
  });

  
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