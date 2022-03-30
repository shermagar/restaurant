  <link rel="stylesheet" type="text/css" href="../assets/css/takeorder.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">  
  <script src="<?php echo uri::base().'assets/js/jquery.min.js' ?>"></script>
  <script src="<?php echo uri::base().'assets/js/jquery-ui.min.js' ?>"></script>
 

            <?php foreach ($products as $product): ?>
            <?php endforeach ;?>
               <?php foreach ($orders as $key=>$order):?>
                   <?php endforeach;?>
            <br/><br><br>

            <div style="text-align: center" />
            <form action="<?php echo Uri::base().'order/knsearch'?>" method="post">
            <input style="width:30%;" type="search" name="name" required />
            <input type="submit" value="Search" name="submit" />
            </form>
                  </div>

            <div class="box">
            <div class="box-header">
            <h3 class="box-title"></h3>
            </div>
             <div class="box-body">
                <table id="groupTable" class="table table-bordered table-striped">
              <select class="form-control" id="table" name="table"  style="width: 15%;">
              <option value="" >Select Table</option><br>
              <?php foreach ($tables as $table): ?>
              <option value="<?=$table->id?>" name="table" id="table"><?php echo ($table->table_num);?></option>
            <?php endforeach;?>
               <?php //debug::dump($table->id)?>
             
            </select>
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
                 <form action="" method="POST" enctype="multipart/form-data" >
                  <?php foreach ($products as $product): ?>
                      
                  
                      
                  <tbody class="table">
                    <tr>
      <td><?php $path=Uri::base().'assets/img/'.$product->image;?>
    <img src="<?=$path?>" style="width:250px;"></td>
   <td  style="font-size:25px; "><?php echo ($product->name);?></td>
   <td>Rs:<input type="text"  id="price" readonly placeholder=""  value="<?php echo ($product->price);?>" class="price"  /></td>

   <td>Qty:<input type="text"  id="<?=$product->id?>" class="qty" value=""  name="quantity" /></td>
  <input type="hidden"  id="order"  value="<?=$order->id?>"  name="order_id"  />
                   
  <td>Rs:<input type="text" id="total" class="amount" readonly value="" name="amount" ></td>

  <td><input type="checkbox" id="chk"  name="check[]" value="<?php echo ($product->id);?>" class="check"  ></td>

                </tr>        
                  </tbody>
              
                 <?php endforeach; ?>

             </form>
                </table>
              </div>
             <button class="btn btn-primary" id="btnbtn1" val="" name="submit">Order Item</button>
            </div>

  <script type="text/javascript">
  $(document).ready(function(){  
  $('#btnbtn1').click(function(){
 
  var tbl=$("#table").val();
  //   console.log(tbl);
  // return false;
   $.ajax({
      type: "POST",
      url:  "<?php echo uri::base().'order/order'?>",

      data: {'table':tbl },

      dataType:'html',
      cache:false,
   });
  
   return false;
  });
  });
</script>

        
  <script type="text/javascript">
      $(document).ready(function(){
      $('.qty').on('keyup',function(){
      $('.table').each(function(){
      var price = $(this).find('#price').val();
      var  qty =$(this).find('.qty').val();
      // alert(qty);
      total = price * qty;
      $(this).find('#total').val(total);
         });
      });

  $('#btnbtn1').click(function(){
  var checkval = [];
  var qty = [];
  var ord=$("#order").val();
  // var tbl=$("#table").val();
  $(".check:checked").each(function(){ 
  checkval.push($(this).val());     
  
       });
  $(".check:checked").each(function(){
    var itemId=$(this).val();
    qty.push($('#'+itemId).val());
  });


    

   $.ajax({
      type: "POST",
      url:  "<?php echo uri::base().'order/orderitem'?>",

      data: {'check':checkval,'quantity':qty,'order_id':ord },

      dataType:'html',
      cache:false,
      // success: function(result){
      //   console.log(result);return false;
        // if(result){
        //   alert('done');
        // }
        // else
        // {
        //   alert('try again f');
        // }
      // }
             
  });
   return false;
  });
  });

  </script>





    
