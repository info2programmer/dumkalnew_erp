<div class="container">
<div class="title_head">Manage Income </div>
<hr />
<div align="center"><?php echo $this->session->flashdata('msg');?></div>
<div class="row">
</div>
    <div class="row">
<form action="<?php echo base_url();?>index.php/finance/fees/daily_collection_report1" method="post" target="_blank">
<div class="row">
	<div class="col-md-4">
    <label>From Date</label>
    <input type="date" id="datepicker-1" name="txtDate11" placeholder="  From Date" class="form-control" />
    </div>
    <div class="col-md-4">
    <label>To Date</label>
    <input type="date" id="datepicker-2" name="txtDate22" placeholder="  To Date" class="form-control" />
    </div>
    <div class="col-md-4">
    <br>
    <button type="submit" name="search" class="btn btn-primary" style="margin-top: 5px;">GENERATE REPORT</button>
    </div>
</div>
</form>
 </div>
  <div class="row">
</div>  
</div>
