<div id="topbar" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">

        <!-- Contact Info -->
        <div class="contact-info d-flex align-items-center flex-wrap gap-3">

            <!-- Address -->
            <div class="d-flex align-items-center">
                <i class="fas fa-map-marker-alt me-2 d-none d-lg-inline"></i>
                <span class="d-none d-lg-inline">Kosovska 17, Beograd-stari grad, Serbia</span>
            </div>

            <!-- Phone -->
            <div class="d-flex align-items-center">
                <i class="fas fa-phone-alt me-2 d-none d-md-inline"></i>
                <a href="tel:+381114220621" class="d-none d-md-inline">+3 811 142 20 62 1</a>
            </div>

            <!-- Email -->
            <div class="d-flex align-items-center">
                <i class="fas fa-envelope me-2"></i>
                <a href="mailto:info@top-engineer.com">info@top-engineer.com</a>
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
            </div>

            <!-- Mobile Nav Toggle -->
            <i class="bi bi-list mobile-nav-toggle"></i>

        </div>

        <!-- Desktop Navigation -->
        <nav id="navbar" class="navbar d-none d-lg-flex">
            <ul>
                <li><a href="{{route('home')}}" class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}">HOME</a>
                </li>
                <li><a href="{{route('steel_detailing')}}" class="nav-link">STEEL DETAILING</a></li>
                <li><a href="{{route('rebar_detailing')}}" class="nav-link">REBAR DETAILING</a></li>
                <li><a href="{{route('consulting')}}" class="nav-link">CONSULTING</a></li>
                <li><a href="{{route('our_project')}}" class="nav-link">PROJECTS</a></li>
                <li><a href="{{route('contact')}}" class="nav-link">CONTACT</a></li>
            </ul>
        </nav>

    </div>
</header>