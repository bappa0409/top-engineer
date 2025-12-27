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
    <div class="container d-flex align-items-center">
        <a href="{{route('home')}}" class="logo">
            <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="Topengineer logo" class="">
        </a>

        <div class="d-xs-block d-lg-none socializer a sr-48px sr-squircle sr-float sr-icon-grey sr-bg-none">
            <span class="sr-linkedin"> 
                <a href="https://www.linkedin.com/company/top-engineer/" target="_blank" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
            </span>
            <span class="sr-whatsapp"> 
                <a href="https://wa.me/message/NJAV34FHKK47G1" target="_blank" title="WhatsApp"><i class="bi bi-whatsapp"></i>
                </a>
            </span>
            <span class="sr-telegram"> 
                <a href="https://telegram.me/TopEngineerChat" target="_blank" title="Telegram"><i class="bi bi-telegram"></i>
                </a>
            </span>
            <span class="sr-skype"> 
                <a href="skype:perezhog" target="_blank" title="Skype"><i class="bi bi-skype"></i>
                </a>
            </span>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="/" class="nav-link scrollto active">HOME </a></li>
                <li><a href="/steel-detailing/" class="nav-link scrollto">STEEL DETALING</a></li>
                <li><a href="/rebar-detailing/" class="nav-link scrollto">REBAR DETALING</a></li>
                <li><a href="https://top-engineer.com/#bim-modeling/" class="nav-link scrollto">BIM MODELING</a></li>
                <li><a href="/consulting/" class="nav-link scrollto">CONSULTING</a></li>
                <li><a href="/portfolio/" class="nav-link scrollto">OUR PROJECTS</a></li>
                <li><a href="/#contact/" class="nav-link scrollto">CONTACT US</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
