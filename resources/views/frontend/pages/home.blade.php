@extends('layouts.website')
@section('title', 'M&E Engineers - Design & Detailing')

@section('website_content')

<!-- begin::Hero Section -->
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <!-- begin::Hero Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">Steel Detailing Services</h2>
                <p class="animate__animated animate__fadeInUp text-justify">
                    M&E Engineers, we provide comprehensive structural steel detailing solutions for fabricators, contractors, designers, and structural engineers. Backed by strong technical expertise and advanced detailing workflows, we can efficiently handle projects of up to 3,000 tons per month with a high level of accuracy. 

                    <br>
                    <br>

                    With 20+ years of industry experience, our team delivers precise shop and erection drawings in full compliance with AISC, ANSI, OSHA, and RSIO standards, ensuring constructability, safety, and smooth fabrication and erection processes.
                </p>
                
            </div>
        </div>
        <!-- end::Hero Slide 1 -->

        <!-- begin::Hero Slide 2 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">Structural Design Services</h2>
                <p class="animate__animated animate__fadeInUp text-justify">
                    Our experienced structural engineers deliver safe, stable, and efficient steel structure designs through optimized and cost-effective engineering solutions. We focus on code-compliant analysis and practical design approaches that enhance constructability, reduce material usage, and ensure long-term structural performance.
                </p>
            </div>
        </div>
        <!-- end::Hero Slide 2 -->

        <!-- begin::Hero Slide 3 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">BIM Modeling Services</h2>
                <p class="animate__animated animate__fadeInUp text-justify">
                    We provide end-to-end BIM modeling services by integrating Tekla Structures and Autodesk Revit to deliver fully coordinated models from LOD 100 to LOD 450. Our BIM workflow ensures accurate design representation, seamless interdisciplinary coordination, and efficient information exchange throughout the project lifecycle.
                    <br>
                    <br>
                    By identifying clashes early and aligning design with fabrication and construction requirements, we help minimize rework, reduce project risks, and improve overall project efficiency—from concept development to construction and as-built documentation.
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
                <div class="">
                    <div class="about-image-block img-thumbnail">
                        <a href="{{ asset('assets/frontend/img/about_us.webp') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/about_us.webp') }}"
                                    loading="lazy"
                                    class="img-fluid p-4"
                                    alt="About Us">
                            </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="">
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
                <div class=" d-lg-none d-xl-block">
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
                <div class="why-choose-image-block img-thumbnail ">
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
                <div class="steel-design-image-block img-thumbnail">
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
                <div class="">
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

<!-- begin::Steel Design Services Section -->
<section id="steel-design-services" class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6" data-aos="fade-right">
                <div class="">
                    <h3><strong>BIM Modeling</strong></h3>
                    <p>
                        M&E Engineers delivers accurate BIM modeling services that enhance coordination, visualization, and project efficiency. BIM brings all building information into a single intelligent model, helping reduce errors, save time, and control construction costs.
                    </p>
                    <p>
                        Our BIM models support the full project lifecycle—from design and construction to coordination and future facility use—covering both above-ground and below-ground elements at true scale. This ensures clear communication, effective clash detection, and smooth project execution
                    </p>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="bim-image-block img-thumbnail">
                    <a href="{{ asset('assets/frontend/img/BRIDGE.png') }}"
                       data-gallery="serviceGallery"
                       class="lightbox-image preview-link">
                        <img src="{{ asset('assets/frontend/img/BRIDGE.png') }}"
                             loading="lazy"
                             class="img-fluid p-4"
                             alt="Erection Drawing Service">
                    </a>
                </div>
                
            </div>

        </div>
    </div>
</section>
<!-- end::Steel Design Services Section -->

<!-- begin::Structural Analysis and Design Section -->
<section id="structural-analysis-design" class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- LEFT: 4 Images Grid -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="row g-3">

                    <div class="col-6">
                        <div class="stucture-analysis-block img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/structural_analysis/01.png') }}"
                               data-gallery="serviceGallery"
                               class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/structural_analysis/01.png') }}"
                                     loading="lazy"
                                     class="img-fluid"
                                     alt="Structural Analysis Image 1">
                            </a>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="stucture-analysis-block img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/structural_analysis/02.png') }}"
                               data-gallery="serviceGallery"
                               class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/structural_analysis/02.png') }}"
                                     loading="lazy"
                                     class="img-fluid"
                                     alt="Structural Analysis Image 2">
                            </a>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="stucture-analysis-block img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/structural_analysis/03.png') }}"
                               data-gallery="serviceGallery"
                               class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/structural_analysis/03.png') }}"
                                     loading="lazy"
                                     class="img-fluid"
                                     alt="Structural Analysis Image 3">
                            </a>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="stucture-analysis-block img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/structural_analysis/04.png') }}"
                               data-gallery="serviceGallery"
                               class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/structural_analysis/04.png') }}"
                                     loading="lazy"
                                     class="img-fluid"
                                     alt="Structural Analysis Image 4">
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- RIGHT: CONTENT -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="">
                    <h3><strong>STRUCTURAL ANALYSIS & DESIGN</strong></h3>
                    <p>
                        M&E Engineers offers professional structural analysis and design services for commercial, residential,
                        industrial, hospitality, and institutional projects. Our designs are developed to ensure structural
                        safety, full code compliance, and cost efficiency.
                    </p>
                    <p>
                        Our services include concept design, detailed structural analysis, design calculations, construction
                        documentation, and engineering support throughout the construction phase. We handle projects ranging
                        from minor structural modifications to complex, large-scale, and high-rise buildings using advanced
                        analysis tools and proven engineering practices.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::Structural Analysis and Design Section -->


<!-- begin::Connection Design Section -->
<section id="connection-design" class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- LEFT: CONTENT -->
            <div class="col-lg-6" data-aos="fade-right">
                <div>
                    <h3><strong>CONNECTION DESIGN</strong></h3>
                    <p>
                        M&E Engineers delivers efficient and reliable steel connection design services to ensure safe,
                        economical, and buildable structures. Our connection calculations are optimized to reduce material
                        usage while fully complying with international design standards.
                    </p>
                    <p>
                        We provide clear and detailed connection calculation reports based on actual project loads. When
                        load data is not available, our experienced engineers develop appropriate design loads to move the
                        project forward with confidence.
                    </p>
                    <p>
                        Using IDEA StatiCa, we design and verify steel and reinforced concrete connections, including frames,
                        trusses, base plates, anchor bolts, and complex joint details. Each project is priced individually
                        based on scope and complexity.
                    </p>
                </div>
            </div>

            <!-- RIGHT: 8 Images Grid -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="row g-3">

                    <!-- Image 1 -->
                    <div class="col-2">
                        <div class="single-image-block-connection img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/connection_design/01.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/connection_design/01.png') }}"
                                    loading="lazy"
                                    class="img-fluid"
                                    alt="Connection Design Image 1">
                            </a>
                        </div>
                    </div>

                    <!-- Image 2 -->
                    <div class="col-2">
                        <div class="single-image-block-connection img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/connection_design/02.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/connection_design/02.png') }}"
                                    loading="lazy"
                                    class="img-fluid"
                                    alt="Connection Design Image 2">
                            </a>
                        </div>
                    </div>

                    <!-- Image 3 -->
                    <div class="col-2">
                        <div class="single-image-block-connection img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/connection_design/03.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/connection_design/03.png') }}"
                                    loading="lazy"
                                    class="img-fluid"
                                    alt="Connection Design Image 3">
                            </a>
                        </div>
                    </div>

                    <!-- Image 4 -->
                    <div class="col-2">
                        <div class="single-image-block-connection img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/connection_design/04.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/connection_design/04.png') }}"
                                    loading="lazy"
                                    class="img-fluid"
                                    alt="Connection Design Image 4">
                            </a>
                        </div>
                    </div>

                    <!-- Image 5 -->
                    <div class="col-2">
                        <div class="single-image-block-connection img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/connection_design/05.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/connection_design/05.png') }}"
                                    loading="lazy"
                                    class="img-fluid"
                                    alt="Connection Design Image 5">
                            </a>
                        </div>
                    </div>

                    <!-- Image 6 -->
                    <div class="col-2">
                        <div class="single-image-block-connection img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/connection_design/06.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/connection_design/06.png') }}"
                                    loading="lazy"
                                    class="img-fluid"
                                    alt="Connection Design Image 6">
                            </a>
                        </div>
                    </div>

                    <!-- Image 7 -->
                    <div class="col-2">
                        <div class="single-image-block-connection img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/connection_design/07.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/connection_design/07.png') }}"
                                    loading="lazy"
                                    class="img-fluid"
                                    alt="Connection Design Image 7">
                            </a>
                        </div>
                    </div>

                    <!-- Image 8 -->
                    <div class="col-2">
                        <div class="single-image-block-connection img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/connection_design/08.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/connection_design/08.png') }}"
                                    loading="lazy"
                                    class="img-fluid"
                                    alt="Connection Design Image 8">
                            </a>
                        </div>
                    </div>

                    <!-- Image 9 -->
                    <div class="col-2">
                        <div class="single-image-block-connection img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/connection_design/09.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/connection_design/09.png') }}"
                                    loading="lazy"
                                    class="img-fluid"
                                    alt="Connection Design Image 9">
                            </a>
                        </div>
                    </div>

                    <!-- Image 10 -->
                    <div class="col-2">
                        <div class="single-image-block-connection img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/connection_design/10.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/connection_design/10.png') }}"
                                    loading="lazy"
                                    class="img-fluid"
                                    alt="Connection Design Image 10">
                            </a>
                        </div>
                    </div>

                    <!-- Image 11 -->
                    <div class="col-2">
                        <div class="single-image-block-connection img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/connection_design/11.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/connection_design/11.png') }}"
                                    loading="lazy"
                                    class="img-fluid"
                                    alt="Connection Design Image 11">
                            </a>
                        </div>
                    </div>

                    <!-- Image 12 -->
                    <div class="col-2">
                        <div class="single-image-block-connection img-thumbnail">
                            <a href="{{ asset('assets/frontend/img/connection_design/12.png') }}"
                            data-gallery="serviceGallery"
                            class="lightbox-image preview-link">
                                <img src="{{ asset('assets/frontend/img/connection_design/12.png') }}"
                                    loading="lazy"
                                    class="img-fluid"
                                    alt="Connection Design Image 12">
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::Connection Design Section -->



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