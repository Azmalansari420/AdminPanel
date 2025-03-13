<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Edit <?php echo $page_title; ?></title>
      <?php $this->load->view('admin/include/allcss') ?>

   </head>
   <body>
       <?php echo loder; ?> 
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">


          <?php $this->load->view('admin/include/header') ?>
          <?php $this->load->view('admin/include/sidebar') ?>


         
         <div id="content" class="app-content">
            <div class="d-flex align-items-center justify-content-between mb-3">
               <div>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                     <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> Edit <?php echo $page_title; ?></li>
                  </ol>
                  <h1 class="page-header mb-0">Edit <?php echo $page_title; ?></h1>
               </div>
               <div>
                  <button onclick="history.back();" class="btn btn-primary">Back</button>
               </div>
            </div>


            
            
               <form  class="row" method="post" enctype="multipart/form-data" action="#">
                  <div class="col-lg-12">
                     <ul class="nav nav-tabs">
                        <li class="nav-item">
                           <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                              <span class="d-sm-none">Contents</span>
                              <span class="d-sm-block d-none">Contents</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                              <span class="d-sm-none">Images</span>
                              <span class="d-sm-block d-none">Images</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">
                              <span class="d-sm-none">Status</span>
                              <span class="d-sm-block d-none">Status</span>
                           </a>
                        </li>
                     </ul>  


                     <div class="tab-content panel rounded-0 p-3 m-0">

                        <div class="tab-pane fade active show" id="default-tab-1">
                           <div class="card-body">
                              <div class="card-header h6 mb-0 bg-none p-3">
                                 <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Contents
                              </div>
                              <div class="row">
                                 <div class="col-lg-6 mb-3">
                                    <div class="mb-lg-0 mb-3">
                                       <label class="form-label">Select Categorie</label>
                                       <select class="form-select" name="cat_id" id="categorieid" required>
                                          <option disabled selected>-- Select Categorie --</option>
                                          <?php
                                          $this->db->order_by('id desc');
                                          $categories = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                                          foreach($categories as $data)
                                             { ?>
                                          <option <?php if($EDITDATA[0]->cat_id==$data->id) echo 'selected'; ?> value="<?php echo $data->id; ?>" ><?php echo $data->name; ?></option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 mb-3">
                                    <div class="mb-lg-0 mb-3">
                                       <label class="form-label">Select Sub Categorie</label>
                                       <select class="form-select" name="sub_cat_id" id="location" required>
                                          <?php
                                          $this->db->order_by('id desc');
                                          $categories = $this->crud->selectDataByMultipleWhere('sub_categories',array('status'=>1,));
                                          foreach($categories as $data)
                                             { ?>
                                          <option <?php if($EDITDATA[0]->sub_cat_id==$data->id) echo 'selected'; ?> value="<?php echo $data->id; ?>" ><?php echo $data->name; ?></option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                 </div>

                                 <div class="col-lg-6 mb-4">
                                    <div class="mb-lg-0 mb-3">
                                       <label class="form-label">Name</label>
                                       <input type="text" class="form-control" name="name" required value="<?php echo $EDITDATA[0]->name; ?>">
                                    </div>
                                 </div>
                                 <div class="col-lg-6 mb-4">
                                    <div class="mb-lg-0 mb-3">
                                       <label class="form-label">Rating</label>
                                       <input type="number" class="form-control" name="rating" required value="<?php echo $EDITDATA[0]->rating; ?>">
                                    </div>
                                 </div>
                                 
                                 <div class="col-lg-6 mb-4">
                                    <div class="mb-lg-0 mb-3">
                                       <label class="form-label">SKU Code</label>
                                       <input type="text" class="form-control" name="sku" value="<?php echo $EDITDATA[0]->sku; ?>">
                                    </div>
                                 </div>
                                 <div class="col-lg-6 mb-4">
                                    <div class="mb-lg-0 mb-3">
                                       <label class="form-label">Avalibility</label>
                                       <input type="text" class="form-control" name="avalibility" value="<?php echo $EDITDATA[0]->avalibility; ?>">
                                    </div>
                                 </div>


                                 <div class="col-lg-12 mb-4">
                                    <div class="mb-lg-0 mb-3">
                                       <label class="form-label">Small Info</label>
                                       <textarea class="form-control" name="small_info" id="small_info"  placeholder="Enter text ..." rows="12"><?php echo $EDITDATA[0]->small_info; ?></textarea>
                                    </div>
                                 </div>

                                 <div class="col-lg-12 mb-4">
                                    <div class="mb-lg-0 mb-3">
                                       <label class="form-label">Video Link</label>
                                       <textarea class="form-control" name="video_link"  placeholder="Enter text ..." rows="4"><?php echo $EDITDATA[0]->video_link; ?></textarea>
                                    </div>
                                 </div>

                                 <div class="col-lg-12 mb-4">
                                    <div class="mb-lg-0 mb-3">
                                       <label class="form-label">Description</label>
                                       <textarea class="form-control" name="description" id="description"  placeholder="Enter text ..." rows="12"><?php echo $EDITDATA[0]->description; ?></textarea>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 mb-4">
                                    <div class="mb-lg-0 mb-3">
                                       <label class="form-label">Additional Information</label>
                                       <textarea class="form-control" name="additional_info" id="additional_info"  placeholder="Enter text ..." rows="12"><?php echo $EDITDATA[0]->additional_info; ?></textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>                      
                        </div>


                        <div class="tab-pane fade" id="default-tab-2">
                           <div class="card border-0 mb-4">
                              <div class="card-header h6 mb-0 bg-none p-3">
                                 <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Upload Image
                              </div>
                              <div class="card-body">
                                 <div class="row">

                                     <div class="col-lg-6 mb-4">
                                       <div class="mb-lg-0 mb-3 bg-light">
                                          <label class="form-label"style="width: 100%;text-align: center; position: relative;border: 1px solid aliceblue;">Upload image
                                             <img id="blah" src="<?php echo base_url($upload_path); ?><?php echo $EDITDATA[0]->thumb_img; ?>" class="sd" style="width: 100%; height: 100%; position: relative; top: -22px;">
                                             <input  type="hidden" class="form-control" name="oldthumb_img" value="<?php echo $EDITDATA[0]->thumb_img; ?>">
                                             <input style="display: none;" type="file" class="form-control" name="thumb_img"  id="imgInp">
                                         </label>
                                       </div>
                                    </div>
                                     <div class="col-lg-6 mb-4">
                                       <div class="mb-lg-0 mb-3 bg-light">
                                          <label class="form-label"style="width: 100%;text-align: center; position: relative;border: 1px solid aliceblue;">Upload image
                                             <img id="blah2" src="<?php echo base_url($upload_path); ?><?php echo $EDITDATA[0]->thumb_img2; ?>" class="sd" style="width: 100%; height: 100%; position: relative; top: -22px;">
                                             <input  type="hidden" class="form-control" name="oldthumb_img2" value="<?php echo $EDITDATA[0]->thumb_img2; ?>">
                                             <input style="display: none;" type="file" class="form-control" name="thumb_img2"  id="imgInp2">
                                         </label>
                                       </div>
                                    </div>

                                  

                                     <div class="col-md-12">
                                         <h2 class="mb-3" style="font-size: 20px;">Upload Images</h2>
                                        
                                         <ul id="add-more-field" style="padding: 0;">
                                             <?php  
                                                 $data = array();
                                                 $count = 1;
                                                 if(!empty($EDITDATA[0]->all_images))
                                                 {
                                                     $all_images = json_decode($EDITDATA[0]->all_images);
                                                     $count = count($all_images);
                                                 }
                                                 
                                                 $i=0;
                                                 while($i<$count)
                                                 {
                                                     $data['i'] = $i;
                                                     if(!empty($all_images))
                                                     {
                                                         $data['all_images'] = $all_images[$i];
                                                     }
                                                     $this->load->view("admin/product/add-image",$data);
                                                     $i++;
                                                 }
                                                ?>
                                         </ul>
                                         <div class="col-md-12 text-right mt-5">
                                             <input type="button" class="btn btn-sm btn-secondary" id="add-more-btn" value="Add card">
                                         </div>
                                     </div>


                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="default-tab-3">
                           <div class="card border-0 mb-4">
                              <div class="card-header h6 mb-0 bg-none p-3">
                                 <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Status
                              </div>
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-lg-3 mb-3">
                                       <div class="mb-lg-0 mb-3">
                                          <label class="form-label">Feauture Product</label>
                                          <select class="form-select" name="feauture_product">
                                             <option value="1" <?php if($EDITDATA[0]->feauture_product==1)echo 'selected'; ?>>Yes</option>
                                             <option value="0" <?php if($EDITDATA[0]->feauture_product==0) echo 'selected'; ?>>No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                       <div class="mb-lg-0 mb-3">
                                          <label class="form-label">Tranding Product</label>
                                          <select class="form-select" name="tranding_product">
                                             <option value="1" <?php if($EDITDATA[0]->tranding_product==1) echo 'selected'; ?>>Yes</option>
                                             <option value="0" <?php if($EDITDATA[0]->tranding_product==0) echo 'selected'; ?>>No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                       <div class="mb-lg-0 mb-3">
                                          <label class="form-label">New Arrivals</label>
                                          <select class="form-select" name="new_arrival">
                                             <option value="1" <?php if($EDITDATA[0]->new_arrival==1) echo 'selected'; ?>>Yes</option>
                                             <option value="0" <?php if($EDITDATA[0]->new_arrival==0) echo 'selected'; ?>>No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                       <div class="mb-lg-0 mb-3">
                                          <label class="form-label">Our Best</label>
                                          <select class="form-select" name="our_best">
                                             <option value="1" <?php if($EDITDATA[0]->our_best==1) echo 'selected'; ?>>Yes</option>
                                             <option value="0" <?php if($EDITDATA[0]->our_best==0) echo 'selected'; ?>>No</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                       <div class="mb-lg-0 mb-3">
                                          <label class="form-label">Status</label>
                                          <select class="form-select" name="status">
                                             <option value="">-- Select Status --</option>
                                             <option value="1" <?php if($EDITDATA[0]->status==1) echo 'selected'; ?>>Show</option>
                                             <option value="0" <?php if($EDITDATA[0]->status==0) echo 'selected'; ?>>Hide</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="col-lg-12 mb-4 text-center">
                                       <div class="mb-lg-0 mb-3">
                                          <button class="btn btn-primary d-block" type="submit" name="submit">
                                             Update <?php echo $page_title; ?>
                                         </button>
                                       </div>
                                    </div>

                                    
                                   
                                 </div>
                              </div>
                           </div>
                        </div>



                     </div>
                  </div>                  
               </form>
           
         </div>
       
      </div>



   <?php $this->load->view('admin/include/footer') ?>
 <script >
         CKEDITOR.replace('small_info');
         CKEDITOR.replace('description');
         CKEDITOR.replace('additional_info');
    </script>

   <script>
    var i = 1;
    $(document).on("click", "#add-more-btn",(function(e) {
        var button = $(this);
        $(button).attr("disabled",true);
        $(button).val("Wait...");
        var html =  ``;
        $.ajax({
        url : "<?php echo base_url('admin_con/product/addmore_image'); ?>",
        method : "POST",
        data : {i:i},
            success: function(data)
            {
                console.log(data);
                $("#add-more-field").append(data);
                $(button).attr("disabled",false);
                $(button).val("Add");
                const choies = document.querySelectorAll('.choicesjs')
                Array.from(choies,(elem) => {
                    new Choices(elem, {
                        removeItemButton: true,
                    })
                });
                i++;
            }
        });
    }));
    $(document).on("click", ".remove-btn",(function(e) {
        $(this).parent().parent().remove();
    }));
     $(document).ready(function(){
        $(document).on("click", ".remove-multi",(function(e) {
            $(this).parent().remove();
        }));
    });
</script>

   <script>
           function get_sub_category()
           {
              var id = $("#categorieid").val();
              $.ajax({
                    dataType:"json",
                    url:"<?php echo base_url('admin_con/product/sub_categ'); ?>",
                    method: "post",
                    data:{id:id},
                    success: function(data)
                    {
                        // console.log(data);
                        var result = data;
                        if(result.status==200)
                        {
                            $("#location").html(result.data);
                        }
                        else{
                            $("#location").html("");
                        }
                    }
                });  
            } 


        $(document).on("change", "#categorieid",(function(e) {
                 get_sub_category();
        }));
    </script>








   </body>
</html>