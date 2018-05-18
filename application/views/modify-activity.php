<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "include/head.php";
error_reporting(0);
?>
</head>

<body>
<?php include "include/header.php";?>

<section id="dashboardbody">
<div class="container">
	<div class="row">
     
        <div class="col-md-12 col-sm-12">
        <h4 class="alert alert-info">Modify Activity</h4>
        		<div class="alert alert-success">
                      <form class="form-horizontal" action="" name="departmentForm" id="departmentForm" method="post">
                        <?php if($this->session->flashdata('success_msg')!=''){?> 
                        <div class="alert alert-success">
                          <?php echo $this->session->flashdata('success_msg') ; ?>
                        </div>
                      <?php } 
					  ?>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="choosedept">Choose Department :</label>
                        <div class="col-sm-10">
                          <select  class="form-control" id="department" name="department">
                            <option value="">Select</option>
                            <?php if(!empty($deaprtments)){ foreach ($deaprtments as $key => $value) { ?>
                                <option value="<?php echo $value->departmet_id ; ?>" <?php if($value->departmet_id == $details->departmet_id){?> selected="selected"<?php } ?>><?php echo $value->department_name ; ?></option>
                           <?php } ?>    

                            <?php } ?>
                                
                          </select>
                          <?php echo form_error('department', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>
                      <p class="text-right">Department is not in List? <a href="<?php echo base_url() ?>createdepartment">Add Now</a></p>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Name of the Activity :</label>
                        <div class="col-sm-10">
                          <input type="text" value="<?php if(!empty($details)) echo $details->activity_name;  ?>" class="form-control" name="activity_name" id="activity_name" placeholder="Eg : library" autofocus>
                          <?php echo form_error('departmet_name', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>
        
                      <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-circle"></i> Modify Activity</button>
                        <a href="<?php echo base_url() ?>createactivity" class="btn btn-success btn-lg"><i class="fa fa-arrow-left"></i>&nbsp;Back to Add Activity</a>
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
              <h4 class="alert alert-info">List of Activities</h4>           
              <table width="935" class="table table-bordered">
    <thead>
      <tr>
        <th width="92">Sl #</th>
        <th width="385">Name of the Departments</th>
        <th width="385">Name of the Activity</th>
        <th width="442">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php if(!empty($activity)) { 
      $i = 1; 
      foreach($activity as $key=>$value){ 
	  $dep = $this->db->query('SELECT * FROM tbl_department WHERE departmet_id='.$value->departmet_id)->result_array();
	  ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $dep[0]['department_name']; ?></td>
        <td><?php echo $value->activity_name; ?></td>

        <td><a href="<?php echo base_url() ?>createactivity/modify/<?php echo $value->activity_id; ?>" class="btn btn-primary btn-xs" >Edit Activity</a> 
            <a  onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url() ?>createactivity/delete_function/<?php echo $value->activity_id; ?>" class="btn btn-danger btn-xs" onclick="return custom_confirm('Are you sure you want to remove this?');">Delete Activity</a></td>
      </tr>
    <?php $i++; }  } ?>
    </tbody>
  </table>
        </div>
	</div>
</div>
</section>



 <!--Dashboardbody -->

<?php include "include/footer.php";?>

</body>
</html>





