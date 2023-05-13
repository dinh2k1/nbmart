<!-- OffCanvas Cart Start (giỏ hàng)-->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Giỏ hàng</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
<?php
// phần hiển thị sản phẩm trong giỏ
if(isset($_SESSION['id'])){
	$sql_id_addcart = mysqli_query($con,'SELECT * FROM tbl_giohang a join tbl_sanpham b on a.sanpham_id = b.sanpham_id
										WHERE khachhang_id = '.$_SESSION['id'].' ');
    	while($row_id_addcart = mysqli_fetch_array($sql_id_addcart)) {
?>
		<li>
            <a href="single-product.php?id=<?php echo $row_id_addcart['sanpham_id'] ?>?id=" class="image"><img src="assets/images/product-image/<?php echo $row_id_addcart['sanpham_image']?>" alt="Cart product Image"></a>
            <div class="content">
                <a href="single-product.php?id=<?php echo $row_id_addcart['sanpham_id'] ?>" class="title"><?php echo $row_id_addcart['sanpham_name']?></a>
				
				<?php if($row_id_addcart['sanpham_giakhuyenmai'] > 0 ){ ?>
			
				
                <span class="quantity-price"><?php echo $row_id_addcart['soluong']?> x 
					<span class="amount"><?php echo currency_format($row_id_addcart['sanpham_giakhuyenmai']); ?></span><br>
					<span class="old-price"><?php echo currency_format($row_id_addcart['sanpham_gia']); ?></span>
				</span>
				 
				<?php }else{ ?>
				
				<span class="quantity-price"><?php echo $row_id_addcart['soluong']?> x 
					<span class="amount"><?php echo currency_format($row_id_addcart['sanpham_gia']); ?></span><br>
				</span>
			
				<?php } ?>
                <a href="?del-cart=<?php echo $row_id_addcart['giohang_id'] ?>" class="remove">×</a>
            </div>
    	</li>		
<?php } ?>
<?php 
	
	if (isset($_REQUEST['del-cart'])){
		$id_cart = $_REQUEST['del-cart'];
		$sql_del_cart = "DELETE FROM `tbl_giohang` WHERE `tbl_giohang`.`giohang_id` =  $id_cart;";
		$del_cart = mysqli_query($con, $sql_del_cart);
		if($del_cart){echo header("refresh: 0 url = ?");}
	}	
?>	
	
<?php	
}else{
	$sql_id_addcart = mysqli_query($con,'SELECT * FROM tbl_sanpham ');
    	while($row_id_addcart = mysqli_fetch_array($sql_id_addcart)) {
			if(isset($_SESSION['id_addcart'.$row_id_addcart['sanpham_id'].''])){


?>
	<li>
        <a href="single-product.php?id=<?php echo $row_id_addcart['sanpham_id'] ?>" class="image"><img src="assets/images/product-image/<?php echo $row_id_addcart['sanpham_image']?>" alt="Cart product Image"></a>
        <div class="content">
            <a href="single-product.php?id=<?php echo $row_id_addcart['sanpham_id'] ?>" class="title"><?php echo $row_id_addcart['sanpham_name']?></a>
			
				<?php if($row_id_addcart['sanpham_giakhuyenmai'] > 0 ){ ?>
			
				
                <span class="quantity-price"><?php echo $_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].''];?> x 
					<span class="amount"><?php echo currency_format($row_id_addcart['sanpham_giakhuyenmai']); ?></span><br>
					<span class="old-price"><?php echo currency_format($row_id_addcart['sanpham_gia']); ?></span>
				</span>
				 
				<?php }else{ ?>
				
				<span class="quantity-price"><?php echo $_SESSION['sl_addcart'.$row_id_addcart['sanpham_id'].''];?> x 
					<span class="amount"><?php echo currency_format($row_id_addcart['sanpham_gia']); ?></span><br>
				</span>
			
				<?php } ?>
             <a href="?del-cart=<?php echo $_SESSION['id_addcart'.$row_id_addcart['sanpham_id'].''] ?>" class="remove">×</a>
        </div>
    </li>	
				
<?php
			}
		}
	
	
        if (isset($_REQUEST['del-cart'])){
            $id_cart = $_REQUEST['del-cart'];
			unset($_SESSION['id_addcart'.$id_cart.'']);
            echo header("refresh: 0 url = ?");
        }		
	
	}
?>			
            </ul>
        </div>
        <div class="foot">
            <div class="buttons mt-30px">
				<a href="cart.php" class="btn btn-outline-dark current-btn">Giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<!-- OffCanvas Cart End (giỏ hàng) -->