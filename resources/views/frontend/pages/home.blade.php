@extends('layouts.website')
@section('title', 'Top-engineer.com | STEEL DETAILING | REBAR DETAILING')

@section('website_content')

<!-- begin::Hero Section -->
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">STEEL DETAILING</h2>
                <p class="animate__animated animate__fadeInUp">Topengineer offers comprehensive solutions to the steel
                    detailing needs of a wide array of clientele ranging from fabricators, contractors, designers, and
                    structural engineers. Being a leading steel detailing company we have the technical expertise and
                    manpower to handle steel detailing for 5,000 tons per month.
                    <span class="d-none d-sm-block">
                        For nearly a decade we have been offering steel detailing services of impeccable quality by
                        strictly adhering to the international industry standards in steel detailing which include AISC,
                        ANSI, OSHA &amp; RSIO to name a few.
                    </span>
                </p>
                <a href="/steel-detailing/" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                    More</a>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">REBAR DETAILING</h2>
                <p class="animate__animated animate__fadeInUp">
                    Topengineer INC is a leading rebar service company specialized in detailing, drawing, 3D modeling
                    and estimation.
                    We have the expertise and the manpower to detail over 2,500 tons of rebar per month. For nearly a
                    decade,
                    we have been offering the service in following industry standards which include
                    ASTM, ACI, CRSI, AASHTO, RSIO, BS 8666 to our clients all over the world.
                    <span class="d-none d-sm-block">
                        The detailing and estimation services which we provide are ideal for structural engineers, rebar
                        fabricators,
                        steel erectors, detailers, general contractors, concrete contractors, and designers.
                    </span>
                </p>
                <a href="/rebar-detailing/" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                    More</a>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">BIM MODELING</h2>
                <p class="animate__animated animate__fadeInUp">
                    The huge list of used software for BIM makes it difficult to use a single information model in a
                    particular program (Tekla, Revit, etc.).
                    Often in one organization, it is not advisable to keep all engineering specialists.
                    It is much more profitable to split / distribute the work into organizations specializing in
                    particular scopes (MEP, structures etc.).
                    <span class="d-none d-sm-block">
                        As a result, there is a need for the collection and integration of the project into a single
                        information model.
                        Topengineer is doing structural part of the project in Tekla Structures. For MEP (Mechanical,
                        electrical, and plumbing) we use Revit.
                        The developed interaction categories allow us to work with large models and with various details
                        (LOD100-LOD450).
                    </span>
                </p>
                <a href="#bim-modeling" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                    More</a>
            </div>
        </div>

        <!-- Carousel Controls using Font Awesome -->
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

    </div>
</section>
<!-- end::Hero Section -->

<!-- begin::Icon Boxes Section -->
<section id="icon-boxes" class="icon-boxes">
    <div class="container">
        <div class="row">

            <!-- Steel Detailing -->
            <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch mb-5" data-aos="fade-up">
                <div class="icon-box">
                    <div class="icon"><i class="fa-solid fa-gear"></i></div>
                    <h4 class="title"><a href="">Steel Detailing</a></h4>
                    <p class="description">
                        TopEngineer is a leader in the steel structures detailing market and we are proud to be a part
                        of more than 300 completed projects over the last decade.
                    </p>
                </div>
            </div>

            <!-- Rebar Detailing -->
            <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch mb-5" data-aos="fade-up"
                data-aos-delay="100">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-file-alt"></i></div>
                    <h4 class="title"><a href="">Rebar Detailing</a></h4>
                    <p class="description">
                        Rebar detailing services is one of the key as well as the most important services that we offer
                        for a large variety of buildings and facilities of any complexity, providing shop drawings for
                        constructing reinforcement of steel.
                    </p>
                </div>
            </div>

            <!-- BIM Modeling -->
            <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch mb-5" data-aos="fade-up"
                data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-project-diagram"></i></div>
                    <h4 class="title"><a href="">BIM Modeling</a></h4>
                    <p class="description">
                        BIM or Building Information Modeling is the new as well as the latest services of approaching
                        the designs. It is the process where you can convert all your paper design into a digital
                        format.
                    </p>
                </div>
            </div>

            <!-- Structural Analysis -->
            <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch mb-5" data-aos="fade-up"
                data-aos-delay="300">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-layer-group"></i></div>
                    <h4 class="title"><a href="">Structural Analysis</a></h4>
                    <p class="description">
                        Calculation of joints is the most critical step in detailing, as joints being the weakest link
                        in structures. Thus we offer a professional approach in calculation connections, using special
                        software, such as IDEA StatiCa.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::Icon Boxes Section -->


<!-- begin::About Us Section -->
<section id="about-us" class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mt-4" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/about_us.png') }}" class="img-fluid" alt="About Us">
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content">
                    <h3><strong>ABOUT US</strong></h3>
                    <p>
                        TopEngineer provides leading engineering services being innovative Structural Steel Detailing,
                        Rebar Detailing, BIM Modelling,
                        Joints Calculation and Structures Optimization company, committed to provide high quality
                        services at any range and depth of steel
                        and concrete structures to the commercial and industrial sectors.
                    </p>
                    <p>
                    </p>
                    We provide our services and solutions on a global scale, present
                    in United States of America and European countries. Our international reach, industry expertise
                    guarantees clean, accurate and comprehensive
                    deliverables on schedule, with account for country- specific legislation and standard detailing
                    practices.
                    <p></p>

                    <span class="d-lg-none d-xl-block ">
                        <p><strong> Our Mission </strong></p>

                        <p>
                            Our goal is to continue to be the top leading steel detailing provider, and to become the
                            industry’s first and only choice by developing
                            excellent long-term relationships with our clients. Thus, our team is mostly concerned with
                            getting your structure drawn right, instead
                            of simply drawn quickly, ensuring that the final product is complete. We strive for 100%
                            client satisfaction. Your success is our success!
                        </p>
                    </span>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- end::About Us Section -->

<!-- begin::Steel Detailing Section -->
<section id="steel-detailing" class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content d-lg-none d-xl-block">
                    <h3> <strong>STEEL DETAILING</strong></h3>
                    <p> As steel detailers, we generate 2D plans and 3D models to aid the fabrication and erection
                        process of steel framework.
                        These technologies allow us to maintain strong and focused plans/ models for all projects,
                        regrdless of scope and complexity.
                    </p>

                    <p><strong>Steel structures detailing</strong> Steel structures detailing is an essential part of a
                        steel structure design.
                        Manufacturing of steel parts (details) is fulfilled in accordance with detailing drawings.
                        Steel detailing is the production of shop drawings for a steel fabricator.
                    </p>

                    <p><strong> Advanced Bill of Materials </strong>- The preliminary metal specification required for
                        the project.
                    </p>

                    <p><strong> A Single part drawings </strong> - а set of drawings of each part with all the
                        dimensions to produce it.
                        Each drawing consists of one part with all dimensions and other properties.
                        Single-part drawings depict how many parts with this mark are needed and which assemblies
                        include them.
                    </p>

                    <p> <strong>Assembly drawings </strong> - display how to weld detail pieces to each other.
                        The drawings show dimensions and general size of each assembly and include bill marks of each
                        detail and marks of assembly.
                    </p>

                    <p> <strong>Bolts specification </strong>- the list and number of bolts to be applied in a
                        structure.
                    </p>

                    <p> <strong>Erection drawings </strong> - the installation process is held in accordance with these
                        drawings.
                        Erection drawings consist of plans and a section with marks of assemblies.
                        Erection drawings may display typical joints.
                    </p>

                    <p> <strong>Bill of Materials </strong> - list of materials required for manufacturing.
                        The material loss incurred in cutting is not considered in this bill.
                        Usually, the loss of cutting is from 1% to 5%.
                    </p>

                    <p> <strong>Shipping List </strong> - the list and the number of assembly. Mark (assembly) is a
                        structural element which is sent from a workshop.
                    </p>

                    <div class="pricing aos-init aos-animate" data-aos="fade-up">
                        <a href="/steel-detailing/" class="btn-buy">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/steel_detailing/main.png') }}" class="img-fluid"
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
                    <img src="{{ asset('assets/frontend/img/rebar-detaling/main.png') }}" class="img-fluid"
                        alt="Rebar Detailing">
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content">
                    <h3> <strong>REBAR DETAILING</strong></h3>
                    <p> <strong>Rebar detailing</strong> is a detailed construction engineering process that includes
                        the bending shapes, placement, dimension, quantity, description and laps of the reinforcement.
                        TopEngineer is able to provide rebar detailing for a large variety of buildings and facilities
                        of any complexity
                        (rebar framing plan design, rebar structure foundation, rebar pit design, rebar framing plan,
                        rebar beam design).
                        Today you can find reinforced concrete in nearly every major construction project such as roads,
                        bridges, industrial
                        and commercial building structures, sewer systems, ventilation systems and many more. The
                        primary use of rebar is to reinforce
                        a piece of concrete because of its weak tensile strength. To overcome this, rebar is cast into
                        it to increase its tensile strength,
                        guaranteeing load support and minimizing stress. Here at TopEngineer we offer efficient rebar
                        reinforcement modeling in 3D,
                        producing and achieving high-levels of accuracy. Working with Tekla Structures software allows
                        our engineers to draw precise
                        and accurate 3D rebar detailing, which is easier to interpret and faster to detail than creating
                        a 2D drawing. In addition to
                        the drawings, we provide CNC machine data which helps to cut and bend the rebar to the desired
                        shapes.
                    </p>

                    <span class="d-lg-none d-xl-block">
                        <p>
                            Our skilled staff provide high quality detailing and optimal model calculations including
                            estimating the efficient amount of rebar and concrete needed, minimizing costs and saving
                            time.
                        </p>

                        <p><strong>Bar bending schedule(BBS)</strong> - describes the location, mark, type, size, length
                            and number, and bending details of each bar.</p>
                        <p><strong>Placing &amp; shop drawings</strong> - provide instructions to the field ironworker
                            on where to place the reinforcing bars within the form work.
                            Placing drawings may also indicate the bar support layout and a placing sequence,
                            facilitating the efficient installation of the reinforcing bars.</p>
                        <p><strong>As built drawings </strong>- the original design drawings are revised to reflect any
                            changes made in the field.</p>
                    </span>

                    <div class="pricing aos-init aos-animate" data-aos="fade-up">
                        <a href="/rebar-detailing/" class="btn-buy">Read More</a>
                    </div>



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
                    <h3> <strong>BIM MODELING</strong></h3>
                    <p><strong> BIM</strong> is a universal platform for building. It puts together every piece of
                        information about every component of a building project.
                        With BIM you are able to access any type of information, integrating everyone working with the
                        project, making everything more efficient
                        and cost effective. Companies using BIM save production costs and time as they have a much lower
                        chance of making mistakes.
                    </p>
                    <p>
                        The data from BIM about any given building can be used to simulate the full life-cycle of a
                        facility, from the beginning of initial
                        project production until the demolition phases, counting in the recovery of any recyclable
                        materials. Subsurface and below-ground spaces and
                        facilities with their systems can be modeled and shown using a 1-to-1 scale next to each other,
                        which in turn can be simulated and depicted in
                        the entire project. Such vast amounts of information can prevent any errors which can show up
                        during different phases of the project.
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/bim.png') }}" class="img-fluid" alt="BIM Modeling">
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
                    <img src="{{ asset('assets/frontend/img/structural-analysis.png') }}" class="img-fluid"
                        alt="STRUCTURAL ANALYSIS AND DESIGN TEKLA STRUCTURES">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content">
                    <h3><strong>STRUCTURAL ANALYSIS AND DESIGN</strong></h3>

                    <p>
                        TopEngineer LTD is a consulting engineering firm specializing in innovative,
                        cost-effective structural design solutions. Our objective is to deliver
                        high-quality structural engineering services for complex construction projects.
                    </p>

                    <p>
                        Our team consists of highly qualified professionals with over 20 years of
                        experience in structural design and construction, offering services from
                        concept development to construction administration.
                    </p>

                    <p>
                        We focus on responsible and imaginative engineering solutions, utilizing
                        advanced software tools and modern materials to deliver efficient structural
                        systems for projects ranging from renovations to high-rise buildings.
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
                    <h3><strong>CONNECTION DESIGN</strong></h3>

                    <p>
                        Usually, the calculation of connection in a steel structure is needed to develop steel structures detailing design. Construction calculations are necessary to select the best matches and optimal connection configurations while using the minimum of material consumption. A detailed study of the calculation of all the project components can greatly increase the complexity of the final project and increase the time and cost of design.
                    </p>

                    <p>
                        The result of joint calculation is to be presented in the form of a calculation note. In order to calculate joints in steel structures, the actual loads acting on each element are needed. If the actual loads cannot be highlighted in the basic design of steel structures, it can instead be developed beforehand.
                    </p>

                    <p>
                        If connection calculation is necessary, we use IDEA StatiCa, a program based on the method of finite elements used to calculated connections. IDEA StatiCa allows us to calculate steel joints such as 2D frames and trusses, footing and anchoring, 3D frames and trusses and reinforcement connections such as beam details, wall details, diaphragms, frame joints, hangings and brackets. The price evaluation for each project is bespoke and there are a few factors influencing the cost.
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/connection-design.png') }}" class="img-fluid"
                        alt="CONNECTION DESIGN BIM IDEA StatiCa">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end::Connection Design Section -->

<!-- begin::Consulting Design Section -->
<section id="consulting" class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mt-4" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/consulting.png') }}" class="img-fluid"
                        alt="CONSULTING Tekla Structures SAP2000 IDEA StatiCa">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="accordion-list mt-5">
                    <h3 class="text-uppercase"><strong>Consulting</strong></h3>

                    <p>
                        Maximize your potential with Tekla Structures, SAP2000 or IDEA StatiCa trainings.
                    </p>
                    <p>
                        Virtual and classroom courses that boost productivity and confidence.
                    </p>

                    <ul class="accordion-list mt-4">
                        <li data-aos="fade-up" data-aos-delay="100">
                            <a data-bs-toggle="collapse" data-bs-target="#consult-1" class="collapse">
                                <span>01</span> Tekla Structures Course
                                <i class="fa-solid fa-chevron-down icon-show"></i>
                                <i class="fa-solid fa-chevron-up icon-close"></i>
                            </a>

                            <div id="consult-1" class="collapse show" data-bs-parent=".accordion-list">
                                <p>
                                    3D model examples, Tekla plugins, certification and practical
                                    workflows for detailing and construction data management.
                                </p>
                            </div>
                        </li>

                        <!-- SAP2000 -->
                        <li data-aos="fade-up" data-aos-delay="200">
                            <a data-bs-toggle="collapse" data-bs-target="#consult-2" class="collapsed">
                                <span>02</span> SAP2000 Course
                                <i class="fa-solid fa-chevron-down icon-show"></i>
                                <i class="fa-solid fa-chevron-up icon-close"></i>
                            </a>

                            <div id="consult-2" class="collapse" data-bs-parent=".accordion-list">
                                <p>
                                    Buckling analysis, nonlinear elements, progressive collapse
                                    and real-world structural applications.
                                </p>
                            </div>
                        </li>

                        <!-- IDEA StatiCa -->
                        <li data-aos="fade-up" data-aos-delay="300">
                            <a data-bs-toggle="collapse" data-bs-target="#consult-3" class="collapsed">
                                <span>03</span> IDEA StatiCa Course
                                <i class="fa-solid fa-chevron-down icon-show"></i>
                                <i class="fa-solid fa-chevron-up icon-close"></i>
                            </a>

                            <div id="consult-3" class="collapse" data-bs-parent=".accordion-list">
                                <p>
                                    Professional training for steel connection design following
                                    AISC & Eurocode with advanced joint verification.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end::Consulting Design Section -->

<!-- begin::Innovative IT Ideas Section -->
<section id="innovative-it" class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="inner-content">
                    <img src="{{ asset('assets/frontend/img/innovative-it.png') }}" loading="lazy" class="img-fluid"
                        alt="Plugins for Tekla Structures">
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="inner-content">
                    <h3><strong>INNOVATIVE IT IDEAS</strong></h3>

                    <p>
                        <strong>PLUGINS FOR TEKLA STRUCTURES</strong><br>
                        Since 2009, TopEngineer has been assisting construction companies by
                        delivering BIM-based digital solutions. Our mission is to develop
                        integrated and adaptive BIM resources that support digital
                        transformation and innovation.
                    </p>

                    <p>
                        <strong>Our expertise includes:</strong><br>
                        • User-friendly plugins, applications, drawing tools, macros and
                        integration tools for Tekla Structures and other BIM software<br>
                        • BIM data interoperability<br>
                        • Follow-up and maintenance for rebar & precast concrete manufacturers,
                        engineering firms and contractors
                    </p>

                    <p>
                        We are here to support you at every stage of your innovative projects.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end::Innovative IT Ideas Section -->

<!-- begin::CTA Section -->
<section id="cta" class="cta">
    <div class="container">
        <div class="row align-items-center" data-aos="zoom-in">
            <!-- CTA Content -->
            <div class="col-lg-9 text-center text-lg-start">
                <h3>We will call you back</h3>
                <p>
                    It is easy to order training courses — just leave your phone number
                    and our consultant will contact you shortly.
                </p>
            </div>

            <!-- CTA Button -->
            <div class="col-lg-3 text-center">
                <a href="javascript:void(0)" class="cta-btn align-middle" data-b24-form="click/91/4uj6d3">
                    Call me back
                </a>
            </div>

        </div>
    </div>
</section>
<!-- end::CTA Section -->

<!-- begin::Project Section -->
<section id="project" class="content mt-5">
    <div class="container-fluid">

        <div class="section-title text-center mb-5">
            <h2 class="mb-1 text-uppercase">Our Project</h2>
            <p>Successfully Completed Project</p>
        </div>

        <div class="row">
            @forelse($projects as $project)
            <div class="col-lg-3 col-md-6 portfolio-item mb-4">
                <a href="{{ asset($project->image) }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link">
                    <img src="{{ asset($project->image) }}" loading="lazy" class="img-fluid"
                        alt="{{ $project->title }}">
                </a>
            </div>
            @empty
            <p class="text-center">No projects available at the moment.</p>
            @endforelse
        </div>

    </div>
</section>
<!-- end::Project Section -->

<!-- begin::Contact Section -->
<section id="contact" class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

            <div class="col-lg-5">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-map-marker-alt flex-shrink-0"></i>
                    <div>
                        <h4>Address</h4>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div>
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <i class="fas fa-phone-alt flex-shrink-0"></i>
                    <div>
                        <h4>Call Us</h4>
                        <p>+1 5589 55488 55</p>
                    </div>
                </div>
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="fas fa-envelope flex-shrink-0"></i>
                    <div>
                        <h4>Email Us</h4>
                        <p>info@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <form action="" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                required></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>

                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- end::Contact Section -->
@endsection


<!-- Google Tag Manager -->
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
</script>