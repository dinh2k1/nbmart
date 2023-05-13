<div class="contact-area pb-40px">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">Thêm thương hiệu</h2>
                        </div>
                        <form class="contact-form-style" action="" method="post">
                            <div class="row">
								<div class="col-lg-6">
                                    <input name="th-id" placeholder="id" type="number" />
                                </div>
								<div class="col-lg-6">
                                    <select class="form-select" aria-label="Default select example" name="danhmuc">
										<option active >Danh mục</option>
										<?php 
											$sql_category = mysqli_query($con,"SELECT * FROM tbl_category");
    										while($row_category = mysqli_fetch_array($sql_category)){
											echo ('<option value="'.$row_category['category_id'].'">'.$row_category['category_name'].'</option>');
											}
										?>
									</select>
                                </div>
								<div class="col-lg-12">
									<input name="th-name" placeholder="Tên danh mục" type="text" />
								</div>
								<div class="col-lg-12">
									<button class="btn btn-primary" type="submit" value="submit" name="add-th-submit">Thêm thương hiệu </button>
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
	
if(isset($_REQUEST['add-th-submit'])){
	$id_th = $_REQUEST['th-id'];
	$name_th = $_REQUEST['th-name'];
	$id_danhmuc = $_REQUEST['danhmuc'];
	
	$sql_addth =" INSERT INTO tbl_thuonghieu (category_id, thuonghieu_id ,thuonghieu_name) VALUES ( '$id_danhmuc', $id_th,'$name_th')";

	$addth = mysqli_query($con, $sql_addth);
	
	if(!$addth){
		echo('<script>alert("Error")</script>');
	}else{
		echo('<script>alert("Thêm thương hiệu thành công")</script>');
	}
}

?>