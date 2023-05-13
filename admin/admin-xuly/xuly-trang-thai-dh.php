<?php include_once('../../database/connect.php')?>
<?php ob_start() ?>
<?php 	

if(isset($_REQUEST['id_donhang'])){
		
    // Lấy thông tin lọc
    $filter  = array(
        'id_donhang'     => isset($_GET['id_donhang']) ? ($_GET['id_donhang']) : false,
        'trang_thai'     => isset($_GET['trang_thai']) ? ($_GET['trang_thai']) : false,
    );
        // Biến lưu trữ lọc
    $tinhtrang = array();

    // Nếu có chọn lọc thì thêm điều kiện vào mảng
	if ($filter['trang_thai']){
        $tinhtrang[] = "tinhtrang = '{$filter['trang_thai']}'";
    }
    if ($filter['id_donhang']){
        $tinhtrang[] = "donhang_id = '{$filter['id_donhang']}'";
    }

        // Câu truy vấn cuối cùng
    $sql_tinhtrang = 'UPDATE `tbl_donhang` SET';
    if ($tinhtrang){
        $sql_tinhtrang .= '  '.implode(' WHERE ', $tinhtrang);
		
    }
	
	$insert_donhang = mysqli_query($con,$sql_tinhtrang);
	
	if(!$insert_donhang){
		echo 'Lỗi hoặc chưa chọn trạng thái!';
		echo header("refresh:0; url='../../admin-quanly.php?ql-dh'");
		
	}else{
		echo header("refresh:0; url='../../admin-quanly.php?ql-dh'");
		echo 'Đổi trạng thái thành công. Làm mới trang để thấy thay đổi.';
	}
}

?>