@extends('layouts.website')
@section('title', 'Top-engineer.com | STEEL DETAILING | REBAR DETAILING')

@section('website_content')

<!-- begin::Hero Section -->
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <!-- begin::Hero Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">STEEL DETAILING</h2>
                <p class="animate__animated animate__fadeInUp">
                    At M&amp;E Engineers, we deliver comprehensive steel detailing solutions to fabricators, contractors, designers, and structural engineers.
                    With strong technical expertise, we can handle up to <strong>3,000 tons/month</strong> with high accuracy.
                    With 15+ years of experience, we follow AISC, ANSI, OSHA, and RSIO standards.
                </p>
            </div>
        </div>
        <!-- end::Hero Slide 1 -->

        <!-- begin::Hero Slide 2 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">STRUCTURAL DESIGN</h2>
                <p class="animate__animated animate__fadeInUp">
                    Our experienced structural engineers ensure safety, stability, and efficiency in every steel structure—through optimized, cost-effective design solutions.
                </p>
            </div>
        </div>
        <!-- end::Hero Slide 2 -->

        <!-- begin::Hero Slide 3 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">BIM MODELING</h2>
                <p class="animate__animated animate__fadeInUp">
                    We integrate Tekla Structures and Autodesk Revit to deliver coordinated BIM models from <strong>LOD 100–450</strong>, ensuring smooth communication and reducing rework across all project phases.
                </p>
            </div>
        </div>
        <!-- end::Hero Slide 3 -->

        <!-- begin::Hero Carousel Controls -->
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon">
                <i class="fas fa-chevron-left"></i>
            </span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon">
                <i class="fas fa-chevron-right"></i>
            </span>
        </a>
        <!-- end::Hero Carousel Controls -->

    </div>
</section>
<!-- end::Hero Section -->


<!-- begin::Service Highlights Section -->
<section id="service-highlights" class="icon-boxes">
    <div class="container">
        <div class="row">

            <!-- begin::Highlight Item - Cost Analysis -->
            <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch mb-5" data-aos="fade-up">
                <div class="icon-box">
                    <div class="icon"><i class="fa-solid fa-gear"></i></div>
                    <h4 class="title"><a href="#">Cost Analysis</a></h4>
                    <p class="description">
                        M&E Engineer's offer detailed cost analysis to optimize your project budget, providing accurate estimates, material breakdowns, and value engineering to ensure efficient and economical steel structure solutions.
                    </p>
                </div>
            </div>
            <!-- end::Highlight Item - Cost Analysis -->

            <!-- begin::Highlight Item - Structural Detailing -->
            <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-file-alt"></i></div>
                    <h4 class="title"><a href="#">Structural Detailing</a></h4>
                    <p class="description">
                        We deliver precise structural detailing services, including fabrication drawings and connection details to ensure smooth execution and accurate assembly of steel structures.
                    </p>
                </div>
            </div>
            <!-- end::Highlight Item - Structural Detailing -->

            <!-- begin::Highlight Item - Project Management -->
            <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-project-diagram"></i></div>
                    <h4 class="title"><a href="#">Project Management</a></h4>
                    <p class="description">
                        We provide end-to-end project management services, ensuring timely execution, quality control, and seamless coordination across all phases of your steel structure project.
                    </p>
                </div>
            </div>
            <!-- end::Highlight Item - Project Management -->

            <!-- begin::Highlight Item - Structural Analysis -->
            <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-layer-group"></i></div>
                    <h4 class="title"><a href="#">Structural Analysis</a></h4>
                    <p class="description">
                        M&E Engineers provide accurate and efficient analysis of steel structures to ensure safety, stability, and cost-effective design solutions.
                    </p>
                </div>
            </div>
            <!-- end::Highlight Item - Structural Analysis -->

        </div>
    </div>
</section>
<!-- end::Service Highlights Section -->


<!-- begin::About Section -->
<section id="about" class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <div class="single-image-block img-thumbnail">
                        <a href="{{ asset('assets/frontend/img/about_us.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/about_us.png') }}"
                                    loading="lazy"
                                    class="img-fluid p-4"
                                    alt="About Us">
                            </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content">
                    <h3><strong>ABOUT US</strong></h3>

                    <h4 class="py-3">Trusted Partner for Steel Design &amp; Detailing</h4>
                    <p>
                        At M&amp;E Engineers, we believe in turning engineering challenges into opportunities for innovation. Founded by experienced professionals with over 20 years of expertise, we have grown into a trusted consultancy specializing in steel structure design and detailing services, supporting clients across Bangladesh and internationally.
                    </p>
                    <p>
                        Our mission is straightforward: to deliver safe, precise, and efficient engineering solutions that help bring your vision to life. We work closely with architects, developers, contractors, and fabricators to ensure that each structure is optimized for strength, constructability, and cost-effectiveness.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::About Section -->


<!-- begin::Why Choose Us Section -->
<section id="why-choose-us" class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content d-lg-none d-xl-block">
                    <h3><strong>Why Choose M&amp;E Engineers?</strong></h3>
                    <ul class="highlights pt-3">
                        <li>✅ <strong>Experienced Team</strong> — Our highly skilled engineers and detailers bring practical construction experience and deep technical expertise.</li>
                        <li>✅ <strong>Advanced Technology</strong> — We use industry-leading software to ensure accuracy, reduce errors, and improve project efficiency.</li>
                        <li>✅ <strong>Client-Focused Approach</strong> — We understand that every project is unique. We listen to your needs and tailor our solutions accordingly.</li>
                        <li>✅ <strong>Commitment to Quality</strong> — We strictly follow international and local standards (AISC, BS, Eurocode, BNBC) to ensure safe and reliable results.</li>
                        <li>✅ <strong>On-Time Delivery</strong> — We value your time and always strive to meet or exceed project deadlines.</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-right">
                <div class="single-image-block img-thumbnail ">
                    <a href="{{ asset('assets/frontend/img/steel_detailing/main.png') }}"
                       data-gallery="serviceGallery"
                       class="lightbox-image preview-link">
                        <img src="{{ asset('assets/frontend/img/steel_detailing/main.png') }}"
                             loading="lazy"
                             class="img-fluid p-4"
                             alt="Steel Detailing">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end::Why Choose Us Section -->


<!-- begin::Steel Design Services Section -->
<section id="steel-design-services" class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6" data-aos="fade-right">
                <div class="single-image-block img-thumbnail">
                    <a href="{{ asset('assets/frontend/img/erection-drawing-service-scaled-min.png') }}"
                       data-gallery="serviceGallery"
                       class="lightbox-image preview-link">
                        <img src="{{ asset('assets/frontend/img/erection-drawing-service-scaled-min.png') }}"
                             loading="lazy"
                             class="img-fluid p-4"
                             alt="Erection Drawing Service">
                    </a>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content">
                    <h3><strong>Steel Design Services</strong></h3>
                    <h4 class="py-3">Engineering Excellence for Stronger, Smarter Structures</h4>

                    <p>
                        At <strong>M&amp;E Engineers</strong>, we provide expert steel design services that bring ambitious architectural
                        ideas to life. Our team combines deep technical knowledge with practical construction experience, designing
                        solutions in full compliance with international standards and the <strong>BNBC</strong> code. This approach
                        delivers safe, efficient, and cost-effective solutions.
                    </p>

                    <h4>Our Design Services Include:</h4>

                    <ul class="highlights pt-3">
                        <li>✅ Structural analysis and stability design</li>
                        <li>✅ Member sizing and optimization</li>
                        <li>✅ Connection design and joint detailing</li>
                        <li>✅ Seismic and wind load analysis</li>
                        <li>✅ Value engineering and cost optimization</li>
                        <li>✅ Design documentation and calculation report</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::Steel Design Services Section -->


<!-- begin::Portfolio Section -->
<section id="portfolio" class="content mt-5">
    <div class="container-fluid">

        <div class="section-title text-center mb-5">
            <h2 class="mb-1 text-uppercase">Our Projects</h2>
            <p>Successfully Completed Projects</p>
        </div>
        
        <div class="row">
            @forelse($projects as $project)
                <div class="col-lg-3 col-md-6 project-item mb-4">
                <div class="project-image-block img-thumbnail">
                    <a href="{{ asset($project->image) }}"
                    data-gallery="projectGallery"
                    class="lightbox-image preview-link">

                    <img src="{{ asset($project->image) }}"
                        loading="lazy"
                        class="img-fluid"
                        alt="{{ $project->title }}">
                    </a>
                </div>
                </div>
            @empty
                <p class="text-center">No projects available at the moment.</p>
            @endforelse
        </div>

    </div>
</section>
<!-- end::Portfolio Section -->


<!-- begin::CTA Section -->
@include('frontend.include.cta-project-contact')
<!-- end::CTA Section -->

@endsection



{{-- <!-- Google Tag Manager -->
<script async src="https://www.googletagmanager.com/gtm.js?id=GTM-MTDDBMB"></script>

<!-- Bitrix24 Form Loader -->
<script async src="https://cdn-ru.bitrix24.ru/b1519387/crm/form/loader_91.js"></script>

<script>
    (function(w,d,u){
    var s=d.createElement('script');
    s.async=true;
    s.src=u+'?'+(Date.now()/180000|0);
    var h=d.getElementsByTagName('script')[0];
    h.parentNode.insertBefore(s,h);
})(window,document,'https://cdn-ru.bitrix24.ru/b1519387/crm/form/loader_91.js');
</script> --}}