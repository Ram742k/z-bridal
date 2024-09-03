<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sales Report</title>
    
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .table { width: 100%; border-collapse: collapse; }
        .table, .table th, .table td { border: 1px solid black; }
        .table th, .table td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Sales Report</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Invoice Number</th>
                <th>Invoice Date</th>
                <th>Customer Name</th>
                <th>Sales Person</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salesReports as $report)
                <tr>
                    <td>{{ $report->invoice_number }}</td>
                    <td>{{ Carbon\Carbon::parse($report->invoice_date)->format('d-m-Y') }}</td>
                    <td>{{ $report->customer_name }}</td>
                    <td>{{ $report->sales_person_name }}</td>
                    <td>${{ number_format($report->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
