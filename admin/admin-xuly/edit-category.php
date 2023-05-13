<?php 
if(isset($_REQUEST['edit-dm'])){
  $id = $_REQUEST['edit-dm'];
    $sql_category = mysqli_query($con,"SELECT * FROM tbl_category WHERE category_id = $id");
    $row_category = mysqli_fetch_array($sql_category);
?>  
<div class="contact-area pb-40px">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">Sửa danh mục</h2>
                        </div>
                        <form class="contact-form-style" action="" method="post">
                            <div class="row">
								<div class="col-lg-6">
                                    <input name="cat-id" placeholder="id" type="number" value="<?php echo $row_category['category_id']?>"/>
                                </div>
								<div class="col-lg-12">
									<input name="cat-name" placeholder="Tên danh mục" type="text" value="<?php echo $row_category['category_name']?>"/>
								</div>
								<div class="col-lg-12">
									<button class="btn btn-primary" type="submit" value="submit" name="edit-cat-submit">Sửa danh mục</button>
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
  if(isset($_REQUEST['edit-cat-submit'])){
      $id_cat = $_REQUEST['cat-id'];
      $name_cat = $_REQUEST['cat-name'];

      $sql_addcat = "UPDATE `tbl_category` SET `category_id` = '$id_cat', `category_name` = '$name_cat' WHERE `tbl_category`.`category_id` = $id;";

      $addcat = mysqli_query($con, $sql_addcat);

      if(!$addcat){
          echo('<script>alert("Error")</script>');
      }else{
          echo('<script>alert("Cập nhập danh mục thành công")</script>');
		  echo header("refresh:0; url='admin-quanly.php?ql-dm'");
      }
  }
}
?>