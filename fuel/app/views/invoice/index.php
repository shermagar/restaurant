   <?php echo $header; ?>

             <div class="box">
             
                <h1 class="box-title" style="text-align: center;">Invoice</h1>
           
              <!-- /.box-header -->
              <div class="box-body">
                <table id="manageTable" class="table table-bordered table-striped">
                  
                  <thead>
                  <tr>
                    <th style="width: 50%;">Table Number</th>
                    <th>Bill</th>
                   
                    
                  </tr>
                  </thead>
                  <?php foreach($invoices as $invoice):?>
              <?php endforeach;?>
                  <tbody>
                    <tr>
                    <td><?php echo($invoice->table_num);?></td>                  
                    <td><button class="btn btn-primary" id="btn" data-toggle="modal" data-target="#bill">Bill</button></td>
                   </tr>
                  </tbody>
                </table>
              </div>
              </div>

              
         
              
              <br /> <br />
                    
            
          <div class="modal fade" tabindex="-1" role="dialog" id="bill">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close"  data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" style="text-align: center;">Bill</h4>
        </div>
            <div class="box">

            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Item Name</th>
                  <th>Quantity</th>
                  <th>Amount</th>
                </tr>
                </thead>

               <?php //debug::dump($invoices)?>
                <tbody>
                <?php foreach($restaurants as $restaurant):?>
                  <?php endforeach;?>
                <?php foreach($invoices as $invoice ):?>
                 <?php if($invoice->status=='0'):?>
                  <tr>
                  <td><?=$invoice->invoice_at?></td>
                  <td><?=$invoice->name?></td>
                  <td><?=$invoice->quantity?></td>
                  <td>Rs:<?=$invoice->amount?>.00</td>
                  <input type="hidden" id="tid" name="tbid" value="<?=$invoice->table_id?>">
                  </tr>
                <?php endif;?>
                  <?php endforeach;?>

                  <tr>
                  <th></th><th></th><th>Sub Total</th>
                
                  <td>Rs:<?=$sub?>.00</td></tr>
                
                  <tr>
                  <th></th><th></th><th>Tax</th>
                  <td><?=$restaurant->vat?>%</td>
                  </tr>
                  <tr>
                  <th></th><th></th><th>Service Charge</th>
                  <td><?=$restaurant->service?>%</td>
                  </tr>
                  <tr>
                  <th></th><th></th><th>Discount</th>
                  <td><?=$restaurant->discount?>%</td>
                  </tr>
                  <th></th><th></th><th>Total</th>
                   
                  <td>Rs:<?=$sum?>.00</td>
                   
                  </tbody>
              </table>
                      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="pay" class="btn btn-primary" value="submit">Pay</button>
        </div>
       <!--  <div id="display" style="color: #4f4f4f; font-size:25px;"></div>
            </div> -->
          </div>
      </div>
    </div>
  </div>

       
<script type="text/javascript">
$(document).ready(function(){
  $('#pay').click(function(){
var id=$('#tid').val();
// console.log(id);
// return false;
   $.ajax({
      type: "POST",
      url:  "<?php echo uri::base().'invoice/pay'?>",
      data: {'tbid':id},  
      dataType:'html',
      cache:false,
      success:function(result){
        // $('#display').html('<strong>Paid</strong>');

        location.href = '<?php echo uri::base().'invoice/create'?>';
              }
  });

  });
  });
  </script>



 
