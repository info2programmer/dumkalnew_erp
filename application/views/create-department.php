<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "include/head.php";?>
</head>

<body>
<?php include "include/header.php";?>

<section id="dashboardbody">
<div class="container">
	<div class="row">
     
        <div class="col-md-12 col-sm-12">
        <h4 class="alert alert-info">Create Department</h4>
        		<div class="alert alert-success">
                      <form class="form-horizontal" action="" name="departmentForm" id="departmentForm" method="post">
                        <?php if($this->session->flashdata('success_msg')!=''){?> 
                        <div class="alert alert-success">
                          <?php echo $this->session->flashdata('success_msg') ; ?>
                        </div>
                      <?php } ?>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Name of the Deptt :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="departmet_name" id="departmet_name" placeholder="Eg : library" autofocus>
                          <?php echo form_error('departmet_name', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>
        
                      <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-circle"></i> Add Department</button>
                        </div>
                      </div>
                    </form>
                 </div>
        </div>
	</div>
</div>
</section> <!--Dashboardbody -->

<section id="dashboardbody">
<div class="container">
	<div class="row">
     
        <div class="col-md-12 col-sm-12">
              <h4 class="alert alert-info">List of Departments</h4>           
              <table width="935" class="table table-bordered">
    <thead>
      <tr>
        <th width="92">Sl #</th>
        <th width="385">Name of the Departments</th>
        <th width="442">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php if(!empty($deaprtments)) { 
      $i = 1; 
      foreach($deaprtments as $key=>$value){ ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->department_name; ?></td>

        <td><a href="<?php echo base_url() ?>createdepartment/modify/<?php echo $value->departmet_id; ?>" class="btn btn-primary btn-xs" >Edit Department</a> 
            <a  onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url() ?>createdepartment/delete_function/<?php echo $value->departmet_id; ?>" class="btn btn-danger btn-xs" onclick="return custom_confirm('Are you sure you want to remove this?');">Delete Department</a></td>
      </tr>
    <?php $i++; }  } ?>
    </tbody>
  </table>
        </div>
	</div>
</div>
</section>

<!--div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Department</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Department:</label>
            <input type="text" name="department_name" class="form-control" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Edit</button>
      </div>
    </div>
  </div>
</div-->


 <!--Dashboardbody -->

<?php include "include/footer.php";?>

<!--<script>
    function deaprtment_details(id) {
          $.ajax({
            url:"<?php echo base_url() ?>createdepartment/deatils?id="+id, //the page containing php script
            type: "get", //request type,
            success:function(result){

             console.log(result);
           }
         });
     }
</script>-->

</body>
</html>





