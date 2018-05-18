<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "include/head.php";?>
</head>

<body>
<?php include "include/header.php";?>

<section id="dashboardbody">
<form class="form-horizontal" action="<?php echo base_url();?>giveaccess" method="post" id="accessForm" name="accessForm">
<div class="container">
	<div class="row">
     
        <div class="col-md-12 col-sm-12">
        <h4 class="alert alert-info">Give Access</h4> 
        		<div class="alert alert-success">
                      
                      <?php if($this->session->flashdata('access_success_msg')!=''){?> 
                        <div class="alert alert-success">
                          <?php echo $this->session->flashdata('access_success_msg') ; ?>
                        </div>
                      <?php } ?>
                      <?php if($this->session->flashdata('access_error_msg')!=''){?> 
                        <div class="alert alert-danger">
                          <?php echo $this->session->flashdata('access_error_msg') ; ?>
                        </div>
                      <?php } ?>
                      <?php if($this->session->flashdata('erro_msg')!=''){?> 
                        <div class="alert alert-danger">
                          <?php echo $this->session->flashdata('erro_msg') ; ?>
                        </div>
                      <?php } ?>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="choosedept">Choose Name :</label>
                        <div class="col-sm-10">
                          <select  class="form-control" id="target" name="user_id">
                            <option value="">Select</option>
                            <?php if(!empty($users)){ foreach ($users as $key => $value) { ?>
                                  <?php if($value->user_id == $uid){?>
                                  <option value="<?php echo $value->user_id; ?>" <?php if($value->user_id == $uid){?>selected<?php } ?>><?php echo $value->name; ?></option>
                                  <?php } ?>
                          <?php  } } ?>
                          </select>
                          <?php echo form_error('user_id', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>
                      
                      
                 </div>
        </div>
	</div>



<?php if(!empty($deaprtments)) { foreach ($deaprtments as $key => $dept) { ?>

<div class="row">
<div class="col-md-12">
 <h4 class="alert alert-warning" style="cursor:pointer;" onclick="togglehiding(this)"><?php echo $dept->department_name; ?></h4>
 
 <?php if($dept->department_name == "Website Admin Panel" || $dept->department_name == "Admission"){ ?>

	<div class="row" style="display:none;">
     
        <div class="col-md-12 col-sm-12">
            <div class="alert alert-success">	
              <div class="form-group">
                 <label class="control-label col-sm-2" for="choosedept">Enter</label>
              </div>
            </div>    
        </div>
        
    </div>
	

 <?php } else {
 $actvty = $this->db->query('SELECT * FROM tbl_activity WHERE departmet_id='.$dept->departmet_id)->result_array();
 ?>
 <?php if(!empty($actvty)){foreach($actvty as $actdtl){?>
	<div class="row" style="display:none;">
     
        <div class="col-md-12 col-sm-12">
        		<div class="alert alert-success">		
                      
                      
                      <div class="form-group">
                        <label class="control-label col-sm-2 alert alert-danger" for="choosedept"><?php echo $actdtl['activity_name'];?></label>
                        <div class="col-sm-10">
                          
                        </div>
                      </div>
                      
                       <div class="form-group">
                        <label class="control-label col-sm-2" for="choosedept">Select Fuction :</label>
                        <div class="col-sm-10">

                        <?php if(!empty($functions)){
							foreach ($functions as $key => $fun) { 
							
							 $access = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$dept->departmet_id.' AND activity_id='.$actdtl['activity_id'].' AND function_id='.$fun->functionn_id.' AND user_id='.$uid)->num_rows();
							?>
                            <div class="checkbox-inline">
                              <label><input type="checkbox" name="function_id[]" value="<?php echo $dept->departmet_id.'-'.$actdtl['activity_id'].'-'.$fun->functionn_id; ?>" <?php if($access > 0){?>checked<?php }?>><?php echo $fun->functionn_name; ?></label>
                              </div>
                             
                        <?php } } ?>
                          
                        
                        </div>
                        <?php echo form_error('function_id', '<div class="error">', '</div>'); ?>
                  </div>
                     
                 
     </div>
        </div>
	</div>
    <?php } } else {?>
    <div class="row" style="display:none;">
     
        <div class="col-md-12 col-sm-12">
        		<div class="alert alert-success">
                      <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                         <label class="control-label col-sm-2" for="choosedept">No Activity Found in this Module</label>
                        </div>
                      </div>
                   
      </div>
        </div>
	</div>

    <?php } ?>
</div></div>

<?php }} }?>









	<div class="row">
     
        <div class="col-md-12 col-sm-12">
        		<div class="alert alert-success">
                      <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-circle"></i> Assign Access</button>
                        </div>
                      </div>
                   
      </div>
        </div>
	</div>

</form>
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
        <!--<th>Department</th>-->
        <th>Access Given</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    <?php if(!empty($users)){ 
      $i=1; 
      foreach ($users as $key => $acc) { 
	  
	  ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td width="294"><?php echo $acc->name; ?></td>
        <!--<td width="202"><?php 
		$dep = $this->db->query('SELECT DISTINCT department_id FROM tbl_access WHERE user_id='.$acc->user_id)->result_array();
		foreach ($dep as $key ) {
		$depDtl = $this->db->query('SELECT* FROM tbl_department WHERE departmet_id='.$key['department_id'])->result_array();
		echo '<span class="btn btn-success btn-xs">'.$depDtl[0]['department_name'].'</span><br/><br/>';
                 }
		?></td>-->
        <td width="364"><?php  $access = '';
		$dep = $this->db->query('SELECT DISTINCT department_id FROM tbl_access WHERE user_id='.$acc->user_id)->result_array();
		foreach ($dep as $key ) {
		$depDtl = $this->db->query('SELECT* FROM tbl_department WHERE departmet_id='.$key['department_id'])->result_array();
		echo '<br/><br/><span class="alert alert-danger">'.$depDtl[0]['department_name'].'</span><br/><br/>';
                            $result = $this->common_model->getAccess($acc->user_id,$key['department_id']); 
                            if(!empty($result)) {
							$last_header = '';
                              foreach ($result as $key => $value) {
							
							  $actdtl = $this->db->query('SELECT * FROM tbl_activity WHERE activity_id='.$value->activity_id)->result_array(); 
							  if($actdtl[0]['activity_name']==$last_header) {}
							  else{
							  $last_header=$actdtl[0]['activity_name'];
							  echo '<h5 style="border-bottom:1px solid #555;">'.$last_header.'</h5>';
							  }                              
							  $access=$value->functionn_name;
							  echo '<a href="javascript:void(0)" class="btn btn-success btn-xs" style="margin-right:5px; margin-bottom:5px;">'.$access.'</a>';
                              }
							  
                              //echo rtrim($access,","); 
                            }else{echo 'no access' ; }
							}
                         ?></td>
        <td><a href="<?php echo base_url() ?>giveaccess/modifyaccess/<?php echo $acc->user_id; ?>" class="btn btn-primary btn-xs">Edit Access</a>
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

$( "#department" ).change(function() {

  user_id = $(this).val();

  if(user_id!=''){

      $.ajax({ url: '<?php echo base_url() ?>giveaccess/getActivity',
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

function togglehiding(ths) {
	$(ths).closest('[class*=col]').find('.row').toggle();
}
</script>

</body>
</html>





