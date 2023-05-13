<?php 
	if(isset($_REQUEST['id_donhang'])){
		$id_dh = $_REQUEST['id_donhang'];?>
		
			<div class="cart-main-area pt-100px pb-100px">
            <div class="container-admin-dh">
                <h3 class="cart-page-title">Đơn hàng</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="order-tracking.php" method="get">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Đơn hàng ID</th>
                                            <th>Tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Địa chỉ</th>
											<th>Tổng giá trị</th>
											<th>Mã giảm</th>
                                            <th>Ngày tháng</th>
											<th>Tình trạng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $row_dh = mysqli_fetch_array(mysqli_query($con,'SELECT * FROM `tbl_donhang` WHERE donhang_id = '.$id_dh.'')) ;?>
										<tr>
											<td><?php echo $row_dh['donhang_id']?></td>
											<input name="id-donhang" value="<?php echo $row_dh['donhang_id']?>" style="display: none">
											<td><?php echo $row_dh['name']?></td>
											<td><?php echo $row_dh['phone']?></td>
											<td><?php echo $row_dh['email']?></td>
											<td><?php echo $row_dh['address']?></td>
											<td><?php echo currency_format( $row_dh['tonggiatri_donhang'])?></td>
											<td><?php echo $row_dh['magiamgia']?></td>
											<td><?php echo $row_dh['ngaythang']?></td>
											<td><?php echo $row_dh['tinhtrang']?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>	
		<div class="cart-main-area pb-100px">
            <div class="container-admin-dh">
                <h3 class="cart-page-title">Sản phẩm trong đơn hàng</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="order-tracking.php" method="get">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
											<th></th>
                                            <th>Đơn hàng ID</th>
                                            <th>Tên</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
	$sql_row_ct_dh = mysqli_query($con,'SELECT * FROM `tbl_ct_donhang` a  JOIN tbl_sanpham b on a.sanpham_id = b.sanpham_id WHERE donhang_id = '.$id_dh.'');
    	while($row_ct_dh = mysqli_fetch_array($sql_row_ct_dh)) {
?>
			

										<tr>
											<td class="product-thumbnail">
               									 <a href="single-product.php?id=<?php echo $row_ct_dh['sanpham_id'] ?>"><img class="img-responsive ml-15px" 
													 src="assets/images/product-image/<?php echo $row_ct_dh['sanpham_image'] ?>" alt="" /></a>
            								</td>
											<td><?php echo $row_ct_dh['donhang_id']?></td>
											<input name="id-donhang" value="<?php echo $row_ct_dh['donhang_id']?>" style="display: none">
											<td><?php echo $row_ct_dh['sanpham_name']?></td>
											<td><?php echo $row_ct_dh['gia']?></td>
											<td><?php echo $row_ct_dh['soluong']?></td>
										</tr>
<?php }?>
									</tbody>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		
<?php 		
	}elseif(isset($_REQUEST['phone'])){
			
				$sql_donhang_checking = mysqli_query($con,'SELECT * FROM `tbl_donhang` WHERE phone = '.$_REQUEST['phone'].'');
				$count_donhang = mysqli_num_rows($sql_donhang_checking);	
				if($count_donhang > 0 ){ ?>
		
	<div class="cart-main-area pt-100px pb-100px">
            <div class="container-admin-dh">
                <h3 class="cart-page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Đơn hàng ID</th>
                                            <th>Tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Địa chỉ</th>
											<th>Tổng giá trị</th>
											<th>Mã giảm</th>
                                            <th>Ngày tháng</th>
											<th>Tình trạng</th>
											<th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
										
											

<?php while($row_donhang_checking = mysqli_fetch_array($sql_donhang_checking)) {?>
										<tr>
											<td><?php echo $row_donhang_checking['donhang_id']?></td>
											<td><?php echo $row_donhang_checking['name']?></td>
											<td><?php echo $row_donhang_checking['phone']?></td>
											<td><?php echo $row_donhang_checking['email']?></td>
											<td><?php echo $row_donhang_checking['address']?></td>
											<td><?php echo currency_format($row_donhang_checking['tonggiatri_donhang'])?></td>
											<td><?php echo $row_donhang_checking['magiamgia']?></td>
											<td><?php echo $row_donhang_checking['ngaythang']?></td>
											<td><?php echo $row_donhang_checking['tinhtrang']?></td>
											<td><a href="admin-quanly.php?ql-dh&id_donhang=<?php echo $row_donhang_checking['donhang_id']?>">Chi tiết</a></td>
										</tr>
<?php } ?>
										
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>
		</div>									
		<?php }else{ ?>
            <div class="thank-you-area">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-8">
                            <div class="inner_complated">
                                <div class="img_cmpted"><img src="assets/images/404/error-icon-search-icon.png" alt="" width="20%"></div>
                                <h2 class="dsc_cmpted">Không tìm thấy kết quả<br></h2>
                                <div class="btn_cmpted">
                                    <a href="order-tracking.php" class="shop-btn" title="Go To Shop">Quay lại trang trước</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
		<?php } ?>
<?php }else { 
	$sql_donhang_checking = mysqli_query($con,'SELECT * FROM `tbl_donhang` ORDER BY ngaythang desc');	
?>
	
		
	<div class="cart-main-area pt-100px pb-100px">
            <div class="container-admin-dh">
                <h3 class="cart-page-title">Đơn hàng</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Đơn hàng ID</th>
                                            <th>Tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Địa chỉ</th>
											<th>Tổng giá trị</th>
											<th>Mã giảm</th>
                                            <th>Ngày tháng</th>
											<th>Tình trạng</th>
											<th>Chi tiết</th>
											<th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
										
											

<?php while($row_donhang_checking = mysqli_fetch_array($sql_donhang_checking)) {?>
										<tr>
											<td><?php echo $row_donhang_checking['donhang_id']?></td>
											<td><?php echo $row_donhang_checking['name']?></td>
											<td><?php echo $row_donhang_checking['phone']?></td>
											<td><?php echo $row_donhang_checking['email']?></td>
											<td><?php echo $row_donhang_checking['address']?></td>
											<td><?php echo currency_format($row_donhang_checking['tonggiatri_donhang'])?></td>
											<td><?php echo $row_donhang_checking['magiamgia']?></td>
											<td><?php echo $row_donhang_checking['ngaythang']?></td>
											<td><?php echo $row_donhang_checking['tinhtrang']?></td>
											<td><a href="admin-quanly.php?ql-dh&id_donhang=<?php echo $row_donhang_checking['donhang_id']?>">Chi tiết</a></td>
											
											
											<td>
											<form action="admin/admin-xuly/xuly-trang-thai-dh.php" method="get">
												<select style="border-radius: 10px;" 
														name="trang_thai">
													<option value="" selected >Chọn Trạng thái</option>
													<option value="Chờ xử lý">Chờ xử lý</option>
													<option value="Đã xác nhận">Đã xác nhận</option>
													<option value="Đang giao hàng">Đang giao hàng</option>
													<option value="Đã giao hàng">Đã giao hàng</option>
													<option value="Hủy đơn">Hủy đơn</option>
												</select>
												<button style="border: solid 1px; width: 50%; border-radius: 10px; background-color: aquamarine"
														
															name="id_donhang" 
															value="<?php echo $row_donhang_checking['donhang_id']?>"  
															title="Thay đổi" >
													Thay đổi
												</button>
											</form>
											</td>
										</tr>
<?php } ?>
									</tbody>
							</div>
					</div>
				</div>
			</div>
		</div>							
<?php } ?>
