<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "include/head.php";?>
</head>

<body>
<?php include "include/header.php";?>

<section id="dashboardbody">
<div class="container">
	<div class="row">
     
        <div class="col-md-12 col-sm-12">
        <h4 class="alert alert-info">Create User</h4> 
        		<div class="alert alert-success">
                      <form class="form-horizontal" action="" method="post" name="userForm" id="userForm">

                        <?php if($this->session->flashdata('user_del_success_msg')!=''){?> 
                        <div class="alert alert-success">
                          <?php echo $this->session->flashdata('user_del_success_msg') ; ?>
                        </div>
                      <?php } ?>

                        
                        <?php if($this->session->flashdata('users_success_msg')!=''){?> 
                        <div class="alert alert-success">
                          <?php echo $this->session->flashdata('users_success_msg') ; ?>
                        </div>
                      <?php } ?>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="user">Name of the User :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name'); ?>" autofocus>
                          <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="userpwd">Mobile :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="mobile" name="mobile">
                          <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="userpwd">Email ID :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email">
                          <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2" for="userid">UserName:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" value="<?php echo set_value('username'); ?>" name="username" >
                          <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="userid">User ID (Auto) :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="user_id_auto" value="<?php echo set_value('user_id_auto'); ?>" name="user_id_auto" >
                          <?php echo form_error('user_id_auto', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="userpwd">Create Password :</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="password">
                          <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-sm-2" for="userpwd">Confirm Password :</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="conf_password" name="conf_password">
                          <?php echo form_error('conf_password', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>
                      
                     <!-- <div class="form-group">
                        <label class="control-label col-sm-2" for="choosedept">Choose Department :</label>
                        <div class="col-sm-10">
                          <select  class="form-control" id="department" name="department">
                            <option value="">Select</option>
                            <?php if(!empty($deaprtments)){ foreach ($deaprtments as $key => $value) { ?>
                                <option value="<?php echo $value->departmet_id ; ?>"><?php echo $value->department_name ; ?></option>
                           <?php } ?>    

                            <?php } ?>
                                
                          </select>
                          <?php echo form_error('department', '<div class="error">', '</div>'); ?>
                        </div>
                      </div>
                      <p class="text-right">Department is not in List? <a href="<?php echo base_url() ?>createdepartment">Add Now</a></p>-->
        
                      <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-circle"></i> Add User</button>
                        </div>
                      </div>
                    </form>
                 </div>
        </div>
	</div>
</div>
</section> <!--Dashboardbody -->

<section id="dashboardbody">
<div class="container">
	<div class="row">
     
        <div class="col-md-12 col-sm-12">
              <h4 class="alert alert-info">List of Users</h4>           
              	<div class="table-responsive">
              	<table width="1213" class="table table-bordered">
    <thead>
      <tr>
        <th width="68">Sl #</th>
        <th>Name of the Users</th>
        
        <th>User ID</th>
        <th>Password</th>
        <th width="313">Action</th>
      </tr>
    </thead>
    <tbody>

      <?php if(!empty($users)){  

       $i = 1;

        foreach ($users as $key => $value) {     ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td width="298"><?php echo $value->name; ?></td>
        <td width="152"><?php echo $value->username; ?></td>
         <td width="203"><?php echo $value->original_password; ?></td>
        <td><a href="<?php echo base_url() ?>createuser/modify/<?php echo $value->user_id; ?>" class="btn btn-primary btn-xs">Edit User</a> 
          <a  onclick="return confirm('Are you sure you want to delete this user?');" href="<?php echo base_url() ?>createuser/delete/<?php echo $value->user_id; ?>" class="btn btn-danger btn-xs">Delete User</a></td></td>
      </tr>
      <?php $i++; }  } ?>
    </tbody>
  </table>
  				</div>
      </div>
	</div>
</div>
</section> <!--Dashboardbody -->

<?php include "include/footer.php";?>

</body>
</html>





