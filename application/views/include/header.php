<section id="topbar">
<div class="container">
	<div class="row">
    	<div class="col-md-8 spacing">
        <span style="font-family: 'Roboto Slab', serif; font-size:40px; font-weight:bold;"><i class="fa fa-university"></i> DUMKAL COLLEGE</span><br />
        <p style="font-family: 'Roboto Slab', serif; font-size:14px; margin-top:-7px;"> Affiliated to University of Kalyani | Accredited by NAAC "B" Grade </p>
        </div>
        
        <div class="col-md-4" style="padding-top:15px;">
        <p class="spacing text-right" style="font-family: 'Roboto Slab', serif;  margin-top:5px;">
        <span style="font-size:18px;">College ERP Software Ver 2.0</span><br />
        <span style="font-size:12px;"><button class="btn btn-success btn-xs"><i class="fa fa-user"></i> Welcome <?php echo $this->session->userdata('username');?>  </button>
        <span style="font-size:12px;"><a class="span4 proj-div btn btn-info btn-xs" onClick="pchngmodal('<?php echo $this->session->userdata('user_id');?>')"> <i class="fa fa-key" aria-hidden="true"></i> Change Password</a></span>
        <a  class="span4 proj-div btn btn-danger btn-xs" href="<?php echo base_url() ?>logout"><i class="fa fa-sign-out"></i> Log Out</a></span>
        
        </p>
        </div>
	</div>
</div>
</section> <!--Topbar-->

<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12">
                 <nav class="navbar navbar-inverse">
              
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                  </button>
                  <a class="navbar-brand" href="<?php echo base_url();?>home"><i class="fa fa-home" style="color:#FFFFFF;"></i></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                  <?php if($this->session->userdata('username') =='Naim'){?>
                    <li class="active"><a class="dropdown-toggle" data-toggle="dropdown"href="#">Access Management <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>createfunction">Create Function</a></li>
                        <li><a href="<?php echo base_url(); ?>createdepartment">Create Department</a></li>
                        <li><a href="<?php echo base_url(); ?>createactivity">Create Activity</a></li>
                        <li><a href="<?php echo base_url(); ?>createuser">Create User</a></li>
                        <li><a href="<?php echo base_url(); ?>giveaccess">Give Access</a></li>
                      </ul>
                    </li>
                    <?php
					} 
					$modules = $this->db->query("select * from tbl_department")->result();
					if($modules) { foreach($modules as $module) {
						$activities = $this->db->query("select * from tbl_activity where departmet_id='$module->departmet_id' AND publish=1")->result();
					?>
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      	<?php echo $module->department_name; ?><span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                      <?php
                      if($activities) { foreach($activities as $activity) {
                      ?>
                      <?php if ($module->departmet_id==10): ?>
                        <li><a href="<?php echo base_url(); ?>Student/StudentDetails/<?php echo $activity->controller_name;?>/<?php echo $module->departmet_id.'/'.$activity->activity_id.'/'.$this->session->userdata('user_id'); ?>"><?php echo $activity->activity_name;?></a></li>
                      <?php else: ?>
                          <li><a href="<?php echo base_url(); ?><?php echo str_replace(' ','',$module->department_name) ?>/<?php echo str_replace(' ','',$module->department_name) ?>Details/<?php echo $activity->controller_name;?>/<?php echo $module->departmet_id.'/'.$activity->activity_id.'/'.$this->session->userdata('user_id'); ?>"><?php echo $activity->activity_name;?></a></li>
                      <?php endif ?>
                        
                      <?php } } ?>
                      </ul>
                    </li>
                    <?php } }?>
                    <!--<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 2 <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        <li><a href="#">Page 2-1</a></li>
                        <li><a href="#">Page 2-2</a></li>
                        <li><a href="#">Page 2-3</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Page 3</a></li>-->
                  </ul>
                  
                </div>
              
            </nav>
        </div>
</div>
</div>
<div id="pchangeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">  </button>
        <h4 class="modal-title alert alert-danger" id="myModalLabel"><i class="fa fa-key"></i> Change Password</h4>
      </div>
      <span id="msgbox"></span>
      <div id="passmatch" style="display:block;">
      <form name="registrar" id="passchange" action="<?php echo base_url();?>login/checkpassmatch" method="post" enctype="multipart/form-data">
      
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-6">
            <strong>Old Password</strong><br/>
            	<input type="text" name="old_pass" class="form-control"/>
            </div>
            <div class="col-md-6">
            <strong>New Password</strong><br/>
            	<input type="text" name="new_pass" class="form-control"/>
                <h6 style="color:#FF3C3C;"><i class="fa fa-exclamation-triangle"></i> Warning : Do not share or write anywhere</h6>
            </div>
            
        </div>
      </div>
     
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="chkpass()">Proceed</button>
      </div>
       </form>
       </div>
       <div id="otpverifypanel" style="display:none;">
       
       <form name="otp" id="otpverify" action="<?php echo base_url();?>login/updatepass/<?php echo $this->session->userdata('user_id'); ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="newpass" id="newpass" value="" />
      <input type="hidden" name="otp_chpass" id="otp_chpass" value="" />
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-4">
            <strong>OTP</strong><br/>
            	<input type="text" name="otp" class="form-control"/>
            </div>
            
            
        </div>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form>
       </div>
    </div>
  </div>
</div>
<script>
function chkpass(){
var form = $('#passchange');

    $.ajax( {
      type: "POST",
      url: form.attr( 'action' ),
      data: form.serialize(),
      success: function( response ) {
	  var res = response.split("-");
       if(res[0] == 'OK'){
	   $('#otp_chpass').val(res[1]);
	   $('#newpass').val(res[2]);
	   var mgsd = 'Please Verify OTP sent to your Mobile';
	   $('#msgbox').text(mgsd);
	   $('#passmatch').css('display','none');
	   $('#otpverifypanel').css('display','block');
	   } else {
	   var mgsd = 'Password do not match';
	   $('#msgbox').text(mgsd);
	   $('#passmatch').css('display','block');
	   $('#otpverifypanel').css('display','none');
	   }
      }
    } );
  
}
</script>