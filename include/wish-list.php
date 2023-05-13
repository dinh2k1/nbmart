<!-- OffCanvas Wishlist Start (sản phẩm yêu thích) -->

<div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">

    <div class="inner">

        <div class="head">

            <span class="title">Sản phẩm yêu thích</span>

            <button class="offcanvas-close">×</button>

        </div>

        <div class="body customScroll">

            <ul class="minicart-product-list">

<?php

//phần hiển thị sản phẩm yêu thích

if(isset($_SESSION['id'])){

	$sql_id_addcart = mysqli_query($con,'SELECT * FROM tbl_yeuthich a join tbl_sanpham b on a.sanpham_id = b.sanpham_id

										WHERE khachhang_id = '.$_SESSION['id'].' ');

    	while($row_id_addcart = mysqli_fetch_array($sql_id_addcart)) {

?>

		<li>

            <a href="single-product.php" class="image"><img src="assets/images/product-image/<?php echo $row_id_addcart['sanpham_image']?>" alt="Cart product Image"></a>

            <div class="content">

                <a href="single-product.php" class="title"><?php echo $row_id_addcart['sanpham_name']?></a>

                <span class="quantity-price"> 

                    <span class="amount"><?php echo currency_format($row_id_addcart['sanpham_gia']);?></span></span>

                <a href="?del-cart=<?php echo $row_id_addcart['yeuthich_id'] ?>" class="remove">×</a>

            </div>

    	</li>		

<?php			

		}

	

	if (isset($_REQUEST['del-cart'])){

		$id_cart = $_REQUEST['del-cart'];

		$sql_del_cart = "DELETE FROM `tbl_yeuthich` WHERE `tbl_yeuthich`.`yeuthich_id` =  $id_cart;";

		$del_cart = mysqli_query($con, $sql_del_cart);

		if($del_cart){echo header("refresh: 0 url = ?");}

	}	

	

}else{

 

?>

	<li>Bạn chưa đăng nhập, Đăng nhập tại&ensp;<a href="login.php">Đây</a></li>



<?php } // kết thúc sản phẩm yêu thích?>			

            </ul>

        </div>

        <div class="foot">

            <div class="buttons">

                <a href="wishlist.php" class="btn btn-dark btn-hover-primary mt-30px">Sản phẩm yêu thích</a>

            </div>

        </div>

    </div>

</div>

<!-- OffCanvas Wishlist End (sản phẩm yêu thích) -->