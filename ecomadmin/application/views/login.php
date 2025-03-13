<?php $this->load->view('header'); ?>

	 <main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Account Page</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Account Page</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start login section  -->
        <div class="login__section section--padding">
            <div class="container">

                    <div class="login__section--inner">
                        <div class="row row-cols-md-2 row-cols-1">
                            <div class="col">
                            	<form action="<?php echo base_url('user/user_login'); ?>" method="post">
	                                <div class="account__login">
	                                    <div class="account__login--header mb-25">
	                                        <h2 class="account__login--header__title h3 mb-10">Login</h2>
	                                        <p class="account__login--header__desc">Login if you area a returning customer.</p>
	                                        <p><?php echo $this->session->flashdata('login_message'); ?></p>
	                                    </div>
	                                    <div class="account__login--inner">
	                                        <input class="account__login--input" placeholder="Email Addres" type="email" name="email">

	                                        <input class="account__login--input" placeholder="Password" type="password" name="password">

	                                        <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
	                                            <div class="account__login--remember position__relative">
	                                                <input class="checkout__checkbox--input" id="check1" type="checkbox">
	                                                <span class="checkout__checkbox--checkmark"></span>
	                                                <label class="checkout__checkbox--label login__remember--label" for="check1">
	                                                    Remember me</label>
	                                            </div>
	                                            <!-- <button class="account__login--forgot" type="submit">Forgot Your Password?</button> -->
	                                        </div>
	                                        <button class="account__login--btn primary__btn" type="submit" name="submit">Login</button>
	                                        <!-- <div class="account__login--divide">
	                                            <span class="account__login--divide__text">OR</span>
	                                        </div> -->
	                                       <!--  <div class="account__social d-flex justify-content-center mb-15">
	                                            <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com/">Facebook</a>
	                                            <a class="account__social--link google" target="_blank" href="https://www.google.com/">Google</a>
	                                            <a class="account__social--link twitter" target="_blank" href="https://twitter.com/">Twitter</a>
	                                        </div> -->
	                                        
	                                    </div>
	                                </div>
	                            </form>
                            </div>

                            <div class="col">
                            	<form action="<?php echo base_url('user/registration'); ?>" method="post">
	                                <div class="account__login register">
	                                    <div class="account__login--header mb-25">
	                                        <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
	                                        <p class="account__login--header__desc">Register here if you are a new customer</p>
	                                        <p><?php echo $this->session->flashdata('register_message'); ?></p>
	                                    </div>
	                                    <div class="account__login--inner">
	                                        <input class="account__login--input" placeholder="Username" type="text" name="username" required>

	                                        <input class="account__login--input" placeholder="Your Mobile no." type="number" required name="mobile">

	                                        <input class="account__login--input" placeholder="Email Addres" type="email" name="email" required>

	                                        <input class="account__login--input" placeholder="Password" type="password" required name="password">

	                                        
	                                        <div class="account__login--remember position__relative">
	                                            <input class="checkout__checkbox--input" id="check2" type="checkbox" required>
	                                            <span class="checkout__checkbox--checkmark"></span>
	                                            <label class="checkout__checkbox--label login__remember--label" for="check2">
	                                                I have read and agree to the terms & conditions</label>
	                                        </div>
	                                        <button class="account__login--btn primary__btn mb-10" name="submit" type="submit">Submit & Register</button>
	                                        
	                                    </div>
	                                </div>
                            	</form>
                            </div>
                        </div>
                    </div>

            </div>     
        </div>
        <!-- End login section  -->

        <!-- Start shipping section -->
        <section class="shipping__section2 shipping__style3 section--padding pt-0">
            <div class="container">
                <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="<?php echo base_url(); ?>assets/img/other/shipping1.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Shipping</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="<?php echo base_url(); ?>assets/img/other/shipping2.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Payment</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="<?php echo base_url(); ?>assets/img/other/shipping3.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Return</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="<?php echo base_url(); ?>assets/img/other/shipping4.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Support</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shipping section -->

    </main>

<?php $this->load->view('footer'); ?>