<?php $this->load->view('header');
 $this->db->order_by('id desc');
$wishlist = $this->crud->selectDataByMultipleWhere('add_to_wishlist',array('temp_user_id'=>temp_session_id()));
?>

    <main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Wishlist</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Wishlist</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <?php
        if(!empty($wishlist))
        {
        ?>

        <!-- cart section start -->
        <section class="cart__section section--padding">
            <div class="container">
                <div class="cart__section--inner">
                <div style="text-align: center;">
                    <p><?php echo $this->session->flashdata('message'); ?></p>
                </div>
                    <form action="#"> 
                        <h2 class="cart__title mb-40">Wishlist</h2>
                        <div class="cart__table">
                            <table class="cart__table--inner">
                                <thead class="cart__table--header">
                                    <tr class="cart__table--header__items">
                                        <th class="cart__table--header__list">Product</th>
                                        <th class="cart__table--header__list">Price</th>
                                        <th class="cart__table--header__list text-center">STOCK STATUS</th>
                                        <th class="cart__table--header__list text-right">ADD TO CART</th>
                                    </tr>
                                </thead>
                                <tbody class="cart__table--body">
                                    <?php
                               

                                foreach($wishlist as $data)
                                    { 

                                    $product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$data->p_id,));

                                    $color_id = 0;
                                    $this->db->group_by('color_id');
                                    $this->db->limit(1);
                                    $this->db->select("color_id");
                                    $color = $this->db->get_where('all_images',array('p_id'=>$data->p_id,))->result_object();
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
                                    $color = $this->db->get_where('all_images',array('p_id'=>$data->p_id,))->result_object();
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
                                    $color = $this->db->get_where('all_images',array('p_id'=>$data->p_id,))->result_object();
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
                                    $color = $this->db->get_where('all_images',array('p_id'=>$data->p_id,))->result_object();
                                    if(!empty($color))
                                    {
                                        foreach ($color as $key => $value) 
                                        { 
                                            $cut_price = $value->cut_price;
                                            break;
                                        } 
                                    }
                                    
                                        ?>
                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="cart__product d-flex align-items-center">
                                                <button class="cart__remove--btn" aria-label="search button" type="button" onclick="deletewishlist(<?=$data->id ?>)">
                                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg>
                                                </button>
                                                <div class="cart__thumbnail">
                                                    <a href="<?php echo base_url('product-details/'.$product[0]->slug); ?>"><img class="border-radius-5" src="<?php echo base_url(); ?>media/uploads/product/<?php echo $product[0]->thumb_img;; ?>" alt="cart-product" style="height: 100px;"></a>
                                                </div>
                                                <div class="cart__content">
                                                    <h4 class="cart__content--title"><a href="<?php echo base_url('product-details/'.$product[0]->slug); ?>"><?php echo $product[0]->name; ?></a></h4>
                                                    <span class="cart__content--variant">Color: <?php echo colorname($color_id); ?></span>
                                                    <span class="cart__content--variant">Size: <?php echo sizename($size_id); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span class="cart__price">₹ <?php echo number_format($price,2); ?></span>
                                        </td>
                                        <td class="cart__table--body__list text-center">
                                            <span class="in__stock text__secondary"><?php echo $product[0]->avalibility; ?></span>
                                        </td>
                                        <td class="cart__table--body__list text-right">
                                            <a class="wishlist__cart--btn primary__btn" href="<?php echo base_url('wishlist/update_wishlist/'.$data->id.'/'.$data->p_id); ?>" >Add To Cart</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                    
                                </tbody>
                            </table> 
                            <div class="continue__shopping d-flex justify-content-between">
                                <a class="continue__shopping--link" href="<?php echo base_url(); ?>">Continue shopping</a>
                                <a class="continue__shopping--clear" href="<?php echo base_url('shop'); ?>">View All Products</a>
                            </div>
                        </div> 
                    </form> 
                </div>
            </div>     
        </section>
        <!-- cart section end -->

         <?php } else { ?>
            <section class="content text-center">
                <p><?php echo $this->session->flashdata('message'); ?></p>
                <img src="<?php echo base_url(); ?>media/wishlist.png">
            </section>
        <?php }  ?>

        <!-- Start product section -->
        <section class="product__section product__section--style3 section--padding pt-0">
            <div class="container product3__section--container">
                <div class="section__heading text-center mb-50">
                    <h2 class="section__heading--maintitle">New Products</h2>
                </div>
                <div class="product__section--inner product__swiper--column4__activation swiper">
                    <div class="swiper-wrapper">
                        <?php
                                $this->db->order_by('id desc');
                                $this->db->limit(8);
                                $product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'new_arrival'=>1,));
                                foreach($product as $data)
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
                        <div class="swiper-slide">
                            <div class="product__items ">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="<?php echo base_url('product-details/'.$data->slug); ?>">
                                        <img class="product__items--img product__primary--img" src="<?php echo base_url(); ?>media/uploads/product/<?php echo $data->thumb_img; ?>" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="<?php echo base_url(); ?>media/uploads/product/<?php echo $data->thumb_img2; ?>" alt="product-img">
                                    </a>
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
                                            <a class="product__items--action__btn add__to--cart addtocart" data-p_id="<?=$data->id ?>"  data-color_val="<?=$color_id ?>" data-size_val="<?=$size_id ?>">
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
                                            <a class="product__items--action__btn addtowishlist"  data-p_id="<?=$data->id ?>">
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
                        <?php } ?>
                    </div>
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <!-- End product section -->


        <?php $this->load->view('bottom-sec'); ?>

    </main>

        <?php $this->load->view('footer'); ?>
