<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo base_url(); ?>assets/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">MLM</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url(); ?>assets/admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
          alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">

          <?php echo $_SESSION['firstname']; ?>
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div>
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Dashboard</p>
            </a>
          </li>





          <li class="nav-item ">
            <a href="#" class="nav-link" >
              <i class="nav-icon fas fa-th"></i> <span>Package</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-down pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>packages/index"> Package List </a></li>
              <li><a href="<?php echo base_url(); ?>packages/create"> Add Package </a></li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i> <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-down pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: block;">
              <li><a href="<?php echo base_url(); ?>users/index"> User List </a></li>
              <li><a href="<?php echo base_url(); ?>users/tree">Network Tree </a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>transections/index" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Transections</p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>auth/logout" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Logout</p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      <!-- </div> -->
      <!-- /.sidebar -->
</aside>
