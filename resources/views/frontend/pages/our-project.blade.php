@extends('layouts.website')
@section('title', 'M&E Engineers - Design & Detailing')

@section('website_content')

<section class="cta-section">
	<div class="container">
		<div class="row aos-init aos-animate" data-aos="zoom-in">
		</div>
	</div>
</section>

<!-- begin::Project Section -->
<section id="project" class="content pt-5">
    <div class="container-fluid">
        @forelse($projects as $project)
            <div class="col-xxl-4 col-xl-12 d-flex flex-column justify-content-center align-items-stretch mb-4">
                <div class="px-3">
                    <h3>
                        <strong class="text-uppercase">{{ $project->title }}</strong>
                    </h3>
                    <p>{{ $project->description }}</p>
                    
                    <div class="row align-items-start pt-4">
                        <!-- Image Column -->
                        <div class="col-7 mb-3 mb-xxl-0">
                            <div class="hover-image-scale" style="width:100%; max-height:350px; overflow:hidden; border:1px solid #ddd; border-radius:6px;">
                                @if(!empty($project->image))
                                    <img src="{{ asset($project->image) }}" 
                                        alt="{{ $project->title }}" 
                                        class="img-fluid" 
                                        style="width:100%; height:100%; object-fit:cover;">
                                @endif
                            </div>
                        </div>

                        <!-- Information Table Column -->
                        <div class="col-5">
                            <h4><strong class="text-uppercase">INFORMATION</strong></h4>
                            <hr class="custom-hr">
                            <table class="table small table-sm table-hover table-responsive">
                                <tbody>
                                    <tr>
                                        <th>Dimensions</th>
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
                                        <th>Number of parts</th>
                                        <td>{{ number_format($project->number_of_parts) }}</td>
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