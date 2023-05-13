<div class="contact-area">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">Thêm sản phẩm</h2>
                        </div>
<?php 
$sql_select_cat = mysqli_query($con,'SELECT * FROM `tbl_category`');
$sql_select_th = mysqli_query($con,'SELECT * FROM `tbl_thuonghieu`');
?>
                        <form class="contact-form-style" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <select id="sel1" class="form-select" aria-label="Default select example" onchange="giveSelection(this.value)" name="danhmuc-sp">

									  <?php while($row_select_cat = mysqli_fetch_array($sql_select_cat)) {?>
                                      <?php echo('<option value="'.$row_select_cat['category_id'].'">'.$row_select_cat['category_name'].'</option>');?>
									  <?php } ?>
                                    </select>
                                </div>
								
                                <div class="col-lg-6">
                                    <select id="sel2" class="form-select" aria-label="Default select example" name="thuonghieu-sp">
										<?php
										while($row_select_th = mysqli_fetch_array($sql_select_th)){
										echo('
									  	<option data-option="'.$row_select_th['category_id'].'" value="'.$row_select_th['thuonghieu_id'].'">');
										echo($row_select_th['thuonghieu_name']);
										echo('	
									  	</option>'); 	
										}
										?>
                                    </select>
                                </div>
								<div class="col-lg-12">
                                    <input name="ten-sp" placeholder="Tên sản phẩm" type="text" />
                                </div>
								<div class="col-lg-6">
									<input name="gia-sp" placeholder="Giá sản phẩm" type="number" value="0" />
								</div>
								<div class="col-lg-6">
									<input name="gia-km-sp" placeholder="Giá khuyến mãi" type="number" value="0" />
								</div>
								
                                <div class="col-lg-12">
									
								<script src="assets/js/ckeditor.js"></script>
									
        						<textarea name="mota-sp" id="mota-sp"></textarea>
    							<script>
                                    ClassicEditor
                                        .create( document.querySelector( '#mota-sp' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>
								<br>
        						<textarea name="chitiet-sp" id="chitiet-sp"></textarea>
    							<script>
                                    ClassicEditor
                                        .create( document.querySelector( '#chitiet-sp' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>
									
								<br>
                                </div>
								<div class="col-lg-6">
									<input name="soluong-sp" placeholder="Số lượng" type="number" value="0" />
								</div>
								<div class="col-lg-6">
									<input name="image" placeholder="Hình ảnh" type="file" />
								</div>
								<div class="col-lg-6">
									<button class="btn btn-primary" type="add-sp-submit" value="submit" name="add-sp-submit">Thêm sản phẩm</button>
								</div>
								
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	
var sel1 = document.querySelector('#sel1');
var sel2 = document.querySelector('#sel2');
var options2 = sel2.querySelectorAll('option');

function giveSelection(selValue) {
  sel2.innerHTML = '';
  for(var i = 0; i < options2.length; i++) {
    if(options2[i].dataset.option === selValue) {
      sel2.appendChild(options2[i]);
    }
  }
}

giveSelection(sel1.value);
</script>