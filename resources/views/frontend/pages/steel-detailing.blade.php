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

{{-- <!-- begin::Steel Detailing Section -->
<section id="steel-detailing" class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content d-lg-none d-xl-block">
                    <h3> <strong>STEEL DETAILING SERVICES</strong></h3>
                    <p> Topengineer INC offers comprehensive solutions to the steel detailing needs of a wide array of
                        clientele ranging from fabricators, contractors, designers, and structural engineers. Being a
                        leading steel detailing company we have the technical expertise and manpower to handle steel
                        detailing for 5,000 tons per month. For nearly a decade we have been offering steel detailing
                        services of impeccable quality by strictly adhering to the international industry standards in
                        steel detailing which include AISC, ANSI, OSHA & RSIO to name a few.
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/01.png') }}" class="img-fluid"
                        alt="Steel Detailing">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end::Steel Detailing Section --> --}}

<!-- begin::Steel Detailing Services Section -->
<section id="steel-detailing-services" class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content d-lg-none d-xl-block">
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

            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/01.png') }}" class="img-fluid" alt="Steel Detailing Services">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end::Steel Detailing Services Section -->


<!-- begin::Advanced Technology Section -->
<section id="advanced-technology" class="content">
    <div class="container-fluid">
        <div class="row flex-lg-row-reverse">
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content d-lg-none d-xl-block">
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

            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/02.png') }}" class="img-fluid" alt="Advanced Technology in Steel Detailing">
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
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content d-lg-none d-xl-block">
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

            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/03.png') }}" class="img-fluid" alt="Our Steel Detailing Team">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end::Steel Detailing Team Section -->


<!-- begin::Quality Policy Section -->
<section id="quality-policy" class="content">
    <div class="container-fluid">
        <div class="row flex-lg-row-reverse">
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content d-lg-none d-xl-block">
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

            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/04.png') }}" class="img-fluid" alt="Quality Policy">
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
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content d-lg-none d-xl-block">
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

            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/05.png') }}" class="img-fluid" alt="Why Choose M&E Engineers">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end::Why Choose Us Section -->


{{-- 
<!-- begin::Rebar Detailing Section -->
<section id="rebar-detailing" class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6 mt-4" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/02.jpg') }}" class="img-fluid"
                        alt="STRUCTURAL STEEL DETAILING ADVANCE TECHNOLOGY">
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content">
                    <h3> <strong>STRUCTURAL STEEL DETAILING ADVANCE TECHNOLOGY</strong></h3>
                    <p> Topengineer INC stays on the cutting edge of technology by using the latest available software
                        in order to produce the most accurate structural steel drawings, shop drawings, miscellaneous
                        steel detailed drawings, and framing plans. Topengineer INC can accommodate many different file
                        exports as well as material data file formats. We believe part of the secret to our success is
                        the combination of using the latest technology available, regular software upgrades, and the
                        capablility of delivering different file types.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::Rebar Detailing Section -->

<!-- begin::Bim Modeling Section -->
<section id="bim-modeling" class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content">
                    <h3> <strong>STEEL DETAILING TEAM</strong></h3>
                    <p>We pride ourselves in our skilled structural detailing team with years of experience under their
                        belt. Our team of professional steel detailers are trained to provide clean, accurate and
                        comprehensive structural detailing services on schedule. Our concern will always be not only to
                        meet but to exceed our customer’s expectations, needs and demands. At TOPENGINEER INC we believe
                        that the quality of service we provide is directly related the individuals we hire. Therefore,
                        we only employ competent, highly experienced qualified individuals. In addition to this, we
                        focus on providing continuous improvement in education and training for our structural detailing
                        team. Detailing software is only as good as the people using it and TOPENGINEER INC has gathered
                        the best in the field. A comprehensive knowledge of 3D modeling is essential to meet the
                        challenges of steel detailing!
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/03.png') }}" class="img-fluid"
                        alt="BIM Modeling">
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::Bim Modeling Section -->

<!-- begin::Structural Analysis Section -->
<section id="structural-analysis" class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mt-4" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/04.png') }}" class="img-fluid"
                        alt="STRUCTURAL ANALYSIS AND DESIGN TEKLA STRUCTURES">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content">
                    <h3><strong>QUALITY POLICY</strong></h3>
                    <p>
                        Our goal is to continue to be the top leading steel detailing provider. To ensure our clients
                        receive the best quality steel detailing services, TOPENGINEER INC we believe that the quality
                        of service we provide is directly related the individuals we hire. Therefore, we only employ
                        competent has established an implements an efficient quality control system that meets all the
                        requirements of the National Institute of Steel Detailing Quality Procedures Program
                        Certification, and American Institute of Steel Construction (NISD,QPP,AISC). Our quality control
                        system sets to assure accuracy, and perform to standard detailing practices.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::Structural Analysis Section -->

<!-- begin::Connection Design Section -->
<section id="connection-design" class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <h3><strong>WHY CHOOSE US AS YOUR STRUCTURAL STEEL DETAILER?</strong></h3>

                    <p class="p-4 fst-italic text-secondary">
                        We strive for excellence to meet our clients needs TOPENGINEER INC Delivers clean, accurate
                        drawings Competitive rates Highly Skilled Experienced Steel structural detailing team
                    </p>

                    <p>
                        TOPENGINEER INC is commited to our clients success by working diligently to meet customers
                        demands and provide the highest quality of finished projects in the industry. We strive for
                        excellence and to be available to you when you need us. Our mission is to be more than just
                        another company offering drafting services. Our goal is to be a valued business partner that
                        work together on projects. MDS works with engineering firms, steel fabrication shops and
                        contractors. Our structural steel shop drawings are produced in either metric or imperial
                        measures and in full compliance with AISC and CISC standards, as well as with the standard steel
                        detailing practices. When you need a professional steel detailer to do the job right the first
                        time, then you need to call us!
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/05.jpg') }}" class="img-fluid"
                        alt="CONNECTION DESIGN BIM IDEA StatiCa">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end::Connection Design Section -->

<!--begin::CTA-->
@include('frontend.include.cta-project-contact')
<!--end::CTA--> --}}
@endsection