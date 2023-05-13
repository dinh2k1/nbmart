
<?php include_once('../database/connect.php')?>
<?php 	
if(isset($_SESSION['id'])){
	
	$idkh = $_SESSION['id'];
	
	if(isset($_REQUEST['id_addcart'])){
	
		$idsp = $_REQUEST['id_addcart'];
		$sql_giohang = "SELECT * FROM `tbl_giohang` WHERE `sanpham_id` = $idsp and `khachhang_id` = $idkh";
		$row_giohang= mysqli_fetch_array( mysqli_query($con,$sql_giohang));
		
		if(!empty($row_giohang['giohang_id']) ){
			$idgh = $row_giohang['giohang_id'];
			$slsp = $row_giohang['soluong'] + 1;
			$add_giohang= mysqli_query($con,"UPDATE `tbl_giohang` SET `soluong` = '$slsp' WHERE `tbl_giohang`.`giohang_id` = $idgh");
			
		}else{
			$add_giohang= mysqli_query($con,"INSERT INTO `tbl_giohang` (`giohang_id`, `sanpham_id`, `khachhang_id`, `soluong`) VALUES (NULL, '$idsp', '$idkh', '1')");
		}
		

	}elseif(isset($_REQUEST['id_yeuthich'])){
		
		$idsp = $_REQUEST['id_yeuthich'];
		$sql_yeuthich = "SELECT * FROM `tbl_yeuthich` WHERE `sanpham_id` = $idsp and `khachhang_id` = $idkh";
		$row_yeuthich= mysqli_fetch_array( mysqli_query($con,$sql_yeuthich));
		
		if(!empty($row_yeuthich['yeuthich_id']) ){
			
		}else{
			$add_yeuthich= mysqli_query($con,"INSERT INTO `tbl_yeuthich` (`yeuthich_id`, `sanpham_id`, `khachhang_id`) VALUES (NULL, '$idsp', '$idkh')");
		}
	}
}else{
	
	if(isset($_REQUEST['id_addcart'])){
		if(isset( $_SESSION['id_addcart'.$_REQUEST['id_addcart'].''])){
			$_SESSION['id_addcart'.$_REQUEST['id_addcart'].''] = $_REQUEST['id_addcart'];
			$_SESSION['sl_addcart'.$_REQUEST['id_addcart'].''] = $_SESSION['sl_addcart'.$_REQUEST['id_addcart'].''] +1;	
		}else{
			$_SESSION['id_addcart'.$_REQUEST['id_addcart'].''] = $_REQUEST['id_addcart'];
			$_SESSION['sl_addcart'.$_REQUEST['id_addcart'].''] = 1;
		}
	}elseif(isset($_REQUEST['id_yeuthich'])){
		echo('<script>alert("Vui lòng đăng nhập !")</script>');
	}
		
}

?>