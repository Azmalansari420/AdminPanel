


    <!-- all plugins here -->
    <script src="<?=base_url() ?>assets/js/jquery.3.6.min.js"></script>
    <script src="<?=base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url() ?>assets/js/imageloded.min.js"></script>
    <script src="<?=base_url() ?>assets/js/counterup.js"></script>
    <script src="<?=base_url() ?>assets/js/waypoint.js"></script>
    <script src="<?=base_url() ?>assets/js/magnific.min.js"></script>
    <script src="<?=base_url() ?>assets/js/isotope.pkgd.min.js"></script>
    <script src="<?=base_url() ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url() ?>assets/js/nice-select.min.js"></script>
    <script src="<?=base_url() ?>assets/js/fontawesome.min.js"></script>
    <script src="<?=base_url() ?>assets/js/owl.min.js"></script>
    <script src="<?=base_url() ?>assets/js/slick-slider.min.js"></script>
    <script src="<?=base_url() ?>assets/js/wow.min.js"></script>
    <script src="<?=base_url() ?>assets/js/tweenmax.min.js"></script>
    <!-- main js  -->
    <script src="<?=base_url() ?>assets/js/main.js"></script>

<?php include('toaster.php'); ?>


<script>
















/*webview*/

    var href = '';
    var full_url_new = '';
    var full_url_old = '';

    $(document).on("click", "a", function (e) {
        href = $(this).attr('href');

        // Check if the clicked link is not exempt (e.g., has the 'scroll-top' class)
        if ($(this).attr('class') !== 'scroll-top' && 
            $(this).attr('class') !== 'back-btn' && 
            href !== 'javascript:void(0);' && 
            href !== '#!' && 
            href !== '#') {
            e.preventDefault(); // Prevent default only for non-exempt links
            get_full_url();
            var title = '';
            var obj = { Title: title, Url: full_url_new };
            // history.pushState(obj, obj.Title, obj.Url);
            change_page();
        }
    });

    // For links with .link class
    $(document).on("click", ".link", function (e) {
        e.preventDefault();
        href = $(this).data('href');
        get_full_url();
        var title = '';
        var obj = { Title: title, Url: full_url_new };
        // history.pushState(obj, obj.Title, obj.Url);
        change_page();
    });




   
   
   $(window).on('popstate', function(event) {
   change_page();
   });
   $(window).on('pushState', function(event) {
   change_page();
   });
   
   var modalNav = $(".menu-mobile-popup");
   $(document).on("click", ".btn-sidebar, .btn-st2", (function () {
   modalNav.addClass("modal-menu--open");
   }));
   $(document).on("click", ".modal-menu__backdrop", (function () {
   modalNav.removeClass("modal-menu--open");
   }));
   
   function get_full_url()
   {
   if(href==undefined || href=='#')
   {
       return false;
   }   
   else 
   {
       var full_url = href;
   
       var device_arr = window.location.href.split('device_id=');
       if(device_arr.length>1)
           device_id = window.location.href.split('device_id=')[1].split('&')[0];
       else device_id = '';
       firebase_token = window.location.href.split('firebase_token=')[1];
       var full_url_array = full_url.split('device_id');
       var full_url_qs_array = full_url.split('?');
       if(full_url_array.length==1)
       {
           if(full_url_qs_array.length==1)
               full_url = full_url+"?device_id="+device_id;
           else
               full_url = full_url+"&device_id="+device_id;
       }
       var full_url = full_url;
       var check_api_url = full_url.split("<?=base_url('api/') ?>");
       if(check_api_url.length==1)
       {
           var full_url_array = full_url.split("<?=base_url(user_app) ?>");
           if(full_url_array.length==1)
           {
               full_url = "<?=base_url(user_app) ?>"+full_url_array[0];
           }
           else
           {
               full_url = "<?=base_url(user_app) ?>"+full_url_array[1];
           }
       }
       full_url = full_url_new = full_url+'&firebase_token='+firebase_token;
   }        
   // console.log(full_url);      
   }
   
   

   function change_page()
    {  
      window.location.href=full_url_new;
   }
   
   
   
   /*refresh*/
   document.addEventListener('touchstart', handleTouchStart, false);        
   document.addEventListener('touchmove', handleTouchMove, false);
   
   var xDown = null;                                                        
   var yDown = null;
   
   function getTouches(evt) {
   return evt.touches ||             // browser API
       evt.originalEvent.touches; // jQuery
   }                                                     
                                                                       
   function handleTouchStart(evt) {
   const firstTouch = getTouches(evt)[0];                                      
   xDown = firstTouch.clientX;                                      
   yDown = firstTouch.clientY;                                      
   }; 
   function top_0_refrash()
   {
   var top = document.documentElement.scrollTop || document.body.scrollTop;
   if(top==0)
   {
    $(".preload").show(); 
    location.reload();
   }
   }                                               
                                                                       
   function handleTouchMove(evt) {
   if ( ! xDown || ! yDown ) {
      return;
   }
   
   var xUp = evt.touches[0].clientX;                                    
   var yUp = evt.touches[0].clientY;
   
   var xDiff = xDown - xUp;
   var yDiff = yDown - yUp;
                                                                       
   if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
      if ( xDiff > 0 ) {
          /* right swipe */ 
      } else {
          /* left swipe */
      }                       
   } else {
      if ( yDiff > 0 ) {
      } else { 
          /* up swipe */
          top_0_refrash();
      }                                                                 
   }
   /* reset values */
   xDown = null;
   yDown = null;                                             
   };

   
</script>