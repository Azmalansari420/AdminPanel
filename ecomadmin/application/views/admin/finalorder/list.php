<!DOCTYPE html>
<html lang="en">
   <head>
      <title><?php echo $page_title; ?> List</title>
       <?php $this->load->view('admin/include/allcss') ?>

   </head>
   <body>
      <div id="snackbar"><?php echo $this->session->flashdata('message'); ?></div>
     <?php if($this->session->flashdata('message')){ ?>
       <script>
         function myFunction() {
           var x = document.getElementById("snackbar");
           x.className = "show";
           setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
         }
         myFunction();
         </script>
  
   <?php } ?>
      <?php echo loder; ?>
      <!--  -->
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">


        
          <?php $this->load->view('admin/include/header') ?>
          <?php $this->load->view('admin/include/sidebar') ?>


         
         <div id="content" class="app-content">
           
            <h1 class="page-header"><?php echo $page_title; ?> List</h1>

           

            <div class="row">
               
               <div class="col-xl-12">
                  <div class="panel panel-inverse">
                     <div class="panel-heading">
                        <h4 class="panel-title">All <?php echo $page_title; ?></h4>
                        <div class="panel-heading-btn">
                           <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                           <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                           <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                           <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                     </div>

                     <div class="panel-body">
                        <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                           <thead>
                              <tr>
                                 <th width="1%">#</th>
                                 <th>Order ID</th>
                                 <th>Date</th>
                                 <th>Custumer Details</th>
                                 <th>Total</th>
                                 <th>Payment type</th>                               
                                 <th class="text-nowrap">Status</th>
                                 <th class="text-nowrap">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $i=0;
                              foreach ($ALLDATA as $key => $data) 
                                 {  $i++;   ?>
                              <tr class="odd gradeX">
                                 <td width="1%" class="fw-bold text-dark"><?php echo $i; ?></td>
                                 <td><?php echo $data->order_id; ?></td>
                                 <td><?php echo date('d-M-Y',strtotime($data->addeddate)); ?></td>
                                 <td>
                                    Name:- <?php echo $data->f_name; ?> <?php echo $data->f_name; ?><br>
                                    Email:- <?php echo $data->email; ?><br>
                                    Mobile:- <?php echo $data->mobile; ?><br>
                                 </td>
                                 <td>₹ <?php echo number_format($data->after_discount_final_price,2); ?></td>
                                 <td><?php echo paymenttype($data->payment_type); ?></td>
                              
                                 <td class="">
                                    <form method="post" action="<?php echo base_url('admin_con/finalorder/status_change'); ?>" enctype="multipart/form-data">
                                       <input type="hidden" name="id" value="<?=$data->id ?>">
                                       <select class="form-select mb-2" name="status">
                                          <option value="0" <?php if($data->status==0)echo'selected'; ?>>Confirm Order</option>
                                          <option value="2" <?php if($data->status==2)echo'selected'; ?>>Warehouse</option>
                                          <option value="3" <?php if($data->status==3)echo'selected'; ?>>Shipped Order</option>
                                          <option value="4" <?php if($data->status==4)echo'selected'; ?>>Deliverd</option>
                                          <option value="5" <?php if($data->status==5)echo'selected'; ?>>Cancel</option>
                                       </select>
                                       <!-- <br> -->
                                       <input class="btn btn-dark" type="submit" name="submit" value="Update">
                                    </form>
                                 </td>

                                 <td>
                                    <a href="<?php echo $view_url.$data->id; ?>" class="btn btn-primary btn-sm">View</a>
                                    <a href="<?php echo $invoice_url.$data->id; ?>" class="btn btn-info btn-sm">Invoice</a>
                                    <a href="<?php echo $delete_url.$data->id; ?>" class="btn btn-danger btn-sm delete">Delete</a>
                                 </td>
                              </tr>
                           <?php } ?>
                              
                            
                           </tbody>
                        </table>
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
       
      </div>



   <?php $this->load->view('admin/include/footer') ?>

  <script type="text/javascript">
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
   </script>

   </body>
</html>