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
              
                  <table id="example" class="responstable" style="max-width:calc(100% - 30px);">
                     <tr>
                      <th style="cursor:pointer;"></th>
                        <th style="cursor:pointer;">Photo</th>
                        <th style="cursor:pointer;">Emp Id</th>
                        <th data-th="Driver details" style="cursor:pointer;"><span>Name</span></th>
                        <th style="cursor:pointer;">Father's Name</th>
                        <th style="cursor:pointer;">Contact No</th>
                        <th style="cursor:pointer;">Department</th>
                        <th style="cursor:pointer;">Designation</th>
                        <th style="cursor:pointer;">Designation Group</th>
                        <th style="cursor:pointer;">Action</th>
                     </tr>
                     <?php if(!empty($data)){ $i=1; foreach($data as $sval) { ?>
                     <tr>
                     <td> <input type="checkbox" name="emp" value="<?php echo $sval['id'];?>"  onClick="checkboxes();"/></td>
                        <td><img <?php if($sval['photo'] == '') { ?>src="<?php echo base_url();?>assets/employee/img/blank_image.jpg"<?php } else { ?>src="http://dumkalcollege.org/ERP/employee/img/<?php echo $sval['photo'];?>" <?php } ?> style="width:50px; height:60px;"></td>
                        <td><?php echo $sval['emp_id'];?></td>
                        <td><?php echo $sval['name'];?></td>
                        <td><?php echo $sval['father_name'];?></td>
                        <td><?php echo $sval['phone'];?></td>
                        <td><?php echo $sval['department'];?></td>
                        <td><?php echo $sval['designation'];?></td>
                        <td><?php echo $sval['desig_grp'];?></td>
                        <td> 
						<?php $func = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$depid.' AND activity_id='.$actid.' AND user_id='.$uid)->result_array();?>
                        <?php foreach($func as $fncdtl){
			   $fname = $this->db->query('SELECT * FROM tbl_functionn WHERE functionn_id='.$fncdtl['function_id'])->result_array();
			   ?>
               
                      <?php if($fname[0]['functionn_name'] != 'View'){?> <a href="<?php echo base_url();?>employee/employeeDetails/<?php echo str_replace(' ','',$fname[0]['functionn_name']).'/'.$sval['emp_id'].'/'.$depid.'/'.$actid.'/'.$uid;?>" class="btn btn-primary btn-xs" style="margin-bottom:5px;"><?php echo $fname[0]['functionn_name'];?></a> 
                      <?php } ?>
                  <?php } ?>
                  </td>
                     </tr>
                     <?php $i++; } } ?>
                  </table>
               </div>
            </div>
         </div>
         <?php } else { ?>
         <section id="dashboardbody">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <h4 class="alert alert-info">Employee List</h4>
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
    window.open('<?php echo base_url();?>employee/employeeDetails/create_msg/<?php echo $depid;?>/40/<?php echo $uid;?>/'+encodeURIComponent(res3),'_blank');
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
    window.open('<?php echo base_url();?>employee/employeeDetails/library_card/<?php echo $depid;?>/41/<?php echo $uid;?>/'+encodeURIComponent(res3),'_blank');
 }
} 
      </script>  
   </body>
</html>