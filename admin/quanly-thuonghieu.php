<?php 
$sql_thuonghieu = mysqli_query($con,'SELECT * FROM tbl_thuonghieu');
$row_thuonghieu = mysqli_fetch_array($sql_thuonghieu);
?>      
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container-admin">
          <h3 class="cart-page-title">Quản lý thương hiệu | <a href="admin-quanly.php"><i class="fa fa-times-circle" aria-hidden="true"></i> Đóng</a></h3>
          <h3 class="cart-page-title-right"><a href="?add-th"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Thêm Thương hiệu </a></h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
										<th>ID Danh mục</th>
										<th>Tên Danh mục</th>
                                        <th>Tên</th>
										<th>Số Sản phẩm</th>
										<th></th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
                                    $sql_thuonghieu = mysqli_query($con,'SELECT * FROM tbl_thuonghieu');
                                                while($row_thuonghieu = mysqli_fetch_array($sql_thuonghieu)) {
                                    ?>
                                    <tr>
										
									  	<td><?php echo $row_thuonghieu['thuonghieu_id']?></td>
										<td><?php echo $row_thuonghieu['category_id']?></td>
										<td>
											<?php 
												$sql_category = mysqli_query($con,'SELECT * FROM tbl_category WHERE category_id ='.$row_thuonghieu['category_id'].'');
												$row_category = mysqli_fetch_array($sql_category);
												echo $row_category['category_name'];
											?>
										</td>
                                        <td class="product-name"><a href="<?php echo $row_thuonghieu['thuonghieu_id']?>">
											<?php echo $row_thuonghieu['thuonghieu_name']?></a></td>
										<td>
											<?php 
												$sql_count_sl_sp = mysqli_query($con,'SELECT COUNT(sanpham_id)as total FROM `tbl_sanpham` WHERE thuonghieu_id = '.$row_thuonghieu['thuonghieu_id'].'');
													
                                                $count=mysqli_fetch_assoc($sql_count_sl_sp);
                                                echo $count['total'];
                                            ?>
										</td>
                                        <td class="product-remove">
											
                                            <a href="?edit-th=<?php echo $row_thuonghieu['thuonghieu_id'] ?>"><i class="fa fa-pencil"></i></a>
											<button id="del-cat<?php echo $row_thuonghieu['thuonghieu_id']?>" 
													onclick="deleteProfile<?php echo $row_thuonghieu['thuonghieu_id']?>();" 
													value="<?php echo $row_thuonghieu['thuonghieu_id']?>"><i class="fa fa-times"></i></button>
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
$sql_id = mysqli_query($con,'SELECT * FROM tbl_thuonghieu');
            while($row_id = mysqli_fetch_array($sql_id)) {?>
<script>
function deleteProfile<?php echo $row_id['thuonghieu_id']?>() {
var x = document.getElementById("del-cat<?php echo $row_id['thuonghieu_id']?>").value;
if (confirm("Bạn có chắc muốn xóa thương hiệu này")) {
  location.href = 'admin/admin-xuly/xuly-delete.php?rm-th=' + x;
	}
}
</script>		
		
<?php }?>