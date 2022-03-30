<link rel="stylesheet" type="text/css" href="../assets/css/takeorder.css">
 <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">  
<script src="<?php echo uri::base().'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo uri::base().'assets/js/jquery-ui.min.js' ?>"></script>
    <section class="content">
      <!-- Small boxes (Stat box) -->
          <h1>
      Bar
      <small>Items</small>
    </h1>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div id="myid">
          <a href="<?php echo uri::base().'order/kitchenitem'?>"><button href="<?php echo uri::base().'order/kitchenitem' ?>" class="btn1 "  data-toggle="modal"> Kitchen Item</button></a>
          <a href="<?php echo uri::base().'order/baritem'?>"><button href="<?php echo uri::base().'order/baritem' ?>" class="btn1 active"  data-toggle="modal"> Bar Item</button></a>
          </div>
          <?php foreach ($products as $product): ?>
          <?php endforeach ;?>
          <br/>
          <div style="text-align: center;  ">
          <form action="<?php echo Uri::base().'order/barsearch'?>" method="post">
          <input style="width:30%;" type="search" name="name" required />
          <input type="submit" value="Search" name="submit" />
          </form>
                </div>
          <form action="<?php echo Uri::base().'order/chk' ?>"  method="post" class="form">
          <button type="submit" id="menucard" class=" btn2" ">Order_Item</button>
          <br /> <br />
          <div class="box">
          <div class="box-header">
          <h3 class="box-title"></h3>
          </div>
           <div class="box-body">
              <table id="groupTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Item</th>
                  <th>Item_Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Select</th>
                </tr>
                </thead>
                <?php foreach ($products as $product): ?>
                  <?php if ($product->type=='2'):?>
                <tbody class="table">
                  <tr>
               <td><?php $path=Uri::base().'assets/img/'.$product->image;?>
                 <img src="<?=$path?>" style="width:250px;"></td>
              <td><?php echo ($product->name);?></td>
               <td>Rs:<input type="text"  id="price" readonly placeholder=""  value="<?php echo ($product->price);?>" class="price"  /></td>
               <td>Qty:<input type="text"  id="<?=$product->id?>" class="qty" value=""/>
                 </td> 
               <td>Rs:<input type="text" id="total" readonly value="" ></td>
            <td><input type="checkbox" id="chk" name="checkname[]" value="<?php echo ($product->id);?>" class="check"  ></td>
              </tr>        
                </tbody>
              <?php endif;?>
               <?php endforeach; ?>
              </table>
            </div>
          </div>
           </form>
        </div>

<script type="text/javascript">
$(document).ready(function(){
$('#menucard').click(function(){
var checkval = [];
$(".check:checked").each(function(){ 
checkval.push($(this).val());       
     });
  });
});
</script>


<script type="text/javascript">
    $('.qty').on('keyup',function(){
    $('.table').each(function(){
    var price = $(this).find('#price').val();
    var  qty =$(this).find('.qty').val();
    // alert(qty);
    total = price * qty;
    $(this).find('#total').val(total);
       });
    });
</script>
  
              
