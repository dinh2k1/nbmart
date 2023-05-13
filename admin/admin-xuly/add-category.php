<div class="contact-area pb-40px">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">Thêm danh mục</h2>
                        </div>
                        <form class="contact-form-style" action="" method="post">
                            <div class="row">
								<div class="col-lg-6">
                                    <input name="cat-id" placeholder="id" type="number" />
                                </div>
								<div class="col-lg-12">
									<input name="cat-name" placeholder="Tên danh mục" type="text" />
								</div>
								<div class="col-lg-12">
									<button class="btn btn-primary" type="submit" value="submit" name="add-cat-submit">Thêm sản phẩm</button>
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
	
if(isset($_REQUEST['add-cat-submit'])){
	$id_cat = $_REQUEST['cat-id'];
	$name_cat = $_REQUEST['cat-name'];
	
	$sql_addcat =" INSERT INTO tbl_category (category_id, category_name) VALUES ( '$id_cat', '$name_cat')";

	$addcat = mysqli_query($con, $sql_addcat);
	
	if(!$addcat){
		echo('<script>alert("Error")</script>');
	}else{
		echo('<script>alert("Thêm danh mục thành công")</script>');
	}
}

?>