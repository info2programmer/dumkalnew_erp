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
        <form name="emp_dtls" action="<?php echo base_url();?>index.php/employee/employeeDetails/search_emp" method="get" enctype="multipart/form-data">
            
           <input type="hidden" name="dep_id" value="<?php echo $depid;?>" />
            <input type="hidden" name="act_id" value="<?php echo $actid;?>" />
            <input type="hidden" name="usr_id" value="<?php echo $uid;?>" />
            <fieldset>
                <h3 class="alert alert-info"><i class="fa fa-search-plus"></i><i class="fa fa-user"></i> Search Employee</h3>
                <div class="form-group">
                <div class="radio-group">
                <span class="alert alert-success"><input type="radio" id="radio-opt-1" value="Yes" name="emp_type" checked ><label for="radio-opt-1">Current</label></span>
                 <span class="alert alert-default"><input type="radio" id="radio-opt-2" value="Resign" name="emp_type" ><label for="radio-opt-2">Resigned </label></span>
                </div>
                </div>
                <div class="form-group">
                <label for="">Employee ID</label>
                <input type="text" name="txt_id" id="txt_id" class="form-control"/>
            </div>
                <div class="form-group">
                <label for="">Employee Name</label>
                <input type="text" name="txt_name" id="txt_name" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Phone No</label>
                <input type="text" name="txt_ph" id="txt_ph" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Department</label>
                <select name="txt_dept" id="txt_dept" class="form-control">
                <option value="">Select</option>
                <option value="Office">Office</option>
                <option value="B.A">B.A</option>
                <option value="B.Sc">B.Sc</option>
                <option value="B.Com">B.Com</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Designation Group</label>
                <div class="radio-group">
                <input type="checkbox" name="txt_grp[]" value="'FTS'" id="radio-opt-1"/>
                <label for="radio-opt-1">FTS</label>
                </div>
                <div class="radio-group">
                <input type="checkbox" name="txt_grp[]" value="'PT'" id="radio-opt-2"/>
                <label for="radio-opt-2">PT</label>
                </div>
                <div class="radio-group">
                <input type="checkbox" name="txt_grp[]" value="'CWTT'" id="radio-opt-3"/>
                <label for="radio-opt-3">CWTT</label>
                </div>
                <div class="radio-group">
                <input type="checkbox" name="txt_grp[]" value="'GL'" id="radio-opt-4"/>
                <label for="radio-opt-4">GL</label>
                </div>
                <div class="radio-group">
                <input type="checkbox" name="txt_grp[]" value="'NTS'" id="radio-opt-5"/>
                <label for="radio-opt-5">NTS</label>
                </div>
                <div class="radio-group">
                <input type="checkbox" name="txt_grp[]" value="'Casual NTS'" id="radio-opt-6"/>
                <label for="radio-opt-6">Casual NTS</label>
                </div>
                <div class="radio-group">
                <input type="checkbox" name="txt_grp[]" value="'Others'" id="radio-opt-7"/>
                <label for="radio-opt-7">Others</label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Caste</label>
                <input type="text" name="txt_caste" id="txt_caste" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Sex</label>
                <input type="text" name="txt_sex" id="txt_sex" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-primary">Search Now</button>
            </fieldset>
        </form>
    </div>
  
</div>
         <?php } else { ?>
         <section id="dashboardbody">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <h4 class="alert alert-info">Search Employee</h4>
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
    window.open('<?php echo base_url();?>employee/employeeDetails/create_msg/'+encodeURIComponent(res3),'_blank');
 }
} 

function getCheckedCheckboxesForLibrary() {
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