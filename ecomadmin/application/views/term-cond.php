<?php $this->load->view('header'); ?>

<style>
    img.testimonial__items--thumbnail__img.border-radius-50
    {
        height: 70px;
    }
</style>


    <main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Term & Condition</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Term & Condition</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start about section -->
        <section class="about__section section--padding mb-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about__content">
                            <span class="about__content--subtitle text__secondary mb-20"> Term & Condition</span>
                            <h2 class="about__content--maintitle mb-25">MYRA-SYRA Term & Condition</h2>

                            <p class="about__content--desc mb-20">We aim to offer our customers a variety of the latest Women’s Wear. We’ve come a long way, so we know exactly which direction to take when supplying you with high quality yet budget-friendly products. We offer all of this while providing excellent customer service and friendly support.</p>
                            <p class="about__content--desc mb-25">We always keep an eye on the latest trends in Bottomwear and put our customers’ wishes first. That is why we have satisfied customers all over the world, and are thrilled to be a part of the Clothing industry.</p> 
                            <p class="about__content--desc mb-25">The interests of our customers are always top priority for us, so we hope you will enjoy our products as much as we enjoy making them available to you.</p>
                          <!--   <div class="about__author position__relative d-flex align-items-center">
                                <div class="about__author--left">
                                    <h4 class="about__author--name">Bruce Sutton</h4>
                                    <span class="about__author--rank">Spa Manager</span>
                                </div>
                                <img class="about__author--signature display-block" src="assets/img/icon/signature.png" alt="signature">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End about section -->
    
            <?php $this->load->view('bottom-sec'); ?>
       

    </main>

<?php $this->load->view('footer'); ?>
