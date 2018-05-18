<!DOCTYPE html>
<html >
<head>
	<?php $this->load->view('include/head');?>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css_new/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.structure.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.theme.min.css">
  	<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>  
	<style>
		.form-control{
			max-width: 85%;
			margin-top: 8px;
		}
		.td-class{
			font-family:  monospace;
			font-size: 16px;
			padding-top: 3px
		}	
	</style>
	<script>
		function checkForm(form)
		{	
			if($('input[type=checkbox]:checked').length == 0)
			{
				document.getElementById("errs").style.display = "block";

				valid = false;return false;
			}
			if(form.a_all.checked) {

				var y = document.forms["myForm"]["key_all"].value;
				if(y == null || y == "")
				{
					document.getElementById("errk").style.display = "block";
					form.key_all.focus();
					return false;
				}
				if(len<=1)
				{
					document.getElementById("errz").style.display = "block";
					form.key_all.focus();
					return false;
				} 		  
			}
			if(form.acc_no.checked) {

				var y = document.forms["myForm"]["key_acc_no"].value;
				if(y == null || y == "")
				{
					document.getElementById("errk").style.display = "block";
					form.key_acc_no.focus();
					return false;
				}	
				if(len<=1)
				{
					document.getElementById("errz").style.display = "block";
					form.key_ed_comp_tran.focus();
					return false;
				} 	  
			}
			if(form.title.checked) {

				var y = document.forms["myForm"]["key_title"].value;
				var len = y.length;

				if(y == null || y == "")
				{
					document.getElementById("errk").style.display = "block";
					form.key_title.focus();
					return false;
				}

				if(len<=1)
				{
					document.getElementById("errz").style.display = "block";
					form.key_title.focus();
					return false;
				}		  
			}
			if(form.author.checked) {

				var y = document.forms["myForm"]["key_author"].value;
				var len = y.length;

				if(y == null || y == "")
				{
					document.getElementById("errk").style.display = "block";
					form.key_author.focus();
					return false;
				}	
				if(len<=1)
				{
					document.getElementById("errz").style.display = "block";
					form.key_author.focus();
					return false;
				}		  
			}
			if(form.isbn.checked) {

				var y = document.forms["myForm"]["key_isbn"].value;
				var len = y.length;
				if(y == null || y == "")
				{
					document.getElementById("errk").style.display = "block";
					form.key_isbn.focus();
					return false;
				}	
				if(len<=1)
				{
					document.getElementById("errz").style.display = "block";
					form.key_isbn.focus();
					return false;
				}		  
			}
			if(form.subject.checked) {

				var y = document.forms["myForm"]["key_subject"].value;
				var len = y.length;
				if(y == null || y == "")
				{
					document.getElementById("errk").style.display = "block";
					form.key_subject.focus();
					return false;
				}		  
				if(len<=1)
				{
					document.getElementById("errz").style.display = "block";
					form.key_subject.focus();
					return false;
				}	
			}
		/*if(form.pub_year.checked) {
		 
		  var y = document.forms["myForm"]["key_pub_year"].value;
		  var len = y.length;
		  if(y == null || y == "")
		  {
			document.getElementById("errk").style.display = "block";
			form.key_pub_year.focus();
			return false;
		  }		
		   if(len<=1)
		  {
			document.getElementById("errz").style.display = "block";
			form.key_pub_year.focus();
			return false;
		  }  
		}*/
		if(form.ed_comp_tran.checked) {

			var y = document.forms["myForm"]["key_ed_comp_tran"].value;

			var len = y.length; 
			if(y == null || y == "")
			{
				document.getElementById("errk").style.display = "block";
				form.key_ed_comp_tran.focus();
				return false;
			}		
			if(len<=1)
			{
				document.getElementById("errz").style.display = "block";
				form.key_ed_comp_tran.focus();
				return false;
			}  
		}
	}
</script>  
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
			<div class="row">
				<div class="col-md-12">
					<?php if ($this->session->flashdata('message')): ?>
						<div class="alert alert-success" role="alert">
							<?php echo $this->session->flashdata('message'); ?>
						</div>
					<?php endif ?>

					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					
						<tr>
							<td colspan="3" align="center" valign="middle"><table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
								
								<tr>
									<td height="250" align="center" valign="middle"><table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
										<tr>
											<td width="480" height="250" align="center" valign="middle" bgcolor="#FFFFFF" class="searchbox">
												<form method="get" name="myForm"  action="<?php echo base_url();?>library/library_bookseaech/search_book_id" onsubmit="return checkForm(this);" target="_blank">
													<table width="600" height="384" border="0" align="center" cellpadding="0" cellspacing="0">
														<tr>
															<td height="30" align="center" valign="middle">&nbsp;</td>
															<td>&nbsp;</td>
															<td>&nbsp;</td>
														</tr>
														<tr>
															<td width="90" height="30" align="center" valign="middle">&nbsp;</td>
															<td class="td-class">SEARCH BY</td>
															<td class="td-class">KEYWORD</td>
														</tr>
														<tr id="row_all">
															<td width="90" height="30" align="center" valign="middle">&nbsp;</td>               
															<td class="td-class"><input type="checkbox" id="ck_all" name="a_all" value="All" />
															All </td>
															<td width="333">
																<input name="key_all" id="key_all" type="text"  class="form-control" placeholder="Type Keyword"/></td>
														</tr>
														<tr id="row_acc_no">
															<td width="90" height="30" align="center" valign="middle">&nbsp;</td>               
															<td class="td-class"><input type="checkbox" id="ck_acc_no" name="acc_no" value="AccNo" />
															Acc No </td>
															<td>
																<input name="key_acc_no" id="key_acc_no" type="text" class="form-control" placeholder="Type Acc No" />
															</td>
														</tr>
														<tr id="row_title">
															<td width="90" height="30" align="center" valign="middle">&nbsp;</td>               
															<td class="td-class"><input type="checkbox" id="ck_title" name="title" value="Title" />
															Title </td>
															<td>
																<input name="key_title" id="key_title" type="text" class="form-control" placeholder="Type Title" />
																<div id="city_id"></div>
															</td>
														</tr>
														<tr id="row_author">
															<td width="90" height="30" align="center" valign="middle">&nbsp;</td>               
															<td class="td-class"><input type="checkbox" id="ck_author" name="author" value="Author" />
															Author </td>
															<td>
																<input name="key_author" id="key_author" type="text" class="form-control" placeholder="Type Author" />
															</td>
														</tr>
														<tr id="row_isbn">
															<td width="90" height="30" align="center" valign="middle">&nbsp;</td>               
															<td class="td-class"><input type="checkbox" id="ck_isbn" name="isbn" value="ISBN" />
															ISBN No </td>
															<td>
																<input name="key_isbn" id="key_isbn" type="text" class="form-control" placeholder="Type ISBN" />
															</td>
														</tr>
														<tr id="row_subject">
															<td width="90" height="30" align="center" valign="middle">&nbsp;</td>               
															<td class="td-class"><input type="checkbox" id="ck_subject" name="subject" value="Subject" />
															Subject </td>
															<td>
																<input name="key_subject" id="key_subject" type="text" class="form-control" placeholder="Type Subject" />
															</td>
														</tr>
            <tr id="row_ed_comp_tran">
            	<td width="90" height="30" align="center" valign="middle">&nbsp;</td>               
            	<td  class="td-class" width="177"><input type="checkbox" id="ck_ed_comp_tran" name="ed_comp_tran" value="Ed/Comp/Tran" />
            	Editor/Comp/Tran </td>
            	<td>
            		<input name="key_ed_comp_tran" id="key_ed_comp_tran" type="text" class="form-control" placeholder="Type Editor/Comp/Tran" />
            	</td>
            </tr>

            <tr>
            	<td width="90" height="24" align="center" valign="middle">&nbsp;</td>
            	<td height="24" align="left" valign="top">
            		<span id="errs" style="display:none;" class="errortxt">&#10006;&nbsp;Error : Please choose any one</span>
            	</td>
            	<td height="24" align="left" valign="top">
            		<span id="errk" style="display:none;" class="errortxt">&#10006;&nbsp;Error : Please type related keyword</span>
            		<span id="errz" style="display:none;" class="errortxt">&#10006;&nbsp;Error : Please type atleast two letters</span>
            	</td>
            </tr>
<?php /*?>              <!--<tr>
                <td height="24" align="right" valign="middle">&nbsp;</td>
                <td height="24" align="center" valign="middle">&nbsp;</td>
                <td height="24" align="left" valign="top">
                <span id="errk" style="display:none;" class="errortxt">&#10006;&nbsp;<!--Error : Please type related keyword
                <?php if($this->session->flashdata('message')) { echo $this->session->flashdata('message'); } ?>
                </span></td>
            </tr>--><?php */?>
            <tr>
				<input type="hidden" name="depid" value="<?php echo $depid  ?>">
				<input type="hidden" name="actid" value="<?php echo $actid  ?>">
				<input type="hidden" name="uid" value="<?php echo $uid  ?>">
            	<td width="90" height="30" align="center" valign="middle">&nbsp;</td>
            	<td height="30" align="right" valign="middle">&nbsp;</td>
            	<td height="30" align="left" valign="middle"><input name="reset" type="reset" value="RESET" class="btn btn-info" id="configreset"  />&nbsp;                  <button name="submit" type="submit" class="btn btn-success" value="SUBMIT"><i class="fa fa-search" aria-hidden="true"></i> Search</button></td>
            </tr>
            <tr>
            	<td height="30" align="center" valign="middle">&nbsp;</td>
            	<td height="30" align="right" valign="middle">&nbsp;</td>
            	<td height="30" align="left" valign="middle">&nbsp;</td>
            </tr>
        </table>
    </form>
</td>
</tr>
</table></td>
</tr>
</table></td>
</tr>
<tr>
	<td height="70">&nbsp;</td>
	<td height="70">&nbsp;</td>
	<td height="70">&nbsp;</td>
</tr>

</table>

</div>
</div>
</div>
<?php } else { ?>
<section id="dashboardbody">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h4 class="alert alert-info">library Book Add</h4>
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
<!-- <script src="<?php //echo base_url(); ?>assets/js/bootstrap.min.js" ></script> -->
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

<script>
 $(document).ready(function() {

  $( "#key_title" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/title",
    minLength: 2
  });

  $( "#key_author" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/author1",
    minLength: 2
  });

  $( "#author2" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/author2",
    minLength: 2
  });

  $( "#author3" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/author3",
    minLength: 2
  });

  $( "#auth_conf" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/auth_conf",
    minLength: 2
  });

  $( "#auth_assc" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/auth_assc",
    minLength: 2
  });

  $( "#publisher" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/publisher",
    minLength: 2
  });

  $( "#place_of_publication" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/place_of_publication",
    minLength: 2
  });


  $( "#key_subject" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/subject1",
    minLength: 2
  });

  $( "#subject2" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/subject2",
    minLength: 2
  });

  $( "#subject3" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/subject3",
    minLength: 2
  });

  $( "#subject4" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/subject4",
    minLength: 2
  }); 

  $( "#suppliers" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/subject4",
    minLength: 2
  }); 

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
</script>
<script>
$(document).ready(function() {
	
	$('#ck_all').change(function(){
		$("#key_all").show();
		$("#key_acc_no").show();
		$("#key_title").show();
		$("#key_author").show();
		$("#key_isbn").show();
		$("#key_subject").show();
		$("#key_pub_year").show();
		$("#key_ed_comp_tran").show();
	
   		$("#key_all").prop("disabled", !$(this).is(':checked'));
		$("#key_acc_no").prop("disabled", $(this).is(':checked'));
		$("#key_title").prop("disabled", $(this).is(':checked'));
		$("#key_author").prop("disabled", $(this).is(':checked'));
		$("#key_isbn").prop("disabled", $(this).is(':checked'));
		$("#key_subject").prop("disabled", $(this).is(':checked'));
		$("#key_pub_year").prop("disabled", $(this).is(':checked'));
		$("#key_ed_comp_tran").prop("disabled", $(this).is(':checked'));
		
		$("#ck_acc_no").prop("disabled", $(this).is(':checked'));
		$("#ck_title").prop("disabled", $(this).is(':checked'));
		$("#ck_author").prop("disabled", $(this).is(':checked'));
		$("#ck_isbn").prop("disabled", $(this).is(':checked'));
		$("#ck_subject").prop("disabled", $(this).is(':checked'));
		$("#ck_pub_year").prop("disabled", $(this).is(':checked'));
		$("#ck_ed_comp_tran").prop("disabled", $(this).is(':checked'));			
	});
	$('#ck_acc_no').change(function(){
		$("#key_all").show();
		$("#key_acc_no").show();
		$("#key_title").show();
		$("#key_author").show();
		$("#key_isbn").show();
		$("#key_subject").show();
		$("#key_pub_year").show();
		$("#key_ed_comp_tran").show();
		
   		$("#key_acc_no").prop("disabled", !$(this).is(':checked'));
		$("#key_all").prop("disabled", $(this).is(':checked'));
		$("#key_title").prop("disabled", $(this).is(':checked'));
		$("#key_author").prop("disabled", $(this).is(':checked'));
		$("#key_isbn").prop("disabled", $(this).is(':checked'));
		$("#key_subject").prop("disabled", $(this).is(':checked'));
		$("#key_pub_year").prop("disabled", $(this).is(':checked'));
		$("#key_ed_comp_tran").prop("disabled", $(this).is(':checked'));
		
		$("#ck_all").prop("disabled", $(this).is(':checked'));
		$("#ck_title").prop("disabled", $(this).is(':checked'));
		$("#ck_author").prop("disabled", $(this).is(':checked'));
		$("#ck_isbn").prop("disabled", $(this).is(':checked'));
		$("#ck_subject").prop("disabled", $(this).is(':checked'));
		$("#ck_pub_year").prop("disabled", $(this).is(':checked'));
		$("#ck_ed_comp_tran").prop("disabled", $(this).is(':checked'));		
	});
	$('#ck_title').change(function(){
		$("#key_all").show();
		$("#key_acc_no").show();
		$("#key_title").show();
		$("#key_author").show();
		$("#key_isbn").show();
		$("#key_subject").show();
		$("#key_pub_year").show();
		$("#key_ed_comp_tran").show();
		
   		$("#key_title").prop("disabled", !$(this).is(':checked'));
		$("#key_all").prop("disabled", $(this).is(':checked'));
		$("#key_acc_no").prop("disabled", $(this).is(':checked'));
		$("#key_isbn").prop("disabled", $(this).is(':checked'));
		
		$("#ck_all").prop("disabled", $(this).is(':checked'));	
		$("#ck_acc_no").prop("disabled", $(this).is(':checked'));
		$("#ck_isbn").prop("disabled", $(this).is(':checked'));	
	});
	$('#ck_author').change(function(){
		$("#key_all").show();
		$("#key_acc_no").show();
		$("#key_title").show();
		$("#key_author").show();
		$("#key_isbn").show();
		$("#key_subject").show();
		$("#key_pub_year").show();
		$("#key_ed_comp_tran").show();
		
   		$("#key_author").prop("disabled", !$(this).is(':checked'));	
		$("#key_all").prop("disabled", $(this).is(':checked'));
		$("#key_acc_no").prop("disabled", $(this).is(':checked'));
		$("#key_isbn").prop("disabled", $(this).is(':checked'));
		
		$("#ck_all").prop("disabled", $(this).is(':checked'));	
		$("#ck_acc_no").prop("disabled", $(this).is(':checked'));
		$("#ck_isbn").prop("disabled", $(this).is(':checked'));		
	});
	$('#ck_isbn').change(function(){
		$("#key_all").show();
		$("#key_acc_no").show();
		$("#key_title").show();
		$("#key_author").show();
		$("#key_isbn").show();
		$("#key_subject").show();
		$("#key_pub_year").show();
		$("#key_ed_comp_tran").show();
		
   		$("#key_isbn").prop("disabled", !$(this).is(':checked'));
		$("#key_all").prop("disabled", $(this).is(':checked'));
		$("#key_acc_no").prop("disabled", $(this).is(':checked'));
		$("#key_title").prop("disabled", $(this).is(':checked'));
		$("#key_author").prop("disabled", $(this).is(':checked'));
		$("#key_subject").prop("disabled", $(this).is(':checked'));
		$("#key_pub_year").prop("disabled", $(this).is(':checked'));
		$("#key_ed_comp_tran").prop("disabled", $(this).is(':checked'));
		
		$("#ck_all").prop("disabled", $(this).is(':checked'));
		$("#ck_title").prop("disabled", $(this).is(':checked'));
		$("#ck_author").prop("disabled", $(this).is(':checked'));
		$("#ck_acc_no").prop("disabled", $(this).is(':checked'));
		$("#ck_subject").prop("disabled", $(this).is(':checked'));
		$("#ck_pub_year").prop("disabled", $(this).is(':checked'));
		$("#ck_ed_comp_tran").prop("disabled", $(this).is(':checked'));			
	});
	$('#ck_subject').change(function(){
		$("#key_all").show();
		$("#key_acc_no").show();
		$("#key_title").show();
		$("#key_author").show();
		$("#key_isbn").show();
		$("#key_subject").show();
		$("#key_pub_year").show();
		$("#key_ed_comp_tran").show();
		
   		$("#key_subject").prop("disabled", !$(this).is(':checked'));
		$("#key_all").prop("disabled", $(this).is(':checked'));
		$("#key_acc_no").prop("disabled", $(this).is(':checked'));
		$("#key_isbn").prop("disabled", $(this).is(':checked'));
		
		$("#ck_all").prop("disabled", $(this).is(':checked'));	
		$("#ck_acc_no").prop("disabled", $(this).is(':checked'));
		$("#ck_isbn").prop("disabled", $(this).is(':checked'));		
	});
	$('#ck_pub_year').change(function(){
		$("#key_all").show();
		$("#key_acc_no").show();
		$("#key_title").show();
		$("#key_author").show();
		$("#key_isbn").show();
		$("#key_subject").show();
		$("#key_pub_year").show();
		$("#key_ed_comp_tran").show();
		
   		$("#key_pub_year").prop("disabled", !$(this).is(':checked'));
		$("#key_all").prop("disabled", $(this).is(':checked'));
		$("#key_acc_no").prop("disabled", $(this).is(':checked'));
		$("#key_isbn").prop("disabled", $(this).is(':checked'));
		
		$("#ck_all").prop("disabled", $(this).is(':checked'));	
		$("#ck_acc_no").prop("disabled", $(this).is(':checked'));
		$("#ck_isbn").prop("disabled", $(this).is(':checked'));		
	});
	$('#ck_ed_comp_tran').change(function(){
		$("#key_all").show();
		$("#key_acc_no").show();
		$("#key_title").show();
		$("#key_author").show();
		$("#key_isbn").show();
		$("#key_subject").show();
		$("#key_pub_year").show();
		$("#key_ed_comp_tran").show();
		
   		$("#key_ed_comp_tran").prop("disabled", !$(this).is(':checked'));
		$("#key_all").prop("disabled", $(this).is(':checked'));
		$("#key_acc_no").prop("disabled", $(this).is(':checked'));
		$("#key_isbn").prop("disabled", $(this).is(':checked'));
		
		$("#ck_all").prop("disabled", $(this).is(':checked'));	
		$("#ck_acc_no").prop("disabled", $(this).is(':checked'));
		$("#ck_isbn").prop("disabled", $(this).is(':checked'));		
	});
	
	$('#configreset').click(function(){
        $('input[type="text"]').val('').removeAttr('disabled');
		$('input[type="checkbox"]').removeAttr('disabled');
    });
});
</script> 
<?php $this->load->view("include/footer.php");?>
</body>
</html>