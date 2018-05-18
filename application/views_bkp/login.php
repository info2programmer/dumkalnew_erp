<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DUMKAL COLLEGE - ERP Software</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/custom_style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Pavanam" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

<!-------------------For Navbar ----------------------------------------------------------------->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-------------------For Navbar ----------------------------------------------------------------->
</head>
<body style="background: linear-gradient(#ffffff 50%, rgba(255,255,255,0) 0) 0 0,
radial-gradient(circle closest-side, #FFFFFF 53%, rgba(255,255,255,0) 0) 0 0,
radial-gradient(circle closest-side, #FFFFFF 50%, rgba(255,255,255,0) 0) 55px 0 #48B;
background-size:110px 200px;
background-repeat:repeat-x;">
<div class="container">
  <div class="row">
    <div class="col-md-12 col-xs-12 text-center"><img src="http://dumkalcollege.org//assets/images/logo.jpg" /></div>
    
    <div class="col-md-4"></div>
    <div class="col-md-4 well" style="margin-top:150px; ">
      <h4 style="font-family: 'Roboto Slab', serif; font-size:25px; color:#003366; font-weight:bold;"><i class="fa fa-university"></i> DUMKAL COLLEGE</h4>
      <div id="flogin" style="display:block;">
      <form class="form-signin" name="loginform" id="loginform" action="<?php echo base_url();?>login" method="post">
        
                <div class="alert alert-danger" id="false" style="display:none;">
                  
                </div>
       
       
        <h6 class="form-signin-heading" style="color:#009900;"><i class="fa fa-lock"></i> Secured Admin Login</h6>
        <label class="sr-only">Username</label>
        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" autofocus required>
        <br />
        <label  class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <br />
        <button class="btn btn-lg btn-success btn-block" type="button" onclick="return chklogpass()">Log In</button>
      </form>
      </div>
      <div id="lotp" style="display:none;">
       <form class="form-signin" name="otpform" id="otpform" action="<?php echo base_url();?>login/verifyotp" method="post">
        <input type="hidden" name="user_id" id="user_id" value="" />
        <input type="hidden" name="user_otp" id="user_otp" value="" />
       
                <div class="alert alert-success" id="truse">
                 
                </div>
                <div class="alert alert-danger" id="false" style="display:none;">
                  
                </div>
       
        <h6 class="form-signin-heading" style="color:#009900;"><i class="fa fa-lock"></i> Verify OTP</h6>
        <label class="sr-only">Username</label>
        <input type="text" name="inputotp" id="inputotp" class="form-control" placeholder="OTP" autofocus>
        
        
        <button class="btn btn-lg btn-success btn-block" type="button" onclick="return logverify()"><span id="vfybtn">Verify</span> <i class="fa fa-spinner fa-spin" aria-hidden="true" id="spinid" style="display:none;"></i></button>
      </form>
      </div>
    </div>
  </div>
  <div class="col-md-4" style="height:170px;"></div>
</div>
</div>
<?php include "include/footer.php";?>
<script>
function chklogpass(){
var form = $('#loginform');

    $.ajax( {
      type: "POST",
      url: form.attr( 'action' ),
      data: form.serialize(),
      success: function( response ) {
	  var res = response.split("/");
       if(res[0] == 'OK'){
	   $('#flogin').css('display','none');
	    $('#lotp').css('display','block');
	   $('#user_id').val(res[1]);
	   $('#user_otp').val(res[2]);
	   var mgsd = 'Please Verify OTP sent to your Mobile';
	   $('#truse').text(mgsd);
	   } else {
	   var mgsd = res[1];
	   $('#false').css('display','block');
	   $('#false').text(mgsd);
	   $('#flogin').css('display','block');
	   $('#lotp').css('display','none');
	   }
      }
    } );
  
}

function logverify(){
var form = $('#otpform');

    $.ajax( {
      type: "POST",
      url: form.attr( 'action' ),
      data: form.serialize(),
      success: function( res ) {
	 
       if(res == 'OK'){
	   var mgsd = 'Verified! Please Wait..';
	   $('#false').css('display','none');
	    $('#truse').css('display','block');
	   $('#truse').text(mgsd);
	   $('#spinid').css('display','block');
	   $('#vfybtn').text('Processing.. ');
	   window.setTimeout(function() {
    window.location.href = '<?php echo base_url();?>home';
}, 3000);
	   
	   } else {
	   var mgsd = 'OTP do not match';
	   $('#false').css('display','block');
	   $('#false').text(mgsd);
	   $('#truse').css('display','none');
	  
	   }
      }
    } );
  
}
</script>
</body>
</html>
