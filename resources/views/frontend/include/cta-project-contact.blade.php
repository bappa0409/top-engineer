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

<!-- begin::Portfolio Section -->
<section id="portfolio" class="content mt-5 pt-5-mobile">
    <div class="container-fluid">

        <div class="section-title text-center mb-5">
            <h2 class="mb-1 text-uppercase">Our Projects</h2>
            <p>Successfully Completed Projects</p>
        </div>

        <div class="row">
            @forelse($projects as $project)
                <div class="col-lg-3 col-md-6 col-6 project-item mb-4">
                    <div class="project-image-block img-thumbnail">
                        <a href="{{ asset($project->image) }}" data-gallery="projectGallery"
                            class="lightbox-image preview-link">

                            <img src="{{ asset($project->image) }}" loading="lazy" class="img-fluid"
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
                <form id="contactForm" action="{{ route('contact.submit') }}" method="POST" class="php-email-form p-4"
                    data-aos="fade-up" data-aos-delay="500">
                    @csrf

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name*">
                            <small class="text-danger error-text name_error"></small>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                            <small class="text-danger error-text mobile_error"></small>
                        </div>

                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control" placeholder="Your Email*">
                            <small class="text-danger error-text email_error"></small>
                        </div>

                        <div class="col-md-12">
                            <textarea name="message" class="form-control" rows="6" placeholder="Message*"></textarea>
                            <small class="text-danger error-text message_error"></small>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- end::Contact Section -->