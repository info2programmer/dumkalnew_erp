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
        <?php if(isset($edit_id)): ?>
        <form action="<?php echo base_url();?>library/update_book_id" method="post">
     	 	<input type="hidden" name="txtEditId" value="<?php echo $edit_id ?>">
     	  <div class="row">
     	  	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Acc No.*</label>
	                <input type="hidden" name="id" id="is" value="<?php echo $single_book[0]['id']; ?>"/>
	                <input type="hidden" name="acc_no" id="acc_no" value="<?php echo $single_book[0]['acc_no']; ?>"/>
	                <img width="150px" src="<?php echo base_url();?>Library/LibraryDetails/show_barcode/<?php echo $single_book[0]['acc_no']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Title* </label>
	                <input type="text" class="form-control" id="title" name="title" value="<?php echo $single_book[0]['title']; ?>"/>
	                <?php echo form_error('title'); ?>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Volume</label>
	                <input type="text" class="form-control" name="volume" id="volume" value="<?php echo $single_book[0]['volume']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Author 1</label>
	                <input type="text" class="form-control" name="author1" id="author1" value="<?php echo $single_book[0]['author1']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Author 2</label>
	                <input type="text" class="form-control" name="author2" id="author2" value="<?php echo $single_book[0]['author2']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Author 3</label>
	                <input type="text" class="form-control"  id="author3" name="author3" value="<?php echo $single_book[0]['author3']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Corp. Auth/Confer.</label>
	                <input type="text" class="form-control" name="auth_conf" id="auth_conf" value="<?php echo $single_book[0]['auth_conf']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Corp. Auth/Assoc.</label>
	                <input type="text" class="form-control" name="auth_assc" id="auth_assc" value="<?php echo $single_book[0]['auth_assc']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">ISBN No</label>
	                <input type="text" class="form-control" name="isbn_no" id="isbn_no" value="<?php echo $single_book[0]['isbn_no']; ?>"/>
	            </div>
       		</div>
       		<div class="col-md-6">
	             <div class="form-group">
	                <label for="">Publisher</label>
	                <input type="text" class="form-control" name="publisher" id="publisher" value="<?php echo $single_book[0]['publisher']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	           <div class="form-group">
	                <label for="">Date of Publish</label>
	                <input type="text" class="form-control" name="date_of_publish"  id="date_of_publish" value="<?php echo $single_book[0]['date_of_publish']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Place Of Publication</label>
                <input type="text" class="form-control" name="place_of_publication" id="place_of_publication" value="<?php echo $single_book[0]['place_of_publication']; ?>"/>
            </div>
            </div>
            <div class="col-md-6">
           <div class="form-group">
                <label for="">Edition</label>
                <input type="text" class="form-control" name="edition" id="edition" value="<?php echo $single_book[0]['edition']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
             <div class="form-group">
                <label for="">Editor</label>
                <select type="text" name="editor" id="editor" class="form-control"/>
                    <option <?php if($single_book[0]['editor']=='Tr. By'){echo 'selected';} ?> value="Tr. By">Tr. By</option>
                    <option <?php if($single_book[0]['editor']=='Ed. By'){echo 'selected';} ?> value="Ed. By">Ed. By</option>
                    <option <?php if($single_book[0]['editor']=='Cop. By'){echo 'selected';} ?> value="Cop. By">Comp. By</option>
                </select>
                
                <?php echo form_error('editor'); ?>
            </div>
            </div>           
    </div>
    <div class="row">
    		<div class="col-md-6">
           <div class="form-group">
                <label for="">Ed./Comp./ Tran. Name</label>
                <input type="text" class="form-control" id="editor_by" name="editor_by" value="<?php echo $single_book[0]['editor_by']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Series</label>
                <input type="text" class="form-control" id="series" name="series" value="<?php echo $single_book[0]['series']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Bibliographic Note</label>
                <textarea class="form-control" name="bibliographic_note" id="bibliographic_note" cols="30" rows="10"><?php echo $single_book[0]['bibliographic_note']; ?></textarea>
            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Note</label>
                <textarea name="note" class="form-control" id="note" cols="30" rows="10"><?php echo $single_book[0]['note']; ?></textarea>
            </div>
        	</div>
        	<div class="col-md-6">
             <div class="form-group">
                <label for="">Classification No.</label>
                <input type="text" class="form-control" name="classification_no" id="classification_no" value="<?php echo $single_book[0]['classification_no']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
           <div class="form-group">
                <label for="">Author Mark </label>
                <input type="text" class="form-control" name="author_mark" id="author_mark" value="<?php echo $single_book[0]['author_mark']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Subject 1 </label>
                <input type="text" class="form-control" name="subject1" id="subject1" value="<?php echo $single_book[0]['subject1']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Subject 2</label>
                <input type="text" class="form-control" name="subject2" id="subject2" value="<?php echo $single_book[0]['subject2']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
             <div class="form-group">
                <label for="">Subject 3</label>
                <input type="text" class="form-control" id="subject3" name="subject3" value="<?php echo $single_book[0]['subject3']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Subject 4</label>
                <input type="text" class="form-control" name="subject4" id="subject4" value="<?php echo $single_book[0]['subject4']; ?>"/>
            </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-6">
       <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" name="price" id="price" value="<?php echo $single_book[0]['price']; ?>"/>
                <?php echo form_error('price'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Page No</label>
                <input type="text" class="form-control" name="page_no" id="page_no" value="<?php echo $single_book[0]['page_no']; ?>"/>
            </div>
        </div>
        <div class="col-md-6">
           <div class="form-group">
                <label for="">Bound</label>
                <select name="bound" id="bound" class="form-control">
                    <option <?php if($single_book[0]['bound']=='HB'){echo 'selected';} ?> value="HB">HB</option>
                    <option <?php if($single_book[0]['bound']=='PB'){echo 'selected';} ?> value="PB">PB</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Type</label>
                <select name="type" id="type" class="form-control">
                    <option <?php if($single_book[0]['type']=='Book'){echo 'selected';} ?> value="Book">Book</option>
                    <option <?php if($single_book[0]['type']=='Reference Book'){echo 'selected';} ?> value="Reference Book">Reference Book</option>
                    <option <?php if($single_book[0]['type']=='English Book'){echo 'selected';} ?> value="English Book">English Book</option>
                    <option <?php if($single_book[0]['type']=='Journals'){echo 'selected';} ?> value="Journals">Journals</option>
                    <option <?php if($single_book[0]['type']=='CD'){echo 'selected';} ?> value="CD">CD</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
             <div class="form-group">
                <label for="">Fund Type</label>
                <select name="fund_type" id="fund_type" class="form-control">
                    <option <?php if($single_book[0]['fund_type']=='DCLF'){echo 'selected';} ?> value="DCLF">DCLF</option>
                    <option <?php if($single_book[0]['fund_type']=='UGC'){echo 'selected';} ?> value="UGC">UGC</option>
                    <option <?php if($single_book[0]['fund_type']=='DPI'){echo 'selected';} ?> value="DPI">DPI</option>
                    <option <?php if($single_book[0]['fund_type']=='Book Bank'){echo 'selected';} ?> value="Book Bank">Book Bank</option>
                    <option <?php if($single_book[0]['fund_type']=='Donate'){echo 'selected';} ?> value="Donate">Donate</option>
                    <option <?php if($single_book[0]['fund_type']=='Others'){echo 'selected';} ?> value="Others">Others</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Supplier</label>
                <input type="text" class="form-control" name="suppliers" id="suppliers" value="<?php echo $single_book[0]['suppliers']; ?>"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Physical Details</label>
                <textarea class="form-control" name="additional" id="additional" cols="30" rows="10"><?php echo $single_book[0]['additional']; ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Remarks</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?php echo $single_book[0]['description']; ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Book Condition</label>
                <select type="text" name="book_condition" id="book_condition" class="form-control"/>
                    <option <?php if($single_book[0]['book_condition']=='Good'){echo 'selected';} ?> value="Good">Good</option>
                    <option <?php if($single_book[0]['book_condition']=='Bad'){echo 'selected';} ?> value="Bad">Bad</option>
                    <option <?php if($single_book[0]['book_condition']=='Repair'){echo 'selected';} ?> value="Repair">Repair </option>
                    <option <?php if($single_book[0]['book_condition']=='Reject'){echo 'selected';} ?> value="Reject">Reject</option>
                </select>
            </div>
        </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="">Location</label>
                <select name="location" id="location" class="form-control">
                    <option value="Central Library" <?php if($single_book[0]['location']=='Central Library'){echo 'selected';} ?>>Central Library</option>
                    <option value="Departmental Library" <?php if($single_book[0]['location']=='Departmental Library'){echo 'selected';} ?>>Departmental Library</option>
                </select>
            </div>
        </div>
           <p align="center"><button type="submit" class="btn btn-success btn-lg">Submit</button></p>
    </div> 
    </form>
<?php elseif(isset($copy_id)): ?>
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
 <input type="hidden" value="<?php echo $copy_id ?>" name="txtCopyId" />
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Title* </label>
	                <input type="text" class="form-control" id="title" name="title" value="<?php echo $single_book[0]['title']; ?>"/>
	                <?php echo form_error('title'); ?>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Volume</label>
	                <input type="text" class="form-control" name="volume" id="volume" value="<?php echo $single_book[0]['volume']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Author 1</label>
	                <input type="text" class="form-control" name="author1" id="author1" value="<?php echo $single_book[0]['author1']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Author 2</label>
	                <input type="text" class="form-control" name="author2" id="author2" value="<?php echo $single_book[0]['author2']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Author 3</label>
	                <input type="text" class="form-control"  id="author3" name="author3" value="<?php echo $single_book[0]['author3']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Corp. Auth/Confer.</label>
	                <input type="text" class="form-control" name="auth_conf" id="auth_conf" value="<?php echo $single_book[0]['auth_conf']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">Corp. Auth/Assoc.</label>
	                <input type="text" class="form-control" name="auth_assc" id="auth_assc" value="<?php echo $single_book[0]['auth_assc']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	            <div class="form-group">
	                <label for="">ISBN No</label>
	                <input type="text" class="form-control" name="isbn_no" id="isbn_no" value="<?php echo $single_book[0]['isbn_no']; ?>"/>
	            </div>
       		</div>
       		<div class="col-md-6">
	             <div class="form-group">
	                <label for="">Publisher</label>
	                <input type="text" class="form-control" name="publisher" id="publisher" value="<?php echo $single_book[0]['publisher']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
	           <div class="form-group">
	                <label for="">Date of Publish</label>
	                <input type="text" class="form-control" name="date_of_publish"  id="date_of_publish" value="<?php echo $single_book[0]['date_of_publish']; ?>"/>
	            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Place Of Publication</label>
                <input type="text" class="form-control" name="place_of_publication" id="place_of_publication" value="<?php echo $single_book[0]['place_of_publication']; ?>"/>
            </div>
            </div>
            <div class="col-md-6">
           <div class="form-group">
                <label for="">Edition</label>
                <input type="text" class="form-control" name="edition" id="edition" value="<?php echo $single_book[0]['edition']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
             <div class="form-group">
                <label for="">Editor</label>
                <select type="text" name="editor" id="editor" class="form-control"/>
                    <option <?php if($single_book[0]['editor']=='Tr. By'){echo 'selected';} ?> value="Tr. By">Tr. By</option>
                    <option <?php if($single_book[0]['editor']=='Ed. By'){echo 'selected';} ?> value="Ed. By">Ed. By</option>
                    <option <?php if($single_book[0]['editor']=='Cop. By'){echo 'selected';} ?> value="Cop. By">Comp. By</option>
                </select>
                
                <?php echo form_error('editor'); ?>
            </div>
            </div>           
    </div>
    <div class="row">
    		<div class="col-md-6">
           <div class="form-group">
                <label for="">Ed./Comp./ Tran. Name</label>
                <input type="text" class="form-control" id="editor_by" name="editor_by" value="<?php echo $single_book[0]['editor_by']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Series</label>
                <input type="text" class="form-control" id="series" name="series" value="<?php echo $single_book[0]['series']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Bibliographic Note</label>
                <textarea class="form-control" name="bibliographic_note" id="bibliographic_note" cols="30" rows="10"><?php echo $single_book[0]['bibliographic_note']; ?></textarea>
            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Note</label>
                <textarea name="note" class="form-control" id="note" cols="30" rows="10"><?php echo $single_book[0]['note']; ?></textarea>
            </div>
        	</div>
        	<div class="col-md-6">
             <div class="form-group">
                <label for="">Classification No.</label>
                <input type="text" class="form-control" name="classification_no" id="classification_no" value="<?php echo $single_book[0]['classification_no']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
           <div class="form-group">
                <label for="">Author Mark </label>
                <input type="text" class="form-control" name="author_mark" id="author_mark" value="<?php echo $single_book[0]['author_mark']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Subject 1 </label>
                <input type="text" class="form-control" name="subject1" id="subject1" value="<?php echo $single_book[0]['subject1']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Subject 2</label>
                <input type="text" class="form-control" name="subject2" id="subject2" value="<?php echo $single_book[0]['subject2']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
             <div class="form-group">
                <label for="">Subject 3</label>
                <input type="text" class="form-control" id="subject3" name="subject3" value="<?php echo $single_book[0]['subject3']; ?>"/>
            </div>
        	</div>
        	<div class="col-md-6">
            <div class="form-group">
                <label for="">Subject 4</label>
                <input type="text" class="form-control" name="subject4" id="subject4" value="<?php echo $single_book[0]['subject4']; ?>"/>
            </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-6">
       <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" name="price" id="price" value="<?php echo $single_book[0]['price']; ?>"/>
                <?php echo form_error('price'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Page No</label>
                <input type="text" class="form-control" name="page_no" id="page_no" value="<?php echo $single_book[0]['page_no']; ?>"/>
            </div>
        </div>
        <div class="col-md-6">
           <div class="form-group">
                <label for="">Bound</label>
                <select name="bound" id="bound" class="form-control">
                    <option <?php if($single_book[0]['bound']=='HB'){echo 'selected';} ?> value="HB">HB</option>
                    <option <?php if($single_book[0]['bound']=='PB'){echo 'selected';} ?> value="PB">PB</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Type</label>
                <select name="type" id="type" class="form-control">
                    <option <?php if($single_book[0]['type']=='Book'){echo 'selected';} ?> value="Book">Book</option>
                    <option <?php if($single_book[0]['type']=='Reference Book'){echo 'selected';} ?> value="Reference Book">Reference Book</option>
                    <option <?php if($single_book[0]['type']=='English Book'){echo 'selected';} ?> value="English Book">English Book</option>
                    <option <?php if($single_book[0]['type']=='Journals'){echo 'selected';} ?> value="Journals">Journals</option>
                    <option <?php if($single_book[0]['type']=='CD'){echo 'selected';} ?> value="CD">CD</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
             <div class="form-group">
                <label for="">Fund Type</label>
                <select name="fund_type" id="fund_type" class="form-control">
                    <option <?php if($single_book[0]['fund_type']=='DCLF'){echo 'selected';} ?> value="DCLF">DCLF</option>
                    <option <?php if($single_book[0]['fund_type']=='UGC'){echo 'selected';} ?> value="UGC">UGC</option>
                    <option <?php if($single_book[0]['fund_type']=='DPI'){echo 'selected';} ?> value="DPI">DPI</option>
                    <option <?php if($single_book[0]['fund_type']=='Book Bank'){echo 'selected';} ?> value="Book Bank">Book Bank</option>
                    <option <?php if($single_book[0]['fund_type']=='Donate'){echo 'selected';} ?> value="Donate">Donate</option>
                    <option <?php if($single_book[0]['fund_type']=='Others'){echo 'selected';} ?> value="Others">Others</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Supplier</label>
                <input type="text" class="form-control" name="suppliers" id="suppliers" value="<?php echo $single_book[0]['suppliers']; ?>"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Physical Details</label>
                <textarea class="form-control" name="additional" id="additional" cols="30" rows="10"><?php echo $single_book[0]['additional']; ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Remarks</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?php echo $single_book[0]['description']; ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Book Condition</label>
                <select type="text" name="book_condition" id="book_condition" class="form-control"/>
                    <option <?php if($single_book[0]['book_condition']=='Good'){echo 'selected';} ?> value="Good">Good</option>
                    <option <?php if($single_book[0]['book_condition']=='Bad'){echo 'selected';} ?> value="Bad">Bad</option>
                    <option <?php if($single_book[0]['book_condition']=='Repair'){echo 'selected';} ?> value="Repair">Repair </option>
                    <option <?php if($single_book[0]['book_condition']=='Reject'){echo 'selected';} ?> value="Reject">Reject</option>
                </select>
            </div>
        </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="">Location</label>
                <select name="location" id="location" class="form-control">
                    <option value="Central Library" <?php if($single_book[0]['location']=='Central Library'){echo 'selected';} ?>>Central Library</option>
                    <option value="Departmental Library" <?php if($single_book[0]['location']=='Departmental Library'){echo 'selected';} ?>>Departmental Library</option>
                </select>
            </div>
        </div>
           <p align="center"><button type="submit" class="btn btn-success btn-lg">Submit</button></p>
    </div> 
    </form>
<?php endif; ?>
     	 
</div>
</div>
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
<!-- <script src="<?php //echo base_url(); ?>assets/js/bootstrap.min.js" ></script> -->
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

<script>
 $(document).ready(function() {

  $( "#title" ).autocomplete({
    source: "<?php echo base_url();?>library/title",
    minLength: 2
  });

  $( "#author1" ).autocomplete({
    source: "<?php echo base_url();?>library/author1",
    minLength: 2
  });

  $( "#author2" ).autocomplete({
    source: "<?php echo base_url();?>library/author2",
    minLength: 2
  });

  $( "#author3" ).autocomplete({
    source: "<?php echo base_url();?>library/author3",
    minLength: 2
  });

  $( "#auth_conf" ).autocomplete({
    source: "<?php echo base_url();?>library/auth_conf",
    minLength: 2
  });

  $( "#auth_assc" ).autocomplete({
    source: "<?php echo base_url();?>library/auth_assc",
    minLength: 2
  });

  $( "#publisher" ).autocomplete({
    source: "<?php echo base_url();?>library/publisher",
    minLength: 2
  });

  $( "#place_of_publication" ).autocomplete({
    source: "<?php echo base_url();?>library/place_of_publication",
    minLength: 2
  });


  $( "#subject1" ).autocomplete({
    source: "<?php echo base_url();?>library/subject1",
    minLength: 2
  });

  $( "#subject2" ).autocomplete({
    source: "<?php echo base_url();?>library/subject2",
    minLength: 2
  });

  $( "#subject3" ).autocomplete({
    source: "<?php echo base_url();?>library/subject3",
    minLength: 2
  });

  $( "#subject4" ).autocomplete({
    source: "<?php echo base_url();?>library/subject4",
    minLength: 2
  }); 

  $( "#suppliers" ).autocomplete({
    source: "<?php echo base_url();?>library/subject4",
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