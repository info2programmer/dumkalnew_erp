<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=student_with_address_list.xls");
?>
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
            font-family: "Tahoma", sans-serif;
        }

        @page {
            size: 8in 11.3in;
            margin: 0.5cm 1cm
        }
		table.in-page {width:800px}

        @media print
        {
            table.in-page {page-break-before:always; width:100%}
        }

        table {
            border: none;
            border-collapse: collapse;
            font-size: 9px;
            width: 100%
        }

        th {padding: 1px}

        td {padding: 0 1px; text-align: center}

        .left {float: left}
        .right {float: right}
        .blue {color: #000179}
        .bold {font-weight: bold}
        .italic {font-style: italic}
        .large {font-size: 15px}
        .larger {font-size: 18px}
        .largest {font-size: 20px}
        .txt-right {text-align: right}
        .txt-left {text-align: left}

        thead th {font-weight: bold}
        thead th {border: 1px solid black}
        tbody td {border-bottom: 1px solid black}
        thead td {position: relative}

        table.mini-table tr > td:first-child {text-align: right; font-weight: bold}
        table.mini-table-2 tr > td {text-align: left}
        table.mini-table-2 tr:last-child > td {font-weight: bold}
        table.mini-table td, table.mini-table-2 td {border: none}
        table.mini-table tr > td:last-child {text-align: left; padding-left: 15px}

        -->
    </style>
</head>
<body>
<table class="in-page">
    <thead>
    <tr>
        <td colspan="5" style="text-align: center">
            <span style="position: absolute; right: 10px; top: 10px; font-size: 1.8em; font-weight: bold"><?php echo $year;if($year==1){echo 'st';}if($year==2){echo 'nd';}if($year==3){echo 'rd';}?> Year</span>
            <h1 style="margin: 5px">Dumkal College, Basantapur</h1>
            <h3 style="margin: 5px">Student List for the Session <?php echo $session;?></h3>
            <h3 style="margin: 5px">Subject: <?php echo $subject;?></h3>
        </td>
    </tr>
    <tr>
        <th>SL</th>
        <th>Stud ID,Name</th>
        <th>Father's Name, Address</th>
        <th>Subjects, Reg. No., Roll No.</th>
        <th width="20%">Signature</th>
    </tr>
    </thead>
    <tbody>
    <tr><th style="line-height: 5px">&nbsp;</th></tr>
    <?php 
	if(!empty($data))
	{
		$sl_no=1;
		foreach($data as $res)
		{
			$selsub=$this->db->query('select * from td_subject_group JOIN td_student_stream ON td_subject_group.stream_id=td_student_stream.stream_id where td_subject_group.grp_id='.$res->subject_group.'')->row();
	?>
    <tr>
        <td><?php echo $sl_no++;?></td>
        <td>
        <table class="mini-table">
            <tr>
              <td><?php echo $res->student_id;?></td>
              </tr>
              <tr>
              <td  style=" font-size:15px;"><?php echo $res->name;?></td>
              </tr>
            </table> 
          </td>
        <td>
          <table class="mini-table">
                <tr>
                    <td width="40%">Guardian's Name</td>
                    <td><?php echo $res->father_name;?></td>
                </tr>
                <tr>
                    <td>Vill :</td>
                    <td><?php echo $res->vill;?></td>
                </tr>
                <tr>
                    <td>P.O. :</td>
                    <td><?php echo $res->po;?></td>
                </tr>
                <tr>
                    <td>P.S. :</td>
                    <td><?php echo $res->ps;?></td>
                </tr>
                <tr>
                    <td>Dist. :</td>
                    <td><?php echo $res->dist;?></td>
                </tr>
                <tr>
                    <td>Mobile. :</td>
                    <td><?php echo $res->candidate_phone;?> <?php if($res->g_phn!=''){echo " / ".$res->g_phn; }?></td>
                </tr>
            </table>
        </td>
        <td>
        <table class="mini-table">
                <tr>
                    <td width="43%">Roll</td>
                    <td width="57%"><?php echo $res->roll;?></td>
                </tr>
                <tr>
                    <td>Caste : </td>
                    <td><?php echo $res->caste;?></td>
                </tr>
                <tr>
                    <td>Subjects : </td>
                    <td><?php echo $res->subject1;?> <?php echo $res->subject2;?> <?php echo $res->subject3;?></td>
                </tr>
                <tr>
                    <td>Date of Adm : </td>
                    <td><?php echo date('d-M-Y',strtotime($res->date));?></td>
                </tr>
                <tr>
                    <td>Date of Birth : </td>
                    <td><?php echo date('d-M-Y',strtotime($res->dob));?></td>
                </tr>
                <tr>
                    <td>RegistrationNo :</td>
                    <td><?php echo $res->registration_no;?> of <?php echo $res->reg_year;?></td>
                </tr>
          </table>
        </td>
        <td>&nbsp;</td>
    </tr>
    <?php }}?>
    </tbody>
</table>
</body>
</html>