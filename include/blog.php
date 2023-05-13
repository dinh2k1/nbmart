<div class="main-blog-area pb-100px">
    <div class="container">
        <!-- section title start -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-30px0px">
                    <h2 class="title">Tin tức công nghệ</h2>
                    <p>Thông tin mới nhất về sản phẩm sắp ra mắt; Thị trường công nghệ; Những bài trên tay đánh giá nhanh; Mẹo hữu ích</p>
                </div>
            </div>
        </div>
        <!-- section title start -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
		<?php 
            $sql_baiviet= mysqli_query($con,"SELECT * FROM `tbl_baiviet` ORDER BY baiviet_id DESC LIMIT 2 ");
            while($row_baiviet= mysqli_fetch_array($sql_baiviet)) { 
        ?>
            <div class="col-lg-6 col-sm-6 mb-xs-30px col-xs-6">
                <div class="single-blog">
                    <div class="blog-image">
                       <a href="blog-single.php?id=<?php echo $row_baiviet['baiviet_id'];?>">
													<img src="assets/images/blog-image/<?php echo $row_baiviet['baiviet_image'];?>" alt="" /></a>
                    </div>
                    <div class="blog-text">
                        <div class="blog-athor-date line-height-1">
                            <span class="blog-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row_baiviet['baiviet_ngaydang'];?></span>
							<br><br>
                            <span class="blog-date"><i class="fa fa-user" aria-hidden="true"></i><?php echo $row_baiviet['baiviet_tacgia'];?></span>
                        </div>
                        <h5 class="blog-heading" style="min-height: 309px;">
							<a class="blog-heading-link" href="blog-single.php?id=<?php echo $row_baiviet['baiviet_id'];?>" ><?php echo $row_baiviet['baiviet_ten'];?></a></h5>
                        <a href="blog-single.php?id=<?php echo $row_baiviet['baiviet_id'];?>" class="btn btn-primary blog-btn">Đọc thêm</a>
                    </div>
                </div>
            </div>
		<?php } ?>
        </div>
    </div>
</div>