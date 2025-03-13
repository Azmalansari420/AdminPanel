<?php
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!-- Start footer section -->
    <footer class="footer__section bg__black">
        <div class="container-fluid">
            <div class="main__footer d-flex justify-content-between">
                <div class="footer__widget footer__widget--width">
                    <h2 class="footer__widget--title text-ofwhite h3">About Us 
                        <button class="footer__widget--button" aria-label="footer widget button">
                            <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                            </svg>
                        </button>
                    </h2>
                    <div class="footer__widget--inner">
                        <p class="footer__widget--desc text-ofwhite mb-20">The interests of our customers are always<br> top priority for us, so we hope you will <br>enjoy our products as much as we enjoy<br> making them available to you.</p>
                        <div class="footer__social">
                            <h3 class="social__title text-ofwhite h4 mb-15">Follow Us</h3>
                            <ul class="social__shear d-flex">
                                <li class="social__shear--list">
                                    <a class="social__shear--list__icon" target="_blank" href="<?php echo $sitesetting[0]->facebook; ?>">
                                        <svg  xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                            <path  data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"/>
                                        </svg>
                                        <span class="visually-hidden">Facebook</span>
                                    </a>
                                </li>
                                <li class="social__shear--list">
                                    <a class="social__shear--list__icon" target="_blank" href="<?php echo $sitesetting[0]->twitter; ?>">
                                        <svg  xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                            <path  data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"/>
                                        </svg>
                                        <span class="visually-hidden">Twitter</span>
                                    </a>
                                </li>
                                <li class="social__shear--list">
                                    <a class="social__shear--list__icon" target="_blank" href="<?php echo $sitesetting[0]->instagram; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.497" height="16.492" viewBox="0 0 19.497 19.492">
                                            <path  data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor"/>
                                        </svg>
                                        <span class="visually-hidden">Instagram</span>
                                    </a>
                                </li>
                                <li class="social__shear--list">
                                    <a class="social__shear--list__icon" target="_blank" href="<?php echo $sitesetting[0]->youtube; ?>">
                                        <svg  xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                                            <path  data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor"/>
                                        </svg>
                                        <span class="visually-hidden">Youtube</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer__widget--menu__wrapper d-flex footer__widget--width">
                    <div class="footer__widget">
                        <h2 class="footer__widget--title text-ofwhite h3">My Account 
                            <button class="footer__widget--button" aria-label="footer widget button">
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </button>
                        </h2>
                        <ul class="footer__widget--menu footer__widget--inner">
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url('my-account'); ?>">My Account</a></li>
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url('cart'); ?>">Shopping Cart</a></li>
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url('login'); ?>">Login</a></li>
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url('checkout'); ?>">Checkout</a></li>
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url('wishlist'); ?>">Wishlist</a></li>
                        </ul>
                    </div>

                    <div class="footer__widget">
                        <h2 class="footer__widget--title text-ofwhite h3">Categories 
                            <button class="footer__widget--button" aria-label="footer widget button">
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </button>
                        </h2>
                        <ul class="footer__widget--menu footer__widget--inner">
                            <?php
                            $this->db->order_by('id desc');
                            $cate = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                            foreach($cate as $data)
                                {?>
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url('shop/'.$data->slug); ?>"><?php echo $data->name; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <div class="footer__widget footer__widget--width">
                    <h2 class="footer__widget--title text-ofwhite h3">Quick links 
                            <button class="footer__widget--button" aria-label="footer widget button">
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </button>
                        </h2>
                        <ul class="footer__widget--menu footer__widget--inner">
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url('about'); ?>">About Us</a></li>
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url('blog'); ?>">Blogs</a></li>
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url('contact'); ?>">Contact</a></li>
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url('term-cond'); ?>">Term & Condition</a></li>
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url('privecy'); ?>">Privecy policie</a></li>
                            <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url('return-polici'); ?>">Return Policy</a></li>
                        </ul>
                </div>

                 <div class="footer__widget footer__widget--width">
                    <h2 class="footer__widget--title text-ofwhite h3">Contact Us
                            <button class="footer__widget--button" aria-label="footer widget button">
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </button>
                        </h2>
                        <ul class="footer__widget--menu footer__widget--inner">
                            <li class="footer__widget--menu__list"> <a class="footer__widget--menu__text" href="mailto:<?php echo $sitesetting[0]->email; ?>"><?php echo $sitesetting[0]->email; ?></a></li>
                            <li class="footer__widget--menu__list"> <a class="footer__widget--menu__text" href="mailto:<?php echo $sitesetting[0]->mobile; ?>"><?php echo $sitesetting[0]->mobile; ?>, <?php echo $sitesetting[0]->alt_mobile; ?></a></li>

                            <li class="footer__widget--menu__list">
                                <a class="footer__widget--menu__text" href="#"><?php echo $sitesetting[0]->address; ?></a>
                            </li>
                            
                        </ul>
                </div>

                

            </div>
            <div class="footer__bottom d-flex justify-content-between align-items-center">
                <p class="copyright__content text-ofwhite m-0">Copyright © 2022 <a class="copyright__content--link" href="<?php echo base_url(); ?>"><?php echo website_name; ?></a> . All Rights Reserved. Design By <a href="https://www.codediffusion.in/" target="_blank">Code Diffusion</a></p>
                <div class="footer__payment text-right">
                    <img class="display-block" src="<?php echo base_url(); ?>assets/img/other/payment-visa-card.png" alt="visa-card">
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer section -->

    <!-- Quickview Wrapper -->
    <div class="modal" id="modal1" data-animation="slideInUp">
        <div class="modal-dialog quickview__main--wrapper">
            <header class="modal-header quickview__header">
                <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>✕ </button>
            </header>
            <div class="quickview__inner">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <div class="col" id="images">
                        
                    </div>
                    <div class="col">
                        <div class="quickview__info">
                            <form action="#">
                                <h2 class="product__details--info__title mb-15"><span id="p_name"></span></h2>
                                <div class="product__details--info__price mb-10">
                                    <span class="current__price">₹ <span id="p_original_price"></span></span>
                                    <span class="old__price">₹ <span id="p_cut_price" class="old__price"></span></span>
                                </div>
                                <div class="quickview__info--ratting d-flex align-items-center mb-10">
                                    <ul class="rating d-flex justify-content-center" id="p_rating">

                                    </ul>
                                    <!-- <span class="quickview__info--review__text">(5 reviews)</span> -->
                                </div>
                                <p class="product__details--info__desc mb-15"  id="p_small_info"><span></span></p>
                                <!-- <div class="product__variant">
                                    <div class="product__variant--list mb-10">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-8">Color :</legend>

                                            <span id="color_id"></span>

                                        </fieldset>
                                    </div>
                                    <div class="product__variant--list mb-15">
                                        <fieldset class="variant__input--fieldset weight">
                                            <legend class="product__variant--title mb-8">Size :</legend>
                                            <span id="size_id"></span>
                                        </fieldset>
                                    </div>
                                    <div class="quickview__variant--list quantity d-flex align-items-center mb-15">
                                        <div class="quantity__box">
                                            <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                            <label>
                                                <input type="number" class="quantity__number quickview__value--number" value="1" data-counter/>
                                            </label>
                                            <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                        </div>
                                        <button class="primary__btn quickview__cart--btn" type="submit">Add To Cart</button>  
                                    </div> -->
                                    <!-- <div class="quickview__variant--list variant__wishlist mb-15 addtowishlist">
                                        <span id="p_id"></span>
                                        <a class="variant__wishlist--icon"  title="Add to wishlist">
                                            <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                            Add to Wishlist
                                        </a>
                                    </div> -->
                                </div>
                                <div class="quickview__social d-flex align-items-center">
                                    <label class="quickview__social--title">Social Share:</label>
                                    <ul class="quickview__social--wrapper mt-0 d-flex">
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.facebook.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                                    <path  data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://twitter.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                                    <path  data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.instagram.com/">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.497" height="16.492" viewBox="0 0 19.497 19.492">
                                                    <path  data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Instagram</span> 
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.youtube.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                                                    <path  data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quickview Wrapper End -->

     <!-- Start News letter popup -->
    <!--  <div class="newsletter__popup" data-animation="slideInUp">
        <div id="boxes" class="newsletter__popup--inner">
            <button class="newsletter__popup--close__btn" aria-label="search close button">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path></svg>
            </button>
            <div class="box newsletter__popup--box d-flex align-items-center">
                <div class="newsletter__popup--thumbnail">
                    <img class="newsletter__popup--thumbnail__img display-block" src="<?php echo base_url(); ?>assets/img/banner/newsletter-popup-thumb2.png" alt="newsletter-popup-thumb">
                </div>
                <div class="newsletter__popup--box__right">
                    <h2 class="newsletter__popup--title">Join Our Newsletter</h2>
                    <div class="newsletter__popup--content">
                        <label class="newsletter__popup--content--desc">Enter your email address to subscribe our notification of our new post &amp; features by email.</label>
                        <div class="newsletter__popup--subscribe" id="frm_subscribe">
                            <form class="newsletter__popup--subscribe__form">
                                <input class="newsletter__popup--subscribe__input" type="text" placeholder="Enter you email address here...">
                                <button class="newsletter__popup--subscribe__btn">Subscribe</button>
                            </form>
                            <div class="newsletter__popup--footer">
                                <input type="checkbox" id="newsletter__dont--show">
                                <label class="newsletter__popup--dontshow__again--text" for="newsletter__dont--show">Don't show this popup again</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End News letter popup -->

    <!-- Scroll top bar -->
    <button id="scroll__top">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg>
    </button>
    

  <script src="<?php echo base_url(); ?>assets/js/vendor/popper.js" defer="defer"></script>
  <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.min.js" defer="defer"></script>
  <script src="<?php echo base_url(); ?>assets/js/plugins/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/plugins/glightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


   <script>
         $(document).on("click", ".modelview",(function(e) {
          var id = $(this).data("id");
          
          $.ajax({
                dataType:"json",
                url:"<?php echo base_url('welcome/modelviews'); ?>",
                method: "post",
                data:{id:id},

                success: function(data)
                {
                    var result = data;
                    var detail = data.data;
                    console.log(detail.image);
                    if(result.status==200)
                    {
                        
                        $("#p_name").html(detail.name);
                        $("#p_rating").html(detail.rating);
                        $("#p_original_price").html(detail.original_price);
                        $("#p_cut_price").html(detail.cut_price);
                        $("#p_small_info").html(detail.small_info);
                        $("#color_id").html(detail.color_id);
                        $("#size_id").html(detail.size);
                        $("#images").html(detail.image);
                        $("#modal1").addClass("is-visible");
                    }
                    else{
                        $("#p_name").html("error");
                        $("#p_rating").html("error");
                        $("#p_original_price").html("error");
                        $("#p_cut_price").html("error");
                        $("#p_small_info").html("error");
                        $("#size_id").html("error");
                    }
                }
            });          
        }));
    </script>

    <!-- ------add to cart----------- -->
    <script>
         $(document).on("click", ".addtocart",(function(e) {

          event.preventDefault();
          var p_id = $(this).data("p_id");
          var color_val = $(this).data("color_val");
          var size_val = $(this).data("size_val");
          var quantity = 1;

          $.ajax({
                url:"<?php echo base_url('cart/add'); ?>",
                method: "post",
                data:{p_id:p_id,quantity:quantity,color_val:color_val,size_val:size_val},
                success: function(data)
                {                    
                    console.log(data);
                    alert('Item Added Successfully');
                    location.reload();                    
                }
            });          
        }));
    </script>
    <!-- -------------delete cart item--------- -->
    <script>
        function deletecart(id)
        {
            console.log(id);

            $.ajax({
                url : "<?php echo base_url('cart/add_to_cart_delete'); ?>",
                method : "POST",
                data : {id:id,submit:1},
                success: function(data)
                {
                    console.log(data);
                    alert('Item Delete Successfully');
                    location.reload();
                }
            });
        }
    </script>
    <!-- -------------update cart item--------- -->
    <script>
        $(document).on('change', '.qty_set', function(){
           var quantity = $(this).val();
           var id = $(this).data("id");
           $.ajax({
            url:"<?php echo base_url('cart/update'); ?>",
            method:"POST",
            data:{id:id, quantity:quantity},
            success:function(data)
            {
             alert("Quantity Update Successfully");
             location.reload();               
            }
           });
       });
    </script>


    <!-- ------add to wishlist----------- -->
    <script>
         $(document).on("click", ".addtowishlist",(function(e) {
          event.preventDefault();
          var p_id = $(this).data("p_id");
          var quantity = 1;
          $.ajax({
                url:"<?php echo base_url('wishlist/add'); ?>",
                method: "post",
                data:{p_id:p_id,quantity:quantity},
                success: function(data)
                {
                    console.log(data);
                    alert('Item Added Successfully');
                    location.reload();                    
                }
            });          
        }));
    </script>


    <!-- -------------deletewishlist item--------- -->
    <script>
        function deletewishlist(id)
        {
            console.log(id);

            $.ajax({
                url : "<?php echo base_url('wishlist/add_to_wishlist_delete'); ?>",
                method : "POST",
                data : {id:id,submit:1},
                success: function(data)
                {
                    console.log(data);
                    alert('Item Delete Successfully');
                    location.reload();
                }
            });
        }         
    </script>
    <!-- -------------update wishlist item--------- -->
    <script>
        $(document).on('change', '.qty_set_wishlist', function(){
           var quantity = $(this).val();
           var id = $(this).data("id");
           $.ajax({
            url:"<?php echo base_url('wishlist/update'); ?>",
            method:"POST",
            data:{id:id, quantity:quantity},
            success:function(data)
            {
             alert("Quantity Update Successfully");             
            }
           });
       });
    </script>


    




</body>

</html>