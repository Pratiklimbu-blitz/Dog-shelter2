<script>
    const BASE_URL = "<?php echo e(url('/')); ?>";
    const CSRF_TOKEN = "<?php echo e(csrf_token()); ?>"
</script>
<!-- Vendors JS -->
<script src="{{asset('assets/front/js/vendor/modernizr-3.11.7.min.js')}}"></script>
<script src="{{asset('assets/front/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/front/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('assets/front/js/vendor/bootstrap.bundle.min.js')}}"></script>

<!--Common Plugins JS -->
<script src="{{asset('assets/plugins/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/plugins/toastr.min.js')}}"></script>

<!-- Plugins JS -->
<script src="{{asset('assets/front/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/front/js/plugins/svg-inject.min.js')}}"></script>
<script src="{{asset('assets/front/js/plugins/fancybox.min.js')}}"></script>

<!-- Custom Main JS -->
<script src="{{asset('assets/front/js/main.js')}}"></script>
