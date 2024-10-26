<!-- resources/views/includes/footer.blade.php -->
        <!-- Footer Section -->
        <section class="footer_section">
            <div class="social_box">
                <a href="#"><img src="{{ asset('images/facebook.png') }}" alt=""></a>
                <a href="#"><img src="{{ asset('images/twitter.png') }}" alt=""></a>
                <a href="#"><img src="{{ asset('images/linkedin.png') }}" alt=""></a>
                <a href="#"><img src="{{ asset('images/instagram.png') }}" alt=""></a>
                <a href="#"><img src="{{ asset('images/youtube.png') }}" alt=""></a>
            </div>
            <p>
                &copy; 2020 All Rights Reserved. Design by
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </section>

        <!-- JS Files -->
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        <!-- Carousel Script -->
        <script>
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                    0: { items: 1 },
                    600: { items: 2 },
                    1000: { items: 2 }
                }
            });
        </script>

    </div>
</body>
</html>
