<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..." autocomplete="off">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu mainMenu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php
        if($userRole<0){ ?>

        <li class="treeview" data-mid="0">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Admin Tool</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li data-opt="0" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Users</a></li>
            <li data-opt="1" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Roles</a></li>
            <li data-opt="2" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Role Assignment</a></li>
            <li data-opt="3" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Owner</a></li>
            <li data-opt="4" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Settings</a></li>
          </ul>
        </li>

        <li class="treeview" data-mid="1">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Operations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li data-opt="5" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Categories</a></li>
            <li data-opt="6" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Unit Types</a></li>
            <li data-opt="7" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Groups</a></li>
            <li data-opt="8" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Assets</a></li>
            <li data-opt="9" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Supliers</a></li>
          </ul>
        </li>

        <?php 
        }else{
          $pk->get_menu_user($userRole);
        }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>