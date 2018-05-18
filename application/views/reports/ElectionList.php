<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dumkal Election List</title>
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
        <th colspan="5" style="text-align: center; border:none;">
            <h1 style="margin: 5px">STUDENTS’ UNION ELECTION <?php echo $session;?></h1>
            <h3 style="margin: 5px">List of Contesting Candidates </h3>	
            <h3 style="margin: 5px">Dumkal College, Basantapur </h3>	
	
            <h3 style="margin: 5px">Constituency: <?php echo $year;if($year==1){echo 'st';}if($year==2){echo 'nd';}if($year==3){echo 'rd';}?> year <?php echo $subject;?></h3>            <h3 style="margin: 5px">Unreserved Seats - <?php echo $U;?></h3>
        </th>
    </tr>
    <tr>
        <th>SL</th>
        <th>Student ID</th>
        <th>Name</th>
        <th>Subject</th>
        <th>Roll No</th>
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
		$total_page=round($total);
		foreach($data as $res)
		{
		?>
        <?php if(($x % 52 == 0 && $x != 0)){++$p;?>
        <tr>
        <td colspan="5"  style="text-align: right; border:none;">Page <?php echo $p.' of '.round($total_page,0)?></td>
        </tr>
       <?php }?>
    <tr>
        <td><?php echo $sl_no++;?></td>
        <td><?php echo $res->student_id;?></td>
        <td><?php echo $res->name;?></td>
        <td><?php echo $res->subject1;?></td>
        <td><?php echo $res->roll;?></td>
    </tr>
     <?php $x++;}?>
     <?php /*?><?php if($x ==$num){?>
        <tr>
        <td colspan="5"  style="text-align: right; border:none;">Page <?php echo $total_page.' of '.round($total_page,0)?></td>
      </tr>
       <?php }?><?php */?>
	   <?php }?>
    </tbody>
</table>
<table class="in-page">
<thead>
    <tr>
        <th colspan="5" style="text-align: center; border:none;">
            <h3 style="margin: 5px">Reserved Seats - <?php echo $R;?></h3>
        </th>
    </tr>
    <tr>
        <th>SL</th>
        <th>Student ID</th>
        <th>Name</th>
        <th>Subject</th>
        <th>Roll No</th>
    </tr>
    </thead>
    <tbody>
    <?php 
	if(!empty($data_res))
	{
	    $s_no=1;
		foreach($data_res as $row)
		{
		?>
    <tr>
        <td><?php echo $s_no++;?></td>
        <td><?php echo $row->student_id;?></td>
        <td><?php echo $row->name;?></td>
        <td><?php echo $row->subject1;?></td>
        <td><?php echo $row->roll;?></td>
    </tr>
     <?php }}?>
    </tbody>
</table>
</body>
</html>