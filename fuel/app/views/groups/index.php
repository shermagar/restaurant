 <?php echo $header; ?>
    <?php echo $header_menu; ?>
    <?php echo $side_menubar; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Groups</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">groups</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              
            </div>
        
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              
            </div>
        
            <a href="<?php echo uri::base().'groups/create' ?>" class="btn btn-primary">Add Group</a>
            <br /> <br />
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Groups</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="groupTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Group Name</th>
                  
                    <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                 <?php foreach($groupss as $group):?>
                      <tr>
                        <td><?php echo ($group->group_name);?></td>

                        
                        <td>
                         
                          <a href="<?php echo uri::base().'groups/edit/'.$group->id ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>  
                        
                          
                          <a href="<?php echo uri::base().'groups/delete/'.$group->id ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                          
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

  <script type="text/javascript">
    $(document).ready(function() {
      $('#groupTable').DataTable({
        'order': []
      });
      $('#groupMainNav').addClass('active');
      $('#manageGroupSubMenu').addClass('active');
    });
  </script>
 <?php echo $footer; ?>
    