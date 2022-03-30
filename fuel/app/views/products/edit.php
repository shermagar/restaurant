
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
    <div class="row" id="addModel">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
          </div>
        
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
          </div>
      <?php foreach ($products as $product): ?>
      <?php endforeach ?>


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add Product</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php echo uri::base().'products/edit/'.$product->id ?> " method="post" enctype="multipart/form-data">
              <div class="box-body">
                <?php debug::dump($product->id)?>

                

                <div class="form-group">
                  
                  <label>Image Preview: </label>
                  <img src="<?php echo uri::base() ?>" width="150" height="150" class="img-circle">
                
                </div>

                <div class="form-group">

                  <label for="product_image">Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="image" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Product name</label>
                  <input type="text" class="form-control" id="product_name" name="name" placeholder="Enter product name" autocomplete="off" value="" />
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" autocomplete="off" value=""/>
                </div>
                 <div class="form-group">
                  
                  <input type="hidden" id="proid" name="id" autocomplete="off" value="<?=$product->id?>"/>
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter 
                  description" autocomplete="off">
                  
                  </textarea>
                </div>

                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control " id="category" name="category_id">
                    <option value="0">Select</option>
                   <option value="1">veg</option>
                      <option value="2">non-veg</option>
                     
                   
                  </select>
                </div>
              
            
              <div class="form-group">
            <input  type="hidden" id="pro1id" name="id">
          </div>


                  <div class="form-group">
                  <label for="store">Type</label>
                  <select class="form-control" id="type" name="type">
                    <option value="1">Lunch</option>
                    <option value="2">Drinks</option>
                    <option value="3">Smoothies</option>
                  </select>
                </div> 

                <div class="form-group">
                  <label for="store">Active</label>
                  <select class="form-control" id="active" name="active"> 
                    <option value="1" >Yes</option>
                    <option value="2" >No</option>
                  </select>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" data-pro_id='<?=$product->id?>' name="submit">Save Changes</button>
                <a href="<?php echo uri::base().'products/' ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
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

<script type="text/javascript">
  $(document).ready(function() {
    $(".select_group").select2();
    $("#description").wysihtml5();

    $("#productMainNav").addClass('active');
    $("#createProductSubMenu").addClass('active');
    
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
    $("#product_image").fileinput({
        overwriteInitial: true,
        maxFileSize: 9999999,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

  });
</script>
    <?php echo $footer; ?>

<script>
  $(document).ready(function(){
    $(".btnbtn1").click(function(){
       var cat_id=$(this).data('pro_id')
    console.log(cat_id);
   

   var cat=$("#pro1id").val(pro_id);
  

    });
  }); 
</script>
