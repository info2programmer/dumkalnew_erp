<?php 

function no_to_words($no)

{   

 $words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred &','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');

    if($no == 0)

        return ' ';

    else {

	$novalue='';

	$highno=$no;

	$remainno=0;

	$value=100;

	$value1=1000;       

            while($no>=100)    {

                if(($value <= $no) &&($no  < $value1))    {

                $novalue=$words["$value"];

                $highno = (int)($no/$value);

                $remainno = $no % $value;

                break;

                }

                $value= $value1;

                $value1 = $value * 100;

            }       

          if(array_key_exists("$highno",$words))

              return $words["$highno"]." ".$novalue." ".no_to_words($remainno);

          else {

             $unit=$highno%10;

             $ten =(int)($highno/10)*10;            

             return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno);

           }

    }

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Debit Voucher</title>

<style type="text/css">

<!--

.style1 {font-family: Arial, Helvetica, sans-serif}

.style2 {font-size: 24px}

.style4 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }

.style7 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; }

-->

</style>

</head>



<body>

<script language="JavaScript">

function printPage() {

if(document.all) {

document.all.divButtons.style.visibility = 'hidden';

window.print();

window.close();

document.all.divButtons.style.visibility = 'visible';

} else {

document.getElementById('divButtons').style.visibility = 'hidden';

window.print();

window.close();

document.getElementById('divButtons').style.visibility = 'visible';

}

}

</script>

<div id="divButtons" name="divButtons" align="center" style="height:50px;">

<input type="button" value = "Print this page" onclick="printPage()" style="font:bold 18px verdana;color:#FF0000;background-color:#FFFFFF; padding:3px 0px 2px 0px;" /><br/><br/>

</div>

<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td width="700" height="440" align="center" valign="top"><table width="680" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td height="25" colspan="3">&nbsp;</td>

        </tr>

      <tr>

        <td height="60" colspan="3" align="center" valign="top"><span class="style1"><span class="style2">Dumkal College</span><br />

  Basantapur &#9733; Murshidabad</span></td>

      </tr>

      

      <tr>

        <td width="418" height="25" align="left" valign="top">

        <div style="float:left; border:1px solid #000; padding:2px; margin-bottom:5px;">

        <img src="<?php echo base_url();?>index.php/main/show_barcode/<?php echo $data_fin->fee_id;?>" alt="" class="barcode" />

        </div>

        </td>

        <td width="262" height="25" colspan="2" align="right" valign="top">

        <span class="style4"><strong>Debit Voucher No. :</strong> <?php echo $data_fin->fee_id?></span> <br />

        <span class="style4"><strong>Date :</strong> <?php echo date('d.m.Y', strtotime($data_fin->col_date))?></span></td>

        </tr>



      <tr>

        <td colspan="3" align="center" valign="top"><table width="680" border="1" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">

          <tr>

            <td width="505"><span class="style4"><strong>A/C :</strong> <?php if($data_bank){echo $sel_bank[0]['acc_no'];} else {echo $data_fin->name;}?></span></td>

            <td colspan="2" align="center" valign="middle"><span class="style4"><strong>Amount</strong></span></td>

            </tr>

          <tr>

            <td><span class="style4"><strong>Pay to : </strong><?php echo $data_fin->pay_to?></span></td>

            <td width="116" align="center" valign="middle"><span class="style4"><strong>Rs.</strong></span></td>

            <td width="59" align="center" valign="middle"><span class="style4"><strong>P.</strong></span></td>

          </tr>

          <?php if($data_fin->voucher_type == 'Bank') {?>

          <tr>

            <td height="50" align="left" valign="top"><span class="style4"><strong>Narration :</strong> <?php echo $data_fin->particular?></span></td>

            <td rowspan="4" align="center" valign="top"><span class="style4"><?php echo $data_fin->amount?></span></td>

            <td rowspan="4" align="center" valign="top"><span class="style4">00</span></td>

          </tr>

          <?php } else { ?>

           <tr>

            <td height="50" align="left" valign="top"><span class="style4"><strong>Narration :</strong> <?php echo $data_fin->particular?></span></td>

            <td rowspan="2" align="center" valign="top"><span class="style4"><?php echo $data_fin->amount?></span></td>

            <td rowspan="2" align="center" valign="top"><span class="style4">00</span></td>

          </tr>

          <?php }?>

          <?php if($data_fin->voucher_type == 'Bank') {?>

          <tr>

            <td align="left" valign="middle"><span class="style4"><strong>Cheque No. :</strong>  <?php echo $data_fin->cheque_no;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Dated :</strong><?php echo $data_fin->col_date?></span></td>

            </tr>

          <tr>

            <td align="left" valign="middle"><span class="style4"><strong>Bank Name with Branch :</strong> <?php echo $sel_bank[0]['bank_name']." - ".$sel_bank[0]['bank_branch'];?></span></td>

            </tr>

            <?php } ?>

          <tr>

            <td height="50" align="left" valign="top" style="text-transform:capitalize;"><span class="style4"><strong>Amount in Words :</strong> <?php echo no_to_words($data_fin->amount) ;?>Only</span></td>

            </tr>

          <tr>

            <td align="right" valign="middle"><span class="style4"><strong>TOTAL</strong></span></td>

            <td align="center" valign="middle"><span class="style4"><?php echo $data_fin->amount?></span></td>

            <td align="center" valign="middle"><span class="style4">00</span></td>

          </tr>

        </table></td>

        </tr>

      <tr>

        <td height="90" colspan="3" align="center" valign="bottom"><table width="680" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td width="134" align="center" valign="middle"><span class="style7">Bursur</span></td>

            <td width="206" align="center" valign="middle"><span class="style7">Accountant / Cashier</span></td>

            <td width="195" align="center" valign="middle"><span class="style7">Passed by TIC</span></td>

            <td width="145" align="center" valign="middle"><span class="style7">Received by</span></td>

          </tr>

        </table></td>

        </tr>

    </table></td>

  </tr>

</table>

</body>

</html>

