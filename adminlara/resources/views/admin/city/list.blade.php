
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
                <div class="card ">
                    <div class="card-header card-header-inverse">
                        <h4 class="card-header-title">{{$page_title}} </h4>
                        <div class="card-header-btn">
                            <a href="{{$add_page_link}}" class="btn btn-blue">Add {{$page_title}}</a>
                            <button  class="btn btn-danger delete_multiple" >Delete Multiple</button>
                            <input type="search" name="" id="search">
                        </div>
                    </div>

                    <div class="mt-3">
                        <form class="row justify-content-center">
                            <div class="col-3 form-group ">
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

                            <div class="col-3 form-group ">
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

                        </form>
                    </div>


                    <div class="card-body" id="table-data"></div>
                    <div id="pagination-links"></div>
                </div>
            </div>
            <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        </div>

      
        @include('admin.include.theams') 
        @include('admin.include.allscript') 


    <script>
    
        function loadTableData(offset = 0) 
        {
            let search = $('#search').val();
            $.ajax({
                type: 'POST',
                url: "{{ route($table_data_page_url) }}",
                data: {
                    search: search,
                    limit: {{$table_data_pagination_limit}},
                    offset: offset,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#table-data').html(data.html);
                    $('#pagination-links').html(data.pagination_links);
                }
            });
        }

        // Initial load
        $(document).ready(function() {
            loadTableData();
        });

        // Search
        $('#search').on('keyup', function() {
            loadTableData();
        });

        // Pagination
        $(document).on('click', '.pagination-link', function(e) {
            e.preventDefault();
            let offset = $(this).data('offset');
            loadTableData(offset);
        });



        function click_here(id) 
        {
            let current_element = $('#statusbyid' + id);
            let status = $('#customSwitch-' + id).prop("checked") ? 1 : 0;

            $.ajax({
                url: '{{ route($status_url) }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status,
                    id: id
                },
                success: function(response) {
                    if (response.success) {
                        current_element.html(response.data.status);
                    } else {
                        alert('Failed to update status.');
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        }


        /*delete url*/
        $(document).on('click', '.delete-btn-ajax', function(event) {
            event.preventDefault();
            let id = $(this).data('id');
            let deleteUrl = '{{ route($delete_single_url, ":id") }}'; 
            singleconfirmDelete(id, deleteUrl);
        });


        /*delete multiple*/
       $(document).ready(function() {
            $(".delete_multiple").click(function(event) {
                var ids = [];
                $('.multiple_delete:checked').each(function() {
                    ids.push(this.value);
                });

                if (ids.length == 0) {
                    Swal.fire("At least select one record...");
                    return false;
                }
                multideleteconfirm(ids, '{{ route($multiple_delete) }}');
            });
        });


        {{-- get list --}}

        $(document).on("change", "#country_id",(function(e) {
          getstatelist();
        }));

        function getstatelist()
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

        {{-- filter data --}}

        $(document).on("change", "#country_id,#state_id",(function(e) {
          filterdata();
        }));

        function filterdata(offset = 0) 
        {
            let search = $('#search').val();
            var country_id = $("#country_id").val() || "";
            var state_id = $("#state_id").val() || "";
            if(state_id === "--Select State --" || state_id === null) {
                state_id = ""; 
            }

            $.ajax({
                type: 'POST',
                url: "{{ route($table_data_page_url) }}",
                data: {
                    search: search,
                    country_id: country_id,
                    state_id: state_id,
                    limit: {{$table_data_pagination_limit}},
                    offset: offset,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#table-data').html(data.html);
                    $('#pagination-links').html(data.pagination_links);
                }
            });
        }



        


    </script>


   </body>
</html>

