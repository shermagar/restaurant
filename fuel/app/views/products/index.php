    <?php echo $header; ?>
    <?php echo $header_menu; ?>
    <?php echo $side_menubar; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Products</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Products</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

    
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
          </div>
        
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
          </div>
       

        
          <a href="<?php echo uri::base().'products/create' ?>" class="btn btn-primary">Add Product</a>
         

        <a href="<?php echo uri::base().'products/viewproduct' ?>" class="btn btn-success">View Product</a>
        
        <br /> <br />

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Products</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <!-- <th>Store</th> -->
                <th>Status</th>
               
                  <th>Action</th>
               
              </tr>
              </thead>
              <?php foreach ($products as $product):?>
              <tbody>
               <td><?php $path=Uri::base().'assets/img/'.$product->image;?>
                 <img src="<?=$path?>" style="width:90px;">
               </td>
               <td><?php echo($product->name);?></td>               
               <td><?php echo($product->price);?></td> 
               <!-- <td><?php //echo($product->store_id);?></td>  -->
               <td><?php echo($product->status);?></td> 
                <td>

                  <a href="<?php echo uri::base().'products/edit/'.$product->id ?>">
                    <button href="<?php echo uri::base().'products/edit/'.$product->id ?>" class="btnbtn1 js-btn" id='id' name='id'  data-toggle="modal" data-pro_id="<?=$product->id ?>" >Edit</button></a>

                  <button class="btnbtn2"  data-toggle="modal" data-target="#removeModal" data-pro_id="<?=$product->id ?>">Remove</button>
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


<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Product</h4>
      </div>

      <form role="form" action="<?php echo uri::base().'products/remove/'.$product->id ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
                 <div class="modal-body">
          <div id="messages"></div>
          <div class="form-group">
            
            <input  type="hidden" id="pro2id" name="id">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


    <?php echo $footer; ?>
<script>
  $(document).ready(function(){
    $(".btnbtn2").click(function(){
       var pro_id=$(this).data('pro_id')
    // console.log(pro_id);
    //  return false;

   var cat=$("#pro2id").val(pro_id);
   // console.log(cat);

    });
  });
</script>
<script type="text/javascript">
      $(document).on('click',".js-btn",function(){
        var pro_id = $(this).data('pro_id');
            $.ajax({
        type:"POST",
        url:"<?php echo uri::base().'products/edit'?>",
        data:{'id':pro_id},
        dataType:"html",


       });
      });
    </script>
    