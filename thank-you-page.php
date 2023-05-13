<?php include_once('database/connect.php')?>
<?php ob_start() ?>
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hmart - Thank You page</title>
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
        <!-- Thank You area start -->

<?php 
	if(isset($_REQUEST['dat-hang'])){
		
		$name = $_REQUEST['name'];
		$phone = $_REQUEST['phone'];
		$email = $_REQUEST['email'];
		$address =  $_REQUEST['address'];
		$note = $_REQUEST['note'];
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$id_donhang = date("sihdmy") . substr($phone, -4, 4);
		$total = $_REQUEST['tonggiatri_donhang'];
		if(isset($_REQUEST['discount_name'])){
			$discount_name = $_REQUEST['discount_name']; 
		}else{ 
			$discount_name = '';
		}
		
		
	
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
	
}else{
	$sql_donhang = "INSERT INTO `tbl_donhang` 
                                (`donhang_id`, `phone`, `name`, `email`, `address`, `note`, `ngaythang`, `tonggiatri_donhang`,`magiamgia`, `tinhtrang` ,`huydon`) 
                                  VALUES 
                                ($id_donhang, '$phone', '$name', '$email', '$address', '$note', current_timestamp(), '$total','$discount_name','Chờ xử lý', '0');" ;

    $insert_donhang = mysqli_query($con,$sql_donhang);
}
		
		
		
	if($insert_donhang){
		
			if(isset($_SESSION['id'])){
			$id = $_SESSION['id'];
			
			$sql_sanpham_giohang = mysqli_query($con,"SELECT * FROM `tbl_giohang` a JOIN tbl_sanpham b on a.sanpham_id = b.sanpham_id WHERE a.khachhang_id = $id");
			while($row_sanpham_giohang = mysqli_fetch_array($sql_sanpham_giohang)) {
				$id_sp = $row_sanpham_giohang['sanpham_id'];
				$sl_sp = $row_sanpham_giohang['soluong'];
				if($row_sanpham_giohang['sanpham_giakhuyenmai'] > 0){
					$gia_sp = $row_sanpham_giohang['sanpham_giakhuyenmai'];
				}else{
					$gia_sp = $row_sanpham_giohang['sanpham_gia'];
				}
				

				$insert_ct_donhang = mysqli_query($con,"INSERT INTO `tbl_ct_donhang` (`donhang_id`, `sanpham_id`, `gia`, `soluong`) VALUES ('$id_donhang', '$id_sp', '$gia_sp', '$sl_sp');");
				
				$update_slsp = mysqli_query($con,"UPDATE `tbl_sanpham` SET `sanpham_soluong` = sanpham_soluong - $sl_sp WHERE `tbl_sanpham`.`sanpham_id` = $id_sp;");
				
			}
				$delete_giohang = mysqli_query($con, "DELETE FROM `tbl_giohang` WHERE khachhang_id = $id;");
		
			
			
		}else{
				
			$sql_id_addcart = mysqli_query($con,'SELECT * FROM tbl_sanpham ');
    		while($row_id_addcart = mysqli_fetch_array($sql_id_addcart)) {
				if(isset($_SESSION['id_addcart'.$row_id_addcart['sanpham_id'].''])){
					$id_sp = $row_id_addcart['sanpham_id'];
					$sl_sp = $_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].''];
					if($row_id_addcart['sanpham_giakhuyenmai'] > 0){
						$gia_sp = $row_id_addcart['sanpham_giakhuyenmai'];
					}else{
						$gia_sp = $row_id_addcart['sanpham_gia'];
					}
					
					
					$insert_ct_donhang = mysqli_query($con,"INSERT INTO `tbl_ct_donhang` (`donhang_id`, `sanpham_id`,`gia`, `soluong`) 
					VALUES ('$id_donhang', '$id_sp','$gia_sp', '$sl_sp');");
					
					$update_slsp = mysqli_query($con,"UPDATE `tbl_sanpham` SET `sanpham_soluong` = sanpham_soluong - $sl_sp WHERE `tbl_sanpham`.`sanpham_id` = $id_sp;");
					
					unset ($_SESSION['id_addcart'.$row_id_addcart['sanpham_id'].'']);
					unset ($_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].'']);
				}
			}
				
		}
	}
}

?>		
		
		
		
		
		
		
		
		
        <div class="thank-you-area">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8">
                        <div class="inner_complated">
                            <div class="img_cmpted"><img src="assets/images/icons/cmpted_logo.png" alt=""></div>
                            <p class="dsc_cmpted">Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi <br> Nhân viên sẽ liên hệ với bạn sớm nhất để xác nhận đơn hàng</p>
                            <div class="btn_cmpted">
                                <a href="index.php" class="shop-btn" title="Go To Shop">Tiếp tục mua sắm </a>
                            </div>
                        </div>
                        <div class="main_quickorder text-align-center">
                            <h3 class="title">Mã đơn hàng của bạn</h3>
                            <div class="cntct typewriter-effect"><span class="call_desk"><a href="tel:+01234567890" id="typewriter_num">
								<?php echo $id_donhang; ?></a></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
        <!-- Thank You area end -->
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