<style>
	.table_bv_noidung img{
		width: 100%;
	}
</style>
<div class="cart-main-area pt-100px">
   	<div class="container-admin">
		<center><h2 style="font-weight: 600;">Quản lý tin công nghệ | <a href="admin-quanly.php">
			<i class="fa fa-times-circle" aria-hidden="true"></i> Đóng</a></h2></center><br>
		<h3 class="cart-page-title"><a href="?ql-tcn&ql-dm-bv"><i class="fa fa-list-alt" aria-hidden="true"></i> Quản lý danh mục bài viết</a></h3>
		<h3 class="cart-page-title">&emsp;<a href="?ql-tcn&add-dm-bv"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Thêm danh mục </a></h3>
		<h3 class="cart-page-title"><a href="?ql-tcn&ql-bv"><i class="fa fa-list-alt" aria-hidden="true"></i> Quản lý bài viết</a></h3>
		<h3 class="cart-page-title">&emsp;<a href="?ql-tcn&add-bv"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Thêm bài viết </a></h3>
	</div>
</div>

<?php 
if(isset($_REQUEST['ql-dm-bv'])){
$sql_danhmuc = mysqli_query($con,'SELECT * FROM tbl_danhmuc_baiviet');
$row_danhmuc = mysqli_fetch_array($sql_danhmuc);
?>      
    <div class="cart-main-area pb-100px">
        <div class="container-admin">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-rebvonsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
										<th>SL Bài viết</th>
										<th></th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
                                    $sql_danhmuc = mysqli_query($con,'SELECT * FROM tbl_danhmuc_baiviet');
                                                while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                                    ?>
                                    <tr>
									  	<td><?php echo $row_danhmuc['danhmuc_id']?></td>
                                        <td class="product-name"><a href="<?php echo $row_danhmuc['danhmuc_id']?>">
											<?php echo $row_danhmuc['danhmuc_name']?></a></td>
										<td>
											<?php 
												$sql_count_sl_th = mysqli_query($con,'SELECT COUNT(baiviet_id)as total FROM `tbl_baiviet` WHERE danhmuc_id = '.$row_danhmuc['danhmuc_id'].'');
													
                                                $count=mysqli_fetch_assoc($sql_count_sl_th);
                                                echo $count['total'];
                                            ?>
										</td>
                                        <td class="product-remove">
											
                                            <a href="?ql-tcn&edit-dm-bv=<?php echo $row_danhmuc['danhmuc_id'] ?>"><i class="fa fa-pencil"></i></a>
											<button id="del-dm-bv<?php echo $row_danhmuc['danhmuc_id']?>" 
													onclick="deleteProfile<?php echo $row_danhmuc['danhmuc_id']?>();" 
													value="<?php echo $row_danhmuc['danhmuc_id']?>"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
									<?php } ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php 
if(isset($_REQUEST['ql-bv'])){
?>      
    <div class="cart-main-area pb-100px">
        <div class="container-admin-dh">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-rebvonsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
										<th>ID</th>
										<th></th>
										<th>DM ID</th>
										<th>DM tên</th>
                                        <th>Tên</th>
										<th>Nội dung</th>
										<th>Tác giả</th>
										<th>Ngày đăng</th>
										<th></th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
                                    $sql_baiviet = mysqli_query($con,'SELECT * FROM tbl_baiviet a join tbl_danhmuc_baiviet b on a.danhmuc_id = b.danhmuc_id');
                                                while($row_baiviet = mysqli_fetch_array($sql_baiviet)) {
                                    ?>
                                    <tr>
										<td><?php echo $row_baiviet['baiviet_id']?></td>
										<td class="product-thumbnail">
                                            <a href="single-product.php?<?php echo $row_baiviet['baiviet_id'] ?>">
												<img 
													 width="50%"
													 src="assets/images/blog-image/<?php echo $row_baiviet['baiviet_image'] ?>" alt="" /></a>
                                        </td>
										<td><?php echo $row_baiviet['danhmuc_id']?></td>
										<td><?php echo $row_baiviet['danhmuc_name']?></td>
                                        <td class="product-name"><a href="<?php echo $row_baiviet['baiviet_id']?>">
											<?php echo $row_baiviet['baiviet_ten']?></a></td>
										<td class="table_bv_noidung" width="35%">
											<center>
											<div style="overflow-x: hidden; max-width:600px; max-height: 300px;">
												<?php echo $row_baiviet['baiviet_noidung']?>
											</div>
											</center>
										</td>
										<td><?php echo $row_baiviet['baiviet_tacgia']?></td>
										<td><?php echo $row_baiviet['baiviet_ngaydang']?></td>
                                        <td class="product-remove">
											
                                            <a href="?ql-tcn&edit-bv=<?php echo $row_baiviet['baiviet_id'] ?>"><i class="fa fa-pencil"></i></a>
											<button id="del-bv<?php echo $row_baiviet['baiviet_id']?>" 
													onclick="deleteProfile<?php echo $row_baiviet['baiviet_id']?>();" 
													value="<?php echo $row_baiviet['baiviet_id']?>"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
									<?php } ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if(isset($_REQUEST['edit-bv'])){ 
	$id = $_REQUEST['edit-bv'];
	$sql_baiviet_edit= mysqli_query($con,"SELECT * FROM tbl_baiviet WHERE baiviet_id = $id ");
	$row_baiviet_edit = mysqli_fetch_array($sql_baiviet_edit);?>

<div class="cart-main-area pb-40px pt-40px">
    <div class="container-admin">
        <h3 class="cart-page-title">Sửa ảnh bài viết</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-content table-rebvonsive cart-table-content">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <?php if(empty($row_baiviet_edit['baiviet_image'])) echo 'Không có ảnh';?>
                                    <a href="single-product.php?<?php echo $row_baiviet_edit['baiviet_id'] ?>">
                                        <img class="img-rebvonsive" width="100px" 
                                             src="assets/images/blog-image/<?php echo $row_baiviet_edit['baiviet_image'] ?>" alt="" /></a>
                                </td>
                                <form action="#" method="post" enctype="multipart/form-data">
                                <td class="product-name"><input name="image-sua" placeholder="Hình ảnh" type="file"/></td>


                                <td class="product-subtotal">
                                    <button name="update-anh-bv" value="<?php echo $row_baiviet_edit['baiviet_id'] ?>"><i class="fa fa-upload" aria-hidden="true"></i></button>
                                </td>
                                </form>
                                <td class="product-remove">	
                                    <form action="#" method="post">
                                    <button name="del-anh-bv" value="<?php echo $row_baiviet_edit['baiviet_id'] ?>"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact-area pb-40px">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">Sửa bài viết</h2>
                        </div>
                        <form class="contact-form-style" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
								<div class="col-lg-6">
									<?php $sql_select_dm_bv = mysqli_query($con,'SELECT * FROM `tbl_danhmuc_baiviet`'); ?>
									<bvan>Chọn danh mục</bvan>
                                    <select class="form-select" aria-label="Default select example"  name="danhmuc-baiviet">
									  <?php while($row_select_dm_bv = mysqli_fetch_array($sql_select_dm_bv)) {?>
                                      <option value="<?php echo $row_select_dm_bv['danhmuc_id'];?>" 
											  <?php if($row_select_dm_bv['danhmuc_id'] == $row_baiviet_edit['danhmuc_id'] )echo 'selected'?>
									  >
									  <?php echo $row_select_dm_bv['danhmuc_name'];?></option>');
									  <?php } ?>
                                    </select>
								</div>
								<div class="col-lg-12">
									<input type="text" name="ten-baiviet" value="<?php echo $row_baiviet_edit['baiviet_ten'];?>">
								</div>
								<div class="col-lg-12">
									
									
        							<textarea name="noidung-baiviet" id="noidung-baiviet"><?php echo $row_baiviet_edit['baiviet_noidung'];?></textarea>
									<script src="assets/js/ckeditor.js"></script>
    								<script>		
                                    ClassicEditor
                                        .create( document.querySelector( '#noidung-baiviet' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                	</script>
								</div>
								<div class="col-lg-12">
									<br><button class="btn btn-primary" type="submit" value="<?php echo $row_baiviet_edit['baiviet_id']; ?>" name="update-bv-submit">Sửa bài viết</button>
								</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php if(isset($_REQUEST['add-dm-bv'])){ ?>
<div class="contact-area pb-40px">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">Thêm danh mục bài viết</h2>
                        </div>
                        <form class="contact-form-style" action="" method="post">
                            <div class="row">
								<div class="col-lg-6">
                                    <input name="id-dm-bv" placeholder="id" type="number" />
                                </div>
								<div class="col-lg-12">
									<input name="dm-bv-name" placeholder="Tên danh mục" type="text" />
								</div>
								<div class="col-lg-12">
									<button class="btn btn-primary" type="submit" value="submit" name="add-dm-bv-submit">Thêm danh mục bài viết</button>
								</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php if(isset($_REQUEST['edit-dm-bv'])){ 
	$sql_danhmuc_edit = mysqli_query($con,'SELECT * FROM tbl_danhmuc_baiviet WHERE danhmuc_id = '.$_REQUEST['edit-dm-bv'].'');
	$row_danhmuc_edit = mysqli_fetch_array($sql_danhmuc_edit);
?>
<div class="contact-area pb-40px">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">Sửa danh mục bài viết</h2>
                        </div>
                        <form class="contact-form-style" action="" method="post">
                            <div class="row">
								<div class="col-lg-6">
									<bvan>ID</bvan>
                                    <input name="id-dm-bv" value="<?php echo $row_danhmuc_edit['danhmuc_id']?>" type="number" />
                                </div>
								<div class="col-lg-12">
									<bvan>Tên danh mục</bvan>
									<input name="dm-bv-name" value="<?php echo $row_danhmuc_edit['danhmuc_name']?>" type="text" />
								</div>
								<div class="col-lg-12">
									<button class="btn btn-primary" type="submit" value="<?php echo $row_danhmuc_edit['danhmuc_id']?>" 
											name="update-dm-bv-submit">Sửa danh mục bài viết</button>
								</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php if(isset($_REQUEST['add-bv'])){ ?>
<div class="contact-area pb-40px">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">Thêm bài viết</h2>
                        </div>
                        <form class="contact-form-style" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
								<div class="col-lg-6">
									<input name="image" placeholder="Hình ảnh" type="file" />
								</div>
								<div class="col-lg-6">
									<?php $sql_select_dm_bv = mysqli_query($con,'SELECT * FROM `tbl_danhmuc_baiviet`'); ?>
									<bvan>Chọn danh mục</bvan>
                                    <select class="form-select" aria-label="Default select example"  name="danhmuc-baiviet">
									  <?php while($row_select_dm_bv = mysqli_fetch_array($sql_select_dm_bv)) {?>
                                      <?php echo('<option value="'.$row_select_dm_bv['danhmuc_id'].'">'.$row_select_dm_bv['danhmuc_name'].'</option>');?>
									  <?php } ?>
                                    </select>
								</div>
								<div class="col-lg-12">
									<input type="text" name="ten-baiviet" placeholder="Tên bài viết">
								</div>
								<div class="col-lg-12">
									
									
        							<textarea name="noidung-baiviet" id="noidung-baiviet"></textarea>
									<script src="assets/js/ckeditor.js"></script>
    								<script>		
                                    ClassicEditor
                                        .create( document.querySelector( '#noidung-baiviet' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                	</script>
								</div>
								<div class="col-lg-12">
									<button class="btn btn-primary" type="submit" value="submit" name="add-bv-submit">Thêm bài viết</button>
								</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php
$sql_id = mysqli_query($con,'SELECT * FROM tbl_danhmuc_baiviet');
            while($row_id = mysqli_fetch_array($sql_id)) {?>
<script>
function deleteProfile<?php echo $row_id['danhmuc_id']?>() {
var x = document.getElementById("del-dm-bv<?php echo $row_id['danhmuc_id']?>").value;
if (confirm("Bạn có chắc muốn xóa danh mục bài viết này")) {
  location.href = 'admin/admin-xuly/xuly-delete.php?rm-dm-bv=' + x;
	}
}
</script>		
		
<?php }?>

<?php
$sql_id = mysqli_query($con,'SELECT * FROM tbl_baiviet');
            while($row_id = mysqli_fetch_array($sql_id)) {?>
<script>
function deleteProfile<?php echo $row_id['baiviet_id']?>() {
var x = document.getElementById("del-bv<?php echo $row_id['baiviet_id']?>").value;
if (confirm("Bạn có chắc muốn xóa bài viết này")) {
  location.href = 'admin/admin-xuly/xuly-delete.php?rm-bv=' + x;
	}
}
</script>		
		
<?php }?>

<?php 	
if(isset($_REQUEST['add-dm-bv-submit'])){
	$id_dm_bv = $_REQUEST['id-dm-bv'];
	$name_dm_bv = $_REQUEST['dm-bv-name'];
	
	$sql_adddm_bv =" INSERT INTO tbl_danhmuc_baiviet (danhmuc_id, danhmuc_name) VALUES ( '$id_dm_bv', '$name_dm_bv')";

	$adddm_bv = mysqli_query($con, $sql_adddm_bv);
	
	if(!$adddm_bv){
		echo('<script>alert("Error")</script>');
	}else{
		echo('<script>alert("Thêm danh mục thành công")</script>');
	}
}
?>

<?php 	
if(isset($_REQUEST['update-dm-bv-submit'])){
	
	$id = $_REQUEST['update-dm-bv-submit'];
	$id_dm_bv = $_REQUEST['id-dm-bv'];
	$name_dm_bv = $_REQUEST['dm-bv-name'];
	
	$sql_update_dm_bv ="UPDATE `tbl_danhmuc_baiviet` SET `danhmuc_id` = '$id_dm_bv', `danhmuc_name` = '$name_dm_bv' WHERE `tbl_danhmuc_baiviet`.`danhmuc_id` = $id;";
	$update_dm_bv = mysqli_query($con, $sql_update_dm_bv);
	
	if(!$update_dm_bv){
		echo('<script>alert("Error")</script>');
	}else{
		echo('<script>alert("Cập nhập danh mục thành công")</script>');
		echo header("refresh:0; url='admin-quanly.php?ql-tcn&ql-dm-bv'");
	}
}
?>

<?php
		
if(isset($_REQUEST['add-bv-submit'])){

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
	$ten_bv= $_REQUEST['ten-baiviet'];
	$tacgia = $_SESSION['name'];
	$id_dm_bv = $_REQUEST['danhmuc-baiviet'];
	$noidung_bv = $_REQUEST['noidung-baiviet'];
	
	
	

            $sql_addbv ="INSERT INTO `tbl_baiviet` (`baiviet_id`, `danhmuc_id`, `baiviet_ten`, `baiviet_noidung`, `baiviet_tacgia`, `baiviet_ngaydang`, `baiviet_image`) VALUES (NULL, '$id_dm_bv', '$ten_bv', '$noidung_bv', '$tacgia', current_timestamp(), '$filename');";

			$addbv = mysqli_query($con, $sql_addbv);
			
			if(!$addbv){
				echo('<script>alert("Error")</script>');
			}else{
				
// Xác minh loại MIME của tệp
if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
    if(in_array($filetype, $allowed)){
        // Kiểm tra xem tệp có tồn tại hay không trước khi tải lên
        if(file_exists("assets/images/blog-image/" . $filename)){
			echo ('<script>alert("Đã thêm bài viết, Chú ý: tệp đã tồn tại")</script>');
        } else{
            //echo $_FILES["image"]["tmp_name"];
            if(move_uploaded_file($_FILES["image"]["tmp_name"], "assets/images/blog-image/" . $filename)){ // có thể có lỗi
                echo ('<script>alert("Đã thêm bài viết")</script>');
            }else{
                echo ('<script>alert("Đã thêm bài viết, Chú ý: Không thể di chuyển tệp đến /blog-image/")</script>');
            }
        } 
    } else{
        echo ('<script>alert("Đã thêm bài viết, Chú ý: Sự cố khi tải tệp lên")</script>');
    }
	}else{
	echo ('<script>alert("Đã thêm bài viết, Chú ý: Chưa thêm ảnh sản phẩm")</script>');			
		}
}
}
?>
<?php
		
if(isset($_REQUEST['update-bv-submit'])){
	
	$id = $_REQUEST['update-bv-submit'];
	$ten_bv= $_REQUEST['ten-baiviet'];
	$id_dm_bv = $_REQUEST['danhmuc-baiviet'];
	$noidung_bv = $_REQUEST['noidung-baiviet'];
	
	
	

            $sql_updatebv ="UPDATE `tbl_baiviet` SET `danhmuc_id` = '$id_dm_bv', `baiviet_ten` = '$ten_bv', `baiviet_noidung` = '$noidung_bv' WHERE `tbl_baiviet`.`baiviet_id` = $id;";

			$updatebv = mysqli_query($con, $sql_updatebv);
			
			if(!$updatebv){
				echo('<script>alert("Error")</script>');	
			}else{
				echo('<script>alert("Cập nhập thành công")</script>');
				echo header("refresh:0; url='admin-quanly.php?ql-tcn&ql-bv'");
			}
}
?>
<?php // xử lý xóa ảnh bv
		if(isset($_REQUEST['del-anh-bv'])){
 	
			$xoa_anh = $_REQUEST['del-anh-bv'];
			
 			$sql_select_baiviet = mysqli_query($con,"SELECT * FROM tbl_baiviet WHERE baiviet_id= $xoa_anh ");
 			$count = mysqli_num_rows($sql_select_baiviet);
			$row_baiviet_del = mysqli_fetch_array($sql_select_baiviet);
			
 		if($count>0){
			
 			$sql_xoa_anh_bv = 'UPDATE `tbl_baiviet` SET `baiviet_image` = "" WHERE `tbl_baiviet`.`baiviet_id` = '.$xoa_anh.'';
			$insert_row = mysqli_query($con,$sql_xoa_anh_bv);
			
			echo('<script>alert("Xóa ảnh bài viết thành công")</script>');
			echo header("refresh:0; url='admin-quanly.php?ql-tcn&edit-bv=$xoa_anh");
		
 		}

 }//kết thúc xử lý xóa ảnh
?>
<?php
if(isset($_REQUEST['update-anh-bv'])){
		$id_bv_sua_anh = $_REQUEST['edit-bv'];
         // Kiểm tra xem tệp đã được tải lên mà không có lỗi hay không
        if(isset($_FILES["image-sua"]) && $_FILES["image-sua"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["image-sua"]["name"];
            $filetype = $_FILES["image-sua"]["type"];
            $filesize = $_FILES["image-sua"]["size"];

            // Xác minh phần mở rộng tệp
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Lỗi: Vui lòng chọn định dạng tệp hợp lệ.");

            // Xác minh kích thước tệp - tối đa 5MB
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die("Lỗi: Kích thước tệp lớn hơn giới hạn cho phép.");

            // Xác minh loại MIME của tệp
            if(in_array($filetype, $allowed)){
                // Kiểm tra xem tệp có tồn tại hay không trước khi tải lên
                if(file_exists("assets/images/blog-image/" . $filename)){
                    
                } else{
                    if(move_uploaded_file($_FILES["image-sua"]["tmp_name"], "assets/images/blog-image/" . $filename)){ // có thể có lỗi
                        echo "Tệp của bạn đã được tải lên thành công.";
                    }else{
                        echo "Lỗi: không thể di chuyển tệp đến upload/";
                    }
                } 
            } else{
                echo "Lỗi: Đã xảy ra sự cố khi tải tệp của bạn lên. Vui lòng thử lại."; 
            }
        } else{
            echo "Error: " . $_FILES["image-sua"]["error"];
        }


        $sql_sua_anh_bv ="UPDATE `tbl_baiviet` SET `baiviet_image` = '$filename' WHERE `tbl_baiviet`.`baiviet_id` = '$id_bv_sua_anh'";

        $sua_anh_bv = mysqli_query($con, $sql_sua_anh_bv);
		
		echo('<script>alert("Đã cập nhập ảnh của bài viết thành công")</script>');
	    echo header("refresh:0; url='admin-quanly.php?ql-tcn&edit-bv=$id_bv_sua_anh");

}			
?>