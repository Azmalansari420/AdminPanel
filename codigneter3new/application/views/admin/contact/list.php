<!DOCTYPE html>
<html lang="en">
   <title><?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <div class="card ">
               <div class="card-header card-header-inverse">
                  <h4 class="card-header-title"><?=$page_title ?> </h4>
                  <div class="card-header-btn">
                     <button  class="btn btn-danger delete_multiple" >Delete Multiple</button>
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
      <?php $this->load->view('admin/include/theams') ?>
      <?php $this->load->view('admin/include/allscript') ?>
      <script>
         /*load table data*/
            $.ajax({
              type: 'POST',
              url: '<?=base_url($pagination_url) ?>',
              data: {search: '', limit: 10, offset: 0},
              success: function(data) {
                var jsonData = JSON.parse(data);
                $('#table-data').html(jsonData.html);
              }
            });
         
         /*search data*/
            $('#search').on('keyup', function() {
              var search = $(this).val();
              $.ajax({
                type: 'POST',
                url: '<?=base_url($pagination_url) ?>',
                data: {search: search, limit: 10, offset: 0},
                success: function(data) {
                  var jsonData = JSON.parse(data);
                  $('#table-data').html(jsonData.html);
                }
              });
            });
         
         /*--pagination--*/
            function loadTableData(offset = 0) {
              $.ajax({
                type: 'POST',
                url: '<?=base_url($pagination_url) ?>',
                data: {search: '', limit: 10, offset: offset},
                success: function(data) {
                  var jsonData = JSON.parse(data);
                  $('#table-data').html(jsonData.html);
                  $('#pagination-links').html(jsonData.pagination_links);
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
         
            /*status change*/
            function click_here(id)
              {
                  current_element = $('#statusbyid'+id);
                  if($('#customSwitch-'+id).prop("checked")==true)
                      var status = 1;
                  else
                      var status = 0;
                  $.ajax({
                      url:'<?php echo $status_value; ?>',
                      method:'post',
                      data:{status:status,id:id},
                      success:function(data){
                          console.log(data);
                          // location.reload();
                          var result = JSON.parse(data);
                          current_element.html(result.data['status']);
                      }
                  });
              }
         
         
         
            /*delete multiple*/
            $(document).ready(function(){
               $(".delete_multiple").click(function(event)
                {
                  var ids = [];
                  $('.multiple_delete:checked').each(function () {
                     ids.push(this.value);
                  });
         
                  if(ids.length==0)
                  {
                     Swal.fire("Atleast Select one ....");
                     return false;
                  }
                  Swal.fire({
                     title: "Are you sure?",
                     showDenyButton: true,
                     showCancelButton: true,
                     confirmButtonText: "Yes",
                   }).then((result) => {
                  if (result.isConfirmed) 
                     {
                       $.ajax({
                           url:'<?php echo $multiple_delete; ?>',
                           method:'post',
                           data:{id:ids},
                           success:function(data)
                           {   
                              location.reload();
                           }
                        });                    
                     }
                   });
                 })
               });
         
             /*--single delete--*/
         
           
         
         
               
      </script>
   </body>
</html>