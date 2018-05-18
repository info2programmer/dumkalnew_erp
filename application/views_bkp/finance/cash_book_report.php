<?php 
//print_r($cashbook_Condata);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cash Book Report</title>

<style>
	body
	{
		font-family:"Courier New", Courier, monospace;
	}
	.p_wrap
	{
		width:1200px;
		margin:0px auto;		
	}
	
	.p_wrap h2
	{
		width:100%;
		text-align:center;
		float:left;
		margin:0px;
		padding:0px;
	}
	
	.p_row
	{
		width:109%;
		float:left;
		
	}
	.col_6
	{
		width:50%;
		float:left;
		box-sizing:border-box;
		padding:5px 10px;
	}
table td{
border:1px solid #999999;
}	
table {
border-collapse : collapse; 
}
table tr{
page-break-inside:avoid;
}
</style>
</head>

<body>
	<div class="p_wrap">
    	<h2>CASH BOOK</h2>
        <?php //print_r($fee);?>
        <h4>From : <?php echo $fdate;?> To: <?php echo $tdate;?></h4>
        <div class="p_row">
        	<div class="col_6">
            <h4>Debit</h4>
            <table width="86%" border="0" cellpadding="5" cellspacing="0" bordercolor="#999999">
              <tr>
                <td width="5%" bgcolor="#CCCCCC"><strong>Date</strong></td>
                <td width="6%" bgcolor="#CCCCCC"><strong>Month</strong></td>
                <td width="22%" bgcolor="#CCCCCC"><strong>Particulars</strong></td>
                <td width="19%" bgcolor="#CCCCCC"><strong>LF Number</strong></td>
                <td width="11%" bgcolor="#CCCCCC"><strong>Cash</strong></td>
                <td width="11%" bgcolor="#CCCCCC"><strong>Bank</strong></td>
              </tr>
       <?php //print_r($cashbook_Ddata);?>       
 <?php foreach($cashbook_Cdata as $Ccash) {
                $exp1 = explode('-',$Ccash['col_date']);
                ?>              
              <tr>
                <td><?php echo $exp1[2];?></td>
                <td><?php echo $exp1[1];?></td>
                <td><?php echo $Ccash['particular'];?></td>
                <td><?php echo $Ccash['lf_no'];?></td>
                <td><?php echo $Ccash['cash'];?></td>
                <td><?php echo $Ccash['bank'];?></td>
              </tr>
			 <?php }?> 
               <?php foreach($cashbook_Condata as $Concash) {
                $exp12 = explode('-',$Concash['col_date']);
                ?>              
              <tr>
                <td><?php echo $exp12[2];?></td>
                <td><?php echo $exp12[1];?></td>
                <td><?php echo $Concash['particular'];?></td>
                <td>&copy;</td>
                <td><?php echo $Concash['amount'];?></td>
                <td></td>
              </tr>
			 <?php }?> 
              <tr>
                <td><strong>Total</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><strong><?php echo $tot_cCash[0]['sccash']+$tot_ConCash[0]['concash'];?></strong></td>
                <td><strong><?php echo $tot_cBank[0]['sbcash'];?></strong></td>
              </tr>
              
             
	</table>
            </div>
            <div class="col_6">
            <h4>Credit</h4>
            <table width="86%" border="1" cellpadding="5" cellspacing="0" bordercolor="#999999">
              <tr>
                <td width="5%" bgcolor="#CCCCCC"><strong>Day</strong></td>
                <td width="6%" bgcolor="#CCCCCC"><strong>Month</strong></td>
                <td width="22%" bgcolor="#CCCCCC"><strong>Particulars</strong></td>
                <td width="19%" bgcolor="#CCCCCC"><strong>LF Number</strong></td>
                <td width="11%" bgcolor="#CCCCCC"><strong>Cash</strong></td>
                <td width="11%" bgcolor="#CCCCCC"><strong>Bank</strong></td>
              </tr>
              <?php foreach($cashbook_Ddata as $Dcash) {
                $exp = explode('-',$Dcash['col_date']);
                ?> 
              <tr>
                <td><?php echo $exp[2];?></td>
                <td><?php echo $exp[1];?></td>
                <td><?php echo $Dcash['particular'];?></td>
                <td><?php echo $Dcash['lf_no'];?></td>
                <td><?php echo $Dcash['cash'];?></td>
                <td><?php echo $Dcash['bank'];?></td>
              </tr>
			  <?php }?>
              <?php foreach($cashbook_Condata as $Concash) {
                $exp12 = explode('-',$Concash['col_date']);
                ?>              
              <tr>
                <td><?php echo $exp12[2];?></td>
                <td><?php echo $exp12[1];?></td>
                <td><?php echo $Concash['particular'];?></td>
                <td>&copy;</td>
                <td></td>
                <td><?php echo $Concash['amount'];?></td>
              </tr>
			 <?php }?> 
              <tr>
                <td><strong>Total</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><strong><?php echo $tot_dCash[0]['scdcash'];?></strong></td>
                <td><strong><?php echo $tot_dBank[0]['sbdcash']+$tot_ConCash[0]['concash'];?></strong></td>
              </tr>
              
           
	</table>
            </div>
        </div>
        

    </div>
</body>
</html>
