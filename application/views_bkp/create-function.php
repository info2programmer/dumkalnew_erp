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
        <h4 class="alert alert-info">Create Function</h4> 
        		<div class="alert alert-success">
                      <form class="form-horizontal" action="" name="functionForm" id="functionForm" method="post">
                      <?php if($this->session->flashdata('success_msg')!=''){?> 
                        <div class="alert alert-success">
                          <?php echo $this->session->flashdata('success_msg') ; ?>
                        </div>
                      <?php } ?>
                      
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Name of the Function :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="functionn_name" name="functionn_name" placeholder="Eg : View" autofocus>
                          <?php echo form_error('functionn_name', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>
        
                      <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-circle"></i> Add Function</button>
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
              <h4 class="alert alert-info">List of Functions</h4>           
              <table width="935" class="table table-bordered">
    <thead>
      <tr>
        <th width="92">Sl #</th>
        <th width="385">Name of the Functions</th>
        
        <th width="442">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php if(!empty($functions)) { 
      $i = 1; 
      foreach($functions as $key=>$value){ ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value->functionn_name; ?></td>
       
        <td><a href="<?php echo base_url() ?>createfunction/modify/<?php echo $value->functionn_id; ?>" class="btn btn-primary btn-xs">Edit Function</a> 
            <a  onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url() ?>createfunction/delete_function/<?php echo $value->functionn_id; ?>" class="btn btn-danger btn-xs" onclick="return custom_confirm('Are you sure you want to remove this?');">Delete Function</a></td>
      </tr>
    <?php $i++; }  } else { echo 'No record found'; } ?>
    </tbody>
  </table>
        </div>
	</div>
</div>
</section> <!--Dashboardbody -->





<?php include "include/footer.php";?>

</body>
</html>





