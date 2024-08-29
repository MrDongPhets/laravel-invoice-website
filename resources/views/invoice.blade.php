<!DOCTYPE html>
<html>
<head>
    <title>Invoice Details</title>
</head>
<body>
    <h1>Invoice Details</h1>
    <p>Status: {{ $invoice['status'] }}</p>
    <p>Invoice: {{ $invoice['invoice'] }}</p>
    <p>Customer: {{ $invoice['customer'] }}</p>
    <p>Amount: {{ $invoice['amount'] }}</p>
    <p>Due Date: {{ $invoice['due'] }}</p>
    <p>Issued Date: {{ $invoice['issued'] }}</p>
</body>
</html>