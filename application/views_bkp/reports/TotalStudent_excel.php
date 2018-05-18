<?php

header("Content-type: application/vnd.ms-excel");

header("Content-Disposition: attachment;Filename=total_student.xls");

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

            font-family: "Times New Roman",sans-serif;

        }



        @page {

            size: 8in 11.3in;

            margin: 1cm

        }



        table {

            border: none;

            border-collapse: collapse;

            font-size: 12px;

            width: 100%

        }



        th {padding: 0; text-align: center; vertical-align: middle}



        td {padding: 0 1px; text-align: center}



        .left {float: left}

        .right {float: right}

        .blue {color: #000179}

        .bold {font-weight: bold}

        .italic {font-style: italic}

        .large {font-size: 15px}

        .larger {font-size: 18px}

        .largest {font-size: 20px}



        table.data thead > tr:last-child > th {border-top: 1px solid; border-right:1px solid transparent; border-left: 1px solid transparent}

        table.data th {font-weight: bold}

        table.data tbody > tr > td:last-child {color:blue; font-weight: bold}

        table.data tr.blue td {color: blue; border-color: blue}

        table.data tr > td:first-child {text-align: left}

        table.data tr.blue > td {font-weight: bold}

        table.data tr.blue > td:first-child {text-align: right}

        table.data tbody tr> td:last-child {color: blue; font-weight: bold}



        table.grandtotal { color: brown; font-weight: bold;/*position: fixed; bottom: 0;*/}

        table.grandtotal td {border-bottom: 1px solid brown}

        h2 {text-decoration: underline; padding: 0; margin-top: 15px; margin-bottom: 5px; text-align: center}

        -->

    </style>

</head>

<body>

<table>

    <thead>

    <tr>

        <th><img src="<?php echo base_url();?>assets/img/Certificate1st-top.jpg" alt="" style="width: 100%; padding: 0; margin: 0"></th>

    </tr>

    <tr>

        <th style="padding-top: 8px"><span class="left bold larger">Ref: </span><span class="right bold italic larger"><?php echo date('d-M-Y');?></span></th>

    </tr>

    </thead>

    <tbody>

    <tr>

        <td>

        <?php 

		        $male_gsum='';

				$female_gsum='';

				$male_gen_gsum='';

				$female_gen_gsum='';

				$tran_gen_gsum='';

				$male_obca_gsum='';

				$female_obca_gsum='';

				$tran_obca_gsum='';

				$male_obcb_gsum='';

				$female_obcb_gsum='';

				$tran_obcb_gsum='';

				$male_sc_gsum='';

				$female_sc_gsum='';

				$tran_sc_gsum='';

				$male_st_gsum='';

				$female_st_gsum='';

				$tran_st_gsum='';

				$male_hindu_gsum='';

				$female_hindu_gsum='';

				$tran_hindu_gsum='';

				$male_islam_gsum='';

				$female_islam_gsum='';

				$tran_islam_gsum='';

				$total_gsum='';

		for($yr=1;$yr<=3;$yr++){?>

            <h2><?php echo $yr;if($yr==1){echo 'st';}if($yr==2){echo 'nd';}if($yr==3){echo 'rd';}?> year student Strength and Seats for the session <?php echo $session;?> </h2>

            <table class="data">

                <thead>

                <tr>

                    <th rowspan="2">Subjects</th>

                    <th colspan="2">Sex</th>

                    <th colspan="3">Gen</th>

                    <th colspan="3">OBC-A</th>

                    <th colspan="3">OBC-B</th>

                    <th colspan="3">SC</th>

                    <th colspan="3">ST</th>

                    <th colspan="3">Islam</th>

                    <th colspan="3">Hindu</th>

                    <th rowspan="2">Total</th>

                </tr>

                <tr>

                    <th>M</th>

                    <th>F</th>

                    <th>M</th>

                    <th>F</th>

                    <th>T</th>

                    <th>M</th>

                    <th>F</th>

                    <th>T</th>

                    <th>M</th>

                    <th>F</th>

                    <th>T</th>

                    <th>M</th>

                    <th>F</th>

                    <th>T</th>

                    <th>M</th>

                    <th>F</th>

                    <th>T</th>

                    <th>M</th>

                    <th>F</th>

                    <th>T</th>

                    <th>M</th>

                    <th>F</th>

                    <th>T</th>

                </tr>

                </thead>

                <tbody>

                <?php 

				$male_sum='';

				$female_sum='';

				$male_gen_sum='';

				$female_gen_sum='';

				$tran_gen_sum='';

				$male_obca_sum='';

				$female_obca_sum='';

				$tran_obca_sum='';

				$male_obcb_sum='';

				$female_obcb_sum='';

				$tran_obcb_sum='';

				$male_sc_sum='';

				$female_sc_sum='';

				$tran_sc_sum='';

				$male_st_sum='';

				$female_st_sum='';

				$tran_st_sum='';

				$male_hindu_sum='';

				$female_hindu_sum='';

				$tran_hindu_sum='';

				$male_islam_sum='';

				$female_islam_sum='';

				$tran_islam_sum='';

				$total_sum='';

				

				

				/*$ses_array = explode("-", $session);

				

				if($yr==1)

				{

					$session = $session;	

				}

				else if($yr==2)

				{

					echo $session = ($ses_array[0]-1)."-".($ses_array[1]-1);	

				}

				else if($yr==3)

				{

					echo $session = ($ses_array[0]-1)."-".($ses_array[1]-1);	

				}*/

				

				//echo 'select * from td_student_details where year='.$yr.' and session_year="'.$session.'" and student_status="Present"';

				
                if($yr==1){
				$chk=$this->db->query('select * from td_student_details where year='.$yr.' and session_year="'.$session.'" and student_status="Present" and registration=1')->num_rows();}
				else
				{
				$chk=$this->db->query('select * from td_student_details where year='.$yr.' and session_year="'.$session.'" and student_status="Present" and is_final=1')->num_rows();
				}

				if($chk>0){

				for($sub=1;$sub<=17;$sub++){

					

					 $subject=$this->db->query('select g.*,s.stream_name from td_subject_group g JOIN td_student_stream s ON g.stream_id=s.stream_id where g.grp_id="'.$sub.'"')->row();
                     if($yr==1){
					 $male=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and student_status="Present" and registration=1')->num_rows();$male_sum += $male;
					 }else
					 {
					 $male=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and student_status="Present" and is_final=1')->num_rows();$male_sum += $male;
					 }

					 
                      if($yr==1){
					 $female=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and student_status="Present" and registration=1')->num_rows();$female_sum += $female;
					 }else
					 {
					 $female=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and student_status="Present" and is_final=1')->num_rows();$female_sum += $female;
					 }

					 
                     if($yr==1){
					 $male_gen=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="GEN" and student_status="Present" and registration=1')->num_rows();$male_gen_sum += $male_gen;
					 }else
					 {
					 $male_gen=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="GEN" and student_status="Present" and is_final=1')->num_rows();$male_gen_sum += $male_gen;
					 }

					 
                    if($yr==1){
					 $female_gen=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="GEN" and student_status="Present" and registration=1')->num_rows();$female_gen_sum += $female_gen;
					 }else
					 {
					 $female_gen=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="GEN" and student_status="Present" and is_final=1')->num_rows();$female_gen_sum += $female_gen;
					 }

  					 
                    if($yr==1){
					 $tran_gen=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="GEN" and student_status="Present" and registration=1')->num_rows();$tran_gen_sum += $tran_gen;
					 }else
					 {
					 $tran_gen=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="GEN" and student_status="Present" and is_final=1')->num_rows();$tran_gen_sum += $tran_gen;
					 }

					 
                   if($yr==1){
					 $male_obca=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="OBC-A" and student_status="Present" and registration=1')->num_rows();$male_obca_sum += $male_obca;
					 }else
					 {
					 $male_obca=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="OBC-A" and student_status="Present" and is_final=1')->num_rows();$male_obca_sum += $male_obca;
					 }

					 
                      if($yr==1){
					 $female_obca=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="OBC-A" and student_status="Present" and registration=1')->num_rows();$female_obca_sum += $female_obca;
					 }else
					 {
					 $female_obca=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="OBC-A" and student_status="Present" and is_final=1')->num_rows();$female_obca_sum += $female_obca;
					 }

					 
                     if($yr==1){
					 $tran_obca=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="OBC-A" and student_status="Present" and registration=1')->num_rows();$tran_obca_sum += $tran_obca;
					 }else
					 {
					 $tran_obca=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="OBC-A" and student_status="Present" and is_final=1')->num_rows();$tran_obca_sum += $tran_obca;
					 }

					 
                     if($yr==1){
					 $male_obcb=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="OBC-B" and student_status="Present" and registration=1')->num_rows();$male_obcb_sum += $male_obcb;
					 }else
					 {
					 $male_obcb=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="OBC-B" and student_status="Present" and is_final=1')->num_rows();$male_obcb_sum += $male_obcb;
					 }

					 
                       if($yr==1){
					 $female_obcb=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="OBC-B" and student_status="Present" and registration=1')->num_rows();$female_obcb_sum += $female_obcb;
					 }else
					 {
					 $female_obcb=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="OBC-B" and student_status="Present" and is_final=1')->num_rows();$female_obcb_sum += $female_obcb;
					 }
                      
					  if($yr==1){
					 $tran_obcb=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="OBC-B" and student_status="Present" and registration=1')->num_rows();$tran_obcb_sum += $tran_obcb;
					 }else
					 {
					 $tran_obcb=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="OBC-B" and student_status="Present" and is_final=1')->num_rows();$tran_obcb_sum += $tran_obcb;
					 }

                     if($yr==1){  
					 $male_sc=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="SC" and student_status="Present" and registration=1')->num_rows();$male_sc_sum += $male_sc;
					 }else
					 {
					 $male_sc=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="SC" and student_status="Present" and is_final=1')->num_rows();$male_sc_sum += $male_sc;
					 }
                      
					  if($yr==1){
					 $female_sc=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="SC" and student_status="Present" and registration=1')->num_rows();$female_sc_sum += $female_sc;
					 }else
					 {
					 $female_sc=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="SC" and student_status="Present" and is_final=1')->num_rows();$female_sc_sum += $female_sc;
					 }

                     if($yr==1){
					 $tran_sc=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="SC" and student_status="Present" and registration=1')->num_rows();$tran_sc_sum += $tran_sc;
					 }else
					 {
					 $tran_sc=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="SC" and student_status="Present" and is_final=1')->num_rows();$tran_sc_sum += $tran_sc;
					 }

                     if($yr==1){
					 $male_st=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="ST" and student_status="Present" and registration=1')->num_rows();$male_st_sum += $male_st;
					 }else
					 {
					 $male_st=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="ST" and student_status="Present" and is_final=1')->num_rows();$male_st_sum += $male_st;
					 }
                      
					  if($yr==1){
					 $female_st=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="ST" and student_status="Present" and registration=1')->num_rows();$female_st_sum += $female_st;
					 }else
					 {
					 $female_st=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="ST" and student_status="Present" and is_final=1')->num_rows();$female_st_sum += $female_st;
					 }
                     
					 if($yr==1){
					 $tran_st=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="ST" and student_status="Present" and registration=1')->num_rows();$tran_st_sum += $tran_st;
					 }else
					 {
					 $tran_st=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and caste="ST" and student_status="Present" and is_final=1')->num_rows();$tran_st_sum += $tran_st;
					 }

					 if($yr==1){
					 $male_hindu=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and religion="HINDU" and student_status="Present" and registration=1')->num_rows();$male_hindu_sum += $male_hindu;
					 }else
					 {
					 $male_hindu=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and religion="HINDU" and student_status="Present" and is_final=1')->num_rows();$male_hindu_sum += $male_hindu;
					 }

					 if($yr==1){
					 $female_hindu=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and religion="HINDU" and student_status="Present" and registration=1')->num_rows();$female_hindu_sum += $female_hindu;
					 }else
					 {
					 $female_hindu=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and religion="HINDU" and student_status="Present" and is_final=1')->num_rows();$female_hindu_sum += $female_hindu;
					 }

					 if($yr==1){
					 $tran_hindu=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and religion="HINDU" and student_status="Present" and registration=1')->num_rows();$tran_hindu_sum += $tran_hindu;
					 }else
					 {
					 $tran_hindu=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and religion="HINDU" and student_status="Present" and is_final=1')->num_rows();$tran_hindu_sum += $tran_hindu;
					 }

					 if($yr==1){
					 $male_islam=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and student_status="Present" and (religion="ISLAM" OR religion="MUSLIM") and registration=1')->num_rows();$male_islam_sum += $male_islam;
					 }else
					 {
					 $male_islam=$this->db->query('select * from td_student_details where sex="M" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and student_status="Present" and (religion="ISLAM" OR religion="MUSLIM") and is_final=1')->num_rows();$male_islam_sum += $male_islam;
					 }

					 if($yr==1){
					 $female_islam=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and student_status="Present" and (religion="ISLAM" OR religion="MUSLIM") and registration=1')->num_rows();$female_islam_sum += $female_islam;
					 }else
					 {
					 $female_islam=$this->db->query('select * from td_student_details where sex="F" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and student_status="Present" and (religion="ISLAM" OR religion="MUSLIM") and is_final=1')->num_rows();$female_islam_sum += $female_islam;
					 }

					 if($yr==1){
					 $tran_islam=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and student_status="Present" and (religion="ISLAM" OR religion="MUSLIM") and is_final=1')->num_rows();$tran_islam_sum += $tran_islam;
					 }else
					 {
					 $tran_islam=$this->db->query('select * from td_student_details where sex="T" and subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and student_status="Present" and (religion="ISLAM" OR religion="MUSLIM") and registration=1')->num_rows();$tran_islam_sum += $tran_islam;
					 }

					 if($yr==1){
					 $total=$this->db->query('select * from td_student_details where subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and student_status="Present" and registration=1')->num_rows();$total_sum += $total;
					 }else
					 {
					 $total=$this->db->query('select * from td_student_details where subject_group='.$sub.' and year='.$yr.' and session_year="'.$session.'" and student_status="Present" and is_final=1')->num_rows();$total_sum += $total;
					 }

					?>

                <tr>

                    <td><?php echo $subject->stream_name." ".$subject->subject_1;?></td>

                    <td><?php echo $male;?></td>

                    <td><?php echo $female;?></td>

                    <td><?php echo $male_gen;?></td>

                    <td><?php echo $female_gen;?></td>

                    <td class="bold"><?php echo $tran_gen;?></td>

                    <td><?php echo $male_obca;?></td>

                    <td><?php echo $female_obca;?></td>

                    <td class="bold"><?php echo $tran_obca;?></td>

                    <td><?php echo $male_obcb;?></td>

                    <td><?php echo $female_obcb;?></td>

                    <td class="bold"><?php echo $tran_obcb;?></td>

                    <td><?php echo $male_sc;?></td>

                    <td><?php echo $female_sc;?></td>

                    <td class="bold"><?php echo $tran_sc;?></td>

                    <td><?php echo $male_st;?></td>

                    <td><?php echo $female_st;?></td>

                    <td class="bold"><?php echo $tran_st;?></td>

                    <td><?php echo $male_islam;?></td>

                    <td><?php echo $female_islam;?></td>

                    <td class="bold"><?php echo $tran_islam;?></td>

                    <td><?php echo $male_hindu;?></td>

                    <td><?php echo $female_hindu;?></td>

                    <td class="bold"><?php echo $tran_hindu;?></td>

                    <td><?php echo $total;?></td>

                </tr>

                <?php 

				}

				?>

                <tr class="blue">

                    <td>Total Student</td>

                    <td><?php echo $male_sum;?></td>

                    <td><?php echo $female_sum?></td>

                    <td><?php echo $male_gen_sum?></td>

                    <td><?php echo $female_gen_sum?></td>

                    <td class="bold"><?php echo $tran_gen_sum?></td>

                    <td><?php echo $male_obca_sum?></td>

                    <td><?php echo $female_obca_sum?></td>

                    <td class="bold"><?php echo $tran_obca_sum?></td>

                    <td><?php echo $male_obcb_sum?></td>

                    <td><?php echo $female_obcb_sum?></td>

                    <td class="bold"><?php echo $tran_obcb_sum?></td>

                    <td><?php echo $male_sc_sum?></td>

                    <td><?php echo $female_sc_sum?></td>

                    <td class="bold"><?php echo $tran_sc_sum?></td>

                    <td><?php echo $male_st_sum?></td>

                    <td><?php echo $female_st_sum?></td>

                    <td class="bold"><?php echo $tran_st_sum?></td>

                    <td><?php echo $male_islam_sum?></td>

                    <td><?php echo $female_islam_sum?></td>

                    <td class="bold"><?php echo $tran_islam_sum?></td>

                    <td><?php echo $male_hindu_sum?></td>

                    <td><?php echo $female_hindu_sum?></td>

                    <td class="bold"><?php echo $tran_hindu_sum?></td>

                    <td><?php echo $total_sum;?></td>

                </tr>

                <?php }

				$male_gsum += $male_sum;

				$female_gsum += $female_sum;

				$male_gen_gsum += $male_gen_sum;

				$female_gen_gsum += $female_gen_sum;

				$tran_gen_gsum += $male_sum;

				$male_obca_gsum += $male_obca_sum;

				$female_obca_gsum += $female_obca_sum;

				$tran_obca_gsum += $tran_obca_sum;

				$male_obcb_gsum += $male_obcb_sum;

				$female_obcb_gsum += $female_obcb_sum;

				$tran_obcb_gsum += $tran_obcb_sum;

				$male_sc_gsum += $male_sc_sum;

				$female_sc_gsum += $female_sc_sum;

				$tran_sc_gsum += $tran_sc_sum;

				$male_st_gsum += $male_st_sum;

				$female_st_gsum += $female_st_sum;

				$tran_st_gsum += $tran_st_sum;

				$male_islam_gsum += $male_islam_sum;

				$female_islam_gsum += $female_islam_sum;

				$tran_islam_gsum += $tran_islam_sum;

				$male_hindu_gsum += $male_hindu_sum;

				$female_hindu_gsum += $female_hindu_sum;

				$tran_hindu_gsum += $tran_hindu_sum;

				$total_gsum += $total_sum;

				?>

                </tbody>

            </table>

       <?php }?> 

          <table class="grandtotal">

                <tbody>

                <tr>

                    <td>Grand Total</td>

                    <td><?php echo $male_gsum;?></td>

                    <td><?php echo $female_gsum?></td>

                    <td><?php echo $male_gen_gsum?></td>

                    <td><?php echo $female_gen_gsum?></td>

                    <td class="bold"><?php echo $tran_gen_gsum?></td>

                    <td><?php echo $male_obca_gsum?></td>

                    <td><?php echo $female_obca_gsum?></td>

                    <td class="bold"><?php echo $tran_obca_gsum?></td>

                    <td><?php echo $male_obcb_gsum?></td>

                    <td><?php echo $female_obcb_gsum?></td>

                    <td class="bold"><?php echo $tran_obcb_gsum?></td>

                    <td><?php echo $male_sc_gsum?></td>

                    <td><?php echo $female_sc_gsum?></td>

                    <td class="bold"><?php echo $tran_sc_gsum?></td>

                    <td><?php echo $male_st_gsum?></td>

                    <td><?php echo $female_st_gsum?></td>

                    <td class="bold"><?php echo $tran_st_gsum?></td>

                    <td><?php echo $male_islam_gsum?></td>

                    <td><?php echo $female_islam_gsum?></td>

                    <td class="bold"><?php echo $tran_islam_gsum?></td>

                    <td><?php echo $male_hindu_gsum?></td>

                    <td><?php echo $female_hindu_gsum?></td>

                    <td class="bold"><?php echo $tran_hindu_gsum?></td>

                    <td><?php echo $total_gsum;?></td>

                </tr>

                </tbody>

            </table>    

        </td>

    </tr>

    </tbody>

</table>

</body>

</html>