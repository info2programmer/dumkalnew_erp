<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('include/head');?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css_new/style.css">
   <style>
      .text-on-pannel {
  background: #fff none repeat scroll 0 0;
  height: auto;
  margin-right  : 20px;
  padding: 3px 5px;
  position: absolute;
  margin-top: -47px;
  border: 1px solid #337ab7;
  border-radius: 8px;
}

/* .spHead{
    margin-top: 27px !important;
} */
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
            <form name="emp_dtls" action="<?php echo base_url();?>Finance/financeDetails/add_finance_details" method="post" enctype="multipart/form-data">
            <?php 
			$depid = $this->uri->segment(4);
			$actid = $this->uri->segment(5);
			$uid = $this->uri->segment(6);
			?>
            <input type="hidden" name="dep_id" value="<?php echo $depid;?>" />
            <input type="hidden" name="act_id" value="<?php echo $actid;?>" />
            <input type="hidden" name="usr_id" value="<?php echo $uid;?>" />
          <div class="panel panel-primary">
    <div class="panel-body">
    <h3 class="alert alert-info text-center"><strong class="text-uppercase"> <i class="fa fa-plus"></i> Fee Details </strong>
        <?php $func = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depid.' AND activity_id='.$actid.' AND user_id='.$uid)->result_array();?>
              <div class="panel-body">
              <?php foreach($func as $fncdtl){
                $fname = $this->db->query('SELECT * FROM tbl_functionn WHERE functionn_id='.$fncdtl['function_id'])->result_array();
                 ?>
              <?php if($fname[0]['functionn_name'] == 'View'){?>
                 <a href="<?php echo base_url() ?>Finance/financeDetails/<?php echo $fname[0]['functionn_name']?>FeeDetails/<?php echo $depid ?>/<?php echo $actid ?>/<?php echo $uid ?>" class="btn btn-default btn-xs">View Fee Details</a></small>
                 <?php  }}?>   
                 </h3> 
        <?php if($this->session->flashdata('msg')): ?>
            <h4 class="alert alert-success" id="msg"><?php echo $this->session->flashdata('msg'); ?></h4>
        <?php endif; ?>
                  
             <div class="form-group">
                <label for="ddlStream" >Stream</label>
                <select name="ddlStream" id="ddlStream" required class="form-control">
                    <option value="" selected hidden>---Select Stream---</option>
                    <?php foreach($stream as $list): ?>
                        <option value="<?php echo $list->stream_id ?>"><?php echo $list->stream_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ddlSubject">Subject</label>
                <select name="ddlSubject" id="ddlSubject" required class="form-control">
                    <option value="" selected hidden>---Select Subject---</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ddlFeeType">Fee Type</label>
                <select name="ddlFeeType" id="ddlFeeType" required class="form-control">
                    <option value="" slected hidden>---Select Fee Type---</option>
                    <option value="Exam Form Fillup">Exam Form Fillup</option>
                    <option value="Final Admission">Final Admission</option>
                    <option value="Provisional Admission">Provisional Admission</option>
                    <option value="Admission">Admission</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Year</label>
                <select name="ddlYear" id="ddlYear" required class="form-control">
                    <option value="" selected hidden>---Select Year---</option>
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="3">3rd</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Select Fee Head</label><br/>
                <?php $i=0; ?>
                <?php foreach($fee_heads as $list): ?>
                    <?php ++$i; ?>
                    <div style="width:100%; float:none;clear:both;" class="spHead">
                    <input type="checkbox" id="chk<?php echo $i;?>" name="heads[]" onclick="return changeState(<?php echo $i;?>)" value="<?php echo $list->id ?>"/> <?php echo $list->name ?> &nbsp;&nbsp; <input type="text" name="txtAmt[]" class="txtAmount" onkeyup="return chkVal(this.value,<?php echo $i; ?>)" id="amt<?php echo $i;?>" style="float:right;" disabled ></div><br/>
                <?php endforeach ?> 
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
        <h4 class="alert alert-info">Manage Bank</h4> 
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
    $(document).ready(function () {
        $("#ddlStream").change(function(){
            var ddlData=$("#ddlStream").val();
            var data={'stream_id':ddlData};
            if(ddlData!="")
            {
               $.ajax({
                    type: "post",
                    url: "<?php echo base_url() ?>Finance/financeDetails/get_subject_by_stream",
                    data: data,
                    dataType: "html",
                    success: function (response) {
                        $('#ddlSubject').html(response);
                    }
                }); 
            }            
        });

        $(document).ready(function () {
            // alert();
            $("#msg").slideUp(2000);
        });
        
    });
    function chkVal(amt,id) {
        if(amt!=""){
            $('#chk'+id).prop('checked',true);
        }
        else{
            $('#chk'+id).prop('checked',false);
        }
    }

    function changeState(id){
        if($('#chk'+id).is(':checked'))        
            $("#amt"+id).attr("disabled",false);
        else
        {
           $("#amt"+id).attr("disabled",true);
        //    $('#chk'+id).prop('checked',false);
        }
        
    }
</script>
</body>
</html>