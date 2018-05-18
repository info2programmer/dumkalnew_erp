<!DOCTYPE html>
<html >
   <head>
      <?php $this->load->view('include/head');?>
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css_new/style.css">
   </head>
   <body>
      <?php $this->load->view('include/header');?>
       <?php 
			$depid = $this->uri->segment(4);
			$actid = $this->uri->segment(5);
			$uid = $this->uri->segment(6);
			?>
      <?php if($msg == 'YES'){?>
    <div class="container">
<div class="row">
</div>
    <div class="row">
    <form id="form8" name="emp_dtls" action="<?php echo base_url();?>index.php/report/Student/SearchStdListID" method="post" enctype="multipart/form-data" target="_blank" onsubmit="return validate_group()">
      <fieldset>
      <legend><b style="font-size:26px;">Search  Student List</b></legend>
      <div class="form-group">
        <label for="">Select Year</label>
        <select name="txt_yr" id="txt_yr" class="form-control">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="form-group">
        <label for="">Select Session</label>
        <select name="txt_session" id="txt_session" class="form-control">
          <?php foreach($regyr as $regyr){?>
          <option value="<?php echo $regyr->reg_year;?>"><?php echo $regyr->reg_year;?></option>
          <?php }?>
        </select>
      </div>
      <div class="form-group">
        <label for="">Subject</label>
        <div class="radio-group">
          <?php $i=0; foreach($subject as $subject){ $i++;?>
          <input type="radio" name="txt_sub" value="<?php echo $subject->grp_id;?>" id="radio-opt-<?php echo $i;?>" <?php if($i==1){?>checked="checked"<?php }?>/>
          <label for="radio-opt-<?php echo $i;?>"><?php echo $subject->stream_name." ".$subject->subject_1_code;?></label>
          <br />
          <?php }?>
        </div>
      </div>
      <div class="form-group">
        <label for="">Sort By</label>
        <div class="radio-group">
          <input type="radio" name="txt_sort" id="radio-opt-1" checked="checked" value="name"/>
          <label for="radio-opt-1">Name</label>
          <input type="radio" name="txt_sort"  id="radio-opt-2" value="roll"/>
          <label for="radio-opt-2">Roll</label>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" formaction="<?php echo base_url();?>index.php/Reports/ReportsDetails/SearchStdListID" class="btn btn-primary">Submit</button>
        <button type="submit" formaction="<?php echo base_url();?>index.php/Reports/ReportsDetails/SearchStdListID_excel" class="btn btn-success">Excel Download</button>
      </div>
      </fieldset>
    </form>
  </div>
</div>
</div>
         <?php } else { ?>
         <section id="dashboardbody">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <h4 class="alert alert-info">Search Student List</h4>
                     <div class="alert alert-danger">
                        <h1>YOU ARE NOT ALLOWED TO ACCESS THIS PAGE</h1>
                     </div>
                  </div>
               </div>
            </div>
      </div>
      </section>
      <?php } ?>
      
      <?php /*?><script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script><?php */?>
    
   
      <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
      <script type="text/javascript" language="javascript">// <![CDATA[
function checkAll(checktoggle)
{
  var checkboxes = new Array(); 
  checkboxes = document.getElementsByTagName('input');
 
  for (var i=0; i<checkboxes.length; i++)  {
    if (checkboxes[i].type == 'checkbox')   {
      checkboxes[i].checked = checktoggle;
    }
  }
}
// ]]>
</script>
<script>
function checkboxes()
      {
       var inputElems = document.getElementsByTagName("input"),
        count = 0;

        for (var i=0; i<inputElems.length; i++) {       
           if (inputElems[i].type == "checkbox" && inputElems[i].checked == true){
              count++;
			  document.getElementById('getcnt').value=count;
           }

        }
     }
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
		 
function getCheckedCheckboxesFor() {
   var checkboxes = document.getElementsByName('emp');
var selected = [];
for (var i=0; i<checkboxes.length; i++) {
    if (checkboxes[i].checked) {
        selected.push(checkboxes[i].value);
    }
}
 if(selected == '') {
    alert('You didn"t Select Any Employee');
 } else {
	var str=btoa((selected));
	var res1 = str.replace("=", "");
	var res2 = res1.replace("=", "");
	var res3 = res2.replace("=", "");
    window.open('<?php echo base_url();?>Employee/EmployeeDetails/create_msg/'+encodeURIComponent(res3),'_blank');
 }
} 

function getCheckedCheckboxesForlibrary() {
   var checkboxes = document.getElementsByName('emp');
var selected = [];
for (var i=0; i<checkboxes.length; i++) {
    if (checkboxes[i].checked) {
        selected.push(checkboxes[i].value);
    }
}
 if(selected == '') {
    alert('You didn"t Select Any Employee');
 } else {
    var str=btoa((selected));
	var res1 = str.replace("=", "");
	var res2 = res1.replace("=", "");
	var res3 = res2.replace("=", "");
    window.open('<?php echo base_url();?>employee/employee_details/library_card/'+encodeURIComponent(res3),'_blank');
 }
} 
      </script>  
   </body>
</html>