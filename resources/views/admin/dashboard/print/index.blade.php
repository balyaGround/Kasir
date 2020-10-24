<html>
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;


        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }

        @page
        {
            size: auto;   /* auto is the current printer page size */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }

        body
        {
            background-color:#FFFFFF;
            border: solid 1px black ;
            margin: 0px;  /* the margin on the content before printing */
        }
    </style>
</head>

<body onload="tsw_init_page_global()">
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>Invoice</h2>
                <h3 class="pull-right">Order # {{$nomorinvoice}}</h3>
            </div>
            <hr>
{{--            <div class="row">--}}
{{--                <div class="col-xs-6">--}}
{{--                    <address>--}}
{{--                        <strong>Billed To:</strong><br>--}}
{{--                        John Smith<br>--}}
{{--                        1234 Main<br>--}}
{{--                        Apt. 4B<br>--}}
{{--                        Springfield, ST 54321--}}
{{--                    </address>--}}
{{--                </div>--}}
{{--                <div class="col-xs-6 text-right">--}}
{{--                    <address>--}}
{{--                        <strong>Shipped To:</strong><br>--}}
{{--                        Jane Smith<br>--}}
{{--                        1234 Main<br>--}}
{{--                        Apt. 4B<br>--}}
{{--                        Springfield, ST 54321--}}
{{--                    </address>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        CASH<br>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        {{$time}}<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">

                        <table class="table" style="align-content: center">
                            <thead>
                            <tr >
                                <td style="padding-left: 20px;padding-right: 20px;text-align: center">Nama Menu</td>
                                <td style="padding-left: 20px;padding-right: 20px;text-align: center">Jumlah</td>
                                <td style="padding-left: 20px;padding-right: 20px;text-align: center">@</td>
                                <td style="padding-left: 20px;padding-right: 20px;text-align: center">Total</td>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($data as $dt)
                                <tr>
                                    <td style="padding-left: 20px;padding-right: 20px;text-align: center">{{$dt['nama']}}</td>
                                    <td style="padding-left: 20px;padding-right: 20px;text-align: center">{{$dt['amount']}}</td>
                                    <td style="padding-left: 20px;padding-right: 20px;text-align: center">
                                        Rp.{{number_format($dt['harga_jual'])}}</td>
                                    <td style="padding-left: 20px;padding-right: 20px;text-align: center">
                                        Rp.{{number_format($dt['total'])}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td style="padding-left: 20px;padding-right: 20px;text-align: center"></td>
                                <td style="padding-left: 20px;padding-right: 20px;text-align: center"></td>
                                <td style="padding-left: 20px;padding-right: 20px;text-align: center">total</td>
                                <td style="padding-left: 20px;padding-right: 20px;text-align: center">Rp.{{number_format($totalHarga)}}</td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        window.print()
        window.onafterprint = function(){
            window.close()
        }
</script>
</body>
</html>


<!------ Include the above in your HEAD tag ---------->

