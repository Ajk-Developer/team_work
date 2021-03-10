<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </section>                  
<section class="content">
      <div class="container-fluid">
        <div class="row justify-content-md-center">
                <div class="col-md-4">           
                    <div class="card card-primary">
                    <?php foreach($users as $user) { ?>
                      <?php } ?>
                      
                    <div class="card-body box-profile">
                <div class="text-center">
                <td><img src="<?php echo base_url().$upload_path.$user->image; ?>"class="profile-user-img img-fluid img-circle" alt="User profile picture" width="100" height="100"></td>
                </div>
                  <!-- <ul class="list-group list-group-unbordered mb-3"> -->
                  
                  <li class="list-group-item">
                  <b><label>Parent_id:</label></br></b>
                 
                  <?php echo $user->parent_id?>
                  </li>
                  <li class="list-group-item">
                  <b><label>Name:</label></br></b>
                  <?php echo $user->firstname." ".$user->lastname; ?>
                  </li>
                  <li class="list-group-item">
                 <b><labal>Email:</label></br></b>
                  <?php echo $user->email; ?>
                  </li>
                  <li class="list-group-item">
                  <b><labal>Password:</label></br></b>
                    <?php echo $user->password; ?>
                  </li>
                  <li class="list-group-item">
                  <b><labal>Package Name:</label></br></b>
                    <?php echo $user->package_id; ?>
                  </li>
                  <li class="list-group-item">
                  <b><labal>Position:</label></br></b>
                    <?php echo $user->position; ?>
                  </li>
                </ul>
              </div>
              </div> 
            </div>
            </div>
            </div>
            </div>
          