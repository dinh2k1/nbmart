<?php include_once('database/connect.php')?>
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hmart - Điện thoại, laptop, tablet, Đồng hồ chính hãng</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Hmart-Smart Product eCommerce html Template">
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
<style>
	.single-post-content img{
		width: 100%;
	}
</style>
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
        <!-- breadcrumb-area start -->
<?php 
	$sql_baiviet = mysqli_query($con,'SELECT * FROM tbl_baiviet a join tbl_danhmuc_baiviet b on a.danhmuc_id = b.danhmuc_id WHERE baiviet_id = '.$_REQUEST['id'].'');
    $row_baiviet = mysqli_fetch_array($sql_baiviet);
?>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title"><?php echo $row_baiviet['baiviet_ten'];?></h2>
                        <!-- breadcrumb-list start -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- Blog Area Start -->
		<div class="blog-grid pb-100px pt-100px main-blog-page single-blog-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 offset-lg-2">
                        <div class="blog-posts">
                            <div class="single-blog-post blog-grid-post">
                                <div class="blog-image single-blog">
                                    <img class="img-fluid h-auto border-radius-10px" 
										 src="assets/images/blog-image/<?php echo $row_baiviet['baiviet_image'];?>" alt="blog" />
                                </div>
                                <div class="blog-post-content-inner mt-30px">
                                    <div class="blog-athor-date">
                                        <span class="blog-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row_baiviet['baiviet_ngaydang'];?></span>
                                        <span><a class="blog-author" href="blog-grid.php"><i class="fa fa-user" aria-hidden="true"></i>
											<?php echo $row_baiviet['baiviet_tacgia'];?></a></span>
                                    </div>
                                </div>
                                <div class="single-post-content">
                                    <p data-aos="fade-up" data-aos-delay="200">
										<?php echo $row_baiviet['baiviet_noidung'];?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="blog-single-tags-share d-md-flex justify-content-between">
							<!--
                            <div class="blog-single-tags d-flex" data-aos="fade-up" data-aos-delay="200">
                                <span class="title">Tages:</span>
                                <ul class="tag-list">
                                    <li><a href="#">Mobile,</a></li>
                                    <li><a href="#">Laptop,</a></li>
                                    <li class="m-0"><a href="#">Smart TV</a></li>
                                </ul>
                            </div>
							-->
                            <div class="blog-single-share mb-xs-15px d-flex" data-aos="fade-up" data-aos-delay="200">
                                <span class="title">Share:</span>
                                <ul class="social">
                                    <li class="m-0">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="comment-area">
                            <h2 class="comment-heading" data-aos="fade-up" data-aos-delay="200">Comments (03)</h2>
                            <div class="review-wrapper">
                                <div class="single-review" data-aos="fade-up" data-aos-delay="200">
                                    <div class="review-img">
                                        <img src="assets/images/blog-image/comment-img-1.webp" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4 class="title">Ramon Bateman
                                                        <span class="date">- 27, Jun 2030,</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp labore et dol magna aliqua. Ut enim ad minim veniam.
                                            </p>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review child-review" data-aos="fade-up" data-aos-delay="200">
                                    <div class="review-img">
                                        <img src="assets/images/blog-image/comment-img-2.webp" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4 class="title">Pierre Hackett
                                                        <span class="date">- 27, Jun 2030,</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sedd
                                                labore et dol magna aliqua. Ut enim ad.</p>
                                            <div class="review-left">
                                                <a href="#"> Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review" data-aos="fade-up" data-aos-delay="200">
                                    <div class="review-img">
                                        <img src="assets/images/blog-image/comment-img-3.webp" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4 class="title">Moira Baxter
                                                        <span class="date">- 27, Jun 2030,</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp labore et dol magna aliqua. Ut enim ad minim veniam.
                                            </p>
                                            <div class="review-left">
                                                <a href="#"> Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-comment-form">
                            <h2 class="comment-heading" data-aos="fade-up" data-aos-delay="200">Leave a Comment</h2>
                            <div class="form-inner">
                                <div class="row">
                                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                        <div class="single-form mb-lm-15px">
                                            <input type="text" placeholder="Name *" />
                                        </div>
                                    </div>
                                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                        <div class="single-form mb-lm-15px">
                                            <input type="email" placeholder="Email *" />
                                        </div>
                                    </div>
                                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="500">
                                        <div class="single-form mb-lm-15px">
                                            <input type="email" placeholder="Subject (Optinal)" />
                                        </div>
                                    </div>
                                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
                                        <div class="single-form m-0">
                                            <textarea placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
                                        <button class="submit-btn mt-30px" type="submit">Send a Comment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blag Area End -->
        <!-- Footer Area Start -->
		<?php include('include/footer.php')?>
        <!-- Footer Area End -->
    </div>
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