@extends('layouts.website')
@section('title', 'M&E Engineers - Design & Detailing')

@section('website_content')

<section class="cta-section">
	<div class="container">
		<div class="row aos-init aos-animate" data-aos="zoom-in">
		</div>
	</div>
</section>

<!-- begin::Portfolio Section -->
<section id="portfolio" class="content mt-3 d-none d-lg-block">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-5th col-md-6 portfolio-item">
                <a href="{{ asset('assets/frontend/img/steel_detailing/06.png') }}" data-gallery="portfolioGallery"
                   class="portfolio-lightbox preview-link">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/06.png') }}"
                         loading="lazy" class="img-fluid"
                         alt="Structures detailing in BIM Tekla Structures">
                </a>
            </div>

            <div class="col-lg-5th col-md-6 portfolio-item">
                <a href="{{ asset('assets/frontend/img/steel_detailing/07.png') }}" data-gallery="portfolioGallery"
                   class="portfolio-lightbox preview-link">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/07.png') }}"
                         loading="lazy" class="img-fluid"
                         alt="Structures detailing in BIM Tekla Structures">
                </a>
            </div>

            <div class="col-lg-5th col-md-6 portfolio-item">
                <a href="{{ asset('assets/frontend/img/steel_detailing/08.png') }}" data-gallery="portfolioGallery"
                   class="portfolio-lightbox preview-link">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/08.png') }}"
                         loading="lazy" class="img-fluid"
                         alt="Structures detailing in BIM Tekla Structures">
                </a>
            </div>

            <div class="col-lg-5th col-md-6 portfolio-item">
                <a href="{{ asset('assets/frontend/img/steel_detailing/09.png') }}" data-gallery="portfolioGallery"
                   class="portfolio-lightbox preview-link">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/09.png') }}"
                         loading="lazy" class="img-fluid"
                         alt="Structures detailing in BIM Tekla Structures">
                </a>
            </div>

            <div class="col-lg-5th col-md-6 portfolio-item">
                <a href="{{ asset('assets/frontend/img/steel_detailing/10.png') }}" data-gallery="portfolioGallery"
                   class="portfolio-lightbox preview-link">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/10.png') }}"
                         loading="lazy" class="img-fluid"
                         alt="Structures detailing in BIM Tekla Structures">
                </a>
            </div>

        </div>
    </div>
</section>
<!-- end::Portfolio Section -->


<!-- begin::Steel Detailing Services Section -->
<section id="steel-detailing-services" class="content pt-5-mobile">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-right">
                
                <div class="page-detailing-design-image-block border">
                    <a href="{{ asset('assets/frontend/img/steel_detailing/01.png') }}"
                        data-gallery="serviceGallery" class="lightbox-image preview-link">
                        <img src="{{ asset('assets/frontend/img/steel_detailing/01.png') }}" loading="lazy"
                            class="img-fluid" alt="Erection Drawing Service">
                    </a>
                </div>
            </div>

            <!-- CONTENT -->
            <div class="col-lg-6 order-2 order-lg-2 pt-5-mobile" data-aos="fade-left">
                <div>
                    <h3><strong>STEEL DETAILING SERVICES</strong></h3>
                    <p>
                        M&E Engineers provides comprehensive steel detailing services for fabricators, contractors, designers, and structural engineers.
                        Our detailing solutions are developed to support accurate fabrication, efficient erection, and smooth project execution.
                    </p>
                    <p>
                        With a team of experienced detailers and engineers, we have the capability to handle projects of varying sizes and complexity.
                        Our drawings and models are prepared with strict adherence to international steel detailing standards, including AISC, ANSI, OSHA,
                        and RSIO, ensuring accuracy, safety, and constructability.
                    </p>
                    <p>
                        Using advanced detailing software and proven workflows, M&E Engineers delivers high-quality shop drawings, erection drawings,
                        and material take-offs that meet project requirements and timelines.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::Steel Detailing Services Section -->


<!-- begin::Advanced Technology Section -->
<section id="advanced-technology" class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- CONTENT -->
            <div class="col-lg-6 order-2 order-lg-1 pt-5-mobile" data-aos="fade-left">
                <div>
                    <h3><strong>ADVANCED TECHNOLOGY IN STRUCTURAL STEEL DETAILING</strong></h3>
                    <p>
                        M&E Engineers leverages the latest software and technology to produce highly accurate structural steel drawings,
                        shop drawings, miscellaneous steel details, and framing plans.
                    </p>
                    <p>
                        We can deliver files in multiple formats to suit fabrication, construction, and coordination needs. By combining
                        cutting-edge tools, regular software updates, and flexible file handling, M&E Engineers ensures precision, efficiency,
                        and seamless collaboration across every project.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-right">
                
                <div class="page-advanced-technology-image-block border">
                    <a href="{{ asset('assets/frontend/img/steel_detailing/02.png') }}"
                        data-gallery="serviceGallery" class="lightbox-image preview-link">
                        <img src="{{ asset('assets/frontend/img/steel_detailing/02.png') }}" loading="lazy"
                            class="img-fluid" alt="Erection Drawing Service">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end::Advanced Technology Section -->


<!-- begin::Steel Detailing Team Section -->
<section id="steel-detailing-team" class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- IMAGE (first on mobile) -->
            <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-right">
                
                <div class="page-steel-detailing-team-image-block border">
                    <a href="{{ asset('assets/frontend/img/steel_detailing/03.png') }}"
                        data-gallery="serviceGallery" class="lightbox-image preview-link">
                        <img src="{{ asset('assets/frontend/img/steel_detailing/03.png') }}" loading="lazy"
                            class="img-fluid" alt="Erection Drawing Service">
                    </a>
                </div>
            </div>

            <!-- CONTENT -->
            <div class="col-lg-6 order-2 order-lg-2 pt-5-mobile" data-aos="fade-left">
                <div>
                    <h3><strong>OUR STEEL DETAILING TEAM</strong></h3>
                    <p>
                        M&E Engineers, our strength lies in our skilled and experienced steel detailing team. Our professional detailers deliver accurate,
                        comprehensive, and high-quality structural detailing services on time, every time.
                    </p>
                    <p>
                        We believe that exceptional service starts with exceptional people. That’s why we hire only highly qualified, competent,
                        and experienced professionals, and continuously invest in their training and development.
                    </p>
                    <p>
                        With deep expertise in 3D modeling and advanced detailing software, our team ensures precision, efficiency, and solutions that
                        consistently exceed client expectations.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::Steel Detailing Team Section -->


<!-- begin::Quality Policy Section -->
<section id="quality-policy" class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- CONTENT -->
            <div class="col-lg-6 order-2 order-lg-1 pt-5-mobile" data-aos="fade-left">
                <div>
                    <h3><strong>QUALITY POLICY</strong></h3>
                    <p>
                        M&E Engineers, our goal is to be a leading provider of steel detailing services by consistently delivering the highest quality work.
                        We believe that quality begins with our people, which is why we hire only competent and experienced professionals.
                    </p>
                    <p>
                        To ensure excellence, we implement a robust quality control system aligned with international standards, including NISD, QPP, and AISC.
                        Our system guarantees accuracy, compliance, and adherence to best detailing practices, ensuring reliable and precise results for every project.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-right">
                
                <div class="page-quality-policy-image-block border">
                    <a href="{{ asset('assets/frontend/img/steel_detailing/04.png') }}"
                        data-gallery="serviceGallery" class="lightbox-image preview-link">
                        <img src="{{ asset('assets/frontend/img/steel_detailing/04.png') }}" loading="lazy"
                            class="img-fluid" alt="Erection Drawing Service">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end::Quality Policy Section -->


<!-- begin::Why Choose Us Section -->
<section id="why-choose-us" class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- IMAGE (first on mobile) -->
            <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-right">
                
                <div class="page-why-choose-us-image-block border">
                    <a href="{{ asset('assets/frontend/img/steel-detailing-me-engineers.webp') }}"
                        data-gallery="serviceGallery" class="lightbox-image preview-link">
                        <img src="{{ asset('assets/frontend/img/steel-detailing-me-engineers.webp') }}" loading="lazy"
                            class="img-fluid" alt="Erection Drawing Service">
                    </a>
                </div>
            </div>

            <!-- CONTENT -->
            <div class="col-lg-6 order-2 order-lg-2 pt-5-mobile" data-aos="fade-left">
                <div>
                    <h3><strong>WHY CHOOSE M&E ENGINEERS AS YOUR STRUCTURAL STEEL DETAILER?</strong></h3>
                    <p>
                        M&E Engineers, we are committed to delivering clean, accurate, and reliable steel detailing services that support your project’s success.
                        Our team of highly skilled and experienced detailers works diligently to meet client requirements, offering competitive rates without compromising quality.
                    </p>
                    <p>
                        We go beyond just providing drawings—we aim to be a trusted business partner, collaborating closely with engineers, fabricators, and contractors.
                        Our structural steel shop drawings are produced in metric or imperial units, fully compliant with AISC, CISC, and industry-standard detailing practices.
                    </p>
                    <p>
                        When you need a professional steel detailer who gets it right the first time, M&E Engineers is your trusted choice.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::Why Choose Us Section -->


<!--begin::CTA-->
@include('frontend.include.cta-project-contact')
<!--end::CTA-->
@endsection