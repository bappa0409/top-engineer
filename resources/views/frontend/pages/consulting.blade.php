@extends('layouts.website')
@section('title', 'M&E Engineers - Design & Detailing')

@section('website_content')

<section class="cta-section">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="zoom-in">
        </div>
    </div>
</section>


<!-- begin::What We Offer Section -->
<section id="what-we-offer" class="content pt-5 pt-5-mobile">
    <div class="container-fluid">
        <div class="row">

            <!-- IMAGE (first on mobile) -->
            <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-right">
                
                <div class="page-what-we-offer-image-block border">
                    <a href="{{ asset('assets/frontend/img/consulting/01.png') }}"
                        data-gallery="serviceGallery" class="lightbox-image preview-link">
                        <img src="{{ asset('assets/frontend/img/consulting/01.png') }}" loading="lazy"
                            class="img-fluid" alt="Erection Drawing Service">
                    </a>
                </div>
            </div>

            <!-- CONTENT -->
            <div class="col-lg-6 order-2 order-lg-2 pt-5-mobile" data-aos="fade-left">
                <div>
                    <h3> <strong>What We Offer</strong></h3>
                    <p>Structural Steel Design Consultancy
                        Optimized design solutions that balance safety, economy, and constructability.Connection Design
                        & Verification.Expert guidance on steel connections, ensuring compliance with AISC, BS,
                        Eurocode, and other global standards.Value Engineering
                        Identifying opportunities to reduce costs while maintaining strength and
                        performance.Constructability Review
                        Early-stage consultancy to detect potential design conflicts and ensure smooth fabrication &
                        erection.
                        Software-Based Solutions Advanced modeling and analysis using Tekla Structures, AutoCAD, and
                        STAAD Pro for accurate, efficient outcomes.
                        Project Coordination Support
                        Helping bridge the gap between architects, engineers, and fabricators for seamless project
                        execution.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::Steel Detailing Team Section -->


<!-- begin::Why Partner Section -->
<section id="why-partner" class="content pt-5 pt-5-mobile">
    <div class="container-fluid">
        <div class="row">

            <!-- IMAGE (first on mobile) -->
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-right">
                
                <div class="page-why-partner-image-block border">
                    <a href="{{ asset('assets/frontend/img/consulting/02.png') }}"
                        data-gallery="serviceGallery" class="lightbox-image preview-link">
                        <img src="{{ asset('assets/frontend/img/consulting/02.png') }}" loading="lazy"
                            class="img-fluid" alt="Erection Drawing Service">
                    </a>
                </div>
            </div>

            <!-- CONTENT -->
            <div class="col-lg-6 order-2 order-lg-1 pt-5-mobile" data-aos="fade-left">
                <div>
                    <h3> <strong>Why Partner With Us?</strong></h3>
                    <p>Expert Knowledge: Deep technical expertise in steel structures across diverse sectors—bridges,
                        power plants, industrial facilities, and metro rail projects.
                        Customized Solutions: Tailored consulting to meet your project’s specific requirements.
                        Problem-Solving Approach: Focus on minimizing risks, reducing rework, and improving project
                        timelines.
                        Trusted Experience: Over 17 years of proven success in steel structure consultancy.
                        Whether you are in the planning, design, or construction stage, M&E Engineers provides expert
                        consultancy that ensures your projects are efficient, safe, and built to last.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::Why Partner Section -->

<!--begin::CTA-->
@include('frontend.include.cta-project-contact')
<!--end::CTA-->
@endsection