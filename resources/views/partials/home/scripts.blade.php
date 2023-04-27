@section('scripts')
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('assets/vendor/materialize-src/js/plugins.min.js') }}"></script>
    <!-- END PAGE LEVEL JS-->

    <script>
        // Carousel
        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true
        });

        // Sosmed button
        $(document).ready(function() {
            $('.fixed-action-btn').floatingActionButton({
                hoverEnabled: false
            });
        });
    </script>
@endsection
