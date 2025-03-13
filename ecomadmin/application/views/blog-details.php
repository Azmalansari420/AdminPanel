<?php $this->load->view('header'); ?>






 <main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25"><?php echo $EDITDATA[0]->name; ?></h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white"><?php echo $EDITDATA[0]->name; ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start blog details section -->
        <section class="blog__details--section section--padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxl-9 col-xl-8 col-lg-8">
                        <div class="blog__details--wrapper">
                            <div class="entry__blog">
                                <div class="blog__post--header mb-30">
                                    <h2 class="post__header--title mb-15"><?php echo $EDITDATA[0]->name; ?></h2>
                                    <p class="blog__post--meta">Posted On : <?php echo date('d M Y',strtotime($EDITDATA[0]->addeddate)); ?> </p>                                     
                                </div>
                                <div class="blog__thumbnail mb-30">
                                    <img class="blog__thumbnail--img border-radius-10" src="<?php echo base_url(); ?>media/uploads/blog/<?php echo $EDITDATA[0]->image; ?>" alt="blog-img" >
                                </div>
                                <div class="blog__details--content">
                                    <?php echo $EDITDATA[0]->content; ?>
                                </div>
                            </div>
                           
                            
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-4">
                        <div class="blog__sidebar--widget left widget__area">
                            
                            <div class="single__widget widget__bg">
                                <h2 class="widget__title h3">Categories</h2>
                                <ul class="widget__categories--menu">
                                	 <?php 
                                $cate = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));

                                foreach ($cate as $key => $value) 
                                    { 

                                    $subcatgho = $this->crud->selectDataByMultipleWhere('sub_categories',array('status'=>1,'cat_id'=>$value->id,));
                                        ?> 
                                    <li class="widget__categories--menu__list">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <img class="widget__categories--menu__img" src="<?php echo base_url(); ?>assets/img/product/small-product1.png" alt="categories-img">
                                            <span class="widget__categories--menu__text"><?php echo $value->name; ?></span>
                                            <?php 
                                            if(!empty($subcatgho))
                                            { ?>
                                            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                            </svg>
                                            <?php } ?>
                                        </label>
                                        <?php 
                                            if(!empty($subcatgho))
                                            { ?>
                                        <ul class="widget__categories--sub__menu">
                                        	 <?php
                                                foreach($subcatgho as $data)
                                                    { ?>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="<?php echo base_url('shop/'.$data->slug); ?>">
                                                    <img class="widget__categories--sub__menu--img" src="<?php echo base_url(); ?>assets/img/product/small-product2.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text"><?php echo $data->name; ?></span>
                                                </a>
                                            </li>
                                             <?php } ?>
                                        </ul>
                                         <?php } ?>
                                    </li>
                                <?php } ?>
                                    
                                   
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End blog details section -->

        <?php $this->load->view('bottom-sec'); ?>
    </main>










<?php $this->load->view('footer'); ?>