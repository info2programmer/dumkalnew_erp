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
            <form name="emp_dtls" action="<?php echo base_url();?>Finance/financeDetails/add_income" method="post" enctype="multipart/form-data">
            <?php 
			$depid = $this->uri->segment(4);
			$actid = $this->uri->segment(5);
			$uid = $this->uri->segment(6);
			?>
            <input type="hidden" name="dep_id" id="dep_id" value="<?php echo $depid;?>" />
            <input type="hidden" name="act_id" id="act_id" value="<?php echo $actid;?>" />
            <input type="hidden" name="usr_id" id="usr_id" value="<?php echo $uid;?>" />
          <div class="panel panel-primary">
    <div class="panel-body">
    <h3 class="alert alert-info text-center"><strong class="text-uppercase"> <i class="fa fa-plus"></i> Fee Income Access </strong></h3>

        <?php if($this->session->flashdata('msg')): ?>
            <h4 class="alert alert-success" id="msg"><?php echo $this->session->flashdata('msg'); ?></h4>
        <?php endif; ?>
        <div class="row">
                <div class="col-md-12">
                <label for="" style="color:#FF0000;">Head Name</label>
                <input type="radio" name="acc" value="acc" onclick="return typor(this.value);" checked="checked"/>Allow Access<input type="radio" name="acc" value="can" onclick="return typor(this.value);"/>Cancel Access
                 </div>
                 </div>
        <div class="row">
                <div class="col-md-12">
                <table border="0" cellspacing="0" cellpadding="0" class="table">
  <tr>
    <td scope="col">Head Name</td>
    <td scope="col">Access Type</td>
  </tr>
  <?php foreach($fee as $data){?>
  <tr>
    <td scope="row"> <input type="checkbox" name="heads" value="<?php echo $data['id'];?>" <?php if($data['access'] == 1){?>checked<?php }?>/> <?php echo $data['name'];?> </td>
    <td scope="row"><?php if($data['access'] == 1){ echo '<b style="color:#33c22f; float:right; ">Access Given</b>';} else { echo '<b style="color:red;float:right;">No Access</b>';}?></td>
  </tr>
   <?php } ?>
</table>

                </div>
        </div>
        		
               
            <input type="hidden" name="typorval" id="typorval" value="acc" />
            <div class="row">
            <button type="button" onclick="getCheckedCheckboxesFor()" class="btn btn-primary btn-block">Submit</button>
			</div>
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
        <h4 class="alert alert-info">Manage Fee Income Access</h4> 
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
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script>
function typor(tpdval) {
$('#typorval').val(tpdval);
}
function getCheckedCheckboxesFor() {
   var checkboxes = document.getElementsByName('heads');
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
	var dep_id = $('#dep_id').val();
	var act_id = $('#act_id').val();
	var usr_id = $('#usr_id').val();
    window.location.href = '<?php echo base_url();?>Finance/financeDetails/allow_access/'+encodeURIComponent(res3)+'/'+tp+'/'+dep_id+'/'+act_id+'/'+usr_id;
 }
}        
</script>
</body>
</html>





