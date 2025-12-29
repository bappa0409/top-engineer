@extends('layouts.website')
@section('title', 'Top-engineer.com | STEEL DETAILING | REBAR DETAILING')

@section('website_content')

<section class="cta-section">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="zoom-in">
        </div>
    </div>
</section>


<!-- begin::Steel Detailing Section -->
<section id="steel-detailing" class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content d-lg-none d-xl-block">
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
            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/consulting/01.png') }}" class="img-fluid"
                        alt="Steel Detailing">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end::Steel Detailing Section -->

<!-- begin::Rebar Detailing Section -->
<section id="rebar-detailing" class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6 mt-4" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/consulting/02.png') }}" class="img-fluid"
                        alt="STRUCTURAL STEEL DETAILING ADVANCE TECHNOLOGY">
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content">
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
<!-- end::Rebar Detailing Section -->

<!--begin::CTA-->
@include('frontend.include.cta-project-contact')
<!--end::CTA-->
@endsection