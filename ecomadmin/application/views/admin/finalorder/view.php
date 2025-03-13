<!DOCTYPE html>
<html lang="en">
   <head>
      <title>View <?php echo $page_title; ?></title>
      <?php $this->load->view('admin/include/allcss') ?>

   </head>
   <body>
       <?php echo loder; ?> 
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">


          <?php $this->load->view('admin/include/header') ?>
          <?php $this->load->view('admin/include/sidebar') ?>


         
         <div id="content" class="app-content">
            <div class="d-flex align-items-center">
               <div>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                     <li class="breadcrumb-item active">Order Details</li>
                  </ol>
                  <h1 class="page-header">
                     Order Details
                  </h1>
               </div>
            </div>
          
            <div class="row gx-4">
               <div class="col-lg-8">
                  <div class="card border-0 mb-4">
                     <div class="card-header bg-none p-3 h6 m-0 d-flex align-items-center">
                        <i class="fa fa-shopping-bag fa-lg me-2 text-gray text-opacity-50"></i>
                        Products
                     </div>
                     <div class="card-body p-3 text-dark fw-bold">

                         <?php $i=0;
                           $order_id = $EDITDATA[0]->order_id;
                           $ALLDATA = $this->crud->selectDataByMultipleWhere('orders',array('order_id'=>$order_id,));


                           foreach($ALLDATA as $order)
                            { 
                               $i++; 
                               $coupon = $this->crud->selectDataByMultipleWhere('order_coupon',array('user_id'=>$order->user_id,'order_id'=>$order_id));
                               $product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$order->p_id,));

                               $this->db->group_by('p_id');
                               $allimage = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$order->p_id,'size_id'=>$order->size_id,'color_id'=>$order->color_id,));
                               // print_r($allimage);

                               $color_id = 0;
                               $this->db->group_by('color_id');
                               $this->db->limit(1);
                               $this->db->select("color_id");
                               $color = $this->db->get_where('all_images',array('p_id'=>$order->p_id,'color_id'=>$order->color_id))->result_object();
                               if(!empty($color))
                               {
                                   foreach ($color as $key => $value3) 
                                   { 
                                       $color_id = $value3->color_id;
                                       break;
                                   } 
                               }
                               $size_id = 0;
                               $this->db->group_by('size_id');
                               $this->db->limit(1);
                               $this->db->select("size_id");
                               $color = $this->db->get_where('all_images',array('p_id'=>$order->p_id,'size_id'=>$order->size_id,))->result_object();
                               if(!empty($color))
                               {
                                   foreach ($color as $key => $value4) 
                                   { 
                                       $size_id = $value4->size_id;
                                       break;
                                   } 
                               }
                                           
                           ?>

                        <div class="row align-items-center">
                           <div class="col-lg-8 d-flex align-items-center">
                              <div class="h-65px w-65px d-flex align-items-center justify-content-center position-relative">
                                 <img src="<?php echo base_url(); ?>media/uploads/product/<?php echo $allimage[0]->image; ?>" class="mw-100 mh-100" />
                                 <span class="w-20px h-20px p-0 d-flex align-items-center justify-content-center badge bg-primary text-white position-absolute end-0 top-0 fw-bold fs-12px rounded-pill mt-n2 me-n2"><?php echo $order->quantity; ?></span>
                              </div>
                              <div class="ps-3 flex-1">
                                 <div><a href="#" class="text-decoration-none text-dark"><?php echo $product[0]->name; ?></a></div>
                                 <div class="text-dark text-opacity-50 small fw-bold">
                                    Color: <?php echo colorname($color_id); ?><br>
                                    Size: <?php echo sizename($size_id); ?>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-2 m-0 ps-lg-3">
                              <?php echo number_format($allimage[0]->price,2); ?> x <?php echo $order->quantity; ?>
                           </div>
                           <div class="col-lg-2 text-dark fw-bold m-0 text-end">
                              ₹ <?php echo number_format($order->quantity*$allimage[0]->price,2); ?>
                           </div>
                        </div>
                        <hr class="my-4" />

                        <?php } ?>
                     </div>
                  </div>

                  <div class="card border-0">
                     <div class="card-header bg-none p-3 h6 m-0 d-flex align-items-center">
                        <i class="fa fa-credit-card fa-lg me-2 text-gray text-opacity-50"></i>
                        Amount
                     </div>
                     <div class="card-body">
                        <table class="table table-borderless table-sm fw-bold m-0">
                           <tbody>
                              <tr>
                                 <td class="w-150px">Subtotal</td>
                                 <td></td>
                                 <td class="text-end">₹ <?php echo number_format($EDITDATA[0]->sub_total,2); ?></td>
                              </tr>
                              <tr>
                                 <td>Shipping Charge</td>
                                 <td></td>
                                 <td class="text-end">+₹ <?php echo number_format($EDITDATA[0]->shipping_charge,2); ?></td>
                              </tr>
                              <?php
                                if(!empty($coupon))
                                    { 
                                   $couponamout = $EDITDATA[0]->finalprice-$EDITDATA[0]->after_discount_final_price;
                                   $couponname = $this->crud->selectDataByMultipleWhere('coupen_code',array('name'=>$coupon[0]->coupon,));

                                  ?>
                              <tr>
                                 <td>Promo Code</td>
                                 <td>promo code: 
                                    <u class="text-success">
                                       <?php if(!empty($couponname)) echo $couponname[0]->name; ?>
                                       (<?php if($couponname[0]->type==2){ echo "Amount";}else{echo '%';} ?>)
                                    </u> 
                                 </td>
                                 <td class="text-end">-₹ (<strike><?php echo number_format($couponamout,2); ?></strike>)</td>
                              </tr>
                           <?php } ?>
                              
                              <tr>
                                 <td colspan="3">
                                    <hr class="m-0" />
                                 </td>
                              </tr>

                              <tr>
                                 <td class="pt-2 pb-2" nowrap>Total</td>
                                 <td class="pt-2 pb-2"></td>
                                 <td class="text-end pb-2 text-decoration-underline">₹ <?php echo number_format($EDITDATA[0]->after_discount_final_price,2); ?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card border-0 mb-4">
                     <div class="card-header bg-none p-3 h6 m-0 d-flex align-items-center">
                        Order Notes
                     </div>
                     <div class="card-body">
                        <?php echo $EDITDATA[0]->order_note; ?>
                     </div>
                  </div>




                  <div class="card border-0 mb-4">
                     <div class="card-header bg-none p-3 h6 m-0 d-flex align-items-center">
                        Customer
                     </div>
                     <div class="card-body fw-bold">
                        <div class="d-flex align-items-center">
                           <a href="#!" class="d-block">
                              <img src="<?php echo base_url(); ?>media/admin/img/user/user.jpg" width="45" class="rounded-pill" /></a>
                           <div class="flex-1 ps-3">
                              <a href="#!" class="d-block text-decoration-none"><?php echo $EDITDATA[0]->f_name; ?> <?php echo $EDITDATA[0]->l_name; ?></a>
                              <a href="mailto:<?php echo $EDITDATA[0]->email; ?>"><?php echo $EDITDATA[0]->email; ?></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card border-0 mb-4">
                     <div class="card-header bg-none p-3 h6 m-0 d-flex align-items-center">Shipping Information</div>

                     <div class="card-body fw-bold">
                        <i class="fa fa-phone fa-fw"></i> <?php echo $EDITDATA[0]->mobile; ?><br /><br />
                        <?php echo $EDITDATA[0]->house_str_no; ?> <br />
                        <?php echo $EDITDATA[0]->city; ?>, <?php echo $EDITDATA[0]->pincode; ?><br />
                        <?php echo $EDITDATA[0]->state; ?>, <?php echo $EDITDATA[0]->country; ?> <br/>
                     </div>
                  </div>

                  <!-- <div class="card border-0 mb-4">
                     <div class="card-header bg-none p-3 h6 m-0 d-flex align-items-center">
                        Billing Information
                        <a href="#" class="ms-auto text-decoration-none text-gray-500">Edit</a>
                     </div>
                     <div class="card-body fw-bold">
                        867 Highland View Drive<br />
                        Newcastle, CA<br />
                        California<br />
                        95658<br />
                     </div>
                  </div> -->

               </div>
            </div>
         </div>
       
      </div>



   <?php $this->load->view('admin/include/footer') ?>
<script>
  $('#wysihtml5').wysihtml5();
</script>
   </body>
</html>