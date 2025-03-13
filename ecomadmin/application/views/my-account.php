<?php 
    $user = $this->crud->selectDataByMultipleWhere('registration',array('id'=>$this->session->userdata("userdashboard"),));

    // print_r($user);
?>

<?php $this->load->view('header'); ?>
<style>

    li.pagination__list>strong {
        display: inline-block;
        width: 4rem;
        height: 4rem;
        line-height: 3.8rem;
        background: var(--secondary-color);
        border-color: var(--secondary-color);
        color: var(--white-color);
        font-size: 1.6rem;
        font-weight: 600;
        text-align: center;
        border-radius: 50%;
        border: 1px solid var(--border-color2);
    }

    .center>strong:hover {
    background-color: #ddd;
    }

li.pagination__list>a
{
    display: inline-block;
        width: 4rem;
        height: 4rem;
        line-height: 3.8rem;
        background: white;
        border-color: var(--secondary-color);
        color: black;
        font-size: 1.6rem;
        font-weight: 600;
        text-align: center;
        border-radius: 50%;
        border: 1px solid var(--border-color2);
}

</style>
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
                            <li class="account__menu--list active"><a href="<?php echo base_url('my-account'); ?>">Dashboard</a></li>
                            <li class="account__menu--list "><a href="<?php echo base_url('user-profile'); ?>">Setting</a></li>
                            <li class="account__menu--list"><a href="<?php echo base_url('wishlist'); ?>">Wishlist</a></li>
                            <li class="account__menu--list"><a href="<?php echo base_url('user/userlogout'); ?>">Log Out</a></li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        <div class="account__content">
                            <h2 class="account__content--title h3 mb-20">Orders History</h2>
                            <div class="account__table--area">
                                <table class="account__table">
                                    <thead class="account__table--header">
                                        <tr class="account__table--header__child">
                                            <th class="account__table--header__child--items">#</th>
                                            <th class="account__table--header__child--items">Order ID</th>
                                            <th class="account__table--header__child--items">Product Image</th>
                                            <th class="account__table--header__child--items">Product Name</th>
                                            <th class="account__table--header__child--items">Price</th>             
                                            <th class="account__table--header__child--items">View</th>             
                                        </tr>
                                    </thead>
                                    <tbody class="account__table--body mobile__none">

                                        <?php 
                                        $i=0;
                                       
                                        foreach($temp as $data)
                                            { $i++;
                                                $orders = $this->crud->selectDataByMultipleWhere('orders',array('order_id'=>$data->order_id,));   
                                                $product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$orders[0]->p_id,)); 
                                                                                   
                                        ?>
                                        
                                        <tr class="account__table--body__child">
                                            <td class="account__table--body__child--items"><?php echo $i; ?></td>
                                            <td class="account__table--body__child--items"><?php echo $data->order_id; ?></td>
                                            <td class="account__table--body__child--items"><img src="<?php echo base_url(); ?>media/uploads/product/<?php echo $product[0]->thumb_img; ?>" style="height: 90px;"></td>
                                            <td class="account__table--body__child--items text-start"><?php echo $product[0]->name; ?></td>
                                            <td class="account__table--body__child--items">₹ <?php echo number_format($data->after_discount_final_price,2); ?></td>
                                            <td class="account__table--body__child--items">
                                                <a target="_blank" href="<?php echo base_url('userinvoice/'.$data->id); ?>" class="btn btn-primary">View</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                       
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>


                         <div class="pagination__area bg__gray--color">
                            <nav class="pagination justify-content-center">
                                <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                                    <li class="pagination__list"><?php echo $links; ?></li>                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                            
                       
                  
                </div>
            </div>
        </section>
        <!-- my account section end -->

        <?php $this->load->view('bottom-sec'); ?>

    </main>

<?php $this->load->view('footer'); ?>
