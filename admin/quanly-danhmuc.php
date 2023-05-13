<?php 
$sql_category = mysqli_query($con,'SELECT * FROM tbl_category');
$row_category = mysqli_fetch_array($sql_category);
?>      
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container-admin">
          <h3 class="cart-page-title">Quản lý danh mục | <a href="admin-quanly.php"><i class="fa fa-times-circle" aria-hidden="true"></i> Đóng</a></h3>
          <h3 class="cart-page-title-right"><a href="?add-dm"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Thêm danh mục </a></h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
										<th>SL thương hiệu</th>
										<th></th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
                                    $sql_category = mysqli_query($con,'SELECT * FROM tbl_category');
                                                while($row_category = mysqli_fetch_array($sql_category)) {
                                    ?>
                                    <tr>
									  	<td><?php echo $row_category['category_id']?></td>
                                        <td class="product-name"><a href="<?php echo $row_category['category_id']?>">
											<?php echo $row_category['category_name']?></a></td>
										<td>
											<?php 
												$sql_count_sl_th = mysqli_query($con,'SELECT COUNT(thuonghieu_id)as total FROM `tbl_thuonghieu` WHERE category_id = '.$row_category['category_id'].'');
													
                                                $count=mysqli_fetch_assoc($sql_count_sl_th);
                                                echo $count['total'];
                                            ?>
										</td>
                                        <td class="product-remove">
											
                                            <a href="?edit-dm=<?php echo $row_category['category_id'] ?>"><i class="fa fa-pencil"></i></a>
											<button id="del-cat<?php echo $row_category['category_id']?>" 
													onclick="deleteProfile<?php echo $row_category['category_id']?>();" 
													value="<?php echo $row_category['category_id']?>"><i class="fa fa-times"></i></button>
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
<?php
$sql_id = mysqli_query($con,'SELECT * FROM tbl_category');
            while($row_id = mysqli_fetch_array($sql_id)) {?>
<script>
function deleteProfile<?php echo $row_id['category_id']?>() {
var x = document.getElementById("del-cat<?php echo $row_id['category_id']?>").value;
if (confirm("Bạn có chắc muốn xóa danh mục này")) {
  location.href = 'admin/admin-xuly/xuly-delete.php?rm-dm=' + x;
	}
}
</script>		
		
<?php }?>