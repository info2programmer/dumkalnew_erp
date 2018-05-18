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
       <fieldset>
                <legend><b style="font-size:26px;">Add Paper Publiction</b></legend>
                <form name="emp_dtls" action="<?php echo base_url();?>index.php/Employee/EmployeeDetails/add_employee_paper" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <label for="">Select Employee</label>
                <select name="txt_emp_id" class="form-control">
                <option value="">Select</option>
                <?php foreach($profile as $profile){?>
                <option value="<?php echo $profile['id']?>"><?php echo $profile['name']." - ".$profile['emp_id']?></option>
                <?php }?>
                </select>
                </div>
                <div id="desc">
                <div class="form-group">
                <label for="">Description</label>
                <textarea name="txt_description[]" class="form-control"></textarea>
                </div>
                </div>
                <div class="form-group">
                <a href="#" id="btn" onclick="return addnew();" class="btn btn-success">+ Add New</a>
                </div>
             <button type="submit" class="btn btn-primary">Submit</button>
             </form>
                </fieldset>
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
      <script>
$(document).ready(function(){
    $("#btn").click(function(){
        $("#desc").append("<div class='form-group'><label>Description</label><textarea  name='txt_description[]' class='form-control'></textarea></div><br>");
    });
});
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
		 

      </script>  
   </body>
</html>