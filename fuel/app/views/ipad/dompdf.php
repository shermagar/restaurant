<style type="text/css">
	   .thead{ background-color:rgba(0,0,0,0) !important;}
   .thead,.amnt{float: right; border-bottom: hidden; border-top: hidden !important; float: right; background-color:rgba(0,0,0,0) !important ; }
   tr{border-bottom:3px dotted #E8E9E9}
   .num{text-align: center; color:#637279;}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<div class="sub_container col-md-12">
        <?php foreach ($invoices as  $invoice):?>
                <?php endforeach;?>	
	<div class="num"><h1>Bill Of Table Number :<?=$invoice->table_id?> </h1></div>
	 <div class="row border_tab" >
            <div class="box-body">
             <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                  <tr >
                    <th> Name</th>
                    <th>Qty</th>
                    <th>Each</th>
                    <th>Total</th>
                   </tr>
                </thead>
                <tbody id="append_data" >
        <?php foreach ($invoices as  $invoice):?>
      <tr class="js-bill_tr" name="pro_id">
        <td><?=$invoice->name?></td>
        <td><?=$invoice->quantity?></td>
        <td><?=$invoice->price?></td>
        <td><?=$invoice->amount?></td>
      </tr>
        <?php endforeach;?> 
                </tbody>
             </table>
          </div>

          </div>
      </div>
 <div class="div" style="width:50px; height: 70px; margin-left:78%;">
        <?php foreach ($charge as $chg):?>
      <?php endforeach;?>
                <!--sub_total and total-->

          <table class="table table-striped" >
            <tr style="border-bottom: hidden; border-top: hidden;" >
             <th class="thead">Sub_Total:</th>
             <td class="amnt" id="subtotal" ><?php echo $sub?></td>
            </tr>

            <tr style="border-bottom: hidden; border-top: hidden;" >
              <th class="thead">Total:</th>
              <td class="amnt" id="totalid"><?php echo $total?></td>
            </tr>

          <tr style="border-bottom: hidden; border-top: hidden;" >
            <th class="thead">Discounts(<?=$chg->discount?>%):</th>
            <td class="amnt" id="discount"><?php echo $discount?></td>
          </tr>


            <tr style="border-bottom: hidden; border-top: hidden;" >
              <th class="thead">Tax(<?=$chg->vat?>%):</th>
              <td class="amnt" id="tax"><?php echo $tax?></td>
            </tr>

          <tr style="border-bottom: hidden; border-top: hidden;" >    
            <th class="thead">Balance Due:</th>   
            <td class="amnt">0.00</td>
          </tr>
        </table>              
</div>
                       

