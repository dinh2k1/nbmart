<?php include_once('database/connect.php')?>

<?php ob_start() ?>

<!DOCTYPE html>

<html lang="zxx" dir="ltr">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hmart - Cart page</title>

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

                        <h2 class="breadcrumb-title">Cart</h2>

                        <!-- breadcrumb-list start -->

                        <ul class="breadcrumb-list">

                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item active">Cart</li>

                        </ul>

                        <!-- breadcrumb-list end -->

                    </div>

                </div>

            </div>

        </div>

        <!-- breadcrumb-area end -->

        <!-- Cart Area Start -->

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



if($check_cart == 0 && $check_session_cart == 0){ ?>

	

	      <div class="thank-you-area">

            <div class="container">

                <div class="row justify-content-center align-items-center">

                    <div class="col-md-8">

                        <div class="inner_complated">

                            <div class="img_cmpted"><img src="assets/images/404/empty-cart.png" alt="" width="50%"></div>

                            <h2 class="dsc_cmpted">Giỏ hàng đang trống<br></h2>

                            <div class="btn_cmpted">

                                <a href="index.php" class="shop-btn" title="Go To Shop">Tiếp tục mua sắm </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>	

		

<?php }else{

	

?>



        <div class="cart-main-area pt-100px pb-100px">

            <div class="container">

                <h3 class="cart-page-title">Your cart items</h3>

				<p>Chú ý: Nhấn vào <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i> để cập nhập số lượng</p>

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                        <form action="#">

                            <div class="table-content table-responsive cart-table-content">

                                <table>

                                    <thead>

                                        <tr>

                                            <th>Hình ảnh</th>

                                            <th>Tên</th>

                                            <th>Đơn giá</th>

                                            <th>Số lượng</th>

                                            <th>Tổng cộng</th>

                                            <th></th>

                                        </tr>

                                    </thead>

                                    <tbody>

<?php

// phần hiển thị sản phẩm trong giỏ

if(isset($_SESSION['id'])){

	$total = 0;

	$sql_id_addcart = mysqli_query($con,'SELECT * FROM tbl_giohang a join tbl_sanpham b on a.sanpham_id = b.sanpham_id

										WHERE khachhang_id = '.$_SESSION['id'].' ');

    	while($row_id_addcart = mysqli_fetch_array($sql_id_addcart)) {

?>

		<tr>

            <td class="product-thumbnail">

                <a href="single-product.php?id=<?php echo $row_id_addcart['sanpham_id'] ?>"><img class="img-responsive ml-15px" 

								 src="assets/images/product-image/<?php echo $row_id_addcart['sanpham_image'] ?>" alt="" /></a>
            </td>

            <td class="product-name"><a href="single-product.php?id=<?php echo $row_id_addcart['sanpham_id'] ?>">

				<?php echo $row_id_addcart['sanpham_name'] ?></a></td>

            <td class="product-price-cart">

				

				<?php if($row_id_addcart['sanpham_giakhuyenmai'] > 0 ){ ?>     

					<span class="amount"><?php echo currency_format($row_id_addcart['sanpham_giakhuyenmai']); ?></span><br>

					<span class="old-price"><?php echo currency_format($row_id_addcart['sanpham_gia']); ?></span>

				<?php $total = $total + ($row_id_addcart['sanpham_giakhuyenmai'] * $row_id_addcart['soluong']); ?>

				<?php }else{ ?>

					<span class="amount"><?php echo currency_format($row_id_addcart['sanpham_gia']); ?></span><br>

				<?php $total = $total + ($row_id_addcart['sanpham_gia'] * $row_id_addcart['soluong']); ?>

				<?php } ?>

				

			</td>

            <td class="product-quantity">

                <div class="cart-plus-minus">

                    <input class="cart-plus-minus-box" type="text" name="qty" value="<?php echo $row_id_addcart['soluong'] ?>" />

					<button name="up_qty" value="<?php echo $row_id_addcart['giohang_id'];?>">

					<i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>

                </div>

            </td>

            <td class="product-subtotal">

				<?php 

					if($row_id_addcart['sanpham_giakhuyenmai'] > 0){

						echo currency_format( $row_id_addcart['sanpham_giakhuyenmai'] * $row_id_addcart['soluong']);

					}else{

						echo currency_format( $row_id_addcart['sanpham_gia'] * $row_id_addcart['soluong'] );

					}

				?>

			</td>

            <td class="product-remove">

                <a href="?del-cart=<?php echo $row_id_addcart['giohang_id'] ?>"><i class="fa fa-times"></i></a>

            </td>

        </tr>		

<?php			

		}

	

    if(isset($_REQUEST['up_qty'])){

        $id = $_REQUEST['up_qty'];

        $qty = $_REQUEST['qty'];

        $sql_up_qty_cart = "UPDATE `tbl_giohang` SET `soluong` = '$qty' WHERE `tbl_giohang`.`giohang_id` = $id;";

		$qty_cart = mysqli_query($con, $sql_up_qty_cart);

        echo header("refresh: 0 url = ?");

    }

	

}else{

	$sql_id_addcart = mysqli_query($con,'SELECT * FROM tbl_sanpham ');

	$total = 0;

    	while($row_id_addcart = mysqli_fetch_array($sql_id_addcart)) {

			if(isset($_SESSION['id_addcart'.$row_id_addcart['sanpham_id'].''])){





?>

	<tr>

        <td class="product-thumbnail">

            <a href="single-product.php?id=<?php echo $row_id_addcart['sanpham_id'] ?>"><img class="img-responsive ml-15px" 

								 src="assets/images/product-image/<?php echo $row_id_addcart['sanpham_image'] ?>" alt="" /></a>

        </td>

        <td class="product-name"><a href="single-product.php?id=<?php echo $row_id_addcart['sanpham_id'] ?>"><?php echo $row_id_addcart['sanpham_name']?></a></td>

        <td class="product-price-cart">

            <?php if($row_id_addcart['sanpham_giakhuyenmai'] > 0 ){ ?>



                <span class="amount"><?php echo currency_format($row_id_addcart['sanpham_giakhuyenmai']); ?></span><br>

                <span class="old-price"><?php echo currency_format($row_id_addcart['sanpham_gia']); ?></span>

				<?php $total = $total + ($row_id_addcart['sanpham_giakhuyenmai'] * $_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].'']); ?>



            <?php }else{ ?>

			

                <span class="amount"><?php echo currency_format($row_id_addcart['sanpham_gia']); ?></span><br>

				<?php $total = $total + ($row_id_addcart['sanpham_gia'] * $_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].'']); ?>

			

            <?php } ?>

		</td>

        <td class="product-quantity">

            <div class="cart-plus-minus">

                <input class="cart-plus-minus-box" type="text" name="qty" value="<?php echo $_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].''];?>" />

				<button name="up_qty" value="<?php echo $_SESSION['id_addcart'.$row_id_addcart['sanpham_id'].''];?>">

					<i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>

            </div>

        </td>

        <td class="product-subtotal">

			<?php 

              if($row_id_addcart['sanpham_giakhuyenmai'] > 0){

                  echo currency_format( $row_id_addcart['sanpham_giakhuyenmai'] * $_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].''] );

              }else{

                  echo currency_format( $row_id_addcart['sanpham_gia'] * $_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].'']);

              }

			?>

		</td>

        <td class="product-remove">

            <a href="?del-cart=<?php echo $_SESSION['id_addcart'.$row_id_addcart['sanpham_id'].''] ?>"><i class="fa fa-times"></i></a>

        </td>

    </tr>	

				

<?php

			

			}

		}

	

	

        if(isset($_REQUEST['up_qty'])){

			$id = $_REQUEST['up_qty'];

			$qty = $_REQUEST['qty'];

			$_SESSION['sl_addcart'.$id.''] = $qty;

			echo header("refresh: 0 url = ?");

        }

	

	}

	

?>										

 

                                    </tbody>

                                </table>

                            </div>

                        </form>

						<br>

						<form action="" method="post">

                        <div class="row">

							<div class="col-lg-4 col-md-6 mb-lm-30px">

                                <div class="discount-code-wrapper">

                                    <div class="title-wrap">

                                        <h4 class="cart-bottom-title section-bg-gray">Mã giảm giá</h4>

                                    </div>

                                    <div class="discount-code">

                                        <p>Nếu bạn có mã giảm giá, hãy nhập vào đây</p>

                                            <input type="text" name="name" />

                                    </div>

                                </div>

								<input type="submit" value="Áp mã giảm giá" name="discount" 

									   style="text-align: center; background: #266bf9; border:none; color: #fff; font-weight: 600;">

<?php

		if(isset($_REQUEST['discount'])){

		$discount_sub = $_REQUEST['name'];

		$sql_discount = mysqli_query($con, "SELECT *  FROM `tbl_magiamgia` WHERE `magiam_name` = '$discount_sub'");

		$row_discount = mysqli_fetch_array($sql_discount);

		if(!empty($row_discount)){

			if($row_discount['magiam_soluong'] > 0 ){

				$discount = $row_discount['magiam_code'];

				$discount_name = $row_discount['magiam_name'];

			 	$update_row_khachhang = mysqli_query($con,"UPDATE `tbl_magiamgia` SET `magiam_soluong` = magiam_soluong - 1 WHERE `tbl_magiamgia`.`magiam_name` = '$discount_sub'");

			}else{

				echo('Mã giảm giá hết lượt sử dụng');

				$discount = 0;

			}

		}else{

			echo('Mã giảm giá không hợp lệ');

			$discount = 0;

		}

	}else{

			$discount = 0;

		}

?>

                            </div>

							</form>



<?php

if(isset($_SESSION['id'])){

    $sql_hienthitt = mysqli_query($con,'SELECT * FROM tbl_khachhang WHERE khachhang_id = '.$_SESSION['id'].'');

    $row_hienthitt = mysqli_fetch_array($sql_hienthitt);

?>

								<div class="col-lg-4 col-md-6 mb-lm-30px">

								<div class="grand-totall">

									<div class="title-wrap">

                                    	<h4 class="cart-bottom-title section-bg-gary-cart">Địa chỉ nhận hàng</h4>

                                	</div>

									<div class="total-shipping">

										

                                        <ul>

                                            <li><input type="radio" name="address" value="my-address" checked>Địa chỉ của bạn</li>

                                            <li><input type="radio" name="address" value="custom-address">Địa chỉ khác</li>

                                        </ul>

									</div>

                                </div>

							</div>

		                  	<div class="col-lg-4 col-md-6 mb-lm-30px my-address box"><form action="checkout.php" method="post">

                                <div class="cart-tax">

                                    <div class="title-wrap">

                                        <h4 class="cart-bottom-title section-bg-gray">Thông tin địa chỉ nhận hàng</h4>

                                    </div>

                                    <div class="tax-wrapper">

                                            <div class="tax-select-wrapper">

												<input type="text" name="my-address" 

													   value="my-address" 

													   style="border: none; background-color: #ebebeb; display:none;">

												<p><?php echo $row_hienthitt['address']; ?></p>

												<a href="my-account.php">Chỉnh sửa</a>

                                            </div>

                                    </div>

                                </div>

                                <div class="grand-totall">

                                    <div class="title-wrap">

                                        <h4 class="cart-bottom-title section-bg-gary-cart">Thông Tin giỏ hàng</h4>

                                    </div>

                                    <h5>Tổng giá trị hàng <span><?php echo  currency_format( $total);?></span></h5>

                                    <div class="total-shipping">

                                        <ul>

											<li> Phí vận chuyển : <span>Miễn phí</span></li>

											<li>Mã giảm giá : 

												<span>

													<?php 

														if($discount > 0 ){echo $discount_name .'<br>-'. currency_format($discount). 

														'<input name="discount_name" value="'.$discount_name.'" style="display: none;" >'.

														'<input name="discount" value="'.$discount.'" style="display: none;" >';}

													?>

												</span>

											</li>

											

                                        </ul>

                                    </div>	

                                    <h4 class="grand-totall-title">Tổng cộng <span><?php  echo currency_format(  $total - $discount );?></span></h4> 

									<input name="tonggiatri_donhang" value="<?php echo $total - $discount ?>" style="display: none;" >

                                </div>

								<input type="submit" value="Thanh toán" name="checkout" 

									   style="text-align: center; background: #266bf9; border:none; color: #fff; font-weight: 600;">

                            </form></div>

							<div class="col-lg-4 col-md-6 mb-lm-30px custom-address box" style="display:none;"><form action="checkout.php" method="post">

                                <div class="cart-tax">

                                    <div class="title-wrap">

                                        <h4 class="cart-bottom-title section-bg-gray">Thông tin địa chỉ nhận hàng</h4>

                                    </div>

                                    <div class="tax-wrapper">

                                            <div class="tax-select-wrapper">

                                                <div class="tax-select">

                                                    <select class="email s-email s-wid" name="tinh-tp" required="">

                                                        <option value="">Tỉnh / Thành phố</option>

                                                    </select>

                                                </div>

                                                <div class="tax-select">

                                                    <select class="email s-email s-wid" name="quan-huyen" required="">

                                                        <option value="">Quận / Huyện</option>

                                                    </select>

                                                </div>

                                                <input class="billing_address_1" name="" type="hidden" value="">

                                                <input class="billing_address_2" name="" type="hidden" value="">

												<input name="custom-address"  type="hidden" value="">

                                                <div class="tax-select">

                                                    <label>* Số nhà /đường/Xã-Phường-Thị Trấn</label>

                                                    <input type="text" name="so-nha" required="" pattern="{1,}" title="Không bỏ trống"/>

                                                </div>

                                            </div>

                                    </div>

                                </div>

                                <div class="grand-totall">

                                    <div class="title-wrap">

                                        <h4 class="cart-bottom-title section-bg-gary-cart">Thông Tin giỏ hàng</h4>

                                    </div>

                                    <h5>Tổng giá trị hàng <span><?php echo currency_format($total);?></span></h5>

                                    <div class="total-shipping">

                                        <ul>

											<li> Phí vận chuyển : <span>Miễn phí</span></li>

											<li>Mã giảm giá : 

												<span>

													<?php 

														if($discount > 0 ){echo $discount_name .'<br>-'. currency_format($discount). 

														'<input name="discount_name" value="'.$discount_name.'" style="display: none;" >'.

														'<input name="discount" value="'.$discount.'" style="display: none;" >';}

													?>

												</span>

											</li>

                                        </ul>

                                    </div>	

                                    <h4 class="grand-totall-title">Tổng cộng <span><?php echo currency_format($total - $discount);?></span></h4> 

									<input name="tonggiatri_donhang" value="<?php echo $total - $discount ?>" style="display: none;" >

                                </div>

								<input type="submit" value="Thanh toán" name="checkout" 

									   style="text-align: center; background: #266bf9; border:none; color: #fff; font-weight: 600;">

                            </form></div>						

<?php }else{ ?>

							<div class="col-lg-4 col-md-6 mb-lm-30px"></div>

							<div class="col-lg-4 col-md-6 mb-lm-30px "><form action="checkout.php" method="post">

                                <div class="cart-tax">

                                    <div class="title-wrap">

                                        <h4 class="cart-bottom-title section-bg-gray">Thông tin địa chỉ nhận hàng</h4>

                                    </div>

                                    <div class="tax-wrapper">

                                            <div class="tax-select-wrapper">

                                                <div class="tax-select">

                                                    <select class="email s-email s-wid" name="tinh-tp" required="">

                                                        <option value="">Tỉnh / Thành phố</option>

                                                    </select>

                                                </div>

                                                <div class="tax-select">

                                                    <select class="email s-email s-wid" name="quan-huyen" required="">

                                                        <option value="">Quận / Huyện</option>

                                                    </select>

                                                </div>

                                                <input class="billing_address_1" name="" type="hidden" value="">

                                                <input class="billing_address_2" name="" type="hidden" value="">

                                                <div class="tax-select">

                                                    <label>* Số nhà /đường/Xã-Phường-Thị Trấn</label>

                                                    <input type="text" name="so-nha" required="" pattern="{1,}" title="Không bỏ trống"/>

                                                </div>

                                            </div>

                                    </div>

                                </div>

                                <div class="grand-totall">

                                    <div class="title-wrap">

                                        <h4 class="cart-bottom-title section-bg-gary-cart">Thông Tin giỏ hàng</h4>

                                    </div>

                                    <h5>Tổng giá trị hàng <span><?php echo currency_format($total);?></span></h5>

                                    <div class="total-shipping">

                                        <ul>

											<li> Phí vận chuyển : <span>Miễn phí</span></li>

											<li>Mã giảm giá : 

												<span>

													<?php 

														if($discount > 0 ){echo $discount_name .'<br>-'. currency_format($discount). 

														'<input name="discount_name" value="'.$discount_name.'" style="display: none;" >'.

														'<input name="discount" value="'.$discount.'" style="display: none;" >';}

													?>

												</span>

											</li>

                                        </ul>

                                    </div>	

                                    <h4 class="grand-totall-title">Tổng cộng <span><?php echo currency_format($total - $discount);?></span></h4>

									<input name="tonggiatri_donhang" value="<?php echo $total - $discount?>" style="display: none;" >

                                </div>

								<input type="submit" value="Thanh toán" name="checkout" 

									   style="text-align: center; background: #266bf9; border:none; color: #fff; font-weight: 600;">

                            </form></div>

<?php }?>





                        </div>

                    </div>

                </div>

            </div>

        </div>

		

<?php } ?>	

        <!-- Cart Area End -->

        <!-- Footer Area Start -->

		<?php include('include/footer.php')?>

        <!-- Footer Area End -->

    </div>

<?php 

	

?>

    <!-- Global Vendor, plugins JS -->

    <!-- JS Files

    ============================================ -->

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'/></script>

	<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'/></script>

	<script>//<![CDATA[

        if (address_2 = localStorage.getItem('address_2_saved')) {

          $('select[name="quan-huyen"] option').each(function() {

            if ($(this).text() == address_2) {

              $(this).attr('selected', '')

            }

          })

          $('input.billing_address_2').attr('value', address_2)

        }

        if (district = localStorage.getItem('district')) {

          $('select[name="quan-huyen"]').html(district)

          $('select[name="quan-huyen"]').on('change', function() {

            var target = $(this).children('option:selected')

            target.attr('selected', '')

            $('select[name="quan-huyen"] option').not(target).removeAttr('selected')

            address_2 = target.text()

            $('input.billing_address_2').attr('value', address_2)

            district = $('select[name="quan-huyen"]').html()

            localStorage.setItem('district', district)

            localStorage.setItem('address_2_saved', address_2)

          })

        }

        $('select[name="tinh-tp"]').each(function() {

          var $this = $(this),

            stc = ''

          c.forEach(function(i, e) {

            e += +1

            stc += '<option value="' + i +  '">' + i + '</option>'

            $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)

            if (address_1 = localStorage.getItem('address_1_saved')) {

              $('select[name="tinh-tp"] option').each(function() {

                if ($(this).text() == address_1) {

                  $(this).attr('selected', '')

                }

              })

              $('input.billing_address_1').attr('value', address_1)

            }

            $this.on('change', function(i) {

              i = $this.children('option:selected').index() - 1

              var str = '',

                r = $this.val()

              if (r != '') {

                arr[i].forEach(function(el) {

                  str += '<option value="' + el + '">' + el + '</option>'

                  $('select[name="quan-huyen"]').html('<option value="">Quận / Huyện</option>' + str)

                })

                var address_1 = $this.children('option:selected').text()

                var district = $('select[name="quan-huyen"]').html()

                localStorage.setItem('address_1_saved', address_1)

                localStorage.setItem('district', district)

                $('select[name="quan-huyen"]').on('change', function() {

                  var target = $(this).children('option:selected')

                  target.attr('selected', '')

                  $('select[name="quan-huyen"] option').not(target).removeAttr('selected')

                  var address_2 = target.text()

                  $('input.billing_address_2').attr('value', address_2)

                  district = $('select[name="quan-huyen"]').html()

                  localStorage.setItem('district', district)

                  localStorage.setItem('address_2_saved', address_2)

                })

              } else {

                $('select[name="quan-huyen"]').html('<option value="">Quận / Huyện</option>')

                district = $('select[name="quan-huyen"]').html()

                localStorage.setItem('district', district)

                localStorage.removeItem('address_1_saved', address_1)

              }

            })

          })

        })

        //]]></script>

     <script>

        $(document).ready(function () {

            $('input[type="radio"]').click(function () {

                var inputValue = $(this).attr("value");

                var targetBox = $("." + inputValue);

                $(".box").not(targetBox).hide();

                $(targetBox).show();

            });

        });

    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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