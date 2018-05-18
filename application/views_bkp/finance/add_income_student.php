<?php error_reporting(0);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('include/head');?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css_new/style.css">
   <style>
      .text-on-pannel {
  background: #fff none repeat scroll 0 0;
  height: auto;
  margin-left: 20px;
  padding: 3px 5px;
  position: absolute;
  margin-top: -47px;
  border: 1px solid #337ab7;
  border-radius: 8px;
}

.panel {
  /* for text on pannel */
  margin-top: 27px !important;
}

.panel-body {
  padding-top: 0px !important;
}
      </style>
</head>

<body>
<?php $this->load->view('include/header');?>

<?php if($msg == 'YES'){?>
<div class="container">
         <div class="row">
         <div class="col-md-3"></div>
         <div class="col-md-6">
                     <?php 
			$depid = $this->uri->segment(4);
			$actid = $this->uri->segment(5);
			$uid = $this->uri->segment(6);
			?>

             <form name="emp_dtls" id="stud_income" action="<?php echo base_url();?>finance/FinanceDetails/add_student_income/<?php echo $depid;?>/<?php echo $actid;?>/<?php echo $uid;?>" method="post" enctype="multipart/form-data">
            
           
            <div class="panel panel-primary">
    <div class="panel-body">
    <h3 class="alert alert-info text-center"><strong class="text-uppercase"> <i class="fa fa-plus"></i> Add Income </strong></h3>
    <div class="row">
    	<div class="col-md-12">
            <div class="form-group">
            <label for="">Collection Date : </label><input type="date" name="coldate" id="coldate" value="<?php echo date('Y-m-d');?>" style="float:right;" required class="form-control"/></div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <div class="form-group">
            <label for="">Select Type : </label>
            <div class="radio-group">
            <input type="radio" name="itype" value="stud_type" onclick="$('#cdtl').show();"/> <label for="radio-opt-1">Student</label> 
            <input type="radio" name="itype" value="other_type" onclick="$('#cdtl').hide();" checked="checked"/> <label for="radio-opt-1">Other</label>
            </div>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <div class="form-group">
                <label for="" style="color:#FF0000;">Purpose</label>
                <input type='text' name='bank' id='bnkname' value='' class='auto form-control' >
                
            </div>
            </div>
            </div>
            <div id="cdtl" style="display:none;">
            <div class="row">
            <div class="col-md-12">
            <div class="form-group">
            Student Id : <input type="text" name="student_id" id="student_id" class="form-control"/>
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
            <label for="">Stream : </label>
            <select name="txt_stream" class="form-control">
            <?php foreach($stream as $strm){?>
             <option value="<?php echo $strm['stream_id'];?>"><?php echo $strm['stream_name'];?></option>
             <?php } ?>
             </select>
             </div>
             </div>
             <div class="col-md-12">
             <div class="form-group">
             Subject Group :
             <select name="txt_sub_grp" class="form-control">
             <?php foreach($sub_grp as $subgrp){?>
             <option value="<?php echo $subgrp['grp_id'];?>"><?php echo $subgrp['subject_1'];?></option>
             <?php } ?>
             </select>
             </div>
             </div>
             <div class="col-md-12">
             <div class="form-group">
            Session :
            <select name="txt_session" class="form-control">
             <?php foreach($session as $sesDtl){?>
             <option value="<?php echo $sesDtl['sid'];?>"><?php echo $sesDtl['session'];?></option>
             <?php } ?>
             </select>
             </div>
             </div>
             <div class="col-md-12">
             <div class="form-group">
             Year : <select name="txt_year" class="form-control">
             <option value="1">1st Year</option>
             <option value="2">2nd Year</option>
             <option value="3">3rd Year</option>
             </select>
             </div>
             </div>
             </div>
             </div>
             <div class="row">
             <div class="col-md-12">
             <div class="form-group">
                 <table border="0" cellspacing="0" cellpadding="0" class="table">
                  <tr>
                    <td scope="col">Income Head</td>
                    <td scope="col">Income Amount</td>
                  </tr>
                  <?php foreach($fee as $data){?>
                  <tr>
                    <td scope="row"> <input type="checkbox" name="heads[]" value="<?php echo $data['id'];?>"/> <?php echo $data['name'];?></td>
                    <td scope="row"><input type="text" name="typorval[]" id="typorval" class="form-control"/></td>
                  </tr>
                   <?php } ?>
                </table>

            </div>
            
            <button type="button" onclick="getCheckedCheckboxesFor()" class="btn btn-primary btn-block">Submit</button>
            </div>
            </div>
        </form>
            </div>
          <div class="col-md-3"></div>  
         </div>
      </div>
   
<?php } else { ?>
<section id="dashboardbody">
<div class="container">
	<div class="row">
     
        <div class="col-md-12 col-sm-12">
        <h4 class="alert alert-info">Add Income</h4> 
        		<div class="alert alert-danger">
                	<h1>YOU ARE NOT ALLOWED TO ACCESS THIS PAGE</h1>
                 </div>
        </div>
	</div>
</div>
</div>
</section>
<?php } ?>



<?php //$this->load->view('include/footer');?>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script>
$(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		source: "<?php echo base_url();?>searchpurpose.php",
		minLength: 1
	});	
			

});
function typor(tpdval) {
$('#typorval').val(tpdval);
}
function getCheckedCheckboxesFor() {
   var checkboxes = document.getElementsByName('heads[]');
var selected = [];
for (var i=0; i<checkboxes.length; i++) {
    if (checkboxes[i].checked) {
        selected.push(checkboxes[i].value);
    }
}
 if(selected == '') {
    alert('You didn"t Select Any Fee Head');
 } else {
	var str=btoa((selected));
	var res1 = str.replace("=", "");
	var res2 = res1.replace("=", "");
	var res3 = res2.replace("=", "");
	var tp = $('#typorval').val();
	$('#stud_income').submit();
    //window.location.href = 'http://dumkalcollege.org/ERP/index.php/finance/fee_details/allow_access/'+encodeURIComponent(res3)+'/'+tp;
 }
}        
</script>
</body>
</html>





