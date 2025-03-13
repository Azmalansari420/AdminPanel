<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	

	public function userinvoice()
	{
		$args=func_get_args();  //get id
		$data['EDITDATA']= $this->crud->fetchdatabyid($args[0],'finalorder');
		$this->load->view('userinvoice',$data);
	}

	public function all_product()
	{
		$this->load->view('all-product');
	}

	public function checkout()
	{
		$this->session->set_userdata(array("redirect_url"=>base_url('checkout'),));
		chech_user_login();
		$this->load->view('checkout');
	}


	public function shop($id='')
	{
		
		if(!empty($id))
		{
			$categories = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));

			$data['EDITDATA'] = $slugdata = $this->crud->selectDataByMultipleWhere('sub_categories',array('slug'=>$id,));
			if(!empty($slugdata))
			{
				$slugdata = $slugdata[0];
				$sub_cate_id = $slugdata->id;
				$where = array("sub_cat_id"=>$sub_cate_id,"status"=>1);
			}
			else
			{
				$data['EDITDATA'] = $slugdata = $this->crud->selectDataByMultipleWhere('categories',array('slug'=>$id,));
				$slugdata = $slugdata[0];
				$sub_cate_id = $slugdata->id;
				$where = array("cat_id"=>$sub_cate_id,"status"=>1,);
			}
		}
		else
		{
			$where = array("status"=>1,);
		}

		$this->db->order_by('id desc');
		$productlist = $this->crud->selectDataByMultipleWhere('product',$where);
		$data['productlist'] = $productlist; 
		$this->load->view('shop',$data);
	}

	public function serch()
	{
		$search = $this->input->get("search");
		$cat_id = $this->input->get("cat_id");
		$this->db->from('product');
		$this->db->like('name', $search);
		$this->db->like('cat_id',$cat_id);
		$query = $this->db->get()->result_object();
		$data['productlist'] = $query;
		// print_r($query);
		$this->load->view('shop',$data);

	}


	public function product_details($id)
	{
		$data['EDITDATA'] = $slugdata = $this->crud->selectDataByMultipleWhere('product',array('slug'=>$id,));
		$slugid = $slugdata[0]->id;
		$this->load->view('product-details',$data);
	}

	public function blog_details($id)
	{
		$data['EDITDATA'] = $slugdata = $this->crud->selectDataByMultipleWhere('blog',array('slug'=>$id,));
		$slugid = $slugdata[0]->id;
		$this->load->view('blog-details',$data);
	}









	// -------model view----------
	public function modelviews()
	{	

		$id = $this->input->post('id');

		$property = $this->db->get_where('product',array('id'=>$id,))->result_object();
		$property = $property[0];

		$color_id = 0;
        $this->db->group_by('color_id');
        $this->db->limit(1);
        $this->db->select("color_id");
        $color = $this->db->get_where('all_images',array('p_id'=>$id,))->result_object();
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
        $color = $this->db->get_where('all_images',array('p_id'=>$id,))->result_object();
        if(!empty($color))
        {
            foreach ($color as $key => $value4) 
            { 
                $size_id = $value4->size_id;
                break;
            } 
        }

		$this->db->group_by('p_id');
		$allimage = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$id,'color_id'=>$color_id,'size_id'=>$size_id));



		$rating_html = '';
		$color_html = '';
		$size_html = '';
		$image_html = '';

		$i = 0;
		while($i<5)
		{
			if($i<$property->rating)
				$rating_html .= '<li class="rating__list">
	                                <span class="rating__list--icon">
	                                    <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
	                                    <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
	                                    </svg>
	                                </span>
	                            </li>';
			else
				$rating_html .= '';
			$i++;
		}		

		$colors = explode(",",$property->color_id);
		if(!empty($colors))
		{
			foreach ($colors as $key => $value) 
			{
				$get_color = $this->db->get_where("color",array("id"=>$value,))->result_object();
				if(!empty($get_color))
				{
					$get_color = $get_color[0];
					$color_html .= '<input id="color'.$key.'" name="color" type="radio" checked><label class="variant__color--value" for="color'.$key.'" title="'.$get_color->name.'" style="background-color: '.$get_color->color_code.';"></label>';
				}
			}
		}

		$size = explode(",",$property->size_id);
		if(!empty($size))
		{
			foreach ($size as $key => $value) 
			{
				$get_size = $this->db->get_where("size",array("id"=>$value,))->result_object();
				if(!empty($get_size))
				{
					$get_size = $get_size[0];
					$size_html .= '<label class="variant__size--value" for="size'.$key.'">'.$get_size->name.'</label><input id="size'.$key.'" name="size" type="radio" checked>';
				}
			}
		}

		$images = $property->thumb_img;
		if(!empty($images))
		{
			// foreach ($images as $key => $value) 
			// {
			// 	if($key==0)break;
				$image_html .=  '<div class="quickview__product--media product__details--media">
                            <div class="product__media--preview  swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="'.base_url().''.'media/uploads/product/'.''.$images.'"><img class="product__media--preview__items--img" src="'.base_url().''.'media/uploads/product/'.''.$images.'" alt="product-media-img"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
			// }
		}

		$html = array(
			"image"=>$property->image,
			"name"=>$property->name,
			"rating"=>$rating_html,
			"original_price"=>$allimage[0]->price,
			"cut_price"=>$allimage[0]->cut_price,
			"small_info"=>$property->small_info,
			"color_id"=>$color_html,
			"size_id"=>$size_html,
			"image"=>$image_html,
		);
		$data['status'] = "200";
		$data['data'] = $html;	
		echo json_encode($data);
	}









	public function all($page)
	{
		$data = array();		
		$check_page = FCPATH.'application/views/'.$page.'.php';
		if(file_exists($check_page))
		{
			$this->load->view($page,$data);
		}
		else
		{
			$this->load->view('error');
		}
		
	}






	function image_by_colorsize()
    {
        $result = array();        
        $user_data = array();        
        $p_id = $this->input->post("p_id");
        $size_id = $this->input->post("size_id");
        $color_id = $this->input->post("color_id");
        $rowd = array();
        if(!empty($p_id) && !empty($size_id) && !empty($color_id))
        {
            $where = array(
                    "p_id"=>$p_id,
                    "size_id"=>$size_id,
                    "color_id"=>$color_id,
                );
            $rowd = $this->db->get_where("all_images",$where)->result_object();
        }
        
       
        $image_html = '';
        $image_html2 = '';
        $price = '';
		foreach($rowd as $row)
        {
        	$video = $this->db->get_where('product',array('id'=>$row->p_id))->result_object();
			$image_html .=  '<div class="swiper-slide">
                                <div class="product__media--preview__items">
                                    <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="'.base_url().''.'media/uploads/product/'.''.$row->image.'"><img class="product__media--preview__items--img" src="'.base_url().''.'media/uploads/product/'.''.$row->image.'" alt="product-media-img"></a>
                                    <div class="product__media--view__icon">
                                        <a class="product__media--view__icon--link glightbox" href="'.base_url().''.'media/uploads/product/'.''.$row->image.'" data-gallery="product-media-preview">
                                            <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                        </a>
                                    </div>
                                    
                                    <div class="product__media--view__icon media__play">
                                        <a class="media__play--icon__link glightbox" data-gallery="video" target="_blank" href="'.$video[0]->video_link.'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" width="35.51" height="35.443" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="visually-hidden">play</span>
                                        </a>
                                    </div>
                              
                                </div>
                            </div>';

          $image_html2 .= '
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="'.base_url().''.'media/uploads/product/'.''.$row->image.'" alt="product-nav-img">
                                        </div>
                                    </div>
                               

                                 <script>
                                    function swiper_new()
									    {
									        swiper = new Swiper(".product__media--nav", {
									            loop: !0,
									            spaceBetween: 10,
									            slidesPerView: 5,
									            freeMode: !0,
									            watchSlidesProgress: !0,
									            breakpoints: {
									                768: {
									                    slidesPerView: 5
									                },
									                480: {
									                    slidesPerView: 4
									                },
									                320: {
									                    slidesPerView: 3
									                },
									                200: {
									                    slidesPerView: 2
									                },
									                0: {
									                    slidesPerView: 1
									                }
									            },
									            navigation: {
									                nextEl: ".swiper-button-next",
									                prevEl: ".swiper-button-prev"
									            }
									        });
									        swiper2 = new Swiper(".product__media--preview", {
									            loop: !0,
									            spaceBetween: 10,
									            thumbs: {
									                swiper: swiper
									            }
									        });
									    }
									    swiper_new();</script>';
			
		}       

		$price = array(
			"price"=>$row->price,
			"cut_price"=>$row->cut_price,
		);


        if(!empty($image_html))
        {
            $result['message'] = "data fetch successfully";
            $result['status']  = "200";
            $result['data']    = $image_html;
            $result['data2']    = $image_html2;
            $result['price']    = $price;
        }

        else
            {
                $result['message'] = "data not fetch";
                $result['status']  = "400";
                $result['data']    = $image_html;
                $result['data2']    = $image_html2;
                $result['price']    = $price;
            }

        echo json_encode($result);
    }




















	public function enquiry_form()
	{
		if(isset($_POST['submit']))
		{
			$data2['name'] = $this->input->post('name');
			$data2['email'] = $this->input->post('email');
			$data2['mobile'] = $this->input->post('mobile');
			$data2['subject'] = $this->input->post('subject');
			$data2['message'] = $this->input->post('message');

			$this->crud->insert('contact',$data2);
			$this->session->set_flashdata('message','<div class="alert alert-success">Form has been successfully Sent.</div>');			

			redirect($_SERVER['HTTP_REFERER']);
		}
	}






	// public function contact()
	// {
	// 	if(isset($_POST['submit']))
	// 	{
	// 		$data2['name'] = $this->input->post('name');
	// 		$data2['email'] = $this->input->post('email');
	// 		$data2['mobile'] = $this->input->post('mobile');
	// 		$data2['subject'] = $this->input->post('subject');
	// 		$data2['regarding'] = $this->input->post('regarding');
	// 		$data2['message'] = $this->input->post('message');

	// 		$this->crud->insert('contact',$data2);

	// 		$message = '
	// 		 <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
	// 		    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"font-family: sans-serif;">
	// 		        <tr>
	// 		            <td>
	// 		                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
	// 		                    align="center" cellpadding="0" cellspacing="0">
	// 		                    <tr>
	// 		                        <td style="height:80px;">&nbsp;</td>
	// 		                    </tr>
	// 		                    <!-- Logo -->
	// 		                    <tr>
	// 		                        <td style="text-align:center;">
	// 		                          <a href="https://rakeshmandal.com" title="logo" target="_blank">
	// 		                            <img width="60" src="http://smartacademy.life/media/uploads/site_setting/hjh.png" title="logo" alt="logo">
	// 		                          </a>
	// 		                        </td>
	// 		                    </tr>
	// 		                    <tr>
	// 		                        <td style="height:20px;">&nbsp;</td>
	// 		                    </tr>
	// 		                    <!-- Email Content -->
	// 		                    <tr>
	// 		                        <td>
	// 		                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
	// 		                                style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
	// 		                                <tr>
	// 		                                    <td style="height:40px;">&nbsp;</td>
	// 		                                </tr>
	// 		                                <!-- Title -->
	// 		                                <tr>
	// 		                                    <td style="padding:0 15px; text-align:center;">
	// 		                                        <h1 style="color:#1e1e2d; font-weight:400; margin:0;font-size:32px;font-family:sans-serif;">Join us as a Trainee Form</h1>
	// 		                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; 
	// 		                                        width:100px;"></span>
	// 		                                    </td>
	// 		                                </tr>
	// 		                                <!-- Details Table -->
	// 		                                <tr>
	// 		                                    <td>
	// 		                                        <table cellpadding="0" cellspacing="0"
	// 		                                            style="width: 100%; border: 1px solid #ededed">
	// 		                                            <tbody>
	// 		                                                <tr>
	// 		                                                    <td
	// 		                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
	// 		                                                        Name:</td>
	// 		                                                    <td
	// 		                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
	// 		                                                        '.$_POST["name"].'</td>
	// 		                                                </tr>
	// 		                                                <tr>
	// 		                                                    <td
	// 		                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
	// 		                                                        Email:</td>
	// 		                                                    <td
	// 		                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
	// 		                                                        '.$_POST["email"].'</td>
	// 		                                                </tr>
	// 		                                                <tr>
	// 		                                                    <td
	// 		                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
	// 		                                                        Mobile:</td>
	// 		                                                    <td
	// 		                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
	// 		                                                        '.$_POST["mobile"].'</td>
	// 		                                                </tr>
	// 		                                                <tr>
	// 		                                                    <td
	// 		                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
	// 		                                                        Regarding:</td>
	// 		                                                    <td
	// 		                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
	// 		                                                        '.$_POST["regarding"].'</td>
	// 		                                                </tr>
	// 		                                                <tr>
	// 		                                                    <td
	// 		                                                        style="padding: 10px; border-bottom: 1px solid #ededed;border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
	// 		                                                       Subject:</td>
	// 		                                                    <td
	// 		                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
	// 		                                                        '.$_POST["subject"].'</td>
	// 		                                                </tr>
			                                                                                               
	// 		                                                <tr>
	// 		                                                    <td
	// 		                                                        style="padding: 10px; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)">
	// 		                                                        Message:</td>
	// 		                                                    <td style="padding: 10px; color: #455056;">'.$_POST["message"].'</td>
	// 		                                                </tr>
	// 		                                            </tbody>
	// 		                                        </table>
	// 		                                    </td>
	// 		                                </tr>
	// 		                                <tr>
	// 		                                    <td style="height:40px;">&nbsp;</td>
	// 		                                </tr>
	// 		                            </table>
	// 		                        </td>
	// 		                    </tr>
	// 		                    <tr>
	// 		                        <td style="height:20px;">&nbsp;</td>
	// 		                    </tr>
	// 		                    <tr>
	// 		                        <td style="text-align:center;">
	// 		                                <p style="font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;">&copy; <strong>http://smartacademy.life/</strong></p>
	// 		                        </td>
	// 		                    </tr>
	// 		                </table>
	// 		            </td>
	// 		        </tr>
	// 		    </table>
	// 		</body>
	// 		 ';


	// 	  $this->mail->sendmail($message);

	// 	  $this->session->set_flashdata('message','<div class="alert alert-success">Form has been successfully Submit.</div>');

	// 	}
	// 	$this->load->view('contact');
	// }




	// public function career_form()
	// {
	// 	if(isset($_POST['submit']))
	// 	{
	// 		if($_FILES['image']['name']!='')
	// 		{
	// 			$bimage = $_FILES['image']['name'];
	// 			$path = 'media/uploads/career/'.$bimage;
	// 			move_uploaded_file($_FILES['image']['tmp_name'],$path);
	// 		}
	// 		else
	// 		{
	// 			$bimage = "";
	// 		}
	// 		$data['image'] = $bimage;
	// 		$data['name'] = $this->input->post('name');			
	// 		$data['email'] = $this->input->post('email');			
	// 		$data['mobile'] = $this->input->post('mobile');			
	// 		$data['job_profile'] = $this->input->post('job_profile');			
	// 		$data['message'] = $this->input->post('message');

	// 		$this->crud->insert('career',$data);
	// 		redirect($_SERVER['HTTP_REFERER']);
	// 	}

	// }











}
