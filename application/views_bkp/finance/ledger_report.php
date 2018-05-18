<?php 
//print_r($ledgerdata_details);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ledger - College_Fund</title>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 24px;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 18px;
}
.style3 {
	font-size: 24px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style5 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
.style6 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
</head>

<body>
<table width="1587" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="1134" align="center" valign="top"><br />
      <span class="style1">DUMKAL COLLEGE BASANTAPUR</span><br />
      <br />
      <span class="style2">DEBIT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3">LEDGER</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CREDIT </span><br />
      <br />
      <span class="style4">Account of : <u><?php echo $fee_name[0]['name']?></u></span><br />
      <br />
      <table width="750" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse; border-top:2px solid #000000; float: right;">
        <tr>
          <td width="80" rowspan="2" align="center" valign="middle" class="style5">Month</td>
          <td width="40" rowspan="2" align="center" valign="middle" class="style5">Date</td>
          <td width="215" rowspan="2" align="center" valign="middle" class="style5">Particulars</td>
          <td width="60" rowspan="2" align="center" valign="middle" class="style5">C.B.F.</td>
          <td height="18" colspan="2" align="center" valign="middle" class="style5">Amount</td>
          <td height="18" colspan="2" align="center" valign="middle" class="style5">Amount</td>
        </tr>
        <tr>
          <td width="120" height="18" align="center" valign="middle" class="style5">Rs.</td>
          <td width="50" height="18" align="center" valign="middle" class="style5">P.</td>
          <td width="120" height="18" align="center" valign="middle" class="style5">Rs.</td>
          <td width="47" height="18" align="center" valign="middle" class="style5">P.</td>
        </tr>

 <?php foreach($ledgerdata as $ldata1) {
   $ledgerdata_details=$this->db->query("select * from `td_fee_subfunds` WHERE  `sub_date` between '".$d11."' and '".$d22."' and `fee_head_id`='".$fee_id."' and `type`='Credit' and `sub_date`='".$ldata1['sub_date']."' order by sub_date asc")->result_array();
    $ledgerdata_perm=$this->db->query("select sum(amount) as stamount from `td_fee_subfunds` WHERE  `sub_date` between '".$d11."' and '".$d22."' and `fee_head_id`='".$fee_id."' and `type`='Credit' and `sub_date`='".$ldata1['sub_date']."'")->result_array();
	$i=1;
  foreach($ledgerdata_details as $ldata) {
    $exp_date = explode('-',$ldata['sub_date']);
	$sel_cbf1=$this->db->query('select * from td_fee_collection where fee_id='.$ldata['fee_id'].'')->row();	
  ?>
        <tr>
          <td height="25" align="center" valign="middle" class="style6"><?php echo date("F", strtotime($ldata['sub_date']));?></td>
          <td height="25" align="center" valign="middle" class="style6"><?php echo date("d", strtotime($ldata['sub_date']));?></td>
          <td height="25" align="center" valign="middle" class="style6">BY BANK</td>
          <td height="25" align="center" valign="middle" class="style6"><?php echo $sel_cbf1->cb_no;?></td>
          <td height="25" align="center" valign="middle" class="style6"><?php echo $ldata['amount'];?></td>
          <td height="25" align="center" valign="middle" class="style6"><?php //echo $examtd[1];?></td>
          <td height="25" align="center" valign="middle" class="style6">&nbsp;</td>
          <td height="25" align="center" valign="middle" class="style6">&nbsp;</td>
        </tr>
		<?php }?>
		 <tr>
          <td height="25" align="center" valign="middle" class="style6"></td>
          <td height="25" align="center" valign="middle" class="style6"></td>
          <td height="25" align="center" valign="middle" class="style6"></td>
          <td height="25" align="center" valign="middle" class="style6"></td>
          <td height="25" align="center" valign="middle" class="style6"></td>
          <td height="25" align="center" valign="middle" class="style6"></td>
          <td height="25" align="center" valign="middle" class="style6"><?php echo $ledgerdata_perm[0]['stamount'];?></td>
          <td height="25" align="center" valign="middle" class="style6"><?php //echo $examt1[1];?></td>
        </tr>
	<?php }?>
         <tr>
          <td height="25" colspan="6" align="left" valign="middle"><span class="style5">Grand Total</span></td>
          <td height="25" align="center" valign="middle" class="style6"><?php echo $ledgerdata_tot[0]['tamount'];?></td>
          <td height="25" align="center" valign="middle" class="style6">00</td>
        </tr>
      </table>
      <table width="750" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse; border-top:2px solid #000000;  float: left;">
        <tr>
          <td width="80" rowspan="2" align="center" valign="middle" class="style5">Month</td>
          <td width="40" rowspan="2" align="center" valign="middle" class="style5">Date</td>
          <td width="215" rowspan="2" align="center" valign="middle" class="style5">Particulars</td>
          <td width="60" rowspan="2" align="center" valign="middle" class="style5">C.B.F.</td>
          <td height="18" colspan="2" align="center" valign="middle" class="style5">Amount</td>
          <td height="18" colspan="2" align="center" valign="middle" class="style5">Amount</td>
        </tr>
        <tr>
          <td width="120" height="18" align="center" valign="middle" class="style5">Rs.</td>
          <td width="50" height="18" align="center" valign="middle" class="style5">P.</td>
          <td width="120" height="18" align="center" valign="middle" class="style5">Rs.</td>
          <td width="47" height="18" align="center" valign="middle" class="style5">P.</td>
        </tr>
<?php foreach($ledgerdatad as $ldatad1) {
   $ledgerdata_detailsd=$this->db->query("select * from `td_fee_subfunds` WHERE  `sub_date` between '".$d11."' and '".$d22."' and `fee_head_id`='".$fee_id."' and `type`='Debit' and `sub_date`='".$ldatad1['sub_date']."' order by sub_date asc")->result_array();
    $ledgerdata_permd=$this->db->query("select sum(amount) as stamount from `td_fee_subfunds` WHERE  `sub_date` between '".$d11."' and '".$d22."' and `fee_head_id`='".$fee_id."' and `type`='Credit' and `sub_date`='".$ldatad1['sub_date']."'")->result_array();
	$j=1;
  foreach($ledgerdata_detailsd as $ldatad) {
     $exp_date1 = explode('-',$ldatad['sub_date']);
	 $sel_cbf2=$this->db->query('select * from td_fee_collection where fee_id='.$ldatad['fee_id'].'')->row();
  ?>
        <tr>
          <td height="25" align="center" valign="middle" class="style6"><?php echo date("F", strtotime($ldatad['sub_date']));?></td>
          <td height="25" align="center" valign="middle" class="style6"><?php echo date("d", strtotime($ldatad['sub_date']));?></td>
          <td height="25" align="center" valign="middle" class="style6">BY <?php if($sel_cbf2->bank!=0){echo 'BANK';}else{echo 'CASH';}?></td>
          <td height="25" align="center" valign="middle" class="style6"><?php echo $sel_cbf2->cb_no;?><?php //echo $exp_date1[2].$exp_date1[1].$exp_date1[0].$j++;;?></td>
          <td height="25" align="center" valign="middle" class="style6"><?php echo $ldatad['amount'];?></td>
          <td height="25" align="center" valign="middle" class="style6"><?php //echo $examtc[1];?></td>
          <td height="25" align="center" valign="middle" class="style6">&nbsp;</td>
          <td height="25" align="center" valign="middle" class="style6">&nbsp;</td>
        </tr>
		<?php }?>
		 <tr>
          <td height="25" align="center" valign="middle" class="style6"></td>
          <td height="25" align="center" valign="middle" class="style6"></td>
          <td height="25" align="center" valign="middle" class="style6"></td>
          <td height="25" align="center" valign="middle" class="style6"></td>
          <td height="25" align="center" valign="middle" class="style6"></td>
          <td height="25" align="center" valign="middle" class="style6"></td>
          <td height="25" align="center" valign="middle" class="style6"><?php echo $ledgerdata_permd[0]['stamount'];?></td>
          <td height="25" align="center" valign="middle" class="style6"><?php //echo $examt2[1];?></td>
        </tr>
		<?php }?>
         <tr>
          <td height="25" colspan="6" align="left" valign="middle"><span class="style5">Grand Total</span></td>
          <td height="25" align="center" valign="middle" class="style6"><?php echo $ledgerdata_totd[0]['tamount'];?></td>
          <td height="25" align="center" valign="middle" class="style6">00</td>
        </tr>
      </table>
      </td>
  </tr>
</table>
</body>
</html>
