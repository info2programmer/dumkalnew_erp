<!DOCTYPE html>
<html >
   <head>
      <?php $this->load->view('include/head');?>
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css_new/style.css">
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
      <form method="post" action="<?php echo base_url() ?>Finance/financeDetails/LedgerDetails/" target="_blank" enctype="multipart/form-data">
      <div class="col-md-4"></div>
      <div class="col-md-4">
         <div class="panel panel-primary">
        <div class="panel-body">
        <h3 class="text-on-pannel text-primary"><strong class="text-uppercase"> Ledger </strong></h3>
        <div class="form-group">
            <div class="input-group-inline">
                <label for="">From Date</label>
                <input type="date" require name="txtFromDate" id="txtFormdate" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-inline">
                <label for="">To Date</label>
                <input type="date" require name="txtToDate" id="txtToDate" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-inline">
                <label for="">Select Funds</label>
                <select name="ddlFunds" id="ddlFunds" class="form-control" require>
                    <option value="" selected hidden>Select Funds</option>
                    <?php foreach($ledger as $ldgr): ?>
                    <option value="<?php echo $ldgr->id; ?>"><?php echo $ldgr->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
         <p align="center"><button class="btn btn-primary" type="submit">Submit</button></p>
       </div>
      </div>
      </form>
      
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
                     <h4 class="alert alert-info">Employee List</h4>
                     <div class="alert alert-danger">
                        <h1>YOU ARE NOT ALLOWED TO ACCESS THIS PAGE</h1>
                     </div>
                  </div>
               </div>
            </div>
      </div>
      </section>
      
      <?php } ?>
       <?php $this->load->view('include/footer');?>
      <?php /*?><script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script><?php */?>
    
   
      <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
   </body>
</html>