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
.style18 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 20px;
}
.style19 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 20px;
}
-->
</style>
</head>

<body>
<table width="655" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="655" height="850" align="center" valign="top"><table width="640" border="1" cellspacing="0" cellpadding="2" style="border-collapse:collapse;">
      <tr>
        <td align="center" valign="middle"><img src="<?php echo base_url();?>assets/logo_dcb.jpg" width="117" height="88" align="absmiddle" /></td>
        <td colspan="3" align="center" valign="middle"><span class="style1"><span class="style2"><span class="style14">DUMKAL COLLEGE</span><br />
          </span></span><span class="style4"><span class="style2"><span class="style3">Affiliated to University of Kalyani<br />
              <strong>Website : www.dumkalcollege.org | Mail : dumkalcollege@gmail.com</strong></span></span></span></td>
        </tr>
      
      <tr>
        <td height="40" colspan="4" align="center" valign="middle"><table width="450" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="220" height="30" align="center" valign="middle"><span class="style5">ONLINE 3RD YEAR FINAL ADMISSION FORM</span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td height="60" colspan="2" rowspan="3" align="center" valign="middle"><table width="150" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
          <tr>
            <td width="80" height="90" align="center" valign="middle"><img src="<?php echo base_url();?>candidate/photo/<?php echo $aply_data[0]['student_image'];?>" style="max-width:80px;"></td>
          </tr>
        </table></td>
        <td height="15" colspan="2" align="center" valign="bottom" class="style14" style="color:#009900;"><?php echo $aply_data[0]['subject1'];?></td>
        </tr>
      <tr>
        <td height="15" colspan="2" align="center" valign="bottom" class="style2">Roll No : </td>
      </tr>
      <tr>
        <td height="60" colspan="2" align="center" valign="bottom"><table width="190" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
          <tr>
            <td width="190" height="60" align="center" valign="middle"><img src="<?php echo base_url();?>index.php/Admission/main/show_barcode/<?php echo $aply_data[0]['student_id'];?>" alt="" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="60" colspan="2" align="center" valign="middle"><table width="380" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
          <tr>
            <td width="380" height="50" align="center" valign="middle"><img src="<?php echo base_url();?>candidate/sign/<?php echo $aply_data[0]['student_signature'];?>" style="max-width:300px; max-height:50px;"></td>
          </tr>
        </table></td>
        <td height="60" colspan="2" align="center" valign="middle"><table width="190" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
          <tr>
            <td width="190" height="40" align="center" valign="middle"><span class="style17"><?php echo $aply_data[0]['student_id'];?></span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="130" height="20" align="left" valign="middle"><span class="style12">Admission ID</span></td>
        <td width="231" height="20" class="style10"><?php echo $aply_data[0]['student_id'];?></td>
        <td width="135" height="20"><span class="style12">Date of Admission</span></td>
        <td width="110" height="20" class="style10"><?php echo $aply_data[0]['third_final_date'];?></td>
      </tr>
      <tr>
        <td width="130" height="20" align="left" valign="middle"><span class="style12">Name of the Student</span></td>
        <td height="20" class="style10"><?php echo $aply_data[0]['name'];?></td>
        <td height="20" class="style12">Hon/Gen Subject</td>
        <td height="20" class="style10"><?php echo $sub_data[0]['subject_1'];?></td>
      </tr>
      <tr>
        <td width="130" height="20" align="left" valign="middle"><span class="style12">Date of Birth</span></td>
        <td width="231" height="20" class="style10"><?php echo $aply_data[0]['dob'];?></td>
        <td width="135" height="20"><span class="style12">Marital Status</span></td>
        <td width="110" height="20" class="style10"><?php echo $aply_data[0]['marital'];?></td>
      </tr>
      <tr>
        <td width="130" height="20" align="left" valign="middle"><span class="style12">Sex / Gender</span></td>
        <td width="231" height="20" class="style10"><?php echo $aply_data[0]['sex'];?></td>
        <td width="135" height="20"><span class="style12">Religion</span></td>
        <td width="110" height="20" class="style10"><?php echo $aply_data[0]['religion'];?></td>
      </tr>
      <tr>
        <td width="130" height="20" align="left" valign="middle"><span class="style12">Caste Category</span></td>
        <td width="231" height="20" class="style10"><?php echo $aply_data[0]['caste'];?></td>
        <td width="135" height="20"><span class="style12">Nationality</span></td>
        <td width="110" height="20" class="style10"><?php echo $aply_data[0]['nationality'];?></td>
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
        <td height="20" align="left" valign="middle" class="style12">Registration Number</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['registration_no'];?></td>
        <td height="20" class="style12">Registration session</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['reg_year'];?></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle" class="style12">Roll Number 1st Year</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['roll1'];?></td>
        <td height="20" class="style12">Roll Number 2nd Year</td>
        <td height="20" class="style10"><?php echo $aply_data[0]['roll2'];?></td>
      </tr>
      <tr>
        <td colspan="4" align="center" valign="middle" class="style12">
        <table width="620" border="1" cellpadding="2" cellspacing="0" style="border-collapse:collapse;">
          <tr>
            <td width="100" height="15">1st Year Result</td>
            <td height="15" colspan="2" align="center" valign="middle"><span class="style10"><?php echo $res1->subject1_name;?></span></td>
            <td width="81" height="15" align="center" valign="middle"><?php  echo $res1->subject2_name;?></td>
            <td width="86" height="15" align="center" valign="middle"><?php  echo $res1->subject3_name;?></td>
            <td width="55" height="15" align="center" valign="middle"><?php  echo $res1->subject4_name;?></td>
            <td width="48" align="center" valign="middle"><?php  echo $res1->subject5_name;?></td>
            <td width="49" height="15" align="center" valign="middle"><?php  echo $res1->subject6_name;?></td>
          </tr>
          <tr>
            <td height="15">&nbsp;</td>
            <td width="54" height="15" align="center" valign="middle"><span class="style10"><?php echo $res1->subject1_part1_name;?></span></td>
            <td width="51" align="center" valign="middle"><span class="style10"><?php echo $res1->subject1_part2_name;?></span></td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php echo $res1->subject2_part1_name;?></span></td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php echo $res1->subject3_part1_name;?></span></td>
            <td height="15" align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td height="15" align="center" valign="middle">&nbsp;</td>
            </tr>
           <tr>
            <td height="15">&nbsp;</td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php echo $res1->subject1_part1_result;?></span></td>
            <td align="center" valign="middle"><span class="style10"><?php echo $res1->subject1_part2_result;?></span></td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php echo $res1->subject2_part1_result;?></span></td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php echo $res1->subject3_part1_result;?></span></td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php echo $res1->subject4_result;?></span></td>
            <td align="center" valign="middle"><span class="style10"><?php echo $res1->subject5_result;?></span></td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php echo $res1->subject6_result;?></span></td>
            </tr>
           <tr>
             <td height="15">&nbsp;</td>
             <td height="15" align="center" valign="middle">Practical</td>
             <td align="center" valign="middle"><?php echo $res1->subject1_practical_result;?></td>
             <td height="15" align="center" valign="middle">&nbsp;</td>
             <td height="15" align="center" valign="middle">&nbsp;</td>
             <td height="15" align="center" valign="middle">&nbsp;</td>
             <td align="center" valign="middle">&nbsp;</td>
             <td height="15" align="center" valign="middle">&nbsp;</td>
           </tr>
            <?php $pItot[] = $res1->subject1_part1_result+$res1->subject1_part2_result+$res1->subject2_part1_result+$res1->subject3_part1_result+$res1->subject4_result+$res1->subject5_result+$res1->subject6_result;?>
          <tr>
            <td height="15" colspan="3" align="right" valign="middle">Total</td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php echo array_sum($pItot);?></span></td>
            <td height="15" colspan="3" align="right" valign="middle">Result</td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php echo $res1->part1_result_data;?></span></td>
            <?php if($res1->part1_result_data=='XS'){?><td width="40" height="15" align="center" valign="middle" > <?php echo $res1->supplementry;?></td>
            <?php }?>
          </tr>
        </table>
        <table width="620" border="1" cellpadding="2" cellspacing="0" style="border-collapse:collapse;">
          <tr>
            <td height="15">2nd Year Result</td>
            <td height="15" colspan="2" align="center" valign="middle"><span class="style10"><?php  echo $res2->subject7_name;?></span></td>
            <td height="15" colspan="2" align="center" valign="middle"><span class="style10"><?php  echo $res2->subject8_name;?></span></td>
            <td height="15" colspan="2" align="center" valign="middle"><span class="style10"><?php  echo $res2->subject9_name;?></span></td>
          </tr>
          <tr>
            <td height="15">&nbsp;</td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php  echo $res2->subject7_part1_name;?></span></td>
            <td align="center" valign="middle"><span class="style10"><?php  echo $res2->subject7_part2_name;?></span></td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php  echo $res2->subject8_part1_name;?></span></td>
            <td align="center" valign="middle"><span class="style10"><?php  echo $res2->subject8_part2_name;?></span></td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php  echo $res2->subject9_part1_name;?></span></td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php  echo $res2->subject9_part2_name;?></span></td>
          </tr>
           <tr>
            <td height="15">&nbsp;</td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php  echo $res2->subject7_part1_result;?></span></td>
            <td align="center" valign="middle"><span class="style10"><?php  echo $res2->subject7_part2_result;?></span></td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php  echo $res2->subject8_part1_result;?></span></td>
            <td align="center" valign="middle"><span class="style10"><?php  echo $res2->subject8_part2_result;?></span></td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php  echo $res2->subject9_part1_result;?></span></td>
            <td height="15" align="center" valign="middle"><span class="style10"><?php  echo $res2->subject9_part2_result;?></span></td>
          </tr>
           <tr>
             <td height="15">&nbsp;</td>
             <td height="15" align="center" valign="middle">Practical</td>
             <td align="center" valign="middle"><?php  echo $res2->subject7_practical_result;?></td>
             <td height="15" align="center" valign="middle">Practical</td>
             <td align="center" valign="middle"><?php  echo $res2->subject8_practical_result;?></td>
             <td height="15" align="center" valign="middle">practical</td>
             <td height="15" align="center" valign="middle"><?php  echo $res2->subject9_practical_result;?></td>
           </tr>
           <?php $pIItot[] = $res2->subject7_part1_result+$res2->subject7_part2_result+$res2->subject8_part1_result+$res2->subject8_part2_result+$res2->subject9_part1_result+$res2->subject9_part2_result;?>
          <tr>
            <td height="15" colspan="3" align="right" valign="middle">Total</td>
            <td height="15" colspan="2" align="center" valign="middle"><span class="style10"><?php echo array_sum($pIItot);?></span></td>
            <td width="86" height="15" align="right" valign="middle">Result</td>
            <td width="90" height="15" align="center" valign="middle"><span class="style10"><?php echo $res2->part2_result_data;?></span></td>
            <?php if($res2->part2_result_data=='XS'){?><td width="81" height="15" align="center" valign="middle"><?php echo $res2->part2_supple;?></td><?php }?>
          </tr>
        </table>
        </td>
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
        <td height="20" colspan="4" align="left" valign="middle"><span class="style12">Documents Required:</span><span class="style8"><br />
            <span class="style15">1. Self-attested photocopy of Part 1 and Part 2 Admit.</span></td>
      </tr>
      <tr>
        <td height="40" colspan="2" align="left" valign="bottom" class="style12">Authorized Signature of the College with Seal</td>
        <td height="40" colspan="2" align="right" valign="bottom" class="style12">Signature of the Applicant</td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
