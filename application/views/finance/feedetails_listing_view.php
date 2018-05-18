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

            <div class="col-md-12">
            <div class="input-group margin-bottom-sm">
               <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span><input type="text" class="form-control" id="search" placeholder="search here">
            </div>
            </div>
            <br><br>
               <div class="col-md-12">
        
        
                  <table id="example" class="responstable" style="max-width:calc(100% - 30px);">
                     <tr>
                        <th style="cursor:pointer;">Stream Name</th>
                        <th style="cursor:pointer;">Subjects</th>
                        <th style="cursor:pointer;">Fee 1st Year</th>
                        <th style="cursor:pointer;">Fee 2nd Year</th>
                        <th style="cursor:pointer;">Fee 3rd Year</th>
                     </tr>
                     <?php if(!empty($fee_data)){ $i=1; foreach($fee_data as $list) { ?>
                     <tr>
                        <td id="<?php echo $i; ?>"><?php echo $list->stream_name;?>&nbsp;(<?php echo $list->subject_1;?>)</td>
                        <td><?php echo $list->subject_1_code;?>,&nbsp;<?php echo $list->subject_2_code;?>, &nbsp;<?php echo $list->subject_3_code;?></td>
                        <td><ul>
                          <?php foreach($this->base_model->get_amount($list->grp_id,1) as $data): ?>
                            <li style="margin-left:-32px"><?php echo $data->fee_type ?> : <?php echo number_format($data->amt,2) ?> <a onClick="return myModal('<?php echo $list->stream_name;?>','<?php echo $data->fee_type ?>',1)"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                          <?php endforeach; ?>
                        </ul></td>
                        <td><ul>
                          <?php foreach($this->base_model->get_amount($list->grp_id,2) as $data): ?>
                            <li style="margin-left:-32px"><?php echo $data->fee_type ?> : <?php echo number_format($data->amt,2) ?> <a onClick="return myModal('<?php echo $list->stream_name;?>','<?php echo $data->fee_type ?>',2)"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                          <?php endforeach; ?>
                        </ul></td>
                        <td><ul>
                          <?php foreach($this->base_model->get_amount($list->grp_id,3) as $data): ?>
                            <li style="margin-left:-32px"><?php echo $data->fee_type ?> : <?php echo number_format($data->amt,2) ?> <a onClick="return myModal('<?php echo $list->stream_name;?>','<?php echo $data->fee_type ?>',3)"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                          <?php endforeach; ?>
                        </ul></td> 
                     </tr>
                     <?php $i++; } } ?>
                  </table>
               </div>
            
         </div>
         <!-- Modal -->
          <div id="dataModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">  </button>
        <h4 class="modal-title alert alert-info"><i class='fa fa-eercast'></i> <span id="hello">Fee Of</span></h4>
      </div>
      <span id="msgbox"></span>
      
      
      <div class="modal-body">
        <div class="row" id="finFee">
        	<!-- <div class="col-md-6">
            <strong>Fee Name</strong><br/>
          </div>
          <div class="col-md-6">
            <strong>Fee Amount</strong><br/>                
          </div> -->
        </div>
      </div>
     
    
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-success" onclick="chkpass()">Proceed</button> -->
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
         function myModal(stream,fee_type,year) {
          var fee_of=stream;
          $('#hello').html("Fee Of "+fee_of);
          $('#dataModal').modal();
          // Jquery Ajax Code Here 
          var urls="<?php echo base_url() ?>Finance/financeDetails/fin_fee_details/";
          var datas={'fee_type':fee_type,'year':year};
          $.ajax({
            type: "post",
            url: urls,
            data: datas,
            dataType: "html",
            beforeSend: function(){
             $('#finFee').html("<center><i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i><br><span>Loading...</span></center>");
            },
            success: function (response) {
              $('#finFee').html(response);
            }
            // complete: function(){
            //   $('#finFee').html('');
            // }
          });
        }
      </script>  
   </body>
</html>