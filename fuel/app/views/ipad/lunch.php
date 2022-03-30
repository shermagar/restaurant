
  <link rel="stylesheet" type="text/css" href="../assets/css/takeorder.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">  
  <script src="<?php echo uri::base().'assets/js/jquery.min.js' ?>"></script>
  <script src="<?php echo uri::base().'assets/js/jquery-ui.min.js' ?>"></script>

            <h1>
        Kitchen
        <small>Items</small>
      </h1>
            <div id="myid">
            <a href="<?php echo uri::base().'orderipad/lunch'?>"><button class="btn1 active"  data-toggle="modal"> Kitchen Item</button></a>
            <a href="<?php echo uri::base().'orderipad/drinks'?>"><button class="btn1 "  data-toggle="modal"> Bar Item</button></a>
            </div>
            <br /> <br />
            <div class="box">

             <div class="boxbody">
                     <button class="btn btn-primary" id="btnbtn" value="" name="submit">Ready</button> 
                <table id="groupTable" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th>Item_Image</th>
                    <th>Item_Name</th>
                    
                    <th>Quantity</th>
                  <!--  <th>Table Number</th> -->
                    <th>Ready</th>
                 
                  </tr>
                  </thead>
                   <form method="post" enctype="multipart/form-data">
                   <?php foreach ($ipadorders as $ipadorder): ?>
                     <?php if ($ipadorder->type=='1'):?>
                      <?php if ($ipadorder->status=='0'):?>
                  <tbody class="table">
                    <tr>
                <td><?php $path=Uri::base().'assets/img/'.$ipadorder->image;?>
                 <img src="<?=$path?>" style="width:130px;"></td>

                  <td ><input style="width: 70%;" type="text" readonly  id="name" class="name" value="<?php echo ($ipadorder->name);?>"  name="name" />
                   </td>             
                 <td >Qty:<input style="width: 70%;" type="text" readonly  id="" class="qty" value="<?=$ipadorder->quantity?>"  name="quantity" />
                   </td> 
                 <input style="width: 70%;" type="hidden" id="" class="amount" readonly value="<?=$ipadorder->amount?>" name="amount" >
                 <input type="hidden"  name="id" id="id<?=$ipadorder->id?>" value="<?=$ipadorder->id?>">
                 <input type="hidden" id="status<?=$ipadorder->id?>"  value="0" name="status" >
                 <td><input type="checkbox" id="chk"  name="check[]" value="<?=$ipadorder->id?>" class="check"  ></td>
             
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
  var id=[];
  var status=[];
  $(".check:checked").each(function(){ 
  checkval.push($(this).val());     
       });

   $(".check:checked").each(function(){
    var itemI=$(this).val();
    id.push($('#id'+itemI).val());
  });
   // alert(id);

    $(".check:checked").each(function(){
    var itemI=$(this).val();
    status.push($('#status'+itemI).val());
  });

   $.ajax({
      type: "POST",
      url:  "<?php echo uri::base().'orderipad/upgrade_status'?>",
      data: {'check':checkval,'id':id,'status':status},
      dataType:'html',
      cache:false,
      success:function(){
        location.href = '<?php echo uri::base().'orderipad/lunch'?>';
              }
  });

  });
  });
  </script>
