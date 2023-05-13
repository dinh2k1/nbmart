<?php 
if(isset($_REQUEST['edit-th'])){
  $id = $_REQUEST['edit-th'];
    $sql_thuonghieu = mysqli_query($con,"SELECT * FROM tbl_thuonghieu WHERE thuonghieu_id = $id");
    $row_thuonghieu = mysqli_fetch_array($sql_thuonghieu);
?>  
<div class="contact-area pb-40px">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">Sửa thương hiệu</h2>
                        </div>
                        <form class="contact-form-style" action="" method="post">
                            <div class="row">
								<div class="col-lg-6">
                                    <input name="th-id" placeholder="id" type="number" value="<?php echo $row_thuonghieu['thuonghieu_id']?>"/>
                                </div>
								<div class="col-lg-6">
                                    <select class="form-select" aria-label="Default select example" name="danhmuc">
										<option active >Danh mục</option>
										<?php 
											$sql_category = mysqli_query($con,"SELECT * FROM tbl_category");
    										while($row_category = mysqli_fetch_array($sql_category)){
											echo ('<option value="'.$row_category['category_id'].'"');
												if($row_category['category_id'] == $row_thuonghieu['category_id']){
													echo 'selected';
												}
											echo ('>'.$row_category['category_name'].'</option>');
											}
										?>
									</select>
                                </div>
								<div class="col-lg-12">
									<input name="th-name" placeholder="Tên thương hiệu" type="text" value="<?php echo $row_thuonghieu['thuonghieu_name']?>"/>
								</div>
								<div class="col-lg-12">
									<button class="btn btn-primary" type="submit" value="submit" name="edit-th-submit">Sửa thương hiệu</button>
								</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
  if(isset($_REQUEST['edit-th-submit'])){
      $id_th = $_REQUEST['th-id'];
      $name_th = $_REQUEST['th-name'];

      $sql_addth = "UPDATE `tbl_thuonghieu` SET `thuonghieu_id` = '$id_th', `thuonghieu_name` = '$name_th' WHERE `tbl_thuonghieu`.`thuonghieu_id` = $id;";

      $addth = mysqli_query($con, $sql_addth);

      if(!$addth){
          echo('<script>alert("Error")</script>');
      }else{
          echo('<script>alert("Cập nhập thương hiệu thành công")</script>');
		  echo header("refresh:0; url='admin-quanly.php?ql-th'");
      }
  }
}
?>