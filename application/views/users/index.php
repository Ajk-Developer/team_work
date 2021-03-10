<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <!-- <li class="breadcrumb-item active">Simple Tables</li>
            </ol> -->
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
                <h3 class="card-title">Users</h3>
                <a href="<?php echo base_url()."users/create"; ?>" class="btn btn-primary" style="float:right;">Create User</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-sm table table-bordered ">
                  <thead>
                    <tr>
                      <!-- <th style="width: 10px">#Id</th> -->
                      <th>Id</th>
                      <th>Image</th>
                      <th>Parent_id</th>
                      <th>Position</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th> Email</th>
                      <th>Password	</th>
                      <th>Package_Name</th>
                      <th>Update</th>
                      <th>Delete</th>
                      <th>Profile</th>
                    </tr>
                  </thead>  
                  <tbody>
                    <?php if(isset($users)){ ?>
                    <?php foreach($users as $user) { ?>
                    <tr>
                      <td><?php echo $user->id; ?></td>
                      <td><img src="<?php echo base_url().$upload_path.$user->image; ?>" alt="" width="50" height="60"></td>
                      <td><?php echo $user->parent_name; ?></td>
                      <td><?php echo $user->position; ?></td>
                      <td><?php echo $user->firstname; ?></td>
                      <td><?php echo $user->lastname; ?></td>
                      <td><?php echo $user->email; ?></td>
                      <td><?php echo $user->password; ?></td>
                      <td><?php echo $user->package_name; ?></td>
                      
                      <td> <a button class="btn-primary btn" href="<?php echo base_url();?>users/edit/<?php echo $user->id; ?>"class="text-white">Update: </button></a></td>
                      <td> <a button class="btn-danger btn" href="<?php echo base_url(); ?>users/delete/<?php echo $user->id; ?>"class="text-white">Delete: </button></a></td>
                      <td> <a button class="btn-success btn" href="<?php echo base_url(); ?>users/profile/<?php echo $user->id; ?>" class="text-white">UserInfo:</button></a></td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                    

                  </tbody>
                  
                 
                </table>
                
               
              </div>
             
              
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                
                <ul class="pagination pull-right">
                  
                  
                <?php echo $this->pagination->create_links();?>
                  
                
             <!-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li> 
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> -->
                </ul>
              </div>
            </div>
            <!-- /.card -->
            </div>  
        </div>
        </div>
        </div>
        </section>