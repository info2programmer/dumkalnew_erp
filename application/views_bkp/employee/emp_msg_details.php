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
    <div class="row-full">
            <div class="list-item">
            <table id="example" class="responstable" style="max-width:calc(100% - 30px);">
                     <tr>
                        <th style="cursor:pointer;">MSG</th>
                        <th style="cursor:pointer;">Action</th>
                     </tr>
                     <?php if(!empty($data)){ $i=1; foreach($data as $val) { ?>
                     <tr>
                    
                        <td><?php $message=$val['msg_content'];
				$message=str_replace("%26","&",$message);
				$message=str_replace("%28","(",$message);
				$message=str_replace("%29",")",$message);
				$message=str_replace("%3F","?",$message);
				$message=str_replace("%3B",";",$message);
				echo $message;?><br/><br/>Time: <?php echo $val['sent_datetime'];?></td>
                        <td>  <a href="<?php echo base_url();?>index.php/employee/employeeDetails/msg_details/<?php echo $val['msg_id'];?>"><button class="details">Details</button></a>
                  </td>
                     </tr>
                     <?php $i++; } } ?>
                  </table>
           
        </div>
          
        
    </div>
         <?php } else { ?>
         <section id="dashboardbody">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <h4 class="alert alert-info">Send Message</h4>
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