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
            <form name="emp_dtls" action="<?php echo base_url();?>student/studentDetails/search_student_list" method="post" enctype="multipart/form-data">
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
    <h3 class="alert alert-info text-center"><strong class="text-uppercase"> <i class="fa fa-pencil-square-o"></i>  Student Registration </strong></h3>
                  
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Session</label>
                     <select name="txt_sesyear" id="txt_sesyear" class="form-control">
                        <option value="" selected="selected" hidden>-Select-</option>
                        <?php foreach($Session as $sval) {?>
                        <option value="<?php echo $sval['session'];?>"><?php echo $sval['session'];?></option>
                        <?php } ?>
                     </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Stream</label>
                     <select name="txt_stream" id="txt_stream" class="form-control">
                        <option value="" selected="selected" hidden>-Select-</option>
                        <?php foreach($stream as $stval) {?>
                        <option value="<?php echo $stval['stream_id'];?>"><?php echo $stval['stream_name'];?></option>
                        <?php } ?>
                     </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Subject</label>
                     <select name="txt_sub1" id="txt_sub1" class="form-control">
                        <option value="" selected="selected" hidden>-Select-</option>
                        <?php foreach($subject as $sbval) {?>
                        <option value="<?php echo $sbval['subject1'];?>"><?php echo $sbval['subject1'];?></option>
                        <?php } ?>
                     </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group-inline">
                     <label for="">Year</label>
                     <select name="txt_year" id="txt_year" class="form-control">
                        <option value="" selected="selected" hidden>-Select-</option>
                        <?php foreach($year as $yval) {
						if($yval['year'] > 0){
						?>
                        <option value="<?php echo $yval['year'];?>"><?php echo $yval['year'];?></option>
                        <?php }} ?>
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
                     <label for="">Roll No</label>
                     <input type="text" name="txt_roll" id="txt_roll" class="form-control"/>
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
                  <h4 class="alert alert-info">Student Registration</h4>
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