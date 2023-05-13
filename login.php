<?php include_once('database/connect.php')?>

<?php ob_start() ?>

<!DOCTYPE html>

<html lang="zxx" dir="ltr">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hmart - Login page</title>

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

                        <h2 class="breadcrumb-title">Login</h2>

                        <!-- breadcrumb-list start -->

                        <ul class="breadcrumb-list">

                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item active">Login</li>

                        </ul>

                        <!-- breadcrumb-list end -->

                    </div>

                </div>

            </div>

        </div>

        <!-- breadcrumb-area end -->

        <!-- login area start -->

        <div class="login-register-area pt-100px pb-100px">

            <div class="container">

                <div class="row">

                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">

                        <div class="login-register-wrapper">

                            <div class="login-register-tab-list nav">

                                <a class="active" data-bs-toggle="tab" href="#lg1">

                                    <h4>Đăng nhập</h4>

                                </a>

                                <a data-bs-toggle="tab" href="#lg2">

                                    <h4>Đăng ký</h4>

                                </a>

                            </div>

                            <div class="tab-content">

                                <div id="lg1" class="tab-pane active">

                                    <div class="login-form-container">

                                        <div class="login-register-form">

                                            <form method="post">

                                                <input type="tel"	 name="login-phone" placeholder="Số điện thoại" pattern="[0]{1}[0-9]{9}" title="Định dạng số điện thoại chưa đúng, VD: 0123456789"/>

                                                <input type="password" name="login-password" placeholder="Mật khẩu" />

                                                <div class="button-box">

                                                    <div class="login-toggle-btn">

                                                        <input type="checkbox" />

                                                        <a class="flote-none" href="javascript:void(0)">Nhớ tài khoản</a>

                                                        <a href="#">Quên mật khẩu?</a>

                                                    </div>

                                                    <button type="submit" name="login-submit"><span>Đăng nhập</span></button>

                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </div>

<?php

// XỬ LÝ ĐĂNG NHẬP

if(isset($_REQUEST['login-submit'])){

	

		$login_phone = $_REQUEST['login-phone'];

		$login_pass = $_REQUEST['login-password'];

	

	

		$row_khachhang_dn= mysqli_fetch_array( mysqli_query($con,"SELECT * FROM `tbl_khachhang` WHERE phone = '$login_phone'"));

	

  if(isset($row_khachhang_dn['phone'])){

  	  if($row_khachhang_dn['note'] == 1){

		  echo('Tài khoản này đã bị cấm !!');

	  }elseif($login_pass == $row_khachhang_dn['password']){



              echo header("refresh:0; url='index.php'");





              $_SESSION['name'] = $row_khachhang_dn['name'];

              $_SESSION['phone'] = $login_phone ;

              $_SESSION['id'] = $row_khachhang_dn['khachhang_id'];

              $_SESSION['email'] =$row_khachhang_dn['email'];

		  	  $_SESSION['password'] = $row_khachhang_dn['password'];

		  

		  	$sql_id_addcart = mysqli_query($con,'SELECT * FROM tbl_sanpham ');

    		while($row_id_addcart = mysqli_fetch_array($sql_id_addcart)) {

				if(isset($_SESSION['id_addcart'.$row_id_addcart['sanpham_id'].''])){

					

					unset ($_SESSION['id_addcart'.$row_id_addcart['sanpham_id'].'']);

					unset ($_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].'']);

				}

			}



              echo('<script>alert("Đăng nhập thành công")</script>');



          }else{



              echo('Mật khẩu không trùng khớp');



              }

          }else{



            echo('Tên người dùng chưa được đăng ký');

        }

}

?>

                                <div id="lg2" class="tab-pane">

                                    <div class="login-form-container">

                                        <div class="login-register-form">

                                            <form action="#" method="post">

												<input type="text" name="reg-name" placeholder="Tên" />

                                                <input type="tel" name="reg-phone" placeholder="Số điện thoại" pattern="[0]{1}[0-9]{9}" title="Định dạng số điện thoại chưa đúng, VD: 0123456789"/>

                                                <input type="password" name="reg-password" placeholder="Mật khẩu" />

												<input type="password" name="reg-re-password" placeholder="Nhập lại Mật khẩu" />

                                                <input name="reg-email" placeholder="Email" type="email" />

                                                <div class="button-box">

                                                    <button type="submit" name="reg-submit"><span>Đăng ký</span></button>

                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </div>

<?php 

//XỬ LÝ ĐĂNG KÝ 

			

if(isset($_REQUEST['reg-submit'])){

		

		$reg_name = $_REQUEST['reg-name'];

		$reg_phone = $_REQUEST['reg-phone'];

		$reg_email = $_REQUEST['reg-email'];

		$reg_pass = $_REQUEST['reg-password'];

		$reg_re_pass = $_REQUEST['reg-re-password'];

	

if($reg_pass != $reg_re_pass){

		

		echo('<script>alert("Mật khẩu và Nhập lại không trùng khớp")</script>');

		

	}else{

		

		$row_check_khachhang= mysqli_fetch_array( mysqli_query($con,"SELECT * FROM `tbl_khachhang` WHERE phone = '$reg_phone'"));

			

			if(isset($row_check_khachhang['khachhang_id'])){

				echo('<script>alert("SĐT Đã được đăng ký")</script>');

			}else{

			

				$sql_khachhang= mysqli_query($con,"SELECT * FROM tbl_khachhang ");

				$row_khachhang = mysqli_fetch_array($sql_khachhang);

				$update_row_khachhang = mysqli_query($con,"INSERT INTO `tbl_khachhang` (`khachhang_id`, `name`, `phone`, `note`, `email`, `password`, `giaohang`) VALUES (NULL, '$reg_name', '$reg_phone', '', '$reg_email', '$reg_pass', '0')");

			

				echo('<script>alert("Đăng ký thành công")</script>');

				

			

				}		

			}

}

?>	

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- login area end -->

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