<?php 
$sql_magiam = mysqli_query($con,'SELECT * FROM tbl_magiamgia');
$row_magiam = mysqli_fetch_array($sql_magiam);
?>      
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container-admin">
          <h3 class="cart-page-title">Quản lý mã giảm giá | <a href="admin-quanly.php"><i class="fa fa-times-circle" aria-hidden="true"></i> Đóng</a></h3>
          <h3 class="cart-page-title-right"><a href="?add-mgg"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Thêm mã giảm giá </a></h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên MGG</th>
										<th>MGG Code</th>
										<th>MGG Nội dung</th>
										<th>MGG SL</th>
										<th></th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
                                    $sql_magiam = mysqli_query($con,'SELECT * FROM tbl_magiamgia');
                                                while($row_magiam = mysqli_fetch_array($sql_magiam)) {
                                    ?>
                                    <tr>
									  	<td><?php echo $row_magiam['magiam_id']?></td>
                                        <td><?php echo $row_magiam['magiam_name']?></td>
										<td><?php echo $row_magiam['magiam_code']?></td>
										<td><?php echo $row_magiam['magiam_noidung']?></td>
										<td><?php echo $row_magiam['magiam_soluong']?></td>
                                        <td class="product-remove">
											
                                            <a href="admin-quanly.php?edit-mgg=<?php echo $row_magiam['magiam_id'] ?>"><i class="fa fa-pencil"></i></a>
											<button id="del-mgg<?php echo $row_magiam['magiam_id']?>" 
													onclick="deleteProfile<?php echo $row_magiam['magiam_id']?>();" 
													value="<?php echo $row_magiam['magiam_id']?>"><i class="fa fa-times"></i></button>
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
$sql_id = mysqli_query($con,'SELECT * FROM tbl_magiamgia');
            while($row_id = mysqli_fetch_array($sql_id)) {?>
<script>
function deleteProfile<?php echo $row_id['magiam_id']?>() {
var x = document.getElementById("del-mgg<?php echo $row_id['magiam_id']?>").value;
if (confirm("Bạn có chắc muốn xóa mã giảm giá này")) {
  location.href = 'admin/admin-xuly/xuly-delete.php?rm-mgg=' + x;
	}
}
</script>		
		
<?php }?>