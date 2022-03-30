   <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">  
  <script src="<?php echo uri::base().'assets/js/jquery.min.js' ?>"></script>
  <script src="<?php echo uri::base().'assets/js/jquery-ui.min.js' ?>"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>
<body>
  
<br /><br />
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'kitchen')">Kitchen</button>
  <button class="tablinks" onclick="openCity(event, 'bar')">Bar</button>
  <button class="tablinks" onclick="openCity(event, 'smoothies')">Smoothies</button> 
</div>



<div id="kitchen" class="tabcontent">
  <div class="container">
    <br />

    <br /><br />
          

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
</div>

  <div id="bar" class="tabcontent">
    <div class="container">
    <br />

      <br /><br />
             <div class="boxbody">
                     <button class="btn btn-primary" id="btnbtn1" value="" name="submit">Ready</button> 
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
                     <?php if ($ipadorder->type=='2'):?>
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
  </div>

   <div id="smoothies" class="tabcontent">
    <div class="container">
    <br />

      <br /><br />
             <div class="boxbody">
                     <button class="btn btn-primary" id="btnbtn2" value="" name="submit">Ready</button> 
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
                     <?php if ($ipadorder->type=='3'):?>
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
  </div>

  <div id="display"></div>
   
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
      dataType:"html",
      success:function(){
      location.href = '<?php echo uri::base().'orderipad/type'?>';
              }
  });

  });
  });
  </script>
  <script type="text/javascript">
$(document).ready(function(){
  $('#btnbtn1').click(function(){
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
      dataType:"json",
      success:function(type){
      location.href = '<?php echo uri::base().'orderipad/type'?>';
              }
  });

  });
  });
  </script>
  <script type="text/javascript">
$(document).ready(function(){
  $('#btnbtn2').click(function(){
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
      dataType:"json",
      success:function(type){
      location.href = '<?php echo uri::base().'orderipad/type'?>';
              }
  });

  });
  });
  </script>
   
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>   
</body>
</html> 