  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Enter New User</h1>  
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item active"><a href="#">Insert</a></li> -->
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>packages/index">Packages</a></li>
              <li class="breadcrumb-item active">New User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">           
                    <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Register your self</h3>
                    </div>

                    <?php //if(!empty($errors)) { ?>
                        <!-- <div class="alert alert-danger" style="margin-top:30px;"> <?php// echo $errors; ?></div> -->
                    <?php// } ?>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post"  enctype="multipart/form-data" >
                     <?php //echo form_open_Multipart('users/upload') ?>
                        <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Parent </label>
                            <select name="parent_id" class="form-control">
                            <?php foreach($users as $user){ ?>
                              <option value="<?php echo $user->id; ?>"> <?php echo $user->firstname." ".$user->lastname; ?></ption>
                            <?php } ?>
                            </select>                            
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Position </label>
                            <select name="position" class="form-control">
                              <option value="left"> Left</option>
                              <option value="right"> Right</option>
                            </select>                              
                        </div>
  
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text"  name="firstname" class="form-control" id="" placeholder="Enter  First Name"><?php echo form_error('firstname', '<div class="alert alert-danger">','</div>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text"  name="lastname" class="form-control" id="" placeholder="Enter Last Name"><?php echo form_error('lastname', '<div class="alert alert-danger">','</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input type="text"  name="email" class="form-control" id="" placeholder="Enter Email"><?php echo form_error('email', '<div class="alert alert-danger">','</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password </label>
                            <input type="password"  name="password" class="form-control" id="" placeholder="Enter Password"><?php echo form_error('password', '<div class="alert alert-danger">','</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Package </label>
                            <select name="package_id" class="form-control">
                            <?php foreach($packages as $package){ ?>
                              <option value="<?php echo $package->id; ?>"> <?php echo $package->name; ?></ption>
                            <?php } ?>
                            </select>                             
                        </div>
 
                        <div class="form-group">
                       
                            <label for="exampleInputEmail1">Profile </label>
                             <?php  echo form_upload([ 'name'=>'image' ,'class'=>'form-control' ]);?>
                              <?php if(!empty($upload['error'])) { ?>
                                <div class="alert alert-danger" ><?php echo $upload['error']; ?></div>
                              <?php } ?>
                        </div>

                        </div> 
                        

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
                </div>
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>












