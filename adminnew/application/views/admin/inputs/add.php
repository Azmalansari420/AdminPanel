<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
      	
     <?php $this->load->view('admin/include/topbar') ?>
      <?php $this->load->view('admin/include/sidebar') ?>
         

         


         <div id="content" class="app-content">
         	
               <h1 class="page-header add-header">Form Plugins </h1>
               <div class="row">

               	<div class="col-lg-8">
				   <div class="card m-b-15">
				      <div class="card-header card-header-inverse">
				         <h4 class="card-header-title">Inputs</h4>
				         <div class="card-header-btn">
				            <a href="#" data-toggle="card-expand" class="btn btn-success"><i class="fa fa-expand"></i></a>
				            <a href="#" data-toggle="card-refresh" class="btn btn-warning"><i class="fa fa-redo"></i></a>
				         </div>
				      </div>
				      <div class="row card-body">
				            <div class="col-6 form-group">
				               <label>Default <span class="text-danger">*</span></label>
				               <input type="text" class="form-control" name="default_input" value placeholder="placeholder" />
				            </div>
				            <div class="col-6 form-group">
				               <label>Password <span class="text-danger">*</span></label>
				               <input type="password" class="form-control" required name="default_password" value placeholder />
				            </div>
				            <div class="col-12 form-group">
				               <label>Content <span class="text-danger">*</span></label>
				               <textarea name="text" class="summernote form-control" id="contents" title="Contents">sd asds</textarea>
				            </div>
				            <div class="form-group">
				               <label>Content 2 <span class="text-danger">*</span></label>
				               <textarea name="text" class="summernote form-control" id="contents" title="Contents">qwer qw</textarea>
				            </div>


                         <div class="col-6 form-group ">
                           <label>Select Category</label>
                           <select class="selectpicker  form-control" required name="cat_id" data-style="btn-default" data-live-search="true" id="category">
                              <option>Select Category</option>
                              <?php
                              $cat = $this->db->get_where('categories',array('status'=>1))->result_object();
                              foreach($cat as $data)
                                 { ?>
                              <option value="<?=$data->id ?>"><?=$data->name ?></option>
                           <?php } ?>
                           </select>
                        </div>

                        <div class="col-6 form-group ">
                           <label>Select Sub Category</label>
                           <select class="form-control" required name="sub_cat_id" data-style="btn-default" data-live-search="true" id="sub-category">
                              
                           </select>
                        </div>








				      </div>
				   </div>
				</div>

                  <div class="col-lg-4">
                     
                     <div class="card m-b-15">
                        <div class="card-header card-header-inverse">
                           <h4 class="card-header-title">Status</h4>
                           <div class="card-header-btn">
                              <a href="#" data-toggle="card-expand" class="btn btn-success"><i class="fa fa-expand"></i></a>
                              <a href="#" data-toggle="card-refresh" class="btn btn-warning"><i class="fa fa-redo"></i></a>
                           </div>
                        </div>
                        <div class="row card-body">
                           	<div class="col-12 form-group">
                           		<label>Click to Upload Image</label>
                                <input type="file" id="image-input" class="form-control">
                                <img id="image-preview" src="" alt="Image Preview" width="100px" style="display:none;">
                            </div>

                            <div class="col-12 form-group">
                           		<label>Click to Upload Multiple Image</label>
                                <input type="file" id="multi-image-input" multiple class="form-control mb-2">
                                <div id="multi-image-previews" style="display:flex;overflow: auto;"></div>
                            </div>

                              <div class="col-12 form-group">
                                 <label>Default <span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" id="tagsinput-default" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" />
                              </div>


                                                      <div class="form-group">
<label>Multiple SelectBox <span class="text-danger">*</span></label>
   <select class="selectpicker form-control" data-style="btn-default" multiple data-max-options="3">
   <optgroup label="Picnic">
   <option>Mustard</option>
   <option>Ketchup</option>
   <option>Relish</option>
   </optgroup>
   <optgroup label="Camping">
   <option>Tent</option>
   <option>Flashlight</option>
   <option>Toilet Paper</option>
   </optgroup>
   </select>
   </div>
                              
                              <div class="col-12 form-group">
                                 <label>Live Search <span class="text-danger">*</span></label>
                                 <select class="selectpicker form-control" data-style="btn-default" data-live-search="true">
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                    <option>Tent</option>
                                    <option>Flashlight</option>
                                    <option>Toilet Paper</option>
                                 </select>
                              </div>
                              <div class="col-12 form-group m-b-0">
                                 <label>With Button Class <span class="text-danger">*</span></label>
                                 <select class="selectpicker form-control" data-style="btn-primary">
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                    <option>Tent</option>
                                    <option>Flashlight</option>
                                    <option>Toilet Paper</option>
                                 </select>
                              </div>

                            <div class="col-12 form-group mt-4">
                            	<button type="submit" class="btn btn-purple">Submit</button>
							</div>
                           </form>
                        </div>
                     </div>
                  </div>
               
               </div>
            </div>
         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>

      
   <?php $this->load->view('admin/include/theams') ?>
   <?php $this->load->view('admin/include/allscript') ?>


   <script>

    $(document).on("change", "#category",(function(e) {
      login_distibuter();
    }));

    function login_distibuter()
    {
        var cat_id = $("#category").val();

        var form = new FormData();
        form.append("cat_id", cat_id);
       
        var settings = {
          "url": "<?=base_url() ?>admin_con/product/sub_categ",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) 
        {
          console.log(response.data);
          $("#sub-category").html(response.data);
          
        });
    }

</script>


   </body>
</html>