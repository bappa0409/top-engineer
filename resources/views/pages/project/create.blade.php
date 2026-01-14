@extends('layouts.app')
@section('title', 'Project List')

@section('content')

   <!--begin::Validation Message-->
   @include('include.validation-message')
   <!--end::Validation Message-->

    <section class="admin-visitor-area">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h1 class="mb-0">Create Your Project</h1>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Project List</a>
                    </div>
                </div>
            </div>
           
            <form class="needs-validation" action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="card-body">
                    <div class="row">

                        <!-- Title -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title') }}" required>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="" selected>Select One</option>
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="4"
                                    class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <!-- Image -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <!-- Dimensions -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dimensions</label>
                            <input type="text" name="dimensions" class="form-control"
                                value="{{ old('dimensions') }}">
                        </div>

                        <!-- Building Height -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Building Height</label>
                            <input type="number" step="0.01" name="building_height"
                                class="form-control" value="{{ old('building_height') }}">
                        </div>

                        <!-- Weight -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Weight (kg)</label>
                            <input type="number" name="weight"
                                class="form-control" value="{{ old('weight') }}">
                        </div>
                        

                        <!-- Purpose -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Purpose</label>
                            <input type="text" name="purpose"
                                class="form-control" value="{{ old('purpose') }}">
                        </div>

                        <!-- Documentation -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Documentation</label>
                            <input type="text" name="documentation"
                                class="form-control" value="{{ old('documentation') }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </section>
    
@endsection
