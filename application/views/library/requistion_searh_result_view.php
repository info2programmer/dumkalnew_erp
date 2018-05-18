    <!DOCTYPE html>
    <html >
    <head>
        <?php $this->load->view('include/head');?>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css_new/style.css">
        <style>
        .text-on-pannel {
    background: #fff none repeat scroll 0 0;
    height: auto;
    margin-left: 20px;
    padding: 3px 5px;
    position: absolute;
    margin-top: -47px;
    border: 1px solid #337ab7;
    border-radius: 8px;
    }

    .panel {
    /* for text on pannel */
    margin-top: 27px !important;
    }

    .panel-body {
    padding-top: 30px !important;
    }
        </style>
    </head>
    <body>
        <?php $this->load->view('include/header');?>
        <?php if($msg == 'YES'){?>
        <div class="container">
        <?php if($this->session->flashdata('message')): ?> <p class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></p> <?php endif; ?>
        <?php if($this->session->flashdata('validation_errors')): ?> <div class="alert alert-danger"><?php echo $this->session->flashdata('validation_errors'); ?></div> <?php endif; ?>
            <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form name="barcode_form" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
                <?php if(isset($msg))?>
                <?php 
                $depid = $this->uri->segment(4);
                $actid = $this->uri->segment(5);
                $uid = $this->uri->segment(6);
                ?>
                <input type="hidden" name="dep_id" value="<?php echo $depid;?>" />
                <input type="hidden" name="act_id" value="<?php echo $actid;?>" />
                <input type="hidden" name="usr_id" value="<?php echo $uid;?>" />
            <div class="panel panel-primary">
        <div class="panel-body">
        <h3 class="text-on-pannel text-primary"><strong class="text-uppercase"> Requistion Details </strong></h3>
        <?php// foreach($result as $result) { ?>
            <div class="form-group">
                <label for="">From Date</label>
                <input type="date" class="form-control" name="from" />
            </div>    
            <div class="form-group">
                <label for="">To Date</label>
                <input type="Date" class="form-control" name="to" />
            </div>
            <div class="form-group">
                <p align="center"><button type="submit" name="btnSubmit" value="Submit" class="btn btn-success btn-lg">Submit</button></p>
            </div>
                  <?php// }?>
                </div>
                </div>
                </form>
                </div>
            </div>
            <div class="row">
                <?php if(isset($search_book)){?>

<?php echo form_open('library/issuelog/search_book_id'); ?>

<span class="msg_text"><?php echo $this->session->flashdata('messageup')."<br>";?></span>

<?php if (empty($search_book)){?>

<div align="center" style="width:100%; position:absolute;">No Data Found</div>

<?php }else {?>

<?php foreach($search_book as $books) {  $book_desc = $this->db->query('select * from tb_library_books where acc_no="'.$books->acc_no.'"')->row();?>

    <div class="jumbotron alert alert-info">
        <div class="list-item">
            <div class="box">
                <span><?php echo "<strong>Acc. No.: </strong>".$books->acc_no; ?></span>
                <span><?php echo "<strong>Title: </strong>".$books->title; ?></span>
            </div>
            <div class="box">
                <span>
				<?php
				echo ($books->type == 'S')?'<strong>Student Id: </strong>'.$books->member_id:'Employee Id: '.$books->member_id; 
				?>
                </span>
                <span>
                <?php
				echo ($books->type == 'S')?'<strong>Student Name: </strong>'.$books->member_name:'Employee Name: '.$books->member_name; 
				?>				
                </span>
                <span><?php echo "<strong>Author Name 1: </strong>".$book_desc->author1; ?></span>
                <span><?php echo "<strong>Author Name 2: </strong>".$book_desc->author2; ?></span>
                <span><?php echo "<strong>Author Name 3: </strong>".$book_desc->author3; ?></span>
            </div>
            <div class="box">               
                <span><?php echo "<strong>Requisition Date : </strong>".$books->requisition_date; ?></span>
                <span><?php echo "<strong>Issue Type: </strong>".$books->isssue_type; ?></span>
            </div>
            <div class="box-button">
                    <?php if($books->status=='Available'){?>
            <a target="_blank" class="btn btn-success btn-xs" href="<?php echo base_url() . "Library/LibraryDetails/issue_book_id/1/". $books->acc_no; ?>">Normal Issue Book</a>
            <a target="_blank" class="btn btn-primary btn-xs" href="<?php echo base_url() . "Library/LibraryDetails/issue_book_id/2/". $books->acc_no; ?>">Book Bank Issue</a>
                    <?php }else{?>
              Book Is Not Available      
                    <?php }?>
            </div>
        </div>
    </div>

<?php }}?>

<?php }?>

</div>


        </div>
        <?php } else { ?>
        <section id="dashboardbody">
            <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h4 class="alert alert-info">Subject Groups</h4>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src='//code.jquery.com/jquery-1.12.4.js'></script>
        <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
        <script>
            $(document).ready(function() {
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

    </body>
    </html>