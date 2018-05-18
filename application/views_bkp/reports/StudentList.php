<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dumkal Certificate</title>
    <style type="text/css">
        <!--
        html, body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        @page {
            size: 8in 11.3in;
            margin: 1cm
        }

        /*@media print
        {
            table.in-page {page-break-after:always}
        }*/

        table {
            border: none;
            border-collapse: collapse;
            font-size: 12px;
            width: 100%
        }

        th {padding: 0}

        td {padding: 1px; text-align: center}

        .left {float: left}
        .right {float: right}
        .blue {color: #000179}
        .bold {font-weight: bold}
        .italic {font-style: italic}
        .large {font-size: 15px}
        .larger {font-size: 18px}
        .largest {font-size: 20px}

        thead th {font-weight: bold}
        thead th, tbody td {border: 1px solid black}
        thead td {position: relative}
	    .breakAfter{ page-break-after: auto; } 
        table tfoot{display:table-row-group;}
        -->
    </style>
</head>
<body>
<table class="in-page">
    <thead>
    <tr>
        <th colspan="9" style="text-align: center; border:none;">
            <span style="position: absolute; right: 10px; top: 10px; font-size: 1.8em; font-weight: bold"><?php echo $year;if($year==1){echo 'st';}if($year==2){echo 'nd';}if($year==3){echo 'rd';}?> Year</span>
            <h1 style="margin: 5px">Dumkal College</h1>
            <h3 style="margin: 5px">Provisional Voter List for the Session 2017<?php //echo $session;?></h3>
            <h3 style="margin: 5px">Subject: <?php echo $subject;?></h3>
        </th>
    </tr>
    <tr>
        <th>SL</th>
        <th>Roll No</th>
        <th>Name</th>
        <th>Father's Name</th>
        <th>Student ID</th>
        <th>Reg No.</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php 
	if(!empty($data))
	{
		$sl_no=1;
		$x=0;
		$p=0;
		$total = $num/52;
		$exp = explode('.',$total);
        //if(!empty($exp[1])){$total_page=$total+1;}else{$total_page=$total;}
		$total_page=round($total);
		foreach($data as $res)
		{
		?>
        <?php if(($x % 52 == 0 && $x != 0)){++$p;?>
        <tr>
        <td colspan="9"  style="text-align: right; border:none;">Page <?php echo $p.' of '.round($total_page,0)?></td>
        </tr>
       <?php }?>
    <tr>
        <td><?php echo $sl_no++;?></td>
        <td><?php echo $res->roll;?></td>
        <td><?php echo $res->name;?></td>
        <td><?php echo $res->father_name;?></td>
        <td><?php echo $res->student_id;?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
     <?php $x++;}}?>
     <?php if($x ==$num){?>
        <tr>
        <td colspan="9"  style="text-align: right; border:none;">Page <?php echo $total_page.' of '.round($total_page,0)?></td>
      </tr>
       <?php }?>
    </tbody>
</table>
</body>
</html>