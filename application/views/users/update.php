     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update User Information</h1>  
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item active"><a href="#">Insert</a></li> -->
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>packages/index">Packages</a></li>
              <li class="breadcrumb-item active"></li>
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
                        <h3 class="card-title">Update Information</h3>
                    </div> 

                    <?php //if(!empty($errors)) { ?>
                        <!-- <div class="alert alert-danger" style="margin-top:30px;"> <?php// echo $errors; ?></div> -->
                    <?php //} ?>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="<?php base_url(). 'users/edit'?>" >
                        <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Parent </label>
                            <select name="parent_id"  class="form-control">
                            <?php foreach($users as $user){ ?>
                              <option value="<?php echo $user->parent_id; ?>"> <?php echo $user->firstname." ".$user->lastname; ?></option>
                            <?php } ?>
                            </select>                            
                        </div>
                          <!-- <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" name="firstname" class="form-control" id="" value='<?php // echo $user->firstname; ?>'>
                        </div> -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text"  name="firstname"  value="<?php echo $user->firstname; ?>" class="form-control" id="" placeholder="Enter  First Name"><?php echo form_error('firstname', '<div class="alert alert-danger">','</div>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text"  name="lastname"  value="<?php echo $user->lastname; ?>" class="form-control" id="" placeholder="Enter Last Name"><?php echo form_error('lastname', '<div class="alert alert-danger">','</div>'); ?>
                        </div>
                        

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input type="text"  name="email" value="<?php echo $user->email; ?>" class="form-control" id="" placeholder="Enter Email"><?php echo form_error('email', '<div class="alert alert-danger">','</div>'); ?>
                        </div>
                      
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password </label>
                            <input type="password"  name="password" value="<?php echo $user->password; ?>" class="form-control" id="" placeholder="Enter Password"><?php echo form_error('password', '<div class="alert alert-danger">','</div>'); ?>
                        </div>
                      
                        <div class="form-group">
                            <label for="exampleInputEmail1">Package </label>
                            <select name="package_id"  class="form-control">
                            <?php foreach($packages as $package){ ?>
                              <option value="<?php echo $package->id; ?>"> <?php echo $package->name; ?></ption>
                            <?php } ?>
                            </select>                            
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Position </label>
                            <input type="text"  name="position" value="<?php echo $user->position; ?>" class="form-control" id="" placeholder="Enter Position"><?php echo form_error('position', '<div class="alert alert-danger">','</div>'); ?>
                        </div>
                        <div class="form-group">
                       
                       <label for="exampleInputEmail1">Profile </label>
                        <?php  echo form_upload([ 'name'=>'image' ,'class'=>'form-control' ]);?> <?php echo form_error('image', '<div class="alert alert-danger">','</div>'); ?> 
                         <?php //if(!empty($upload['error'])) { ?>
                           <!-- <div class="alert alert-danger" ><?php //echo $upload['error']; ?></div> -->
                         <?php //} ?>
                   </div> 
                      
                        <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
                </div>
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>












