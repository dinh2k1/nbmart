<?php include_once('database/connect.php')?>
<?php ob_start() ?>
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBmart - Account page</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="NBmart-Smart Product eCommerce html Template">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />
    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>
<?php
if(isset($_SESSION['id'])){
	
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM tbl_khachhang WHERE khachhang_id = '$id'";
	$row_khachhang= mysqli_fetch_array( mysqli_query($con,$sql));
	$count_khachhang = mysqli_num_rows( mysqli_query($con,$sql));
	
	if($count_khachhang > 0 ){
    	$sql_hienthitt = mysqli_query($con,$sql);
        $row_hienthitt = mysqli_fetch_array($sql_hienthitt);
    	}else{
			echo header("refresh:0; url='login.php'");
    		echo('<script>alert("Chưa đăng nhập. Quay về trang đăng nhập trong 0s")</script>');
		}
}else{
    echo header("refresh:0; url='login.php'");
    echo('<script>alert("Chưa đăng nhập. Quay về trang đăng nhập trong 0s")</script>');
	}

?>
<body>
    <div class="main-wrapper">
		<header>
		<?php include('include/header.php')?>
		<?php include('include/mobile.php')?>
		</header>
		<!-- offcanvas overlay start -->
        <div class="offcanvas-overlay"></div>
        <!-- offcanvas overlay end -->
		<?php include('include/cart.php')?>
		<?php include('include/wish-list.php')?>
        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title">Tài khoản</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Tài khoản</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- account area start -->
        <div class="account-dashboard pt-100px pb-100px">
            <div class="container-admin-dh">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <!--<li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li>-->
                                <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Đơn hàng</a></li>
                                
                                <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Thông tin cá nhân</a>
								<li><a href="#change-pass" data-bs-toggle="tab" class="nav-link">Đổi mật khẩu</a></li>
                                </li>
                                <li><a class="nav-link" onClick="return logout()">Đăng xuất</a>
							</li>
                          </ul>
                       </div>
                    </div>
<script>
function logout() {
if (confirm("Bạn có chắc muốn đăng xuất")) {
  location.href = 'xuly/xuly-dangxuat.php';
	}
}
</script>
                    <div class="col-sm-12 col-md-10 col-lg-10">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h4></h4>
                                <p></p>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h4>Đơn hàng</h4>
                                <div class="table_page table-responsive">
								   <form action="order-tracking.php" method="get">
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
<?php $sql_donhang_checking = mysqli_query($con,'SELECT * FROM `tbl_donhang`   WHERE phone = '.$row_hienthitt['phone'].''); ?>
<?php while($row_donhang = mysqli_fetch_array($sql_donhang_checking)) {?>
                                                <tr>
                                                    <td><?php echo $row_donhang['donhang_id']?></td>
                                                    <input name="id-donhang" value="<?php echo $row_donhang['donhang_id']?>" style="display: none">
                                                    <td><?php echo $row_donhang['name']?></td>
                                                    <td><?php echo $row_donhang['phone']?></td>
                                                    <td><?php echo $row_donhang['email']?></td>
                                                    <td><?php echo $row_donhang['address']?></td>
                                                    <td><?php echo currency_format($row_donhang['tonggiatri_donhang'])?></td>
                                                    <td><?php echo $row_donhang['magiamgia']?></td>
                                                    <td><?php echo $row_donhang['ngaythang']?></td>
                                                    <td><?php echo $row_donhang['tinhtrang']?></td>
                                                    <td><button name="xem-ct-dh">Xem</button></td>
                                                </tr>
<?php } ?>
											</tbody>
										</table>
									</form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-details">
                                <h3>Thông tin cá nhân</h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
											<form method="post"> 
                                                <div class="default-form-box mb-20">
                                                    <label>Tên:</label>
                                                    <input type="text" name="tt-name" value="<?php echo($row_hienthitt['name']);?>">
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Số điện thoại:</label>
                                                    <input type="tel" name="tt-phone" placeholder="Số điện thoại"  value="<?php echo($row_hienthitt['phone']);?>" disabled />
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Email</label>
                                                    <input type="email" name="tt-email" value="<?php echo($row_hienthitt['email']);?>">
													<p>* Thông tin đơn hàng sẽ được gửi qua mail này</p>
                                                </div>
												<div class="default-form-box mb-20">
                                                    <label>Địa chỉ:</label>
                                                    <?php echo($row_hienthitt['address']);?>
													<p>* Địa chỉ này sẽ được dùng làm mặc định cho những lần mua sắm.</p>
													<hr>
                                                    <h5>#Đổi địa chỉ</h5>
                                                    <div class="tax-select-wrapper">
                                                        <div class="tax-select">
                                                            <select class="email s-email s-wid" name="tinh-tp" required="">
                                                                <option value="">Tỉnh / Thành phố</option>
                                                            </select>
                                                        </div>
                                                        <div class="tax-select">
                                                            <select class="email s-email s-wid" name="quan-huyen" required="">
                                                                <option value="">Quận / Huyện</option>
                                                            </select>
                                                        </div>
                                                        <input class="billing_address_1" name="" type="hidden" value="">
                                                        <input class="billing_address_2" name="" type="hidden" value="">
                                                        <div class="tax-select mb-25px">
                                                            <label>
                                                                * Số nhà /đường/Xã-Phường-Thị Trấn
                                                            </label>
                                                            <input type="text" name="so-nha" required="" pattern="{1,}" title="Không bỏ trống"/>
                                                        </div>
                                                    </div>
													<hr>
                                                </div>	
                                                <div class="save_button mt-3">
                                                    <button class="btn" type="submit" name="capnhaptt-submit">Lưu</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php
if(isset($_REQUEST['capnhaptt-submit'])){
	$name = $_REQUEST['tt-name'];
	$address_tinhtp = $_REQUEST['tinh-tp'];
	$address_quanhuyen = $_REQUEST['quan-huyen'];
	$address_sonha = $_REQUEST['so-nha'];
	$address = $address_tinhtp .' - '. $address_quanhuyen .' - '. $address_sonha;
	$email = $_REQUEST['tt-email'];
	$id = $_SESSION['id'];
	
	$sql_capnhaptt = "UPDATE `tbl_khachhang` SET `name` = '$name', `address` = '$address', `note` = b'0', `email` = '$email' WHERE `tbl_khachhang`.`khachhang_id` = $id ;";
	
	if (mysqli_query($con, $sql_capnhaptt)) {
      echo('<script>alert("Cập nhập thông tin thành công")</script>');
	  $_SESSION['name'] = $name;
	  echo header("refresh:0; url='my-account.php'");
		} else {
      		echo('<script>alert("Chưa cập nhập gì cả !!")</script>');
		}
	
}						
?>
							<div class="tab-pane fade" id="change-pass">
                                <h3>Đổi mật khẩu</h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
											<form action="#" method="post"> 
                                                <div class="default-form-box mb-20">
                                                    <label>Mật khẩu củ *</label>
                                                    <input type="password" name="old-pass">
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Mật khẩu mới *</label>
                                                    <input type="password" name="new-pass">
												</div>	
                                                <div class="default-form-box mb-20">
                                                    <label>Nhập lại mật khẩu *</label>
                                                    <input type="password" name="re-new-pass">
												</div>
                                                <div class="save_button mt-3">
                                                    <button class="btn" type="submit" name="capnhappass-submit">Lưu</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php
if(isset($_REQUEST['capnhappass-submit'])){
	
	if(!empty($_REQUEST['old-pass']) || !empty($_REQUEST['new-pass']) || !empty($_REQUEST['re-new-pass']) ){
		
        $passnew = $_REQUEST['new-pass'];
        $repassnew = $_REQUEST['re-new-pass'];
        $oldpass = $_REQUEST['old-pass'];

        if(($row_hienthitt['password']) == $oldpass){

            if(($passnew)==($repassnew)){

                $sql_capnhaptt = 'UPDATE tbl_khachhang SET password = '.$passnew.' WHERE khachhang_id = '.$_SESSION['id'].'';

            if (mysqli_query($con, $sql_capnhaptt)) {
                echo('<script>alert("Đổi mật khẩu thành công")</script>');
                echo header("refresh:0; url='my-account.php'");
                } else {
                echo('<script>alert("Chưa cập nhập gì cả !")</script>');
                }
            }else{
                echo('<script>alert("Mật khẩu và nhập lại không giống nhau !")</script>');
            }

        }else{
                echo('<script>alert("Nhập mật khẩu sai !")</script>');
            }
	}else{
		 echo('<script>alert("Không được bỏ trống !")</script>');
	}		
}						
?>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- account area start -->
        <!-- Footer Area Start -->
		<?php include('include/footer.php')?>
        <!-- Footer Area End -->
    </div>
    <!-- Global Vendor, plugins JS -->
    <!-- JS Files
    ============================================ -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'/></script>
	<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'/></script>
	<script>//<![CDATA[
        if (address_2 = localStorage.getItem('address_2_saved')) {
          $('select[name="quan-huyen"] option').each(function() {
            if ($(this).text() == address_2) {
              $(this).attr('selected', '')
            }
          })
          $('input.billing_address_2').attr('value', address_2)
        }
        if (district = localStorage.getItem('district')) {
          $('select[name="quan-huyen"]').html(district)
          $('select[name="quan-huyen"]').on('change', function() {
            var target = $(this).children('option:selected')
            target.attr('selected', '')
            $('select[name="quan-huyen"] option').not(target).removeAttr('selected')
            address_2 = target.text()
            $('input.billing_address_2').attr('value', address_2)
            district = $('select[name="quan-huyen"]').html()
            localStorage.setItem('district', district)
            localStorage.setItem('address_2_saved', address_2)
          })
        }
        $('select[name="tinh-tp"]').each(function() {
          var $this = $(this),
            stc = ''
          c.forEach(function(i, e) {
            e += +1
            stc += '<option value="' + i +  '">' + i + '</option>'
            $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
            if (address_1 = localStorage.getItem('address_1_saved')) {
              $('select[name="tinh-tp"] option').each(function() {
                if ($(this).text() == address_1) {
                  $(this).attr('selected', '')
                }
              })
              $('input.billing_address_1').attr('value', address_1)
            }
            $this.on('change', function(i) {
              i = $this.children('option:selected').index() - 1
              var str = '',
                r = $this.val()
              if (r != '') {
                arr[i].forEach(function(el) {
                  str += '<option value="' + el + '">' + el + '</option>'
                  $('select[name="quan-huyen"]').html('<option value="">Quận / Huyện</option>' + str)
                })
                var address_1 = $this.children('option:selected').text()
                var district = $('select[name="quan-huyen"]').html()
                localStorage.setItem('address_1_saved', address_1)
                localStorage.setItem('district', district)
                $('select[name="quan-huyen"]').on('change', function() {
                  var target = $(this).children('option:selected')
                  target.attr('selected', '')
                  $('select[name="quan-huyen"] option').not(target).removeAttr('selected')
                  var address_2 = target.text()
                  $('input.billing_address_2').attr('value', address_2)
                  district = $('select[name="quan-huyen"]').html()
                  localStorage.setItem('district', district)
                  localStorage.setItem('address_2_saved', address_2)
                })
              } else {
                $('select[name="quan-huyen"]').html('<option value="">Quận / Huyện</option>')
                district = $('select[name="quan-huyen"]').html()
                localStorage.setItem('district', district)
                localStorage.removeItem('address_1_saved', address_1)
              }
            })
          })
        })
        //]]></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/scrollUp.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/mailchimp-ajax.js"></script>

    <!-- Minify Version -->
    <!-- <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/main.min.js"></script> -->

    <!--Main JS (Common Activation Codes)-->
    <script src="assets/js/main.js"></script>
</body>

</html>