<!DOCTYPE html>
<html >
   <head>
       <?php $this->load->view('include/head');?>
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css_new/style.css">
   </head>
<style>
.btn_link{float:left !important;width:46%  !important;margin:5px 2%  !important; background-color:#FFF  !important; border:#999 1px solid  !important; padding:5px  !important;}
</style>
<?php $this->load->view('include/header');?>
<div class="container">
    <div class="row">
    <form action="<?php echo base_url();?>index.php/finance/fee_details/verify_expense/<?php echo $data_fin->fee_id;?>" method="post">
            <div class="input-group-inline">
                <label for=""></label>
                <img src="<?php echo base_url();?>Finance/financeDetails/show_barcode/<?php echo $idforbarcode ?>" alt="" class="barcode" style="width:130px;"/>
            </div>
            <div class="box-button" style="width: 250px; margin-left: auto;">
               <?php if($data_fin->verify != 1) { ?>
            <?php if($_SESSION['adding']=='Y'){?>
                    <button class="details" style="float:left;width:46%;margin:5px 45%;">Verify</button><?php }?>
                    <?php }else{?>
                    <a class="alert alert-info">Verified</a>
                    <?php }?>
                    <a href="<?php echo base_url();?>Finance/financeDetails/print_voucher/<?php echo $data_fin->fee_id;?>" onclick="javascript:void window.open('<?php echo base_url();?>Finance/financeDetails/print_voucher/<?php echo $data_fin->fee_id;?>','1442485591432','width=750,height=700,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" class="alert alert-warning">Print Voucher</a>
            </div>
        </form>
    </div>
    <div class="row">
        <form action="">
            <div class="input-group-inline">
                <label for="">Debit Voucher No. :</label>
                <?php echo $data_fin->fee_id?>
            </div>
            <div class="input-group-inline">
                <label for="">Date :</label>
                <?php echo date('d.m.Y', strtotime($data_fin->col_date))?>
            </div>
            <div class="input-group-inline">
                <label for="">Acc :</label>
                <?php if($data_bank){echo $data_bank->acc_no;}?>
            </div>
            <div class="input-group-inline">
                <label for="">Pay To :</label>
                <?php echo $data_fin->name?>
            </div>
            <div class="input-group-inline">
                <label for="">Amount :</label>
                <?php echo $data_fin->amount?>
            </div>
            <div class="input-group-inline">
                <label for="">Type :</label>
                <?php if($data_fin->bank!=0){echo 'Bank';}else{echo 'Cash';}?>
            </div>         
        </form>
    </div>
    <div class="row">
        <form action="">
            <div class="input-group-inline">
                <label for="">Narrations :</label>
                <?php echo $data_fin->particular?>
            </div>
            <div class="input-group-inline">
                <label for="">Cheque No. : </label>
                 <?php if($data_bank){echo $data_fin->cheque_no;}?> 
            </div>
            <div class="input-group-inline">
                <label for="">Cheque Date :</label>
                <?php echo $data_fin->cheque_date?>
            </div>
            <div class="input-group-inline">
                <label for="">Bank Name with Branch:</label>
              <?php if($data_bank){echo $data_bank->bank_name." - ".$data_bank->bank_branch;}?>
            </div>
        </form>
    </div>
</div>
       <?php $this->load->view('include/footer');?>
      <?php /*?><script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script><?php */?>
    
   
      <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
   </body>
</html>