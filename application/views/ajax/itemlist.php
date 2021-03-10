<!DOCTYPE html>
<html>
<head>
    <title>codeigniter ajax request - itsolutionstuff.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>codeigniter ajax request - itsolutionstuff.com</h2>
        </div>
    </div>
</div>


<div class="row">
  <div class="col-lg-8">
    <strong>Keyword:</strong>
    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Keyword">
  </div>
  <div class="col-lg-8">
    <strong>Name:</strong>
    <textarea name="name" id="name"  class="form-control" placeholder="Name"></textarea>
  </div>
  <div class="col-lg-8">
    <br/>
    <button class="btn btn-success">Submit</button>
  </div>
</div>


<table class="table table-bordered" style="margin-top:20px">


  <thead>
      <tr>
          <th>Keyword</th>
          <th>Name</th>
      </tr>
  </thead>


  <tbody>
   <?php foreach ($data as $item) { ?>      
      <tr>
          <td><?php echo $item->keyword; ?></td>
          <td><?php echo $item->name; ?></td>
      </tr>
   <?php } ?>
  </tbody>


</table>
</div>


<script type="text/javascript" src="<?php echo base_url();  ?>asssets/jquery.js">
    $("button").on(click,function(){


       var keyword = $("input[name='keyword']").val();
       var name = $("textarea[name='name']").val();

    //    var keyword = $("#keyword").val();
    //    var name = $("#name").val();


        $.ajax({
           url: '../controller/ajaxRequestPost', 
           type: 'POST',
           data: {keyword: keyword  , name: name}, 
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
                $("tbody").append("<tr><td>"+keyword+"</td><td>"+name+"</td></tr>");
                alert("Record added successfully");  
           }
        });

  
    });


</script>


</body>
</html>