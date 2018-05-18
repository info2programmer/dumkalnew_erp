<?php

header("Content-type: application/vnd.ms-excel");

header("Content-Disposition: attachment;Filename=registration_sheet.xls");

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Dumkal Registration List</title>

    <style type="text/css">

        <!--

        html, body {

            margin: 0;

            padding: 0;

            font-family: sans-serif;

        }



        @page {

            size: 8in 11.3in;

            margin: 0.5cm 1cm

        }



        table {

            border: none;

            border-collapse: collapse;

            font-size: 12px;

            width: 100%

        }



        table th {

            border-top: 2px solid black;

            border-bottom: 2px solid black;

            font-weight: 600;

            padding: 5px 3px;

            text-align: center

        }



        table td {

            padding: 2px 2px;

            font-size: 10px

        }



        table tbody tr > td:nth-child(1), table tbody tr > td:nth-child(2), table tbody tr > td:nth-child(5), table tbody tr > td:nth-child(6), table tbody tr > td:nth-child(7), table tbody tr > td:nth-child(8), table tbody tr > td:nth-child(9) {

            text-align: center

        }



        table:nth-child(n+2) tbody tr:last-child td {

            padding-bottom: 7px

			

        }



        -->

    </style>

</head>

<body>



<table>

 <?php if(!empty($sub_div)){?>

 <thead>

     <tr>

            <th colspan="10" style="text-align: center; border:none;">

            <div style="display: block; text-align: center; font-size: 18px; font-weight: 600">Dumkal College, Basantapur</div>

            </th>

        </tr>

    </thead>

    <?php 

	foreach($sub_div as $sub_div){
if($sub_div->session_year == '2017-2018'){
		$regflg = 0;
		} else {
		$regflg = 1;
		}
	  $sub= $sub_div->subject_group;

	  $fetch_subject = $this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$sub.'"')->row();

	  $subject=$fetch_subject->stream_name." in ".$fetch_subject->subject_1;

	  $data = $this->db->query('select * from td_student_details where reg_year="'.$yr.'" and subject_group="'.$sub.'" and student_status="Present"  and registration='.$regflg.' and registration_date BETWEEN "'.$d11.'" AND "'.$d22.'" order by '.$sort.' asc')->result();

	?>

    <thead>

    <tr>

        <th colspan="10" style="text-align: center; border:none;">        

<div style="display: block; text-align: center; font-size: 12px; font-weight: 600; padding: 2px 0 3px 0">List of students of 1st year <?php echo $subject;?> for Registration in the University for the Session <?php echo $session;?>.

</div>

        </th>

    </tr>

    <tr>

        <th width="5%">SL<br>No.</th>

        <th width="5%">Roll<br>No.</th>
        
        <th width="23%">Form</th>

        <th width="23%">Name</th>

        <th width="23%">Fathers Name</th>

        <th width="5%">Sex</th>

        <th width="6%">Cast</th>

        <th width="6%">Sub</th>

        <th width="6%">Gen</th>

        <th width="6%">Gen</th>

        <th width="15%">Compulsory<br>Subjects</th>

    </tr>

    </thead>

    <tbody>

    <?php 

	if(!empty($data))

	{

		$sl_no=1;

		$x=0;

		$p=0;

		$total = $num/62;

		$exp = explode('.',$total);

		$total_page=round($total);

		foreach($data as $res)

		{

	?>

    <tr>

        <td><?php echo $sl_no++;?></td>

        <td><?php echo $res->roll;?></td>
        <td><?php echo $res->student_id;?></td>

        <td><?php echo $res->name;?></td>

        <td><?php echo $res->father_name;?></td>

        <td><?php echo $res->sex;?></td>

        <td><?php echo $res->caste;?></td>

        <td><?php echo $res->subject1;?></td>

        <td><?php echo $res->subject2;?></td>

        <td><?php echo $res->subject3;?></td>

        <td>BNGM ENGC</td>

    <?php }?>

    </tbody>

    <?php }?>

 <?php }}else{?>

    <thead>

    <tr>

        <th colspan="10" style="text-align: center; border:none;">

        <div style="display: block; text-align: center; font-size: 18px; font-weight: 600">Dumkal College, Basantapur</div>

<div style="display: block; text-align: center; font-size: 12px; font-weight: 600; padding: 2px 0 3px 0">List of students of 1st year <?php echo $subject;?> for Registration in the University for the Session <?php echo $session;?>.

</div>

        </th>

    </tr>

    <tr>

        <th width="5%">SL<br>No.</th>

        <th width="5%">Roll<br>No.</th>
        
        <th width="23%">Form</th>

        <th width="23%">Name</th>

        <th width="23%">Fathers Name</th>

        <th width="5%">Sex</th>

        <th width="6%">Cast</th>

        <th width="6%">Sub</th>

        <th width="6%">Gen</th>

        <th width="6%">Gen</th>

        <th width="15%">Compulsory<br>Subjects</th>

    </tr>

    </thead>

    <tbody>

    <?php 

	if(!empty($data))

	{

		$sl_no=1;

		$x=0;

		$p=0;

		$total = $num/62;

		$exp = explode('.',$total);

        //if(!empty($exp[1])){$total_page=$total+1;}else{$total_page=$total;}echo $total_page;

		$total_page=round($total);

		foreach($data as $res)

		{

	?>

    <?php if($x % 62 == 0 && $x != 0){++$p;?>

        <tr>

        <td colspan="10"  style="text-align: right; border:none;">Page <?php echo $p.' of '.round($total_page,0)?></td>

        </tr>

       <?php }?>

    <tr>

        <td><?php echo $sl_no++;?></td>

        <td><?php echo $res->roll;?></td>
        
        <td><?php echo $res->student_id;?></td>

        <td><?php echo $res->name;?></td>

        <td><?php echo $res->father_name;?></td>

        <td><?php echo $res->sex;?></td>

        <td><?php echo $res->caste;?></td>

        <td><?php echo $res->subject1;?></td>

        <td><?php echo $res->subject2;?></td>

        <td><?php echo $res->subject3;?></td>

        <td>BNGM ENGC</td>

    <?php $x++;}?>

     <?php if($x ==$num){?>

        <tr>

        <td colspan="10"  style="text-align: right; border:none;">Page <?php echo $total_page.' of '.round($total_page,0)?></td>

      </tr>

       <?php }?>

       <?php }?>

    </tbody>

 <?php }?>   

</table>

</body>

</html>