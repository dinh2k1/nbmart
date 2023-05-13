<?php 
if(isset($_REQUEST['edit-mgg'])){
  $id = $_REQUEST['edit-mgg'];
    $sql_magiam = mysqli_query($con,"SELECT * FROM tbl_magiamgia WHERE magiam_id = $id");
    $row_magiam = mysqli_fetch_array($sql_magiam);
?>  
<div class="contact-area pb-40px">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">Sửa mã giảm giá</h2>
                        </div>
                        <form class="contact-form-style" action="" method="post">
                            <div class="row">
								<div class="col-lg-6"><span>ID</span>
                                    <input name="mgg-id"  type="number" value="<?php echo $row_magiam['magiam_id']?>"/>
                                </div>
								<div class="col-lg-6"><span>Tên</span>
                                    <input name="mgg-name"  type="text" value="<?php echo $row_magiam['magiam_name']?>"/>
                                </div>
								<div class="col-lg-6"><span>Số tiền giảm VD: 500.000đ = 500000 </span>
                                    <input name="mgg-code"  type="number" value="<?php echo $row_magiam['magiam_code']?>"/>
                                </div>
								<div class="col-lg-6"><span>Số lượng</span>
                                    <input name="mgg-soluong"  type="number" value="<?php echo $row_magiam['magiam_soluong']?>"/>
                                </div>
								<div class="col-lg-12"><span>Nội dung</span>
									<input name="mgg-noidung"  type="text" value="<?php echo $row_magiam['magiam_noidung']?>"/>
								</div>
								<div class="col-lg-12">
									<button class="btn btn-primary" type="submit" value="submit" name="edit-mgg-submit">Sửa mã giảm giá</button>
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
  if(isset($_REQUEST['edit-mgg-submit'])){
      $id_mgg = $_REQUEST['mgg-id'];
      $name_mgg = $_REQUEST['mgg-name'];
	  $code_mgg = $_REQUEST['mgg-code'];
	  $soluong_mgg = $_REQUEST['mgg-soluong'];
	  $noidung_mgg = $_REQUEST['mgg-noidung'];

      $sql_add_mgg = "UPDATE `tbl_magiamgia` SET `magiam_id` = '$id_mgg', `magiam_name` = '$name_mgg', `magiam_code` = '$code_mgg', `magiam_noidung` = '$noidung_mgg', `magiam_soluong` = '$soluong_mgg' WHERE `tbl_magiamgia`.`magiam_id` = $id;";
	  
      $add_mgg = mysqli_query($con, $sql_add_mgg);

      if(!$add_mgg){
          echo('<script>alert("Error")</script>');
      }else{
          echo('<script>alert("Cập nhập mã giảm giá thành công")</script>');
		  echo header("refresh:0; url='admin-quanly.php?ql-mgg'");
      }
  }
}
?>