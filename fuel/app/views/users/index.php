    <?php echo $header; ?>
    <?php echo $header_menu; ?>
    <?php echo $side_menubar; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
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
         
          
          
            <a href="<?php echo uri::base().'users/create' ?>" class="btn btn-primary">Add User</a>
            <br /> <br />
         


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Group</th>

                  
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
                        
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                       

                        <td>
                         
                            <a href="<?php echo uri::base().'users/edit/' ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                        
                        
                            <a href="<?php echo uri::base().'users/delete/' ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                         
                        </td>
                     
                      </tr>
                 
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
      $('#userTable').DataTable({
        'order' : [],
        });

      $("#userMainNav").addClass('active');
      $("#manageUserSubNav").addClass('active');
    });
  </script>
    <?php echo $footer; ?>
   