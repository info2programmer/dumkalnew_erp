<?php error_reporting(0);?>
<!DOCTYPE html>
<html >
   <head>
      <?php $this->load->view('include/head');?>
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css_new/style.css">
   </head>
   <body>
   <?php 
			$depid = $_REQUEST['dep_id'];
			$actid = $_REQUEST['act_id'];
			$uid = $_REQUEST['usr_id'];
			?>
      <?php $this->load->view('include/header');?>
      <?php if($msg == 'YES'){?>
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               <?php echo $res;?>
            </div>
            <div class="col-md-4">
               <input type="text" class="form-control" id="search" placeholder="search here" style="margin: 20px 0">
            </div>
            <div class="row">
               <div class="col-md-12">
                  <table id="example" class="responstable" style="max-width:calc(100% - 30px);">
                     <tr>
                        <th style="cursor:pointer;">Photo</th>
                        <th style="cursor:pointer;">Student Id</th>
                        <th data-th="Driver details" style="cursor:pointer;"><span>Name</span></th>
                        <th style="cursor:pointer;">Father's Name</th>
                        <th style="cursor:pointer;">Contact No</th>
                        <th style="cursor:pointer;">Session</th>
                        <th style="cursor:pointer;">DOB</th>
                        <th style="cursor:pointer;">Sex</th>
                        <th style="cursor:pointer;">Action</th>
                     </tr>
                     <?php if(!empty($students)){ $i=1; foreach($students as $sval) { ?>
                     <tr>
                        <td><img <?php if($sval['student_image'] == '') { ?>src="<?php echo base_url();?>assets/employee/img/blank_image.jpg"<?php } else { ?>src="http://dumkalcollege.org/ONLINE_APPLICATION/candidate/photo/<?php echo $sval['student_image'];?>" <?php } ?> style="width:50px; height:60px;"></td>
                        <td><?php echo $sval['student_id'];?></td>
                        <td><?php echo $sval['name'];?></td>
                        <td><?php echo $sval['father_name'];?></td>
                        <td><?php echo $sval['candidate_phone'];?></td>
                        <td><?php echo $sval['session_year'];?></td>
                        <td><?php echo $sval['dob'];?></td>
                        <td><?php echo $sval['sex'];?></td>
                           <td> 
						<?php $func = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$_GET['dep_id'].' AND activity_id='.$_GET['act_id'].' AND user_id='.$_GET['usr_id'])->result_array();?>
                        <?php foreach($func as $fncdtl){
			   $fname = $this->db->query('SELECT * FROM tbl_functionn WHERE functionn_id='.$fncdtl['function_id'])->result_array();
			   ?>
                     <?php //if($fname[0]['functionn_name'] == 'Register'){?>
               <?php //if($sval['registration']==0){?>
              <!-- <a class="span4 proj-div btn btn-primary btn-xs" data-toggle="modal" data-target="#GSCCModal">Register</a>-->
               <?php //} ?>
               <?php //} else { ?>
                      <?php if($fname[0]['functionn_name'] != 'View'){?> <a href="<?php echo base_url();?>Student/StudentDetails/<?php echo str_replace(' ','',$fname[0]['functionn_name']).'/'.$sval['student_id'].'/'.$depid.'/'.$actid.'/'.$uid;?>" class="btn btn-primary btn-xs" style="margin-bottom:5px;"><?php echo $fname[0]['functionn_name'];?></a> <?php //} ?>
                      <?php } ?>
                  <?php } ?>
                  </td>
                     </tr>
                     <?php $i++; } } ?>
                  </table>
               </div>
            </div>
         </div>
         <center>
            <div><?php echo $res;?></div>
         </center>
         <?php } else { ?>
         <section id="dashboardbody">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <h4 class="alert alert-info">Student List</h4>
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