  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>  
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item active"><a href="#">Insert</a></li> -->
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
                <!-- <a href="<?php // echo base_url()."packages/create"; ?>" class="btn btn-success" style="float:right;">Create Package</a> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#Id</th>
                      <th>Name</th>
                      <th>Day</th>
                      <th>Roi Percentage</th>
                      <th>Binary Percentage</th>
                      <th>Update</th>
                      <th>Delete</th>
                      
                    </tr>
                  </thead> 
                  <tbody>
                  <?php if(isset($packages)){ ?>
             
                    <?php foreach($packages as $package) { ?>
                    <tr>
                      <td><?php echo $package->id; ?></td>
                      <td><?php echo $package->name; ?></td>
                      <td><?php echo $package->days; ?></td>
                      <td><?php echo $package->roi_percentage; ?></td>
                      <td><?php echo $package->binary_percentage; ?></td>
                      <td> <a button class="btn-primary btn" href="<?php echo base_url(); ?>packages/update/<?php echo $package->id; ?>"class="text-white">Update: </button></a></td>
                      <td> <a button class="btn-danger btn" href="<?php echo base_url(); ?>packages/delete/<?php echo $package->id; ?>"class="text-white">Delete: </button></a></td>
                      <!-- <td> <button class="btn-danger btn"class="text-white"> Delete:</button></td> -->
                      
                    </tr>
                    <?php } ?>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
             
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
            </div>
            
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>