<?php 
$sql_khachhang = mysqli_query($con,'SELECT * FROM tbl_khachhang');
$row_khachhang = mysqli_fetch_array($sql_khachhang);
?>      
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container-admin">
          <h3 class="cart-page-title">Quản lý Khách hàng | <a href="admin-quanly.php"><i class="fa fa-times-circle" aria-hidden="true"></i> Đóng</a></h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>	
										<th>SDT</th>
										<th>Email</th>
										<th>Địa Chỉ</th>
										<th>SL</th>
										<th>Đơn hàng</th>
										<th>Trạng thái</th>
										<th>Cấm/Hủy</th>
										<th>Quyền</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
                                    $sql_khachhang = mysqli_query($con,'SELECT * FROM tbl_khachhang');
                                                while($row_khachhang = mysqli_fetch_array($sql_khachhang)) {
                                    ?>
                                    <tr>
									  	<td><?php echo $row_khachhang['khachhang_id']?></td>
                                        <td><?php echo $row_khachhang['name']?></td>
										<td><?php echo $row_khachhang['phone']?></td>
										<td><?php echo $row_khachhang['email']?></td>
										<td><?php echo $row_khachhang['address'];?></td>
										<td>
											<?php
												$sql_count_sl_dh = mysqli_query($con,'SELECT COUNT(*) as tongdonhang
  																						FROM tbl_donhang
  																						WHERE phone = '.$row_khachhang['phone'].';');
                                                $count=mysqli_fetch_assoc($sql_count_sl_dh);
                                                echo $count['tongdonhang'];
                                            ?>
										</td>
										<td><a href="admin-quanly.php?ql-dh&phone=<?php echo $row_khachhang['phone']?>">Xem DH</a></td>
										<td class="product-subtotal">
											<p title=""></p>
											<?php 
												if($row_khachhang['note'] == 0){
													echo('<p  class="conhang" >Hoạt động</p>');
												}else{
													echo('<p  class="hethang">Cấm</p>');
												}
											?>
										</td>
										<?php if($row_khachhang['phan_quyen'] == 0){?>
											<td class="product-remove">
											<button id="del-kh<?php echo $row_khachhang['khachhang_id']?>" 
													onclick="deleteProfile<?php echo $row_khachhang['khachhang_id']?>();" 
													title="Cấm"
													value="<?php echo $row_khachhang['khachhang_id']?>"><i class="fa fa-times"></i></button>
                                            <button id="re-del-kh<?php echo $row_khachhang['khachhang_id']?>" 
													title="Hoạt động"
													onclick="RedeleteProfile<?php echo $row_khachhang['khachhang_id']?>();" 
													value="<?php echo $row_khachhang['khachhang_id']?>"><i class="fa fa-play-circle-o" aria-hidden="true"></i></button>
											</td>
										<?php }else{?>	
											<td></td>
                                        <?php } ?>
										<td class="product-subtotal">
											<?php 
												if($row_khachhang['phan_quyen'] == 1){
													echo('<p class="admin" >Quản trị viên</p>');
												}else{
													echo('<p class="conhang" >Khách hàng</p> ');
												}
											?>
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
$sql_id = mysqli_query($con,'SELECT * FROM tbl_khachhang');
            while($row_id = mysqli_fetch_array($sql_id)) {?>
<script>
function deleteProfile<?php echo $row_id['khachhang_id']?>() {
var x = document.getElementById("del-kh<?php echo $row_id['khachhang_id']?>").value;
if (confirm("Bạn có chắc muốn đưa khách hàng này vào danh sách đen")) {
  location.href = 'admin/admin-xuly/xuly-delete.php?rm-kh=' + x;
	}
}
</script>		
		
<?php }?>
<?php
$sql_id = mysqli_query($con,'SELECT * FROM tbl_khachhang');
            while($row_id = mysqli_fetch_array($sql_id)) {?>
<script>
function RedeleteProfile<?php echo $row_id['khachhang_id']?>() {
var x = document.getElementById("re-del-kh<?php echo $row_id['khachhang_id']?>").value;
if (confirm("Bạn có chắc muốn đưa khách hàng này hoạt động lại")) {
  location.href = 'admin/admin-xuly/xuly-delete.php?re-rm-kh=' + x;
	}
}
</script>		
		
<?php }?>