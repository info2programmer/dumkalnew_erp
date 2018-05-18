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
    <p class="alert alert-danger"><?php if(!empty($err)){echo $err;}?></p>
        <form method="post" name="barcode_form" action="<?php echo base_url();?>Library/LibraryDetails/search_member_id">
            <fieldset>
                <legend>Issue Books</legend>
              <?php foreach($issue_book as $books) { ?>
              <input type="hidden" name="book_id" id="book_id" value="<?php echo $books['id']; ?>" />
                <div class="form-group">
                    <span>Accession No</span>
                    <input type="text" class="form-control" name="acc_no" value="<?php echo $books['acc_no']; ?>" id="acc_no" readonly="readonly"/>
                </div>
                <div class="form-group">
                    <span>Book Title</span>
                    <input type="text" class="form-control" name="book_title" value="<?php echo $books['title']; ?>" id="book_title" readonly="readonly"/>
                </div>
                <div class="form-group">
                    <span>Issue Type</span>
                    <input type="text" class="form-control" name="issue_type" value="<?php echo $type; ?>" readonly="readonly" id="issue_type"/>
                </div>
                 <?php }?>
                <div class="form-group">
                    <label for="">Student / Employee </label>
                    <input type="text" class="form-control" name="member_id" id="barcode" autofocus="autofocus"  value=""/>
                </div>
            </fieldset>  
        </form>
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
<script>
window.onload = function() {	
var input = document.querySelector('#barcode');
input.addEventListener('input', function(){
  if(document.getElementById("barcode").value.length>=4)
  {	
  document.forms['barcode_form'].submit();
  }
})};
</script>
<?php $this->load->view("include/footer.php");?>
</body>
</html>