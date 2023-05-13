<?php include_once('../../database/connect.php')?>
<?php ob_start() ?>		
<?php 
	// xử lý xóa sản phẩm.
if(isset($_REQUEST['rm-sp'])){
	
    /*id của sản phẩm cần xóa*/
    $id = $_REQUEST['rm-sp'];
    // tìm theo id ở trên
    $sql_select_sanpham = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id= $id ");
    $count = mysqli_num_rows($sql_select_sanpham);
	
if($count>0){ //nếu tìm thấy sản phẩm có id ở trên thì
    //lệnh truy vấn xóa sp
    $sql_sanpham = "DELETE FROM tbl_sanpham WHERE sanpham_id= $id "; 
    // bắt đầu xóa
	$row_sanpham = mysqli_fetch_array($sql_select_sanpham);
	$name = $row_sanpham['sanpham_name'];
	
	$files = glob('../../assets/images/product-image/thuvien-hinhanh/'.$name.'/*'); //get all file names
	foreach($files as $file){
    	if(is_file($file))
    		unlink($file); //delete file
	}	
	rmdir('../../assets/images/product-image/thuvien-hinhanh/'.$name.'');
	
    $insert_row = mysqli_query($con,$sql_sanpham);
	
    //xóa tc thì hiện lên
    if(!$insert_row){
        echo('<script>alert("Xóa sản phẩm thất bại")</script>');
        // load lại trang
        echo header("refresh:0; url='../../admin-quanly.php?ql-sp'");
    }else{
        echo('<script>alert("Xóa sản phẩm thành công")</script>');
        // load lại trang
        echo header("refresh:0; url='../../admin-quanly.php?ql-sp'");
    }


}

}// kết thúc xử lý xóa sp

if(isset($_REQUEST['rm-dm'])){
 	
			/*id của sản phẩm cần xóa*/
			$id = $_REQUEST['rm-dm'];
			// tìm theo id ở trên
 			$sql_select_category = mysqli_query($con,"SELECT * FROM tbl_category WHERE category_id= $id ");
 			$count = mysqli_num_rows($sql_select_category);
			
 		if($count>0){ //nếu tìm thấy sản phẩm có id ở trên thì
			//lệnh truy vấn xóa sp
 			$sql_category = "DELETE FROM tbl_category WHERE category_id= $id "; 
			// bắt đầu xóa
			$insert_row = mysqli_query($con,$sql_category);
			//xóa tc thì hiện lên
			if(!$insert_row){
				echo('<script>alert("Xóa danh mục thất bại")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-dm'");
			}else{
				echo('<script>alert("Xóa danh mục thành công")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-dm'");
			}
			
		
 		}

 }// kết thúc xử lý xóa sp

if(isset($_REQUEST['rm-th'])){
 	
			/*id của sản phẩm cần xóa*/
			$id = $_REQUEST['rm-th'];
			// tìm theo id ở trên
 			$sql_select_thuonghieu = mysqli_query($con,"SELECT * FROM tbl_thuonghieu WHERE thuonghieu_id= $id ");
 			$count = mysqli_num_rows($sql_select_thuonghieu);
			
 		if($count>0){ //nếu tìm thấy sản phẩm có id ở trên thì
			//lệnh truy vấn xóa sp
 			$sql_thuonghieu = "DELETE FROM tbl_thuonghieu WHERE thuonghieu_id= $id "; 
			// bắt đầu xóa
			$insert_row = mysqli_query($con,$sql_thuonghieu);
			//xóa tc thì hiện lên
			if(!$insert_row){
				echo('<script>alert("Xóa thương hiệu thất bại")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-th'");
			}else{
				echo('<script>alert("Xóa thương hiệu thành công")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-th'");
			}
			
		
 		}

 }// kết thúc xử lý xóa sp


if(isset($_REQUEST['rm-kh'])){
 	
			/*id của sản phẩm cần xóa*/
			$id = $_REQUEST['rm-kh'];
			// tìm theo id ở trên
 			$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE khachhang_id= $id ");
 			$count = mysqli_num_rows($sql_select_khachhang);
			
 		if($count>0){ //nếu tìm thấy sản phẩm có id ở trên thì
			//lệnh truy vấn xóa sp
 			$sql_khachhang = "UPDATE `tbl_khachhang` SET `note` = b'1' WHERE `tbl_khachhang`.`khachhang_id` = $id "; 
			// bắt đầu xóa
			$insert_row = mysqli_query($con,$sql_khachhang);
			//xóa tc thì hiện lên
			if(!$insert_row){
				echo('<script>alert("Cấm khách hàng thất bại")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-kh'");
			}else{
				echo('<script>alert("cấm khách hàng thành công")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-kh'");
			}
			
		
 		}

}elseif(isset($_REQUEST['re-rm-kh'])){
				/*id của sản phẩm cần xóa*/
			$id = $_REQUEST['re-rm-kh'];
			// tìm theo id ở trên
 			$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE khachhang_id= $id ");
 			$count = mysqli_num_rows($sql_select_khachhang);
			
 		if($count>0){ //nếu tìm thấy sản phẩm có id ở trên thì
			//lệnh truy vấn xóa sp
 			$sql_khachhang = "UPDATE `tbl_khachhang` SET `note` = b'0' WHERE `tbl_khachhang`.`khachhang_id` = $id "; 
			// bắt đầu xóa
			$insert_row = mysqli_query($con,$sql_khachhang);
			//xóa tc thì hiện lên
			if(!$insert_row){
				echo('<script>alert("khôi phục khách hàng thất bại")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-kh'");
			}else{
				echo('<script>alert("khôi phục khách hàng thành công")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-kh'");
			}
			
		
 		}
}

if(isset($_REQUEST['rm-mgg'])){
 	
			/*id của sản phẩm cần xóa*/
			$id = $_REQUEST['rm-mgg'];
			// tìm theo id ở trên
 			$sql_select_magiam = mysqli_query($con,"SELECT * FROM tbl_magiamgia WHERE magiam_id= $id ");
 			$count = mysqli_num_rows($sql_select_magiam);
			
 		if($count>0){ //nếu tìm thấy sản phẩm có id ở trên thì
			//lệnh truy vấn xóa sp
 			$sql_magiam = "DELETE FROM tbl_magiamgia WHERE magiam_id= $id "; 
			// bắt đầu xóa
			$insert_row = mysqli_query($con,$sql_magiam);
			//xóa tc thì hiện lên
			if(!$insert_row){
				echo('<script>alert("Xóa mã giảm giá thất bại")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-mgg'");
			}else{
				echo('<script>alert("Xóa mã giảm giá thành công")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-mgg'");
			}
			
		
 		}

 }// kết thúc xử lý xóa sp
if(isset($_REQUEST['rm-dm-bv'])){
 	
			/*id của sản phẩm cần xóa*/
			$id = $_REQUEST['rm-dm-bv'];
			// tìm theo id ở trên
 			$sql_select_danhmuc = mysqli_query($con,"SELECT * FROM tbl_danhmuc_baiviet WHERE danhmuc_id= $id ");
 			$count = mysqli_num_rows($sql_select_danhmuc);
			
 		if($count>0){ //nếu tìm thấy sản phẩm có id ở trên thì
			//lệnh truy vấn xóa sp
 			$sql_danhmuc = "DELETE FROM tbl_danhmuc_baiviet WHERE danhmuc_id= $id "; 
			// bắt đầu xóa
			$insert_row = mysqli_query($con,$sql_danhmuc);
			//xóa tc thì hiện lên
			if(!$insert_row){
				echo('<script>alert("Xóa danh mục bài viết thất bại")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-tcn&ql-dm-bv'");
			}else{
				echo('<script>alert("Xóa danh mục bài viết thành công")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-tcn&ql-dm-bv'");
			}
			
		
 		}

 }// kết thúc xử lý

if(isset($_REQUEST['rm-bv'])){
 	
			/*id của sản phẩm cần xóa*/
			$id = $_REQUEST['rm-bv'];
			// tìm theo id ở trên
 			$sql_select_baiviet = mysqli_query($con,"SELECT * FROM tbl_baiviet WHERE baiviet_id= $id ");
			$row_bv= mysqli_fetch_array($sql_select_baiviet);
			$image = $row_bv['baiviet_image'];
 			$count = mysqli_num_rows($sql_select_baiviet);
			
 		if($count>0){ //nếu tìm thấy sản phẩm có id ở trên thì
			//lệnh truy vấn xóa sp
 			$sql_baiviet = "DELETE FROM tbl_baiviet WHERE baiviet_id= $id "; 
			// bắt đầu xóa
			$insert_row = mysqli_query($con,$sql_baiviet);
			$status = unlink('../../assets/images/blog-image/'.$image.'');
            if ($status){
                echo "File bị xóa thành công!";
            } else {
                echo "Error: File không bị xóa.";
            }

			//xóa tc thì hiện lên
			if(!$insert_row){
				echo('<script>alert("Xóa bài viết thất bại")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-tcn&ql-bv'");
			}else{
				echo('<script>alert("Xóa bài viết thành công")</script>');
				// load lại trang
				echo header("refresh:0; url='../../admin-quanly.php?ql-tcn&ql-bv'");
			}
			
		
 		}else{
			echo header("refresh:0; url='../../admin-quanly.php?ql-tcn&ql-bv'");
		}

 }// kết thúc xử lý
?>

