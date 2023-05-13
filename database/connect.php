<?php session_start()?>
<?php
$con = mysqli_connect("localhost","root","","dbquandinh");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	
	  // Change character set to utf8
	mysqli_set_charset($con,"utf8");

	
?>
<?php
	if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}	
?>