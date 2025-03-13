 <?php
 $sitesetting = $this->crud->fetchdatabyid('1','site_setting');
 $this->load->view('header'); 
 $coponapply = $this->db->get_where('order_coupon',array('user_id'=>temp_session_id(),"status"=>0,))->result_object();
$coupon = 0;
if(!empty($coponapply[0]->coupon)) 
{
    $coupon = $coponapply[0]->coupon;
}
$applied_coupon = applied_coupon($coupon,'');
 ?>

 <style>
     .product__thumbnail.border-radius-5.small-cart>a>img {
        height: 75px;
     }
 </style>


    <!-- Start checkout page area -->
    <div class="checkout__page--area">
        <div class="container">
            <div class="checkout__page--inner d-flex">
                <div class="main checkout__mian">


                    <header class="main__header checkout__mian--header">
                        <h1 class="main__logo--title checkout"><a class="logo logo__left" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>media/uploads/site_setting/<?php echo $sitesetting[0]->logo; ?>" alt="logo" style="height: 90px;"></a></h1>
                        <details class="order__summary--mobile__version">
                            <summary class="order__summary--toggle border-radius-5">
                                <span class="order__summary--toggle__inner">
                                    <span class="order__summary--toggle__icon">
                                        <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <span class="order__summary--toggle__text show">
                                        <span>Show order summary</span>
                                        <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="currentColor"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path></svg>
                                    </span>
                                    <span class="order__summary--final__price"><?=number_format($applied_coupon['after_discount_final_price'],2) ?></span>
                                </span>
                            </summary>
                            <div class="order__summary--section">
                                <div class="cart__table checkout__product--table">
                                    <table class="summary__table">
                                        <tbody class="summary__table--body">
                                        <?php
                                        $product_total = 0;
                                        $sub_total = 0; 
                                        $shipping_charge = shippingcharge;
                                        $this->db->order_by('id desc');
                                        $cartpro = $this->crud->selectDataByMultipleWhere('add_to_temp_cart',array('temp_user_id'=>temp_session_id()));
                                        foreach ($cartpro as $key => $value) 
                                        {
                                            $price = 0;
                                            $this->db->group_by('price');
                                            $this->db->limit(1);
                                            $this->db->select("price");
                                            $price = $this->db->get_where('all_images',array('p_id'=>$value->p_id,'size_id'=>$value->size_id,'color_id'=>$value->color_id,))->result_object();
                                            if(!empty($price))
                                            {
                                                foreach ($price as $key => $value2) 
                                                { 
                                                    $price = $value2->price;
                                                    break;
                                                } 
                                            }
                                            $color_id = 0;
                                            $this->db->group_by('color_id');
                                            $this->db->limit(1);
                                            $this->db->select("color_id");
                                            $color = $this->db->get_where('all_images',array('p_id'=>$value->p_id,'color_id'=>$value->color_id,))->result_object();
                                            if(!empty($color))
                                            {
                                                foreach ($color as $key => $value3) 
                                                { 
                                                    $color_id = $value3->color_id;
                                                    break;
                                                } 
                                            }
                                            $size_id = 0;
                                            $this->db->group_by('size_id');
                                            $this->db->limit(1);
                                            $this->db->select("size_id");
                                            $color = $this->db->get_where('all_images',array('p_id'=>$value->p_id,'size_id'=>$value->size_id))->result_object();
                                            if(!empty($color))
                                            {
                                                foreach ($color as $key => $value4) 
                                                { 
                                                    $size_id = $value4->size_id;
                                                    break;
                                                } 
                                            }


                                            $product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$value->p_id,));
                                            $image = json_decode($product[0]->image);
                                            if(!empty($image))
                                            {
                                                $showimage = $image[0];
                                            }
                                            else
                                            {
                                                $showimage = '';
                                            }
                                            $product_total = $price*$value->quantity;
                                            $sub_total += $product_total;
                                            $finalprice = $sub_total+$shipping_charge;



                                        ?>
                                            <tr class=" summary__table--items">
                                                <td class=" summary__table--list">
                                                    <div class="product__image two  d-flex align-items-center">
                                                        <div class="product__thumbnail border-radius-5 small-cart">
                                                            <a href="<?php echo base_url('product-details/'.$product[0]->slug); ?>"><img class="border-radius-5" src="<?php echo base_url(); ?>media/uploads/product/<?php echo $product[0]->thumb_img; ?>" alt="cart-product"></a>
                                                            <span class="product__thumbnail--quantity"><?php echo $value->quantity; ?></span>
                                                        </div>
                                                        <div class="product__description">
                                                            <h3 class="product__description--name h4"><a href="<?php echo base_url('product-details/'.$product[0]->slug); ?>">
                                                                <?php echo $product[0]->name; ?>
                                                            </a></h3>
                                                            <span class="cart__content--variant">Color: <?php echo colorname($color_id); ?></span>
                                                            <span class="cart__content--variant">Size: <?php echo sizename($size_id); ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class=" summary__table--list">
                                                    <span class="cart__price">₹ <?php echo number_format($product_total,2); ?></span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> 
                                </div>

                                <div class="checkout__discount--code">
                                    <form class="d-flex" action="<?php echo base_url('checkout/couponcode'); ?>" method="post">
                                        <label>
                                            <input class="checkout__discount--code__input--field border-radius-5" placeholder="Gift card or discount code"  type="text" name="coupon" value="<?php if(!empty($coponapply[0]->coupon)) echo $coponapply[0]->coupon; ?>">
                                        </label>
                                        <button class="checkout__discount--code__btn primary__btn border-radius-5" name="submit" type="submit">Apply</button>
                                        <?php if(!empty($coponapply[0]->coupon))
                                        { ?>
                                        <a href="<?php echo base_url('checkout/delete_coupon'); ?>" class="checkout__discount--code__btn danger__btn border-radius-5" name="submit" type="submit">Remove</a>
                                    <?php } ?>
                                    </form>
                                </div>

                                <div class="checkout__total">
                                    <table class="checkout__total--table">
                                        <tbody class="checkout__total--body">
                                            <tr class="checkout__total--items">
                                                <td class="checkout__total--title text-left">Subtotal </td>
                                                <td class="checkout__total--amount text-right">₹ ₹ <?php echo number_format($applied_coupon['sub_total'],2); ?></td>
                                            </tr>
                                            <tr class="checkout__total--items">
                                                <td class="checkout__total--title text-left">Shipping Charge </td>
                                                <td class="checkout__total--amount text-right">+₹ <?php echo number_format($applied_coupon['shipping_charge'],2); ?></td>
                                            </tr>
                                            <?php if($applied_coupon['discount_amount']>0){ ?>
                                            <tr class="checkout__total--items">
                                                <td class="checkout__total--title text-left">Coupon Discount (<?php if($applied_coupon['type']==1)echo $applied_coupon['discount'].'%'; else echo 'Flat' ?>)</td>
                                                <td class="checkout__total--amount text-right">-₹ <?php echo number_format($applied_coupon['discount_amount'],2); ?></td>
                                            </tr>
                                        <?php  } ?>
                                        </tbody>
                                        <tfoot class="checkout__total--footer">
                                            <tr class="checkout__total--footer__items">
                                                <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                                <td class="checkout__total--footer__amount checkout__total--footer__list text-right">₹ <?=number_format($applied_coupon['after_discount_final_price'],2) ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </details>

                    </header>

                    <main class="main__content_wrapper">
                        <form action="<?php echo base_url('checkout/final_cart'); ?>" method="post">
                           
                            <div class="checkout__content--step section__shipping--address">
                                <div class="section__header mb-25">
                                    <h3 class="section__header--title">Shipping address</h3>
                                </div>
                                <div class="section__shipping--address__content">
                                    <div class="row">
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list ">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="First name"  type="text" name="f_name">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Last name"  type="text" name="l_name">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Company (optional)"  type="text" name="compony_name">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-12">
                                            <div class="checkout__input--list checkout__input--select select">
                                                <label class="checkout__select--label" for="country">Country/region</label>
                                                <select class="checkout__input--select__field border-radius-5" id="country" name="country">
                                                    <option value="India">India</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="House number and street name"  type="text" name="house_str_no">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Apartment, suite, unit, etc. (optional)"  type="text" name="apartment">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Town / City *"  type="text" name="city">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="State *"  type="text" name="state">
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="PIN Code *"  type="text" name="pincode">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Phone *"  type="text" name="mobile">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Email address *"  type="text" name="email">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-12">
                                            <textarea class="checkout__input--field border-radius-5" rows="5" placeholder="Order Notes" style="height: 100%;" name="order_note"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__content--step__footer d-flex align-items-center">
                                <button class="continue__shipping--btn primary__btn border-radius-5" type="submit" name="submit">Place Order</button>
                                <a class="previous__link--content" href="<?php echo base_url('cart'); ?>">Return to cart</a>
                            </div>
                        </form>
                    </main>

                    <footer class="main__footer checkout__footer">
                        <p class="copyright__content"></p>
                    </footer>
                </div>

                <aside class="checkout__sidebar sidebar">
                    <div class="cart__table checkout__product--table">
                        <table class="cart__table--inner">
                            <tbody class="cart__table--body">
                               <?php                              

                                $sub_total = 0; 
                                $product_total = 0;
                                $shipping_charge = shippingcharge;
                                $this->db->order_by('id desc');
                                $cartpro = $this->crud->selectDataByMultipleWhere('add_to_temp_cart',array('temp_user_id'=>temp_session_id()));
                                foreach ($cartpro as $key => $value) 
                                {
                                    $product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$value->p_id,));

                                    $price = 0;
                                    $this->db->group_by('price');
                                    $this->db->limit(1);
                                    $this->db->select("price");
                                    $price = $this->db->get_where('all_images',array('p_id'=>$value->p_id,'color_id'=>$value->color_id,'size_id'=>$value->size_id,))->result_object();
                                    if(!empty($price))
                                    {
                                        foreach ($price as $key => $value2) 
                                        { 
                                            $price = $value2->price;
                                            break;
                                        } 
                                    }
                                    $color_id = 0;
                                    $this->db->group_by('color_id');
                                    $this->db->limit(1);
                                    $this->db->select("color_id");
                                    $color = $this->db->get_where('all_images',array('p_id'=>$value->p_id,'color_id'=>$value->color_id,))->result_object();
                                    if(!empty($color))
                                    {
                                        foreach ($color as $key => $value3) 
                                        { 
                                            $color_id = $value3->color_id;
                                            break;
                                        } 
                                    }
                                    $size_id = 0;
                                    $this->db->group_by('size_id');
                                    $this->db->limit(1);
                                    $this->db->select("size_id");
                                    $color = $this->db->get_where('all_images',array('p_id'=>$value->p_id,'size_id'=>$value->size_id,))->result_object();
                                    if(!empty($color))
                                    {
                                        foreach ($color as $key => $value4) 
                                        { 
                                            $size_id = $value4->size_id;
                                            break;
                                        } 
                                    }


                                    $image = json_decode($product[0]->image);
                                    if(!empty($image))
                                    {
                                        $showimage = $image[0];
                                    }
                                    else
                                    {
                                        $showimage = '';
                                    }
                                    $product_total = $price*$value->quantity;
                                    $sub_total += $product_total;
                                    $finalprice = $sub_total+$shipping_charge;

                                ?>
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="product__image two  d-flex align-items-center">
                                            <div class="product__thumbnail border-radius-5">
                                                <a href="<?php echo base_url('product-details/'.$product[0]->slug); ?>"><img class="border-radius-5" src="<?php echo base_url(); ?>media/uploads/product/<?php echo $product[0]->thumb_img; ?>" alt="cart-product"></a>
                                                <span class="product__thumbnail--quantity"><?php echo $value->quantity; ?></span>
                                            </div>
                                            <div class="product__description">
                                                <h3 class="product__description--name h4"><a href="<?php echo base_url('product-details/'.$product[0]->slug); ?>"><?php echo $product[0]->name; ?></a></h3>
                                                <span class="cart__content--variant">Color: <?php echo colorname($color_id); ?></span>
                                                <span class="cart__content--variant">Size: <?php echo sizename($size_id); ?></span>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">₹ <?php echo number_format($product_total,2); ?></span>
                                    </td>
                                </tr>
                            <?php } ?>


                            </tbody>
                        </table> 
                    </div>
                    <p><?php echo $this->session->flashdata('coupon_mesg'); ?></p>

                    
                    <div class="checkout__discount--code">
                        <form class="d-flex" action="<?php echo base_url('checkout/couponcode'); ?>" method="post">
                            <label>
                                <input class="checkout__discount--code__input--field border-radius-5" placeholder="Gift card or discount code"  type="text" name="coupon" value="<?php if(!empty($coponapply[0]->coupon)) echo $coponapply[0]->coupon; ?>">
                            </label>
                            <button class="checkout__discount--code__btn primary__btn border-radius-5" name="submit" type="submit">Apply</button>
                            <?php if(!empty($coponapply[0]->coupon))
                            { ?>
                            <a href="<?php echo base_url('checkout/delete_coupon'); ?>" class="checkout__discount--code__btn danger__btn border-radius-5" name="submit" type="submit">Remove</a>
                        <?php } ?>
                        </form>
                    </div>


                    <div class="checkout__total">
                        <table class="checkout__total--table">
                            <tbody class="checkout__total--body">
                                <tr class="checkout__total--items">
                                    <td class="checkout__total--title text-left">Subtotal </td>
                                    <td class="checkout__total--amount text-right">₹ <?php echo number_format($applied_coupon['sub_total'],2); ?></td>
                                </tr>
                                <tr class="checkout__total--items">
                                    <td class="checkout__total--title text-left">Shipping Charge </td>
                                    <td class="checkout__total--amount text-right">+₹ <?php echo number_format($applied_coupon['shipping_charge'],2); ?></td>
                                </tr>
                                <?php if($applied_coupon['discount_amount']>0){ ?>
                                <tr class="checkout__total--items">
                                    <td class="checkout__total--title text-left">Coupon Discount (<?php if($applied_coupon['type']==1)echo $applied_coupon['discount'].'%'; else echo 'Flat' ?>)</td>
                                    <td class="checkout__total--amount text-right">-₹ <?php echo number_format($applied_coupon['discount_amount'],2); ?></td>
                                </tr>
                            <?php  } ?>
                            </tbody>
                            <tfoot class="checkout__total--footer">
                                <tr class="checkout__total--footer__items">
                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right">₹ <?php echo number_format($applied_coupon['after_discount_final_price'],2); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!-- End checkout page area -->
 <?php $this->load->view('footer'); ?>
