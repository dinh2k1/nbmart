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
        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                     
<?php 
//Phần topbar, check đăng nhập, nếu đã đăng nhập: hiện tên, ko: hiện link đăng nhập.
//Check xem tài khoản này là khách hàng hay admin. Nếu là admin thì note(admin) + link admin-quanly.php
	
if(isset($_SESSION['phone'])){
	$dn_phone = $_SESSION['phone'];
	$row_admin_dn= mysqli_fetch_array( mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE phone = '$dn_phone'"));
	
	if($_SESSION['phone'] == $row_admin_dn['phone'] && $_SESSION['password'] = $row_admin_dn['password'] && $row_admin_dn['phan_quyen'] == 1){
        echo "<h2>
		<a>Hello&ensp; <i class='fa fa-user-circle-o' aria-hidden='true'></i> ".$_SESSION['name']."(admin)
		</a>&ensp;<a href='xuly/xuly-dangxuat.php'>Đăng xuất 
		<i class='fa fa-sign-out' aria-hidden='true'></i> </a>
			</h2>";
	}else{

		echo('<script>alert("Bạn không được phép truy cập trang này")</script>');	
		echo header("refresh:0; url='index.php'");
		
		}
}else{
	
	echo header("refresh:0; url='index.php'");	
	echo('<script>alert("Bạn không được phép truy cập trang này")</script>');
	
}
	
//kết thúc phần topbar đăng nhập
?>
	
                      
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">ADMIN</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
            <br>
            <ul class="product-tab-nav nav justify-content-start align-items-center">
                <li class="nav-item"><button class="nav-link"><a href="?ql-sp">Quản lý <br> sản phẩm</a></button>
                </li>
                <li class="nav-item"><button class="nav-link"><a href="?ql-dm">Quản lý <br> danh mục</a></button>
                </li>
                <li class="nav-item"><button class="nav-link"><a href="?ql-th">Quản lý <br> thương hiệu</a></button>
                </li>
                <li class="nav-item"><button class="nav-link"><a href="?ql-kh">Quản lý <br> khách hàng</a></button>
                </li>
                <li class="nav-item"><button class="nav-link"><a href="?ql-dh">Quản lý <br> Đơn hàng</a></button>
                </li>
                <li class="nav-item"><button class="nav-link"><a href="?ql-mgg">Quản lý <br> Mã giảm giá</a></button>
                </li>
                <li class="nav-item"><button class="nav-link"><a href="?ql-tcn">Quản lý <br>  tin công nghệ</a></button>
                </li>
                <li class="nav-item"><button class="nav-link"><a href="?ql-bl">Quản lý <br> Bình luận</a></button>
                </li>
            </ul>
        </div>
        <!-- breadcrumb-area end -->
		
		<?php 
			     if(isset($_REQUEST['ql-sp']))  { include('admin/quanly-sanpham.php');
			}elseif(isset($_REQUEST['ql-dm']))  { include('admin/quanly-danhmuc.php');
			}elseif(isset($_REQUEST['ql-th']))  { include('admin/quanly-thuonghieu.php');
			}elseif(isset($_REQUEST['ql-kh']))  { include('admin/quanly-khachhang.php');
			}elseif(isset($_REQUEST['ql-dh']))  { include('admin/quanly-donhang.php');
			}elseif(isset($_REQUEST['ql-mgg']))  { include('admin/quanly-magiamgia.php');
			}elseif(isset($_REQUEST['ql-tcn']))  { include('admin/quanly-tincongnghe.php');
												  
			}elseif(isset($_REQUEST['add-sp'])) { include('admin/admin-xuly/add-sanpham.php');
			}elseif(isset($_REQUEST['add-th'])) { include('admin/admin-xuly/add-thuonghieu.php');
			}elseif(isset($_REQUEST['add-dm'])) { include('admin/admin-xuly/add-category.php');
			}elseif(isset($_REQUEST['add-mgg'])) { include('admin/admin-xuly/add-magiamgia.php');	
												 
			}elseif(isset($_REQUEST['edit-sp'])){ include('admin/admin-xuly/edit-sanpham.php');
			}elseif(isset($_REQUEST['edit-dm'])){ include('admin/admin-xuly/edit-category.php');
			}elseif(isset($_REQUEST['edit-th'])){ include('admin/admin-xuly/edit-thuonghieu.php');
			}elseif(isset($_REQUEST['edit-mgg'])){ include('admin/admin-xuly/edit-magiamgia.php'); 									 
			}
		?>

<?php
		
if(isset($_REQUEST['add-sp-submit'])){

 // Kiểm tra xem tệp đã được tải lên mà không có lỗi hay không
if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png" , "webp" => "image/webp");
    $filename = $_FILES["image"]["name"];
    $filetype = $_FILES["image"]["type"];
    $filesize = $_FILES["image"]["size"];

    // Xác minh phần mở rộng tệp
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!array_key_exists($ext, $allowed)) die("Lỗi: Vui lòng chọn định dạng tệp hợp lệ.");

    // Xác minh kích thước tệp - tối đa 5MB
    $maxsize = 5 * 1024 * 1024;
    if($filesize > $maxsize) die("Lỗi: Kích thước tệp lớn hơn giới hạn cho phép.");

} else{
    $filename = '';
}

	
	$tensp = $_REQUEST['ten-sp'];
	$giasp = $_REQUEST['gia-sp'];
	$giakm = $_REQUEST['gia-km-sp'];
	$mtsp = $_REQUEST['mota-sp'];
	$ctsp = $_REQUEST['chitiet-sp'];
	$slsp = $_REQUEST['soluong-sp'];
	$iddm = $_REQUEST['danhmuc-sp'];
	$idth = $_REQUEST['thuonghieu-sp'];
	

            $sql_addsp ="INSERT INTO `tbl_sanpham` (`sanpham_id`, `thuonghieu_id`, `sanpham_name`, `sanpham_chitiet`, `sanpham_mota`, `sanpham_gia`, `sanpham_giakhuyenmai`, `sanpham_soluong`, `sanpham_image`, `sanpham_thuvien`) 
                        VALUES 
                        (NULL,'$idth', '$tensp', '$ctsp', '$mtsp', '$giasp' , '$giakm', $slsp, '$filename', '$tensp')";

			$addsp = mysqli_query($con, $sql_addsp);
			$dir = ("./assets/images/product-image/thuvien-hinhanh/$tensp");
			if(!file_exists($dir)){
    			if(mkdir($dir)){echo 'Đã tạo thư viện sản phẩm';}else{ echo 'Lỗi không thể tạo thư viện sản phẩm';}
			}
	
			if(!$addsp){
				echo('<script>alert("Error")</script>');
			}else{
				
// Xác minh loại MIME của tệp
if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
    if(in_array($filetype, $allowed)){
        // Kiểm tra xem tệp có tồn tại hay không trước khi tải lên
        if(file_exists("assets/images/product-image/" . $filename)){
			echo ('<script>alert("Đã thêm sản phẩm, Chú ý: tệp đã tồn tại")</script>');
        } else{
            //echo $_FILES["image"]["tmp_name"];
            if(move_uploaded_file($_FILES["image"]["tmp_name"], "assets/images/product-image/" . $filename)){ // có thể có lỗi
                echo ('<script>alert("Đã thêm sản phẩm")</script>');
            }else{
                echo ('<script>alert("Đã thêm sản phẩm, Chú ý: Không thể di chuyển tệp đến /product-image/")</script>');
            }
        } 
    } else{
        echo ('<script>alert("Đã thêm sản phẩm, Chú ý: Sự cố khi tải tệp lên")</script>');
    }
	}else{
	echo ('<script>alert("Đã thêm sản phẩm, Chú ý: Chưa thêm ảnh sản phẩm")</script>');			
		}
}
}
?>
<?php 
if(isset($_REQUEST['add-sp-submit'])){
    $name = array();
    $tmp_name = array();
    $error = array();
    $ext = array();
    $size = array();
	$id = $_REQUEST['edit-sp'];
	$namesp = $row_sanpham_edit['sanpham_name'];
	
    foreach ($_FILES['file']['name'] as $file) {
        $name[] = $file;                            
    }
    foreach ($_FILES['file']['tmp_name'] as $file){
        $tmp_name[] = $file;
    }
    foreach ($_FILES['file']['error'] as $file){
        $error[] = $file;
    }
    foreach ($_FILES['file']['type'] as $file){
        $ext[] = $file;
    }
	
    foreach ($_FILES['file']['size'] as $file){
        $size[] = round($file/1024,2);
    } //Phần này lấy giá trị ra từng mảng nhỏ
    for ($i=0;$i<count($name);$i++){
        if ($error[$i] > 0){
            echo "Lỗi: " . $error[$i];
        }elseif ($ext[$i]!='image/jpeg' && $ext[$i]!='image/png' && $ext[$i]!='image/webp') {
             echo "File không được hổ trợ  ".$ext[$i].'<br>';
         }else {
             $temp = preg_split('/[\/\\\\]+/', $name[$i]);
             $filename = $temp[count($temp)-1];
             $upload_dir = "assets/images/product-image/thuvien-hinhanh/$namesp/";
             $upload_file = $upload_dir . $filename;
			
			 $dir = ("assets/images/product-image/thuvien-hinhanh/$namesp");
			 if(!file_exists($dir)){
    			if(mkdir($dir)){echo 'Đã tạo thư viện sản phẩm';}else{ echo 'Lỗi không thể tạo thư viện sản phẩm';}
			 }
			
             if (file_exists($upload_file)){
				 	 $sql_thuvien = mysqli_query($con,"SELECT * FROM tbl_thuvien_sanpham WHERE thuvien_image = '{$name[$i]}' and sanpham_id = '$id'");
					 $rowcount=mysqli_num_rows($sql_thuvien);
					 if($rowcount == 0){
                         $up = mysqli_query($con, "INSERT INTO `tbl_thuvien_sanpham` (`thuvien_id`,`sanpham_id`, `thuvien_image`, `thuvien_thumuc`) 
						 															 VALUES 																			
						 															 (null,$id,'{$name[$i]}','$upload_dir')");                                                            
						echo 'Đã thêm '.$name[$i].' thành công <br>' ;
					 }else{ echo'Tệp '.$name[$i].' đã tồn tại trên csdl<br>'; }
             }else{

                 if ( move_uploaded_file($tmp_name[$i], $upload_file) ) {
					 
					 $sql_thuvien = mysqli_query($con,"SELECT * FROM tbl_thuvien_sanpham WHERE thuvien_image = '{$name[$i]}' and sanpham_id = '$id'");
					 $rowcount = mysqli_num_rows($sql_thuvien);

					 if($rowcount == 0){

                         $up = mysqli_query($con, "INSERT INTO `tbl_thuvien_sanpham` (`thuvien_id`,`sanpham_id`, `thuvien_image`, `thuvien_thumuc`) 
						 															 VALUES 																			
						 														     (null,$id,'{$name[$i]}','$upload_dir')");
						 echo 'Đã thêm '.$name[$i].' thành công <br>' ;
					 }else{echo 'Tệp '.$name[$i].' đã tồn tại trên csdl<br>';}
					 
                 } else echo 'loi';
             }
         }//End khoi cau lenh up file va them vao CSDL;
     }//End vong lap for cho tat ca cac file;  
}
?>
<?php
		
if(isset($_REQUEST['update-sp-submit'])){
	$id_sp_update = $_REQUEST['update-sp-submit'] ;
	$tensp = $_REQUEST['ten-sp'];
	$giasp = $_REQUEST['gia-sp'];
	$giakm = $_REQUEST['gia-km-sp'];
	$mtsp = $_REQUEST['mota-sp'];
	$ctsp = $_REQUEST['chitiet-sp'];
	$slsp = $_REQUEST['soluong-sp'];
	$idth = $_REQUEST['thuonghieu-sp'];
	$tvsp_old = $_REQUEST['thuvien-sp-old'];
	
	
	$sql_update = "UPDATE `tbl_sanpham` SET `thuonghieu_id` = '$idth',`sanpham_name` = '$tensp', `sanpham_chitiet` = '$ctsp', `sanpham_mota` = '$mtsp', `sanpham_gia` = '$giasp', `sanpham_giakhuyenmai` = '$giakm', `sanpham_soluong` = '$slsp', `sanpham_thuvien` = '$tensp' WHERE `tbl_sanpham`.`sanpham_id` = $id_sp_update";
	$update_sp = mysqli_query($con,$sql_update);
	
    $dir = ("./assets/images/product-image/thuvien-hinhanh/$tvsp_old");
	$new_dir = ("./assets/images/product-image/thuvien-hinhanh/$tensp");
    if(file_exists($dir)){
        if(rename("$dir", "$new_dir")){echo 'Đã cập nhập thư viện sản phẩm';}else{ echo 'Lỗi không thể cập nhập thư viện sản phẩm';}
    }else{mkdir($new_dir);}
	
	if(!$update_sp){
		echo ('<script>alert("Error")</script>');
	}else{
		echo ('<script>alert("Đã thêm cập nhập sản phẩm")</script>');
		echo header("refresh:0; url='admin-quanly.php?ql-sp'");
	}
}

?>

		
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