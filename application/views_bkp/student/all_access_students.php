<?php error_reporting(0);?>
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
            <div class="col-md-8">
              
            </div>
            <div class="col-md-4">
               <input type="text" class="form-control" id="search" placeholder="search here" style="margin: 20px 0">
            </div>
            <div class="row">
               <div class="col-md-12">
               Selected Student <input type='text' id='getcnt' class="getcnt rounded_new_option" style="width:30px; text-align:center; font-weight:bolder;" readonly="readonly"><br/><br/>
        <a onClick="javascript:checkAll(true);" href="javascript:void();" class="btn btn-primary btn-xs">Check All</a> / 
        <a onClick="javascript:checkAll(false);" href="javascript:void();" class="btn btn-primary btn-xs">Uncheck All</a>
        <br /><br/>
        <a href="#" onClick="getCheckedCheckboxesForaccess()" class="btn btn-primary btn-xs">Allow Access</a>&nbsp;&nbsp;&nbsp;<a href="#" onClick="getCheckedCheckboxesFordisallow()" class="btn btn-primary btn-xs">Disallow Access</a>
       <span id="resultarea" style="color:#FF0000; font-size:14px;"></span>
                  <table id="example" class="responstable" style="max-width:calc(100% - 30px);">
                     <tr>
                     <th style="cursor:pointer;">SL No</th>
                     <th style="cursor:pointer;"></th>
                        <th style="cursor:pointer;">Photo</th>
                        <th style="cursor:pointer;">Student Id</th>
                        <th data-th="Driver details" style="cursor:pointer;"><span>Name</span></th>
                        <th style="cursor:pointer;">Father's Name</th>
                        <th style="cursor:pointer;">Contact No</th>
                        <th style="cursor:pointer;">Session</th>
                        <th style="cursor:pointer;">DOB</th>
                        <th style="cursor:pointer;">Sex</th>
                     </tr>
                     <?php if(!empty($students)){ $i=1; foreach($students as $sval) { ?>
                     <tr>
                     <td><?php echo $i++;?></td>
                     <td><input type="checkbox" name="students" value="<?php echo $sval['stud_id'];?>" onClick="checkboxes();"/></td>
                        <td><img <?php if($sval['student_image'] == '') { ?>src="<?php echo base_url();?>assets/employee/img/blank_image.jpg"<?php } else { ?>src="http://dumkalcollege.org/ONLINE_APPLICATION/candidate/photo/<?php echo $sval['student_image'];?>" <?php } ?> style="width:50px; height:60px;"></td>
                        <td><?php echo $sval['student_id'];?></td>
                        <td><?php echo $sval['name'];?></td>
                        <td><?php echo $sval['father_name'];?></td>
                        <td><?php echo $sval['candidate_phone'];?></td>
                        <td><?php echo $sval['session_year'];?></td>
                        <td><?php echo $sval['dob'];?></td>
                        <td><?php echo $sval['sex'];?></td>
                        
                     </tr>
                     <?php $i++; } } ?>
                  </table>
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
                     <h4 class="alert alert-info">Student List</h4>
                     <div class="alert alert-danger">
                        <h1>YOU ARE NOT ALLOWED TO ACCESS THIS PAGE</h1>
                     </div>
                  </div>
               </div>
            </div>
     
      </section>
      <?php } ?>
      <?php $this->load->view('include/footer');?>
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
		 
function getCheckedCheckboxesForaccess() {
var checkboxes = document.getElementsByName('students');
var selected = [];
for (var i=0; i<checkboxes.length; i++) {
    if (checkboxes[i].checked) {
        selected.push(checkboxes[i].value);
    }
}
 if(selected == '') {
    alert('You didn"t Select Any Student');
 } else {
	var str=btoa((selected));
	var res1 = str.replace("=", "");
	var res2 = res1.replace("=", "");
	var res3 = res2.replace("=", "");
	$.ajax({
  type: "GET",
  url: "<?php echo base_url();?>student/studentDetails/student_access_bulk/"+encodeURIComponent(res3),
  data: encodeURIComponent(res3),
  cache: false,
  success: function(data){
  	if(data=='OK'){
     $("#resultarea").text('Successfully Done');
	 } else {
	 $("#resultarea").text('Not Successfull');
	 }
  }
  
});
    //window.open('<?php echo base_url();?>student/studentDetails/student_access_bulk/'+encodeURIComponent(res3));
 }
} 

function getCheckedCheckboxesFordisallow() {
   var checkboxes = document.getElementsByName('students');
var selected = [];
for (var i=0; i<checkboxes.length; i++) {
    if (checkboxes[i].checked) {
        selected.push(checkboxes[i].value);
    }
}
 if(selected == '') {
    alert('You didn"t Select Any Student');
 } else {
    var str=btoa((selected));
	var res1 = str.replace("=", "");
	var res2 = res1.replace("=", "");
	var res3 = res2.replace("=", "");
	
	$.ajax({
  type: "GET",
  url: "<?php echo base_url();?>student/studentDetails/student_disallow_bulk/"+encodeURIComponent(res3),
  data: encodeURIComponent(res3),
  cache: false,
  success: function(data){
  	if(data=='OK'){
     $("#resultarea").text('Successfully Done');
	 } else {
	 $("#resultarea").text('Not Successfull');
	 }
  }
  
});
	
   // window.open('<?php echo base_url();?>student/studentDetails/student_disallow_bulk/'+encodeURIComponent(res3));
 }
}  
function getCheckedCheckboxesForMsg() {
   var checkboxes = document.getElementsByName('students');
var selected = [];
for (var i=0; i<checkboxes.length; i++) {
    if (checkboxes[i].checked) {
        selected.push(checkboxes[i].value);
    }
}
 if(selected == '') {
    alert('You didn"t Select Any Student');
 } else {
	var str=btoa((selected));
	var res1 = str.replace("=", "");
	var res2 = res1.replace("=", "");
	var res3 = res2.replace("=", "");
    window.open('<?php echo base_url();?>student/studentDetails/create_msg/'+encodeURIComponent(res3),'_blank');
 }
}  


  
      </script>  
   </body>
</html>