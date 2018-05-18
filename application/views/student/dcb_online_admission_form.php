<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dumkal College - Online Admission Form</title>
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
.style8 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.style10 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; text-transform:uppercase; }
.style12 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.style13 {font-size: 12px}
.style14 {font-size: 24px}
.style15 {font-size: 11px}
.style17 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="655" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="655" height="850" align="center" valign="top"><table width="640" border="1" cellspacing="0" cellpadding="2" style="border-collapse:collapse;">
      <tr>
        <td align="center" valign="middle"><img src="http://dumkalcollege.org/ONLINE_APPLICATION/assets/logo_dcb.jpg" width="117" height="88" align="absmiddle" /></td>
        <td colspan="3" align="center" valign="middle"><span class="style1"><span class="style2"><span class="style14">DUMKAL COLLEGE</span><br />
          </span></span><span class="style4"><span class="style2"><span class="style3">Affiliated to University of Kalyani<br />
              <strong>Website : www.dumkalcollege.org | Mail : dumkalcollege@gmail.com</strong></span></span></span></td>
        </tr>
      
      <tr>
        <td height="25" colspan="4" align="center" valign="middle"><table width="220" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="220" height="25" align="center" valign="middle"><span class="style5">ONLINE ADMISSION FORM</span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td height="60" colspan="2" rowspan="3" align="center" valign="middle"><table width="150" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
          <tr>
            <td width="150" height="165" align="center" valign="middle"><img src="http://dumkalcollege.org/ONLINE_APPLICATION/candidate/photo/<?php echo $aply_data[0]['student_image'];?>" style="max-width:120px;"></td>
          </tr>
        </table></td>
        <td height="30" colspan="2" align="center" valign="bottom" class="style14" style="color:#009900;"><?php echo $aply_data[0]['subject1'];?></td>
        </tr>
      <tr>
        <td height="15" colspan="2" align="center" valign="bottom" class="style2">Roll No : </td>
      </tr>
      <tr>
        <td height="15" colspan="2" align="center" valign="bottom"><table width="190" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
          <tr>
            <td width="190" height="60" align="center" valign="middle"><img src="http://dumkalcollege.org/ONLINE_APPLICATION/index.php/Admission/main/show_barcode/<?php echo $aply_data[0]['student_id'];?>" alt="" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="60" colspan="2" align="center" valign="middle"><table width="380" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
          <tr>
            <td width="380" height="50" align="center" valign="middle"><img src="http://dumkalcollege.org/ONLINE_APPLICATION/candidate/sign/<?php echo $aply_data[0]['student_signature'];?>" style="max-width:300px; max-height:40px;"></td>
          </tr>
        </table></td>
        <td height="60" colspan="2" align="center" valign="middle"><table width="190" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
          <tr>
            <td width="190" height="40" align="center" valign="middle"><span class="style17"><?php echo $aply_data[0]['student_id'];?></span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="139" height="20" align="left" valign="middle"><span class="style12">Admission ID</span></td>
        <td width="265" height="20" class="style10"><?php echo $aply_data[0]['student_id'];?></td>
        <td width="120" height="20"><span class="style12">Date of Admission</span></td>
        <td width="116" height="20" class="style10"><?php //echo $aply_data[0]['adm_date'];?></td>
      </tr>
      <tr>
        <td width="139" height="20" align="left" valign="middle"><span class="style12">Name of the Student</span></td>
        <td height="20" class="style10"><?php echo $aply_data[0]['name'];?></td>
        <td height="20" class="style12">Honours Subject</td>
        <td height="20" class="style10"><?php echo $sub_data[0]['subject_1'];?></td>
      </tr>
      <tr>
        <td width="139" height="20" align="left" valign="middle"><span class="style12">Date of Birth</span></td>
        <td width="265" height="20" class="style10"><?php echo $aply_data[0]['dob'];?></td>
        <td width="120" height="20"><span class="style12">Marital Status</span></td>
        <td width="116" height="20" class="style10"><?php echo $aply_data[0]['marital'];?></td>
      </tr>
      <tr>
        <td width="139" height="20" align="left" valign="middle"><span class="style12">Sex / Gender</span></td>
        <td width="265" height="20" class="style10"><?php echo $aply_data[0]['sex'];?></td>
        <td width="120" height="20"><span class="style12">Religion</span></td>
        <td width="116" height="20" class="style10"><?php echo $aply_data[0]['religion'];?></td>
      </tr>
      <tr>
        <td width="139" height="20" align="left" valign="middle"><span class="style12">Caste Category</span></td>
        <td width="265" height="20" class="style10"><?php echo $aply_data[0]['caste'];?></td>
        <td width="120" height="20"><span class="style12">Nationality</span></td>
        <td width="116" height="20" class="style10"><?php echo $aply_data[0]['nationality'];?></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle" class="style12">Phone / Mobile</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['candidate_phone'];?></td>
        <td height="20" class="style12">Minority (YES/NO)</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['minority'];?></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle"><span class="style12">Father's Name</span></td>
        <td height="20" class="style10"><?php echo $aply_data[0]['father_name'];?></td>
        <td height="20" class="style12">PH (YES/NO)</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['ph'];?></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle"><span class="style12">Mother's Name</span></td>
        <td height="20" class="style8"><span class="style10"><?php echo $aply_data[0]['mother_name'];?></span></td>
        <td height="20" class="style12">1st Gen Learner</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['first_get'];?></td>
      </tr>
      
      <tr>
        <td height="20" align="left" valign="middle" class="style12"><span class="style13">Vill / Street</span></td>
        <td height="20" class="style10"><?php echo $aply_data[0]['vill'];?></td>
        <td height="20" class="style12">District</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['dist'];?></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle" class="style12"><span class="style13">Post Office (PO)</span></td>
        <td height="20" class="style10"><?php echo $aply_data[0]['po'];?></td>
        <td height="20" class="style12">State</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['state'];?></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle" class="style12"><span class="style13">Police Station (PS)</span></td>
        <td height="20" class="style10"><?php echo $aply_data[0]['ps'];?></td>
        <td height="20" class="style12">Pincode</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['pin'];?></td>
      </tr>
      <tr>
        <td colspan="4" align="center" valign="middle" class="style12">
        <table width="620" border="1" cellpadding="2" cellspacing="0" style="border-collapse:collapse;">
<!--          <tr>
            <td height="15">HS Subjects</td>
            <td height="15" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_1'];?></td>
            <td height="15" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_2'];?></td>
            <td height="15" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_3'];?></td>
            <td height="15" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_4'];?></td>
            <td height="15" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_5'];?></td>
            <td height="15" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_6'];?></td>
          </tr>
          <tr>
            <td width="80" height="15">HS Number</td>
            <td width="90" height="15" align="center" valign="middle"><span class="style10"><?php echo $aply_data[0]['best_sub_1_total'];?></span></td>
            <td width="90" height="15" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_2_total'];?></td>
            <td width="90" height="15" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_3_total'];?></td>
            <td width="90" height="15" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_4_total'];?></td>
            <td width="90" height="15" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_5_total'];?></td>
            <?php if($aply_data[0]['best_sub_6']!=''){?>
            <td width="90" height="15" align="center" valign="middle"><?php echo $aply_data[0]['best_sub_6_total'];?></td><?php }?>
          </tr>
          <tr>
            <td height="15" colspan="2" align="right" valign="middle">Best 5 Marks</td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php echo $aply_data[0]['total_best_five_marks'];?></span></td>
            <td height="15" colspan="2" align="right" valign="middle">Effective Marks</td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php echo $aply_data[0]['total_hs_marks'];?></span></td>
            <?php if($aply_data[0]['best_sub_6']!=''){?><td height="15" align="center" valign="middle">&nbsp;</td><?php }?>
          </tr>
-->        </table></td>
        </tr>
      <tr>
        <td height="20" colspan="4" align="center" valign="middle" class="style12">SUJECT COMBINATION TAKEN</td>
        </tr>
      <tr>
        <td height="50" colspan="4" align="center" valign="middle"><table width="600" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
          <tr>
            <td height="20" align="center" valign="middle" class="style12">Hons / Gen Subject</td>
            <td height="20" align="center" valign="middle" class="style12">General Subject 1</td>
            <td height="20" align="center" valign="middle" class="style12">General Subject 2</td>
          </tr>
          <tr>
            <td width="150" height="20" align="center" valign="middle" class="style10"><?php echo $aply_data[0]['subject1'];?></td>
            <td width="150" height="20" align="center" valign="middle" class="style10"><?php echo $aply_data[0]['subject2'];?></td>
            <td width="150" height="20" align="center" valign="middle" class="style10"><?php echo $aply_data[0]['subject3'];?></td>
            
          </tr>
        </table></td>
        </tr>
      <tr>
        <td height="60" colspan="4" align="left" valign="middle">
            <span class="style15">Please Submit this form with the following documents within <strong>48 hours</strong> (except holidays) otherwise the <strong>admission will be treated as cancelled</strong>.<br />
1.     Self-attested photocopy of the HS or equivalent Marksheet.<br />
2.     Self-attested photocopy of the Madhyamik or equivalent Admit Card or Pass Certificate.<br />
3.     Self-attested photocopy of OBC-A/ OBC-B/ SC/ ST Caste Certificate, if any.<br />
4.     Self-attested photocopy of valid PH Certificate (within three years of original certification/ renewal), if any.<br />
5.     Original School Leaving Certificate./ TC (who took admission already in other college)<br /></span></td>
      </tr>
      <tr>
        <td height="45" colspan="2" align="left" valign="bottom" class="style12">Authorized Signature of the College with Seal</td>
        <td height="45" colspan="2" align="right" valign="bottom" class="style12">Signature of the Applicant</td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
