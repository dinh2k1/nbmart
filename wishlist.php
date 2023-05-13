<?php include_once('database/connect.php')?>

<?php ob_start() ?>

<!DOCTYPE html>

<html lang="zxx" dir="ltr">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hmart - wishlist page</title>

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

                        <h2 class="breadcrumb-title">Yêu thích</h2>

                        <!-- breadcrumb-list start -->

                        <ul class="breadcrumb-list">

                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>

                            <li class="breadcrumb-item active">Yêu thích</li>

                        </ul>

                        <!-- breadcrumb-list end -->

                    </div>

                </div>

            </div>

        </div>

        <!-- breadcrumb-area end -->

        <!-- wishlist Area Start -->

	<?php 	

if(isset($_SESSION['id'])){

$id_check = $_SESSION['id'];

$check_yeuthich = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `tbl_yeuthich` WHERE khachhang_id = $id_check ;"));

    if(!empty($check_yeuthich)){

        $check_wishlist = 1;

    }else{

        $check_wishlist = 0;

    }

}else{

	$check_wishlist = 0;

}





if($check_wishlist == 0){ ?>

	

	      <div class="thank-you-area">

            <div class="container">

                <div class="row justify-content-center align-items-center">

                    <div class="col-md-8">

                        <div class="inner_complated">

                            <div class="img_cmpted"><img src="assets/images/icons/wishlist.png" alt="" width="50%"></div>

                            <h2 class="dsc_cmpted">Yêu thích đang trống<br></h2>

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

<style>
	.wishlist-addcart{
		border-radius: 5px;
	}
</style>

        <!-- Wishlist Area Start -->
        <div class="cart-main-area pt-100px pb-100px">
            <div class="container">
                <h3 class="cart-page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Add To Cart</th>
											<th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
										
										
<?php

// phần hiển thị sản phẩm trong giỏ

if(isset($_SESSION['id'])){

	$sql_id_wishlist = mysqli_query($con,'SELECT * FROM tbl_yeuthich a join tbl_sanpham b on a.sanpham_id = b.sanpham_id

										WHERE khachhang_id = '.$_SESSION['id'].' ');

    	while($row_id_wishlist = mysqli_fetch_array($sql_id_wishlist)) {

?>										
                                        <tr>
                                            <td class="product-thumbnail">
                								<a href="single-product.php?id=<?php echo $row_id_wishlist['sanpham_id'] ?>"><img class="img-responsive ml-15px" 
								 					src="assets/images/product-image/<?php echo $row_id_wishlist['sanpham_image'] ?>" alt="" /></a>
           			 						</td>
                                            <td class="product-name"><a href="single-product.php?id=<?php echo $row_id_wishlist['sanpham_id'] ?>">
												<?php echo $row_id_wishlist['sanpham_name'] ?></a>
											</td>
											
                                           <td class="product-price-cart">
											   
                                                <?php if($row_id_wishlist['sanpham_giakhuyenmai'] > 0 ){ ?>     

                                                    <span class="amount"><?php echo currency_format($row_id_wishlist['sanpham_giakhuyenmai']); ?></span><br>

                                                    <span class="old-price"><?php echo currency_format($row_id_wishlist['sanpham_gia']); ?></span>

                                                <?php }else{ ?>

                                                    <span class="amount"><?php echo currency_format($row_id_wishlist['sanpham_gia']); ?></span><br>

                                                <?php } ?>

											</td>
                                            <td class="product-wishlist-cart">
                                                <form <?php if($row_id_wishlist['sanpham_soluong'] == 0 ){echo 'style="display:none;" ';} ?>>
                                                	<button 
                                                        name="id_addcart" 
                                                        id="id_addcart<?php echo $row_id_wishlist['sanpham_id']?>" 
                                                        value="<?php echo $row_id_wishlist['sanpham_id']?>"  
                                                        title="Thêm vào giỏ" class="action add-to-cart wishlist-addcart" style="background-color: #1B73C5;" 
                                                        onclick="return click_add_cart<?php echo $row_id_wishlist['sanpham_id']?>();"
                                                        data-bs-target="#exampleModal-Cart<?php echo $row_id_wishlist['sanpham_id']?>"
                                                        data-bs-toggle="modal" >Thêm vào giỏ
                                                	</button>
                                                </form>
                                            </td>
											<td class="product-remove">
                								<a href="?del-cart=<?php echo $row_id_wishlist['yeuthich_id'] ?>"><i class="fa fa-times"></i></a>
            								</td>
                                        </tr>
									
<?php }
			}?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist Area End -->

		

<?php } ?>	

        <!-- wishlist Area End -->

        <!-- Footer Area Start -->

		<?php include('include/footer.php')?>

        <!-- Footer Area End -->

    </div>

<?php 

	

?>

<?php include_once('xuly/show-addcart.php')?>
	
<?php
$sql_id = mysqli_query($con,'SELECT * FROM tbl_sanpham');
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

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'/></script>

	<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'/></script>

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