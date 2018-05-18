<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('include/head');?>

</head>

<body>
<?php $this->load->view('include/header');?>

<?php if($msg == 'YES'){?>


<section id="dashboardbody">
<div class="container">
	<div class="row">
     <div class="col-md-12 col-xs-12">
     <h3 class="alert alert-info"><i class="fa fa-user-plus"></i> Add Employee</h3> 
     </div>
     
        <div class="col-md-6 col-xs-12">
              
              <?php if($this->session->flashdata('smsg')) echo $this->session->flashdata('smsg');?>  
      			<form action="<?php echo base_url().'index.php/employee/employeeDetails/add_details';?>" method="post" enctype="multipart/form-data">
 			<?php 
			$depid = $this->uri->segment(4);
			$actid = $this->uri->segment(5);
			$uid = $this->uri->segment(6);
			?>
            <input type="hidden" name="dep_id" value="<?php echo $depid;?>" />
            <input type="hidden" name="act_id" value="<?php echo $actid;?>" />
            <input type="hidden" name="usr_id" value="<?php echo $uid;?>" />


            <div class="form-group">

                <label for="">Name :</label>

                <input type="text" value="" name="txt_name" class="form-control">

            </div>

            <div class="form-group">

                <label for="">Preview Photo :</label>

                <div id="dvPreview"></div>

            </div>

            <div class="form-group">

                <label for="">Photo :</label>

                 <input type="file"  name="txt_photo" id="valid_img_up" class="form-control">

            </div>

            <div class="form-group">

                <label for="">Father's Name :</label>

                <input type="text" value="" name="txt_fname" class="form-control">

            </div>

             <div class="form-group">

                <label for="">Mother's Name :</label>

                <input type="text" value="" name="txt_mname" class="form-control">

            </div>

            <div class="form-group">

                <label for="">Contact No :</label>

                <input type="text" value="" name="txt_phn" maxlength="10" class="form-control">

            </div>  

            <div class="form-group">

                <label for="">Email :</label>

                <input type="email" value="" name="txt_email" class="form-control">

            </div> 

            <div class="form-group">

                <label for="">Sex :</label>

                <select name="txt_sex" id="txt_sex" class="form-control">

                    <option value="" selected="selected" hidden="">Select Sex</option>

                    <option value="M">Male</option>

                    <option value="F">Female</option>

                    <option value="T">Transgender</option>

                </select>

            </div>

            <div class="form-group">

                <label for="">Caste :</label>

                <select name="txt_caste" id="txt_caste" class="form-control">

                    <option value="" selected="selected" hidden="">Select Caste</option>

                    <option value="GEN">General</option>

                    <option value="SC">SC</option>

                    <option value="ST">ST</option>

                    <option value="OBC-A">OBC-A</option>

                    <option value="OBC-B">OBC-B</option>

                </select>

            </div>

            <div class="form-group">

                <label for="">Religion :</label>

                <select name="txt_religion" id="txt_religion" class="form-control">

                    <option value="" selected="selected" hidden="">Select Religion</option>

                    <option value="Hindu">Hindu</option>

                    <option value="Islam">Islam</option>

                    <option value="Christian">Christian</option>

                    <option value="Buddhist">Buddhist</option>

                    <option value="Other">Other</option>

                </select>

            </div>

            

      

            <div class="form-group">

                <label for="">Designation :</label>

                <input type="text" value="" name="txt_desig" class="form-control">

            </div>

            <div class="form-group">

                <label for="">Designation Group :</label>

                <select name="txt_desig_grp" id="txt_desig_grp" class="form-control">

                    <option value="" selected="selected" hidden="">Select Designation Group</option>

                    <option value="FTS">FTS</option>

                    <option value="PT">PT</option>

                    <option value="CWTT">CWTT</option>

                    <option value="GL">GL</option>

                    <option value="NTS">NTS</option>

                    <option value="Casual NTS">Casual NTS</option>

                    <option value="Others">Others</option>

                </select>

            </div>

            <div class="form-group">

                <label for="">Department :</label>

                <select name="txt_department" id="txt_department" class="form-control">

                    <option value="" selected="selected" hidden="">Select Department</option>

                    <option value="Office">Office</option>

                    <option value="B.A">B.A</option>

                    <option value="B.Sc">B.Sc</option>

                    <option value="B.Com">B.Com</option>

                </select>

            </div>

            <div class="form-group">

                <label for="">Specialisation :</label>

               <input type="text" value="" name="txt_specialisation" class="form-control">

            </div>
            </div>
<!-- 2nd column starts from here --->

<div class="col-md-6">

             <div class="form-group">

                <label for="">Date of Birth :</label>

                <input type="date" value="" name="txt_dob" class="form-control">

            </div>

            <div class="form-group">

                <label for="">Blood Group :</label>

                <select name="txt_bld_grp" id="txt_bld_grp" class="form-control">

                    <option value="" selected="selected" hidden="">Select Blood Group</option>

                    <option value="A (+ve)">A+</option>

                    <option value="A (-ve)">A-</option>

                    <option value="B (+ve)">B+</option>

                    <option value="B (-ve)">B-</option>

                    <option value="AB (+ve)">AB+</option>

                    <option value="AB (-ve)">AB-</option>

                    <option value="O (+ve)">O+</option>

                    <option value="O (-ve)">O-</option>

                </select>

            </div>

             <div class="form-group">

                <label for="">Vill :</label>

                <input type="text" value="" name="txt_vill" class="form-control">

            </div>

             <div class="form-group">

                <label for="">PO :</label>

                <input type="text" value="" name="txt_po" class="form-control">

            </div>

            <div class="form-group">

                <label for="">PS :</label>

                <input type="text" value="" name="txt_ps" class="form-control">

            </div>

            <div class="form-group">

                <label for="">District :</label>

                <input type="text" value="" name="txt_dist" class="form-control">

            </div>

            <div class="form-group">

            <?php $states = $this->db->query("select * from td_states where published=1 order by state_name asc")->result(); ?>

                <label for="">State :</label>

                <select name="txt_state" id="txt_state" class="form-control">

                    <option value="" selected="selected" hidden="">Select State</option>

                    <?php foreach($states as $state) { ?>

                    <option value="<?php echo $state->state_name; ?>"><?php echo $state->state_name; ?></option>

                    <?php } ?>

                </select>

            </div>

   

            <div class="form-group">

                <label for="">Pan No :</label>

               <input type="text" value="" name="txt_panno" class="form-control">

            </div>

            <div class="form-group">

                <label for="">Epic No :</label>

                <input type="text" value="" name="txt_epicno" class="form-control">

            </div>

             <div class="form-group">

                <label for="">Account Number :</label>

                <input type="text" value="" name="txt_accno" class="form-control">

            </div>

             <div class="form-group">

                <label for="">Bank :</label>

                <input type="text" value="" name="txt_bank" class="form-control">

            </div>

            <div class="form-group">

                <label for="">Remark :</label>

                <input type="text" value="" name="txt_remark" class="form-control">

            </div>

            <div class="form-group">

                <label for="">Date Of Appointment :</label>

                <input type="date" value="" name="txt_doapp" class="form-control">

            </div>

            <div class="form-group">

                <label for="">Aadhar No :</label>

                <input type="text" value="" name="txt_aadhar_no" maxlength="12" class="form-control">

            </div>

            <button type="submit" onclick="return validate_employees();" class="btn btn-primary">Add Employee Now</button>      

  



</form>
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
        <h4 class="alert alert-info">Add Employee</h4> 
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
<script language="javascript" type="text/javascript">

$(function () {

   $("#valid_img_up").change(function () {

       $("#dvPreview").html("");

       var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;

       if (regex.test($(this).val().toLowerCase())) {

           if (typeof (FileReader) != "undefined") {

                   $("#dvPreview").append("<img />");

                   var reader = new FileReader();

                   reader.onload = function (e) {

                       $("#dvPreview img").attr("src", e.target.result).height(100).css({

						   'display': 'block',
						   'height':'120px',
						   'width':'100px',
						   'border':'1px solid #000'

					   });

                   }

                   reader.readAsDataURL($(this)[0].files[0]);

               } else {

                   alert("This browser does not support FileReader.");

               }

       } else {

           	alert("Please upload a valid image file.");

       }

   });

});

</script>


</body>
</html>





