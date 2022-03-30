 <div class="col-md-12">
        <?php foreach ($charge as $chg):?>
      <?php endforeach;?>
                <!--sub_total and total-->
                    <div class="row">
                      <div class="col-md-6">
                        <table class="table table-striped" >
                          <tr style="border-bottom: hidden; border-top: hidden;" >
                           <th class="thead">Sub_Total:</th>
                           <td class="amnt" id="subtotal" ><?php echo $sub?></td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <table class="table table-striped" >
                          <tr style="border-bottom: hidden; border-top: hidden;" >
                            <th class="thead">Total:</th>
                            <td class="amnt" id="totalid"><?php echo $total?></td>
                          </tr>
                        </table>
                      </div> 
                    </div>               
                  <!--discounts table-->
                  <div class="row">
                    <div class="col-md-6">
                      <table class="table table-striped" >
                        <tr style="border-bottom: hidden; border-top: hidden;" >
                          <th class="thead">Discounts(<?=$chg->discount?>%):</th>
                          <td class="amnt" id="discount"><?php echo $discount?></td>
                        </tr>
                      </table>
                    </div>
                  </div>               
                  <!-- tax and balance due table-->
                  <div class="row">
                    <div class="col-md-6">
                      <table class="table table-striped" >
                          <tr style="border-bottom: hidden; border-top: hidden;" >
                            <th class="thead">Tax(<?=$chg->vat?>%):</th>
                            <td class="amnt" id="tax"><?php echo $tax?></td>
                          </tr>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <table class="table table-striped" >
                        <tr style="border-bottom: hidden; border-top: hidden;" >    
                          <th class="thead">Balance Due:</th>   
                          <td class="amnt">0.00</td>
                        </tr>
                      </table>
                    </div> 
                  </div>               
              </div>