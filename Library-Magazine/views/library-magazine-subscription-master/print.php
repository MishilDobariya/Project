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
        <script src="../../js/custom.js"></script>
    </head>
    <body>
        <div>
            <center>
                <h2>V.V.P. Engineering College, Rajkot</h2>
                <hr>
            </center>
            </center>
                <h3>Subscription Master Report: </h3>
                <br>
                <br>
            </center>
            <table width="100%" cellpadding="5" id="table">
                <thead>
                    <tr>
                        <th class="th" rowspan="2">No.</th>
                        <th class="th" rowspan="2">Magazine Title</th>
                        <th class="th" rowspan="2">Date</th>
                        <th class="th" rowspan="2">Subscription No</th>
                        <th class="th" rowspan="2">Amount</th>
                        <th class="th" rowspan="2">From Date</th>
                        <th class="th" rowspan="2">To Date</th>
                        <th class="th" rowspan="2">Volume No</th>
                        <th class="th" rowspan="2">Issue No</th>
                        <th class="th" rowspan="2">Month</th>
                        <th class="th" rowspan="2">Year</th>
                        <th class="th" rowspan="2">Period Month</th>
                        <th class="th" rowspan="2">Supplier Name</th>
                        <th class="th" rowspan="2">Mail To Send</th>
                        <th class="th" rowspan="2">SMS No</th>
                        <th class="th" rowspan="2">Price</th>
                        <th class="th" rowspan="2">Status</th>
                        <th class="th" rowspan="2">Accession No</th>
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
                            <td style="text-align: left;"><?php echo $key['Magazine_Title']; ?></td>
                            <td style="text-align: left;"><?php echo date("d/m/Y",strtotime($key['Magazine_Subscription_Date'])); ?></td>
                            <td style="text-align: left;"><?php echo $key['Magazine_Subscription_No']; ?></td>
                            <td style="text-align: left;"><?php echo $key['Magazine_Subscription_Amount']; ?></td>
                            <td style="text-align: left;"><?php echo date("d/m/Y",strtotime($key['Magazine_Subscription_From_Date'])); ?></td>
                            <td style="text-align: left;"><?php echo date("d/m/Y",strtotime($key['Magazine_Subscription_To_Date'])); ?></td>
                            <td style="text-align: left;"><?php echo $key['Magazine_Subscription_Volume_No']; ?></td>
                            <td style="text-align: left;"><?php echo $key['Magazine_Subscription_Issue_No']; ?></td>
                            <td style="text-align: left;"><?php echo $key['Magazine_Subscription_Month']; ?></td>
                            <td style="text-align: left;"><?php echo $key['Magazine_Subscription_Year']; ?></td>
                            <td style="text-align: left;"><?php echo $key['Subscription_Period_Month']; ?></td>
                            <td style="text-align: left;"><?php echo $key['Magazine_Supplier_Name']; ?></td>
                            <td style="text-align: left;"><?php echo $key['Magazine_Mail_To_Send']; ?></td>
                            <td style="text-align: left;"><?php echo $key['SMS_No']; ?></td>
                            <td style="text-align: left;"><?php echo $key['Price_Of_Issue']; ?></td>
                            <td style="text-align: left;"><?php echo $key['Book_Status_Description']; ?></td>
                            <td style="text-align: left;"><?php echo $key['Magazine_Accession_No']; ?></td>
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
