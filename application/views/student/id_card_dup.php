<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dumkal College - ID Card</title>
<style>
.head{
	font-family:Arial, Helvetica, sans-serif;
	font-size:9px;
	font-weight:bold;}
body table tr td table tr td table tr td {
	font-family: Arial, Helvetica, sans-serif;
}
body table tr td table tr td table tr td {
	color: #000;
	font-size: 11px;
	font-weight: bold;
}
body table tr td table tr td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bold;
}
body table tr td table tr td table tr td span {
	font-size: 12px;
}
body table tr td table tr td table {
	color: #000;
}

.page {height: 18in; width: 12in; padding: 2mm; }
.page, .page * {-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
		.page-breaker {page-break-after:always;float:none;clear:both;}
		.page-no-breaker {float:none;clear:both;}
</style>
</head>

<body>

<div class="page">
<?php 
$i=0;
foreach($profile as $card) { 
$stream = $this->db->query('SELECT * FROM td_student_stream WHERE stream_id ='.$card['stream'])->result_array();
$i++;
    ?>
<table width="332" border="1" cellpadding="0" cellspacing="0" style="float:left; margin: 0px 5mm 5mm 0px;">
  <tr>
    <td width="332" height="207" align="center" valign="top"><table width="325" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="45" colspan="3" align="center" valign="middle"><table width="325" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="67" rowspan="3" align="center" valign="middle"><span style="font-family: Arial, Helvetica, sans-serif; font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold; text-transform:uppercase; color: #000;">&nbsp;<img src="<?php echo base_url();?>assets/employee/img/logo.png" alt="" width="49" height="37" border="0" align="absmiddle" /></span></td>
            <td width="139" rowspan="2"><span style="font-family: Arial, Helvetica, sans-serif; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; text-transform:uppercase; color:#003399;">Dumkal College</span> <br />
              <span style="font-family: Arial, Helvetica, sans-serif; font-family: Arial, Helvetica, sans-serif; font-size: 10px; font-weight: bold; text-transform:uppercase; color: #003399;">Dumkal, Murshidabad</span></td>
            <td width="119" align="left" valign="bottom"><span style="color:#FF0000">
			<?php echo $card['year'];?><?php if($card['year'] == 1) echo 'st'; elseif($card['year'] == 2) echo 'nd'; else echo 'rd';?>
              Yr | Roll No: <?php echo $card['roll'];?></span></td>
          </tr>
          <tr>
            <td align="left" valign="bottom">ID : <?php echo $card['student_id'];?></td>
          </tr>
          <tr>
            <td height="15" colspan="2"><?php echo $stream[0]['stream_name'];?> (<?php echo $card['subject1'];?>,<?php echo $card['subject2'];?>,<?php echo $card['subject3'];?>)</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="112" align="left" valign="top"><table width="98" border="1" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td width="98" height="105" align="center" valign="middle"><img src="http://dumkalcollege.org/ONLINE_APPLICATION/candidate/photo/<?php echo $card['student_image'];?>" alt="" width="96" height="120" /></td>
          </tr>
        </table></td>
        <td colspan="2" align="left" valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="131"><table border="1" cellpadding="0" cellspacing="0">
              <tr>
                <td width="100" height="14" align="center" valign="middle" bgcolor="#000000"><span style="color:#fff; font-size:10px;">STUDENT ID CARD</span> </td>
                </tr>
            </table></td>
            <td width="79"><span style="color:#FF0000">(Duplicate)</span></td>
          </tr>
          <tr>
            <td height="40" colspan="2" align="left" valign="bottom"><img src="<?php echo base_url();?>index.php/main/show_barcode/<?php echo $card['student_id'];?>" alt="" class="barcode" /></td>
          </tr> 
          <tr>
            <td colspan="2">Name : <?php echo $card['name'];?></td>
          </tr>
          <tr>
            <td colspan="2"><?php if($card['sex']=='M'){echo 'S';}else{echo 'D';}?>
              /O : <?php echo $card['father_name'];?></td>
          </tr>
          <tr>
            <td colspan="2">Address : <?php echo $card['vill'];?>, <?php echo $card['po'];?>, <?php echo $card['ps'];?></td>
          </tr>
          <tr>
            <td colspan="2">From <?php echo date('d-M-Y')?> To 30-Jun-<?php echo date('Y')?></td>
          </tr>
          </table></td>
      </tr>
      <tr>
        <td rowspan="2" align="center" valign="bottom"><img src="http://dumkalcollege.org/ONLINE_APPLICATION/candidate/sign/<?php echo $card['student_signature'];?>" alt="" width="88" height="21" /><br />
          Signature of Student</td>
        <td width="40" rowspan="2" align="left" valign="middle">&nbsp;</td>
        <td width="173" height="15">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="bottom">Signature of the Issuing Authority</td>
      </tr>
    </table></td>
  </tr>
</table>
    <?php if($i%21==0){?>
  <div class="page-breaker"></div>
  <div class="page-no-breaker"></div>
    <?php }} ?>
</div>
</body>
</html>