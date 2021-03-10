 <h1>&nbsp Employe List</h1>
<div class="container">
<div class="alert alert-success label-control col-md-8" style="display: none;"></div><br><br><br>
<div style="float:right ;"><button id="addbtn"  class="btn btn-success">Add New</button></div>
  
    <table class="table table-bordered table-sm" style="margin-top: 20px">
        <thead>
            <tr>
                <td><strong>ID</strong></td>
                <td><strong>Employe Name</strong></td>
                <td><strong>Address</strong></td>
                <td><strong>Created At</strong></td>
                <td><strong>Action</strong></td>

            </tr>
        </thead>
        <tbody id="showdata">

        </tbody>
    </table>
</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title ">Modal title</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>&nbsp
            </div>
            <div class="modal-body">
                <form id="myform" action="" method="POST" class="form-horizontal">
                    <input type="hidden" name="txtid" value="0">
                    <div class="card-body">

                        <div class="form-group">
                            <strong><label class="label-control col-md-2">Name</label></strong>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control" id="">
                            </div>
                        </div>



                        <div class="form-group">
                            <strong><label class="label-control col-md-2">Address</label></strong>
                            <div class="col-md-10">
                                <textarea name="address" class="form-control" id=""></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="savebtn" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> 


<div id="editmodel" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title ">Edit Employe</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>&nbsp
            </div>
            <div class="modal-body">
                <form id="myform" action="" method="POST" class="form-horizontal">
                    <input type="hidden" name="txtid" value="0">
                    <div class="card-body">

                        <div class="form-group">
                            <strong><label class="label-control col-md-2">Name</label></strong>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control" id="">
                            </div>
                        </div>



                        <div class="form-group">
                            <strong><label class="label-control col-md-2">Address</label></strong>
                            <div class="col-md-10">
                                <textarea name="address" class="form-control" id=""></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="closebtn" data-dismiss="modal">Close</button>
                <button type="button" id="editbtn" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<div id="deletemodal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title ">Confirm Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>&nbsp
            </div>
            <div class="modal-body">
                Do you Want to Delete This record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="closebtn" data-dismiss="modal">Close</button>
                <button type="button" id="deletebtn" class="btn btn-danger ">Delete</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<script type="text/javascript" src="<?php echo base_url();  ?>asssets/jquery.js"></script>

<!--Add Employe -->
<script>
     $(document).ready(function() {
        $("#addbtn").click(function () {
            $("#myModal").modal('show');
            $("#myModal").find('.modal-title').text('Add New Employe');
            $("#myform").attr('action', '<?php echo base_url() ?>miniproject/employe/addemploye')

            // alert("welcme"); 
        });
    });


    $("#savebtn").click(function () {
        var obj=$(this);
        var url = $("#myform").attr('action');
        var data = $("#myform").serialize();
        var name = $("input[name='name']");
        var address = $("textarea[name='address']");
        var result = '';
        if (name.val() == '') {
            // name.addClass('has-error');
            name.parent().parent().addClass('has-error');
        } else {
            // name.removeClass('has-error');
            name.parent().parent().removeClass('has-error');
            result += '1';
        }
        if (address.val() == '') {
            // address.addClass('has-error');
            address.parent().parent().addClass('has-error');
        } else {
            //address.removeClass('has-error');
            address.parent().parent().removeClass('has-error');
            result += '2';
        }
        if (result == '12') {
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: "<?php echo base_url() ?>miniproject/employe/addemploye",
                data: data,
                async: false,
                datatype: 'json',
                success: function (response) {
                    // console.log(response);
                    if (response) {
                        $("#myModal").modal('hide');
                        $("#myform")[0].reset();
                        
                        if (response.type == 'add') {
                            var type = "Added";
                        }
                        
                        $(obj).parents("tr").remove();
                        $('.alert-success').html('Employe  Added  successfuly').fadeIn().delay(400).fadeOut('slow');
                       showAllemploye();
                    } else {
                        alert('error');
                    }

                },
                error: function () {
                    alert('Could not add data');
                }
            });
        }

    });

    //Delete......------------------------------------------

    $("#showdata").on('click', '.item-delete', function () {
        var obj=$(this);
        var id = $(this).attr('data');

        $('#deletemodal').modal('show');
        $("#deletebtn").unbind().click(function () {

            $.ajax({
                type: 'ajax',
                method: 'get',
                url: "<?php echo base_url() ?>miniproject/employe/deleteemploye",
                data: { id: id },
                async: false,
                datatype: 'json',
                success: function (response) {
                    if (response) {
                    $("#deletemodal").modal('hide');
                        $("#myform")[0].reset();
                        $(obj).parents("tr").remove();
                        $('.alert-success').html('Employe  Deleted  successfuly').fadeIn().delay(400).fadeOut('slow');
                        showAllemploye();
                //  alert("keep it up");
                    } else {
                        alert('error ......');
                    }
                },
                error: function () {
                    alert('Error Delete');
                }
            });
        });
    });


    //edit------------------------------------------------------



    $("#showdata").on('click', '.item-edit', function () {
        
        var obj=$(this);
        var id = $(this).attr('data');
        $("#myModal").modal('show');
            $("#myModal").find('.modal-title').text('Edit Employe');
            $("#myform").attr('action', '<?php echo base_url() ?>miniproject/employe/updateemploye');

        $.ajax({
            type: 'ajax',
            method: "get",
            url: "<?php echo base_url() ?>miniproject/employe/editemploye",
            data: { id: id },
            async: false,
            dataType: 'json',
            success: function (data) {

                $("input[name='name']").val(data.name);
                $("textarea[name='address']").val(data.address);
                $("input[name='txtid']").val(data.id);
                   
                $(obj).parents("tr").add();
                        $('.alert-success').html('Employe  updated successfuly').fadeIn().delay(400).fadeOut('slow');
                        // showAllemploye();

            },
            error: function () {
                alert("could not edit data");
            }

        });
    });



    //index-------------------------------------------------


    $(function () {
        showAllemploye();
        function showAllemploye() {
            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>miniproject/employe/showAllemploye",
                method: "POST",
                async: false,
                dataType: 'json',
                success: function (data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].id + '</td>' +
                            '<td>' + data[i].name + '</td>' +
                            '<td>' + data[i].address + '</td>' +
                            '<td>' + data[i].created_at + '</td>' +
                            '<td><a href=" javascript:;" class="btn btn-info item-edit" data="' + data[i].id + '">Edit</a>' +
                            '<a href=" javascript:;" class="btn btn-primary item-delete" data="' + data[i].id + '">Delete </a></td>' +
                            '</tr>';
                    }
                    $('#showdata').html(html);

                },
                error: function () {
                    alert('error');
                }
            });
        }
    });
// });
</script>