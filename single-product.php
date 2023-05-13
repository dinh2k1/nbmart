<?php include_once('database/connect.php')?>
<?php ob_start() ?>
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hmart - Product page</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Hmart-Smart Product eCommerce html Template">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />
    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
if(isset($_REQUEST['id'])){
	$id = $_REQUEST['id'];
$sql_sanpham = mysqli_query($con,'SELECT * FROM tbl_sanpham a join tbl_thuonghieu b
on a.thuonghieu_id = b.thuonghieu_id WHERE sanpham_id = '.$id.'');
$row_sanpham = mysqli_fetch_array($sql_sanpham);
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
                        <h2 class="breadcrumb-title"><?php echo $row_sanpham['sanpham_name']?></h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active"><?php echo $row_sanpham['sanpham_name']?></li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- Product Details Area Start -->
        <div class="product-details-area pt-100px pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                        <div class="product-details-img product-details-tab product-details-tab-2 d-flex">
                            <div class="swiper-container mr-15px zoom-thumbs-2 align-self-start slider-nav-style-1 small-nav">
                                <div class="swiper-wrapper" style="height: 500px;">
									<?php $sql_thuvien = mysqli_query($con,'SELECT * FROM tbl_thuvien_sanpham WHERE sanpham_id = 																										'.$row_sanpham['sanpham_id'].'');
            								  while($row_thuvien = mysqli_fetch_array($sql_thuvien)) {
														
									?>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/thuvien-hinhanh/<?php echo $row_sanpham['sanpham_name']?>/<?php echo $row_thuvien['thuvien_image']; ?>" alt="" />
                                    </div>
									<?php }  ?>
                                </div>
                            </div>
                            <!-- Swiper -->
                            <div class="swiper-container zoom-top-2 align-self-start">
                                <div class="swiper-wrapper" style="height: 500px;">
									<?php $sql_thuvien = mysqli_query($con,'SELECT * FROM tbl_thuvien_sanpham WHERE sanpham_id = '.$row_sanpham['sanpham_id'].'');
            								  		while($row_thuvien = mysqli_fetch_array($sql_thuvien)) {
														
									?>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/thuvien-hinhanh/<?php echo $row_sanpham['sanpham_name']?>/<?php echo $row_thuvien['thuvien_image']; ?>" alt="" />
										<a class="venobox full-preview" data-gall="myGallery" href="assets/images/product-image/thuvien-hinhanh/<?php echo $row_sanpham['sanpham_name']?>/<?php echo $row_thuvien['thuvien_image']; ?>">
                                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                        </a>
                                    </div>
									<?php }  ?>
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-details-content quickview-content ml-25px">
                            <h2><?php echo $row_sanpham['sanpham_name']; ?></h2>
                            <div class="pricing-meta">
								<?php if($row_sanpham['sanpham_giakhuyenmai'] >0 ){?>
                                <ul class="d-flex">
                                    <li class="new-price"><?php echo currency_format($row_sanpham['sanpham_giakhuyenmai']);?></li>
									<li class="new-price"><?php echo currency_format($row_sanpham['sanpham_gia']);?></li>
                                </ul>
								<?php }else{ ?>
								<ul class="d-flex">
                                    <li class="new-price"><?php echo currency_format($row_sanpham['sanpham_gia']);?></li>
                                </ul>
								<?php } ?>
                            </div>
                            <div class="pro-details-rating-wrap">
                                <div class="rating-product">
                                    <?php 
                                          $sql_review = mysqli_query($con,'SELECT * FROM tbl_review WHERE sanpham_id = '.$row_sanpham['sanpham_id'].'');
                                          $row_review = mysqli_fetch_array($sql_review);

            							  for($i = 1; $i <= $row_review['user_rating'] ; $i++) {
														
									?>
                                        <i class="fa fa-star"></i>

                                    <?php } ?>
                                </div>
                            </div>
                            <div style="overflow: hidden; max-height: 330px;"><?php echo $row_sanpham['sanpham_mota'];?></div>
                            <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                <span>Thương hiệu:</span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="shop.php?th=<?php echo $row_sanpham['thuonghieu_id'];?>"><?php echo $row_sanpham['thuonghieu_name']; ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-details-quality">
                                <div class="pro-details-cart">
									<?php if($row_sanpham['sanpham_soluong'] == 0){?>
										<button class="hethang" disabled style="width:200px; height:50px; font-size:20px; font-weight:600; color:White;">HẾT HÀNG</button>
									<?php }else{ ?>
                                    <form>
                                    <button 
                                            name="id_addcart" 
											class="add-cart"
                                            id="id_addcart<?php echo $row_sanpham['sanpham_id']?>" 
                                            value="<?php echo $row_sanpham['sanpham_id']?>"  
                                            title="Thêm vào giỏ" class="action add-to-cart" 
                                            onclick="return click_add_cart<?php echo $row_sanpham['sanpham_id']?>();"
                                            data-bs-target="#exampleModal-Cart<?php echo $row_sanpham['sanpham_id']?>"
                                            data-bs-toggle="modal" >Thêm vào giỏ
                                    </button>
                                    </form>
									<?php } ?>
									
                                </div>
                                <div class="pro-details-compare-wishlist pro-details-wishlist" style="height:50px; width:55px; font-size:33px; border:1px solid; border-radius:5px; background-color:blue; margin-left:5px; padding:5px;" >
                                    <form>
                                        <button 
                                            name="id_yeuthich"
                                            id="id_yeuthich<?php echo $row_sanpham['sanpham_id']?>" 
                                            value="<?php echo $row_sanpham['sanpham_id']?>" 
                                            title="Thêm yêu thích" class="action wishlist"
                                            onclick="return click_yeu_thich<?php echo $row_sanpham['sanpham_id']?>();"  
                                            data-bs-target="#exampleModal-Wishlist<?php echo $row_sanpham['sanpham_id']?>"
                                            data-bs-toggle="modal"><i class="fa fa-heart" aria-hidden="true" style="color:white"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>				
                    </div>				
					<div class="col-lg-12 col-sm-12 col-xs-12">
					 <!-- product details description area start -->
                        <div class="description-review-wrapper">
                            <div class="description-review-topbar nav">
                                <button data-bs-toggle="tab" data-bs-target="#des-details2">Cấu hình</button>
                                <button class="active" data-bs-toggle="tab" data-bs-target="#des-details1">Thông tin</button>
                                <button data-bs-toggle="tab" data-bs-target="#des-details3">Đánh giá</button>
                            </div>
                            <div class="tab-content description-review-bottom">
                                <div id="des-details2" class="tab-pane">
                                    <div class="product-anotherinfo-wrapper text-start">
                                        <?php echo $row_sanpham['sanpham_mota']?>
                                    </div>
                                </div>
                                <div id="des-details1" class="tab-pane active">
                                    <div class="product-description-wrapper chitiet">
                                        <p>
											<style>.chitiet img {width:100%}</style>
                                            <?php echo $row_sanpham['sanpham_chitiet'];?>
                                        </p>
                                    </div>
                                </div>
                                <div id="des-details3" class="tab-pane">
									<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                                    <div class="container">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4 text-center">
                                                        <h1 class="text-warning mt-4 mb-4">
                                                            <b><span id="average_rating">0.0</span> / 5</b>
                                                        </h1>
                                                        <div class="mb-3">
                                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                                        </div>
                                                        <h3><span id="total_review">0</span> Review</h3>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p>
                                                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                                                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                                            </div>
                                                        </p>
                                                        <p>
                                                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                                                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                                            </div>               
                                                        </p>
                                                        <p>
                                                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                                                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                                            </div>               
                                                        </p>
                                                        <p>
                                                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                                                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                                            </div>               
                                                        </p>
                                                        <p>
                                                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                                                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                                            </div>               
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-4 text-center">
                                                        <h3 class="mt-4 mb-3">Đánh giá</h3>
                                                        <button type="button" name="add_review" id="add_review" class="btn btn-primary">Đánh giá</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5" id="review_content"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details description area end -->
					</div>
                </div>
            </div>
        </div>
<style>
body{
    font-weight:400;
}
header .header-top .top-nav ul li a {
    padding-top:10px;
    font-weight:500;
    font-size:15px;
}
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_phone = $('#user_phone').val();

        var user_review = $('#user_review').val();
		
		var sanpham_id = <?php echo $_REQUEST['id'];?>;
		
		var user_name = $('#user_name').val();

        if(user_phone == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_phone:user_phone, user_review:user_review , sanpham_id:sanpham_id , user_name:user_name},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"submit_rating.php",
            method:"POST",
            data:{action:'load_data' ,sanpham_id:<?php echo $_REQUEST['id'];?>},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'  ******'+data.review_data[count].user_phone.substr(6,4)+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});

</script>
<?php }else{
	echo header("refresh:0; url='index.php'");
} ?>
        <!-- Product Area Start -->
        <div class="product-area related-product">
            <div class="container">
                <!-- Section Title & Tab Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center m-0">
                            <h2 class="title">Related Products</h2>
                            <p>There are many variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>
                <!-- Section Title & Tab End -->
                <div class="row">
                    <div class="col">
                        <div class="new-product-slider swiper-container slider-nav-style-1">
                            <div class="swiper-wrapper">
								<?php 
									
								if(isset($_REQUEST['id'])){
									
									$id_related = $_REQUEST['id'];
											
									$sql_related = mysqli_query($con,"SELECT *,ceil(100-(100/sanpham_gia*sanpham_giakhuyenmai)) as phantram FROM `tbl_sanpham` a join tbl_thuonghieu b on a.thuonghieu_id = b.thuonghieu_id join tbl_category c on b.category_id = c.category_id WHERE c.category_id = (SELECT b.category_id FROM tbl_sanpham a JOIN tbl_thuonghieu b on a.thuonghieu_id = b.thuonghieu_id WHERE sanpham_id = '$id_related') LIMIT 6;");
            							while($row_related = mysqli_fetch_array($sql_related)) {
									
								?>
                                <div class="swiper-slide">
                                    <!-- Single Prodect -->
                                    <div class="product">
										<!--
                                        <span class="badges">
                                         <span class="new">New</span> 
                                        </span>
										-->
                                        <div class="thumb">
                                            <a href="single-product.php?id=<?php echo $row_related['sanpham_id'];?>" class="image">
                                                <img src="assets/images/product-image/<?php echo $row_related['sanpham_image'];?>" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/<?php echo $row_related['sanpham_image'];?>" alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="shop.php?th=<?php echo $row_related['thuonghieu_id'];?>">
												<?php echo $row_related['thuonghieu_name'];?></a></span>
                                            <h5 class="title"><a href="single-product.php?id=<?php echo $row_related['sanpham_id'];?>">
												<?php echo $row_related['sanpham_name'];?>
                                                </a>
                                            </h5>
                                            <span class="price">
                                            	<?php
                                                if(($row_related['sanpham_giakhuyenmai'])>0){
                                                    echo('
                                                    <span class="old">'.currency_format($row_related['sanpham_gia']).'</span>
                                                    <span class="new">'.currency_format($row_related['sanpham_giakhuyenmai']).'</span>
                                                    ');
                                                }else{
                                                    echo('
                                                    <span class="new">'.currency_format($row_related['sanpham_gia']).'</span>');
                                                    }
                                                    ?>
                                            </span>
                                        </div>
                                        <div class="actions" >
                                                <form <?php if($row_related['sanpham_soluong'] == 0 ){echo 'style="display:none;" ';} ?>>
                                                <button 
                                                        name="id_addcart" 
                                                        id="id_addcart<?php echo $row_related['sanpham_id']?>" 
                                                        value="<?php echo $row_related['sanpham_id']?>"  
                                                        title="Thêm vào giỏ" class="action add-to-cart" 
                                                        onclick="return click_add_cart<?php echo $row_related['sanpham_id']?>();"
                                                        data-bs-target="#exampleModal-Cart<?php echo $row_related['sanpham_id']?>"
                                                        data-bs-toggle="modal" ><i class="pe-7s-shopbag"></i>
                                                </button>
                                                </form>
                                                &emsp;
                                                <form>
                                                <button 
                                                        name="id_yeuthich" 
                                                        id="id_yeuthich<?php echo $row_related['sanpham_id']?>" 
                                                        value="<?php echo $row_related['sanpham_id']?>" 
                                                        title="Thêm yêu thích" class="action wishlist"
                                                        onclick="return click_yeu_thich<?php echo $row_related['sanpham_id']?>();"  
                                                        data-bs-target="#exampleModal-Wishlist<?php echo $row_related['sanpham_id']?>"
                                                        data-bs-toggle="modal"><i class="pe-7s-like"></i>
                                                </button>
                                                </form>
                                                &emsp;
                                                <button 
                                                        class="action quickview" 
                                                        data-link-action="quickview" 
                                                        title="Quick view" data-bs-toggle="modal" 
                                                        data-bs-target="#exampleModal<?php echo $row_related['sanpham_id']?>">
                                                        <i class="pe-7s-look"></i>
                                                </button>
 										 </div>
                                    </div>
                                </div>	
								<?php 
										}
									} 
								?>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End -->
        <!-- Footer Area Start -->
		<?php include('include/footer.php')?>
        <!-- Footer Area End -->
    </div>
<p id=msg></p>
<?php
$sql_id = mysqli_query($con,'SELECT * FROM tbl_sanpham ');
            while($row_id = mysqli_fetch_array($sql_id)) {?>
									
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js">
</script>
<script type="text/javascript">
function click_add_cart<?php echo $row_id['sanpham_id']?>(){
var id_addcart=document.getElementById('id_addcart<?php echo $row_id['sanpham_id']?>').value;
$.ajax({
        type:"post",
        url:"xuly/xuly-addcart.php",
        data: 
        {  
           'id_addcart' :id_addcart

        },
            cache:false,
            success: function (html) 
             {
               setTimeout(function () { 
                location.reload();
              }, 3 * 1000);
            }
            });
            return false;
 }
</script>
				
<?php }  ?>
<?php
$sql_id = mysqli_query($con,'SELECT * FROM tbl_sanpham ');
            while($row_id = mysqli_fetch_array($sql_id)) {?>
									
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js">
</script>
<script type="text/javascript">
function click_yeu_thich<?php echo $row_id['sanpham_id']?>(){
var id_yeuthich=document.getElementById('id_yeuthich<?php echo $row_id['sanpham_id']?>').value;
$.ajax({
        type:"post",
        url:"xuly/xuly-addcart.php",
        data: 
        {  
           'id_yeuthich' :id_yeuthich

        },
            cache:false,
            success: function (html) 
            {
               setTimeout(function () { 
                location.reload();
              }, 3 * 1000);
            }
            });
            return false;
 }
</script>	
	
	
	
<?php } ?>
    <!-- Global Vendor, plugins JS -->
    <!-- JS Files
    ============================================ -->
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
	<?php include_once('xuly/show-addcart.php')?>
</body>

</html>