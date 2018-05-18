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
            <?php if(!isset($search_book)): ?>
            <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form name="barcode_form" action="<?php echo base_url();?>Library/LibraryDetails/bookrenew_submit" method="post" enctype="multipart/form-data">
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
        <h3 class="text-on-pannel text-primary"><strong class="text-uppercase"> Return Books </strong></h3>
                    <div class="form-group">
                    <div class="input-group-inline">
                
                <label for="">Book Barcode</label>
                <input type="text" name="txt_id" id="barcode" class="form-control" autofocus/>
                </div>
                </div>
                 
                </div>
                </div>
                </form>
                </div>
            </div>
        <?php else: ?>
        <?php foreach($search_book as $books): ?>
        <form method="post" name="renew_form" action="<?php echo base_url();?>Library/LibraryDetails/renew_book">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h3 class="text-on-pannel text-primary"><strong class="text-uppercase"> Renew Books</strong></h3>
                    <input type="hidden" name="acc_no" value="<?php echo $books->acc_no;?>" />
                    <input type="hidden" name="member_id" value="<?php echo $books->member_id;?>" />
                    <input type="hidden" name="member_name" value="<?php echo $books->member_name;?>" />
                    <input type="hidden" name="dep_id" value="<?php echo $depid;?>" />
                    <input type="hidden" name="act_id" value="<?php echo $actid;?>" />
                    <input type="hidden" name="usr_id" value="<?php echo $uid;?>" />
                    <div class="form-group">
                        <label for="">Book Acc. No : <?php echo $books->acc_no;?></label>
                    </div>
                    <div class="form-group">
                        <label for="">Book Name : <?php echo $books->title;?></label>
                    </div>
                    <div class="form-group">
                        <label for="">Studunt/Emp ID : <?php echo $books->member_id;?></label>
                    </div>
                    <div class="form-group">
                        <label for="">Studunt/Emp Name : <?php echo $books->member_name;?></label>
                    </div>
                    <div class="form-group">
                        <label for="">Book Issue Date : <?php echo $books->issue_date;?></label>
                    </div>
                    <div class="form-group">
                        <label for="">Book Return Date : <?php echo $books->due_date;?></label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Renew Now</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </form>
        <?php endforeach; ?>
        <?php endif; ?>
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
<script>
window.onload = function() {
var input = document.querySelector('#barcode');
input.addEventListener('input', function(){
  if(document.getElementById("barcode").value.length>=5)
  {	
  document.forms['barcode_form'].submit();
  }
})};
</script>
    </body>
    </html>