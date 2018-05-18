<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>library Card Print</title>
    <style>
	@media print{@page {size: portrait}}
        html, body {padding: 0; margin: 0; font-family: Arial,sans-serif;}
        .page {height: 18in; width: 12in; padding: 2mm; }
        .page, .page * {-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}

        .card {border: 1mm solid darkblue; width: 94mm; height: 60mm; padding: 1mm; margin-right: 3mm; display: table; float: left; margin-bottom: 4mm; position: relative}
        .card {
            /*background: #e4efc0 url(img/bg.png); 
            background: url(img/bg.png), -moz-linear-gradient(135deg,  #e4efc0 30%, #6cc93a 100%); 
            background: url(img/bg.png), -webkit-linear-gradient(135deg,  #e4efc0 30%,#6cc93a 100%); 
            background: url(img/bg.png), linear-gradient(135deg,  #e4efc0 30%,#6cc93a 100%); 
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e4efc0', endColorstr='#6cc93a',GradientType=1 ); */
        }
        .card:nth-child(2n) {margin-right: 3mm;}

        .student-id {font-weight: bold; font-size: 11px; color: blue; position: absolute; top: 1mm; left: 1mm}
        .logo {float: right; width: 50px; position: absolute; right: 1mm; top: 1mm}
        .institute {text-align: center; font-size: 14px; font-weight: bold; padding-left: 13mm; margin-top: -0.5mm; color: blue}
        .institute {text-align: center; font-size: 14px; font-weight: bold; padding-left: 13mm; margin-top: -0.5mm; color: blue}
        .photo {border: 1mm solid darkblue; width: 26mm; height: 28mm; position: absolute; top: 4mm; left: 1mm; display: table}
        .card-type {text-align: center; font-size: 16px; font-weight: bold; color: white; background: maroon; margin-left: 29mm; width: 46mm; padding: 1mm}
        .year {margin-left: 29mm; margin-top: 2mm; width: 20mm; color: blue; font-size: 12px; font-weight: bold;}
        .roll {margin-left: 49mm; margin-top: -3.5mm; width: 20mm; color: maroon; font-size: 12px; font-weight: bold;}
        .course {margin-left: 29mm; margin-top: 1mm; width: 50mm; color: maroon; font-size: 14px; font-weight: bold;}
        .subjects {margin-left: 29mm; margin-top: 1mm; width: 50mm; color: maroon; font-size: 12px; font-weight: bold;}
        table {clear: both; font-size: 12px; margin-top: 2mm; color: blue}
        table tr > td:nth-child(2) {font-weight: bold; color: darkblue}
        table tr:first-child > td:last-child {color: red}
        .barcode {position: absolute; padding: 1mm 0mm; background: white; top: 39mm; left: 1mm;}
        .date-issue {font-size: 12px; font-weight: bold; margin-top: 1mm; margin-left: 46mm; color: maroon}
        .date-valid {font-size: 12px; font-weight: bold; margin-top: 1.5mm; margin-left: 46mm; color: maroon}
        .sig-cont {width: 100%; margin-top: 3mm; position: relative; display: table}
        .sig-cont .sig-box-right {width: 55%; float: right; text-align: center}
        .sig-cont .sig-box-left {width: 35%; float: left; text-align: center}
        .sig-cont .img {width: 80%; height: 12mm; background: transparent; border-bottom: 1px solid black; background-size: contain; display: inline-block}
        .sig-cont .sig-box-right .sig-type {font-size: 11px; font-weight: bold; color: blue}
        .sig-cont .sig-box-left .sig-type {font-size: 11px; font-weight: bold; color: maroon}
		.sig-cont .sign {margin-top: 5mm; width: 106px; height: 22px; margin-left: -11px;}
		.page-breaker {page-break-after:always;float:none;clear:both}
		.page-no-breaker {float:none;clear:both}
		.card-group{float:left; page-break-inside:avoid;}
		.card-group:nth-child(3n+1) {clear:left;}
		.card-group .card{clear:both;}
    </style>
</head>
<body>
<div class="page">
<div class="card-group"> 
<?php 
$i=0;
 foreach($profile as $card) { 
$i++;
    ?>
   
    <div class="card">

        <img src="<?php echo base_url();?>assets/employee/img/logo.png" alt="" class="logo">
        <div class="student-id"> ID <?php echo $card['emp_id'];?></div>
        <div class="institute">
            Dumkal College, Basantapur<br>Dumkal, Murshidabad
        </div>
        <img src="<?php echo base_url();?>employee/img/<?php echo $card['photo'];?>" class="photo">
        <!-- <img src="img/passport-sample.jpg" alt="" class="photo"> -->
        <div class="card-type">library Lending Card</div>
        <div class="subjects"><?php echo $card['name'];?></div>
        <div class="subjects"><?php echo $card['designation'];?></div>
        <table>
            <tr>
                <td><img src="<?php echo base_url();?>index.php/main/show_barcode/<?php echo $card['emp_id'];?>" alt="" class="barcode" style="margin-top:-25px;"></td>
                <td></td>
            </tr>
        </table>

      <div class="date-issue">Date of Issue: <?php echo date('d-M-Y')?></div>
        <div class="sig-cont">
            <div class="sig-box-right">
                <div class="img" style="background: url(#) center center;"></div>
                <div class="sig-type">Signature of the issuing Authority</div>
            </div>
            <div class="sig-box-left">
                <div class="img" style="background: url(#) center center;">
                <?php /*?><img src="http://dumkalcollege.org/ONLINE_APPLICATION/candidate/sign/<?php echo $card['student_signature'];?>"  class="sign"><?php */?>
                </div>
                <div class="sig-type">Signature of Employee</div>
            </div>
        </div>
    </div>
    
    <?php if($i%6==0){?>
    </div>
    <div class="card-group">
    <?php } 
	 } ?>

</div>
</body>
</html>