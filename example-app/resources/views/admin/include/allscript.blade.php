<script src="{{url('')}}/public/admin_assests/js/app.min.js" ></script>
<script src="{{url('')}}/public/admin_assests/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="{{url('')}}/public/admin_assests/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="{{url('')}}/public/admin_assests/js/demo/form-plugins.demo.js"></script>
<script src="{{url('')}}/public/admin_assests/plugins/summernote/dist/summernote.min.js" ></script>
<script src="{{url('')}}/public/admin_assests/plugins/summernote/dist/summernote-bs4.min.js" ></script>
<script src="{{url('')}}/public/admin_assests/js/demo/form-summernote.demo.js" ></script>
<script src="{{url('')}}/public/admin_assests/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="{{url('')}}/public/admin_assests/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="{{url('')}}/public/admin_assests/plugins/bootstrap-3-typeahead/bootstrap3-typeahead.js"></script>
<script src="{{url('')}}/public/admin_assests/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="{{url('')}}/public/admin_assests/plugins/bootstrap-slider/dist/bootstrap-slider.min.js"></script>
<script src="{{url('')}}/public/admin_assests/js/sweetalert2@11.js" ></script>


 




<script>
/*--- -----------------single click to view & Upload Image--------------*/
      $('#image-input').change(function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#image-preview').attr('src', e.target.result);
          $('#image-preview').show();
        };
        reader.readAsDataURL(file);
      });

  /*------------------ multiple image upload and view------------------*/

      $('#multi-image-input').change(function() {
        var files = this.files;
        $('#multi-image-previews').html(''); 
        $.each(files, function(index, file) {
          var reader = new FileReader();
          reader.onload = function(e) {
            var html = '<div class="image-preview"  style="display: grid;    text-align: center;">';
            html += '<img src="' + e.target.result + '" alt="Image Preview" width="75px">';
            html += '<span class="remove-image">Remove</span>';
            html += '</div>';
            $('#multi-image-previews').append(html);
          };
          reader.readAsDataURL(file);
        });

        $(document).on('click', '.remove-image', function() {
          $(this).parent('.image-preview').remove();
        });
      });

      /*-------single delete confirmation---------*/
      function singleconfirmDelete(id, deleteUrl) 
        {            
          Swal.fire({
              title: "Are you sure?",
              showDenyButton: true,
              showCancelButton: true,
              confirmButtonText: "Yes",
              denyButtonText: "No",
              icon: "warning"
            }).then((result) => {
                if (result.isConfirmed) 
                {
                  $.ajax({
                      url: deleteUrl.replace(':id', id),
                      type: 'DELETE',
                      data: {
                          _token: '{{ csrf_token() }}', id: id
                      },
                      success: function(response) {
                          if (response.success) {
                              Swal.fire({
                                  icon: 'success',
                                  title: 'Deleted successfully!',
                                  showConfirmButton: false,
                                  timer: 1500
                              });
                              loadTableData();
                          } else {
                              Swal.fire({
                                  icon: 'error',
                                  title: 'Error!',
                                  text: response.message,
                              });
                          }
                      },
                      error: function(xhr) {
                          console.error('Error:', xhr.responseText);
                          Swal.fire({
                              icon: 'error',
                              title: 'Something went wrong!',
                              text: 'Failed to delete the item.',
                          });
                      }
                  });
                }
            });
        }

      /*-----------multiple delete-------------------*/
      function multideleteconfirm(ids, deleteUrl) 
      {
        Swal.fire({
            title: "Are you sure?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Yes",
            denyButtonText: "No",
            icon: "warning"
        }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                  url: deleteUrl,
                  type: 'POST',
                  data: {
                      _token: '{{ csrf_token() }}',
                      _method: 'DELETE',
                      id: ids
                  },
                  success: function(response) {
                      if (response.status === 'success') {
                          Swal.fire({
                              icon: 'success',
                              title: 'Deleted successfully!',
                              showConfirmButton: false,
                              timer: 1500
                          });
                          loadTableData();
                      } else {
                          Swal.fire({
                              icon: 'error',
                              title: 'Error!',
                              text: response.message,
                          });
                      }
                  },
                  error: function(xhr) {
                      Swal.fire({
                          icon: 'error',
                          title: 'Something went wrong!',
                          text: 'Failed to delete the items.',
                      });
                  }
              });
            }
        });
      }


</script>