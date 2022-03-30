
    <?php echo $header; ?>
    <?php echo $header_menu; ?>
    <?php echo $side_menubar; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div id="messages"></div>
          
         
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Table</button>
            <br /> <br />
            


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Tables</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Store</th>
                  <th>Table number</th>
                  <th>Capacity</th>
                  <th>Available</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <?php foreach($tables as $table): ?> 
                <tbody>
                <!-- <td><?php //echo ($table->store_id); ?></td> -->
                <td><?php echo ($table->table_num); ?></td>
                <!-- <td><?php //echo ($table->capacity); ?></td>
                <td><?php //echo ($table->available); ?></td>
                <td><?php //echo ($table->active); ?></td>
 -->                <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#editModel">Edit </button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#removeModel">Remove </button>
                  
                </td>
                </tbody>
              <?php endforeach; ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add table</h4>
      </div>

      <form role="form" action="<?php echo uri::base().'tables/create' ?>" method="post" id="createForm">

        <div class="modal-body">

          <div class="form-group">
            <label for="brand_name">Table Number</label>
            <input type="text" class="form-control" id="table_number" name="table_num" placeholder="Enter table number" autocomplete="off" required>
          </div>

          <!-- <div class="form-group">
            <label for="brand_name">Capacity</label>
            <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Enter capacity" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="active" name="active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div> -->

      <!--     <div class="form-group">
            <label for="active">Available</label>
            <select class="form-control" id="available" name="available">
             
                <option value=" ">9</option>
                
             
            </select>
          </div> -->

     <!--      <div class="form-group">
            <label for="active">Store</label>
            <select class="form-control" id="store" name="store_id">
             
                <option value=" ">1</option>
                <option value="">2</option>
             
            </select>
          </div> -->

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit table</h4>
      </div>

      <form role="form" action="<?php echo uri::base().'tables/update' ?>" method="post" id="updateForm">

        <div class="modal-body">
          <div id="messages"></div>

          <div class="form-group">
            <label for="brand_name">Table Name</label>
            <input type="text" class="form-control" id="edit_table_name" name="edit_table_name" placeholder="Enter table name" autocomplete="off">
          </div>

         <!--  <div class="form-group">
            <label for="brand_name">Capacity</label>
            <input type="text" class="form-control" id="edit_capacity" name="edit_capacity" placeholder="Enter capacity" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="edit_active" name="edit_active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>

          <div class="form-group">
            <label for="active">Store</label>
            <select class="form-control" id="edit_store" name="edit_store">
             
                <option value=""></option>
                          </select>
          </div>

        </div> -->

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove table</h4>
      </div>

      <form role="form" action="<?php echo uri::base().'tables/remove' ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



