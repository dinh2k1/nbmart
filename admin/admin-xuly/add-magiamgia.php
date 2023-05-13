<div class="contact-area pb-40px">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">Thêm mã giảm giá</h2>
                        </div>
                        <form class="contact-form-style" action="" method="post">
                            <div class="row">
								<div class="col-lg-6"><span>ID</span>
                                    <input name="mgg-id"  type="number" value=""/>
                                </div>
								<div class="col-lg-6"><span>Tên</span>
                                    <input name="mgg-name"  type="text" value=""/>
                                </div>
								<div class="col-lg-6"><span>Số tiền giảm VD: 500.000đ = 500000 </span>
                                    <input name="mgg-code"  type="number" value=""/>
                                </div>
								<div class="col-lg-6"><span>Số lượng</span>
                                    <input name="mgg-soluong"  type="number" value=""/>
                                </div>
								<div class="col-lg-12"><span>Nội dung</span>
									<input name="mgg-noidung"  type="text" value=""/>
								</div>
								<div class="col-lg-12">
									<button class="btn btn-primary" type="submit" value="submit" name="add-mgg-submit">Thêm mã giảm giá</button>
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
	
if(isset($_REQUEST['add-mgg-submit'])){
	$id_mgg = $_REQUEST['mgg-id'];
      $name_mgg = $_REQUEST['mgg-name'];
	  $code_mgg = $_REQUEST['mgg-code'];
	  $soluong_mgg = $_REQUEST['mgg-soluong'];
	  $noidung_mgg = $_REQUEST['mgg-noidung'];
	
	$sql_addmgg ="INSERT INTO `tbl_magiamgia` (`magiam_id`, `magiam_name`, `magiam_code`, `magiam_noidung`, `magiam_soluong`) VALUES ('$id_mgg', '$name_mgg', '$code_mgg', '$soluong_mgg', '$noidung_mgg');";

	$addmgg = mysqli_query($con, $sql_addmgg);
	
	if(!$addmgg){
		echo('<script>alert("Error")</script>');
	}else{
		echo('<script>alert("Thêm mã giảm giá thành công")</script>');
	}
}

?>