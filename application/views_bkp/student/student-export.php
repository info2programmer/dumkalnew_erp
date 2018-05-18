<?php error_reporting(0);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('include/head');?>
<style>
         .text-on-pannel {
         background: #fff none repeat scroll 0 0;
         height: auto;
         margin-left: 20px;
         padding: 3px 5px;
         position: absolute;
         margin-top: -43px;
         border: 1px solid #337ab7;
         border-radius: 8px;
         }
         .panel {
         /* for text on pannel */
         margin-top: 27px !important;
         }
         .panel-body {
         padding-top: 30px !important;
         }
         .tab-content {
         background-color: #fff;
         padding: 5px 15px 15px 15px;
         border: 1px solid #ddd;
         border-top: none;
         }
      </style>
</head>

<body>
<?php $this->load->view('include/header');?>

<?php if($msg == 'YES'){?>

<section id="dashboardbody">
<div class="container">
	<div class="row">
        <form name="emp_dtls" action="<?php echo base_url();?>student/studentDetails/gen/" method="post" enctype="multipart/form-data">
           
           <div class="panel panel-primary">
              <div class="panel-body">
               <h5 class="text-on-pannel text-primary"><strong class="text-uppercase"> Student Data Export Name Wise </strong></h5>
               <div class="form-group">
               		<select class="form-control" name="reg_year" required>
                    	<option value="2014-2015">2014-2015</option>
                        <option value="2015-2016">2015-2016</option>
                        <option value="2016-2017">2016-2017</option>
                        <option value="2017-2018">2017-2018</option>
                    </select>
               </div>
                <?php  foreach($subject as $val) {?>
                <div class="form-group">
                	<input type="radio" name="sub_grp" value="<?php echo $val['grp_id'];?>" style="margin-top:10px;"/> <?php echo $val['subject_1'];?> (<?php echo $val['subject_1_code'];?>) 
                </div>
            	<?php }?>
                 <div class="form-group">
                 <input type="submit" value="Submit" class="btn btn-primary" />
                 </div>
            </div>
          </div>
        </form>
    </div>
  
</div>

</section> <!--Dashboardbody -->
<?php } else { ?>
<section id="dashboardbody">
<div class="container">
	<div class="row">
     
        <div class="col-md-12 col-sm-12">
        <h4 class="alert alert-info">Export Student Details</h4> 
        		<div class="alert alert-danger">
                	<h1>YOU ARE NOT ALLOWED TO ACCESS THIS PAGE</h1>
                 </div>
        </div>
	</div>
</div>

</section>
<?php } ?>



<?php $this->load->view('include/footer');?>


</body>
</html>





