<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<!--begin::Head-->
<head>
    <!--begin::Meta-->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="title" content="@yield('title')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Permissions-Policy" content="interest-cohort=()">
    @yield('meta')
    <!--end::Meta-->
    
    <title>@yield('title')</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    @include('frontend.include.css')
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

    @include('frontend.include.js')

    @stack('scripts')
</body>

</html>