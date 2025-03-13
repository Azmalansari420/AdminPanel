<?php 
    $user = $this->crud->selectDataByMultipleWhere('registration',array('id'=>$this->session->userdata("userdashboard"),));

    // print_r($user);
?>
<?php $this->load->view('header'); ?>

    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Welcome <?php echo $user[0]->username; ?></h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white"><?php echo $user[0]->username; ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->
        
        <!-- my account section start -->
        <section class="my__account--section section--padding">
            <div class="container">
                <div class="my__account--section__inner border-radius-10 d-flex">
                    <div class="account__left--sidebar">
                        <h2 class="account__content--title h3 mb-20">My Profile</h2>
                        <ul class="account__menu">
                            <li class="account__menu--list "><a href="<?php echo base_url('my-account'); ?>">Dashboard</a></li>
                            <li class="account__menu--list active"><a href="<?php echo base_url('user-profile'); ?>">Setting</a></li>
                            <li class="account__menu--list"><a href="<?php echo base_url('wishlist'); ?>">Wishlist</a></li>
                            <li class="account__menu--list"><a href="<?php echo base_url('user/userlogout'); ?>">Log Out</a></li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        <div class="account__content">
                            <h2 class="account__content--title h3 mb-20">Account Setting</h2>
                            <div class="col">
                                <form action="<?php echo base_url('user/user_update'); ?>" method="post">
                                    <div class="account__login register">
                                        <div class="account__login--header mb-25">
                                            <p><?php echo $this->session->flashdata('update_message'); ?></p>
                                        </div>
                                        <div class="account__login--inner">
                                            <input class="account__login--input" placeholder="Username" type="text" name="username"  value="<?php echo $user[0]->username; ?>">

                                            <input class="account__login--input" placeholder="Your Mobile no." type="number" name="mobile"  value="<?php echo $user[0]->mobile; ?>">

                                            <input class="account__login--input" placeholder="Email Addres" type="email" name="email"  value="<?php echo $user[0]->email; ?>">

                                            <input class="account__login--input" placeholder="Your Password" type="text" disabled  value="<?php echo $user[0]->password; ?>">

                                            <input class="account__login--input" placeholder="New Password" type="password" name="password"  value="">

                                            
                                            <button class="account__login--btn primary__btn mb-10" name="submit" type="submit">Save Changes</button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </section>
        <!-- my account section end -->

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
