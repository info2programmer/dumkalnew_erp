<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "include/head.php";?>
<style type="text/css">

@font-face {
    font-family: 'BebasNeueRegular';
    src: url('BebasNeue-webfont.eot');
    src: url('BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
         url('BebasNeue-webfont.woff') format('woff'),
         url('BebasNeue-webfont.ttf') format('truetype'),
         url('BebasNeue-webfont.svg#BebasNeueRegular') format('svg');
    font-weight: normal;
    font-style: normal;

}



.clock {width:800px; margin:0 auto; padding:30px; color:#FF0000; height:360px; }

#Date { font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; font-size:36px; text-align:center; text-shadow:0 0 3px rgba(120,16,26,0.9); }

ul.logdtl { width:300px; margin:0 auto; padding:0px; list-style:none; text-align:center; }
ul.clk { width:800px; margin:0 auto; padding:0px; list-style:none; text-align:center; }
ul.clk li { display:inline; font-size:10em; text-align:center; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; text-shadow:0 0 3px rgba(120,16,26,0.9); }

#point { position:relative; -moz-animation:mymove 1s ease infinite; -webkit-animation:mymove 1s ease infinite; padding-left:10px; padding-right:10px; }

@-webkit-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 10px rgba(180,38,56,1);}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 10px rgba(180,38,56,1); }	
}


@-moz-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 10px rgba(180,38,56,1);}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 10px rgba(180,38,56,1); }	
}

</style>

</head>

<body>
<?php include "include/header.php";?>

<section id="dashboardbody">
<div class="container" style="min-height:450px;">
<center><h2 class="alert alert-info"><i class="fa fa-pie-chart fa-spin"></i> Admin Dashboard</h2></center>
	<div class="row">
     
       <div class="col-md-6">
           <table style="width:100%" class="table table-borderd">
             <thead>
               <tr>
                 <th colspan="3" style="background:#222222; color:#FFFFFF; padding:5px"> <i class="fa fa-user"></i> Personal Details</th>
               </tr>
             </thead>
             <tbody>
             <tr>
                 <td width="32%" style=" padding:5px">Name</td>
                 <td width="5%" style=" padding:5px">:</td>
                 <td width="63%" style=" padding:5px"><?php echo $userDetails[0]['name'];?></td>
               </tr>
               <tr>
                 <td style="padding:5px">Username</td>
                 <td style="padding:5px">:</td>
                 <td style="padding:5px"><?php echo $userDetails[0]['username'];?></td>
               </tr>
               
               <tr>
                 <td height="32" style="padding:5px">Password</td>
                 <td style=" padding:5px">:</td>
                 <td style=" padding:5px"><span style="color:#CC3300;">Encrypted for security reason</span></td>
               </tr>
               <tr>
                 <td bgcolor="#FFFFFF" style=" padding:5px">Mobile Number</td>
                 <td bgcolor="#FFFFFF" style="padding:5px">:</td>
                 <td bgcolor="#FFFFFF" style=" padding:5px"><?php echo $userDetails[0]['mobile'];?></td>
               </tr>
               <tr>
                 <td style=" padding:5px">Email Address</td>
                 <td style=" padding:5px">:</td>
                 <td style=" padding:5px"><?php echo $userDetails[0]['email'];?></td>
               </tr>
             </tbody>
           </table>
      </div>
       <div class="col-md-6">
           <table style="width:100%" class="table table-borderd">
             <thead>
               <tr>
                 <th colspan="3" style="background:#222222; color:#FFFFFF; padding:5px"> <i class="fa fa-history"></i> Login Details</th>
               </tr>
             </thead>
             <tbody>
               
                 <tr>
                 <td width="39%" style="padding:5px">Last Login Date / Time</td>
                 <td width="3%" style=" padding:5px">:</td>
                 <td width="58%" style=" padding:5px"><?php echo $loginDetails[0]['login_date'].' /'. $loginDetails[0]['login_time'];?></td>
               </tr>
               <?php if(!empty($loginDetails[1]['login_date'])){?>
               <tr>
                 <td style=" padding:5px">Previous Login Date / Time</td>
                 <td style=" padding:5px">:</td>
                 <td style="padding:5px"><?php echo $loginDetails[1]['login_date'].' /'. $loginDetails[1]['login_time'];?></td>
               </tr>
               <tr>
                 <td style=" padding:5px">Previous Login Date / Time</td>
                 <td style=" padding:5px">:</td>
                 <td style="padding:5px"><?php if(!empty($loginDetails[2]['login_date'])) echo $loginDetails[2]['login_date'].' /'. $loginDetails[2]['login_time'];?></td>
               </tr>
               <tr>
                 <td style=" padding:5px">Previous Login Date / Time</td>
                 <td style=" padding:5px">:</td>
                 <td style="padding:5px"><?php if(!empty($loginDetails[3]['login_date'])) echo $loginDetails[3]['login_date'].' /'. $loginDetails[3]['login_time'];?></td>
               </tr>
               <tr>
                 <td style=" padding:5px">Previous Login Date / Time</td>
                 <td style=" padding:5px">:</td>
                 <td style="padding:5px"><?php if(!empty($loginDetails[4]['login_date'])) echo $loginDetails[4]['login_date'].' /'. $loginDetails[4]['login_time'];?></td>
               </tr>  
               <?php } ?>
             </tbody>
           </table>
      </div>
 
	</div>
</div>
</section> <!-------------------Dashboardbody ----------------------------------------------------------------->

 <!-------------------Dashboardbody ----------------------------------------------------------------->

 

<?php include "include/footer.php";?>

</body>
</html>





