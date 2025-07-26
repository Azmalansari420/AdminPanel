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
                        <div class="col-6 form-group">
                           <label>Title </label>
                           <input type="text" class="form-control" name="title" value="{{@$EDITDATA->title}}">
                        </div>

                        <div class="col-6 form-group">
                           <label>Sub Title </label>
                           <input type="text" class="form-control" name="sub_title" value="{{@$EDITDATA->sub_title}}">
                        </div>

                        <div class="col-12 form-group">
                           <label>Content </label>
                           <textarea name="content" class="summernote form-control">{{@$EDITDATA->content}}</textarea>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        

                        <div class="col-12 form-group">
                            <label>Click to Upload Image</label>
                            <input id="image-input" type="file" name="image" class="form-control">
                            <br>

                            @if(!empty($EDITDATA->image))
                                <img id="image-preview" src="{{ url('public/'.$upload_path.$EDITDATA->image) }}" alt="Image Preview" width="100px" class="mt-2">
                            @else
                                <img id="image-preview" src="" alt="Image Preview" width="100px" class="mt-2" style="display: none;">
                            @endif

                            <input type="hidden" name="oldimage" value="{{ @$EDITDATA->image }}">
                        </div>


                        <div class="col-12 form-group m-b-0">
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
   </body>
</html>