@extends('layouts.website')
@section('title', 'M&E Engineers - Design & Detailing')

@section('website_content')

<section class="cta-section">
    <div class="container">
        <div class="row" data-aos="zoom-in"></div>
    </div>
</section>

<!-- begin::Project Section -->
<section id="project" class="content pt-5">
    <div class="container-fluid">

        @forelse($projects as $project)

            <div class="col-12 d-flex flex-column justify-content-center align-items-stretch mb-4">
                <div class="px-3 project-card pt-5-mobile px-0-mobile">

                    <h3 class="mb-2">
                        <strong class="text-uppercase">{{ $project->title }}</strong>
                    </h3>

                    <p class="mb-3">{{ $project->description }}</p>

                    <div class="row align-items-start pt-3 g-3">

                        <!-- Image Column -->
                        <div class="col-12 col-lg-7">
                            <div class="project-image-box">
                                @if(!empty($project->image))
                                    <img
                                        src="{{ asset($project->image) }}"
                                        alt="{{ $project->title }}"
                                        loading="lazy"
                                        class="project-image"
                                    >
                                @endif
                            </div>
                        </div>

                        <!-- Information Table Column -->
                        <div class="col-12 col-lg-5">
                            <h4 class="mb-2"><strong class="text-uppercase">INFORMATION</strong></h4>
                            <hr class="custom-hr">

                            <div class="table-responsive">
                                <table class="table small table-sm table-hover mb-0">
                                    <tbody>
                                        <tr>
                                            <th style="width:45%">Dimensions</th>
                                            <td>{{ $project->dimensions }}</td>
                                        </tr>
                                        <tr>
                                            <th>Building height</th>
                                            <td>{{ $project->building_height }} m</td>
                                        </tr>
                                        <tr>
                                            <th>Weight</th>
                                            <td>{{ number_format($project->weight) }} kg</td>
                                        </tr>
                                        <tr>
                                            <th>Purpose</th>
                                            <td>{{ $project->purpose }}</td>
                                        </tr>
                                        <tr>
                                            <th>Documentation</th>
                                            <td>{{ $project->documentation }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        @empty
            <p class="text-center">No projects available at the moment.</p>
        @endforelse

    </div>
</section>
<!-- end::Project Section -->

<!--begin::CTA-->
@include('frontend.include.cta-project-contact')
<!--end::CTA-->

@endsection
