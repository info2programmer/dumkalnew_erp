<?php error_reporting(0);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <?php $this->load->view('include/head');?>
</head>

<body>
<?php $this->load->view('include/header');?>
<?php if($msg == 'YES'){?>
<!--<section id="dashboardbody">
<div class="container">
	<div class="row">
     
        <div class="col-md-12 col-sm-12">
        <h4 class="alert alert-info">Subject Groups</h4> 
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
</div>
</section> <!--Dashboardbody -->

<section id="dashboardbody">
<div class="container">
	<div class="row">
     
        <div class="col-md-12 col-sm-12">
              <h4 class="alert alert-info">College Intake Capacity</h4>   
       <?php foreach($stream as $strmDtl){?> 
        <?php $datas = $this->db->query('SELECT * FROM td_subject_group WHERE stream_id='.$strmDtl['stream_id'])->result_array();?>      
              <h4 class="alert alert-warning"><?php echo $strmDtl['stream_name'];?></h4>        
              <table width="935" class="table table-bordered">
    <thead>
      <tr>
        <th width="92">Sl #</th>
        <th width="385">Subject </th>
        <th width="385">GEN</th>
        <th width="385">GEN PH</th>
        <th width="385">SC</th>
        <th width="385">SC PH</th>
        <th width="385">ST</th>
        <th width="385">ST PH</th>
        <th width="385">OBC-A</th>
        <th width="385">OBC-A PH</th>
        <th width="385">OBC-B</th>
        <th width="385">OBC-B PH</th>
        
        <!--<th width="442">Action</th>-->
      </tr>
    </thead>
    <tbody>
    <?php if(!empty($stream)) { 
      $i = 1; 
	  $intake = $this->db->query('select g.*,i.* from td_subject_group g JOIN td_student_intake i ON g.grp_id=i.grp_id WHERE g.stream_id='.$strmDtl['stream_id']. ' group by g.subject_1')->result_array();
      foreach($intake as $val) {?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php
        $combination=$this->db->query("SELECT subject_2_code,subject_3_code FROM td_subject_group WHERE grp_id='".$val['grp_id']."'")->result();
        //var_dump($combination);
        //echo $this->db->last_query();
        echo $val['subject_1']."<br> (";
        foreach($combination as $key){
          echo "<br>".$key->subject_2_code;
        }
        foreach($combination as $key){
          echo "<br>".$key->subject_3_code;
        }
        echo ")";
        //echo $val['subject_1']."<br> (";
        // foreach ($combination as $key ) {
        //   echo trim($key->subject_1_cod,',');
        // }
        // foreach($combination as $key){
        //   echo trim(", ".$key->subject_2_code,',');
        // }
        // foreach ($combination as $key) {
        //   echo ", ".$key->subject_3_code;
        // }
        //echo ")";
        // echo $val['subject_1']."<br> (".$val['subject_1_code'].",".$val['subject_2_code'].",".$val['subject_3_code'].")";
        
        ?></td>
        <td> <?php echo $val['gen'];?></td>
        <td><?php echo $val['gen_ph'];?></td>
        <td> <?php echo $val['sc'];?></td>
        <td><?php echo $val['sc_ph'];?></td>
        <td> <?php echo $val['st'];?></td>
        <td><?php echo $val['st_ph'];?></td>
        <td> <?php echo $val['obc_a'];?></td>
        <td><?php echo $val['obc_a_ph'];?></td>
        <td> <?php echo $val['obc_b'];?></td>
        <td><?php echo $val['obc_b_ph'];?></td>
       
       <!-- <td><a href="<?php echo base_url() ?>createfunction/modify/<?php echo $value->functionn_id; ?>" class="btn btn-primary btn-xs">Edit Function</a> 
            <a  onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url() ?>createfunction/delete_function/<?php echo $value->functionn_id; ?>" class="btn btn-danger btn-xs" onclick="return custom_confirm('Are you sure you want to remove this?');">Delete Function</a></td>-->
      </tr>
    <?php $i++; }  } else { echo 'No record found'; } ?>
    </tbody>
  </table>
  <?php } ?>
        </div>
	</div>
</div>
</div>
</section> <!--Dashboardbody -->
<?php } else { ?>
<section id="dashboardbody">
<div class="container">
	<div class="row">
     
        <div class="col-md-12 col-sm-12">
        <h4 class="alert alert-info">Subject Groups</h4> 
        		<div class="alert alert-danger">
                	<h1>YOU ARE NOT ALLOWED TO ACCESS THIS PAGE</h1>
                 </div>
        </div>
	</div>
</div>
</div>
</section>
<?php } ?>



<?php $this->load->view('include/footer');?>


</body>
</html>





