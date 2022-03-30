 <?php echo $header; ?>
    <?php echo $header_menu; ?>
    <?php echo $side_menubar; ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <h1>
        Manage
        <small>Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div id="messages"></div>
          
          
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Category</button>
            <br /> <br />
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Category name</th>
                  <th>Status</th>
                 
                  <th>Action</th>
                </tr>
                </thead>
                <?php foreach($categorys as $category):?>
                <tbody>
               <td><?php $path=Uri::base().'assets/img/'.$category->image;?>
                 <img src="<?=$path?>" style="width:87px;">
               </td>
                  <td><?php echo($category->name);?></td>                  
                  <td><?php echo($category->active);?></td>
                  <td>
                   <button class="btnbtn" data-toggle="modal" data-target="#editModal" data-cat_id="<?=$category->id?> ">Edit</button>
                  <button class="btnbtn2" data-cat_id="<?=$category->id ?>" data-toggle="modal" data-target="#removeModal">Remove</button>
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
        <h4 class="modal-title">Add Category</h4>
      </div>

      <form role="form" action="<?php echo uri::base().'category/create'?>" method="post" id="createForm" enctype='multipart/form-data'>

        <div class="modal-body">

            <div class="form-group">

                  <label for="product_image">Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="image" type="file">
                      </div>
                  </div>
                </div>
         
          <div class="form-group">
            <label for="brand_name">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="name" placeholder="Enter category name" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="active" name="active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
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


<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Category</h4>
      </div>

      <form role="form" action="<?php echo uri::base().'category/edit/'.$category->id?>" method="post" id="updateForm" enctype='multipart/form-data'>

          <div class="modal-body">
          <div id="messages"></div>
          <div class="form-group">
            
            <input  type="hidden" id="btnid" name="id">
          </div>
        </div>      

          <div class="form-group">
            <label for="brand_name">Category Name</label>
            <input type="text" class="form-control" id="edit_category_name" name="name" placeholder="Enter category name" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="active" name="active" >
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
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


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Category</h4>
      </div>

      <form role="form" action="<?php echo uri::base().'category/remove/'.$category->id ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p data-cat_id="<?=$category->id ?>">Do you really want to remove?</p>
                         
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

 <?php echo $footer; ?>
   <script>
    $(document).ready(function(){
      $(".btnbtn").click(function(){
         var cat_id=$(this).data('cat_id')
      
      //  return false;

     var cat=$("#btnid").val(cat_id);
     // console.log(cat);

      });
    });
  </script>
<script>
  $(document).ready(function(){
    $(".btnbtn2").click(function(){
       var cat_id=$(this).data('cat_id')
    
    //  return false;

   var cat=$("#btn2id").val(cat_id);
   // console.log(cat);

    });
  });
</script>

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
        maxFileSize: 99999999,
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