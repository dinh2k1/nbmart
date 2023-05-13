<?php include_once('database/connect.php')?>

<?php ob_start() ?>

<!DOCTYPE html>

<html lang="zxx" dir="ltr">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NBmart - About Us</title>

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

        <div class="breadcrumb-area">

            <div class="container">

                <div class="row align-items-center justify-content-center">

                    <div class="col-12 text-center">

                        <h2 class="breadcrumb-title">About Us</h2>

                        <!-- breadcrumb-list start -->

                        <ul class="breadcrumb-list">

                            <li class="breadcrumb-item"><a href="index.php"></a></li>

                            <li class="breadcrumb-item active">About Us</li>

                        </ul>

                        <!-- breadcrumb-list end -->

                    </div>

                </div>

            </div>

        </div>

        <!-- breadcrumb-area end -->

        <!-- About section Start -->

        <div class="about-area pt-100px ">

            <div class="container">

                <div class="row">

                    <div class="col-12">

                        <div class="about-wrapper text-center">

                            <div class="about-contant">

                                <h2 class="title">

                                    <span>Smart Fashion </span>

                                    With Smart Devices

                                </h2>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea comml consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident sunt in culpa</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- About section End -->

		<div class="pt-100px pb-100px"></div>
        <!-- Blog area start from here -->

		<?php include('include/blog.php')?>

        <!-- Blog area end here -->

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