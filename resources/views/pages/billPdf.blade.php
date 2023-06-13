<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laxyo</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }

        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
        .site{
            color: green;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">{{ $gene->company->name }}-Client Bill</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                       
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-5" align="left">
                    <h2 class="heading">Invoice No.: {{ $gene->invoive_number}}</h2>
                    <p class="sub-heading">Invoice Type. {{ $gene->invoice_type }} </p>
                    <p class="sub-heading">Sale Date: {{ $gene->sales_date }} </p>
                    <p class="sub-heading">Gstin: 23AAACY6118N1Z4 </p>
                </div>
                <div class="col-7 justify" style="float: right">
                  {{--   <h2 class="heading">Site:  {{ $gene->job->job_describe}}</h2> --}}
                    <p class="sub-heading">Tender No.:  {{ $gene->job->tender_no}}</p>
                    <p class="sub-heading">Site-code:  {{ $gene->job->job_code}}</p>
                    <p class="sub-heading">Location :  {{ $gene->job->location}}</p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h2 class="heading site">Site:  {{ $gene->job->job_describe}}</h2>
            <h3 class="heading">Billing Status</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th class="w-20">Tds</th>
                        <th class="w-20">Gst</th>
                        <th class="w-20">Other</th>
                        <th class="w-20">5% sd</th>
                        <th class="w-20">CQ received</th>
                        <th class="w-20">Mo. Amount</th>
                        <th class="w-20">Rent Amount</th>
                        <th class="w-20">TDA</th>
                        <th class="w-20">ODA</th>
                        <th class="w-20">Gst hold</th>
                        <th class="w-20">Royality hold</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $gene->tds_amount}}</td>
                        <td>{{ $gene->gst_amount}}</td>
                        <td>{{ $gene->other}}</td>
                        <td>{{ $gene->five_percrnt_sd_amount}}</td>
                        <td>{{ $gene->total_ck_rec}}</td>
                        <td>{{ $gene->mobilize_amount}}</td>
                        <td>{{ $gene->mobilize_amount}}</td>
                        <td>{{ $gene->total_deduct_amount}}</td>
                        <td>{{ $gene->other_deduct_amount}}</td>
                        <td>{{ $gene->gst_hold}}</td>
                        <td>{{ $gene->hold_for_royalty}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Gross Invoice Total</td>
                        <td> {{ $gene->gross_total_invoice_value}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Base Taxable Amount</td>
                        <td> {{ $gene->base_amount_taxable_value}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Total Amount</td>
                        <td>{{ $gene->total_amount}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Outstanding</td>
                        <td> {{ $gene->outstanding}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Balance to be billed</td>
                        <td> {{ $gene->balance_to_be_billed}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Amt to be received</td>
                        <td> {{ $gene->amount_to_be_received}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Taxable value</td>
                        <td> {{ $gene->taxable_value}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Check Amount</h3>
             <table class="table-bordered">
                <thead>
                    <tr>
                        <th class="w-20">Payment  Date</th>
                        <th class="w-20">Payment Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php  $s_no= 1 @endphp
                    @foreach($ckamt as $cmaot)
                    <tr>
                        <td>{{ $cmaot->cheque_date }}</td>
                        <td>{{ $cmaot->cheque_amount }}</td>
                    </tr>
                    @php $s_no++ @endphp
               @endforeach
                    </tbody>
            </table>
            <h3 class="heading">Payment Mode: Amount Received by Cheque</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2022 - Liber solution Soft. All rights reserved. 
                <a href="http://www.libersolution.com/" class="float-right">Venture Of Laxyo</a>
            </p>
        </div>      
    </div>      

</body>
</html>