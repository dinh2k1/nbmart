<?php include_once('database/connect.php')?>

<?php ob_start() ?>

<!DOCTYPE html>

<html lang="zxx" dir="ltr">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NBmart - Điện thoại, laptop, tablet, Đồng hồ chính hãng</title>

    <meta name="robots" content="index, follow" />

    <meta name="description" content="NBmart-Smart Product eCommerce html Template">

    <!-- Favicon -->

    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />

    <!-- CSS

    ============================================ -->

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/font.awesome.css" />

    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />

    <link rel="stylesheet" href="assets/css/animate.min.css">

    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <link rel="stylesheet" href="assets/css/venobox.css">

    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">

    <!-- Style CSS -->

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Minify Version -->

    <!-- <link rel="stylesheet" href="assets/css/plugins.min.css">

    <link rel="stylesheet" href="assets/css/style.min.css"> -->

</head>

<body>

    <div class="main-wrapper">

		<header>

		<?php include('include/header.php')?>

		<?php include('include/mobile.php')?>

		</header>

		<!-- offcanvas overlay start -->

        <div class="offcanvas-overlay"></div>

        <!-- offcanvas overlay end -->

		<?php include('include/cart.php')?>

		<?php include('include/wish-list.php')?>

        <!-- Banner Area Start -->

        <div class="banner-area style-one" style="padding-bottom: 20px; padding-top: 20px;">

            <div class="container">

                <div class="row">

                    <div class="col-md-9">

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" >

  <div class="carousel-indicators">

    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>

    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>

	<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>

	<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>

  </div>

  <div class="carousel-inner">

    <div class="carousel-item active">

      <img src="assets/images/slider/830-300-830x300-3.png" class="d-block w-100" alt="..." style="height: 390px; height:390px;">

    </div>

    <div class="carousel-item">

      <img src="assets/images/slider/eries-7-.webp" class="d-block w-100" alt="..." style="height: 390px; height:390px;">

    </div>

    <div class="carousel-item">

      <img src="assets/images/slider/f3-fl3-690-300-max.webp" class="d-block w-100" alt="..." style="height: 390px; height:390px;">

    </div>

	  <div class="carousel-item">

      <img src="assets/images/slider/renno6-seri-830-300-830x300-3.png" class="d-block w-100" alt="..." style="height: 390px; height:390px;">

    </div>

	  <div class="carousel-item">

      <img src="assets/images/slider/sw-690-300-max.webp" class="d-block w-100" alt="..." style="height: 390px; height:390px;">

    </div>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">

    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

    <span class="visually-hidden">Previous</span>

  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">

    <span class="carousel-control-next-icon" aria-hidden="true"></span>

    <span class="visually-hidden">Next</span>

  </button>

</div>

					</div>

					

					<div class="col-md-3">

						<img src="assets/images/banner/830-300-830x300.png" class="d-block w-100" alt="..." 

							 style="height: 130px; height:130x; padding-bottom: 5px; border-radius: 10px;">

						<img src="assets/images/banner/a52s-r-690-300-max.webp" class="d-block w-100" alt="..." 

							 style="height: 130px; height:130x; padding-bottom: 5px; border-radius: 10px;">

						<img src="assets/images/banner/mn-Right_Banner_Desktop_2_.webp" class="d-block w-100" alt="..." 

							 style="height: 130px; height:130x; border-radius: 10px;">

					</div>

				</div>

			</div>

		</div>

        <!-- Product Area Start -->

        <div class="product-area">

            <div class="container">

                <!-- Section Title & Tab Start -->

                <div class="row">

                    <div class="col-12">

                        <!-- Tab Start -->

                        <div class="tab-slider d-md-flex justify-content-md-between align-items-md-center">

                            <ul class="product-tab-nav nav justify-content-start align-items-center">

                                <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#newarrivals">Sản phẩm mới</button>

                                </li>

								<li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#toprated">Khuyến mãi</button>

                                </li>

                                <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#featured">Đề xuất</button>

                                </li>

                            </ul>

                        </div>

                        <!-- Tab End -->

                    </div>

                </div>

				<?php include_once('include/function/show-sanpham-index.php')?>

                <!-- Section Title & Tab End -->

                <div class="row" style="padding-top: 20px; padding-bottom: 50px;">

                    <div class="col">

                        <div class="tab-content">

                            <!-- 1st tab start -->

                            <div class="tab-pane fade show active" id="newarrivals">

                                <div class="row mb-n-30px">

                                    <?php $sql_sanpham_new = mysqli_query($con,'SELECT *,ceil(100-(100/sanpham_gia*sanpham_giakhuyenmai)) as phantram FROM tbl_sanpham a join tbl_thuonghieu b

                                    on a.thuonghieu_id = b.thuonghieu_id ORDER BY sanpham_id DESC LIMIT 12');

                                        show_san_pham($sql_sanpham_new);	

                                    ?>

                                </div>

                            </div>

					

                            <!-- 1st tab end -->

                            <!-- 2rd tab start -->

                            <div class="tab-pane fade" id="toprated">

                                <div class="row">

                                    <?php $sql_sanpham_km = mysqli_query($con,'SELECT *,ceil(100-(100/sanpham_gia*sanpham_giakhuyenmai)) as phantram FROM tbl_sanpham a join tbl_thuonghieu b

                                    on a.thuonghieu_id = b.thuonghieu_id  WHERE sanpham_giakhuyenmai >0 ORDER BY phantram DESC LIMIT 12');

										show_san_pham($sql_sanpham_km);

                                    ?>                         

								</div>

                            </div>

                            <!-- 2rd tab end -->

							<!-- 3rd tab start -->

                            <div class="tab-pane fade" id="featured">

                                <div class="row">

                                    <?php $sql_sanpham_ft = mysqli_query($con,'SELECT *,ceil(100-(100/sanpham_gia*sanpham_giakhuyenmai)) as phantram FROM tbl_sanpham a join tbl_thuonghieu b

                                    on a.thuonghieu_id = b.thuonghieu_id ORDER BY RAND() LIMIT 12');

										show_san_pham($sql_sanpham_ft);

                                    ?>

                                </div>	

                                </div>

                            </div>

                            <!-- 3rd tab end -->

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Product Area End -->

        <!-- Blog area start from here -->

		<?php include('include/blog.php')?>

        <!-- Blog area end here -->

        <!-- Footer Area Start -->

		<?php include('include/footer.php')?>

        <!-- Footer Area End -->

    </div>

	

	<?php include_once('xuly/show-addcart.php')?>



	

<?php

$sql_id = mysqli_query($con,'SELECT * FROM tbl_sanpham ');

            while($row_id = mysqli_fetch_array($sql_id)) {?>

									

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js">

</script>

<script type="text/javascript">

function click_add_cart<?php echo $row_id['sanpham_id']?>(){

var id_addcart=document.getElementById('id_addcart<?php echo $row_id['sanpham_id']?>').value;

$.ajax({

        type:"post",

        url:"xuly/xuly-addcart.php",

        data: 

        {  

           'id_addcart' :id_addcart



        },

            cache:false,

            success: function(data,status)

            {

              setTimeout(function () { 

                location.reload();

              }, 3 * 1000);

            }

            });

            return false;

 }

</script>

		

<?php } ?>

<?php

$sql_id = mysqli_query($con,'SELECT * FROM tbl_sanpham ');

            while($row_id = mysqli_fetch_array($sql_id)) {?>

									

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js">

</script>

<script type="text/javascript">

function click_yeu_thich<?php echo $row_id['sanpham_id']?>(){

var id_yeuthich=document.getElementById('id_yeuthich<?php echo $row_id['sanpham_id']?>').value;

$.ajax({

        type:"post",

        url:"xuly/xuly-addcart.php",

        data: 

        {  

           'id_yeuthich' :id_yeuthich



        },

            cache:false,

            success: function (html) 

            {

               setTimeout(function () { 

                location.reload();

              }, 3 * 1000);

            }

            });

            return false;

 }

</script>

		

<?php } ?>	

    <!-- Global Vendor, plugins JS -->

    <!-- JS Files

    ============================================ -->

    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>

    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>

    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>

    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <script src="assets/js/plugins/jquery.countdown.min.js"></script>

    <script src="assets/js/plugins/swiper-bundle.min.js"></script>

    <script src="assets/js/plugins/scrollUp.js"></script>

    <script src="assets/js/plugins/venobox.min.js"></script>

    <script src="assets/js/plugins/jquery-ui.min.js"></script>

    <script src="assets/js/plugins/mailchimp-ajax.js"></script>



    <!-- Minify Version -->

    <!-- <script src="assets/js/vendor.min.js"></script>

    <script src="assets/js/plugins.min.js"></script>

    <script src="assets/js/main.min.js"></script> -->



    <!--Main JS (Common Activation Codes)-->

    <script src="assets/js/main.js"></script>
	

</body>



</html>