<div class="cart-main-area pt-100px">
  	<div class="container-admin">
   		<div class="row">
     		<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="table-content table-responsive cart-table-content">
           	 		<table>
                		<thead>
                    		<tr>
                                <form action="" method="get">
                                <th width="5%">Bộ Lọc: </th>
                                <th width="10%"><input class="mb-0 filter" type="text" placeholder="ID" name="timid"></th>
                                <th width="20%"><input class="mb-0 filter" type="text" placeholder="Tên T.Hiệu" name="timth"></th>
                                <th width="20%"><input class="mb-0 filter" type="text" placeholder="Tên" name="timten"></th>
								<input name="ql-sp" style="display:none;">
                                <th width="5%" class="li-product-remove"><button class="register-button mt-0" name="tim" >Tìm</button></th>
                                </form>
                                <th width="10%" class="li-product-remove">Giá:<br> 
                                    <a href="admin-quanly.php?ql-sp&locgia=asc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a>&emsp;
                                    <a href="admin-quanly.php?ql-sp&locgia=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a>
                                </th>
                                <th width="10%" class="li-product-remove">Giá KM:<br> 
                                    <a href="admin-quanly.php?ql-sp&locgiakm=asc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a>&emsp;
                                    <a href="admin-quanly.php?ql-sp&locgiakm=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a>
                                </th>
                                <th width="10%" class="li-product-remove">Số Lượng:<br> 
                                    <a href="admin-quanly.php?ql-sp&locsl=asc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a>&emsp;
                                    <a href="admin-quanly.php?ql-sp&locsl=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a>
                                </th>	
                    		</tr>
                			</thead>
            			</table><br>
        			</div>
				</div>
			</div
		</div>
	</div>
</div>

		<div class="cart-main-area pt-100px pb-100px">
            <div class="container-admin">
                <h3 class="cart-page-title">Quản lý sản phẩm | <a href="admin-quanly.php"><i class="fa fa-times-circle" aria-hidden="true"></i> Đóng</a></h3>
				<h3 class="cart-page-title-right"><a href="?add-sp"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Thêm sản phẩm</a></h3>
				<h3 class="cart-page-title"><a href="admin-quanly.php?ql-sp" style="font-size:25px;">Bỏ lọc&ensp;<i class="fa fa-ban" aria-hidden="true"></i></a></h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ảnh</th>
										<th>T.Hiệu</th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>Giá KM</th>
                                        <th>SL</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php  // bộ lọc sản phẩm
//lọc theo id và tên
											
if(isset($_REQUEST['tim'])){

	
    // Lấy thông tin lọc
    $filter  = array(
        'timid'     => isset($_GET['timid']) ? ($_GET['timid']) : false,
        'timth'     => isset($_GET['timth']) ? ($_GET['timth']) : false,
        'timten'   => isset($_GET['timid']) ? ($_GET['timten']) : false,
    );
        // Biến lưu trữ lọc
    $where = array();

    // Nếu có chọn lọc thì thêm điều kiện vào mảng
    if ($filter['timid']){
        $where[] = "sanpham_id = '{$filter['timid']}'";
    }

    if ($filter['timth']){
        $where[] = "thuonghieu_name like '%{$filter['timth']}%'";
    }

    if ($filter['timten']){
        $where[] = "sanpham_name like '%{$filter['timten']}%'";
    }
        // Câu truy vấn cuối cùng
    $sql_where = '';
    if ($where){
        $sql_where .= ' WHERE '.implode(' AND ', $where);
    }	

}else{
	$sql_where = '';
}

// kết thúc lọc theo id và tên											

// lọc theo giá và số lượng											
											
if(isset($_REQUEST['locgia'])){
	$sapxep = 'ORDER BY sanpham_gia '.$_REQUEST['locgia'].'';
}elseif(isset($_REQUEST['locgiakm'])){
	$sapxep = 'ORDER BY sanpham_giakhuyenmai '.$_REQUEST['locgiakm'].'';
}elseif(isset($_REQUEST['locsl'])){
	$sapxep = 'ORDER BY sanpham_soluong '.$_REQUEST['locsl'].'';
}else{
	$sapxep = 'ORDER BY sanpham_id desc';
}
											
$sql_sanpham = mysqli_query($con,'SELECT * FROM tbl_sanpham a join tbl_thuonghieu b on a.thuonghieu_id = b.thuonghieu_id ' .$sql_where.$sapxep.'');
            while($row_sanpham = mysqli_fetch_array($sql_sanpham)) {

// kết thúc lọc theo giá và số lượng
											
// kết thúc lọc sản phẩm?>
                                    <tr>
                                        <td><?php echo $row_sanpham['sanpham_id']?></td>
                                        <td class="product-thumbnail">
                                            <a href="single-product.php?<?php echo $row_sanpham['sanpham_id'] ?>">
												<img 
													 width="50%"
													 src="assets/images/product-image/<?php echo $row_sanpham['sanpham_image'] ?>" alt="" /></a>
                                        </td>
										<td><?php echo $row_sanpham['thuonghieu_name'];?></td>
                                        <td class="product-name"><a href="single-product.php?<?php echo $row_sanpham['sanpham_id'] ?>">
											<?php echo $row_sanpham['sanpham_name'] ?></a></td>
                                        <td class="product-price-cart1"><span class="amount"><?php echo currency_format($row_sanpham['sanpham_gia']) ?></span></td>
                                        <td class="product-price-cart2"><span class="amount"><?php echo currency_format($row_sanpham['sanpham_giakhuyenmai']) ?></span></td>
                                        <td class="product-quantity"><?php echo $row_sanpham['sanpham_soluong'] ?></td>
										
                                        <td class="product-subtotal">
											<?php 
												if($row_sanpham['sanpham_soluong'] >10){
													echo('<p class="conhang">Còn hàng</p>');
												}elseif($row_sanpham['sanpham_soluong'] <10 && $row_sanpham['sanpham_soluong'] >0){
													echo('<p class="saphet">Sắp hết hàng</p>');
												}else{
													echo('<p class="hethang">Hết hàng</p>');
												}
											?>
										</td>
                                        <td class="product-remove">
											
                                            <a href="?edit-sp=<?php echo $row_sanpham['sanpham_id'] ?>"><i class="fa fa-pencil"></i></a>
											<button id="del-sp<?php echo $row_sanpham['sanpham_id']?>" onclick="deleteProfile<?php echo $row_sanpham['sanpham_id']?>();" 
													value="<?php echo $row_sanpham['sanpham_id']?>"><i class="fa fa-times"></i></button>
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
$sql_id = mysqli_query($con,'SELECT * FROM tbl_sanpham ');
            while($row_id = mysqli_fetch_array($sql_id)) {?>
<script>
function deleteProfile<?php echo $row_id['sanpham_id']?>() {
var x = document.getElementById("del-sp<?php echo $row_id['sanpham_id']?>").value;
if (confirm("Bạn có chắc muốn xóa sản phẩm này")) {
  location.href = 'admin/admin-xuly/xuly-delete.php?rm-sp=' + x;
	}
}
</script>		
		
<?php }?>