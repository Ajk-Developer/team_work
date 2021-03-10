<script>

$(document).ready(function(){

  $('#debit').on('blur',function(){
       var debit = $(this).val();

    if(debit != ''){
      $('#credit').attr('disabled',true);
    }else{
      $('#credit').removeAttr('disabled');
    }
  });

  $('#credit').on('blur' ,function(){  

      var debit = $(this).val();

        if(debit != ''){
          $('#debit').attr('disabled',true);
        }else{
          $('#debit').removeAttr('disabled');
        }

      });

}); 



  /*
  function showHide() {
    let assets = document.getElementById('debit')
    if (assets.value == '') {
      //document.getElementById('credit').style.display = 'block'
      $("#credit").prop('disabled', true);
    } else {
      $("#credit").prop('disabled', false);
      //document.getElementById('credit').style.display = 'none'
    }
  }
  

  function showHides() {
    let assets = document.getElementById('credit')
    if (assets.value == '') {
      $("#debit").prop('disabled', true);
    } else {
      $("#debit").prop('disabled', false);
    }
  }
  */
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Transection</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- <li class="breadcrumb-item active"><a href="#">Insert</a></li> -->
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
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
              <h3 class="card-title">Transection</h3>
            </div>

            <?php// if(!empty($errors)) { ?>
            <!-- <div class="alert alert-danger" style="margin-top:30px;"> <?php //echo $errors; ?></div> -->
            <?php //} ?>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST">
              <div class="card-body">
               
              <div class="form-group">
                            <label for="exampleInputEmail1">Users Id</label>
                            <select name="user_id" class="form-control">
                            <?php foreach($users as $user){ ?>
                              <option value="<?php echo $user->id; ?>"> <?php echo $user->firstname." ".$user->lastname; ?></ption>
                            <?php } ?>
                            </select>                            
                        </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Transection Type</label>
                  <select name="trans_type" class="form-control">
                    <?php foreach($trans_types as $trans_type){ ?>
                        <option value="<?php echo $trans_type->keyword; ?>"><?php echo $trans_type->name; ?></ption>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Balance Type</label>
                  <select name="balance_type" class="form-control" id="" placeholder="Enter Balance Type">

                  <?php foreach($balance_types as $balance_type){ ?>
                              <option value="<?php echo $balance_type->keyword; ?>"> <?php echo $balance_type->name; ?></option>
                            <?php } ?>
                    <!-- <option name=company_balance>Company_Balance</option>
                    <option name=promotion_balance>Promotion_Balance</option> -->

                  </select>
                </div>
                <!-- <div id="drop-down" name="drop-down">
                  <label for="purpose">Purpose </label>
                  <select class="form-control" name="purpose" id="purpose" onChange=showHide()>
                    <option value="0">select</option>
                    <option value="1">Debit</option>
                    <option value="1" selected>Credit</option>
                  </select>
                </div>
                <div class="form-group">
                  <div name="hidden-panel" id="hidden-panel">
                    <label for="amount"> Amount </label>
                    <input class="form-control" type="text" name="amount" id="amount" />

                  </div> -->



                  <div class="form-group">
                            <label for="exampleInputEmail1"  >Debit</label>
                            <input type="text" name="debit" class="form-control"   id="debit" placeholder="Amount" > <?php echo form_error('binary_percentage', '<div class="alert alert-danger">','</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" >Credit </label>
                            <input type="text"  name="credit" class="form-control" id="credit"  placeholder="Amount"><?php echo form_error('days', '<div class="alert alert-danger">','</div>'); ?>
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