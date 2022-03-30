  <style type="text/css">
    td{width: 15%;}
  </style>
  <link rel="stylesheet" type="text/css" href="../assets/css/takeorder.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">  
  <script src="<?php echo uri::base().'assets/js/jquery.min.js' ?>"></script>
  <script src="<?php echo uri::base().'assets/js/jquery-ui.min.js' ?>"></script>
        <!-- Small boxes (Stat box) -->

            <h1>
        Bar
        <small>Items</small>
      </h1>
          <!-- <div class="col-md-12 col-xs-12"> -->
            <div id="myid">
            <a href="<?php echo uri::base().'order/kitchenitem'?>"><button href="<?php  uri::base().'order/kitchenitem' ?>" class="btn1 "  data-toggle="modal"> Kitchen Item</button></a>
            <a href="<?php echo uri::base().'order/baritem'?>"><button href="<?php echo uri::base().'order/baritem' ?>" class="btn1 active"  data-toggle="modal"> Bar Item</button></a>
            </div>

                  <!-- action="<?php //echo Uri::base().'order/orderitm' ?>"  -->
            <br /> <br />
            <div class="box">

             <div class="box-body">
                     <button class="btn btn-primary" id="btnbtn" value="" name="submit">Ready</button> 
                <table id="groupTable" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th>Item</th>
                    <th>Item_Name</th>
                    
                    <th>Quantity</th>
                  <!--  <th>Table Number</th> -->
                    <th>Ready</th>
                 
                  </tr>
                  </thead>
                   <form method="post" enctype="multipart/form-data">
                   <?php foreach($restaurants as $restaurant):?>
                   <?php endforeach;?>
                   <?php foreach ($orderitems as $orderitem): ?>
                     <?php if ($orderitem->type=='2'):?>
                      <?php if($orderitem->status=='0'):?>
                  <tbody class="table">
                    <tr>
                <td><?php $path=Uri::base().'assets/img/'.$orderitem->image;?>
                 <img src="<?=$path?>" style="width:250px;"></td>

                  <td ><input style="width: 70%;" type="text" readonly  id="name<?=$orderitem->id?>" class="name" value="<?php echo ($orderitem->name);?>"  name="name" />
                   </td>             
                 <td >Qty:<input style="width: 70%;" type="text" readonly  id="qty<?=$orderitem->id?>" class="qty" value="<?=$orderitem->quantity?>"  name="quantity" />
                   </td> 
                 <input style="width: 70%;" type="hidden" id="<?=$orderitem->id?>" class="amount" readonly value="<?=$orderitem->amount?>" name="amount" >


                 <input type="hidden"  name="tbl" id="table<?=$orderitem->id?>" value="<?php echo($orderitem->table_id);?>">

                 <input type="hidden"  name="id" id="id<?=$orderitem->id?>" value="<?=$orderitem->id?>">

                 <input type="hidden"  name="service" id="service<?=$orderitem->id?>" value="<?=$restaurant->service?>">
                 <input type="hidden"  name="tax" id="tax<?=$orderitem->id?>" value="<?=$restaurant->vat?>">
                 <input type="hidden"  name="discount" id="discount<?=$orderitem->id?>" value="<?=$restaurant->discount?>"> 
                 <input type="hidden" id="status<?=$orderitem->id?>"  value="0" name="status" >
                 <td><input type="checkbox" id="chk"  name="check[]" value="<?=$orderitem->id?>" class="check"  ></td>
             
                </tr>        
                  </tbody>
                <?php endif;?>
                <?php endif;?>
                 <?php endforeach; ?>
             </form>
                </table>
               
              </div>
            
            </div>


        
<script type="text/javascript">
$(document).ready(function(){
  $('#btnbtn').click(function(){
  var checkval=[];
  var amnt=[];
  var tbl=[];
  var service=[];
  var tax=[];
  var discount=[];
  var id=[];
  var status=[];
  $(".check:checked").each(function(){ 
  checkval.push($(this).val());     
       });

 $(".check:checked").each(function(){
    var itemI=$(this).val();
    amnt.push($('#'+itemI).val());
  });

   $(".check:checked").each(function(){
    var itemI=$(this).val();
    tbl.push($('#table'+itemI).val());
  });

      $(".check:checked").each(function(){
    var itemI=$(this).val();
    service.push($('#service'+itemI).val());
  });
         $(".check:checked").each(function(){
    var itemI=$(this).val();
    tax.push($('#tax'+itemI).val());
  });
            $(".check:checked").each(function(){
    var itemI=$(this).val();
    discount.push($('#discount'+itemI).val());
  });


   $(".check:checked").each(function(){
    var itemI=$(this).val();
    id.push($('#id'+itemI).val());
  });

    $(".check:checked").each(function(){
    var itemI=$(this).val();
    status.push($('#status'+itemI).val());
  });
// console.log(status);
// return false;
   $.ajax({
      type: "POST",
      url:  "<?php echo uri::base().'order/invoice'?>",
      data: {'check':checkval,'tbl':tbl,'id':id,'service':service,'tax':tax,'amount':amnt,'discount':discount,'status':status},
      dataType:'html',
      cache:false,
      success:function(){
        location.href = '<?php echo uri::base().'order/baritem'?>';
              }
  });

  });
  });
  </script>

