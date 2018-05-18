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
        <form action="<?php echo current_url() ?>" method="post">
         <input type="hidden" value="<?php echo current_url() ?>" name="action" />
         <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Acc No.*</label>
              <?php $acc_no=str_pad($new_acc_no, 5, "0", STR_PAD_LEFT);?>
              <input  type="hidden" name="acc_no" id="acc_no" value="<?php echo $acc_no;?>"/>
              <img width="150px" src="<?php echo base_url();?>Library/LibraryDetails/show_barcode/<?php echo $new_acc_no;?>" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Title* </label>
              <input type="text" class="form-control" id="title" name="title"/>
              <?php echo form_error('title'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Volume</label>
              <input type="text" class="form-control" name="volume" id="volume"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Author 1</label>
              <input type="text" class="form-control" name="author1" id="author1"/>
              <?php echo form_error('author1'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Author 2</label>
              <input type="text" class="form-control" name="author2" id="author2"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Author 3</label>
              <input type="text" class="form-control" id="author3" name="author3"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Corp. Auth/Confer.</label>
              <input type="text" class="form-control" name="auth_conf" id="auth_conf"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Corp. Auth/Assoc.</label>
              <input type="text" class="form-control" name="auth_assc" id="auth_assc"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">ISBN No</label>
              <input type="text" class="form-control" name="isbn_no" id="isbn_no"/>
              <?php echo form_error('isbn_no'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Publisher</label>
              <input type="text" class="form-control" name="publisher" id="publisher"/>
              <?php echo form_error('publisher'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Year of Publish</label>
              <input type="text" class="form-control" name="date_of_publish"  id="date_of_publish"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Place Of Publication</label>
              <input type="text" class="form-control" name="place_of_publication" id="place_of_publication"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Edition</label>
              <input type="text" class="form-control" name="edition" id="edition"/>
              <?php echo form_error('edition'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Editor</label>
              <select type="text" name="editor" id="editor" class="form-control"/>
              <option value="">Select</option>
              <option value="Tr. By">Tr. By</option>
              <option value="Ed. By">Ed. By</option>
              <option value="Cop. By">Cop. By</option>
            </select>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Ed./Comp./Tran. Name</label>
            <input type="text" class="form-control" id="editor_by" name="editor_by"/>
          </div> 
        </div>
        <div class="col-md-6"> 
          <div class="form-group">
            <label for="">Series</label>
            <input type="text" class="form-control" id="series" name="series"/>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Bibliographic Note</label>
            <textarea name="bibliographic_note" class="form-control" id="bibliographic_note" cols="30" rows="10"></textarea>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Note</label>
            <textarea name="note" id="note" class="form-control" cols="30" rows="10"></textarea>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Classification No.</label>
            <input type="text" name="classification_no" class="form-control" id="classification_no"/>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Author Mark </label>
            <input type="text" name="author_mark" class="form-control" id="author_mark"/>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Subject 1 </label>
            <input type="text" name="subject1" class="form-control" id="subject1"/>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Subject 2</label>
            <input type="text" name="subject2" class="form-control" id="subject2"/>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Subject 3</label>
            <input type="text" id="subject3" class="form-control" name="subject3"/>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Subject 4</label>
            <input type="text" name="subject4" class="form-control" id="subject4"/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
         <div class="form-group">
          <label for="">Price</label>
          <input type="text" name="price" class="form-control" id="price"/>
          <?php echo form_error('price'); ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Page No</label>
          <input type="text" name="page_no" class="form-control" id="page_no"/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Bound</label>
          <select name="bound" id="bound" class="form-control">
            <option value="">Select</option>
            <option value="HB">HB</option>
            <option value="PB">PB</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Type</label>
          <select name="type" id="type" class="form-control">
            <option value="Book">Book</option>
            <option value="Reference Book">Reference Book</option>
            <option value="English Book">English Book</option>
            <option value="Journals">Journals</option>
            <option value="CD">CD</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Fund Type</label>
          <select name="fund_type" id="fund_type" class="form-control">
            <option value="">Select</option>
            <option value="DCLF">DCLF</option>
            <option value="UGC">UGC</option>
            <option value="DPI">DPI</option>
            <option value="Book Bank">Book Bank</option>
            <option value="Donate">Donate</option>
            <option value="Others">Others</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Supplier</label>
          <input type="text" name="suppliers" id="suppliers" class="form-control"/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Physical Details</label>
          <textarea name="additional" id="additional" class="form-control" cols="30" rows="10"></textarea>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Remarks</label>
          <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Book Condition</label>
          <select type="text" name="book_condition" id="book_condition" class="form-control"/>
          <option value="Good">Good</option>
          <option value="Bad">Bad</option>
          <option value="Repair">Repair </option>
          <option value="Reject">Reject</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="">No of Copy</label>
        <input type="text" id="copy" class="form-control" name="copy" value="1"/>
      </div> 
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label for="">Location</label>
        <select name="location" class="form-control" id="location">
          <option value="Central library">Central library</option>
          <option value="Departmental library">Departmental library</option>
        </select>
      </div>
    </div>
    
    <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-success btn-lg" name="btnSubmit" value="submit" onClick="return confirm('Are You Sure?');">Submit</button><br>
    </div>
  </div>        
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
<!-- <script src="<?php //echo base_url(); ?>assets/js/bootstrap.min.js" ></script> -->
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

<script>
 $(document).ready(function() {

  $( "#title" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/title",
    minLength: 2
  });

  $( "#author1" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/author1",
    minLength: 2
  });

  $( "#author2" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/author2",
    minLength: 2
  });

  $( "#author3" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/author3",
    minLength: 2
  });

  $( "#auth_conf" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/auth_conf",
    minLength: 2
  });

  $( "#auth_assc" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/auth_assc",
    minLength: 2
  });

  $( "#publisher" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/publisher",
    minLength: 2
  });

  $( "#place_of_publication" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/place_of_publication",
    minLength: 2
  });


  $( "#subject1" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/subject1",
    minLength: 2
  });

  $( "#subject2" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/subject2",
    minLength: 2
  });

  $( "#subject3" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/subject3",
    minLength: 2
  });

  $( "#subject4" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/subject4",
    minLength: 2
  }); 

  $( "#suppliers" ).autocomplete({
    source: "<?php echo base_url();?>Library/LibraryDetails/subject4",
    minLength: 2
  }); 

  $('th').each(function(col) {
   $(this).hover(
     function() { $(this).addClass('focus'); },
     function() { $(this).removeClass('focus'); }
     );
   $(this).click(function() {
     if ($(this).is('.asc')) {
       $(this).removeClass('asc');
       $(this).addClass('desc selected');
       sortOrder = -1;
     }
     else {
       $(this).addClass('asc selected');
       $(this).removeClass('desc');
       sortOrder = 1;
     }
     $(this).siblings().removeClass('asc selected');
     $(this).siblings().removeClass('desc selected');
     var arrData = $('table').find('tbody >tr:has(td)').get();
     arrData.sort(function(a, b) {
       var val1 = $(a).children('td').eq(col).text().toUpperCase();
       var val2 = $(b).children('td').eq(col).text().toUpperCase();
       if($.isNumeric(val1) && $.isNumeric(val2))
         return sortOrder == 1 ? val1-val2 : val2-val1;
       else
        return (val1 < val2) ? -sortOrder : (val1 > val2) ? sortOrder : 0;
    });
     $.each(arrData, function(index, row) {
       $('tbody').append(row);
     });
   });
 });
});
$(document).ready(function() {
 $('#example').DataTable();
} );
</script>
<script>
 $("#search").keyup(function () {
   var value = this.value.toLowerCase().trim();

   $("table tr").each(function (index) {
     if (!index) return;
     $(this).find("td").each(function () {
       var id = $(this).text().toLowerCase().trim();
       var not_found = (id.indexOf(value) == -1);
       $(this).closest('tr').toggle(!not_found);
       return not_found;
     });
   });
 });
</script>  
<?php $this->load->view("include/footer.php");?>
</body>
</html>