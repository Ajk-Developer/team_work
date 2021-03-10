<html>
<head>
<title>Login Page</title>
<!-- <script  src="<?php //echo base_url();  ?>asssets/jquery.js"></script>
<script>
$(document).ready(function(){
$("#btn").on("click",function(e){
  $.ajax({
    url:"auth.php/login",
    type:"POST",
    success:function(data){
    $("#table").html(data);
  }

});

});
});
</script> -->

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
<!-- <div id = "box" class="testbox"  style="padding:10px; background-color:pink;  border:5px solid black;">
<input type="submit" name="btn"  id="btn" value="Load Value" class="btn btn-primary" > 
<table id="table" class="table table-bordered">
<tr align="center">
<th >id</th>
<th >Name</th>
</tr>
<tr>
<td align="center">1</td>
<td >Danish</td>
</tr>
</table>
</div> -->

  <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            
            
            
            </div>
          </div>
        </div><!-- /.container-fluid -->
        <link rel="stylesheet" href="<?php echo base_url();  ?>application\views\style.css">
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-md-center">
            <div class="col-md-6">           
              <div class="card card-primary">
                
                <!-- <img src="<?php// echo base_url();?>vendor\styles\images\building.jpg " alt=" " > -->
                <!-- <link rel="stylesheet" type="text/css" href="//base_url()application\views\style.css"> -->
                    <div class="card-header">
                        <h3 class="card-title">Sign In</h3>
                    </div>
                    <?php //if (!empty($login_error)) { ?>
                        <!-- <div class="alert alert-danger"><?php //echo $login_error; ?></div> -->
                    <?php //} ?>
                    <?php //echo validation_errors(' <div class="alert alert-danger">','</div>'); ?>
                 


                    <form  method="POST">
                    <div class="card-body">   

                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" name="email" class="form-control" id="login" placeholder="Enter email" >  <?php echo form_error('email', '<div class="alert alert-danger">','</div>'); ?>
                        
                        </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="login1" placeholder="Password" >  <?php echo form_error('password', '<div class="alert alert-danger">','</div>'); ?>
                          
                      </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="login" value="Log In" class="btn btn-primary" > 
                  <!-- <button type="submit" name="register" value="Register" class="btn btn-primary" >  -->
                   <a href= "register" name="register"  class="btn btn-primary " >Register</a></button>
                </div>
                
    </form>
    </div>
</body>
</html>
