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

        @media print
        {
            table.in-page {page-break-after:always}
        }

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

        -->
    </style>
</head>
<body>
<table class="in-page">
    <thead>
    <tr>
        <td colspan="8" style="text-align: center">
            <span style="position: absolute; right: 10px; top: 10px; font-size: 1.8em; font-weight: bold"><?php echo $year;if($year==1){echo 'st';}if($year==2){echo 'nd';}if($year==3){echo 'rd';}?> Year</span>
            <h1 style="margin: 5px">Dumkal College, Basantapur</h1>
            <h3 style="margin: 5px">Student List for the Session <?php echo $session;?></h3>
            <h3 style="margin: 5px">Subject: <?php echo $subject;?></h3>
        </td>
    </tr>
    <tr>
        <th>SL</th>
        <th>Std Id</th>
        <th>Name</th>
        <th>Father's Name</th>
        <th>Reg No.</th>
        <th>Roll No.</th>
        <th>Result</th>
        <th>Sig.</th>
    </tr>
    </thead>
    <tbody>
    <tr><th style="line-height: 5px">&nbsp;</th></tr>
    <?php 
	if(!empty($data))
	{
		$sl_no=1;
		$x=0;
		foreach($data as $res)
		{
		$x++;	
		if ($x && $x % 50 == 0){echo '<tr class="breakAfter"><td colspan="9" height=""></td></tr>';	}
	?>
    <tr>
        <td><?php echo $sl_no++;?></td>
        <td><?php echo $res->student_id;?></td>
        <td><?php echo $res->name;?></td>
        <td><?php echo $res->father_name;?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
     <?php }}?>
    </tbody>
</table>
</body>
</html>