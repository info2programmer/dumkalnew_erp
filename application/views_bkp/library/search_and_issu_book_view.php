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
  <?php if(!empty($err)): ?><p class="alert alert-danger"><?php echo $err; ?></p> <?php endif; ?>
        <form method="post" name="barcode_form" action="<?php echo base_url();?>Library/LibraryDetails/search_book_id/">
            <fieldset>
                <legend>Search And Issue Book</legend>
                <div class="form-group">
                    <span>Barcode</span>
                    <input type="text" name="barcode" id="barcode" class="form-control" value="" autofocus="autofocus"/>
                </div>
            </fieldset>  
        </form>
    </div>
</div>
<?php if(isset($search_book)){?>
<?php echo form_open('library/booksview/search_book_id'); ?>
<span class="msg_text"><?php echo $this->session->flashdata('messageup')."<br>";?></span>
<?php if (empty($search_book)){?>
<div align="center" style="width:100%; position:absolute; top:1000%;">No Data Found</div>
<?php }else {?>
<?php foreach($search_book as $books) { ?>
    <div class="alert alert-success">
        <div class="list-item">
            <div class="box">
                <span><?php echo "<b>Acc. No.</b>: ".$books->acc_no; ?></span>
                <span><?php echo "<b>Title</b>: ".$books->title; ?></span>
                <span><?php echo "<b>Author</b>: ".$books->author1."/".$books->author2."/".$books->author3; ?></span>
                <span><?php echo "<b>Ed./Comp./ Tran.</b>: ".$books->editor_by; ?></span>
                <span><?php echo "<b>Publisher</b>: ".$books->publisher; ?></span>
                <span><?php echo "<b>Place Of Publication</b>: ".$books->place_of_publication; ?></span>
                <span><?php echo "<b>Publication Year</b>: ".$books->date_of_publish; ?></span>
            </div>
            <div class="box">
                <span><?php echo "<b>Series</b>: ".$books->series; ?></span>
                <span><?php echo "<b>Bibliographic Note</b>: ".$books->bibliographic_note; ?></span>
                <span><?php echo "<b>Note</b>: ".$books->note; ?></span>
                <span><?php echo "<b>Call No</b>: ".$books->call_no; ?></span>
                <span><?php echo "<b>Page No</b>: ".$books->page_no; ?></span>
                <span><?php echo "<b>Bound</b>: ".$books->bound; ?></span>
            </div>
            <div class="box">
                
                <span><?php echo "<b>Subject</b>: ".$books->subject1."/".$books->subject2."/".$books->subject3."/".$books->subject4; ?></span>
                <span><?php echo "<b>Price</b>: ".$books->price; ?></span>
                <span><?php echo "<b>ISBN No</b>: ".$books->isbn_no; ?></span>
                <span><?php echo "<b>Fund Type</b>: ".$books->fund_type; ?></span>
                <span><?php echo "<b>Physical Details</b>: ".$books->additional; ?></span>
                <span><?php echo "<b>Remarks</b>: ".$books->description; ?></span>
            </div>
            <div class="box-button">
                    <!--<button class="details">Details</button>-->
                    <!--<button class="delete"><span class="icon2-fire"></span></button>-->
                    <?php if($books->status=='Available'){?>
            <a class="btn btn-primary btn-xs" href="<?php echo base_url() . "Library/LibraryDetails/issue_book_id/1/" . $books->id; ?>" target="_blank">Normal Issue</a>&nbsp;&nbsp;
            <a class="btn btn-info btn-xs" href="<?php echo base_url() . "Library/LibraryDetails/issue_book_id/2/" . $books->id; ?>"  target="_blank">Book Bank Issue</a>
                    <?php }else{?>
              <a class="btn btn-danger btn-xs" href="javascript:void(0);">Book Is Not Available</a>      
                    <?php }?>
            </div>
        </div>
    </div>
<?php }}}?>
</div>
<?php } else { ?>
<section id="dashboardbody">
  <div class="container">
   <div class="row">
    <div class="col-md-12 col-sm-12">
     <h4 class="alert alert-info">Library Book Add</h4>
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