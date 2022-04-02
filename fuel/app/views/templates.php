<title><?=$title?></title>
  <!-- <link rel="stylesheet" type="text/css" href="../assets/css/takeorder.css"> -->
  <link href="<?php echo Uri::create('assets/css/odrlst.css'); ?>" rel="stylesheet">
  <link href="<?php echo Uri::create('assets/css/swiper.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo Uri::create('assets/css/all.css'); ?>" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="assets/css/odrlst.css">
  <link rel="stylesheet" type="text/css" href="assets/css/swiper.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/all.css">  -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
  <script src="<?php echo uri::base().'assets/js/swiper.min.js' ?>"></script>
  <script src="<?php echo uri::base().'assets/js/swiper.js' ?>"></script>

<head><?=$header?></head>

<body>
	<?=$content?>
</body>


  <script type="text/javascript">
  $(document).on('click', ".increase", function(){
      var pro_id = $(this).data('pro_id');
     var value = $('#increase'+pro_id).val();
     var price = $(this).data('price');
  var value = parseInt(document.getElementById('js-bill_number'+pro_id).value, 10); 
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('js-bill_number'+pro_id).value = value;
  var amount = value * price;
  $('#js-bill_amount' +pro_id).val(amount);

  subtotal = isNaN(subtotal) ? 0 : subtotal;
  subtotal = subtotal + price;
  // alert(subtotal);
  $('#subtotal').text(subtotal);
  var dis = $(this).data('discount');
  var vat = $(this).data('tax');

   discount = dis * subtotal/100;
   $('#discount').text(discount);

   tax = vat * subtotal/100;
   $('#tax').text(tax);

   total = subtotal + tax - discount;
   $('#totalid').text(total);
});

 $(document).on('click', ".decrease", function() {
  var pro_id = $(this).data('pro_id');
  var value = $('#decrease' + pro_id).val();
  var price = $(this).data('price');
  var dis = $(this).data('discount');
  var vat = $(this).data('tax');
  var value = parseInt(document.getElementById('js-bill_number'+pro_id).value, 10);
  value = isNaN(value) ? 0 : value;
  if(value > 0){
  value--;
  document.getElementById('js-bill_number' + pro_id).value = value;
  // alert(value);
    var amount = value * price;
$('#js-bill_amount'+pro_id).val(amount);/* amoun add */

  subtotal = subtotal - price;
  $('#subtotal').text(subtotal);
   discount = dis * subtotal/100;
   $('#discount').text(discount);
   tax = vat * subtotal/100;
   $('#tax').text(tax);

   total = subtotal + tax - discount;
 }
   $('#totalid').text(total);

});

  </script>

