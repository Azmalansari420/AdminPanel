<li class="row" style="margin-top: 25px;">

	<div class="col-lg-2 mb-3">
       <div class="mb-lg-0 mb-3">
          <label class="form-label">Select Color</label>
          <select class="form-select" name="color_id[]">
            <?php 
            $color = $this->crud->selectDataByMultipleWhere('color',array('status'=>1,));
            foreach($color as $data)
                {
                    $selected = '';
                    if(!empty($all_images->color_id))
                    {                        
                        if($all_images->color_id==$data->id)
                            $selected = 'selected';
                    }
                 ?>
            <option value="<?php echo $data->id; ?>" <?=$selected ?>><?php echo $data->name; ?></option>
        	<?php } ?>
        </select>
       </div>
    </div>

	<div class="col-lg-2 mb-3">
       <div class="mb-lg-0 mb-3">
          <label class="form-label">Select Size</label>
          <select class="form-select" name="size_id[]">
             <?php 
            $size = $this->crud->selectDataByMultipleWhere('size',array('status'=>1,));
            foreach($size as $data)
                {
                    $selected = '';
                    if(!empty($all_images->size_id))
                    {                        
                        if($all_images->size_id==$data->id)
                            $selected = 'selected';
                    }
                 ?>
            <option value="<?php echo $data->id; ?>" <?=$selected ?>><?php echo $data->name; ?></option>
        <?php } ?>
        </select>
       </div>
    </div>

    <div class="col-lg-2 mb-4">
        <div class="mb-lg-0 mb-3">
           <label class="form-label">Sale Price</label>
           <input type="number" class="form-control" name="price[]" value="<?php if(!empty($all_images->price)) echo $all_images->price; ?>">
        </div>
     </div>
    <div class="col-lg-2 mb-4">
        <div class="mb-lg-0 mb-3">
           <label class="form-label">MRP Price</label>
           <input type="number" class="form-control" name="cut_price[]" value="<?php if(!empty($all_images->cut_price)) echo $all_images->cut_price; ?>">
        </div>
     </div>

    <div class="col-lg-2 mb-4">
	    <div class="mb-lg-0 mb-3">
	       <label class="form-label">Image</label>
	       <input type="file" class="form-control" name="image<?=$i ?>[]" multiple>
	    </div>
    </div>    
    <div class="col-lg-2 mb-4" style="padding-top: 10px;">
        <button type="button" class="btn btn-sm mb-2 btn-danger remove-btn mt-3">Remove</button>
    </div>

    <div class="row" style="margin: 0;">
        <?php 
            if(!empty($all_images->images))
            {
                foreach ($all_images->images as $keyimg => $valueimg)
                {
                ?>
                <div class="col-lg-2 c-img" style="margin-right: 5px;">
                    <span class="remove-multi">X</span>
                    <img src="<?=base_url('media/uploads/product/'.$valueimg) ?>" style="width: 100%;height: 100%;">
                    <input type="hidden" name="oldimage<?=$i ?>[]" value="<?=$valueimg ?>">
                </div>
        <?php } } ?>
    </div>



</li>