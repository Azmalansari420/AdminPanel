<div class="row card-body" style="border: 1px solid;margin-bottom: 5px;padding: 5px;">
    <div class="col-6 form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="multiple_title[<?=$i?>]" value="<?= !empty($value->multiple_title) ? $value->multiple_title : '' ?>">
    </div>
    <div class="col-6 form-group">
        <label>Sub Title</label>
        <input type="text" class="form-control" name="multiple_sub_title[<?=$i?>]" value="<?= !empty($value->multiple_sub_title) ? $value->multiple_sub_title : '' ?>">
    </div>

    <div class="col-12 form-group">
        <label>Multiple Image</label>
        <input type="file" class="form-control" name="multiple_image[<?=$i?>][]" multiple>

        <div class="row">
            <?php
            if (!empty($value->multiple_image)) {
                $getimage = is_array($value->multiple_image) ? $value->multiple_image : json_decode($value->multiple_image, true);
                if (is_array($getimage)) {
                    foreach ($getimage as $data2) { ?>
                        <div class="col-3 text-center mt-2">
                            <input type="hidden" name="multiple_image_old[<?=$i?>][]" value="<?=$data2?>">
                            
                            <img src="<?=base_url($upload_path . $data2) ?>" width="100%" style="margin-top: 5px;">
                            <button type="button" class="btn btn-pink btn-sm btn-block multiple-remove-image mt-2" data-index="<?=$i?>" data-image="<?=$data2?>">Remove</button>   
                        </div>
            <?php } } } ?>
        </div>
    </div>

    <button type="button" class="btn btn-sm btn-red multi-remove-btn">Remove</button>
</div>
