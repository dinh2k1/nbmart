<?php 
	function show_san_pham($sql_sanpham){
	while($row_sanpham = mysqli_fetch_array($sql_sanpham)) {?>
		
    <div class="col-lg-4 col-xl-2 col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 10px;">
        <div class="product" style="min-height: 350px;">
            <span class="badges">
            <?php 	
            if(($row_sanpham['sanpham_giakhuyenmai'])>0){ ?>

                <?php if($row_sanpham['sanpham_soluong'] == 0)
                    {echo '<span class="new" style="background-color:red;">Hết hàng</span>';} ?>
                <span class="sale">-<?php echo $row_sanpham['phantram']; ?>%</span>
                <span class="new">New</span>

            <?php }else{ ?>

                <?php if($row_sanpham['sanpham_soluong'] == 0)
                    {echo '<span class="new" style="background-color:red;">Hết hàng</span>';} ?>
                <span class="new">New</span>

            <?php } ?>
            </span>

            <div class="thumb">
            <?php 
              echo('<a href="single-product.php?id='.$row_sanpham['sanpham_id'].'" class="image">
                      <img src="assets/images/product-image/'.$row_sanpham['sanpham_image'].'" alt="Product" />
                      <img class="hover-image" src="assets/images/product-image/'.$row_sanpham['sanpham_image'].'" alt="Product" />
                    </a> ');
            ?>
            </div>

            <div class="content">
                <?php 
                echo ('<span class="category"><a href="shop.php?th='.$row_sanpham['thuonghieu_id'].'">
                '.$row_sanpham['thuonghieu_name'].'</a></span>');
                echo ('<h5 class="title"><a href="single-product.php?id='.$row_sanpham['sanpham_id'].'">
                '.$row_sanpham['sanpham_name'].'</a></h5>');
                ?>

                <span class="price">
                <?php
                if(($row_sanpham['sanpham_giakhuyenmai'])>0){
                    echo('
                    <span class="old">'.currency_format($row_sanpham['sanpham_gia']).'</span>
                    <span class="new">'.currency_format($row_sanpham['sanpham_giakhuyenmai']).'</span>
                    ');
                }else{
                    echo('
                    <span class="new">'.currency_format($row_sanpham['sanpham_gia']).'</span>');
                    }
                    ?>
                </span>
            </div>
            <div class="actions" >
                    <form <?php if($row_sanpham['sanpham_soluong'] == 0 ){echo 'style="display:none;" ';} ?> >
                    <button 
                            name="id_addcart" 
                            id="id_addcart<?php echo $row_sanpham['sanpham_id']?>" 
                            value="<?php echo $row_sanpham['sanpham_id']?>"  
                            title="Thêm vào giỏ" class="action add-to-cart" 
                            onclick="return click_add_cart<?php echo $row_sanpham['sanpham_id']?>();"
                            data-bs-target="#exampleModal-Cart<?php echo $row_sanpham['sanpham_id']?>"
                            data-bs-toggle="modal" ><i class="pe-7s-shopbag"></i>
                    </button>
                    </form>
                    &emsp;
                    <form>
                    <button 
                            name="id_yeuthich" 
                            id="id_yeuthich<?php echo $row_sanpham['sanpham_id']?>" 
                            value="<?php echo $row_sanpham['sanpham_id']?>" 
                            title="Thêm yêu thích" class="action wishlist"
                            onclick="return click_yeu_thich<?php echo $row_sanpham['sanpham_id']?>();"  
                            data-bs-target="#exampleModal-Wishlist<?php echo $row_sanpham['sanpham_id']?>"
                            data-bs-toggle="modal"><i class="pe-7s-like"></i>
                    </button>
                    </form>
                    &emsp;
                    <button 
                            class="action quickview" 
                            data-link-action="quickview" 
                            title="Quick view" data-bs-toggle="modal" 
                            data-bs-target="#exampleModal<?php echo $row_sanpham['sanpham_id']?>">
                            <i class="pe-7s-look"></i>
                    </button>
            </div>
        </div>
    </div>
<?php	
	}	
}
?>