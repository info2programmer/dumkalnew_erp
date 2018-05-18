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
       <div class="col-md-12">
        <?php if ($this->session->flashdata('message')): ?>
          <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
          </div>
        <?php endif ?>

		 <div class="row">
      <form action="<?php echo current_url() ?>" method="post">
         
			 	<h3>Search Books</h3>
				 <div class="form-group col-md-6">
              <label for="txtFrom">From Date.*</label>
              <input type="date" name="txtFrom" id="txtFrom"  Placeholder="Enter From SL Number" class="form-control" required>
          </div>
          <div class="form-group col-md-6">
              <label for="txtTo">To Date.*</label>
              <input type="date" name="txtTo" id="txtTo" class="form-control" Placeholder="Enter From To Number" required>
          </div>
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary" name="btnSubmit" value="submit" ><i class="fa fa-search" aria-hidden="true"></i> Search</button><br>
          </div>       
        </form>
          <!-- <div class="col-md-6 text-center">
            <button type="submit" class="btn btn-success" name="btnSubmit" value="submit" onclick="return confirm('Are You Sure?');"><i class="fa fa-spinner" aria-hidden="true"></i> Print Spine Slip</button><br>
          </div> -->
			 </div>
		 </div>
        
     </div> 
     <br/><br/>
     <?php if(isset($search_book)): ?>
<section>
    <?php foreach($search_book as $books): ?>
    <div class="jumbotron alert alert-warning">
        <div class="list-item">
            <div class="box">
                <spanp><?php echo "<b>Acc. No.</b>: ".$books->acc_no; ?></span>
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
                <span><?php echo "<b>Entry Date</b>: ".$books->entry_datetime; ?></span>
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
<?php endforeach; ?>
</section>
<?php endif; ?>
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