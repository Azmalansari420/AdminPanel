<!DOCTYPE html>
<html lang="en">
<title>{{$page_title}}</title>
    @include('admin.include.allcss')
<body>
   <div id="app" class="app app-header-fixed app-sidebar-fixed">
      @include('admin.include.session-toster') 
      @include('admin.include.topbar')  
      @include('admin.include.sidebar') 
      <div id="content" class="app-content">
         <h1 class="page-header add-header">Add <?=$page_title ?> </h1>
         <form class="row" method="post" enctype="multipart/form-data" action="{{ route($add_in_database_url) }}">
            @csrf
            <div class="col-lg-8">
               <div class="card m-b-15">
                  <div class="row card-body">
                     <div class="col-12 form-group">
                        <label>Click to Upload Multiple Image</label>
                        <input type="file" id="multi-image-input" multiple class="form-control mb-2" name="multiple_image_json[]">
                        <div id="multi-image-previews" style="display:flex;overflow: auto;"></div>
                     </div>

                     <div class="col-12 text-center">
                        <h3>Add More With Single Image</h3>
                     </div>

                     <div class="col-md-12">
                        <div class="row" id="add-more-sinfle-image-field">
                             @include($add_more_singlepage)
                        </div>
                        <div class="col-md-12 text-right">
                           <input type="button" class="btn btn-sm btn-secondary" id="add-more-single-image-btn" value="Add More">
                        </div>
                     </div>

                     <span style="border-bottom: 1px solid red;width: 100%;margin: 30px 0;"></span>

                     <div class="col-12 text-center">
                        <h3>Add More With Multiple Image</h3>
                     </div>

                     <div class="col-md-12">
                        <div class="row" id="add-more-multiple-image-field">
                            @include('admin/multipleimage/add-multiple-image')
                        </div>
                        <div class="col-md-12 text-right">
                           <input type="button" class="btn btn-sm btn-secondary" id="add-more-multiple-image-btn" value="Add More">
                        </div>
                     </div>






                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="card m-b-15">
                  <div class="row card-body">
                     <div class="col-12 form-group m-b-0">
                        <label>Select Status</label>
                        <select class=" form-control" required name="status">
                           <option value="1" selected>Show</option>
                           <option value="0">Hide</option>
                        </select>
                     </div>
                     <div class="col-12 form-group mt-4">
                        <button type="submit" name="submit" class="btn btn-purple">Add <?=$page_title ?></button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
   </div>

   
   @include('admin.include.theams') 
   @include('admin.include.allscript')

<script>
   /*single image add more*/

   $(document).ready(function() {
       var count = 1;
       $('#add-more-single-image-btn').click(function() {
           $.ajax({
               type: 'POST',
               url: '{{route($add_more_singlepage_route)}}',
               data: {
                   count: count,
                   _token: '{{ csrf_token() }}'
               },
               success: function(data) {
                   $('#add-more-sinfle-image-field').append(data);
                   count++;
               },
               error: function(xhr) {
                   console.error('Error:', xhr.responseText);
               }
           });
       });
       /*remove btn*/
       $(document).on('click', '.single-remove-btn', function() {
           $(this).parent().remove();
       });
   });





   /*multiple image add more*/

    $(document).ready(function() 
    {
       var i = 1;
       $('#add-more-multiple-image-btn').click(function() {
           $.ajax({
               type: 'POST',
               url: '{{ route($add_more_multipage_route) }}',
               data: {
                   _token: '{{ csrf_token() }}',
                   count: i 
               },
               success: function(data) {
                   $('#add-more-multiple-image-field').append(data);
                   i++; 
               },
               error: function(xhr) {
                   console.error('Error:', xhr.responseText);
               }
           });
       });
       $(document).on('click', '.multi-remove-btn', function() {
           $(this).closest('.card-body').remove();
       });
       $(document).on('click', '.multiple-remove-image', function() {
           $(this).closest('.col-3').remove();  // Remove the image div
       });
   });


  


</script>






</body>
</html>