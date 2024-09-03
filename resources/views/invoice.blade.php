<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Invoice</title>
    <style>
        @page {
          

            
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0.1in;
        }
       
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header img {
            max-width: 100px;
            height: auto;
        }
        .invoice-body {
            margin-top: 20px;
        }
        .table-responsive {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
        }
        .text-right {
            text-align: right;
        }
        .text-blue {
            color: blue;
        }
        .text-red {
            color: red;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
        }
        .badge.bg-danger {
            background-color: #dc3545;
        }
        .mt-4 {
            margin-top: 20px;
        }
        .mb-0 {
            margin-bottom: 0;
        }
        .text-uppercase {
            text-transform: uppercase;
        }
        .text-muted {
            color: #6c757d;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="invoice-container" >
        <!-- Invoice Header -->
        <div class="invoice-header">
            <h1>Z-bridal Studio & Acadamy</h1>
            <h2 class="mt-2">Invoice #{{ $invoice->invoice_number }}</h2>
            <p class="text-muted">{{ Carbon\Carbon::parse($invoice->invoice_date)->format('F jS, Y') }}</p>
        </div>
        
        <!-- Company and Customer Info -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h4 class="text-uppercase">Company Details</h4>
                <p>Z-bridal Studio & Acadamy</p>
                <p>Peraiyur Road</p>
                <p>Usilampatti-625 532</p>
            </div>
            <div class="col-md-6 text-right">
                <h4 class="text-uppercase">Customer Details</h4>
                <p>{{ $invoice->customer_name }}</p>
                <p>{{ $invoice->customer_address }}</p>
                <p>{{ $invoice->cutomer_email }}</p>
            </div>
        </div>

        <!-- Invoice Table -->
        <div class="invoice-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Items</th>
                            <th>Price</th>
                            <th>Tax Amt</th>
                            <th>Amount (Net)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->items as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <h5>{{ $item->service_name }}</h5>
                                <p>{{ $item->description }}</p>
                            </td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->tax }}</td>
                            <td>{{ number_format($item->total, 2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td>
                                <p>Subtotal</p>
                                <p>Discount</p>
                                <p>VAT</p>
                                <h4 class="mt-4 text-blue">Total USD</h4>
                            </td>
                            <td>
                                <p>{{ number_format($invoice->sub_total, 2) }}</p>
                                <p>{{ number_format($invoice->discount_amount, 2) }}</p>
                                <p>{{ number_format($invoice->total_tax, 2) }}</p>
                                <h4 class="mt-4 text-blue">${{ number_format($invoice->total, 2) }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <h5 class="text-red">NOTES</h5>
                                <p>{{ $invoice->notes }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer with Overdue Badge -->
        <div class="footer">
            @if ($invoice->is_overdue)
            <span class="badge bg-danger">Overdue</span>
            @endif
        </div>
    </div>

    <!-- Print Button and Script -->
   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script> 
  printThis();
    function printThis() {

    var content =document.getElementById("panel").innerHTML;

    $('<iframe>', {
        name : 'myiframe',
        id   : 'printFrame',
        style: 'display:none'
    })
    .appendTo('body')
    .contents().find('body')
    .append(content);

    setTimeout(() => { 
        window.frames['myiframe'].focus();
        window.frames['myiframe'].print(); 
        var frame = document.getElementById("printFrame");
        frame.parentNode.removeChild(frame);
        window.location="sales.php";

    }, 200); 

}
    </script> 

</body>

</html>
