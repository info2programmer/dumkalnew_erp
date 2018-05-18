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
            table.in-page {page-break-before:always}

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
        .in-page > thead > tr > th, .in-page > tbody > tr > td {border: none}
        thead td {position: relative}

        -->
    </style>
</head>
<body>
<table class="in-page">
    <thead>
    <tr>
        <td style="text-align: left!important; padding-left: 30px">
            <h3 style="margin: 5px"><?php echo $year;if($year==1){echo 'st';}if($year==2){echo 'nd';}if($year==3){echo 'rd';}?> Year <?php echo $session;?></h3>
            <h3 style="margin: 5px">Subject: <?php echo $subject_code;?></h3>
            <h3 style="margin: 5px">Stream: <?php echo $subject;?></h3>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr><th style="line-height: 5px">&nbsp;</th></tr>
    <tr>
        <td>
            <table style="text-align: center; width: 90%; margin: 0 auto">
                <thead>
                <tr>
                    <th width="6%">SL</th>
                    <th width="7%">Roll No.</th>
                    <th width="87%" style="text-align:left;">Name</th>
                </tr>
                </thead>
                <tbody>
                <?php 
	if(!empty($data))
	{
		$sl_no=1;
		$x=0;
		foreach($data as $res)
		{
		$x++;	
	?>
                <tr>
                    <td><?php echo $sl_no++;?></td>
                    <td><?php echo $res->roll;?></td>
                    <td style="text-align:left;"><?php echo $res->name;?></td>
                </tr>
      <?php }}?>          
                </tbody>
            </table>
        </td>
      </tr>
    </tbody>
</table>
</body>
</html>