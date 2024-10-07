<!-- Include Bootstrap CSS in your head section -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Subscribe Now</h4>
                </div>
                <div class="card-body">
                    <form id="subscription-form" method="POST" action="{{ route('subscribe.process') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                        </div>

                        <div class="mb-3">
                            <label for="card-element" class="form-label">Card Information</label>
                            <div id="card-element" class="form-control">
                                <!-- Stripe Card Element will be inserted here -->
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">Subscribe</button>
                        </div>

                        <div id="success-message" class="alert alert-success mt-3 d-none" role="alert">
                            Subscription successful! Thank you for subscribing.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Initialize Stripe with your publishable test key
    const stripe = Stripe('{{ config('services.stripe.key') }}');
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const form = document.getElementById('subscription-form');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const { paymentMethod, error } = await stripe.createPaymentMethod('card', card);
        if (error) {
            // Handle error
            console.log(error);
        } else {
            // Send the paymentMethod.id to your server
            const formData = new FormData(form);
            formData.append('payment_method', paymentMethod.id);

            const response = await fetch('{{ route('subscribe.process') }}', {
                method: 'POST',
                body: formData,
            });

            const result = await response.json();
            console.log(result);

            if (response.ok) {
                // Show success message
                document.getElementById('success-message').classList.remove('d-none');

                // Optionally refresh the page after a delay
                setTimeout(() => {
                    location.reload();
                }, 3000); // 3 seconds delay before refreshing
            } else {
                // Handle errors returned from your server
                console.error(result.error);
            }
        }
    });
</script>
