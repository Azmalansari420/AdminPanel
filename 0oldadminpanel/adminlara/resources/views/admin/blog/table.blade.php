<table class="table table-striped table-td-valign-middle table-bordered bg-white">
    <thead>
        <tr>
            <th width="1%">#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ALLDATA as $key => $data)
            <tr>
                <td>{{ $key + 1 + $offset }}
                    <input type="checkbox" name="multiple_delete[]" value="{{ $data->id }}" class="multiple_delete">
                </td>
                <td><img src="{{url('public/'.$upload_path)}}/{{ $data->image }}" width="75px" onerror="this.src='{{url('public/media/uploads/not-found.jpg')}}'"></td>
                <td>{{ $data->name }}</td>
                <td>
                    <div class="switcher switcher-success">
                        <span id="statusbyid{{ $data->id }}">{!! status($data->status) !!}</span>
                        <input type="checkbox" 
                               name="customSwitch-{{ $data->id }}" 
                               id="customSwitch-{{ $data->id }}" 
                               {{ $data->status == 1 ? 'checked' : '' }} 
                               onclick="click_here({{ $data->id }})">
                        <label for="customSwitch-{{ $data->id }}"></label>
                    </div>
                 </td>
                <td>
                    {{-- <a href="" class="btn btn-info btn-xs m-r-2">View</a> --}}
                    <a href="{{route($edit_page_url,['id'=>$data->id])}}" class="btn btn-success btn-xs m-r-2">Update</a>
                    <a href="javascript:void(0)" class="btn btn-danger btn-xs text-white delete-btn-ajax" data-id="{{ $data->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">
                Total Data: {{ $totalRows }} | Total Pages: {{ $totalPages }}
            </td>
        </tr>
    </tfoot>
</table>
