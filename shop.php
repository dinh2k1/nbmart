<?php include_once('database/connect.php')?>
<?php ob_start() ?>
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBmart - Product page</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="NBmart-Smart Product eCommerce html Template">
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


if(isset($_REQUEST['cat']) || isset($_REQUEST['th']) || isset($_REQUEST['name'])){

	
    // Lấy thông tin lọc
    $filter  = array(
        'timcat'     => isset($_GET['cat']) ? ($_GET['cat']) : false,
        'timth'     => isset($_GET['th']) ? ($_GET['th']) : false,
        'timten'   => isset($_GET['name']) ? ($_GET['name']) : false,
    );
        // Biến lưu trữ lọc
    $where = array();

    // Nếu có chọn lọc thì thêm điều kiện vào mảng
    if ($filter['timcat']){
        $where[] = "b.category_id = '{$filter['timcat']}'";
		$link[] = "cat={$filter['timcat']}";
    }

    if ($filter['timth']){
        $where[] = "b.thuonghieu_id = '{$filter['timth']}'";
		$link[] = "b.th={$filter['timth']}";
    }

    if ($filter['timten']){
        $where[] = "sanpham_name like '%{$filter['timten']}%'";
		$link[] = "name={$filter['timten']}";
    }
        // Câu truy vấn cuối cùng
    $sql_where = '';
    if ($where){
        $sql_where .= ' WHERE '.implode(' AND ', $where);
    }
	$url = '';
	if ($link){
        $url .= 'shop.php?'.implode(' & ', $link);
    }
	

}else{
	$sql_where = '';
	$url = 'shop.php?';
}

	if(isset($_REQUEST['order-by'])){
		$order_by = 'ORDER BY '.$_REQUEST['order-by'].'';
	}else{
		$order_by = '';
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
                        <h2 class="breadcrumb-title">Cửa hàng</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Cửa hàng</li>
                        </ul><br><br><br><br>
							<?php $sql_name_page = "SELECT * FROM tbl_category a join tbl_thuonghieu b
											on a.category_id = b.category_id $sql_where";
								$row_name_page = mysqli_fetch_array(mysqli_query($con, $sql_name_page));
								if(isset($_REQUEST['cat'])){echo '<h3 class="breadcrumb-title">'.$row_name_page['category_name'].'</h3>';}
								elseif(isset($_REQUEST['th'])){echo '<h3 class="breadcrumb-title">'.$row_name_page['thuonghieu_name'].'</h3>';}
							?>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- Shop Page Start  -->
        <div class="shop-category-area pt-100px pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Shop Top Area Start -->
                        <div class="shop-top-bar d-flex">
							<?php $sql_count = "SELECT count(*) as total FROM tbl_sanpham a join tbl_thuonghieu b
											on a.thuonghieu_id = b.thuonghieu_id $sql_where $order_by";
								$count = mysqli_fetch_array(mysqli_query($con, $sql_count));
							?>
                            <p class="compare-product"><span>Tìm được</span><?php echo $count['total']; ?><span>kết quả</span></p>
                            <!-- Left Side End -->
                            <div class="select-shoing-wrap d-flex align-items-center">
                                <div class="shot-product">
                                    <p>Sắp Xếp</p>
                                </div>
                                <!-- Single Wedge End -->
                                <div class="header-bottom-set dropdown">
                                    <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">Mặc định<i class="fa fa-angle-down"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a class="dropdown-item" href="<?php echo $url?>&order-by=sanpham_name ASC" >Tên, A - Z</a></li>
                                        <li><a class="dropdown-item" href="<?php echo $url?>&order-by=sanpham_name DESC">Tên, Z - A</a></li>
                                        <li><a class="dropdown-item" href="<?php echo $url?>&order-by=sanpham_gia ASC">Giá, thấp - cao</a></li>
                                        <li><a class="dropdown-item" href="<?php echo $url?>&order-by=sanpham_gia DESC">Giá, cao to thấp</a></li>
                                        <li><a class="dropdown-item" href="<?php echo $url?>&order-by=sanpham_id DESC">Mới</a></li>
                                        <li><a class="dropdown-item" href="<?php echo $url?>&order-by=sanpham_giakhuyenmai DESC">Khuyến mãi</a></li>
                                    </ul>
                                </div>
                                <!-- Single Wedge Start -->
                            </div>
                            <!-- Right Side End -->
                        </div>
                        <!-- Shop Top Area End -->
                        <!-- Shop Bottom Area Start -->
                        <div class="shop-bottom-area">
                            <!-- Tab Content Area Start -->
                            <div class="row">
                                <div class="col">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="shop-grid">
                                            <div class="row mb-n-30px">
<?php

$rowperpage = 15;

// counting total number of posts
$allcount_query = "SELECT count(*) as allcount FROM tbl_sanpham $order_by";
$allcount_result = mysqli_query($con,$allcount_query);
$allcount_fetch = mysqli_fetch_array($allcount_result);
$allcount = $allcount_fetch['allcount'];

// select first 3 posts
$query = "SELECT *,ceil(100-(100/sanpham_gia*sanpham_giakhuyenmai)) as phantram FROM tbl_sanpham a join tbl_thuonghieu b
on a.thuonghieu_id = b.thuonghieu_id $sql_where $order_by limit 0,$rowperpage ";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)){
	$id = $row['sanpham_id'];
?>
	<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px post " id="post_<?php echo $id; ?>">
                                                    <!-- Single Prodect -->
<div class="product">
	
  <span class="badges">
  <?php 	
  if(($row['sanpham_giakhuyenmai'])>0){ ?>

      <?php if($row['sanpham_soluong'] == 0)
          {echo '<span class="new" style="background-color:red;">Hết hàng</span>';} ?>
      <span class="sale">-<?php echo $row['phantram']; ?>%</span>
      <span class="new">New</span>

  <?php }else{ ?>

      <?php if($row['sanpham_soluong'] == 0)
          {echo '<span class="new" style="background-color:red;">Hết hàng</span>';} ?>
      <span class="new">New</span>

  <?php } ?>
  </span>

  <div class="thumb">
  <?php 
    echo('<a href="single-product.php?id='.$row['sanpham_id'].'" class="image">
            <img src="assets/images/product-image/'.$row['sanpham_image'].'" alt="Product" />
            <img class="hover-image" src="assets/images/product-image/'.$row['sanpham_image'].'" alt="Product" />
          </a> ');
  ?>
  </div>

  <div class="content">
      <?php 
      echo ('<span class="category"><a href="shop.php?th='.$row['thuonghieu_id'].'">'.$row['thuonghieu_name'].'</a></span>');
      echo ('<h5 class="title"><a href="single-product.php?id='.$row['sanpham_id'].'">'.$row['sanpham_name'].'</a></h5>');
      ?>

      <span class="price">
      <?php
      if(($row['sanpham_giakhuyenmai'])>0){
          echo('
          <span class="old">'.currency_format($row['sanpham_gia']).'</span>
          <span class="new">'.currency_format($row['sanpham_giakhuyenmai']).'</span>
          ');
      }else{
          echo('
          <span class="new">'.currency_format($row['sanpham_gia']).'</span>');
          }
          ?>
      </span>
  </div>
  <div class="actions" >
          <form <?php if($row['sanpham_soluong'] == 0 ){echo 'style="display:none;" ';} ?>>
          <button 
                  name="id_addcart" 
                  id="id_addcart<?php echo $row['sanpham_id']?>" 
                  value="<?php echo $row['sanpham_id']?>"  
                  title="Thêm vào giỏ" class="action add-to-cart" 
                  onclick="return click_add_cart<?php echo $row['sanpham_id']?>();"
                  data-bs-target="#exampleModal-Cart<?php echo $row['sanpham_id']?>"
                  data-bs-toggle="modal" ><i class="pe-7s-shopbag"></i>
          </button>
          </form>
          &emsp;
          <form>
          <button 
                  name="id_yeuthich" 
                  id="id_yeuthich<?php echo $row['sanpham_id']?>" 
                  value="<?php echo $row['sanpham_id']?>" 
                  title="Thêm yêu thích" class="action wishlist"
                  onclick="return click_yeu_thich<?php echo $row['sanpham_id']?>();"  
                  data-bs-target="#exampleModal-Wishlist<?php echo $row['sanpham_id']?>"
                  data-bs-toggle="modal"><i class="pe-7s-like"></i>
          </button>
          </form>
          &emsp;
          <button 
                  class="action quickview" 
                  data-link-action="quickview" 
                  title="Quick view" data-bs-toggle="modal" 
                  data-bs-target="#exampleModal<?php echo $row['sanpham_id']?>">
                  <i class="pe-7s-look"></i>
          </button>
  </div>
</div>
                                                </div>												

<?php
}
?>
<center>
<h1 class="load-more">Xem thêm</h1>
<input type="hidden" id="row" value="0">
<input type="hidden" id="all" value="<?php echo $allcount; ?>">
<input type="hidden" id="order_by" value="<?php echo $order_by;?>">
<input type="hidden" id="where" value="<?php echo $where;?>">
</center>
												
												


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Shop Bottom Area End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Page End  -->
        <!-- Footer Area Start -->
		<?php include('include/footer.php')?>
        <!-- Footer Area End -->
    </div>
	
<?php include_once('xuly/show-addcart.php')?>

	
<?php
$sql_id = mysqli_query($con,'SELECT * FROM tbl_sanpham ');
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
<?php
$sql_id = mysqli_query($con,'SELECT * FROM tbl_sanpham ');
            while($row_id = mysqli_fetch_array($sql_id)) {?>
									
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js">
</script>
<script type="text/javascript">
function click_yeu_thich<?php echo $row_id['sanpham_id']?>(){
var id_yeuthich=document.getElementById('id_yeuthich<?php echo $row_id['sanpham_id']?>').value;
$.ajax({
        type:"post",
        url:"xuly/xuly-addcart.php",
        data: 
        {  
           'id_yeuthich' :id_yeuthich

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
<p id="msg"></p>	
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
	<script src="assets/js/jquery-1.12.0.min.js" type="text/javascript"></script>
    <script src="assets/js/script.js"></script>
    <!-- Minify Version -->
    <!-- <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/main.min.js"></script> -->

    <!--Main JS (Common Activation Codes)-->
    <script src="assets/js/main.js"></script>
</body>

</html>