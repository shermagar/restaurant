<div class="modal-header" style="min-height: 50.428571px;">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title"><?=$items['name']?> Items</h4>
</div>

  <div class="modal-body">
    <div  class="categorys"> 
      <?php foreach ($products as $product): ?>
        <div class="col-md-3" >
          <div class="sub_menu js-img_btn" name="pro_id" id="imgbt<?=$product->id?>" data-pro_id="<?=$product->id?>">
              <?php $path=Uri::base().'assets/img/'.$product->image;?>
              <img class="img_item" src="<?=$path?>">
              <button class="img_btn "  ><?php echo ($product->name);?></button>
          </div>
        </div>
          <?php endforeach; ?>
    </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
  </div>
