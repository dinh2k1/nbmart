<?php include_once('database/connect.php')?>
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hmart - Điện thoại, laptop, tablet, Đồng hồ chính hãng</title>
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
        <?php 
		
		if(isset($_REQUEST['id']) && isset($_REQUEST['name'])){
			$dm_id = $_REQUEST['id'];
			$name = $_REQUEST['name'];
			$where = "WHERE danhmuc_id = $dm_id and baiviet_ten like '%$name%'";
			$link_id = "&id=$dm_id&name=$name";
			
		}elseif(isset($_REQUEST['id'])){
			$dm_id = $_REQUEST['id'];
			$where = "WHERE danhmuc_id = $dm_id";
			$link_id = "&id=$dm_id";
			
		}elseif(isset($_REQUEST['name'])){
			$name = $_REQUEST['name'];
			$where = " WHERE baiviet_ten like ";
			$link_id = "&name=$name";
			
		}else{
			$where = '';
			$link_id = '';
		}
	
        $result = mysqli_query($con, 'select count(baiviet_id) as total from tbl_baiviet '.$where.'');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 		if($total_records == 0 ){
			$sql_baiviet = mysqli_query($con, "SELECT * FROM tbl_baiviet $where");
		}else{
			$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 6;

            // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
            // tổng số trang
            $total_page = ceil($total_records / $limit);

            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }

            // Tìm Start
            $start = ($current_page - 1) * $limit;

            // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            $sql_baiviet = mysqli_query($con, "SELECT * FROM tbl_baiviet $where LIMIT $start, $limit");
		}

        ?>
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
                        <h2 class="breadcrumb-title">Tin công nghệ</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Tin công nghệ</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- Blog Area Start -->
		<div class="blog-grid pb-100px pt-100px main-blog-page single-blog-page sidebar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 order-lg-last col-md-12 order-md-first">
                        <div class="row">
							<?php 
								while($row_baiviet = mysqli_fetch_array($sql_baiviet)) { 	
							?>
                            <div class="col-lg-6 col-md-6 mb-50px">
                                <div class="single-blog">
                                    <div class="blog-image">
                                        <a href="blog-single.php?id=<?php echo $row_baiviet['baiviet_id'];?>">
											<img src="assets/images/blog-image/<?php echo $row_baiviet['baiviet_image']; ?>" 
																					 class="img-responsive w-100" alt=""></a>
                                    </div>
                                    <div class="blog-text">
                                        <div class="blog-athor-date line-height-1">
                                            <span class="blog-date"><i class="fa fa-calendar" aria-hidden="true"></i>
												<?php echo $row_baiviet['baiviet_ngaydang'];?></span>
                                            <span><a class="blog-author" href="blog-single.php?id=<?php echo $row_baiviet['baiviet_id'];?>">
												<i class="fa fa-user" aria-hidden="true"></i>
												<?php echo $row_baiviet['baiviet_tacgia'];?></a></span>
                                        </div>
                                        <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single.php?id=<?php echo $row_baiviet['baiviet_id'];?>">
											<?php echo $row_baiviet['baiviet_ten'];?></a></h5>
                                        <a href="blog-single.php?id=<?php echo $row_baiviet['baiviet_id'];?>" class="btn btn-primary blog-btn">Đọc thêm</a>
                                    </div>
                                </div>
                            </div>
							<?php } ?>
                            <!-- End single blog -->
                        </div>
                        <!--  Pagination Area Start -->
                        <div class="pro-pagination-style text-center mt-0 mb-0" data-aos="fade-up" data-aos-delay="200">
                            <div class="pages">
                                <ul>
			<?php
			if($total_records == 0 ){?>
				<h2>Không có bài viết nào bạn đang tìm!</h2>
			<?php }else{
									
                if ($current_page > 1 && $total_page > 1){
                    echo '<li class="li"><a class="page-link" href="blog-grid.php?page='.($current_page-1).'"><i class="fa fa-angle-left"></i></a></li>';
                }

                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++){
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page){
                        echo '<li class="li"><a class="page-link active">'.$i.'</a></li>';
                    }
                    else{?>
                        <li class="li"><a class="page-link" href="blog-grid.php?page=<?php echo $i.$link_id ?>"><?php echo $i ?></a></li>
                  <?php } 
                }
                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1){?>
                    <li class="li"><a class="page-link" 
                            href="blog-grid.php?page=<?php echo ($current_page+1).$link_id;?>">
                                <i class="fa fa-angle-right"></i></a></li>
            <?php }
				} ?>
                                </ul>
                            </div>
                        </div>
                        <!--  Pagination Area End -->
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="col-lg-4 order-lg-first col-md-12 order-md-last mt-md-50px mt-lm-50px" data-aos="fade-up" data-aos-delay="200">
                        <div class="blog-sidebar mr-20px">
                            <!-- Sidebar single item -->
                            <div class="search-widget">
                                <form action="#" method="post">
                                    <input placeholder="Search" type="text" name="name"/>
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!-- Sidebar single item -->
                            <!-- Sidebar single item -->
                            <div class="sidebar-widget-group">
                                <div class="sidebar-widget">
                                    <h3 class="sidebar-title">Danh mục</h3>
                                    <div class="category-post">
                                        <ul>
											<?php 
	                    						$sql_danhmuc_baiviet = mysqli_query($con,"SELECT * FROM `tbl_danhmuc_baiviet`");
												while($row_danhmuc_baiviet = mysqli_fetch_array($sql_danhmuc_baiviet)) { 
													
													$count_baiviet = mysqli_fetch_array(mysqli_query($con,'SELECT *,COUNT(baiviet_id) as sl_baiviet FROM `tbl_baiviet` WHERE danhmuc_id='.$row_danhmuc_baiviet['danhmuc_id'].''));
											?>	
                                            <li><a href="blog-grid.php?id=<?php echo $row_danhmuc_baiviet['danhmuc_id'];?>" class="">
												<?php echo $row_danhmuc_baiviet['danhmuc_name'];?><span>(<?php echo $count_baiviet['sl_baiviet'];?>)</span></a></li>
											<?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Sidebar single item -->
                                <div class="sidebar-widget">
                                    <h3 class="sidebar-title">Bài viết mới</h3>
                                    <div class="recent-post-widget">
										<?php 
											$sql_baiviet_left = mysqli_query($con,"SELECT * FROM `tbl_baiviet` ORDER BY baiviet_id DESC LIMIT 4 ");
											while($row_baiviet_left = mysqli_fetch_array($sql_baiviet_left)) { 
										?>
                                        <div class="recent-single-post d-flex">
                                            <div class="thumb-side">
                                                <a href="blog-single.php?id=<?php echo $row_baiviet_left['baiviet_id'];?>">
													<img src="assets/images/blog-image/<?php echo $row_baiviet_left['baiviet_image'];?>" alt="" /></a>
                                            </div>
                                            <div class="media-side">
                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row_baiviet_left['baiviet_ngaydang'];?></span>
                                                <h5 
													style="overflow: hidden;text-overflow: ellipsis;max-width: 90%;">
													<a href="blog-single.php?id=<?php echo $row_baiviet_left['baiviet_id'];?>">
														<?php echo $row_baiviet_left['baiviet_ten'];?></a>
                                                </h5>
                                            </div>
                                        </div>
										<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Area End -->
                </div>
            </div>
        </div>
        <!-- Blag Area End -->
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