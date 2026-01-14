<div id="topbar" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">

        <!-- Contact Info -->
        <div class="contact-info d-flex align-items-center flex-wrap gap-3">

            <!-- Address -->
            <div class="d-flex align-items-center">
                <i class="fas fa-map-marker-alt me-2 d-none d-lg-inline"></i>
                <span class="d-none d-lg-inline">332- South Paikpara, Bottola, Mirpur-1, Dhaka</span>
            </div>

            <!-- Phone -->
            <div class="d-flex align-items-center">
                <i class="fas fa-phone-alt me-2 d-none d-md-inline"></i>
                <a href="tel:+01775964400" class="d-none d-md-inline">+88 01775 964400</a>
            </div>

            <!-- Email -->
            <div class="d-flex align-items-center">
                <i class="fas fa-envelope me-2"></i>
                <a href="mailto:info@meengineers.com">info@meengineers.com</a>
            </div>

        </div>

    </div>
</div>

<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- Logo (LEFT) -->
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/frontend/img/logo.png') }}" class="img-fluid py-2" alt="M&E Engineers">
        </a>

        <!-- RIGHT SIDE (Mobile only) -->
        <div class="d-flex align-items-center ms-auto d-lg-none gap-3">

            <!-- Social Icons -->
            <div class="socializer sr-32px sr-icon-grey sr-bg-none">
                <span class="sr-linkedin">
                    <a href="https://www.linkedin.com/company/top-engineer/" target="_blank">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </span>
                <span class="sr-whatsapp">
                    <a href="https://wa.me/message/NJAV34FHKK47G1" target="_blank">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </span>
                <span class="sr-telegram">
                    <a href="https://t.me/TopEngineerChat" target="_blank">
                        <i class="bi bi-telegram"></i>
                    </a>
                </span>
                
                <span class="sr-facebook">
                    <a href="https://t.me/TopEngineerChat" target="_blank">
                        <i class="bi bi-facebook"></i>
                    </a>
                </span>
            </div>

            <!-- Nav Toggle -->
            <i class="mobile-nav-toggle bi bi-list"></i>
            

        </div>

        <!-- Desktop Navigation -->
        <nav id="navbar" class="navbar">
            <ul>
                <li class="nav-close d-lg-none px-4">
                    <i class="bi bi-x"></i>
                </li>
                <li><a href="{{route('home')}}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">HOME</a>
                </li>
                <li><a href="{{route('steel_detailing')}}" class="nav-link {{ request()->routeIs('steel_detailing') ? 'active' : '' }}">STEEL DETAILING</a></li>
                <li><a href="#" class="nav-link">REBAR DETAILING</a></li>
                <li><a href="{{route('consulting')}}" class="nav-link {{ request()->routeIs('consulting') ? 'active' : '' }}">CONSULTING</a></li>
                <li><a href="{{route('our_project')}}" class="nav-link {{ request()->routeIs('our_project') ? 'active' : '' }}">PROJECTS</a></li>
                <li><a href="{{route('contact')}}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">CONTACT</a></li>
            </ul>
        </nav>

    </div>
</header>