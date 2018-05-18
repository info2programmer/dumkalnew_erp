<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        html, body {padding: 0; margin: 0}
        .container {
            display: block;
            float: left;
            width: 210mm; height: 297mm;
            padding-left: 5.5mm;
            padding-right: 5.5mm;
            padding-top: 12mm;
            padding-bottom: 12mm;
            /*outline: 1px solid red;*/
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .block {
            display: block;
            height: 21mm;
            width: 38mm;
            /*outline: 1px dotted;*/
            float: left;
            margin-right: 2mm;
			-webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
			padding:10mm 5mm 5mm 5mm;
        }
        .block:nth-child(5n) {
            margin-right: 0;
        }
    </style>
</head>
<body>
<div class="container">
<?php if (empty($barcode)){?>                     
                        	<div align="center">No data found</div>                            
						<?php }else {?>
        <?php foreach ($barcode as $barcode){?>
    <div class="block"><img src="<?php echo base_url();?>library/libraryDetails/show_barcode/<?php echo $barcode->acc_no;?>"/></div>
<?php }}?>    
</div>
</body>
</html>