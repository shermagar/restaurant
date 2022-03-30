                    <?php foreach ($products as $product): ?>
                  <div class="col-md-3" >
                    <div class="sub_menu js-img_btn" name="pro_id" id="imgbtn<?=$product->id?>" data-pro_id="<?=$product->id?>">
                      <?php $path=Uri::base().'assets/img/'.$product->image;?>
                      <img class="img_item" src="<?=$path?>">
                      <button class="img_btn "  ><?php echo ($product->name);?></button>
                    </div>
                  </div>
                 <?php endforeach; ?>

