   <?php echo $header; ?>

             <div class="box">
             
                <h1 class="box-title" style="text-align: center;">Create Invoice</h1>
           
              <!-- /.box-header -->
              <div class="box-body">
                <table id="manageTable" class="table table-bordered table-striped">
                  
                  <thead>
                  <tr>
                    <th style="width: 50%;">Table Number</th>
                    <th>Bill</th>
                   
                    
                  </tr>
                  </thead>
                  <?php// debug::dump($tables)?>
              <!-- <?php //endforeach;?> -->
                <tbody>
                <form action="<?php echo uri::base().'invoice/index'?>" method="POST" enctype="multipart/form-data" >              
                    <tr>
                    <td>
              <select class="form-control" name="table"  style="width: 35%;">
              <option>Select Table</option><br>
              
              <?php foreach ($tables as $table):?>
              <option value="<?=$table->id?>"  id="table"><?php echo ($table->table_num);?></option>
              <?php endforeach;?>
             <?php //debug::dump($table->id)?>
              </select>
              </td>                  
                    <td><button  class="btn btn-primary" id="btn">Create Bill</button></td>
                   </tr>
              </form>
                  </tbody>
                </table>
              </div>
              </div>

              
         
    