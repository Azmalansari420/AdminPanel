<?php 
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Invoice </title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;900&display=swap');
		
		:root {
		  --primary: #0000ff;
		  --secondary: #3d3d3d; 
		  --white: #fff;
		}

		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Lato', sans-serif;
		}

		body{
			background: var(--secondary);
			padding: 50px;
			color: var(--secondary);
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 14px;
		}

		.bold{
			font-weight: 900;
		}

		.light{
			font-weight: 100;
		}

		.wrapper{
			background: var(--white);
			padding: 30px;
		}

		.invoice_wrapper{
			border: 3px solid var(--primary);
			width: 700px;
			max-width: 100%;
		}

		.invoice_wrapper .header .logo_invoice_wrap,
		.invoice_wrapper .header .bill_total_wrap{
			display: flex;
			justify-content: space-between;
			padding: 20px;
		}

		.invoice_wrapper .header .logo_sec{
			display: flex;
			align-items: center;
		}

		.invoice_wrapper .header .logo_sec .title_wrap{
			margin-left: 5px;
		}

		.invoice_wrapper .header .logo_sec .title_wrap .title{
			text-transform: uppercase;
			font-size: 18px;
			color: var(--primary);
		}

		.invoice_wrapper .header .logo_sec .title_wrap .sub_title{
			font-size: 12px;
		}

		.invoice_wrapper .header .invoice_sec,
		.invoice_wrapper .header .bill_total_wrap .total_wrap{
			text-align: right;
		}

		.invoice_wrapper .header .invoice_sec .invoice{
			font-size: 28px;
			color: var(--primary);
		}

		.invoice_wrapper .header .invoice_sec .invoice_no,
		.invoice_wrapper .header .invoice_sec .date{
			display: flex;
			width: 100%;
		}

		.invoice_wrapper .header .invoice_sec .invoice_no span:first-child,
		.invoice_wrapper .header .invoice_sec .date span:first-child{
			width: 70px;
			text-align: left;
		}

		.invoice_wrapper .header .invoice_sec .invoice_no span:last-child,
		.invoice_wrapper .header .invoice_sec .date span:last-child{
			width: calc(100% - 70px);
		}

		.invoice_wrapper .header .bill_total_wrap .total_wrap .price,
		.invoice_wrapper .header .bill_total_wrap .bill_sec .name{
			color: var(--primary);
			font-size: 20px;
		}

		.invoice_wrapper .body .main_table .table_header{
			background: var(--primary);
		}

		.invoice_wrapper .body .main_table .table_header .row{
			color: var(--white);
			font-size: 18px;
			border-bottom: 0px;	
		}

		.invoice_wrapper .body .main_table .row{
			display: flex;
			border-bottom: 1px solid var(--secondary);
		}

		.invoice_wrapper .body .main_table .row .col{
			padding: 10px;
		}
		.invoice_wrapper .body .main_table .row .col_no{width: 5%;}
		.invoice_wrapper .body .main_table .row .col_des{width: 25%;}
		.invoice_wrapper .body .main_table .row .col_price{width: 21%; text-align: -webkit-match-parent;}
		.invoice_wrapper .body .main_table .row .col_qty{width: 10%; text-align: center;}
		.invoice_wrapper .body .main_table .row .col_total{width: 20%; text-align: right;}

		.invoice_wrapper .body .paymethod_grandtotal_wrap{
			display: flex;
			justify-content: space-between;
			padding: 20px 0 30px;
			align-items: flex-end;
		}

		.invoice_wrapper .body .paymethod_grandtotal_wrap .paymethod_sec{
			padding-left: 30px;
		}

		.invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec{
			width: 40%;
		}

		.invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p{
			display: flex;
			width: 100%;
			padding-bottom: 5px;
		}

		.invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span{
			padding: 0 10px;
		}

		.invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:first-child{
			width: 60%;
		}

		.invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:last-child{
			width: 40%;
			text-align: right;
		}

		.invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p:last-child span{
			background: var(--primary);
			padding: 10px;
			color: #fff;
		}

		.invoice_wrapper .footer{
			padding: 30px;
		}

		.invoice_wrapper .footer > p{
			color: var(--primary);
			text-decoration: underline;
			font-size: 18px;
			padding-bottom: 5px;
		}

		.invoice_wrapper .footer .terms .tc{
			font-size: 16px;
		}
		@media print {
		  body * {
		    visibility: hidden;
		  }
		  #section-to-print, #section-to-print * {
		    visibility: visible;
		  }
		  #section-to-print {
		    position: absolute;
		    left: 0px;
		    top: 0;
		  }
		}
		button.btn.btn-dark {
		    padding: 10px;
		    position: relative;
		    top: 0px;
		}
	</style>
</head>
<body>

<button type="button" class="btn btn-dark" onclick="window.print()"><i class="fa fa-print"></i> Print</button>

<div class="wrapper" id="section-to-print">
	<div class="invoice_wrapper">
		<div class="header">
			<div class="logo_invoice_wrap">
				<div class="logo_sec">
					<img src="<?php echo base_url(); ?>media/uploads/site_setting/<?php echo $sitesetting[0]->logo; ?>" alt="code logo" style="width: 135px;padding: 8px;">
				</div>
				<div class="invoice_sec">
					<p class="invoice bold">INVOICE</p>
					<p class="invoice_no">
						<span class="bold">Oredr ID :- </span>
						<span><?php echo $EDITDATA[0]->order_id; ?></span>
					</p>
					
				</div>
			</div>
			<div class="bill_total_wrap">
				<div class="bill_sec">
					<p class="bold name">SHIPPING ADDRESS</p> 
	          		<p><?php echo $EDITDATA[0]->f_name; ?> <?php echo $EDITDATA[0]->l_name; ?></p>
			        <span>
			          <?php echo $EDITDATA[0]->mobile; ?><br>
			          <?php echo $EDITDATA[0]->house_str_no; ?> <?php echo $EDITDATA[0]->city; ?>  <?php echo $EDITDATA[0]->state; ?>  <?php echo $EDITDATA[0]->pincode; ?> <?php echo $EDITDATA[0]->country; ?>
			        </span>
				</div>
			
			</div>
		</div>
		<div class="body">
			<div class="main_table">
				<div class="table_header">
					<div class="row">
						<div class="col col_des">Product Image</div>
						<div class="col col_price">Product Name</div>
						<div class="col col_price">Price</div>
						<div class="col col_qty">Qty</div>
						<div class="col col_total">Total</div>
					</div>
				</div>



				<div class="table_body">
					<?php
					$order = $this->crud->selectDataByMultipleWhere('orders',array('order_id'=>$EDITDATA[0]->order_id,));
					foreach($order as $data)
						{
							$coupon = $this->crud->selectDataByMultipleWhere('order_coupon',array('user_id'=>$EDITDATA[0]->user_id,'order_id'=>$EDITDATA[0]->order_id));

							$product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$data->p_id,));
							$allimage = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$data->p_id,'size_id'=>$data->size_id,'color_id'=>$data->color_id,));

							$color_id = 0;
                            $this->db->group_by('color_id');
                            $this->db->limit(1);
                            $this->db->select("color_id");
                            $color = $this->db->get_where('all_images',array('p_id'=>$data->p_id,'color_id'=>$data->color_id))->result_object();
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
                            $color = $this->db->get_where('all_images',array('p_id'=>$data->p_id,'size_id'=>$data->size_id,))->result_object();
                            if(!empty($color))
                            {
                                foreach ($color as $key => $value4) 
                                { 
                                    $size_id = $value4->size_id;
                                    break;
                                } 
                            }

						?>
					<div class="row">						
						<div class="col col_des">
               				<img src="<?php echo base_url(); ?>media/uploads/product/<?php echo $allimage[0]->image; ?>" alt="full-image" style="height: 125px">
						</div>
						<div class="col col_price">
							<p><?php echo $product[0]->name; ?></p>
							<strong>Color:- <?php echo colorname($color_id); ?></strong><br>
							<strong>Size:- <?php echo sizename($size_id); ?></strong>
						</div>
						<div class="col col_price">
							<p>₹ <?php echo number_format($allimage[0]->price,2); ?></p>
						</div>
						<div class="col col_qty">
							<p><?php echo $data->quantity; ?></p>
						</div>
						<div class="col col_total">
							<p>₹ <?php echo number_format($data->quantity*$allimage[0]->price,2); ?></p>
						</div>
					</div>
				<?php } ?>
			
				</div>

				<div class="paymethod_grandtotal_wrap">
                <div class="paymethod_sec">
                    <!-- <p class="bold">Payment Method</p>
                    <p>Visa, master Card and We accept Cheque</p> -->
                </div>
                <div class="grandtotal_sec">
                    <p class="bold">
                        <span>SUB TOTAL</span>
                        <span>₹ <?php echo number_format($EDITDATA[0]->sub_total,2); ?></span>
                    </p>
                    <p class="bold">
                        <span>Shipping Charge:</span>
                        <span>+₹ <?php echo number_format($EDITDATA[0]->shipping_charge,2); ?></span>
                    </p>
                     <?php
                    if(!empty($coupon))
                        {
                        	$couponamout = $EDITDATA[0]->finalprice-$EDITDATA[0]->after_discount_final_price;
                        	// print_r($couponamout);
                         ?>
                    <p class="bold">
                        <span> Apply Coupon:</span>
                        <span>-₹ <?php echo number_format($couponamout,2); ?></span>
                    </p>
                <?php } ?>
                    <p class="bold">
                        <span>Grand Total</span>
                        <span>₹ <?php echo number_format($EDITDATA[0]->after_discount_final_price,2); ?></span>
                    </p>
                </div>
            </div>			
        </div>


		
		<div class="footer">
			<p>Thank you and Best Wishes</p>
			<!-- <div class="terms">
		        <p class="tc bold">Terms & Coditions</p>
		        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit non praesentium doloribus. Quaerat vero iure itaque odio numquam, debitis illo quasi consequuntur velit, explicabo esse nesciunt error aliquid quis eius!</p>
		    </div> -->
		</div>
	</div>
</div>


</body>
</html>