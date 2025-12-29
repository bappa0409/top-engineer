<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<!--begin::Head-->
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins&family=Raleway&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/frontend/vendor/animate/animate.min.css') }}" rel="stylesheet"/>


    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/socializer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

    @stack('css')
</head>
<!--end::Head-->

<body>
    <!--begin::Wrapper-->
    <div class="wrapper">

        <!-- begin:: Vertical Social Networks (Desktop Only) -->
        <div class="d-none d-lg-block sr-sharebar sr-sb-vl sr-sb-left">
            <div class="socializer sr-48px sr-opacity sr-vertical sr-icon-white">

                <!-- LinkedIn -->
                <span class="sr-linkedin">
                    <a href="https://www.linkedin.com/company/top-engineer/" target="_blank" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </span>

                <!-- WhatsApp -->
                <span class="sr-whatsapp">
                    <a href="https://wa.me/message/NJAV34FHKK47G1" target="_blank" title="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </span>

                <!-- Telegram -->
                <span class="sr-telegram">
                    <a href="https://t.me/TopEngineerChat" target="_blank" title="Telegram">
                        <i class="bi bi-telegram"></i>
                    </a>
                </span>

                <!-- Skype -->
                <span class="sr-skype">
                    <a href="skype:perezhog" target="_blank" title="Skype">
                        <i class="bi bi-skype"></i>
                    </a>
                </span>

            </div>
        </div>
        <!-- end::End Vertical Social Networks -->


        @include('frontend.include.header')

        <!--begin::Content-->
        @yield('website_content')
        <!--end::Content-->


        <!--begin::Footer-->
        @include('frontend.include.footer')
        <!--end::Footer-->

    </div>
    <!--end::Wrapper-->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    {{-- <!-- Preloader -->
    <div id="preloader"></div> --}}

    <!--begin::Jquery-->
    <script src="{{asset('assets/frontend/vendor/jquery/jquery-3.6.3.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery-ui/jquery-ui.js') }}"></script>
    <!--end::Jquery-->


    <!--begin::Sweet Alert-->
    <script src="{{asset('assets/frontend/vendor/sweetalert2/sweetalert2.js')}}"></script>
    <!--end::Sweet Alert-->

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

    <!-- Main JS File -->
    <script src="{{asset('assets/frontend/js/app.js')}}?v_{{date("h_i")}}"></script>


    <!--begin::Custom-->
    <script src="{{asset('assets/frontend/js/custom.js')}}?v_{{date("h_i")}}"></script>
    <!--end::Custom-->
    
    @stack('scripts')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
    </script>
</body>

</html>