<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $txtDate22; ?></title>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 18px;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 18px;
}
.style3 {
	font-size: 18px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.style9 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.style11 {
	font-size: 11px;
	font-family: Arial, Helvetica, sans-serif;
}
.style14 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 12px;
	text-transform: uppercase;
}
@media print{@page {size: landscape}}
-->
</style>
<script language="JavaScript">

function printPage() {

if(document.all) {

document.all.divButtons.style.visibility = 'hidden';

window.print();

} else {

document.getElementById('divButtons').style.visibility = 'hidden';

window.print();

}

}

</script>
</head>

<body>
<table width="1587" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="1134" align="center" valign="top"><table width="1500" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="middle">&nbsp;</td>
        </tr>
        <tr>
          <td align="center" valign="middle"><span class="style1">GAZOLE MAHAVIDYALAYA, P.O. - GAZOLE, DIST - MALDA</span><br />
            <br />
            <span class="style2"><span class="style3">DAILY COLLECTION - of <?php echo date_format(date_create($txtDate11), "d-m-Y");?> to <?php echo date_format(date_create($txtDate22), "d-m-Y");?></span></span></td>
        </tr>
        <tr>
          <td align="center" valign="middle"><div id="divButtons" name="divButtons" align="center">
              <input type="button" value = "Print this page" onclick="printPage()" style="font:bold 11px verdana;color:#FF0000;background-color:#FFFFFF;"/>
              <p>&nbsp;</p>
            </div></td>
        </tr>
        <tr>
          <td align="center" valign="middle"><br />
            <br />
            <table width="1500" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border-top:2px solid #000000;">
              <tr>
                <td width="20" height="25" align="center" valign="middle" class="style9">Sl. No.</td>
                <td width="20" height="25" align="center" valign="middle" class="style9">Pay In Slip</td>
                <?php

				$fund_details1 = $this->db->query("select * from tb_fin_head");
				$q=1;
				foreach($fund_details1->result() as $fund_detail1) {
				?>
                <td width="28" height="25" align="center" valign="middle" class="style9"><?php echo $q++; ?></td>
                <?php } ?>
                <td width="72" height="25" align="center" valign="middle" class="style9">Total</td>
                
              </tr>
              <?php	
			  $this->db->query("SET SQL_BIG_SELECTS=1");				
				 $fee_collection_details = $this->db->query("select * from td_fee_collection where col_date>='$txtDate11' and col_date<='$txtDate22'")->result();
				 $s=1;
				 if($fee_collection_details) { foreach($fee_collection_details as $fee_collection_detail) {			 	
				 $fee_id = $fee_collection_detail->fee_id;
				 $stream = $fee_collection_detail->stream;				 
			 ?>
              <tr>
                <td height="22" align="center" valign="middle" class="style11"><?php echo $s++; ?></td>
                <td height="22" align="center" valign="middle" class="style11"><?php echo $fee_collection_detail->fee_id; ?></td>
                
                <?php
				$fund_details2 = $this->db->query("select * from tb_fin_head");
				$r=1;
				$sub_tot_amt = 0;
				
				foreach($fund_details2->result() as $fund_detail2) {
					$fund_id = $fund_detail2->id;
					$this->db->query("SET SQL_BIG_SELECTS=1");
					$fee_subfund_detail = $this->db->query("select * from td_fee_subfunds where fee_id='$fee_id' and fee_head_id='$fund_id'")->row();

					if($fee_subfund_detail)
					{
						$amt = $fee_subfund_detail->amount;
					}
					else
					{
						$amt = 0;
					}
					$sub_tot_amt+=$amt;					
					
				?>
                <td width="28" height="22" align="center" valign="middle" class="style11"><?php echo $amt; ?></td>
                <?php } ?>
                <td height="22" align="center" valign="middle" class="style11"><?php echo $sub_tot_amt; ?></td>
                
              </tr>
              <?php } } ?>
            </table>
            <br /></td>
        </tr>
        <tr>
          <td align="center" valign="middle">&nbsp;</td>
        </tr>
      </table>
      <span class="style1"><br />
      </span><br />
      <br />
      <!--<table width="1400" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="middle"><table width="589" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
              <tr>
                <td height="30" colspan="3" align="center" valign="middle" class="style9">SUB FUND CALCULATION</td>
              </tr>
              <tr>
                <td height="30" align="center" valign="middle" bgcolor="#E8E8E8" class="style9">SL #</td>
                <td height="30" align="left" valign="middle" bgcolor="#E8E8E8" class="style9">&nbsp;NAME OF THE SUB FUNDS</td>
                <td height="30" align="center" valign="middle" bgcolor="#E8E8E8" class="style9">AMOUNT (RS)</td>
              </tr>
              <?php			  
			  $fund_details3 = $this->db->query("select * from tb_fin_head")->result();
			  //echo '<pre>';print_r($fund_details3);die;
			  $p=1;
			  $grand_total = 0;
			foreach($fund_details3 as $fund_detail3) {
			  $fund_id2 = $fund_detail3->id;	 
			  $settle_payu2 = $this->db->query("select * from td_fee_collection where col_date>='$txtDate11' and col_date<='$txtDate22'");		  
			  
			  $fund_wise_sub_tot = 0;
			  $misc_fund = 0;		   
			  $misc_fund2 = 0;
			  foreach($settle_payu2->result() as $row2)
			  {
				$trn_id2 = $row2->transaction_id;
				
				$fee_id2 = $row2->fee_id;				

				$fee_subfund_detail2 = $this->db->query("select * from td_fee_subfunds where fee_id='$fee_id2' and fee_head_id='$fund_id2'")->row();
				
				
					if($fee_subfund_detail2)
					{
						$amt2 = $fee_subfund_detail2->amount;
					}
					else
					{
						$amt2 = 0;
					}
					
					
				
			  }
			  ?>
              <tr>
                <td width="39" height="30" align="center" valign="middle" class="style9">(<?php echo $p++; ?>)</td>
                <td width="384" height="30" align="left" valign="middle" class="style9">&nbsp;<?php echo $fund_detail3->fund_name;?></td>
                <td width="158" height="30" align="center" valign="middle" class="style9"><?php //echo $fund_wise_sub_tot; ?></td>
              </tr>
              <?php //} ?>
              
              
             <?php } ?> 
             	<tr>
                <td height="30" align="center" valign="middle" class="style9">&nbsp;</td>
                <td height="30" align="right" valign="middle" class="style9">Total&nbsp;</td>
                <td height="30" align="center" valign="middle" class="style9"><?php 
				//$total_amount = $this->db->query("SELECT sum(payu_fee) as grand_total FROM `td_fee_settle_payu` where settle_date='$txtDate22'")->row();
				//echo number_format(($total_amount->grand_total),2); ?></td>
              </tr>              
             
                         
            </table></td>
        </tr>
      </table>-->
      <br />
      <br />
      <br /></td>
  </tr>
</table>
</body>
</html>
