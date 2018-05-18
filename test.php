<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$con=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("db_dumkal_new",$con) or die(mysql_error());
?>
<?php 
$s = 'SELECT * FROM td_fee_collection WHERE particular LIKE "%DCB2017%" ORDER BY fee_id';
$feec = mysql_query($s,$con) or die(mysql_error());
$fee_dtl = mysql_fetch_assoc($feec);
do{
$stud_id = $fee_dtl['particular'];
$exp_stud_id = explode('-',$stud_id);
$q = 'SELECT * FROM td_student_application WHERE apply_form_number="'.$exp_stud_id[1].'"';
$qdata = mysql_query($q,$con) or die(mysql_error());
$appdata = mysql_fetch_assoc($qdata);


?>
<table width="900" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>app id</td>
    <td>add id</td>
  </tr>
  <tr>
    <td><?php echo $appdata['application_tran_no'];?></td>
    <td><?php echo $appdata['adm_tran_no'];?></td>
  </tr>
</table>
<?php
}
while($fee_dtl = mysql_fetch_assoc($feec));
?>