   <?php $this->load->view('header'); ?>
<style>
    .widget__categories--menu__list.active {
    margin-bottom: 1.5rem;
}
</style>


    <main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25"><?php 
                            if(!empty($productlist[0]->name)){ echo $productlist[0]->name;} else { echo "SHOP";} ?></h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white"><?php 
                            if(!empty($productlist[0]->name)){ echo $productlist[0]->name;} else { echo "SHOP";} ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start shop section -->
        <section class="shop__section section--padding">
            <div class="container-fluid">
               
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="shop__sidebar--widget widget__area d-none d-lg-block">
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
                           
                            <div class="single__widget widget__bg">
                                <h2 class="widget__title h3">Tranding Product</h2>
                                <div class="product__grid--inner">
                                    <?php
                                    $this->db->order_by('id desc');
                                $this->db->limit(3);
                                $product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'tranding_product'=>1,));
                                foreach($product as $data)
                                    {
                                    $cate = $this->crud->selectDataByMultipleWhere('categories',array('id'=>$data->cat_id,));
                                    $subcate = $this->crud->selectDataByMultipleWhere('sub_categories',array('id'=>$data->sub_cat_id,));

                                    $price = 0;
                                    $this->db->group_by('price');
                                    $this->db->limit(1);
                                    $this->db->select("price");
                                    $color = $this->db->get_where('all_images',array('p_id'=>$data->id,))->result_object();
                                    if(!empty($color))
                                    {
                                        foreach ($color as $key => $value) 
                                        { 
                                            $price = $value->price;
                                            break;
                                        } 
                                    }

                                    $cut_price = 0;
                                    $this->db->group_by('cut_price');
                                    $this->db->limit(1);
                                    $this->db->select("cut_price");
                                    $color = $this->db->get_where('all_images',array('p_id'=>$data->id,))->result_object();
                                    if(!empty($color))
                                    {
                                        foreach ($color as $key => $value) 
                                        { 
                                            $cut_price = $value->cut_price;
                                            break;
                                        } 
                                    }

                                    
                                    ?>

                                    <div class="product__items product__items--grid d-flex align-items-center">
                                        <div class="product__items--grid__thumbnail position__relative">
                                            <a class="product__items--link" href="<?php echo base_url('product-details/'.$data->slug); ?>">
                                                <img class="product__items--img product__primary--img" src="<?php echo base_url(); ?>media/uploads/product/<?php echo $data->thumb_img; ?>" alt="product-img"  style="height: auto;">
                                                <img class="product__items--img product__secondary--img" src="<?php echo base_url(); ?>media/uploads/product/<?php echo $data->thumb_img2; ?>" alt="product-img" style="height: auto;">
                                            </a>
                                        </div>
                                        <div class="product__items--grid__content">
                                            <h3 class="product__items--content__title h4"><a href="<?php echo base_url('product-details/'.$data->slug); ?>"> <?php echo $data->name; ?></a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">₹ <?php echo number_format($price,2); ?></span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">₹ <?php echo number_format($cut_price,2); ?></span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <?php
                                                $i=1;
                                                while($i<5)
                                                {
                                                    if($i<=$data->rating)
                                                        { ?>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <?php } else { ?>
                                                <?php } $i++; } ?>
                                               
                                              
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-8">
                        <div class="shop__product--wrapper">
                            <div class="tab_content">
                                <div id="product_grid" class="tab_pane active show">
                                    <div class="product__section--inner product__grid--inner">
                                        <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-2 mb--n30">
                                            <?php
                                            if(!empty($productlist))
                                            {
                                                foreach ($productlist as $key => $data) 
                                                    { 
                                                        $cate = $this->crud->selectDataByMultipleWhere('categories',array('id'=>$data->cat_id,));
                                                        $subcate = $this->crud->selectDataByMultipleWhere('sub_categories',array('id'=>$data->sub_cat_id,));

                                                        $color_id = 0;
                                                        $this->db->group_by('color_id');
                                                        $this->db->limit(1);
                                                        $this->db->select("color_id");
                                                        $color = $this->db->get_where('all_images',array('p_id'=>$data->id,))->result_object();
                                                        if(!empty($color))
                                                        {
                                                            foreach ($color as $key => $value) 
                                                            { 
                                                                $color_id = $value->color_id;
                                                                break;
                                                            } 
                                                        }
                                                        $size_id = 0;
                                                        $this->db->group_by('size_id');
                                                        $this->db->limit(1);
                                                        $this->db->select("size_id");
                                                        $color = $this->db->get_where('all_images',array('p_id'=>$data->id,))->result_object();
                                                        if(!empty($color))
                                                        {
                                                            foreach ($color as $key => $value) 
                                                            { 
                                                                $size_id = $value->size_id;
                                                                break;
                                                            } 
                                                        }

                                                        $price = 0;
                                                        $this->db->group_by('price');
                                                        $this->db->limit(1);
                                                        $this->db->select("price");
                                                        $color = $this->db->get_where('all_images',array('p_id'=>$data->id,))->result_object();
                                                        if(!empty($color))
                                                        {
                                                            foreach ($color as $key => $value) 
                                                            { 
                                                                $price = $value->price;
                                                                break;
                                                            } 
                                                        }

                                                        $cut_price = 0;
                                                        $this->db->group_by('cut_price');
                                                        $this->db->limit(1);
                                                        $this->db->select("cut_price");
                                                        $color = $this->db->get_where('all_images',array('p_id'=>$data->id,))->result_object();
                                                        if(!empty($color))
                                                        {
                                                            foreach ($color as $key => $value) 
                                                            { 
                                                                $cut_price = $value->cut_price;
                                                                break;
                                                            } 
                                                        }
                                                        
                                                    ?>

                                            <div class="col mb-30">
                                                <div class="product__items ">
                                                    <div class="product__items--thumbnail">
                                                        <a class="product__items--link" href="<?php echo base_url('product-details/'.$data->slug); ?>">
                                                            <img class="product__items--img product__primary--img" src="<?php echo base_url(); ?>media/uploads/product/<?php echo $data->thumb_img; ?>" alt="product-img">
                                                            <img class="product__items--img product__secondary--img" src="<?php echo base_url(); ?>media/uploads/product/<?php echo $data->thumb_img2; ?>" alt="product-img">
                                                        </a>
                                                        <div class="product__badge">
                                                            <span class="product__badge--items sale">- <?php echo discount($cut_price,$price); ?>% Off</span>
                                                        </div> 
                                                    </div>
                                                    <div class="product__items--content">
                                                        <span class="product__items--content__subtitle"><?php echo $cate[0]->name; ?>, <?php echo $subcate[0]->name; ?></span>
                                                        <h3 class="product__items--content__title h4"><a href="<?php echo base_url('product-details/'.$data->slug); ?>"><?php echo $data->name; ?></a></h3>
                                                        <div class="product__items--price">
                                                            <span class="current__price">₹ <?php echo number_format($price,2); ?></span>
                                                            <span class="price__divided"></span>
                                                            <span class="old__price">₹ <?php echo number_format($cut_price,2); ?></span>
                                                        </div>
                                                        <ul class="rating product__rating d-flex">
                                                            <?php
                                                            $i=1;
                                                            while($i<5)
                                                            {
                                                                if($i<=$data->rating)
                                                                    { ?>
                                                            <li class="rating__list">
                                                                <span class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                                    <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <?php } else { ?>
                                                            <?php } $i++; } ?>   
                                                                       
                                                        </ul>
                                                        <ul class="product__items--action d-flex">
                                                            <li class="product__items--action__list">
                                                                <a class="product__items--action__btn add__to--cart addtocart" data-p_id="<?=$data->id ?>" data-color_val="<?=$color_id ?>" data-size_val="<?=$size_id ?>">
                                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                                        <g transform="translate(0 0)">
                                                                        <g>
                                                                            <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                            <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                            <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                                        </g>
                                                                        </g>
                                                                    </svg>
                                                                    <span class="add__to--cart__text"> + Add to cart</span>
                                                                </a>
                                                            </li>
                                                            <li class="product__items--action__list">
                                                                <a class="product__items--action__btn addtowishlist" data-p_id="<?=$data->id ?>">
                                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
                                                                    <span class="visually-hidden">Wishlist</span> 
                                                                </a>
                                                            </li>
                                                            <li class="product__items--action__list modelview" data-id="<?php echo $data->id; ?>">
                                                                <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                    <span class="visually-hidden">Quick View</span>
                                                                </a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } } else { ?> 
                                            
                                            <img src="<?php echo base_url(); ?>media/admin/no-found.png" style="width: 100%;">

                                        <?php } ?> 


                                            
                                        </div>
                                    </div>
                                </div>                               
                            </div>

                          <!--   <div class="pagination__area bg__gray--color">
                                <nav class="pagination justify-content-center">
                                    <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                                        <li class="pagination__list">
                                            <a href="shop.html" class="pagination__item--arrow  link ">
                                                <svg xmlns="http://www.w3.org/2000/svg"  width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292"/></svg>
                                                <span class="visually-hidden">pagination arrow</span>
                                            </a>
                                        <li>
                                        <li class="pagination__list"><span class="pagination__item pagination__item--current">1</span></li>
                                        <li class="pagination__list"><a href="shop.html" class="pagination__item link">2</a></li>
                                        <li class="pagination__list"><a href="shop.html" class="pagination__item link">3</a></li>
                                        <li class="pagination__list"><a href="shop.html" class="pagination__item link">4</a></li>
                                        <li class="pagination__list">
                                            <a href="shop.html" class="pagination__item--arrow  link ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"/></svg>
                                                <span class="visually-hidden">pagination arrow</span>
                                            </a>
                                        <li>
                                    </ul>
                                </nav>
                            </div> -->


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shop section -->

        <?php $this->load->view('bottom-sec'); ?>

    </main>

   <?php $this->load->view('footer'); ?>