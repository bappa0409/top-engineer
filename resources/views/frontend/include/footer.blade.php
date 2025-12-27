
<footer id="footer" class="bg-dark text-white pt-4">
    <!-- Google Map -->
    <div class="w-100 mb-4">
        <iframe 
            loading="lazy" 
            width="100%" 
            height="400" 
            frameborder="0" 
            scrolling="no" 
            marginheight="0" 
            marginwidth="0"
            src="https://maps.google.com/maps?width=520&amp;height=200&amp;hl=en&amp;q=Kosovska%2017,%20Beograd-stari%20grad,%20Serbia%20Serbia+(top-engineer.com)&amp;t=k&amp;z=19&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
        </iframe>
    </div>

    <!-- Footer content -->
    <div class="container">
        <div class="row align-items-center">
            <!-- Policy -->
            <div class="col-md-6 mb-3 mb-md-0">
                <a href="https://top-engineer.com/upload/Poslovnik.pdf" class="text-white text-decoration-none">
                    Politika poslovanja
                </a>
            </div>

            <!-- Social Icons -->
            <div class="col-md-6 text-md-end">
                <a href="https://wa.me/message/NJAV34FHKK47G1" target="_blank" class="text-white me-3 fs-4">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://t.me/TopEngineerChat" target="_blank" class="text-white me-3 fs-4">
                    <i class="fab fa-telegram"></i>
                </a>
                <a href="https://www.linkedin.com/company/top-engineer/" target="_blank" class="text-white fs-4">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>

        <div class="text-center mt-3 small">
            &copy; {{ date('Y') }} Top Engineer. All rights reserved.
        </div>
    </div>

    <!-- Optional: add hover effect in style -->
    <style>
        #footer a.text-white:hover {
            color: #0d6efd; /* Bootstrap primary color */
        }
    </style>
</footer>
