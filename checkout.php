<!DOCTYPE html>
<?php include_once('database/connect.php')?>
<?php ob_start() ?>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hmart - Checkout page</title>
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
                        <h2 class="breadcrumb-title">Checkout</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Checkout</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- checkout area start -->
		<form action="thank-you-page.php" method="get">
        <div class="checkout-area pt-100px pb-100px">
            <div class="container">
                <div class="row">
<?php 
if(isset($_SESSION['id'])){
$id_check = $_SESSION['id'];
$check_giohang = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `tbl_giohang` WHERE khachhang_id = $id_check ;"));
    if(!empty($check_giohang)){
        $check_cart = 1;
    }else{
        $check_cart = 0;
    }

}else{
	$check_cart = 0;
}

$sql_check_session_cart = mysqli_query($con,'SELECT * FROM tbl_sanpham ');
$count_session_cart = 0;
    	while($row_check_session_cart = mysqli_fetch_array($sql_check_session_cart)) {
			if(isset($_SESSION['id_addcart'.$row_check_session_cart['sanpham_id'].''])){
				$count_session_cart = $count_session_cart + 1 ;
			}
		}
if($count_session_cart > 0){
	$check_session_cart = 1;
}else{
	$check_session_cart = 0;
}

if($check_cart == 0 && $check_session_cart == 0){ 
	
	$insert_donhang = '';
	echo header("refresh:0; url='index.php'");
	
}
?>
<?php if ( isset($_SESSION['id']) && isset($_REQUEST['my-address']) ){
	$sql_hienthitt = mysqli_query($con,'SELECT * FROM tbl_khachhang WHERE khachhang_id = '.$_SESSION['id'].'');
	$row_hienthitt = mysqli_fetch_array($sql_hienthitt);
?>
	                   <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Thông tin nhận hàng</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Tên</label>
                                        <input type="text" name="name" required="" pattern="{1,}" title="Không bỏ trống"
											   value="<?php echo $row_hienthitt['name'];?>"/>
                                    </div>
                                </div>
								<div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Số điện thoại</label>
                                        <input type="tel" name="phone" placeholder="Số điện thoại" pattern="[0]{1}[0-9]{9}" title="Định dạng số điện thoại chưa đúng, VD: 0123456789"/>
											   value="<?php echo $row_hienthitt['phone'];?>"/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Email</label>
                                        <input type="text" name="email" required="" pattern="{1,}" title="Không bỏ trống" 
											   value="<?php echo $row_hienthitt['email'];?>"/>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Thông tin nhận hàng</label>
                                        	<input type="text" name="address" 
													   value="<?php echo $row_hienthitt['address']; ?>" 
													   style="border: none; background-color: #ebebeb; display:none;">
												<p><?php echo $row_hienthitt['address'];?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="additional-info-wrap">
                                <div class="additional-info">
                                    <label>Ghi chú đơn hàng</label>
                                    <textarea placeholder="Đặt lời nhắc đến shop hoặc shiper" name="note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
<?php }else{ ?>
     <?php if (isset($_SESSION['id'])){
	    $sql_hienthitt = mysqli_query($con,'SELECT * FROM tbl_khachhang WHERE khachhang_id = '.$_SESSION['id'].'');
        $row_hienthitt = mysqli_fetch_array($sql_hienthitt);
}?>   
			<div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Thông tin nhận hàng</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Tên</label>
                                        <input type="text" name="name" required="" pattern="{1,}" title="Không bỏ trống"
											   value="<?php if (isset($_SESSION['id'])){echo $row_hienthitt['name'];}?>"/>
                                    </div>
                                </div>
								<div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="phone" required="" pattern="{1,}" title="Không bỏ trống"
											   value="<?php if (isset($_SESSION['id'])){echo $row_hienthitt['phone'];}?>"/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Email</label>
                                        <input type="text" name="email" required="" pattern="{1,}" title="Không bỏ trống" 
											   value="<?php if (isset($_SESSION['id'])){echo $row_hienthitt['email'];}?>"/>
                                    </div>
                                </div>
								<div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Thông tin nhận hàng</label>
                                        	<input type="text" name="address" 
													   value="<?php if(isset($_REQUEST['tinh-tp'])){echo $_REQUEST['so-nha'] .' - '. 
																							  $_REQUEST['quan-huyen'] .' - '. 
	                                    													  $_REQUEST['tinh-tp'];
																						}?>" 
													   style="border: none; background-color: #ebebeb; display:none;">
												<p><?php if(isset($_REQUEST['tinh-tp'])){echo $_REQUEST['so-nha'] .' - '. 
																							  $_REQUEST['quan-huyen'] .' - '. 
	                                    													  $_REQUEST['tinh-tp'];
																						}?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="additional-info-wrap">
                                <div class="additional-info">
                                    <label>Ghi chú đơn hàng</label>
                                    <textarea placeholder="Đặt lời nhắc đến shop hoặc shiper" name="note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>		
					
<?php } ?>					
                    <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                        <div class="your-order-area">
                            <h3>Đơn hàng</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-product-info">
                                    <div class="your-order-top">
                                        <ul>
                                            <li>Sản phẩm</li>
                                            <li>Tổng</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
<?php
// phần hiển thị sản phẩm trong giỏ
if(isset($_SESSION['id'])){
	$total = $_REQUEST['tonggiatri_donhang'];
	$sql_id_addcart = mysqli_query($con,'SELECT * FROM tbl_giohang a join tbl_sanpham b on a.sanpham_id = b.sanpham_id
										WHERE khachhang_id = '.$_SESSION['id'].' ');
    	while($row_id_addcart = mysqli_fetch_array($sql_id_addcart)) {
			
?>
                                            <li><span class="order-middle-left"><?php echo $row_id_addcart['sanpham_name'] ?> X <?php echo $row_id_addcart['soluong'] ?></span> 
											<span class="order-price">
												
												<?php 
													if($row_id_addcart['sanpham_giakhuyenmai'] > 0){
														echo currency_format($row_id_addcart['sanpham_giakhuyenmai'] * $row_id_addcart['soluong']);
													}else{
														echo currency_format( $row_id_addcart['sanpham_gia'] * $row_id_addcart['soluong']);
													}
												?>
												
											</span></li>

<?php			
		}
}else{
	$sql_id_addcart = mysqli_query($con,'SELECT * FROM tbl_sanpham ');
		$total =$_REQUEST['tonggiatri_donhang'];
    	while($row_id_addcart = mysqli_fetch_array($sql_id_addcart)) {
			if(isset($_SESSION['id_addcart'.$row_id_addcart['sanpham_id'].''])){
																				

?>
                                            <li><span class="order-middle-left"><?php echo $row_id_addcart['sanpham_name'] ?> X <?php echo $_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].''] ?></span> 
											<span class="order-price">
												
												<?php 
													if($row_id_addcart['sanpham_giakhuyenmai'] > 0){
														echo currency_format($row_id_addcart['sanpham_giakhuyenmai'] * $_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].'']);
													}else{
														echo currency_format($row_id_addcart['sanpham_gia'] * $_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].'']);
													}
												?>
											
											</span></li>

<?php
			
			}
		}
	}
?>											

                                        </ul>
                                    </div>
                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Phí vận chuyển</li>
                                            <li>miễn phí</li>
                                        </ul>
                                    </div>
									<div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Mã giảm giá</li>
                                            <li><?php if(isset($_REQUEST['discount_name']) && isset($_REQUEST['discount']))
												{echo $_REQUEST['discount_name']; echo '<br> - '; echo currency_format( $_REQUEST['discount']);
												 echo '<input name=discount_name value = '.$_REQUEST['discount_name'].' style="display: none;">' ;}?>
											</li> 
                                        </ul>
                                    </div>
                                    <div class="your-order-total">
                                        <ul>
                                            <li class="order-total">Tổng cộng</li>
                                            <li><?php echo currency_format( $total) ; ?></li>
											<input name="tonggiatri_donhang" value="<?php echo $total?>" style="display: none;" >
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="Place-order mt-25">
                                <input type="submit" name="dat-hang" value="Đặt hàng" style="text-align: center; background: #266bf9; border:none; color: #fff; font-weight: 600;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		</form>
        <!-- checkout area end -->
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