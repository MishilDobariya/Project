<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$config = require('../config/esta_config.php');
?>
<html>
    <head>
        <style>
            body
            {
                width:98%;	
            }
            h3
            {
                text-align: center;
                margin-bottom: -15px;
            }
            hr
            {
                margin-top: 30px;
                border-style: solid;
            }

            p
            {
                font-size:16px;	
                line-height: 15px
            }
            table, th, tr, td
            {
                border:1px solid black;
                border-collapse:collapse;
                text-align:center;
            }
            .th
            {
                background-color:#e3e5e8;
            }
            @page {
                size: A4 landscape;
                @top-right {
                    content: "Page " counter(page) " of " counter(pages);
                }
            }
            @media print
            {
                table { page-break-after:auto }
                tr    { page-break-inside:avoid; page-break-after:auto }
                td    { page-break-inside:avoid; page-break-after:auto }
                thead { display:table-header-group }
                tfoot { display:table-footer-group }
            }

            .btn.btn-primary {
                color: #ffffff;
                background-color: #428BCA;
                background-image: linear-gradient(to bottom, #428BCA, #2D6CA2);
                padding:6px;
                border-radius:6px;
                font-size:16px;
            }
            .btn.btn-primary:hover {
                color: #ffffff;
                background-color: #2D6CA2;
                background-image: linear-gradient(to bottom, #2D6CA2, #2D6CA2);
            }
        </style>
        <script src="../../js/custom.js" type="text/javascript"></script>
        
    </head>
    <body>
        <div>
            <center>
                <h2>V.V.P. Engineering College, Rajkot</h2>
                <hr>
            </center>
            </center>
                <h3>Setting Master Report: </h3>
                <br>
                <br>
            </center>
            <table width="100%" cellpadding="5" id="table">
                <thead>
                    <tr>
                        <th class="th" rowspan="2">No.</th>
                        <th class="th" rowspan="2">Setting Due Date</th>
                        <th class="th" rowspan="2">Reminder</th>
                        <th class="th" rowspan="2">Reminder Alert Time Period</th>
                    </tr>
                </thead>
                <?php
                $i = 1;
                foreach ($data as $key ) {
                    
                    //$i++;
//                     \app\models\AllGlobalFunction::setecho($val);
//                    exit;
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                            <td style="text-align: left;"><?php echo date("d/m/Y",strtotime($key['Magazine_Setting_Due_Date'])); ?></td>
                            <td style="text-align: left;"><?php echo $key['Reminder']; ?></td>
                            <td style="text-align: left;"><?php echo $key['Reminder_Alert_Time_Period']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <br>
            <iframe id="txtArea1" style="display:none"></iframe>
            <button id="btnExport" onclick="fnExcelReport();"class="btn btn-primary btn-sm no-print"><span class="glyphicon glyphicon-export"></span> Export to Excel</button>
            <br><br><br>

        </div>
    </body>
</html>
