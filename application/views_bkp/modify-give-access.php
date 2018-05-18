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
        <h4 class="alert alert-info">Modify Given Access</h4> 
        		<div class="alert alert-success">
                      <form class="form-horizontal" action="" method="post" id="accessForm" name="accessForm">
                      <?php if($this->session->flashdata('access_success_msg')!=''){?> 
                        <div class="alert alert-success">
                          <?php echo $this->session->flashdata('access_success_msg') ; ?>
                        </div>
                      <?php } ?>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="choosedept">Choose Name :</label>
                        <div class="col-sm-10">
                          <select  class="form-control" id="target" name="user_id" readonly>
                            <option selected="selected">Select</option>
                            <?php if(!empty($users)){ foreach ($users as $key => $value) { ?>
                                  
                                  <option value="<?php echo $value->user_id; ?>" <?php if(!empty($givenaccess) && $givenaccess->user_id==$value->user_id) echo 'selected=selected'; ?>><?php echo $value->name; ?></option>
                          <?php  } } ?>
                          </select>
                          <?php echo form_error('user_id', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="choosedept">Choose Department :</label>
                        <div class="col-sm-10">
                          <select  class="form-control" id="department" name="department" readonly>
                            <option>Select</option>
                            <?php if(!empty($deaprtments)) { foreach ($deaprtments as $key => $dept) { ?>
                             <option value="<?php echo $dept->departmet_id; ?>" <?php if(!empty($givenaccess) && $givenaccess->department_id==$dept->departmet_id) echo 'selected=selected'; ?>><?php echo $dept->department_name; ?></option>
                           <?php } } ?>
                          </select>
                          <?php echo form_error('department', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>


                      
                      
                       <div class="form-group">
                        <label class="control-label col-sm-2" for="choosedept">Select Fuction :</label>
                        <div class="col-sm-10">


                          <?php  
                            $result = $this->common_model->getAccess($givenaccess->user_id); 
                            if(!empty($result)) {
                              foreach ($result as $key => $value) {
                                $value->functionn_name;
                              }
                              
                            }
                         ?>


                        <?php if(!empty($functions)){

                            foreach ($functions as $key => $fun) { ?>

                            <div class="checkbox-inline">
                              <label><input type="checkbox" name="function_id[]" value="<?php echo $fun->functionn_id; ?>" <?php foreach ($result as $key => $value) {
                                if($fun->functionn_id==$value->functionn_id) echo "checked='checked'" ;
                              } 

                               ?>><?php echo $fun->functionn_name; ?></label>
                              </div>
                             
                        <?php } } ?>
                          
                        
                        </div>
                        <?php echo form_error('function_id', '<div class="error">', '</div>'); ?>
                  </div>
                      

                      <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-circle"></i>&nbsp;Modify Assigned Access</button>
                          <a href="<?php echo base_url() ?>giveaccess" class="btn btn-success btn-lg"><i class="fa fa-arrow-left"></i>&nbsp;Back to Give Access</a>
                        </div>
                      </div>
                    </form>
                 </div>
        </div>
	</div>
</div>
</section> <!--Dashboardbody-->

<section id="dashboardbody">
<div class="container">
	<div class="row">
     
        <div class="col-md-12 col-sm-12">
              <h4 class="alert alert-info">Access History</h4>           
              	<div class="table-responsive">
              	<table width="1227" class="table table-bordered">
    <thead>
      <tr>
        <th width="79">Sl #</th>
        <th>Name of the Users</th>
        <th>Department</th>
        <th>Access Given</th>
        <th width="264">Action</th>
      </tr>
    </thead>
    <tbody>

    <?php if(!empty($users)){ 
      $i=1; 
      foreach ($users as $key => $acc) { ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td width="294"><?php echo $acc->name; ?></td>
        <td width="202"><?php echo $acc->department; ?></td>
        <td width="364"><?php  $access = '';
                            $result = $this->common_model->getAccess($acc->user_id); 
                            if(!empty($result)) {
                              foreach ($result as $key => $value) {
                                $access.=$value->functionn_name.',';
                              }
                              echo rtrim($access,","); 
                            }else{echo 'no access' ; }
                         ?></td>
        <td><a href="<?php echo base_url() ?>giveaccess/modify/<?php echo $acc->user_id; ?>" class="btn btn-primary btn-xs">Edit Access</a>
          </td>
      </tr>
  <?php  $i++; } } ?>
      
      
    </tbody>
  </table>
		  </div>
      </div>
	</div>
</div>
</section> <!--Dashboardbody -->

<?php include "include/footer.php";?>

<script type="text/javascript">

$( "#target" ).change(function() {

  user_id = $(this).val();

  if(user_id!=''){

      $.ajax({ url: '<?php echo base_url() ?>giveaccess/getDepartment',
             data: {user_id: user_id},
             type: 'post',
             success: function(output){
                          var obj = $.parseJSON(output);

                          $("#department option:selected").text(obj['department']);
                          $("#department option:selected").val(obj['departmet_id']);
                      }
            });

  }



});


</script>

</body>
</html>





