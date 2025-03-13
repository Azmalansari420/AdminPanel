<?php $this->load->view('header'); ?>

   
    <main class="main__content_wrapper">
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25"><?php echo $EDITDATA[0]->name; ?></h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white"><?php echo $EDITDATA[0]->name; ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <section class="product__details--section section--padding">
            <div class="container">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <div class="col">
                        <div class="product__details--media">
                            <div class="product__media--preview  swiper">
                                <div class="swiper-wrapper" id="image-fetch"></div>
                            </div>
                            <div class="product__media--nav swiper">
                                <div class="swiper-wrapper" id="image-fetch2"></div>
                                <div class="swiper__nav--btn swiper-button-next"></div>
                                <div class="swiper__nav--btn swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>   
                    <div class="col">
                        <div class="product__details--info">
                            <form action="#">
                                <h2 class="product__details--info__title mb-15"><?php echo $EDITDATA[0]->name; ?></h2>
                                 <div class="product__details--info__meta">
                                        <p class="product__details--info__meta--list"><strong>sku:</strong>  <span><?php echo $EDITDATA[0]->sku; ?></span> </p>
                                    </div>
                                <div class="product__details--info__price mb-10">
                                    <span class="current__price">₹ <span id="price"></span></span>
                                    <span class="price__divided"></span>
                                    <span class="old__price">₹ <span id="cut_price"></span></span>
                                </div>
                                <div class="product__details--info__rating d-flex align-items-center mb-15">
                                    <ul class="rating d-flex justify-content-center">
                                        <?php
                                        $i=1;
                                        while($i<5)
                                        {
                                            if($i<=$EDITDATA[0]->rating)
                                                { ?>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                       <?php }else {  ?>
                                       <?php } $i++; } ?>
                                    </ul>
                                </div>
                                <p class="product__details--info__desc mb-15"><?php echo $EDITDATA[0]->small_info; ?></p>
                                <div class="product__variant">
                                    <div class="product__variant--list mb-10">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-8">Color :</legend>
                                            <?php
                                            $this->db->group_by('color_id');
                                            $color = $this->db->get_where('all_images',array('p_id'=>$EDITDATA[0]->id,))->result_object();

                                            if(!empty($color))
                                            {
                                                foreach ($color as $key => $value) 
                                                    { 
                                                        $color_name = $this->db->get_where('color',array('id'=>$value->color_id))->result_object();
                                                        ?>
                                            <input class="color_value" id="color<?php echo $color_name[0]->id; ?>" name="color" type="radio" value="<?=$color_name[0]->id ?>" <?php if($key==0)echo'checked'; ?> >
                                            <label class="variant__color--value " for="color<?php echo $color_name[0]->id; ?>" title="<?php echo $color_name[0]->name; ?>" style="background-color: <?php echo $color_name[0]->color_code; ?>">
                                            </label>

                                              <?php } } ?>
                                        </fieldset>
                                    </div>
                                    <div class="product__variant--list mb-15">
                                        <fieldset class="variant__input--fieldset weight">
                                            <legend class="product__variant--title mb-8">Size :</legend>
                                            <?php
                                            $this->db->group_by('size_id');
                                            $size = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$EDITDATA[0]->id,));
                                            if(!empty($size))
                                            {
                                                foreach ($size as $key => $value) 
                                                {
                                                    $size_name = $this->crud->selectDataByMultipleWhere('size',array('id'=>$value->size_id));
                                                    ?>

                                            <input class="size_value" id="size<?php echo $size_name[0]->id; ?>" name="size" type="radio" value="<?=$size_name[0]->id ?>"  <?php if($key==0)echo'checked'; ?>>
                                            <label class="variant__size--value " for="size<?php echo $size_name[0]->id; ?>"><?php echo $size_name[0]->name; ?></label>
                                            <?php } } ?>
                                        </fieldset>
                                    </div>
                                    <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                        <div class="quantity__box">
                                            <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                            <label>
                                                <input type="number" class="quantity__number quickview__value--number" value="1" data-counter/ id="quantity">
                                            </label>
                                            <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                        </div>
                                        <!-- <button class="quickview__cart--btn primary__btn" type="submit">Add To Cart</button>   -->
                                    </div>
                                     
                                    <div class="product__variant--list mb-15"><!-- 
                                        <a class="variant__wishlist--icon mb-15 addtowishlist" data-p_id="<?=$EDITDATA[0]->id ?>"  title="Add to wishlist">
                                            <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                            Add to Wishlist
                                        </a> -->
                                        <button style="margin-left: 0;" class="quickview__cart--btn primary__btn addtowishlist" data-p_id="<?=$EDITDATA[0]->id ?>">Add To Wishlist</button>
                                        <button class="quickview__cart--btn primary__btn singleaddtocart" type="button">Add To Cart</button>
                                        <!-- <button class="variant__buy--now__btn primary__btn" type="submit">Add To Cart</button> -->
                                    </div>
                                  
                                </div>
                                <div class="quickview__social d-flex align-items-center mb-15">
                                    <label class="quickview__social--title">Social Share:</label>
                                    <ul class="quickview__social--wrapper mt-0 d-flex">
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo base_url('product-details/'.$EDITDATA[0]->slug);?>" target="_blank">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                                    <path  data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.twitter.com/share?text=<?php echo $EDITDATA[0]->name; ?>&url=<?php echo base_url('product-details/'.$EDITDATA[0]->slug);?>&hashtags=&<?php echo $EDITDATA[0]->slug; ?>">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                                    <path  data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                       <!--  <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.instagram.com/">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.497" height="16.492" viewBox="0 0 19.497 19.492">
                                                    <path  data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Instagram</span> 
                                            </a>
                                        </li> -->
                                        <!-- <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.youtube.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                                                    <path  data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="guarantee__safe--checkout">
                                    <h5 class="guarantee__safe--checkout__title">Guaranteed Safe Checkout</h5>
                                    <img class="guarantee__safe--checkout__img" src="<?php echo base_url(); ?>assets/img/other/safe-checkout.png" alt="Payment Image">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="product__details--tab__section section--padding">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <ul class="product__details--tab d-flex mb-30">
                            <li class="product__details--tab__list active" data-toggle="tab" data-target="#description">Description</li>
                            <li class="product__details--tab__list" data-toggle="tab" data-target="#information">Additional Info</li>
                        </ul>
                        <div class="product__details--tab__inner border-radius-10">
                            <div class="tab_content">
                                <div id="description" class="tab_pane active show">
                                    <div class="product__tab--content">
                                        <div class="product__tab--content__step mb-30">
                                            <?php echo $EDITDATA[0]->description; ?>
                                        </div>                                        
                                    </div> 
                                </div>
                                <div id="information" class="tab_pane">
                                    <div class="product__tab--conten">
                                        <div class="product__tab--content__step mb-30">
                                            <?php echo $EDITDATA[0]->additional_info; ?>
                                        </div>
                                    </div> 
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        
       <!-- Start product section -->
       <?php
       $this->db->order_by('id desc');
        $this->db->limit(8);
        $product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,));
        if(!empty($product))
        {
       ?>
        <section class="product__section product__section--style3 section--padding">
            <div class="container product3__section--container">
                <div class="section__heading text-center mb-50">
                    <h2 class="section__heading--maintitle">You may also like</h2>
                </div>
                <div class="product__section--inner product__swiper--column4__activation swiper">
                    <div class="swiper-wrapper">
                         <?php
                        
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
                        <?php } ?>
                    </div>
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </div>
        </section>
    <?php } ?>
        <!-- End product section -->

       <?php $this->load->view('bottom-sec'); ?>
    </main>

 <?php $this->load->view('footer'); ?>
 <script>
    $(document).on("click", ".color_value, .size_value",(function(e) {
          image_filter();
    }));



        var color_val = 0;
        var size_val = 0;

    function image_filter()
    {
        $(".color_value:checked").each(function(){
                color_val = $(this).val();
        });
        $(".size_value:checked").each(function(){
                size_val = $(this).val();
        });

        var data_fields = ``;
        data_fields = data_fields.concat(`&p_id=`+<?=$EDITDATA[0]->id ?>);
        data_fields = data_fields.concat(`&size_id=`+size_val);
        data_fields = data_fields.concat(`&color_id=`+color_val);


        var  data_send_fields = data_fields;
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo base_url('welcome/image_by_colorsize'); ?>", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = () => { 
            var response = JSON.parse(xhr.responseText);  
            $('#image-fetch').html(response.data);
            $('#image-fetch2').html(response.data2);
            $('#price').html(response.price.price);
            $('#cut_price').html(response.price.cut_price);
            
            console.log(response);
        }
        xhr.send(data_send_fields);

    }


  
    image_filter();

         $(document).on("click", ".singleaddtocart",(function(e) {
          event.preventDefault();
          if(color_val>0 && size_val>0)
          {
              var p_id = <?=$EDITDATA[0]->id ?>;
              var quantity = $("#quantity").val();
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
          }
          else
          {
            alert("Please select color and size...");
          }

        }));
    </script>