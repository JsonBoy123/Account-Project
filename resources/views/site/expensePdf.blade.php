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
        .expense{
            color: Blue;
        }
        .itemused{
            color: red;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Site Details</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                       
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-10" align="left">
                    <h2 class="heading site">For:{{ $data->job_describe }}</h2>
                </div>
                <div class="col-2" align="right">
                    <h2 class="heading">site code:{{ $data->job_code }}</h2>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Purchase Status</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th class="w-20">S.no</th>
                        <th class="w-20">Purchased Form</th>
                        <th class="w-20">No. Of Item</th>
                        <th class="w-20">Alloted By Manger</th>
                        <th class="w-20">Received By</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach($show as $shw)
                    <tr>
                         <td>{{ $i++ }}</td>
                      <td>{{ $shw->vendor->firm_name }}</td>
                      <td>{{ count(json_decode($shw->items))}}</td>
                      <td>{{ $shw->infosite->manager->name}}</td>
                      <td>{{ $shw->infosite->user->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            @if($count > 0)
            <h3 class="heading expense">Total Expenses on Site Item Wise</h3>
             <table class="table-bordered">
                <thead>
                    <tr>
                        <th class="w-20">Item No.</th>
                        <th class="w-20">Item</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">unit Price</th>
                        <th class="w-20">Total</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach($cost as $sot)
                    <tr>
                      <td>{{ $sot->item_number }}</td>
                      <td>{{ $sot->name->title }}</td>
                      <td>{{ $sot->send_on_site }}</td>
                      <td>{{ number_format($sot->price,2) }}</td>
                      <td>{{ number_format(($sot->price * $sot->send_on_site),2) }}</td>
                    </tr>
                    @endforeach
                 
                    </tbody>
            </table>
            <p class="text-right font-weight-bold">Total Cost-{{ number_format(totalexpense($sot->site_id),2) }}</p>
            @endif
            {{-- <h3 class="heading">Payment Mode: Amount Received by Cheque</h3> --}}
            @if($count2 > 0)
            <h3 class="heading itemused">Current Item Expenses on sites</h3>
             <table class="table-bordered">
                <thead>
                    <tr>
                        <th class="w-20">Item No.</th>
                        <th class="w-20">Item</th>
                        <th class="w-20">used Quantity</th>
                        <th class="w-20">Available Quantity</th>
                        <th class="w-20">Totalcurrcost</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach($currcost as $used)
                     <tr>
                      <td>{{ $used->item_number }}</td>
                      <td>{{ $used->usedQuantity->title }}</td>
                      <td>{{ $used->total }}</td>
                      <td>{{ (App\expensedetail::where(['site_id'=>$id,'item_number'=>$used->item_number])->first()->send_on_site - $used->total) }}</td>
                      <td>{{ number_format((App\expensedetail::where(['site_id'=>$id,'item_number'=>$used->item_number])->first()->price * $used->total),2) }}</td>
                    </tr>
                    @endforeach
                 
                    </tbody>
            </table>
            @endif
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2022 - Liber solution Soft. All rights reserved. 
                <a href="http://www.libersolution.com/" class="float-right">Venture Of Laxyo</a>
            </p>
        </div>      
    </div>      

</body>
</html>