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
    <h1 class="text-center mb-4">Recurring Donation</h1>

    <!-- Recurring Donation Form -->
    <div class="card">
        <div class="card-body">
            <!-- Error Message Display -->
            <div id="error-message" class="alert alert-danger d-none"></div> <!-- Add d-none to hide initially -->

            <form id="recurring-donation-form">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <label for="currency" class="form-label">Currency</label>
                    <select name="currency" class="form-select" required>
                        <option value="usd">USD</option>
                        <option value="eur">EUR</option>
                        <option value="gbp">GBP</option>
                    </select>
                </div>

                <!-- Hidden Plan ID (Static Plan ID) -->
                <input type="hidden" name="plan" value="price_1Q7htRBM5xKzBdxGJiyKv2MY">

                <div class="mb-3" id="card-element">
                    <!-- Stripe Elements will be inserted here -->
                </div>

                <div class="d-grid gap-2">
                    <button id="recurring-pay-button" type="button" class="btn btn-primary">Subscribe</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const recurringDonationUrl = "http://127.0.0.1:8000/api/donation/recurring";
    // Initialize Stripe
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    // CSRF Token
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Handle Recurring Donation
    document.getElementById('recurring-pay-button').addEventListener('click', async function() {
        // Clear previous error message
        const errorMessageDiv = document.getElementById('error-message');
        errorMessageDiv.classList.add('d-none'); // Hide the error div initially
        errorMessageDiv.textContent = ''; // Clear content

        // Create Payment Method
        const { paymentMethod, error } = await stripe.createPaymentMethod({
            type: 'card',
            card: cardElement,
        });

        if (error) {
            // Show error message in the div
            errorMessageDiv.textContent = error.message;
            errorMessageDiv.classList.remove('d-none'); // Show the error div
        } else {
            // Prepare form data
            const formData = new FormData(document.getElementById('recurring-donation-form'));
            formData.append('payment_method', paymentMethod.id);

            // Send to server
            fetch(recurringDonationUrl, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        // Show server-side error message
                        errorMessageDiv.textContent = data.error;
                        errorMessageDiv.classList.remove('d-none');
                    } else {
                        alert(data.message);
                    }
                })
                .catch(() => {
                    // Show general error if fetch fails
                    errorMessageDiv.textContent = "An error occurred. Please try again.";
                    errorMessageDiv.classList.remove('d-none');
                });
        }
    });
</script>
</body>
</html>
