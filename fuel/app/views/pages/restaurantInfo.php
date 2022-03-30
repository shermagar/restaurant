
     <?php echo $header; ?>
    <?php echo $header_menu; ?>
    <?php echo $side_menubar; ?>
 



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <h1>
        Service
        <small>Charge</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Service</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div id="messages"></div>
          
          
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Service</button>
            <br /> <br />
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Sevice</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Service</th>
                  <th>Vat</th>
                  <th>Discount</th>
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
                <?php foreach($services as $service):?>
                  <tr>
                  <td><?php echo($service->service);?></td>
                  <td><?php echo($service->vat);?></td>                  
                  <td><?php echo($service->discount);?></td>
                  <td>

                  <button class="btn btn-primary" data-toggle="modal" data-target="#removeModal">Remove </button>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
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
        <h4 class="modal-title">Add Service</h4>
      </div>

      <form role="form" action="<?php echo uri::base().'info/create'?>" method="post" id="createForm" enctype='multipart/form-data'>

        <div class="modal-body">
         
                <div class="form-group">
                  <label for="service_charge_value">Charge Amount (%)</label>
                  <input type="text" class="form-control" id="service_charge_value" required name="service" placeholder="Enter charge  %" value="" >
                </div>

                <div class="form-group">
                  <label for="vat_charge_value">Vat Charge (%)</label>
                  <input type="text" class="form-control" id="vat_charge_value" required name="vat" placeholder="Enter vat  %" value="" >
                </div>
                <div class="form-group">
                  <label for="vat_discount_value">Discount (%)</label>
                  <input type="text" class="form-control" id="vat_charge_value" required name="discount" placeholder="Enter discount  %" value="">
                </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" value="submit">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Category</h4>
      </div>

      <form role="form" action="<?php echo uri::base().'info/remove/'.$service->id ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
                         
        </div>
         <div class="modal-body">
          <div id="messages"></div>
          <div class="form-group">
            
            <input  type="hidden" id="btn2id" name="id">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" value="submit">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- <script>
  $(document).ready(function(){
    $(".btnbtn2").click(function(){
       var srv_id=$(this).data('srv_id')
    

   var srv=$("#btn2id").val(srv_id);
   // console.log(srv_id);
   //   return false;

    });
  });
</script> -->

