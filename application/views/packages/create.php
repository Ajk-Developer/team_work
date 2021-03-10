  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Package</h1>  
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item active"><a href="#">Insert</a></li> -->
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>packages/index">Packages</a></li>
              <li class="breadcrumb-item active">Create Package</li>
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
                        <h3 class="card-title">Quick Example</h3>
                    </div>

                    <?php// if(!empty($errors)) { ?>
                        <!-- <div class="alert alert-danger" style="margin-top:30px;"> <?php //echo $errors; ?></div> -->
                    <?php //} ?>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST">
                        <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Package Name</label> 
                            <select  name="name" class="form-control" id="" placeholder="Enter Pckage Name">
                            <option name=silver>Silver</option>
                            <option name=gold>Gold</option>
                            <option name=diamond>Diamond</option>
                            <option name=platinium>Platinium</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">ROI percentage</label>
                            <input type="text"  name="roi_percentage" class="form-control" id="" placeholder="ROI Precentage"><?php echo form_error('roi_percentage', '<div class="alert alert-danger">','</div>'); ?>
                        </div>
                        


                        <div class="form-group">
                            <label for="exampleInputEmail1">Binary percentage</label>
                            <input type="text"  name="binary_percentage" class="form-control" id="" placeholder="Binary Percentage"> <?php echo form_error('binary_percentage', '<div class="alert alert-danger">','</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Days </label>
                            <input type="text"  name="days" class="form-control" id="" placeholder="Enter Days"><?php echo form_error('days', '<div class="alert alert-danger">','</div>'); ?>
                        </div>

                        </div>
                        <!-- /.card-body -->

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












