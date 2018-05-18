<!DOCTYPE html>
<html >
<head>
  <?php $this->load->view('include/head');?>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css_new/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.structure.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.theme.min.css">
  <script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>  
</head>
<body>
  <?php $this->load->view('include/header');?>
  <?php 
  $depid = $this->uri->segment(4);
  $actid = $this->uri->segment(5);
  $uid = $this->uri->segment(6);
  ?>
  <?php if($msg == 'YES'){?>
  <div class="container">
   <div class="row">

     <div class="row">
       <div class="col-md-12">
        <?php if ($this->session->flashdata('message')): ?>
          <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
          </div>
        <?php endif ?>
        

		 <div class="row">
      <form action="<?php echo base_url() ?>Library/LibraryDetails/barcode" target="_blank" method="post">
         
			 	<h3>Search and Print</h3>
				 <div class="form-group col-md-6">
              <label for="txtFrom">From Sl Number.*</label>
              <input type="text" name="txtFrom" id="txtFrom" Placeholder="Enter From SL Number" class="form-control" require>
          </div>
          <div class="form-group col-md-6">
              <label for="txtTo">To Sl Number.*</label>
              <input type="text" name="txtTo" id="txtTo" class="form-control" Placeholder="Enter From To Number" require>
          </div>
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary" name="btnSubmit" value="submit" ><i class="fa fa-barcode" aria-hidden="true"></i> Print Barcode</button><button type="submit" class="btn btn-warning" style="margin-left:2px" name="btnSubmit" value="submit" onclick="this.form.method='post'; this.form.action='<?php echo base_url() ?>Library/LibraryDetails/spine';this.form.submit();"><i class="fa fa-spinner" aria-hidden="true"></i> Print Spine Slip</button><br>
          </div>       
        </form>
          <!-- <div class="col-md-6 text-center">
            <button type="submit" class="btn btn-success" name="btnSubmit" value="submit" onclick="return confirm('Are You Sure?');"><i class="fa fa-spinner" aria-hidden="true"></i> Print Spine Slip</button><br>
          </div> -->
			 </div>
		 </div>

     </div> 
</div>
</div>
</div>
<?php } else { ?>
<section id="dashboardbody">
  <div class="container">
   <div class="row">
    <div class="col-md-12 col-sm-12">
     <h4 class="alert alert-info">library Book Add</h4>
     <div class="alert alert-danger">
      <h1>YOU ARE NOT ALLOWED TO ACCESS THIS PAGE</h1>
    </div>
  </div>
</div>
</div>
</div>
</section>
<?php } ?>
<?php /*?><script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script><?php */?>
<br><br><br>
<!-- <script src="<?php //echo base_url(); ?>assets/js/bootstrap.min.js" ></script> -->
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<?php $this->load->view("include/footer.php");?>
</body>
</html>