<!DOCTYPE html>
<html lang="en">
   <title><?=$page_title ?></title>
   <?=view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?=view('admin/include/topbar') ?>
         <?=view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <div class="card ">
               <div class="card-header card-header-inverse">
                  <h4 class="card-header-title"><?=$page_title ?> </h4>
                  <div class="card-header-btn">
                     <button  class="btn btn-danger delete_multiple">Delete Multiple</button>
                     <input type="search" name="" id="search">
                  </div>
               </div>
               <div class="card-body" id="table-data">
               </div>
               <div id="pagination-links"></div>
            </div>
         </div>
         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>
      
      <?=view('admin/include/theams') ?>
      <?=view('admin/include/allscript') ?>
      <script>
         /*load table data*/
           $.ajax({
             type: 'POST',
             url: '<?= base_url($get_table_data) ?>', 
             data: {search: '', limit: 10, offset: 0},
             success: function(data) {
                 $('#table-data').html(data.html);
             }
         });
         
         /*search data*/
            $('#search').on('keyup', function() {
             var search = $(this).val();
             $.ajax({
                 type: 'POST',
                 url: '<?=base_url($get_table_data)?>',
                 data: {
                     search: search,
                     limit: 10,
                     offset: 0
                 },
                 success: function(data) {
                     $('#table-data').html(data.html);
                     $('#pagination-links').html(data.pagination_links);
                 }
             });
         });
         
         /*--pagination--*/
            function loadTableData(offset = 0) {
                 $.ajax({
                     type: 'POST',
                     url: '<?=base_url($get_table_data) ?>',
                     data: {search: '', limit: 10, offset: offset},
                     success: function(data) 
                     {
                         $('#table-data').html(data.html);
                         $('#pagination-links').html(data.pagination_links);
                     }
                 });
             }
         
             $(document).ready(function() {
                 loadTableData();
             });
         
             $(document).on('click', '.pagination-link', function() {
                 var offset = $(this).data('offset');
                 loadTableData(offset);
             });
         
         
            // /*status change*/
           function click_here(id) 
             {
                 current_element = $('#statusbyid' + id);
                 var status = ($('#customSwitch-' + id).prop("checked") === true) ? 1 : 0;
                 $.ajax({
                     url: '<?php echo base_url($update_status) ?>',
                     method: 'POST',
                     data: { status: status, id: id },
                     success: function(data) 
                     {
                         console.log(data);
                         current_element.html(data.data['status']);
                     },
                     error: function(xhr, status, error) {
                         console.error("AJAX Error: ", status, error);
                     }
                 });
             }
         
         
            
         
            /*delete multiple*/
            $(document).ready(function(){
               $(".delete_multiple").click(function(event) {
                  var ids = [];
                  $('.multiple_delete:checked').each(function () {
                     ids.push(this.value);
                  });
         
                  if(ids.length == 0) {
                     Swal.fire("At least select one...");
                     return false;
                  }
                  Swal.fire({
                     title: "Are you sure?",
                     showDenyButton: true,
                     showCancelButton: true,
                     confirmButtonText: "Yes",
                  }).then((result) => {
                     if (result.isConfirmed) {
                        $.ajax({
                           url: '<?= base_url($delete_all) ?>',
                           method: 'post',
                           data: { id: ids },
                           success: function(response) {
                              if (response.status === 'success') {
                                 Swal.fire('Deleted!', '', 'success');
                                 location.reload();
                              } else {
                                 Swal.fire('Error', 'Failed to delete the sliders', 'error');
                              }
                           }
                        });
                     }
                  });
               });
            });
         
         
           
         
         
               
      </script>
   </body>
</html>