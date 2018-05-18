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
            <form name="emp_dtls" action="<?php echo base_url();?>Finance/financeDetails/add_bank_account" method="post" enctype="multipart/form-data">
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
    <h3 class="alert alert-info text-center"><strong class="text-uppercase"> <i class="fa fa-plus"></i> Add Bank </strong></h3>

        <?php if($this->session->flashdata('msg')): ?>
            <h4 class="alert alert-success" id="msg"><?php echo $this->session->flashdata('msg'); ?></h4>
        <?php endif; ?>
                  
                  <div class="form-group">
                <label for="" style="color:#FF0000;">Bank</label>
                <input type='text' name='bank' id='bnkname' value='' class='auto form-control' >
                
            </div>
            <div class="form-group">
                <label for="">Account Number</label>
                <input type="text" name="name" id="acname" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Ifsc Code</label>
                <input type="text" name="ifsc" id="ifsc" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Branch</label>
                <textarea name="branch" id="branch" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" id="address" class="form-control"></textarea>
            </div>
            
            <div class="form-group">
                <label for="">Amount type</label>
                <div class="radio-group">
                <input type="radio" id="radio-opt-1" value="Credit" name="dep_type" checked=""><label for="radio-opt-1">Credit</label>
                <input type="radio" id="radio-opt-2" value="Debit" name="dep_type"><label for="radio-opt-2">Debit</label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Amount</label>
                <input type="text" name="amount" id="amount" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Note</label>
                <textarea name="note" id="note" class="form-control"></textarea>
            </div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Add Now</button>
                  </div>
               </div>
              </div>
            </form>
            </div>
          <div class="col-md-3"></div>  
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-md-8">
              
            </div>
            <div class="col-md-4">
               <input type="text" class="form-control" id="search" placeholder="search here" style="margin: 20px 0">
            </div>
            <div class="row">
               <div class="col-md-12">
                  <table id="example" class="responstable" style="max-width:calc(100% - 30px);">
                     <tr>
                        
                        <th style="cursor:pointer;">Bank Details<i class="fa fa-sort"></i></th>
                        <th style="cursor:pointer;">Account Details <i class="fa fa-sort"></i></th>
                        <th style="cursor:pointer;">Action</th>
                     </tr>
                     <?php if(!empty($students)){ $i=1; foreach($students as $data_bank) { 
					// echo 'SELECT * FROM td_fin_bank_accounts WHERE bank_id="'.$data_bank['bank_id'].'"';
					 $bankdeposite = $this->db->query('SELECT * FROM td_fin_bank_deposits WHERE bank_id="'.$data_bank['bank_id'].'"')->result_array();	
					 ?>
                     <tr>
                        
                        <td> 
                            <span><b>Bank Name : </b><?php echo $data_bank['bank_id'];?></span> <br/>
                            <span><b>Account No : </b><?php echo $data_bank['acc_no'];?></span> <br/>
                            <span><b>Ifsc Code : </b><?php echo $data_bank['bank_ifsc'];?></span> <br/> 
                            <span><b>Bank Branch :</b><?php echo $data_bank['bank_branch'];?></span><br/>
                            <span><b>Bank Address :</b><?php echo $data_bank['bank_address'];?></span><br/>
                            <span><b>Note :</b><?php echo $data_bank['note'];?></span><br/>
                		</td>
                        <td>
                        <?php foreach($bankdeposite as $deposites){?>
                         <div class="panel panel-primary">
    						<div class="panel-body">
    							<h5 class="alert alert-info text-center"><strong class="text-uppercase"> <i class="fa fa-plus"></i> As Of Dated : <?php echo $deposites['dep_date'];?> </strong></h5>
                            <span><b>Openning Balance :</b><?php echo $deposites['closing_bal']-$deposites['dep_amount'];?></span><br/>
                            <span><b>Clossing Balance :</b><?php echo $deposites['closing_bal'];?></span>
                            </div>
                         </div>   
                            <?php } ?>
                        </td>
                       
                        <td> 
						<?php $func = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depid.' AND activity_id='.$actid.' AND user_id='.$uid)->result_array();?>
                        <?php foreach($func as $fncdtl){
						echo $fncdtl['function_icon'];
			   $fname = $this->db->query('SELECT * FROM tbl_functionn WHERE functionn_id='.$fncdtl['function_id'])->result_array();
			   ?>
                      <?php if($fname[0]['functionn_name'] != 'View'){?> <a href="<?php echo base_url();?>Finance/financeDetails/<?php echo str_replace(' ','',$fname[0]['functionn_name']).'Bank/'.$data_bank['acc_id'].'/'.$depid.'/'.$actid.'/'.$uid.'/'.$fncdtl['function_id'];?>" style="margin-bottom:5px;" title="<?php echo $fname[0]['functionn_name'];?>"><?php echo $fname[0]['function_icon'];?></a> 
                      <?php } ?>
                  <?php } ?>
                  </td>
                     </tr>
                     <?php $i++; } } ?>
                  </table>
               </div>
            </div>
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
<script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		source: "<?php echo base_url();?>search.php",
		minLength: 1
	});	
			

});


$("#bnkname").blur(function(){
    var txtBankName=$("#bnkname").val();
    var urls="<?php echo base_url() ?>Finance/financeDetails/getBankDetails/";
    var data={'bank_name':txtBankName};
    if(txtBankName!=""){
        $.ajax({
            type: "post",
            url: urls,
            data: data,
            datatype : 'html' ,       
            success: function (response) {
             var responseData=response.split("-");
             $("#acname").val(responseData[0]);
             $("#ifsc").val(responseData[3]);
             $("#branch").val(responseData[1]);
             $("#address").val(responseData[2]);
            }
    });
    }    
});

$(document).ready(function () {
    // alert();
    $("#msg").slideUp(2000);
});

//  $('#bnkname').on('input propertychange paste', function() {
//      alert(1);
//  } );
// function bnkdata(dval){
// alert(dval);
// }
</script>
 <script>
	  
         $(document).ready(function() {
           $('th').each(function(col) {
             $(this).hover(
             function() { $(this).addClass('focus'); },
             function() { $(this).removeClass('focus'); }
           );
             $(this).click(function() {
               if ($(this).is('.asc')) {
                 $(this).removeClass('asc');
                 $(this).addClass('desc selected');
                 sortOrder = -1;
               }
               else {
                 $(this).addClass('asc selected');
                 $(this).removeClass('desc');
                 sortOrder = 1;
               }
               $(this).siblings().removeClass('asc selected');
               $(this).siblings().removeClass('desc selected');
               var arrData = $('table').find('tbody >tr:has(td)').get();
               arrData.sort(function(a, b) {
                 var val1 = $(a).children('td').eq(col).text().toUpperCase();
                 var val2 = $(b).children('td').eq(col).text().toUpperCase();
                 if($.isNumeric(val1) && $.isNumeric(val2))
                 return sortOrder == 1 ? val1-val2 : val2-val1;
                 else
                    return (val1 < val2) ? -sortOrder : (val1 > val2) ? sortOrder : 0;
               });
               $.each(arrData, function(index, row) {
                 $('tbody').append(row);
               });
             });
           });

           

         });
         $(document).ready(function() {
             $('#example').DataTable();

             
         } );
      </script>
</body>
</html>





