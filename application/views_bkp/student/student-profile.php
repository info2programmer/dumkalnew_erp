<?php error_reporting(0);?>
<!DOCTYPE html>
<html>
   <head>
      <?php $this->load->view('include/head'); ?>
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css_new/style.css">
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
      <?php $this->load->view('include/header'); ?>
      <?php 
			$depid = $depId;
			$actid = $actId;
			$uid = $uId;
			?>
      <?php if ($msg == 'YES') { ?>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#1" data-toggle="tab">General Information</a></li>
                  <li><a href="#2" data-toggle="tab">Admission Details</a></li>
                  <li><a href="#3" data-toggle="tab">Results</a></li>
                  <li><a href="#4" data-toggle="tab">Fee Details</a></li>
                  <!--<li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">
                     	Fees Details <span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu">
                     	<li><a href="#4" data-toggle="tab">Casual</a></li>
                     	<li><a href="#5" data-toggle="tab">Admission Part 1</a></li>
                     	<li><a href="#6" data-toggle="tab">Admission Part 2</a></li>
                     	<li><a href="#7" data-toggle="tab">Admission Part 3</a></li>
                     </ul>
                     </li>-->
               </ul>
               <div class="tab-content ">
                  <div class="tab-pane active" id="1">
                     <h4>General Information</h4>
                     <div class="row">
                        <div class="col-md-2">
                           <img <?php if($profile[0]['student_image'] == '') { ?>src="<?php echo base_url();?>assets/employee/img/blank_image.jpg"<?php } else { ?>src="http://dumkalcollege.org/ONLINE_APPLICATION/candidate/photo/<?php echo $profile[0]['student_image'];?>" <?php } ?> class="img-responsive"><br/>
                           <img <?php if($profile[0]['student_signature'] == '') { ?>src="<?php echo base_url();?>assets/employee/img/blank_image.jpg"<?php } else { ?>src="http://dumkalcollege.org/ONLINE_APPLICATION/candidate/sign/<?php echo $profile[0]['student_signature'];?>" <?php } ?>  class="img-responsive">
                        </div>
                        <div class="col-md-10">
                           <div class="row">
                              <div class="col-md-4">
                                 <strong>ID</strong><br/>
                                 <?php echo $profile[0]['student_id'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Name</strong><br/>
                                 <?php echo $profile[0]['name'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Father's Name</strong><br/>
                                 <?php echo $profile[0]['father_name'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Mother's Name</strong><br/>
                                 <?php echo $profile[0]['mother_name'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Guardian Name</strong><br/>
                                 <?php echo $profile[0]['g_name'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Guardian Relation</strong><br/>
                                 <?php echo $profile[0]['g_rltn'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Candidate Phone</strong><br/>
                                 <?php echo $profile[0]['candidate_phone'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Guardian Phone</strong><br/>
                                 <?php echo $profile[0]['g_phn'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Guardian Occupation</strong><br/>
                                 <?php echo $profile[0]['g_occu'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Religion</strong><br/>
                                 <?php echo $profile[0]['religion'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Nationality</strong><br/>
                                 <?php echo $profile[0]['nationality'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Caste</strong><br/>
                                 <?php echo $profile[0]['caste'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Sex</strong><br/>
                                 <?php echo $profile[0]['sex'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>DOB</strong><br/>
                                 <?php echo $profile[0]['dob'];?>
                              </div>
                              <div class="col-md-4">
                                 <strong>Marital Status</strong><br/>
                                 <?php echo $profile[0]['marital'];?>
                              </div>
                              <div class="col-md-12">
                                 <strong>Address</strong><br/>
                                 <?php echo $profile[0]['vill'];?>, <?php echo $profile[0]['po'];?>, <?php echo $profile[0]['ps'];?>, <?php echo $profile[0]['dist'];?>, <?php echo $profile[0]['state'];?>, <?php echo $profile[0]['pin'];?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="2">
                     <div class="panel panel-primary">
                        <div class="panel-body">
                           <h5 class="text-on-pannel text-primary"><strong class="text-uppercase"> Admission Details </strong></h5>
                           <?php $stream = $this->db->query('SELECT * FROM td_student_stream WHERE stream_id='.$profile[0]['stream'])->result_array();?>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="col-md-4">
                                    <strong>Stream</strong><br/>
                                    <?php echo $stream[0]['stream_name'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>Subject 1</strong><br/>
                                    <?php echo $profile[0]['subject1'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>Subject 2</strong><br/>
                                    <?php echo $profile[0]['subject2'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>Subject 3</strong><br/>
                                    <?php echo $profile[0]['subject3'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>College Roll</strong><br/>
                                    <?php echo $profile[0]['roll'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>Session</strong><br/>
                                    <?php echo $profile[0]['session_year'];?>
                                 </div>
                                 <?php if($profile[0]['registration']==1){?>
                                 <div class="col-md-4">
                                    <strong>Registration Year</strong><br/>
                                    <?php echo $profile[0]['reg_year'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>Registration Date</strong><br/>
                                    <?php echo $profile[0]['registration_date'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>Registration No</strong><br/>
                                    <?php echo $profile[0]['registration_no'];?>
                                 </div>
                                 <?php } else {?>
                                 <div class="col-md-4">
                                  <strong>Not Registered</strong><br/>
                                  <a href="<?php echo base_url();?>student/studentDetails/<?php echo 'Register/'.$profile[0]['student_id'].'/'.$depid.'/'.$actid.'/'.$uid;?>" class="btn btn-primary btn-xs">Register</a>
                                    <!--<a class="span4 proj-div btn btn-primary btn-xs" data-toggle="modal" data-target="#GSCCModal">Register</a>-->
                                 </div>
                                 <?php } ?>
                                 <div class="col-md-4">
                                    <strong>Part 1 Roll</strong><br/>
                                    <?php echo $profile[0]['roll1'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>Part 2 Roll</strong><br/>
                                    <?php echo $profile[0]['roll2'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>Part 3 Roll</strong><br/>
                                    <?php echo $profile[0]['roll3'];?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="panel panel-primary">
                        <div class="panel-body">
                           <h5 class="text-on-pannel text-primary"><strong class="text-uppercase"> Last School Details </strong></h5>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="col-md-4">
                                    <strong>Last Exam</strong><br/>
                                    <?php echo $profile[0]['last_exam'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>Exam Year</strong><br/>
                                    <?php echo $profile[0]['last_exam_year'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>Exam Board</strong><br/>
                                    <?php echo $profile[0]['last_exam_board'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>School</strong><br/>
                                    <?php echo $profile[0]['school_name'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>School Roll</strong><br/>
                                    <?php echo $profile[0]['school_roll'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>School Registration No</strong><br/>
                                    <?php echo $profile[0]['school_reg'];?>
                                 </div>
                                 <div class="col-md-4">
                                    <strong>School Grade</strong><br/>
                                    <?php echo $profile[0]['school_grade'];?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="3">
                     <h4>Results</h4>
                     <div class="row">
                        <?php $result = $this->db->query('SELECT * FROM td_student_result WHERE student_id="'.$profile[0]['student_id'].'"')->result_array();?>
                        <?php foreach($result as $resultDetails){?>
                        <?php $session = $this->db->query('SELECT * FROM td_student_session WHERE sid='.$resultDetails['exam_session'])->result_array();?>
                        <div class="col-md-4">
                           <div class="panel panel-default">
                              <!-- Default panel contents -->
                              <div class="panel-heading text-uppercase"><?php if($resultDetails['year']==1){echo '1st';}elseif($resultDetails['year']==2){echo '2nd';}else echo '3rd';?> Year</div>
                              <table class="table table-striped">
                                 <tbody>
                                    <?php if(strlen($resultDetails['subject1'])) { ?>
                                    <tr>
                                       <td><strong><?php echo $resultDetails['subject1'];?></strong></td>
                                       <td><?php echo $resultDetails['subject1_mark'];?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strlen($resultDetails['subject2'])) { ?>
                                    <tr>
                                       <td><strong><?php echo $resultDetails['subject2'];?></strong></td>
                                       <td><?php echo $resultDetails['subject2_mark'];?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strlen($resultDetails['subject3'])) { ?>
                                    <tr>
                                       <td><strong><?php echo $resultDetails['subject3'];?></strong></td>
                                       <td><?php echo $resultDetails['subject3_mark'];?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strlen($resultDetails['subject4'])) { ?>
                                    <tr>
                                       <td><strong><?php echo $resultDetails['subject4'];?></strong></td>
                                       <td><?php echo $resultDetails['subject4_mark'];?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strlen($resultDetails['subject5'])) { ?>
                                    <tr>
                                       <td><strong><?php echo $resultDetails['subject5'];?></strong></td>
                                       <td><?php echo $resultDetails['subject5_mark'];?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strlen($resultDetails['subject6'])) { ?>
                                    <tr>
                                       <td><strong><?php echo $resultDetails['subject6'];?></strong></td>
                                       <td><?php echo $resultDetails['subject6_mark'];?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                       <td><strong>Total Marks</strong></td>
                                       <td><?php echo $resultDetails['total'];?></td>
                                    </tr>
                                    <tr>
                                       <td><strong>Result</strong></td>
                                       <td><?php echo $resultDetails['result'];?></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     <?php } ?>
                  </div>
               </div>
               <div class="tab-pane" id="4">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                           <!-- Default panel contents -->
                           <div class="panel-heading text-uppercase">Fees Details</div>
                           <?php $feeDtl = $this->db->query('SELECT * FROM td_fee_collection WHERE particular LIKE "%'.$profile[0]['student_id'].'%"')->result_array();?>
                           <table class="table table-striped">
                              <tbody>
                              <tr>
                                    <td><strong>Amount</strong></td>
                                   
                                    <td><strong>Collection Date</strong></td>
                                    <td><strong>Year</strong></td>
                                    
                                    <td><strong>Particulars</strong></td>
                                    
                                    <td><strong>CB No</strong></td>
                                    
                                    <td><strong>LF No</strong></td>
                                   
                                 </tr>
                                 <?php foreach($feeDtl as $feedetails) { ?>
                                 <tr>
                                    
                                    <td><?php echo $feedetails['amount'];?></td>
                                   
                                    <td><?php echo $feedetails['col_date'];?></td>
                                    
                                    <td><?php echo $feedetails['year'];?></td>
                                   
                                    <td><?php echo $feedetails['particular'];?></td>
                                    
                                    <td><?php echo $feedetails['cb_no'];?></td>
                                    
                                    <td><?php echo $feedetails['lf_no'];?></td>
                                 </tr>
                                 <?php } ?>
                                
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
         <div class="row">
         <div class="col-md-12">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <h3 class="panel-title">Action</h3>
               </div>
               <?php $func = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depId.' AND activity_id='.$actId.' AND user_id='.$uId)->result_array();?>
               <div class="panel-body">
               <?php foreach($func as $fncdtl){
			   $fname = $this->db->query('SELECT * FROM tbl_functionn WHERE functionn_id='.$fncdtl['function_id'])->result_array();
			   ?>
               <?php if($fname[0]['functionn_name'] != 'View' && $fname[0]['functionn_name'] != 'Register' && $fname[0]['functionn_name'] != 'Unregister' && $fname[0]['functionn_name'] != 'Add' && $fname[0]['functionn_name'] != 'Profile'){?>
                  <a href="<?php echo base_url();?>student/studentDetails/<?php echo str_replace(' ','',$fname[0]['functionn_name']).'/'.$profile[0]['student_id'].'/'.$depid.'/'.$actid.'/'.$uid;?>" title="<?php echo $fname[0]['functionn_name'];?>"><?php echo $fname[0]['function_icon'];?></a> 
                 
                  <?php  }?>
                     
                  <?php  }?>
                  <?php if($sval['registration']==0): ?>
                        <a href="<?php echo base_url();?>student/studentDetails/<?php echo 'Register/'.$profile[0]['student_id'].'/'.$depid.'/'.$actid.'/'.$uid;?>" style="margin-bottom:5px;" title="Register"><i class="fa fa-registered" style="color:green;"></i></a> 
                      <?php else: ?>
                        <a href="<?php echo base_url();?>student/studentDetails/<?php echo 'Unregister/'.$profile[0]['student_id'].'/'.$depid.'/'.$actid.'/'.$uid;?>" style="margin-bottom:5px;" title="Unregister"><i class="fa fa-ban" style="color:red;"></i></a> 
                      <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
      </div> 
         
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <h3 class="panel-title">Important Links</h3>
               </div>
               <div class="panel-body">
                  <a href="<?php echo base_url();?>student/studentDetails/AdmissionFormq1/<?php echo $profile[0]['student_id'];?>" target="_blank">Admission Form</a> |
                  <a href="http://dumkalcollege.org/ONLINE_APPLICATION/candidate/document/<?php echo $profile[0]['student_marksheet'];?>" target="_blank">Marksheet</a> |
                  <?php if($profile[0]['stud_type']=='C'){?><span class="style33"><a href="http://dumkalcollege.org/ONLINE_APPLICATION/index.php/casualreview/Download/casualForm/<?php echo $profile[0]['student_id'];?>" target="_blank"><br />
              Download Casual Form </a></span>
              <?php } elseif($profile[0]['stud_type']=='C' && $profile[0]['tot_rev_paper']>0){?>
              <span class="style33"><a href="http://dumkalcollege.org/ONLINE_APPLICATION/index.php/casualreview/Download/casrevForm/<?php echo $profile[0]['student_id'];?>" target="_blank"><br />
              Download Casual & Review Form </a></span>
              <?php } else { ?>
			  <span class="style33"><a href="http://dumkalcollege.org/ONLINE_APPLICATION/index.php/casualreview/Download/revForm/<?php echo $profile[0]['student_id'];?>" target="_blank"><br />
              Download Review Form </a></span>
			  <?php } ?>|
              <?php if($profile[0]['2nd_final']=1){?>
                  <a href="http://dumkalcollege.org/ONLINE_APPLICATION/index.php/2ndf/Download/ApplicationForm/<?php echo $profile[0]['student_id'];?>">Final Admission Form (2nd Year)</a>|
                  <?php } ?>
                  <?php if($profile[0]['3rd_final']=1){?>
                  <a href="http://dumkalcollege.org/ONLINE_APPLICATION/index.php/3rdf/Download/ApplicationForm/<?php echo $profile[0]['student_id'];?>">Final Admission Form (3rd Year)</a>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
      </div>
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
     
      <?php /*?><script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script><?php */ ?>
    <?php $this->load->view('include/footer');?>
   </body>
</html>