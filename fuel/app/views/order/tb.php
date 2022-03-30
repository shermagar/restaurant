 <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">  
 <script src="<?php echo uri::base().'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo uri::base().'assets/js/jquery-ui.min.js' ?>"></script>
<style type="text/css">
/*body{background: radial-gradient(circle, blue, grey);}*/
h1{text-align: center; font-size: 50px;}
	ul li{list-style: none; display: inline-block; margin-left: 3%; margin-top:5%;  }
	.btn2{width: 200px; height:70px; font-size: 30px; border-radius: 0.4em; color: #4f4f4f; }
	.btn3{color:#fff; background-color: #3c8dbc; width:150px; height:50px; font-size: 18px; border-radius:0.2em;  margin-left:70%;}
</style>
<body>
	<h1>Table Number</h1>
<form action="<?php echo Uri::base().'order/tbl'?>" method="post">
 
	<section  class="table">
		<ul>
	<?php foreach ($tables as $table): ?>
    <li> <input class="btn2" readonly value="<?php echo ($table->table_num);?>" >
    <input type="checkbox" id="chk" name="checkname[]" value="<?=$table->id?>" class="check">
    <li>
	<?php endforeach;?>
</ul>
</section>
<br />
<button type="submit" id="table" class=" btn3" name="submit">Add</button>
</form>
</body>

<script type="text/javascript">
$(document).ready(function(){
$('#table').click(function(){
var checkval = [];
$(".check:checked").each(function(){ 
checkval.push($(this).val());       

     });
  });
});


</script>
 






	
	

   
