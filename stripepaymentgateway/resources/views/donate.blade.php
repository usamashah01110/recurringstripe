<!-- resources/views/one-time-payment.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>One-Time Donation</title>

    <!-- Bootstrap for Styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script> <!-- Stripe.js -->
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">One-Time Donation</h1>

    <!-- One-Time Donation Form -->
    <div class="card">
        <div class="card-body">
            <form id="one-time-donation-form">
                <div class="mb-3">
                    <label for="amount" class="form-label">Donation Amount</label>
                    <input type="number" name="amount" class="form-control" placeholder="Amount" required>
                </div>

                <div class="mb-3">
                    <label for="currency" class="form-label">Currency</label>
                    <select name="currency" class="form-select" required>
                        <option value="usd">USD</option>
                        <option value="eur">EUR</option>
                        <option value="gbp">GBP</option>
                    </select>
                </div>

                <div class="mb-3" id="card-element">
                    <!-- Stripe Elements will be inserted here -->
                </div>

                <div class="d-grid gap-2">
                    <button id="one-time-pay-button" type="button" class="btn btn-primary">Donate</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Initialize Stripe
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    // CSRF Token
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Handle One-Time Donation
    document.getElementById('one-time-pay-button').addEventListener('click', async function() {
        const { paymentMethod, error } = await stripe.createPaymentMethod({
            type: 'card',
            card: cardElement,
        });

        if (error) {
            alert(error.message);
        } else {
            const formData = new FormData(document.getElementById('one-time-donation-form'));
            formData.append('payment_method', paymentMethod.id);

            fetch("{{ route('donation.one-time') }}", {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken },
                body: formData
            }).then(response => response.json())
                .then(data => alert(data.message || data.error));
        }
    });
</script>
</body>
</html>
