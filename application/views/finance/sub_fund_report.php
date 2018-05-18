
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subfunds Report</title>

<style>
	body
	{
		font-family:"Courier New", Courier, monospace;
		font-size:14px;
	}
	.p_wrap
	{
		width:800px;
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
	.p_wrap h4
	{
		width:100%;
		text-align:center;
		float:left;
		margin:0px;
		padding:0px;
	}
	.p_wrap h3
	{
		width:100%;
		text-align:center;
		float:left;
		margin:0px;
		padding:0px;
	}
	.p_row
	{
		width:100%;
		float:left;
		
	}
	.col_6
	{
		width:100%;
		float:left;
		box-sizing:border-box;
		padding:5px 10px;
	}
	
</style>
</head>

<body>
	<div class="p_wrap">
	<?php 
	//echo "SELECT * FROM tb_fin_head WHERE id='".$sub_data[0]['fee_head_id']."'";die;
	$sql = $this->db->query('SELECT * FROM tb_fin_head WHERE id='.$sub_data[0]['fee_head_id'])->result_array();
	?>
	
    	<h2><?php echo $sql[0]['name'];?> REPORT</h2>
        <h4><?php echo "From- ".$date1." To-".$date2;?></h4>
      <div class="p_row">
        	<div class="col_6">
            <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#999999">
              <tr>
                <td width="25%" bgcolor="#CCCCCC"><strong>Date</strong></td>
                <td width="65%" bgcolor="#CCCCCC"><strong>Particulars</strong></td>
                <td width="10%" bgcolor="#CCCCCC"><strong>Amount</strong></td>
              </tr>
 <?php 
 foreach($sub_data as $subsdata) { 
$sql1 = $this->db->query('SELECT * FROM td_fee_collection WHERE fee_id='.$subsdata['fee_id'])->result_array();
							
?>              
              <tr>
                <td><?php echo $sql1[0]['col_date'];?> (<?php echo date("F", strtotime($sql1[0]['col_date']));?>,<?php echo date("D", strtotime($sql1[0]['col_date']));?>)</td>
                <td><?php echo $sql1[0]['particular'];?></td>
                <td><?php echo $subsdata['amount'];?></td>
              </tr>
			  <?php }?>
              
              <tr>
                <td><strong>Total</strong></td>
                <td>&nbsp;</td>
                <td><strong><?php echo $sumval[0]['amount'];?></strong></td>
              </tr>
              
              <?php //}?>
	</table>
          </div>
        </div>
        

    </div>
</body>
</html>
