<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=admission_status.xls");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Detailed Statement - Admission <?php echo $session;?> - Dumkal College</title>
<style type="text/css">
<!--
.style3 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.style5 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	/* Safari */
-webkit-transform: rotate(-90deg);
	/* Firefox */
-moz-transform: rotate(-90deg);
	/* IE */
-ms-transform: rotate(-90deg);
	/* Opera */
-o-transform: rotate(-90deg);

/* Internet Explorer */
filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
	font-weight: bold;
} 
.style8 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.style10 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 14px; }
.style11 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; width:auto;}
.style12 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold; 	padding:0px;
	height:auto;
	width:auto; }
.style13 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold; 	padding:0px;
	height:auto;
	width:auto;}
.style14 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style15 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; 	padding:0px;
	height:auto;
	width:auto; }
.style16 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style17 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style18 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style19 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style20 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold; 	padding:0px;
	height:auto;
	width:auto; }
.style21 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold; 	padding:0px;
	height:auto;
	width:auto; }
.style22 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style23 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style24 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style25 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold; 	padding:0px;
	height:auto;
	width:auto;}
.style26 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style27 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style28 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style29 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style30 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style31 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold; 	padding:0px;
	height:auto;
	width:auto;}
.style32 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style33 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style34 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style35 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style36 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style37 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style38 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style39 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style40 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style41 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style42 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold; 	padding:0px;
	height:auto;
	width:auto;}
.style43 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style44 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style45 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style46 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style47 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style48 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style49 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style50 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold; 	padding:0px;
	height:auto;
	width:auto;}
.style51 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold; 	padding:0px;
	height:auto;
	width:auto;}
.style52 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style53 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold; 	padding:0px;
	height:auto;
	width:auto;}
.style54 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style55 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style56 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); font-weight: bold;	padding:0px;
	height:auto;
	width:auto; }
.style57 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	font-weight: bold;	padding:0px;
	height:auto;
	width:auto;
}
-->
</style>
</head>

<body>
<?php if(($app=='Y')&&(($adm=='Y')&&($vac=='Y'))){$width='1400';}
else if((($app=='Y')&&(($adm=='Y'))||(($app=='Y')&&(($vac=='Y'))||(($adm=='Y')&&(($vac=='Y')))))){$width='1000';}?>
<table  border="1" align="center" cellpadding="1" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;width:auto;">
  <tr>
    <td height="50" colspan="35" align="center" valign="middle"><span class="style57">Detailed Statement regarding 1st year B.A B.Sc &amp; B.Com (Hons &amp; General) Admission <?php echo $session;?></span></td>
  </tr>
  <tr>
    <td width="12">&nbsp;</td>
    <td width="52">&nbsp;</td>
    <?php if($app=='Y'){?>
    <td colspan="11" align="center" valign="middle" class="style8"><span class="style10">Total Application Received</span></td>
    <?php }?>
    <?php if($adm=='Y'){?>
    <td colspan="11" align="center" valign="middle" class="style8"><span class="style10">Admission Taken</span></td>
    <?php }?>
    <?php if($vac=='Y'){?>
    <td colspan="11" align="center" valign="middle" class="style8"><span class="style10">Seats Vacant</span></td>
    <?php }?>
  </tr>
  <tr>
    <td height="80" align="center" valign="middle" class="style11">Sl#</span></td>
    <td height="80" align="center" valign="middle" bgcolor="#CCCCCC" class="style11">Subjects</span></td>
    <?php if($app=='Y'){?>
    <td width="24" height="80" align="center" valign="middle" class="style12">Gen</span></td>
    <td width="17" height="80" align="center" valign="middle" class="style13">SC (22%)</span></td>
    <td width="15" height="80" align="center" valign="middle" class="style14">ST (16%)</span></td>
    <td width="34" height="80" align="center" valign="middle" class="style15">OBCA (10%)</span></td>
    <td width="35" height="80" align="center" valign="middle" class="style16">OBCB (7%)</span></td>
    <td width="48" height="80" align="center" valign="middle" class="style17">PH(Gen) (3%)</span></td>
    <td width="42" height="80" align="center" valign="middle" class="style18">PH(SC)</span></td>
    <td width="40" height="80" align="center" valign="middle" class="style19">PH(ST)</span></td>
    <td width="30" height="80" align="center" valign="middle" class="style20">PH(OBCA)</span></td>
    <td width="59" height="80" align="center" valign="middle" class="style21">PH(OBCB)</td>
    <td width="42" height="80" align="center" valign="middle" class="style22">GRAND TOTAL</td>
    <?php }?>
    <?php if($adm=='Y'){?>
    <td width="23" height="80" align="center" valign="middle" class="style23">Gen</span></td>
    <td width="17" height="80" align="center" valign="middle" class="style24">SC <span class="style46">(22%)</span></span></span></td>
    <td width="15" height="80" align="center" valign="middle" class="style25">ST <span class="style47">(16%)</span></span></td>
    <td width="33" height="80" align="center" valign="middle" class="style26"><span class="style48">OBCA (10%)</span></span></td>
    <td width="34" height="80" align="center" valign="middle" class="style27"><span class="style49">OBCB (7%)</span></span></td>
    <td height="80" align="center" valign="middle" class="style17">PH(Gen) (3%)</span></td>
    <td height="80" align="center" valign="middle" class="style18">PH(SC)</span></td>
    <td height="80" align="center" valign="middle" class="style19">PH(ST)</span></td>
    <td height="80" align="center" valign="middle" class="style20">PH(OBCA)</span></td>
    <td height="80" align="center" valign="middle" class="style21">PH(OBCB)</td>
    <td width="37" height="80" align="center" valign="middle" class="style33"><span class="style44">GRAND TOTAL</span></td>
    <?php }?>
    <?php if($vac=='Y'){?>
    <td width="76" height="80" align="center" valign="middle" class="style34">Gen</span></td>
    <td width="1" height="80" align="center" valign="middle" class="style35"><span class="style53">SC <span class="style54">(22%)</span></span></span></span></span></td>
    <td width="1" height="80" align="center" valign="middle" class="style36"><span class="style55">ST <span class="style56">(16%)</span></span></span></span></td>
    <td width="1" height="80" align="center" valign="middle" class="style37"><span class="style51"><span class="style52">OBCA (10%)</span></span></span></span></td>
    <td width="1" height="80" align="center" valign="middle" class="style38"><span class="style50">OBCB (7%)</span></span></span></td>
    <td height="80" align="center" valign="middle" class="style17">PH(Gen) (3%)</span></td>
    <td height="80" align="center" valign="middle" class="style18">PH(SC)</span></td>
    <td height="80" align="center" valign="middle" class="style19">PH(ST)</span></td>
    <td height="80" align="center" valign="middle" class="style20">PH(OBCA)</span></td>
    <td height="80" align="center" valign="middle" class="style21">PH(OBCB)</td>
    <td width="19" height="80" align="center" valign="middle" class="style5"><span class="style45">GRAND TOTAL</span></td>
    <?php }?>
  </tr>
  <?php
$streams = $this->db->query("select td_subject_group.*,td_student_stream.stream_name from td_subject_group inner join td_student_stream on td_student_stream.stream_id=td_subject_group.stream_id")->result();

	$s=1; 
foreach($streams as $stream) { 
$g_id = $stream->grp_id;
$cat_wise_seat = $this->db->query("select * from td_student_intake where grp_id=$g_id")->row();

$gen_admit = $this->db->query("select * from td_student_application where group_id=$g_id and merit_type='GEN' and adm_pay_stat>0 and cancel=0")->num_rows();
$gen_ph_admit = $this->db->query("select * from td_student_application where group_id=$g_id and merit_type='GEN_PH' and adm_pay_stat>0 and cancel=0")->num_rows();
$sc_admit = $this->db->query("select * from td_student_application where group_id=$g_id and merit_type='SC' and adm_pay_stat>0 and cancel=0")->num_rows();
$sc_ph_admit = $this->db->query("select * from td_student_application where group_id=$g_id and merit_type='SC_PH' and adm_pay_stat>0 and cancel=0")->num_rows();
$st_admit = $this->db->query("select * from td_student_application where group_id=$g_id and merit_type='ST' and adm_pay_stat>0 and cancel=0")->num_rows();
$st_ph_admit = $this->db->query("select * from td_student_application where group_id=$g_id and merit_type='ST_PH' and adm_pay_stat>0 and cancel=0")->num_rows();
$obca_admit = $this->db->query("select * from td_student_application where group_id=$g_id and merit_type='OBC-A' and adm_pay_stat>0 and cancel=0")->num_rows();
$obca_ph_admit = $this->db->query("select * from td_student_application where group_id=$g_id and merit_type='OBC-A_PH' and adm_pay_stat>0 and cancel=0")->num_rows();
$obcb_admit = $this->db->query("select * from td_student_application where group_id=$g_id and merit_type='OBC-B' and adm_pay_stat>0 and cancel=0")->num_rows();
$obcb_ph_admit = $this->db->query("select * from td_student_application where group_id=$g_id and merit_type='OBC-B_PH' and adm_pay_stat>0 and cancel=0")->num_rows();


$gen_apply = $this->db->query("select * from td_student_application where group_id=$g_id and application_pay_atat>0")->num_rows();
$gen_ph_apply = $this->db->query("select * from td_student_application where group_id=$g_id and td_student_application.ph=1  and td_student_application.ph_score>0 and application_pay_atat>0")->num_rows();
$sc_apply = $this->db->query("select * from td_student_application where group_id=$g_id and caste='SC' and application_pay_atat>0")->num_rows();
$sc_ph_apply = $this->db->query("select * from td_student_application where group_id=$g_id and caste='SC' and td_student_application.ph=1  and td_student_application.ph_score>0 and application_pay_atat>0")->num_rows();
$st_apply = $this->db->query("select * from td_student_application where group_id=$g_id and caste='ST' and application_pay_atat>0")->num_rows();
$st_ph_apply = $this->db->query("select * from td_student_application where group_id=$g_id and caste='ST' and td_student_application.ph=1  and td_student_application.ph_score>0 and application_pay_atat>0")->num_rows();
$obca_apply = $this->db->query("select * from td_student_application where group_id=$g_id and caste='OBC-A' and application_pay_atat>0")->num_rows();
$obca_ph_apply = $this->db->query("select * from td_student_application where group_id=$g_id and caste='OBC-A' and td_student_application.ph=1  and td_student_application.ph_score>0 and application_pay_atat>0")->num_rows();
$obcb_apply = $this->db->query("select * from td_student_application where group_id=$g_id and caste='OBC-B' and application_pay_atat>0")->num_rows();
$obcb_ph_apply = $this->db->query("select * from td_student_application where group_id=$g_id and caste='OBC-B' and td_student_application.ph=1  and td_student_application.ph_score>0 and application_pay_atat>0")->num_rows();

        $vaca_gen = ($cat_wise_seat->gen-$gen_admit);
		$vaca_gen_ph = ($cat_wise_seat->gen_ph-$gen_ph_admit);
		$vaca_sc = ($cat_wise_seat->sc-$sc_admit);
		$vaca_sc_ph = ($cat_wise_seat->sc_ph-$sc_ph_admit);
		$vaca_st = ($cat_wise_seat->st-$st_admit);
		$vaca_st_ph = ($cat_wise_seat->st_ph-$st_ph_admit);
		$vaca_obca = ($cat_wise_seat->obc_a-$obca_admit);
		$vaca_obca_ph = ($cat_wise_seat->obc_a_ph-$obca_ph_admit);
		$vaca_obcb = ($cat_wise_seat->obc_b-$obcb_admit);
		$vaca_obcb_ph = ($cat_wise_seat->obc_b_ph-$obcb_ph_admit);
?>
  <tr>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $s++;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php if(($stream->stream_name=='B.A Gen') || ($stream->stream_name=='B.Com Gen') || ($stream->stream_name=='B.Sc Gen')) { echo $stream->stream_name." (".$stream->subject_1.")"; } else { echo $stream->stream_name." in ".$stream->subject_1; } ?></td>
    <?php if($app=='Y'){?>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $gen_apply; ?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $sc_apply; ?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $st_apply; ?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $obca_apply; ?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $obcb_apply; ?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $gen_ph_apply; ?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $sc_ph_apply; ?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $st_ph_apply; ?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $obca_ph_apply; ?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $obcb_ph_admit; ?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo ($gen_apply+$gen_ph_apply+$sc_apply+$sc_ph_apply+$st_apply+$st_ph_apply+$obca_apply+$obca_ph_apply+$obcb_apply+$obcb_ph_apply);?></td>
    <?php }?>
    <?php if($adm=='Y'){?>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $gen_admit;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $sc_admit;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $st_admit;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $obca_admit;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $obcb_admit;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $gen_ph_admit;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $sc_ph_admit;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $st_ph_admit;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $obca_ph_admit;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $obcb_ph_admit;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo ($gen_admit+$gen_ph_admit+$sc_admit+$sc_ph_admit+$st_admit+$st_ph_admit+$obca_admit+$obca_ph_admit+$obcb_admit+$obcb_ph_admit);?></td>
    <?php }?>
    <?php if($vac=='Y'){?>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $vaca_gen;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $vaca_sc;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $vaca_st;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $vaca_obca;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $vaca_obca;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $vaca_gen_ph;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $vaca_sc_ph;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $vaca_st_ph;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $vaca_obca_ph;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo $vaca_obcb_ph;?></td>
    <td height="22" align="center" valign="middle" class="style3"><?php echo ($vaca_gen+$vaca_gen_ph+$vaca_sc+$vaca_sc_ph+$vaca_st+$vaca_st_ph+$vaca_obca+$vaca_obca_ph+$vaca_obcb+$vaca_obcb_ph);?></td>
    <?php }?>
  </tr>
  <?php }?>
</table>
</body>
</html>
