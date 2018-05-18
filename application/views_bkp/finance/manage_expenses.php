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
            <form name="emp_dtls" action="<?php echo base_url();?>finance/FinanceDetails/add_expense/<?php echo $depid;?>/<?php echo $actid;?>/<?php echo $uid;?>" method="post" enctype="multipart/form-data" onsubmit="return validate_group()">
            
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
                <div class="form-group">
              <label for="">Type</label>
                <select name="type" id="type" required class="form-control">
                <option value="">Select Type</option>
                    <option value="Cash">Cash</option>
                    <option value="Bank">Bank</option>
                </select>
            </div> 
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
            <div class="form-group" id="from">
                <label for="" style="color:#FF0000;">Expense Type</label>
                <select name="exp_typ" id="exp_typ" onchange="return extyp(this.value)" class="form-control">
                <option value="" selected="selected">Select Type</option> 
                <option value="normal" >Normal</option>
                <option value="contaentry">Contra Entry</option>
                <option value="banktobank">Bank to Bank</option>
                </select>
            </div>  
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">       
            <div class="form-group">
                <label for="" style="color:#FF0000;">To Head</label>
                <select name="head" id="head" required class="form-control">
                <option value="">Select Head</option> 
                <?php foreach($data as $data){?>
                <option value="<?php echo $data->id;?>"><?php echo $data->name;?></option>
                <?php }?>
                </select>
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
            <div class="form-group" id="bfrm" style="display:none;">
                <label for="" style="color:#FF0000;">From Bank</label>
                <select name="bank" id="bank" class="form-control">
                <option value="">Select Bank</option> 
                <?php foreach($data_bank as $data_bank){?>
                <option value="<?php echo $data_bank->acc_id;?>"><?php echo $data_bank->bank_id." - ".$data_bank->acc_no;?></option>
                <?php }?>
                </select>
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
            <div class="form-group" id="bto" style="display:none;">
                <label for="" style="color:#FF0000;">To Bank</label>
                <select name="bank2" id="bank" class="form-control">
                <option value="">Select Bank</option> 
                <?php foreach($data_bank2 as $data_bank2){?>
                <option value="<?php echo $data_bank2->acc_id;?>"><?php echo $data_bank2->bank_id." - ".$data_bank2->acc_no;?></option>
                <?php }?>
                </select>
            </div>  
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
            <div class="form-group" id="ch" style="display:none;">
                <label for="">Cheque No</label>
                <input type="text" name="cheque" id="cheque" class="form-control">
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
            <div class="form-group" id="ch" style="display:none;">
                <label for="">Cheque Date</label>
                <input type="text" name="c_date" id="c_date" class="form-control">
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
            <div class="form-group">
                <label for="">Expense Date</label>
                <input type="text" name="date" id="datepicker" required value="<?php echo date('Y-m-d')?>" class="form-control">
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
            <div class="form-group">
                <label for="">Amount</label>
                <input type="text" name="amount" id="amount" required class="form-control">
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
            <div class="form-group">
                <label for="">Pay To</label>
                <input type="text" name="pyto" id="pyto" class="form-control">
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
            <div class="form-group">
                <label for="">Particulars</label>
                <textarea name="particular" id="particular" required class="form-control"></textarea>
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
            <div class="form-group">
                <label for="">Note</label>
                <input type="text" name="note" id="note" class="form-control">
            </div>
            </div>
            </div>
           <!-- <div class="form-group">
            <span style="float:right; width:calc(60% - 1px)">
               <input type="checkbox" name="contaentry" id="contaentry" value="0" onclick="return conta(this.value)"/> Is Contra Entry ? </span>
                </div>-->
              
            

            <div class="row">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
			</div>
               </div>
              </div>
              <input type="hidden" name="cntra_val" id="cntra_val" value="0"/>
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
        <h4 class="alert alert-info">Manage Expenses</h4> 
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
<script type="text/javascript">
        jQuery(document).ready(function(){
            $("#type").change(function() {
				jQuery('#ch').css("display","none");
				jQuery('#bfrm').css("display","none");				
				var type = {"type" : $('#type').val()};	
						if($('#type').val()=='Bank')	
						{	
						 jQuery('#ch').css("display","block");
						 jQuery('#bfrm').css("display","block")
						console.log(type);
						}
				
            });
        });
    </script>
<script>
function extyp(cvdal) {
if(cvdal == 'contaentry'){
$('#contaentry').val(1);
$('#cntra_val').val(1);
$('#bto').css('display','none');
} 
else if(cvdal == 'banktobank') {
$('#contaentry').val(0);
$('#cntra_val').val(0);
$('#bto').css('display','block');
$('#bfrm').css('display','block');
}
else if(cvdal == 'normal'){
$('#contaentry').val(0);
$('#cntra_val').val(0);
$('#bto').css('display','none');
$('#bfrm').css('display','block');
}
}

</script>
</body>
</html>





