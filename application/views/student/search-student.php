<?php error_reporting(0);?>
<!DOCTYPE html>
<html >
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
            <form name="emp_dtls" action="<?php echo base_url();?>Student/StudentDetails/search_student" method="get" enctype="multipart/form-data">
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
    <h3 class="alert alert-info text-center"><strong class="text-uppercase"> <i class="fa fa-search"></i> Search Student </strong></h3>
                  <div class="form-group">
                  <div>
                     <div class="radio-group" style="margin-top:4px;">
                       <span class="alert alert-success"> <input type="radio" id="radio-opt-1" value="NA" name="student_type" checked   >
                        <label for="radio-opt-1">Current Student</label></span>
                        
                        <span class="alert alert-success"><input type="radio" id="radio-opt-2" value="yes" name="student_type">
                        <label for="radio-opt-2">Former Student</label></span>
                     </div>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Student ID</label>
                     <input type="text" name="txt_id" id="txt_id" class="form-control"/>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Student Name</label>
                     <input type="text" name="txt_name" id="txt_name" class="form-control"/>
                  </div>
                  </div>
                     <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Mobile</label>
                     <input type="text" name="txt_mobile" id="txt_mobile" class="form-control"/>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Stream</label>
                     <select name="txt_stream" id="txt_stream" class="form-control">
                        <option value="" selected="selected" hidden>-Select-</option>
                        <?php foreach($data as $val) {?>
                        <option value="<?php echo $val['stream_id'];?>"><?php echo $val['stream_name'];?></option>
                        <?php } ?>
                     </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Roll No</label>
                     <input type="text" name="txt_roll" id="txt_roll" class="form-control"/>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Reg No</label>
                     <input type="text" name="txt_reg" id="txt_reg" class="form-control"/>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Reg Year</label>
                     <input type="text" name="txt_reg_yr" id="txt_reg_yr" class="form-control"/>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Year</label>
                     <select name="txt_year" id="txt_year" class="form-control">
                        <option value="" selected="selected" hidden>-Select-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                     </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Session</label>
                     <select name="txt_sesyear" id="txt_sesyear" class="form-control">
                        <option value="" selected="selected" hidden>-Select-</option>
                        <option value="2017-2018">2017-2018</option>
                        <option value="2016-2017">2016-2017</option>
                        <option value="2015-2016">2015-2016</option>
                     </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Subject 1</label>
                     <select name="txt_sub1" id="txt_sub1" class="form-control">
                        <option value="" selected="selected" hidden>-Select-</option>
                        <?php 
                           $subjs1 = $this->db->query("select * from td_subject_group")->result();
                           
                           
                           
                           foreach($subjs1 as $subj1) {?>
                        <option value="<?php echo $subj1->subject_1_code;?>"><?php echo $subj1->subject_1_code;?></option>
                        <?php } ?>
                     </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Subject 2</label>
                     <select name="txt_sub2" id="txt_sub2" class="form-control">
                        <option value="" selected="selected" hidden>-Select-</option>
                        <?php 
                           $subjs2 = $this->db->query("select * from td_subject_group")->result();
                           
                           
                           
                           foreach($subjs2 as $subj2) {?>
                        <option value="<?php echo $subj2->subject_2_code;?>"><?php echo $subj2->subject_2_code;?></option>
                        <?php } ?>
                     </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Subject 3</label>
                     <select name="txt_sub3" id="txt_sub3" class="form-control">
                        <option value="" selected="selected" hidden>-Select-</option>
                        <?php 
                           $subjs3 = $this->db->query("select * from td_subject_group")->result();
                           
                           
                           
                           foreach($subjs3 as $subj3) {?>
                        <option value="<?php echo $subj3->subject_3_code;?>"><?php echo $subj3->subject_3_code;?></option>
                        <?php } ?>
                     </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Sex</label>
                     <select name="txt_sex" id="txt_sex" class="form-control">
                        <option value="" selected="selected" hidden>Select Sex</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                        <option value="T">T</option>
                     </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Caste</label>
                     <select name="txt_caste" id="txt_caste" class="form-control">
                        <option value="" selected="selected" hidden>Select Caste</option>
                        <option value="Gen">Gen</option>
                        <option value="SC">SC</option>
                        <option value="ST">ST</option>
                        <option value="OBC-A">OBC-A</option>
                        <option value="OBC-B">OBC-B</option>
                     </select>
                  </div>
                  </div>
                 
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Search</button>
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