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
              <!-- <li class="breadcrumb-item active"><a href="#">Insert</a></li> -->
              <li class="breadcrumb-item"><a href="#">Home</a></li>
             
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
                <h3 class="card-title">Transections List</h3>
                <a href="<?php echo base_url()."transections/create"; ?>" class="btn btn-success" style="float:right;">Create Transection</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#Id</th>
                      <th>User Id</th>
                      <th>Transection Types</th>
                      <th>Balance Types</th>
                      <th>Debit</th>
                      <th>Credit</th>
                      
                      
                    </tr>
                  </thead> 
                  <tbody>
                  <?php if(isset($transections)){ ?>
             
                    <?php foreach($transections as $transection) { ?>
                    <tr>
                      <td><?php echo $transection->id; ?></td>
                      <td><?php echo $transection->user_id; ?></td>
                      <td><?php echo $transection->trans_type; ?></td>
                      <td><?php echo $transection->balance_type; ?></td>
                      <td><?php echo $transection->debit; ?></td>
                      <td><?php echo $transection->credit; ?></td>
                     
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