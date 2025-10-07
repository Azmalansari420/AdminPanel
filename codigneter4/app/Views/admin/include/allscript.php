<script src="<?=base_url('public/')?>/admin/js/app.min.js" ></script>
<script src="<?=base_url('public/')?>/admin/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?=base_url('public/')?>/admin/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?=base_url('public/')?>/admin/js/demo/form-plugins.demo.js"></script>
<script src="<?=base_url('public/')?>/admin/plugins/summernote/dist/summernote.min.js" ></script>
<script src="<?=base_url('public/')?>/admin/plugins/summernote/dist/summernote-bs4.min.js" ></script>
<script src="<?=base_url('public/')?>/admin/js/demo/form-summernote.demo.js" ></script>
<script src="<?=base_url('public/')?>/admin/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?=base_url('public/')?>/admin/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?=base_url('public/')?>/admin/plugins/bootstrap-3-typeahead/bootstrap3-typeahead.js"></script>
<script src="<?=base_url('public/')?>/admin/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?=base_url('public/')?>/admin/plugins/bootstrap-slider/dist/bootstrap-slider.min.js"></script>
<script src="<?=base_url('public/')?>/admin/js/sweetalert2@11.js" ></script>


<script src="//cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>
<style>
  .cke_notifications_area {
      display: none !important;
  }
</style>

 <?php if (session()->getFlashdata('message')) : ?>
  <script>
    $(document).ready(function() {
      var message = '<?= session()->getFlashdata('message') ?>';
      showNotification(message);
      setTimeout(function() 
      {
        $('#app-notification-container').removeClass('app-notification-container');
      }, 3000);
    });
  </script>
<?php endif; ?>



<script>
/*--- single click to view & Upload Image---*/
      $('#image-input').change(function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#image-preview').attr('src', e.target.result);
          $('#image-preview').show(); // Show the image preview
        };
        reader.readAsDataURL(file);
      });

/* multiple image upload and view*/

      $('#multi-image-input').change(function() {
        var files = this.files;
        $('#multi-image-previews').html(''); // Clear previous previews
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

        // Add remove event listener
        $(document).on('click', '.remove-image', function() {
          $(this).parent('.image-preview').remove();
        });
      });


/*alert messgage function  */
      function showNotification(message) {
        $.notification({
          title: 'Message',
          content: message,
          icon: 'fa fa-inbox',
          iconClass: 'bg-gradient-blue-indigo text-white'
        });
      }


</script>