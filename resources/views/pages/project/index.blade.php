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
                        <h1 class="mb-0">Project List</h1>
                    </div>
                    <div class="col-6 text-end">
                        <a href="javascript:void(0)" data-route="{{route('admin.projects.multi_destroy')}}" class="btn btn-danger delete-all">Bulk Delete</a>
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
           
            <div class="card-body">
                {{ $dataTable->table([], true) }}
            </div>
        </div>
    </section>
    
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush