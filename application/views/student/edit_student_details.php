<!DOCTYPE html>
<html >
   <head>
      <?php $this->load->view('include/head');?>
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css_new/style.css">
   </head>
   <body>
   <?php 
			$depid = $this->uri->segment(5);
			$actid = $this->uri->segment(6);
			$uid = $this->uri->segment(7);
			?>
      <?php $this->load->view('include/header');?>
      <?php if($msg == 'YES'){?>
      <div class="container">
         <div class="row">
        
    <div class="col-md-4">
    <div class="alert alert-info">
        <form name="emp_dtls" action="<?php echo base_url();?>index.php/Student/StudentDetails/update_student_details" method="post" enctype="multipart/form-data" onSubmit="return validate_student()">
            <input type="hidden" name="category" value="<?php echo $edit[0]['student_id'];?>">
             <input type="hidden" name="dep_id" value="<?php echo $depid;?>">
              <input type="hidden" name="act_id" value="<?php echo $actid;?>">
               <input type="hidden" name="usr_id" value="<?php echo $uid;?>">
           
            <fieldset>
                <legend><b style="font-size:26px;">Edit Student Details</b></legend>
                <div class="form-group">
                <label for="">Student ID</label>
                <input type="text" name="txt_id" id="txt_id" value="<?php echo $edit[0]['student_id'];?>" class="form-control" readonly/>
              </div>
             <div class="form-group">
                <label for="">Student Name</label>
                <input type="text" name="txt_name" id="txt_name" value="<?php echo $edit[0]['name'];?>"  class="form-control"/>
            </div>
             <div class="form-group">
                <label for="">Father's Name</label>
                <input type="text" name="txt_fname" id="txt_fname" value="<?php echo $edit[0]['father_name'];?>"  class="form-control"/>
            </div>
             <div class="form-group">
                <label for="">Contact No</label>
                <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $edit[0]['candidate_phone'];?>" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Guardian Contact No</label>
                <input type="text" name="txt_gcontact" id="txt_gcontact" value="<?php echo $edit[0]['g_phn'];?>" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Stream</label>
                <select name="txt_stream" id="txt_stream" class="form-control">
                <option value="">Select</option>
                <?php foreach ($stream as $studstream){?>
                <option value="<?php echo $studstream['stream_id'];?>" <?php if($studstream['stream_id']==$edit[0]['stream']){?>selected<?php }?>><?php echo $studstream['stream_name'];?></option>
                <?php } ?>
                </select>
                
            </div>
            <div class="form-group">
                <label for="">Class Roll No (Part 1)</label>
                <input type="text" name="txt_roll" id="txt_roll" value="<?php echo $edit[0]['roll'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Year</label>
                <select name="txt_year" id="txt_year" class="form-control">
                <option value="">Select</option>
                
                <option value="1" <?php if($edit[0]['year']==1){?>selected<?php }?>>1st</option>
                <option value="2" <?php if($edit[0]['year']==2){?>selected<?php }?>>2nd</option>
                <option value="3" <?php if($edit[0]['year']==3){?>selected<?php }?>>3rd</option>
                
                </select>
                
            </div>
            <div class="form-group">
                <label for="">Registration No</label>
                <input type="text" name="txt_reg" id="txt_reg" value="<?php echo $edit[0]['registration_no'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Registration Year</label>
                <select name="reg_year" id="reg_year" class="form-control">
                <option value="">Select</option>
                
                <option value="2014-2015" <?php if($edit[0]['reg_year']=='2014-2015'){?>selected<?php }?>>2014-2015</option>
                <option value="2015-2016" <?php if($edit[0]['reg_year']=='2015-2016'){?>selected<?php }?>>2015-2016</option>
                <option value="2016-2017" <?php if($edit[0]['reg_year']=='2016-2017'){?>selected<?php }?>>2016-2017</option>
                <option value="2017-2018" <?php if($edit[0]['reg_year']=='2017-2018'){?>selected<?php }?>>2017-2018</option>
                <option value="2018-2019" <?php if($edit[0]['reg_year']=='2018-2019'){?>selected<?php }?>>2018-2019</option>
                
                </select>
                
            </div>
            <div class="form-group">
                <label for="">Session Year</label>
                <select name="ses_year" id="ses_year" class="form-control">
                <option value="">Select</option>
                
                <option value="2014-2015" <?php if($edit[0]['session_year']=='2014-2015'){?>selected<?php }?>>2014-2015</option>
                <option value="2015-2016" <?php if($edit[0]['session_year']=='2015-2016'){?>selected<?php }?>>2015-2016</option>
                <option value="2016-2017" <?php if($edit[0]['session_year']=='2016-2017'){?>selected<?php }?>>2016-2017</option>
                <option value="2017-2018" <?php if($edit[0]['session_year']=='2017-2018'){?>selected<?php }?>>2017-2018</option>
                <option value="2018-2019" <?php if($edit[0]['session_year']=='2018-2019'){?>selected<?php }?>>2018-2019</option>
                
                </select>
                
            </div>
            <div class="form-group">
                <label for="">Part 1 Roll (Univ) </label>
                <input type="text" name="txt_roll1" id="txt_roll1" value="<?php echo $edit[0]['roll1'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Part 2 Roll (Univ)</label>
                <input type="text" name="txt_roll2" id="txt_roll2" value="<?php echo $edit[0]['roll2'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Part 3 Roll (Univ)</label>
                <input type="text" name="txt_roll3" id="txt_roll3" value="<?php echo $edit[0]['roll3'];?>" class="form-control"/>
            </div>
            </div>
    </div>
    
    <!-- start new column for same form -->
    <div class="col-md-4"> 
    <div class="alert alert-info">
    <!--<p style="height:26px;"></p>
    <legend></legend> -->
        <div class="form-group">
                <label for="">Subject 1</label>
                <input type="text" name="txt_sub1" id="txt_sub1" value="<?php echo $edit[0]['subject1'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Subject 2</label>
                <input type="text" name="txt_sub2" id="txt_sub2" value="<?php echo $edit[0]['subject2'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Subject 3</label>
                <input type="text" name="txt_sub3" id="txt_sub3" value="<?php echo $edit[0]['subject3'];?>" class="form-control"/>
            </div>
            
                 <div class="form-group">
                <label for="">Sex</label>
                <select name="txt_sex" id="txt_sex" class="form-control">
                <option value="">Select</option>
                
                <option value="F" <?php if($edit[0]['sex']=='F'){?>selected<?php }?>>Female</option>
                <option value="M" <?php if($edit[0]['sex']=='M'){?>selected<?php }?>>Male</option>
                <option value="T" <?php if($edit[0]['sex']=='T'){?>selected<?php }?>>Transgender</option>
                
                </select>
                
            </div>
            
            <div class="form-group">
                <label for="">Caste</label>
                <select name="txt_caste" id="txt_caste" class="form-control">
                <option value="">Select</option>
                
                <option value="Gen" <?php if($edit[0]['caste']=='Gen'){?>selected<?php }?>>Gen</option>
                <option value="SC" <?php if($edit[0]['caste']=='SC'){?>selected<?php }?>>SC</option>
                <option value="ST" <?php if($edit[0]['caste']=='ST'){?>selected<?php }?>>ST</option>
                <option value="OBC-A" <?php if($edit[0]['caste']=='OBC-A'){?>selected<?php }?>>OBC-A</option>
                <option value="OBC-B" <?php if($edit[0]['caste']=='OBC-B'){?>selected<?php }?>>OBC-B</option>
                
                </select>
                
            </div>
            <div class="form-group">
                <label for="">Religion</label>
                <input type="text" name="txt_rlgn" id="txt_rlgn" value="<?php echo $edit[0]['religion'];?>"  class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">PH %</label>
                <input type="text" name="txt_ph" id="txt_ph" value="<?php echo $edit[0]['ph'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Date of Birth</label>
                <input type="text" name="txt_dob" value="<?php echo date('m/d/Y',strtotime($edit[0]['dob']));?>" id="datepicker" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Village</label>
                <input type="text" name="txt_vill" id="txt_vill" value="<?php echo $edit[0]['vill'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Post Office</label>
               <input type="text" name="txt_post" id="txt_post" value="<?php echo $edit[0]['po'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Police Station</label>
                <input type="text" name="txt_ps" id="txt_ps" value="<?php echo $edit[0]['ps'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">District</label>
                <input type="text" name="txt_dist" id="txt_dist" value="<?php echo $edit[0]['dist'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">State</label>
                <input type="text" name="txt_state" id="txt_state" value="<?php echo $edit[0]['state'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Fee Discount</label>
                <div class="radio-group">
                  <input type="radio" name="is_fee_discount" value="N" id="radio-opt-N" <?php if($edit[0]['is_fee_discount']=='N'){echo 'Checked';}?>/>
                  <label for="radio-opt-N">No Discount</label>
                  <br />
                  <input type="radio" name="is_fee_discount" value="H" id="radio-opt-H" <?php if($edit[0]['is_fee_discount']=='H'){echo 'Checked';}?>/>
                  <label for="radio-opt-H">Half Fee Discount</label>
                  <br />
                  <input type="radio" name="is_fee_discount" value="F" id="radio-opt-F" <?php if($edit[0]['is_fee_discount']=='F'){echo 'Checked';}?>/>
                  <label for="radio-opt-F">Full Fee Discount</label>
                  <br />
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </fieldset>
        </form>
        </div>
    </div>  
     
    
   <div class="col-md-4">
   		<div class="alert alert-success text-center">
        <form name="emp_dtls" action="<?php echo base_url();?>index.php/Student/StudentDetails/update_student_image" method="post" enctype="multipart/form-data" onSubmit="return validate_student_image()">
            <input type="hidden" name="category" value="<?php echo $edit[0]['student_id'];?>">
             <input type="hidden" name="dep_id" value="<?php echo $depid;?>">
              <input type="hidden" name="act_id" value="<?php echo $actid;?>">
               <input type="hidden" name="usr_id" value="<?php echo $uid;?>">
           
            <fieldset>
                <legend><b style="font-size:24px;">Edit Student Image</b></legend>
                <img src="http://dumkalcollege.org/ONLINE_APPLICATION/candidate/photo/<?php echo $edit[0]['student_image'];?>" width="140" height="170" style="border:1px solid #333333;">
               <div class="form-group">
                <label for="">Student Image</label>
                <input type="file" name="student_image" id="student_image" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-success btn-block">Submit</button>
            </fieldset>
        </form>
        </div>
        <p style="height:5px;"></p>
        <div class="alert alert-success text-center">
        <form name="emp_dtls" action="<?php echo base_url();?>index.php/Student/StudentDetails/update_student_signature" method="post" enctype="multipart/form-data" onSubmit="return validate_student_signature()">
           <input type="hidden" name="category" value="<?php echo $edit[0]['student_id'];?>">
             <input type="hidden" name="dep_id" value="<?php echo $depid;?>">
              <input type="hidden" name="act_id" value="<?php echo $actid;?>">
               <input type="hidden" name="usr_id" value="<?php echo $uid;?>">
           
            <fieldset>
                <legend><b style="font-size:24px;">Edit Student Signature</b></legend>
                <img <?php if($edit[0]['student_signature'] == '') { ?>src="<?php echo base_url();?>assets/employee/img/blank_image.jpg"<?php } else { ?>src="http://dumkalcollege.org/ONLINE_APPLICATION/candidate/sign/<?php echo $edit[0]['student_signature'];?>" <?php } ?> width="100%" height="100" style="border:1px solid #333333;">
               <div class="form-group">
                <label for="">Student Signature</label>
                <input type="file" name="student_signature" id="student_signature" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-success btn-block">Submit</button>
            </fieldset>
        </form>
        </div>
    </div> 
</div>
</div>
      </section>
    <?php } else { ?>
         <section id="dashboardbody">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <h4 class="alert alert-info">Edit Student Details</h4>
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
      <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
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
      <script>
         $("#search").keyup(function () {
         var value = this.value.toLowerCase().trim();
         
         $("table tr").each(function (index) {
             if (!index) return;
             $(this).find("td").each(function () {
                 var id = $(this).text().toLowerCase().trim();
                 var not_found = (id.indexOf(value) == -1);
                 $(this).closest('tr').toggle(!not_found);
                 return not_found;
             });
         });
         });
      </script>  
   </body>
</html>