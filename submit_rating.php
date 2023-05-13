<?php

//submit_rating.php

$con = mysqli_connect("localhost","root","","epiz_30406767_dblenhutbel");
$connect = new PDO("mysql:host=localhost;dbname=epiz_30406767_dblenhutbel", "root", "");


if(isset($_POST["rating_data"]))
{
		
        $data = array(
            ':user_phone'		=>	$_POST["user_phone"],
            ':user_rating'		=>	$_POST["rating_data"],
            ':user_review'		=>	$_POST["user_review"],
			':sanpham_id'    	=>	$_POST["sanpham_id"],
			':user_name'		=>  $_POST["user_name"],
            ':datetime'			=>	time()

        );
	
	$user_phone = $_POST["user_phone"];
	$rating_user = $_POST["rating_data"];
	$user_review = $_POST["user_review"];
	$sanpham_id = $_POST["sanpham_id"];

		
	$check_order = "SELECT * FROM tbl_donhang a join tbl_ct_donhang b on a.donhang_id = b.donhang_id WHERE phone ='$user_phone' and sanpham_id = $sanpham_id";
	$count_order = mysqli_num_rows(mysqli_query($con, $check_order));
	if($count_order > 0){
		
        $select = "SELECT * FROM tbl_review WHERE user_phone ='$user_phone' and sanpham_id = $sanpham_id";
        $count_select = mysqli_num_rows(mysqli_query($con, $select));
        if($count_select >0 ){

            $query = "
            UPDATE tbl_review 
            SET 
            user_rating = '$rating_user', 
            user_review = '$user_review'
            WHERE user_phone = '$user_phone';
            ";

            $up = mysqli_query($con, $query);

            echo "Bạn đã từng đánh giá, Chúng tôi đã cập nhập đánh giá của bạn!";

        }else{

            $query = "
            INSERT INTO tbl_review 
            (user_phone, sanpham_id, user_name, user_rating, user_review, datetime) 
            VALUES (:user_phone, :sanpham_id, :user_name, :user_rating, :user_review, :datetime)
            ";

            $statement = $connect->prepare($query);

            $statement->execute($data);

            echo "Cám ơn bạn đã đánh giá sản phẩm";
        }
		
	}else{
		echo "Chưa mua hàng, không được phép đánh giá";
	}

}

if(isset($_POST["action"]))
{
	$id = $_REQUEST['sanpham_id'];
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM tbl_review WHERE sanpham_id = $id
	ORDER BY review_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);
	

	foreach($result as $row)
	{
		$review_content[] = array(
			
			'user_name'	    =>	$row["user_name"],
			'user_phone'	=>	$row["user_phone"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"])
			
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>