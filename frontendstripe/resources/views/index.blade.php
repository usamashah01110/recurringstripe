<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Recurring Donation</title>

    <!-- Bootstrap for Styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script> <!-- Stripe.js -->
</head>
<body>
<div class="container mt-5">
    <div class="col-md-4 mt-5">
        <a href="{{ route('donate.onetime') }}" class="btn btn-primary">One Time Payment</a>
        <a href="{{ route('donate.recurring') }}" class="btn btn-primary">Recurring Payment</a>
    </div>
</div>

</body>
</html>

