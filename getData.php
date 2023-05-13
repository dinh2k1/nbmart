<?php include_once('database/connect.php')?>
<?php
$row = $_POST['row'];
if(isset($_REQUEST['order_by'])){
	$order_by = $_REQUEST['order_by'];
}else{
	$order_by = '';
}
if(isset($_REQUEST['where'])){
	$where = $_REQUEST['where'];
}else{
	$where ='';
}
$rowperpage = 15;

// selecting posts
$query = "SELECT *,ceil(100-(100/sanpham_gia*sanpham_giakhuyenmai)) as phantram FROM tbl_sanpham a join tbl_thuonghieu b
on a.thuonghieu_id = b.thuonghieu_id $where $order_by limit $row ,$rowperpage " ;
$result = mysqli_query($con,$query);
$html = '';

while($row = mysqli_fetch_array($result)){
	$id = $row['sanpham_id'];
?>

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px post " id="post_<?php echo $id; ?>">
                                                    <!-- Single Prodect -->
<div class="product">
  <span class="badges">
  <?php 	
  if(($row['sanpham_giakhuyenmai'])>0){
         echo(' <span class="sale">'.$row['phantram'].'%</span>
                <span class="new">New</span> ');
  }else{ echo(' <span class="new">New</span>'); }
  ?>
  </span>

  <div class="thumb">
  <?php 
    echo('<a href="single-product.php?id='.$row['sanpham_id'].'" class="image">
            <img src="assets/images/product-image/'.$row['sanpham_image'].'" alt="Product" />
            <img class="hover-image" src="assets/images/product-image/'.$row['sanpham_image'].'" alt="Product" />
          </a> ');
  ?>
  </div>

  <div class="content">
      <?php 
      echo ('<span class="category"><a href="single-product.php?id='.$row['sanpham_id'].'">'.$row['thuonghieu_name'].'</a></span>');
      echo ('<h5 class="title"><a href="single-product.php">'.$row['sanpham_name'].'</a></h5>');
      ?>

      <span class="price">
      <?php
      if(($row['sanpham_giakhuyenmai'])>0){
          echo('
          <span class="old">'.currency_format($row['sanpham_gia']).'</span>
          <span class="new">'.currency_format($row['sanpham_giakhuyenmai']).'</span>
          ');
      }else{
          echo('
          <span class="new">'.currency_format($row['sanpham_gia']).'</span>');
          }
          ?>
      </span>
  </div>
  <div class="actions" >
          <form>
          <button 
                  name="id_addcart" 
                  id="id_addcart<?php echo $row['sanpham_id']?>" 
                  value="<?php echo $row['sanpham_id']?>"  
                  title="Thêm vào giỏ" class="action add-to-cart" 
                  onclick="return click_add_cart<?php echo $row['sanpham_id']?>();"
                  data-bs-target="#exampleModal-Cart<?php echo $row['sanpham_id']?>"
                  data-bs-toggle="modal" ><i class="pe-7s-shopbag"></i>
          </button>
          </form>
          &emsp;
          <form>
          <button 
                  name="id_yeuthich" 
                  id="id_yeuthich<?php echo $row['sanpham_id']?>" 
                  value="<?php echo $row['sanpham_id']?>" 
                  title="Thêm yêu thích" class="action wishlist"
                  onclick="return click_yeu_thich<?php echo $row['sanpham_id']?>();"  
                  data-bs-target="#exampleModal-Wishlist<?php echo $row['sanpham_id']?>"
                  data-bs-toggle="modal"><i class="pe-7s-like"></i>
          </button>
          </form>
          &emsp;
          <button 
                  class="action quickview" 
                  data-link-action="quickview" 
                  title="Quick view" data-bs-toggle="modal" 
                  data-bs-target="#exampleModal<?php echo $row['sanpham_id']?>">
                  <i class="pe-7s-look"></i>
          </button>
  </div>
</div>
                                                </div>		

<?php }

echo $html;
?>