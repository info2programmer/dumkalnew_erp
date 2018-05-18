<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dumkal College - Online Application Form</title>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style2 {font-size: 18px}
.style3 {font-size: 14px}
.style4 {font-family: Arial, Helvetica, sans-serif}
.style5 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
.style10 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; text-transform:uppercase; }
.style12 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.style14 {font-size: 24px}
.style15 {
	font-size: 11px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
</head>

<body>
<table width="655" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="655" height="850" align="center" valign="top"><table width="640" border="1" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
      <tr>
        <td align="center" valign="middle"><img src="<?php echo base_url();?>assets/logo_dcb.jpg" width="117" height="88" align="absmiddle" /><br/><img src="<?php echo base_url();?>index.php/Admission/main/show_barcode/<?php echo $aply_data[0]['apply_form_number'];?>" alt="" /></td>
        <td colspan="3" align="center" valign="middle"><span class="style1"><span class="style2"><span class="style14">DUMKAL COLLEGE</span><br />
          </span></span><span class="style4"><span class="style2"><span class="style3">Affiliated to University of Kalyani<br />
              <strong>Website : www.dumkalcollege.org | Mail : dumkalcollege@gmail.com</strong></span></span></span></td>
        </tr>
      
      <tr>
        <td height="60" colspan="4" align="center" valign="middle"><table width="220" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="220" height="30" align="center" valign="middle"><span class="style5">ELECTRONIC RECEIPT</span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="139" height="25" align="left" valign="middle"><span class="style12">Receipt Number</span></td>
        <td width="265" height="25" class="style10"><?php echo $aply_data[0]['aply_id'];?></td>
        <td width="120" height="25"><span class="style12">Date of Payment</span></td>
        <td width="116" height="25" class="style10"><?php echo $aply_data[0]['adate'];?></td>
      </tr>
      <tr>
        <td width="139" height="25" align="left" valign="middle"><span class="style12">Name of the Student</span></td>
        <td height="25" class="style10"><?php echo $aply_data[0]['name'];?></td>
        <td height="25" class="style12">Transaction ID</td>
        <td height="25" class="style10"><?php echo $aply_data[0]['application_tran_no'];?></td>
      </tr>
      <tr>
        <td width="139" height="25" align="left" valign="middle"><span class="style12">Amount Received</span></td>
        <td width="265" height="25" class="style10">Rs. 100.00</td>
        <td width="120" height="25"><span class="style12">Bank Name</span></td>
        <td width="116" height="25" class="style10">Axis bank</td>
      </tr>
      <tr>
        <td width="139" height="25" align="left" valign="middle"><span class="style12">Towards</span></td>
        <td height="25" colspan="3" class="style10">online application for <?php echo $stu_data[0]['stream_name']." (".$aply_data[0]['subject1'].")";?></td>
        </tr>
      <tr>
        <td height="25" colspan="4" align="left" valign="middle"><span class="style15">This is a system generated receipt and does not require signature.</span></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
