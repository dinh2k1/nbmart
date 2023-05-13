<!-- Modal Cart -->
<?php $sql_sanpham_addcart = mysqli_query($con,'SELECT * FROM tbl_sanpham a join tbl_thuonghieu b
on a.thuonghieu_id = b.thuonghieu_id ');
while($row_sanpham_addcart = mysqli_fetch_array($sql_sanpham_addcart)) {
?>
	<!-- Modal -->
    <div class="modal modal-2 fade" id="exampleModal<?php echo $row_sanpham_addcart['sanpham_id'] ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <i class="pe-7s-close"></i></button>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                            <!-- Swiper -->
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
									<?php $sql_thuvien_edit = mysqli_query($con,'SELECT * FROM tbl_thuvien_sanpham WHERE sanpham_id = '.$row_sanpham_addcart['sanpham_id'].'');
            								  		while($row_thuvien_edit = mysqli_fetch_array($sql_thuvien_edit)) {
														
									?>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/thuvien-hinhanh/<?php echo $row_sanpham_addcart['sanpham_name']?>/<?php echo $row_thuvien_edit['thuvien_image']; ?>" alt="" />
                                    </div>
									<?php }  ?>
                                </div>
                            </div>
                            <div class="swiper-container gallery-thumbs mt-20px slider-nav-style-1 small-nav">
                                <div class="swiper-wrapper">
									<?php $sql_thuvien_edit = mysqli_query($con,'SELECT * FROM tbl_thuvien_sanpham WHERE sanpham_id = '.$row_sanpham_addcart['sanpham_id'].'');
            								  		while($row_thuvien_edit = mysqli_fetch_array($sql_thuvien_edit)) {
														
									?>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/thuvien-hinhanh/<?php echo $row_sanpham_addcart['sanpham_name']?>/<?php echo $row_thuvien_edit['thuvien_image']; ?>" alt="" />
                                    </div>
									<?php }  ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-details-content quickview-content">
                                <h2><?php echo $row_sanpham_addcart['sanpham_name'] ?></h2>
                                <div class="pricing-meta">
                                    <ul class="d-flex">
										<?php
												if(($row_sanpham_addcart['sanpham_giakhuyenmai'])>0){
           											echo('
													<li class="old-price">'.currency_format($row_sanpham_addcart['sanpham_gia']).'</li>
                   									<li class="new-price">'.currency_format($row_sanpham_addcart['sanpham_giakhuyenmai']).'</li>
                  									');
												}else{
													echo('
                   									<li class="new-price">'.currency_format($row_sanpham_addcart['sanpham_gia']).'</li>');
													}
										?>
                                    </ul>
                                </div>
                                <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="read-review"><a class="reviews" href="#">( 2 Review )</a></span>
                                </div>
                                <p class="mt-30px"><?php echo $row_sanpham_addcart['sanpham_mota'] ?></p>

                                <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                    <span>Thương hiệu: </span>
                                    <ul class="d-flex">
                                        <li>
                                            <a href="#"><?php echo $row_sanpham_addcart['thuonghieu_name'] ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-details-quality">
                                    <div class="pro-details-cart">
									<?php if($row_sanpham_addcart['sanpham_soluong'] == 0){?>
										<button class="hethang" disabled style="width:200px; height:50px; font-size:20px; font-weight:600; color:White;">HẾT HÀNG</button>
									<?php }else{ ?>
                                    <form>
                                    <button 
                                            name="id_addcart" 
											class="add-cart"
                                            id="id_addcart<?php echo $row_sanpham_addcart['sanpham_id']?>" 
                                            value="<?php echo $row_sanpham_addcart['sanpham_id']?>"  
                                            title="Thêm vào giỏ" class="action add-to-cart" 
                                            onclick="return click_add_cart<?php echo $row_sanpham_addcart['sanpham_id']?>();"
                                            data-bs-target="#exampleModal-Cart<?php echo $row_sanpham_addcart['sanpham_id']?>"
                                            data-bs-toggle="modal" >Thêm vào giỏ
                                    </button>
                                    </form>
									<?php } ?>
                                    </div>
                                    <div class="pro-details-compare-wishlist pro-details-wishlist ">
									<form>
										<button class="add-cart"
												name="id_yeuthich" 
												id="id_yeuthich<?php echo $row_sanpham_addcart['sanpham_id']?>" 
												value="<?php echo $row_sanpham_addcart['sanpham_id']?>" 
												onclick="return click_yeu_thich<?php echo $row_sanpham_addcart['sanpham_id']?>();"  
												data-bs-target="#exampleModal-Wishlist<?php echo $row_sanpham_addcart['sanpham_id']?>"
												data-bs-toggle="modal">
                                        <a><i class="pe-7s-like"></i></a>
										</button>
									</form>	
                                    </div>
                                </div>
                                <div class="payment-img">
                                    <a href="#"><img src="assets/images/icons/payment.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <div class="modal customize-class fade" id="exampleModal-Cart<?php echo $row_sanpham_addcart['sanpham_id'] ?>" tabindex="-1"   aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                        <i class="pe-7s-check"></i> Thêm vào giỏ hàng thành công
                    </div>
                    <div class="tt-modal-product">
                        <div class="tt-img">
                            <img src="assets/images/product-image/<?php echo $row_sanpham_addcart['sanpham_image'] ?>" alt="Modern Smart Phone">
                        </div>
                        <h2 class="tt-title"><?php echo $row_sanpham_addcart['sanpham_name'] ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal wishlist -->

<div id="review_modal" class="modal customize-class fade" tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Đánh giá</h5>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="tel" name="user_phone" id="user_phone" class="form-control" placeholder="Số điện thoại" />
	        	</div>
				<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Tên" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Nội dung"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Đánh giá</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

    <!-- Modal wishlist -->
	<?php if(isset($_SESSION['id'])){?>
    <div class="modal customize-class fade" id="exampleModal-Wishlist<?php echo $row_sanpham_addcart['sanpham_id'] ?>" tabindex="-1"   aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                       <i class="pe-7s-check"></i> Thêm vào yêu thích thành công
                    </div>
                    <div class="tt-modal-product">
                        <div class="tt-img">
                            <img src="assets/images/product-image/<?php echo $row_sanpham_addcart['sanpham_image'] ?>" alt="Modern Smart Phone">
                        </div>
                        <h2 class="tt-title"><?php echo $row_sanpham_addcart['sanpham_name'] ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div> 
	<?php }else{ ?>
		<div class="modal customize-class fade" id="exampleModal-Wishlist<?php echo $row_sanpham_addcart['sanpham_id'] ?>" tabindex="-1"   aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                       <i class="pe-7s-check"></i>Bạn chưa đăng nhập
                    </div>
                </div>
            </div>
        </div>
		</div>
	<?php } ?>
<?php } ?>

			