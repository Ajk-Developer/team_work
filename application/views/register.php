<html>
<head>
<title>Register Page</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo  base_url(); ?>assets/admin-lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>assets/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>assets/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>assets/admin-lte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet"  href="<?php echo base_url();  ?>assets/admin-lte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>assets/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>assets/admin-lte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>assets/admin-lte/plugins/summernote/summernote-bs4.min.css">

</head>
<body>


<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
      <div class="row justify-content-md-center">
                <div class="col-md-6">           
                    <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Register Your self</h3>
                    </div>
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success"><?php echo $_SESSION['success'] ?></div>
   <?php } ?>
  

    <!-- <?// echo validation_errors(' <div class="alert alert-danger">','</div>'); ?> -->
    <form action="" method="POST">
    <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input name="firstname" type="text" class="form-control" id="firstname"  placeholder="Enter First Name" ><?php echo form_error('firstname', '<div class="alert alert-danger">','</div>'); ?>
                   
                </div>

                  <div class="form-group">
                    <label for="lastname">Last Name</label> 
                    <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Enter Last Name" ><?php echo form_error('lastname', '<div class="alert alert-danger">','</div>'); ?>
                     
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" ><?php echo form_error('email', '<div class="alert alert-danger">','</div>'); ?>
                     
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" ><?php echo form_error('password', '<div class="alert alert-danger">','</div>'); ?>
                    
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="register" value="Register" class="btn btn-primary">
                  <a href= "login"  name="login" placeholder="Log In" class="btn btn-primary" >Login</a></button>
                </div>
    </div>
    </form>
    </div>
    </div>
    </section>
    </div>
</body>
</html>
<!-- <a href= "auth/login"> -->