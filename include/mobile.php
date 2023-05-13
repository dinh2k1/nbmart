<!-- menu cho giao diện MOBILE-->
<!-- OffCanvas Menu Start MOBILE-->
<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <button class="offcanvas-close"></button>
    <div class="user-panel">
        <ul>
            <li><a href="tel:0902732173"><i class="fa fa-phone"></i> 0902732173</a></li>
			<li><a href="order-tracking.php"><i class="fa fa-search" aria-hidden="true"></i> Tìm đơn hàng</a></li>
			<li><a href="contact.php"><i class="fa fa-comment" aria-hidden="true"></i> Phản hồi</a></li>	
        </ul>
    </div>
    <div class="inner customScroll">
        <div class="offcanvas-menu mb-4">
            <ul>
                <li><a href="index.php"><span class="menu-text">Trang Chủ</span></a></li>
                <li><a href="shop.php"><span class="menu-text">Cửa Hàng</span></a>
                    <ul class="sub-menu">
                        <li>
                            <?php 
                    			$sql_cat = mysqli_query($con,'SELECT * FROM tbl_category');
							    while($row_cat = mysqli_fetch_array($sql_cat)) {?>
                                    <?php echo ('<a href="shop.php?cat='.$row_cat['category_id'].'"><span class="menu-text">'.$row_cat['category_name'].' </span></a> '); ?>
                                    <ul class="sub-menu">
                                        <?php 
										    $sql_th = mysqli_query($con,'SELECT * FROM tbl_thuonghieu WHERE category_id ='.$row_cat['category_id'].'');
										    while($row_th = mysqli_fetch_array($sql_th)) {
                                                echo ('<li><a href="shop.php?th='.$row_th['thuonghieu_id'].'">'.$row_th['thuonghieu_name'].'</a></li>');
                                            }
                                        ?>
                                        
                                    </ul>
                            <?php
                                }
                            ?>
                            
                            
                        </li>
                    </ul>
                </li>
                <li><a href="blog-grid.php"><span class="menu-text">Tin Công Nghệ</span></a>
                    <ul class="sub-menu">
								<?php $sql_dm_bv = mysqli_query($con,"SELECT * FROM `tbl_danhmuc_baiviet`");
												while($row_dm_bv= mysqli_fetch_array($sql_dm_bv)) { ?>
                                <li><a href="blog-grid.php?id=<?php echo $row_dm_bv['danhmuc_id'] ?>">
									<?php echo $row_dm_bv['danhmuc_name'];?></a></li>
								<?php }?>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- OffCanvas Menu End -->
        <div class="offcanvas-social mt-auto">
            <ul>
                <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-google"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- OffCanvas Menu End MOBILE-->
<!-- Phần tìm kiếm cho mobile -->
<div class="mobile-search-box d-lg-none">
    <div class="container">
        <!-- mobile search start -->
        <div class="search-element max-width-100">
            <form action="shop.php" method="get">
                            <input type="text" placeholder="Search" name="name"/>
                            <button name=""><i class="pe-7s-search"></i></button>
                        </form>
        </div>
        <!-- mobile search start -->
    </div>
</div>
<!-- Phần tìm kiếm cho mobile -->
<!-- Giao diện mobile Header action area start MOBILE -->
<div class="header-bottom d-lg-none sticky-nav style-1">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-3 col">
                <div class="header-logo">
                    <a href="index.php"><img src="assets/images/logo/logo.png" alt="Site Logo" width="100%;"/></a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div class="search-element">
                    <form action="#">
                        <input type="text" placeholder="Search" />
                        <button><i class="pe-7s-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col">
                <div class="header-actions">
                    <!-- Single Wedge Start -->
                    <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
                        <i class="pe-7s-like"></i>
                    </a>
                    <!-- Single Wedge End -->
                    <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                        <i class="pe-7s-shopbag"></i>
                        <span class="header-action-num">	
<?php
// phần đếm giỏ hàng nhưng là giao diện mobile 
if(isset($_SESSION['id'])){

$sql_count_addcart = mysqli_query($con,'SELECT COUNT(sanpham_id) as total FROM tbl_giohang WHERE khachhang_id = '.$_SESSION['id'].' ');
    $row_count_addcart = mysqli_fetch_array($sql_count_addcart);
    echo $row_count_addcart['total'];
}else{


$sql_count_addcart = mysqli_query($con,'SELECT * FROM tbl_sanpham ');
    $x = 0;
    while($row_count_addcart = mysqli_fetch_array($sql_count_addcart)) {
        if(isset($_SESSION['id_addcart'.$row_count_addcart['sanpham_id'].''])){
            $x = $x +1;
        }
    }
    echo($x);
}
// kết thúc đếm giỏ hàng giao diện mobile
?>								

                        </span>
                        <!-- <span class="cart-amount">€30.00</span> -->
                    </a>
                    <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                        <i class="pe-7s-menu"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Giao diện mobile  Header action area end -->