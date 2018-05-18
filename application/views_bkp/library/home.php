<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php $this->load->view('include/head');?>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css_new/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.structure.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.theme.min.css">
  <script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

td{
  font-family:  monospace;
}

a:link {

	color: #069;

	text-decoration: none;

}

a:visited {

	text-decoration: none;

	color: #069;

}

a:hover {

	text-decoration: underline;

	color: #F90;

}

a:active {

	text-decoration: none;

	color: #069;

}

ul.pagination {clear: both; display: block; margin-left: 30px;}

ul.pagination li {float: left; margin-right: 10px; list-style:none;}

ul.pagination li a {display: block; padding: 3px 5px; border: 1px solid black; color: black; transition: all 0.7s ease-in-out;}

ul.pagination li a:hover {color: #88F; border: 1px solid #88F}

ul.pagination li.active a {border: 1px solid #333; color: white; background: #333}

ul.pagination li.disabled a {border: 1px solid #ccc; color: white; background: #ccc}

/*#pagination{

margin: 40 40 0;

float:left;

position: relative;

top: 0;

}

ul.tsc_pagination li a

{

border:solid 1px;

border-radius:3px;

-moz-border-radius:3px;

-webkit-border-radius:3px;

padding:6px 9px 6px 9px;

}

ul.tsc_pagination li

{

padding-bottom:1px;

}

ul.tsc_pagination li a:hover,

ul.tsc_pagination li a.current

{

color:#FFFFFF;

box-shadow:0px 1px #18327B;

-moz-box-shadow:0px 1px #18327B;

-webkit-box-shadow:0px 1px #18327B;

}

ul.tsc_pagination

{

margin:4px 0;

padding:0px;

height:100%;

font:12px 'Tahoma';

list-style-type:none;

}

ul.tsc_pagination li

{

float:left;

margin:0px;

padding:0px;

margin-left:5px;

}

ul.tsc_pagination li a

{

color:black;

display:block;

text-decoration:none;

padding:7px 10px 7px 10px;

}

ul.tsc_pagination li a img

{

border:none;

}

ul.tsc_pagination li a

{

color:#18327B;

border-color:#18327B;

background:#E2E1E2;

}

ul.tsc_pagination li a:hover,

ul.tsc_pagination .current

{

text-shadow:0px 1px #18327B;

border-color:#18327B;

background:#18327B;

background:-moz-linear-gradient(top, #18327B 1px, #18327B 1px, #18327B);

background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #E9ADD3 color-stop(0.02, #CB419B color-stop(1, #18327B));



}*/

</style>

</head>



<body>
  <?php $this->load->view('include/header');?>
  <?php 
  $depid = $this->uri->segment(4);
  $actid = $this->uri->segment(5);
  $uid = $this->uri->segment(6);
  ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>

    <td height="40" align="center" valign="middle" bgcolor="#FFFFFF" class="tdstyle2"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr class="alert alert-danger">

        <td width="" height="40" align="right" valign="middle"><span class="txt6">Number of Copy Found :&nbsp;</span></td>

        <td width="" height="40" align="left" valign="middle"><span class="txt7"><?php echo $total_pages;?></span></td>

        <td width="" height="40" align="right" valign="middle"><span class="txt6">Search By :&nbsp;</span></td>

        <td width="" height="40" align="left" valign="middle"><span class="txt7"><?php echo $search;?></span></td>

        

        

        <!--<select class="dropdown2">

          <option selected="selected">10</option>

          <option>20</option>

          <option>30</option>

        </select>--></td>

        

      </tr>

    </table></td>

  </tr>

  <tr>

    <td height="25">&nbsp;</td>

  </tr>    

  <?php if(!empty($search_book)){ foreach($search_book as $books) { ?>

  <tr>

    <td align="center" valign="middle">



    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" style="box-shadow: 5px 5px 5px #888888;">

      <tr>

        <td height="80" colspan="5" align="center" valign="middle" bgcolor="#FFFFD2"><table width="98%" border="0" cellspacing="0" cellpadding="0" class="txt9" >

          <tr>

            <td width="9%" height="25" align="left" valign="top" class="txt9">Book Name</td>

            <td width="2%" height="25" align="left" valign="top">:</td>

            <td width="37%" height="25" align="left" valign="top"><?php echo $books->title;?></td>

            <td width="1%" align="left" valign="top">&nbsp;</td>

            <td width="9%" height="25" align="left" valign="top">Volume</td>

            <td width="3%" align="left" valign="top">:</td>

            <td colspan="4" align="left" valign="top"><?php  echo $books->volume; ?></td>

            <td width="10%" rowspan="3" align="left"><img src="<?php echo base_url();?>img_olibs/detail.png" width="14" height="14" border="0" align="absmiddle" />&nbsp;&nbsp;

            <br />

            <?php 

			 $a = $books->status;

			 if($a == 'Available') {

			?>

            <img src="<?php echo base_url();?>img_olibs/req.png" width="14" height="14" border="0" align="absmiddle" />&nbsp;&nbsp;
             <?php $func = $this->db->query('SELECT * FROM tbl_access WHERE department_id='.$_GET['depid'].' AND activity_id='.$_GET['actid'].' AND user_id='.$_GET['uid'])->result_array();?>
              <div class="panel-body">
              <?php foreach($func as $fncdtl){
  $fname = $this->db->query('SELECT * FROM tbl_functionn WHERE functionn_id='.$fncdtl['function_id'])->result_array();
  ?>
              <?php if($fname[0]['functionn_name'] == 'Copy' && $fname[0]['functionn_name'] != 'Edit'){?>

                <a href="<?php echo base_url() . "Library/LibraryDetails/edit_book/" . $books->id."/".$_GET['depid']."/".$_GET['actid']."/".$_GET['uid']; ?>"onclick="javascript:void window.open('<?php echo base_url() . "Library/LibraryDetails/edit_book/" . $books->id."/".$_GET['depid']."/".$_GET['actid']."/".$_GET['uid']; ?>','1442485591432','width=1024,height=520,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><i class="fa fa-pencil-square-o"></i> Edit</a>
                <br/>
                <a href="<?php echo base_url() . "Library/LibraryDetails/" . $books->id; ?>"onclick="javascript:void window.open('<?php echo base_url() . "Library/LibraryDetails/copy_book_id/" . $books->id; ?>','1442485591432','width=700,height=550,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><i class="fa fa-clone"></i> Copy</a>

                 <!-- <a href="<?php //echo base_url();?>student/studentDetails/<?php //echo str_replace(' ','',$fname[0]['functionn_name']).'/'.$profile[0]['student_id'].'/'.$depid.'/'.$actid.'/'.$uid;?>" title="<?php //echo $fname[0]['functionn_name'];?>"><?php //echo $fname[0]['function_icon'];?></a>  -->
                
                 <?php  }}?>

            

            <?php } else { ?>

            <img src="<?php echo base_url();?>img_olibs/req.png" width="14" height="14" border="0" align="absmiddle" />&nbsp;&nbsp;

            <a href="<?php echo base_url() . "index.php/wishlist/" . $books->id; ?>"onclick="javascript:void window.open('<?php echo base_url() . "index.php/search/wishlist/" . $books->id; ?>','1442485591432','width=700,height=550,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">Make Wishlist</a>

            <?php } ?>            </td>

            </tr>

          	<tr>

            <td width="9%" height="25" align="left" valign="top" class="txt9">Author(s)</td>

            <td width="2%" height="25" align="left" valign="top">:</td>

            <td width="37%" height="25" align="left" valign="top"><?php 

			if(!empty($books->author1) && !empty($books->author2) && !empty($books->author3)){

			echo $books->author1."/".$books->author2."/".$books->author3;

			}

			else if(!empty($books->author1) && !empty($books->author2))

			{

			echo $books->author1."/".$books->author2;

			}

			else if(!empty($books->author1))

			{

				echo $books->author1;

			}

			else if(empty($books->author1) && empty($books->author2) && empty($books->author3))

			{

			echo "";	

			}

			?></td>

            <td width="1%" align="left" valign="top">&nbsp;</td>

            <td width="9%" height="25" align="left" valign="top">Subject(s)</td>

            <td width="3%" align="left" valign="top">:</td>

            <td colspan="4" align="left" valign="top"><?php

			if(!empty($books->subject1) && !empty($books->subject2) && !empty($books->subject3) && !empty($books->subject4)){

			echo $books->subject1."/".$books->subject2."/".$books->subject3."/".$books->subject4;

			}

			else if(!empty($books->subject1) && !empty($books->subject2) && !empty($books->subject3))

			{

			echo $books->subject1."/".$books->subject2."/".$books->subject3;	

			}

			else if(!empty($books->subject1) && !empty($books->subject2))

			{

			echo $books->subject1."/".$books->subject2;		

			}

			else if(!empty($books->subject1))

			{

				echo $books->subject1;	

			}

			else if(empty($books->subject1) && empty($books->subject2) && empty($books->subject3) && empty($books->subject4))

			{

			echo "";	

			}

			?></td>

            </tr>

            <tr>

            	<td width="9%" height="25" align="left" valign="top" class="txt9">Call No</td>

            	<td width="2%" height="25" align="left" valign="top">:</td>

            	<td width="37%" height="25" align="left" valign="top"><?php echo $books->call_no;?></td>

            	<td width="1%" align="left" valign="top">&nbsp;</td>

            	<td width="9%" height="25" align="left" valign="top"><!--Published On-->Book Status</td>

            	<td width="3%" align="left" valign="top">:</td>

            	<td colspan="4" align="left" valign="top"><?php /* echo $books->date_of_publish;*/ ?>

                <?php 

				$a = $books->status;

				echo ($a=='Available')?'Available':'This Book is already issued.';?>

                </td>

             </tr>

          </table></td>

      </tr>

      </table>

    

    </td>

  </tr>

  <tr>

  <td height="32" align="center" valign="middle"></td></tr><?php }}?>

  <tr>

    <td height="50" align="center" valign="middle"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">

     

    </table></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

  </tr>
</table>

<?php $this->load->view("include/footer.php");?>

</body>

</html>

