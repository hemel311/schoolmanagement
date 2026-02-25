<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .header p {
            margin: 2px 0;
        }

        .row {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: green;
            color: white;
        }

        .total {
            margin-top: 15px;
            text-align: right;
        }

        .total p {
            margin: 3px 0;
        }

        .btn {
            padding: 8px 12px;
            background: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 12px;
        }

        .no-print {
            margin-bottom: 15px;
        }

        @page {
            margin: 10mm;
        }
    </style>
</head>

<body>

{{-- 🔘 BUTTON (ONLY FOR BROWSER, NOT PDF) --}}
@if(empty($isPdf))
    <div class="no-print">
        <a href="{{ route('invoice.download', $invoice->id) }}" class="btn">
            Download PDF
        </a>
    </div>
@endif

{{-- HEADER --}}
<div class="header">
    <h2>School Management System</h2>
    <p><strong>Invoice No:</strong> {{ $invoice->invoice_no }}</p>
    <p><strong>Invoice Date:</strong> {{ $invoice->created_at->format('d M Y') }}</p>
    <p><strong>Payable Month</strong> {{ date('F', mktime(0, 0, 0, $invoice->month, 1)) }}</p>
</div>

{{-- STUDENT INFO --}}
<div class="row">
    <strong>Student Roll:</strong> {{ $invoice->rollno }} <br>
    <strong>Status:</strong> {{ strtoupper($invoice->status) }}
</div>

{{-- INVOICE TABLE --}}
<table>
    <thead>
    <tr>
        <th>Fee Head</th>
        <th>Amount</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoice->items as $item)
        <tr>
            <td>{{ $item->fee_head }}</td>
            <td>{{ number_format($item->amount, 2) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{-- TOTALS --}}
<div class="total">
    <p><strong>Total:</strong> {{ number_format($invoice->total_amount, 2) }}</p>
    <p><strong>Paid:</strong> {{ number_format($invoice->paid_amount, 2) }}</p>
    <p><strong>Due:</strong> {{ number_format($invoice->due_amount, 2) }}</p>
</div>

</body>
</html>
