<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="<?php echo uri::base().'dashboard' ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

          
            <li class="treeview" id="userMainNav">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                <li id="createUserSubNav"><a href="<?php echo uri::base().'users/create' ?>"><i class="fa fa-circle-o"></i> Add User</a></li>
                

                
                <li id="manageUserSubNav"><a href="<?php echo uri::base().'users' ?>"><i class="fa fa-circle-o"></i> Manage Users</a></li>
              
              </ul>
            </li>
          

        
           <!--  <li class="treeview" id="groupMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Groups</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              
                  <li id="createGroupSubMenu"><a href="<?php //echo uri::base().'groups/create' ?>"><i class="fa fa-circle-o"></i> Add Group</a></li>
                
                
                <li id="manageGroupSubMenu"><a href="<?php //echo uri::base().'groups' ?>"><i class="fa fa-circle-o"></i> Manage Groups</a></li>
                
              </ul>
            </li> -->
          
        

        

        <!-- <li class="header">Settings</li> -->
        
          <!-- <li id="storesMainNav"><a href="<?php// echo uri::base().'stores/' ?>"><i class="fa fa-files-o"></i> <span>Stores</span></a></li> -->
        

        
          <li id="tablesMainNav"><a href="<?php echo uri::base().'tables/' ?>"><i class="fa fa-files-o"></i> <span>Tables</span></a></li>
       

       
          <li id="categoryMainNav"><a href="<?php echo uri::base().'category/' ?>"><i class="fa fa-files-o"></i> <span>Category</span></a></li>
        

        

        
            <li class="treeview" id="productMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Products</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                  <li id="createProductSubMenu"><a href="<?php echo uri::base().'products/create' ?>"><i class="fa fa-circle-o"></i> Add product</a></li>
                
                
                <li id="manageProductSubMenu"><a href="<?php echo uri::base().'products' ?>"><i class="fa fa-circle-o"></i> Manage Products</a></li>
              
              </ul>
            </li>
          

         
            <!-- <li class="treeview" id="OrderMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Orders</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                  <li id="createOrderSubMenu"><a href="<?php //echo uri::base().'orders/create' ?>"><i class="fa fa-circle-o"></i> Add order</a></li>
                               
                <li id="manageOrderSubMenu"><a href="<?php //echo uri::base().'orders' ?>"><i class="fa fa-circle-o"></i> Manage Orders</a></li>
               
              </ul>
            </li>
          

         
            <li class="treeview" id="ReportMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Reports</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                  <li id="productReportSubMenu"><a href="<?php //echo uri::base().'reports' ?>"><i class="fa fa-circle-o"></i> Product Wise</a></li>
                  <li id="storeReportSubMenu"><a href="<?php //echo uri::base().'reports/storewise' ?>"><i class="fa fa-circle-o"></i> Total Store wise</a></li>
                
              </ul>
            </li>
         
 -->
         
            <li id="serviceMainNav"><a href="<?php echo uri::base().'info/' ?>"><i class="fa fa-files-o"></i> <span>Service Info</span></a></li>
          

         
            <!-- <li id="profileMainNav"><a href="<?php //echo uri::base().'users/profile/' ?>"><i class="fa fa-files-o"></i> <span>Profile</span></a></li> -->
          
          
            <li id="settingMainNav"><a href="<?php echo uri::base().'users/setting/' ?>"><i class="fa fa-wrench"></i> <span>Setting</span></a></li>
          

        
        

        <li><a href="<?php echo uri::base().'orderipad/ipad' ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>  