@extends('layouts.website')
@section('title', 'M&E Engineers - Design & Detailing')

@section('website_content')

<section class="cta-section">
	<div class="container">
		<div class="row aos-init aos-animate" data-aos="zoom-in">
		</div>
	</div>
</section>

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
                <form id="contactForm" action="{{ route('contact.submit') }}" method="POST" class="php-email-form p-4" data-aos="fade-up" data-aos-delay="500">
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


@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#contactForm').on('submit', function (e) {
            e.preventDefault();

            const $form = $(this);
            const url   = $form.attr('action');
            const $btn  = $form.find('button[type="submit"]');

            $('.error-text').text('');

            $.ajax({
                type: "POST",
                url: url,
                data: $form.serialize(),

                beforeSend: function () {
                    $btn.prop('disabled', true).text('Submitting...');
                },

                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: response.message
                    });
                    $form.trigger('reset');
                    $btn.prop('disabled', false).text('Send Message');
                },

                error: function (xhr) {
                    $btn.prop('disabled', false).text('Send Message');

                    if (xhr.status === 422) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('.' + key + '_error').text(value[0]);
                        });
                    } else {
                        toastr.error('Something went wrong!');
                    }
                }
            });
        });
    });
</script>
@endpush