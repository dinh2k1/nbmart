<!-- Header top area start -->
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <div class="welcome-text">
                        <li><a href="tel:0123456789"><i class="fa fa-phone"></i> 0902732173</a></li>
						<li>&ensp;|&ensp;</li>
						<li><a href="order-tracking.php"><i class="fa fa-search" aria-hidden="true"></i> Tìm đơn hàng</a></li>
						<li>&ensp;|&ensp;</li>
						<li><a class="single-link" href="mailto:demo@example.com"><i class="fa fa-comment" aria-hidden="true"></i>Phản hồi</a></li>	
                    </div>
                </div>
                <div class="col d-none d-lg-block">
                    <div class="top-nav">
                        <ul>
	
<?php 
//Phần topbar, check đăng nhập, nếu đã đăng nhập: hiện tên, ko: hiện link đăng nhập.
//Check xem tài khoản này là khách hàng hay admin. Nếu là admin thì note(admin) + link admin-quanly.php
if(isset($_SESSION['phone'])){

  $dn_phone = $_SESSION['phone'];
  $row_dn= mysqli_fetch_array( mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE phone = '$dn_phone'"));
  $count_kh = mysqli_num_rows( mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE phone = '$dn_phone'"));
	
  if($count_kh >0){
	  if($row_dn['phan_quyen'] == 1){
		  echo "<li><a> Hello " . $_SESSION['name'].'(ADMIN)'." </a></li>";
		  echo ('<li><a href="my-account.php">Tài Khoản</a></li>');
		  echo ('<li><a href="admin-quanly.php">Quản lý</a></li>');
		  echo ('<li><a href="xuly/xuly-dangxuat.php">Đăng xuất</a></li>');
	  }else{
          echo "<li><a> Hello " . $_SESSION['name']. " </a></li>";
          echo ('<li><a href="my-account.php">Tài Khoản</a></li>');
          echo ('<li><a href="xuly/xuly-dangxuat.php">Đăng xuất</a></li>');
	  }
		  
  }else{ echo('<li><a href="login.php">Đăng nhập / Đăng ký</a></li>'); }
			
}else{ echo('<li><a href="login.php">Đăng nhập / Đăng ký</a></li>');}
		

//kết thúc phần topbar đăng nhập
?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header top area end -->
    <!-- Header action area start -->
    <div class="header-bottom  d-none d-lg-block">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col">
                    <div class="header-logo">
                        <a href="index.php"><img src="assets/images/logo/logo.png" alt="Site Logo" width="100%;"/></a>
                    </div>
                </div>
				<!-- thanh tìm kiếm -->
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="search-element">
                        <form action="shop.php" method="get">
                            <input type="text" placeholder="Search" name="name"/>
                            <button name=""><i class="pe-7s-search"></i></button>
                        </form>
                    </div>
                </div>
				<!-- kết thúc thanh tìm kiếm -->
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
// phần đếm xem có bao nhiêu sản phẩm trong giỏ hàng.
// nếu ko có session id: chưa đăng nhập.
if(isset($_SESSION['id'])){

	$sql_count_addcart = mysqli_query($con,'SELECT COUNT(sanpham_id) as total FROM tbl_giohang WHERE khachhang_id = '.$_SESSION['id'].' ');
    	$row_count_addcart = mysqli_fetch_array($sql_count_addcart);
		echo $row_count_addcart['total'];
}else{
	
	//chưa đăng nhập thì sẽ dùng session để add giỏ hàng.
	//đếm xem có bao nhiêu sản phẩm đã add
	$sql_count_addcart = mysqli_query($con,'SELECT * FROM tbl_sanpham ');
		$x = 0;
    	while($row_count_addcart = mysqli_fetch_array($sql_count_addcart)) {
			if(isset($_SESSION['id_addcart'.$row_count_addcart['sanpham_id'].''])){
				$x = $x +1;
			}
		}
		echo($x);
}
// kết thúc đếm số lượng giỏ hàng
?>	
								
							</span>
                        </a>
                        <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                            <i class="pe-7s-menu"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header action area end -->
    <!-- header navigation area start -->
	<!-- Phần menu -->
    <div class="header-nav-area d-none d-lg-block sticky-nav">
        <div class="container">
            <div class="header-nav">
                <div class="main-menu position-relative">
                    <ul>
						<li class="dropdown"><a href="index.php">Trang Chủ</a></li>
                        <li class="dropdown position-static"><a href="shop.php">Cửa Hàng <i class="fa fa-angle-down"></i></a>
                            <ul class="mega-menu d-block">
                                <li class="d-flex">
									<?php 
                    				$sql_cat = mysqli_query($con,'SELECT * FROM tbl_category');
									while($row_cat = mysqli_fetch_array($sql_cat)) { 
									
                                    echo('<ul class="d-block p-0 border-0">
                                        <li class="title"><a href="shop.php?cat='.$row_cat['category_id'].'">'.$row_cat['category_name'].'</a></li>');
										$sql_th = mysqli_query($con,'SELECT * FROM tbl_thuonghieu WHERE category_id ='.$row_cat['category_id'].'');
										while($row_th = mysqli_fetch_array($sql_th)) { 	
                                        echo('<li><a href="shop.php?th='.$row_th['thuonghieu_id'].'">'.$row_th['thuonghieu_name'].'</a></li>');}
                                    echo('</ul>');
									}?>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown "><a href="blog-grid.php">Tin Công Nghệ <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
								<?php $sql_dm_bv = mysqli_query($con,"SELECT * FROM `tbl_danhmuc_baiviet`");
												while($row_dm_bv= mysqli_fetch_array($sql_dm_bv)) { ?>
                                <li><a href="blog-grid.php?id=<?php echo $row_dm_bv['danhmuc_id'] ?>">
									<?php echo $row_dm_bv['danhmuc_name'];?></li>
								<?php }?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
	<!-- kêt thúc Phần menu -->
    <!-- header navigation area end -->