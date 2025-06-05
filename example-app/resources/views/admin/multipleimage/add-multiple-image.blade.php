<div class="row card-body" style="border: 1px solid; margin-bottom: 5px; padding: 5px;">
    <div class="col-6 form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="multiple_title[{{ $count }}]" value="{{ $value->multiple_title ?? '' }}">
    </div>
    <div class="col-6 form-group">
        <label>Sub Title</label>
        <input type="text" class="form-control" name="multiple_sub_title[{{ $count }}]" value="{{ $value->multiple_sub_title ?? '' }}">
    </div>

    <div class="col-12 form-group">
        <label>Multiple Images</label>
        <input type="file" class="form-control" name="multiple_image{{ $count }}[]" multiple>
        <div class="row">
            @if (!empty($value->multiple_image))
                @foreach ($value->multiple_image as $data2)
                    <div class="col-2 text-center mt-2">
                        <input type="hidden" name="multiple_image_old{{ $count }}[]" value="{{ $data2 }}">
                        <img src="{{ url('public/'.$upload_path) }}/{{ $data2 }}" width="100%" style="margin-top: 5px;">
                        <button type="button" class="btn btn-pink btn-sm btn-block multiple-remove-image mt-2">Remove</button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <button type="button" class="btn btn-sm btn-red multi-remove-btn">Remove</button>
</div>