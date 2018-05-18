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
.style2 {font-size: 16px}
.style3 {font-size: 14px}
.style4 {font-family: Arial, Helvetica, sans-serif}
.style5 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
.style8 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.style10 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; text-transform:uppercase; }
.style12 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.style13 {font-size: 12px}
.style14 {font-size: 24px}
-->
</style>
</head>

<body>
<table width="655" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="655" align="center" valign="top"><table width="640" border="1" cellspacing="0" cellpadding="2" style="border-collapse:collapse;">
      <tr>
        <td align="center" valign="middle"><img src="<?php echo base_url();?>assets/logo_dcb.jpg" width="117" height="75" align="absmiddle" /><br/><img src="<?php echo base_url();?>index.php/Admission/main/show_barcode/<?php echo $aply_data[0]['apply_form_number'];?>" alt="" /></td>
        <td colspan="3" align="center" valign="middle"><span class="style1"><span class="style2"><span class="style14">DUMKAL COLLEGE</span><br />
          </span></span><span class="style4"><span class="style2"><span class="style3">Affiliated to University of Kalyani<br />
              <strong>Website : www.dumkalcollege.org | Mail : dumkalcollege@gmail.com</strong></span></span></span></td>
        </tr>
      
      <tr>
        <td height="60" colspan="4" align="center" valign="middle"><table width="380" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="370" height="30" align="center" valign="middle"><span class="style5"><?php echo $aply_data[0]['stream_name'];?>, 2017 ONLINE APPLICATION FORM</span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="139" height="22" align="left" valign="middle"><span class="style12">Application ID</span></td>
        <td width="265" height="22" class="style10"><?php echo $aply_data[0]['apply_form_number'];?></td>
        <td width="120" height="22"><span class="style12">Date of Application</span></td>
        <td width="116" height="22" class="style10"><?php echo $aply_data[0]['adate'];?></td>
      </tr>
      <tr>
        <td width="139" height="22" align="left" valign="middle"><span class="style12">Name of the Student</span></td>
        <td height="22" class="style10"><?php echo $aply_data[0]['name'];?></td>
        <td height="22" class="style12">PH</td>
        <td height="22" class="style10"><?php if($aply_data[0]['ph'] == 0) echo 'NO ('.$aply_data[0]['ph_score'].'%)'; else echo 'YES ('.$aply_data[0]['ph_score'].'%)';?></td>
      </tr>
      <tr>
        <td width="139" height="22" align="left" valign="middle"><span class="style12">Date of Birth</span></td>
        <td width="265" height="22" class="style10"><?php echo $aply_data[0]['dob'];?></td>
        <td width="120" height="22"><span class="style12">Marital Status</span></td>
        <td width="116" height="22" class="style10"><?php echo $aply_data[0]['marital'];?></td>
      </tr>
      <tr>
        <td width="139" height="22" align="left" valign="middle"><span class="style12">Sex / Gender</span></td>
        <td width="265" height="22" class="style10"><?php echo $aply_data[0]['sex'];?></td>
        <td width="120" height="22"><span class="style12">Religion</span></td>
        <td width="116" height="22" class="style10"><?php echo $aply_data[0]['religion'];?></td>
      </tr>
      <tr>
        <td width="139" height="22" align="left" valign="middle"><span class="style12">Caste Category</span></td>
        <td width="265" height="22" class="style10"><?php echo $aply_data[0]['caste'];?></td>
        <td width="120" height="22"><span class="style12">Nationality</span></td>
        <td width="116" height="22" class="style10"><?php if($aply_data[0]['nationality'] != 'INDIAN') echo $aply_data[0]['nationality_name']; else echo $aply_data[0]['nationality'];?></td>
      </tr>
      <tr>
        <td height="22" align="left" valign="middle" class="style12">Phone / Mobile</td>
        <td height="22" class="style10"><?php echo $aply_data[0]['phn'];?></td>
        <td height="22" class="style12">Minority</td>
        <td height="22" class="style10"><?php echo $aply_data[0]['minority'];?></td>
      </tr>
      <tr>
        <td height="22" align="left" valign="middle"><span class="style12">Father's Name</span></td>
        <td height="22" class="style10"><?php echo $aply_data[0]['father_name'];?></td>
        <td height="22" class="style12">1st Gen Learner</td>
        <td height="22" class="style10"><?php echo $aply_data[0]['first_get'];?></td>
      </tr>
      <tr>
        <td height="22" align="left" valign="middle"><span class="style12">Mother's Name</span></td>
        <td height="22" class="style8"><span class="style10"><?php echo $aply_data[0]['mother_name'];?></span></td>
        <td height="22" class="style12">Guardian's Name</td>
        <td height="22" class="style10"><?php if($aply_data[0]['g_name'] == 'do' && $aply_data[0]['g_rltn'] == 'Father') { echo $aply_data[0]['father_name'];} elseif($aply_data[0]['g_name'] == 'do' && $aply_data[0]['g_rltn'] == 'Mother') { echo $aply_data[0]['mother_name'];} else echo $aply_data[0]['g_name']; ?></td>
      </tr>
      <tr>
        <td height="25" align="left" valign="middle"><span class="style12">Guardian's Phone</span></td>
        <td height="25" class="style8"><span class="style10"><?php echo $aply_data[0]['g_phn'];?></span></td>
        <td height="25" class="style12">Guardian's Relationship</td>
        <td height="25" class="style10"><?php echo $aply_data[0]['g_rltn'];?></td>
      </tr>
      <tr>
        <td height="25" colspan="4" align="left" valign="middle" class="style12">PERMANENT ADDRESS :</td>
        </tr>
      <tr>
        <td height="20" align="left" valign="middle" class="style12"><span class="style13">Vill / Street</span></td>
        <td height="20" class="style10"><?php echo $aply_data[0]['per_vill'];?></td>
        <td height="20" class="style12">District</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['per_dist'];?></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle" class="style12"><span class="style13">Post Office (PO)</span></td>
        <td height="20" class="style10"><?php echo $aply_data[0]['per_po'];?></td>
        <td height="20" class="style12">State</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['per_state'];?></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle" class="style12"><span class="style13">Police Station (PS)</span></td>
        <td height="20" class="style10"><?php echo $aply_data[0]['per_ps'];?></td>
        <td height="20" class="style12">Pincode</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['per_pin'];?></td>
      </tr>
      <tr>
        <td height="10" colspan="4" align="left" valign="middle">&nbsp;</td>
        </tr>
      <tr>
        <td height="20" align="left" valign="middle" class="style12">Last Exam Passed</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['last_exam_name'];?></td>
        <td height="20" class="style12">Year of Passing</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['last_exam'];?></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle" class="style12">School / College</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['school_name'];?></td>
        <td height="20" class="style12"><span class="style13">Index / Roll No</span></td>
        <td height="20" class="style10"><?php echo $aply_data[0]['school_roll'];?></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle" class="style12">Registration No</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['school_reg'];?></td>
        <td height="20" class="style12"><span class="style13">Grade / Division</span></td>
        <td height="20" class="style10"><?php echo $aply_data[0]['school_grade'];?></td>
      </tr>
      <tr>
        <td height="100" colspan="4" align="center" valign="middle" class="style12">
        <table width="620" border="1" cellpadding="2" cellspacing="0" style="border-collapse:collapse;">
          <tr>
            <td width="80" height="20">HS Subjects</td>
            <td width="90" height="20" align="center" valign="middle"><span class="style10"><?php echo $aply_data[0]['best_sub_1'];?></span></td>
            <td width="90" height="20" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_2'];?></td>
            <td width="90" height="20" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_3'];?></td>
            <td width="90" height="20" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_4'];?></td>
            <td width="90" height="20" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_5'];?></td>
            <?php if($aply_data[0]['best_sub_6']!=''){?>
            <td width="90" height="20" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_6'];?></td><?php }?>
          </tr>
          <tr>
            <td width="80" height="20">Number</td>
            <td width="90" height="20" align="center" valign="middle"><span class="style10"><?php echo $aply_data[0]['best_sub_1_total'];?></span></td>
            <td width="90" height="20" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_2_total'];?></td>
            <td width="90" height="20" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_3_total'];?></td>
            <td width="90" height="20" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_4_total'];?></td>
            <td width="90" height="20" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_5_total'];?></td>
            <?php if($aply_data[0]['best_sub_6']!=''){?>
            <td width="90" height="20" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_6_total'];?></td><?php }?>
          </tr>
          <tr>
            <td height="20" colspan="2" align="right" valign="middle">Best 5 Marks</td>
            <td height="20" align="center" valign="middle"><span class="style10"><?php echo $aply_data[0]['total_best_five_marks'];?></span></td>
            <td height="20" colspan="2" align="right" valign="middle">Effective Marks</td>
            <td height="20" align="center" valign="middle"><span class="style10"><?php echo $aply_data[0]['total_hs_marks'];?></span></td>
            <?php if($aply_data[0]['best_sub_6']!=''){?><td height="20" align="center" valign="middle">&nbsp;</td><?php }?>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td height="40" colspan="4" align="center" valign="middle" class="style12">SUBJECT COMBINATION TAKEN</td>
      </tr>
      <tr>
        <td height="80" colspan="4" align="center" valign="middle"><table width="600" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
          <tr>
            <td height="30" align="center" valign="middle" class="style12">Hons / Gen Subject</td>
            <td height="30" align="center" valign="middle" class="style12">General Subject 1</td>
            <td height="30" align="center" valign="middle" class="style12">General Subject 2</td>
            
          </tr>
          <tr>
            <td width="150" height="30" align="center" valign="middle" class="style10"><?php echo $aply_data[0]['subject1'];?></td>
            <td width="150" height="30" align="center" valign="middle" class="style10"><?php echo $aply_data[0]['subject2'];?></td>
            <td width="150" height="30" align="center" valign="middle" class="style10"><?php echo $aply_data[0]['subject3'];?></td>
            
          </tr>
        </table></td>
        </tr>
      <tr>
        <td height="90" colspan="2" align="left" valign="bottom" class="style12">Authorized Signature of the College with Seal</td>
        <td height="90" colspan="2" align="right" valign="bottom" class="style12">Signature of the Applicant</td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
