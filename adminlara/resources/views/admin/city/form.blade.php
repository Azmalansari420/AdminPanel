<!DOCTYPE html>
<html lang="en">
   <title><?=$page_title ?></title>
   @include('admin.include.allcss')
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         @include('admin.include.session-toster') 
         @include('admin.include.topbar')  
         @include('admin.include.sidebar')

         <div id="content" class="app-content">
            <h1 class="page-header add-header"><?=$page_title ?> </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="{{route($addupdate_form, @$EDITDATA->id)}}">
               @csrf
               <input type="hidden" name="id" value="{{ @$EDITDATA->id }}">
               <div class="col-lg-8">
                  <div class="card m-b-15">
                     <div class="row card-body">

                        <div class="col-6 form-group ">
                            <label>Select Country</label>
                            <select class="selectpicker form-control" required name="country_id" data-style="btn-default" data-live-search="true" id="country_id">
                              <option>--Select Country --</option>
                              <?php
                              $city = DB::table('country')->where('status',1)->get();
                              foreach($city as $data)
                                 { ?>
                                <option value="{{@$data->id}}" {{ (isset($EDITDATA) && $EDITDATA->country_id == $data->id) ? 'selected' : '' }}>{{$data->name}}</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-6 form-group ">
                            <label>Select State</label>
                            <select class="selectpicker form-control" required name="state_id" data-style="btn-default" data-live-search="true" id="state_id">
                              <option>--Select State --</option>
                              <?php
                              $city = DB::table('state')->where('status',1)->get();
                              foreach($city as $data)
                                 { ?>
                                <option value="{{@$data->id}}" {{ (isset($EDITDATA) && $EDITDATA->state_id == $data->id) ? 'selected' : '' }}>{{$data->name}}</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-6 form-group">
                           <label>Name </label>
                           <input type="text" class="form-control" name="name" value="{{@$EDITDATA->name}}">
                        </div>



                     
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        


                        <div class="col-12 form-group ">
                            <label>Select Status</label>
                            <select class="selectpicker form-control" required name="status" data-style="btn-default" data-live-search="true">
                                <option value="1" {{ (isset($EDITDATA) && $EDITDATA->status == 1) ? 'selected' : '' }}>Show</option>
                                <option value="0" {{ (isset($EDITDATA) && $EDITDATA->status == 0) ? 'selected' : '' }}>Hide</option>
                            </select>
                        </div>
                        <div class="col-12 form-group mt-4">
                           <button type="submit" name="submit" class="btn btn-purple"> <?=$page_title ?></button>
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
   
 $(document).on("change", "#country_id",(function(e) {
      login_distibuter();
    }));

    function login_distibuter()
    {
        var country_id = $("#country_id").val();



        var form = new FormData();
        form.append("country_id", country_id);
        form.append("_token", "{{ csrf_token() }}");


        var settings = {
          "url": "{{route('admin_con/city/getstatename')}}",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          if(response.status==200)
          {
           $("#state_id").html(response.data);
            $('#state_id').selectpicker('refresh');
          }
        });
    }


</script>

   </body>
</html>