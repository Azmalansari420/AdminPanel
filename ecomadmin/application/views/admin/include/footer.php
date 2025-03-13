

         <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>


      <script src="<?php echo base_url(); ?>media/admin/js/vendor.min.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/js/app.min.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/gritter/js/jquery.gritter.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.canvaswrapper.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.colorhelpers.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.saturated.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.browser.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.drawSeries.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.uiConstants.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.time.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.resize.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.pie.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.crosshair.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.categories.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.navigate.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.touchNavigate.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.hover.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.touch.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.selection.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.symbol.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/flot/source/jquery.flot.legend.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/jquery-sparkline/jquery.sparkline.min.js" ></script>      
      <script src="<?php echo base_url(); ?>media/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js" ></script>
      <script src="<?php echo base_url(); ?>media/admin/js/demo/dashboard.js" ></script>
            
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/pdfmake/build/pdfmake.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/pdfmake/build/vfs_fonts.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/jszip/dist/jszip.min.js"></script>
      <script src="<?php echo base_url(); ?>media/admin/plugins/switchery/dist/switchery.min.js"></script>
      <script src="https://cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>

      <!-- table script-------- -->
      <script>
        $('#data-table-buttons').DataTable({
          responsive: true,
          dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
          buttons: [
            { extend: 'copy', className: 'btn-sm' },
            { extend: 'csv', className: 'btn-sm' },
            { extend: 'excel', className: 'btn-sm' },
            { extend: 'pdf', className: 'btn-sm' },
            { extend: 'print', className: 'btn-sm' }
          ],
        });
      </script>


    <script>
        function readURL(input) 
        {
            if (input.files && input.files[0]) 
            {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#blah").css("display","block");
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
         $("#imgInp").change(function()
         {
            readURL(this);
        });
         function readURL2(input) 
        {
            if (input.files && input.files[0]) 
            {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#blah2").css("display","block");
                    $('#blah2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
         $("#imgInp2").change(function()
         {
            readURL2(this);
        });
         
         // --------alll delete-------
         $(document).ready(function(){
             $(".delete").click(function(event){
                 alert("Delete?");
                 var href = $(this).attr("href")
                 var btn = this;
                  $.ajax({
                    type: "GET",
                    url: href,
                    success: function(response) 
                    {
                      if (response == "Success")
                      {
                        $(btn).closest('tr').fadeOut("slow");
                      }
                      else
                      {
                        alert("Error");
                      }
                    }
                  });
                 event.preventDefault();
              })
        });
    </script>

    <script type="text/javascript">
        inactivityTimeout = false;
        resetTimeout()
        function onUserInactivity() {
           window.location.href = "<?=base_url('admin/lockscreen') ?>";
        }
        function resetTimeout() {
           clearTimeout(inactivityTimeout)
           inactivityTimeout = setTimeout(onUserInactivity, 1000 * 6000)
        }
        window.onmousemove = resetTimeout
    </script>
      