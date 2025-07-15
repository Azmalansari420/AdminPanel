

<div class="row card-body" style="border: 1px solid;margin-bottom: 5px;padding: 5px;">
   <div class="col-4 form-group">
       <label>Title </label>
       <input type="text" class="form-control" name="single_title[]" value="<?php if(!empty($value->single_title)) echo $value->single_title; ?>">
    </div>

    <div class="col-4 form-group">
       <label>Sub Title </label>
       <input type="text" class="form-control" name="single_sub_title[]" value="<?php if(!empty($value->single_sub_title)) echo $value->single_sub_title; ?>">
    </div>

    <div class="col-4 form-group">
       <label>Single Image </label>
       <input type="file" class="form-control" name="single_image[]">
       <?php
       if(!empty($value->single_image))
         { ?>
            <input type="hidden" name="single_image_old[]" value="{{ $value->single_image[0] }}">
            <img src="{{ url('public/' . $upload_path . $value->single_image[0]) }}" width="50px" style="margin-top: 5px;">
   <?php } ?>
    </div>

    
    <button type="button" class="btn btn-sm btn-red single-remove-btn">Remove</button>
</div>