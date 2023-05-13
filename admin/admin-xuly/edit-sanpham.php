<?php
if(isset($_REQUEST['edit-sp']) && !empty($_REQUEST['edit-sp'])){
$sql_sanpham_edit = mysqli_query($con,'SELECT * FROM tbl_sanpham WHERE sanpham_id = '.$_REQUEST['edit-sp'].'');
$row_sanpham_edit = mysqli_fetch_array($sql_sanpham_edit);
	
$th_id = $row_sanpham_edit['thuonghieu_id'];
	
$row_select_cat_of_th = 
	mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `tbl_category` a join tbl_thuonghieu b on a.category_id = b.category_id WHERE thuonghieu_id = $th_id"));

?>

        <div class="cart-main-area pb-40px pt-40px">
            <div class="container-admin">
                <h3 class="cart-page-title">Sửa ảnh sản phẩm</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
											<?php if(empty($row_sanpham_edit['sanpham_image'])) echo 'Không có ảnh';?>
                                            <a href="single-product.php?<?php echo $row_sanpham_edit['sanpham_id'] ?>">
												<img class="img-responsive" width="100px" 
													 src="assets/images/product-image/<?php echo $row_sanpham_edit['sanpham_image'] ?>" alt="" /></a>
                                        </td>
										<form action="#" method="post" enctype="multipart/form-data">
										<td class="product-name"><input name="image-sua" placeholder="Hình ảnh" type="file"/></td>
										
											
										<td class="product-subtotal">
											<button name="update-anh-sp" value="<?php echo $row_sanpham_edit['sanpham_id'] ?>"><i class="fa fa-upload" aria-hidden="true"></i></button>
										</td>
										</form>
										<td class="product-remove">	
											<form action="#" method="post">
											<button name="del-anh-sp" value="<?php echo $row_sanpham_edit['sanpham_id'] ?>"><i class="fa fa-times"></i></button>
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
        <div class="cart-main-area pb-40px" >
            <div class="container-admin">
                <h3 class="cart-page-title">Sửa ảnh thư viện sản phẩm</h3>
				<h4 align="right">Làm mới lại trang tại đây:&emsp;
					<a href="admin-quanly.php?edit-sp=<?php echo $_REQUEST['edit-sp'];?>"><i class="fa fa-refresh" aria-hidden="true"></i></a>
				</h4>
				<?php 
                    $count_thuvien = mysqli_num_rows(mysqli_query($con,'SELECT * FROM tbl_thuvien_sanpham WHERE sanpham_id = '.$_REQUEST['edit-sp'].'')); 
                    if($count_thuvien == 0){ echo '<p>Không có ảnh nào</p>' ;}
                ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr style="background-color: #FFFFFF;" align="center">
										<?php $sql_thuvien_edit = mysqli_query($con,'SELECT * FROM tbl_thuvien_sanpham WHERE sanpham_id = '.$_REQUEST['edit-sp'].'');
            								  		while($row_thuvien_edit = mysqli_fetch_array($sql_thuvien_edit)) {
														
										?>
                                        <td>
                                            <img style="max-width: 150px;"
                                                 src="assets/images/product-image/thuvien-hinhanh/<?php echo $row_sanpham_edit['sanpham_name']?>/<?php echo $row_thuvien_edit['thuvien_image']; ?>" alt="" />
                                        </td>
										
										<?php }  ?>
                                    </tr>
                                </thead>
								<tbody>
									<tr>
										<?php $sql_thuvien_edit = mysqli_query($con,'SELECT * FROM tbl_thuvien_sanpham WHERE sanpham_id = '.$_REQUEST['edit-sp'].'');
            								  		while($row_thuvien_edit = mysqli_fetch_array($sql_thuvien_edit)) {
										?>
										<td class="product-remove">	
											<form action="#" method="post">
											<button name="del-anh-thuvien" value="<?php echo $row_thuvien_edit['thuvien_id'];?>"><i class="fa fa-times"></i></button>
											<input type="text" name="name" value="<?php echo $row_thuvien_edit['thuvien_image'];?>" style="display:none;">
											</form>
                                        </td>
										<?php } ?>
									</tr>
								</tbody>
                            </table>
                        </div>
                    </div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-40px" >
						<div class="table-content table-responsive cart-table-content">
                            <table>
									<tr> 
										<form action="#" method="post" enctype="multipart/form-data">
										<td><input name="file[]" type="file" multiple/></td>
										<td>
											<button style="width:90%; background-color: aquamarine; border-radius:10px; "
													name="update-thuvien-sp" 
													value="<?php echo $row_thuvien_edit['sanpham_id'];?>" >
												<i class="fa fa-upload" aria-hidden="true"></i>
											</button>
										</td>
										</form>
									</tr>
<?php 
if (isset($_POST['update-thuvien-sp'])){
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
                        $id = $_REQUEST['edit-sp']; 
				        echo header("refresh:0; url='admin-quanly.php?edit-sp=$id'");
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
                         $id = $_REQUEST['edit-sp']; 
				         echo header("refresh:0; url='admin-quanly.php?edit-sp=$id'");
					 }else{echo 'Tệp '.$name[$i].' đã tồn tại trên csdl<br>';}
					 
                 } else echo 'loi';
             }
         }//End khoi cau lenh up file va them vao CSDL;
     }//End vong lap for cho tat ca cac file;  
}
?>
							</table>
						</div>
					</div>
                </div>
            </div>
        </div>
        <div class="cart-main-area pt-70px pb-40px">
            <div class="container-admin">
                <h3 class="cart-page-title">Sửa sản phẩm | <a href="admin-quanly.php"><i class="fa fa-times-circle" aria-hidden="true"></i> Đóng</a></h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ảnh</th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>Giá KM</th>
                                        <th>SL</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row_sanpham_edit['sanpham_id']?></td>
                                        <td class="product-thumbnail">
                                            <a href="single-product.php?id=<?php echo $row_sanpham_edit['sanpham_id'] ?>">
												<img 
													 width="50%"
													 src="assets/images/product-image/<?php echo $row_sanpham_edit['sanpham_image'] ?>" alt="" /></a>
                                        </td>
                                        <td class="product-name"><a href="single-product.php?id=<?php echo $row_sanpham_edit['sanpham_id'] ?>">
											<?php echo $row_sanpham_edit['sanpham_name'] ?></a></td>
                                        <td class="product-price-cart1"><span class="amount"><?php echo currency_format($row_sanpham_edit['sanpham_gia']) ?></span></td>
                                        <td class="product-price-cart2"><span class="amount"><?php echo currency_format($row_sanpham_edit['sanpham_giakhuyenmai']) ?></span></td>
                                        <td class="product-quantity"><?php echo $row_sanpham_edit['sanpham_soluong'] ?></td>
										

                                        <td class="product-subtotal">
											<?php 
												if($row_sanpham_edit['sanpham_soluong'] >10){
													echo('<p class="conhang">Còn hàng</p>');
												}elseif($row_sanpham_edit['sanpham_soluong'] <10 && $row_sanpham_edit['sanpham_soluong'] >0){
													echo('<p class="saphet">Sắp hết hàng</p>');
												}else{
													echo('<p class="hethang">Hết hàng</p>');
												}
											?>
										</td>
                                        <td class="product-remove">
											
                                            <a href="?edit-sp=<?php echo $row_sanpham_edit['sanpham_id'] ?>"><i class="fa fa-pencil"></i></a>
											<button id="del-sp<?php echo $row_sanpham_edit['sanpham_id']?>" onclick="deleteProfile<?php echo $row_sanpham_edit['sanpham_id']?>();" 
													value="<?php echo $row_sanpham_edit['sanpham_id']?>"><i class="fa fa-times"></i></button>
                                        </td>
 
									</tr>
									
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="contact-area pb-40px" >
    <div class="container">
        <div class="contact-wrapper" style="border: 2px solid #ADADAD; border-radius: 10px;">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form pb-40px">
<?php 
$sql_select_cat = mysqli_query($con,'SELECT * FROM `tbl_category`');
$sql_select_th = mysqli_query($con,'SELECT * FROM `tbl_thuonghieu`');
?>
                        <form class="contact-form-style" action="" method="get" >
                            <div class="row">
                                <div class="col-lg-6">
                                    <select id="sel1" class="form-select" aria-label="Default select example" onchange="giveSelection(this.value)" name="danhmuc-sp">
                                      <option value="0">Danh mục sản phẩm</option>
									  <?php while($row_select_cat = mysqli_fetch_array($sql_select_cat)) {?>
                                      <?php echo('
									  <option value="'.$row_select_cat['category_id'].'"');
											if($row_select_cat['category_id'] == $row_select_cat_of_th['category_id']){
												echo ('selected');
											}
									  echo('																  
									  >'.$row_select_cat['category_name'].'</option>');
									  ?>
									  <?php } ?>
                                    </select>
                                </div>
								
                                <div class="col-lg-6">
                                    <select id="sel2" class="form-select" aria-label="Default select example" name="thuonghieu-sp">
                                      	<option data-option="0">Thương hiệu sản phẩm</option>
										<?php
										while($row_select_th = mysqli_fetch_array($sql_select_th)){
										echo('
									  	<option data-option="'.$row_select_th['category_id'].'" value="'.$row_select_th['thuonghieu_id'].'"');
											if($row_select_th['thuonghieu_id'] == $row_sanpham_edit['thuonghieu_id']){
												echo ('selected');
											}
										echo('>');
										echo($row_select_th['thuonghieu_name']);
										echo('	
									  	</option>'); 	
										}
										?>
                                    </select>
                                </div>
								<div class="col-lg-12">
									<span>Tên sản phẩm</span>
                                    <input name="ten-sp" type="text" value="<?php echo $row_sanpham_edit['sanpham_name']?>"/>
                                </div>
								<div class="col-lg-6">
									<span>Giá</span>
									<input name="gia-sp"  type="number" value="<?php echo $row_sanpham_edit['sanpham_gia']?>"/>
								</div>
								<div class="col-lg-6">
									<span>Giá khuyến mãi</span>
									<input name="gia-km-sp"  type="number" value="<?php echo $row_sanpham_edit['sanpham_giakhuyenmai']?>"/>
								</div>
								
                                <div class="col-lg-12">
								<script src="assets/js/ckeditor.js"></script>
									
        						<textarea name="mota-sp" id="mota-sp"><?php echo $row_sanpham_edit['sanpham_mota']?></textarea>
    							<script>
                                    ClassicEditor
                                        .create( document.querySelector( '#mota-sp' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>
								<br>
        						<textarea name="chitiet-sp" id="chitiet-sp"><?php echo $row_sanpham_edit['sanpham_chitiet']?></textarea>
    							<script>
                                    ClassicEditor
                                        .create( document.querySelector( '#chitiet-sp' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>
								<br>
                                </div>
								<div class="col-lg-6">
									<span>Số lượng</span>
									<input name="soluong-sp" value="<?php echo $row_sanpham_edit['sanpham_soluong']?>" type="number" />
								</div>
								<div class="col-lg-6">
									<span>Thư viện ảnh</span>
									<input name="thuvien-sp" value="<?php echo $row_sanpham_edit['sanpham_thuvien']?>" type="text" disabled/>
									<input name="thuvien-sp-old" value="<?php echo $row_sanpham_edit['sanpham_thuvien']?>" type="text" style="display: none;"/>
								</div>
								<div class="col-lg-12 text-center">
									<button class="btn btn-primary" type="submit" value="<?php echo $row_sanpham_edit['sanpham_id']?>
																						 "name="update-sp-submit">Cập nhập sản phẩm</button>
								</div>
								
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	
var sel1 = document.querySelector('#sel1');
var sel2 = document.querySelector('#sel2');
var options2 = sel2.querySelectorAll('option');

function giveSelection(selValue) {
  sel2.innerHTML = '';
  for(var i = 0; i < options2.length; i++) {
    if(options2[i].dataset.option === selValue) {
      sel2.appendChild(options2[i]);
    }
  }
}

giveSelection(sel1.value);
</script>

<?php }else{
	include('404.html');
} ?>
<?php
$sql_id = mysqli_query($con,'SELECT * FROM tbl_sanpham ');
            while($row_id = mysqli_fetch_array($sql_id)) {?>
<script>
function deleteProfile<?php echo $row_id['sanpham_id']?>() {
var x = document.getElementById("del-sp<?php echo $row_id['sanpham_id']?>").value;
if (confirm("Bạn có chắc muốn xóa sản phẩm này")) {
  location.href = 'admin/admin-xuly/xuly-delete.php?rm-sp=' + x;
	}
}
</script>		
		
<?php }?>

<?php // xử lý xóa ảnh sp
		if(isset($_REQUEST['del-anh-sp'])){
 	
			$xoa_anh = $_REQUEST['del-anh-sp'];
			
 			$sql_select_sanpham = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id= $xoa_anh ");
 			$count = mysqli_num_rows($sql_select_sanpham);
			$row_sanpham_del = mysqli_fetch_array($sql_select_sanpham);
			$sanpham_del_name = $row_sanpham_del['sanpham_name'];
			
 		if($count>0){
			
 			$sql_xoa_anh_sp = 'UPDATE `tbl_sanpham` SET `sanpham_image` = "" WHERE `tbl_sanpham`.`sanpham_id` = '.$xoa_anh.'';
			$insert_row = mysqli_query($con,$sql_xoa_anh_sp);
			
			echo('<script>alert("Xóa ảnh sản phẩm  '.$sanpham_del_name.'  thành công")</script>');
			echo header("refresh:0; url='admin-quanly.php?edit-sp=$xoa_anh");
		
 		}

 }//kết thúc xử lý xóa ảnh
?>
<?php
if(isset($_REQUEST['update-anh-sp'])){
		$id_sp_sua_anh = $row_sanpham_edit['sanpham_id'];
		$ten_sp_sua_anh = $row_sanpham_edit['sanpham_name'];
         // Kiểm tra xem tệp đã được tải lên mà không có lỗi hay không
        if(isset($_FILES["image-sua"]) && $_FILES["image-sua"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png" , "webp" => "image/webp");
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
                if(file_exists("assets/images/product-image/" . $filename)){
                    
                } else{
                    if(move_uploaded_file($_FILES["image-sua"]["tmp_name"], "assets/images/product-image/" . $filename)){ // có thể có lỗi
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


        $sql_sua_anh_sp ="UPDATE `tbl_sanpham` SET `sanpham_image` = '$filename' WHERE `tbl_sanpham`.`sanpham_id` = '$id_sp_sua_anh'";

        $sua_anh_sp = mysqli_query($con, $sql_sua_anh_sp);

        if(!$sua_anh_sp){echo 'error';}
		
		echo('<script>alert("Đã cập nhập ảnh của sản phẩm:  '.$ten_sp_sua_anh.'  thành công")</script>');
	    //echo header("refresh:0; url='admin-quanly.php?edit-sp=$id_sp_sua_anh");

}			
?>
<?php // xử lý xóa ảnh sp
    if(isset($_REQUEST['del-anh-thuvien'])){
		
		$sp_id = $_REQUEST['edit-sp'];
        $xoa_id = $_REQUEST['del-anh-thuvien'];
		$thu_muc = $row_sanpham_edit['sanpham_name'];
		$name = $_REQUEST['name'];
		
        $sql_xoa = "DELETE FROM `tbl_thuvien_sanpham` WHERE `tbl_thuvien_sanpham`.`thuvien_id` = $xoa_id";
        $insert_row = mysqli_query($con,$sql_xoa);
		
		$xoa_anh_trong_folder = unlink("assets/images/product-image/thuvien-hinhanh/$thu_muc/$name");
		
		echo header("refresh:0; url='admin-quanly.php?edit-sp=$sp_id");
		    
    }
?>
