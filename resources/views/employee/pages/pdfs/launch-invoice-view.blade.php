<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>INV-{{ $invoice->invoice_number }}</title>
    {{-- <link rel="stylesheet" href="{{  }}" media="all" /> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet"> --}}
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 5px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #1a1a1a;
            font-size: 18px;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #1a1a1a;
            font-size: 18px;
            background: #e8ebff;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #f8f8f8;
        }

        table .qty {}

        table .total {
            background: #e8ebff;
            color: #1a1a1a;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 18px;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 18px;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #006aff;
            font-size: 16px;
            border-top: 1px solid #006aff;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body style="width: 100%!important;">
    <header class="clearfix">
        <div id="logo">
            <img src="{{ public_path('storage/uploads/company/' . $companyDetails->company_logo) }}">
        </div>
        <div id="company">
            <h2 class="name">{{ $companyDetails->company_name }}</h2>
            <div>{{ $companyDetails->company_address }}</div>
            <div>{{ $companyDetails->company_phone }}</div>
            <div><a href="mailto:company@example.com">{{ $companyDetails->company_email }}</a></div>
        </div>
        </div>
    </header>
    <main style="width: 100%!important; overflow:hidden;">
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">INVOICE TO:</div>
                <h2 class="name">John Doe</h2>
                <div class="address">796 Silver Harbour, TX 79273, US</div>
                <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
            </div>
            <div id="invoice">
                <h1>INVOICE #{{$invoice->invoice_number}}</h1>
                <div class="date">Date of Invoice: {{ date('d/m/Y', strtotime($invoice->invoice_date)) }}</div>
                {{-- <div class="date">Due Date: 30/06/2014</div> --}}
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0" >
            <thead>
                <tr>
                    <th class="no" width="5%">#</th>
                    <th class="date" width="12%">DATE</th>
                    <th class="desc"  width="12%">DESCRIPTION</th>
                    <th class="unit"  width="10%">UNIT PRICE</th>
                    <th class="qty"  width="10%">QUANTITY</th>
                    <th class="total"  width="15%" style="text-align: right;">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                    $total_cost = 0;
                    $grand_total = 0;
                    $utility = 0;
                @endphp
                @for ($i = \Carbon\Carbon::parse($invoice->start_date); $i <= \Carbon\Carbon::parse($invoice->end_date); $i->addDay())
                    @php
                        $daily_total_launch_sheet = \App\Models\ExtraLaunch::whereDate('date', date('Y-m-d', strtotime($i)))->first()->total_launch;
                        $per_day_cost = $daily_total_launch_sheet * $price_per_launch;
                        $total_cost += $per_day_cost;
                    @endphp

                    <tr>
                        <td class="no">{{ $count++ }}</td>
                        <td class="date" style="text-align: center;">{{ date('d M, Y', strtotime($i)) }}</td>
                        <td class="desc" style="text-align: center;">{{ date('l', strtotime($i)) }}</td>
                        <td width="10%" style="text-align: center;" class="unit">BDT. {{ $price_per_launch }}</td>
                        <td width="10%" style="text-align: center;" class="qty">{{ $daily_total_launch_sheet }}</td>
                        <td width="10%" style="text-align: right;" class="total">BDT. {{ $per_day_cost }}</td>
                    </tr>
                @endfor
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">SUBTOTAL</td>
                    <td>BDT. {{ $total_cost }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">Utility</td>
                    <td>BDT. {{ $utility }}</td>
                    @php
                        $grand_total = $total_cost + $utility;
                    @endphp
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">GRAND TOTAL</td>
                    <td>BDT. {{ $grand_total }}</td>
                </tr>
            </tfoot>
        </table>
        <div id="thanks">Thank you!</div>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
