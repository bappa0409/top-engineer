@extends('layouts.app')
@section('title', 'Contact List')

@section('content')

   <!--begin::Validation Message-->
   @include('include.validation-message')
   <!--end::Validation Message-->

    <section class="admin-visitor-area">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h1 class="mb-0">Contact List</h1>
                    </div>
                    <div class="col-6 text-end">
                        <a href="javascript:void(0)" data-route="{{route('admin.contacts.multi_destroy')}}" class="btn btn-danger delete-all">Bulk Delete</a>
                    </div>
                </div>
            </div>
           
            <div class="card-body">
                {{ $dataTable->table([], true) }}
            </div>
        </div>
    </section>
    
    <!-- Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Contact Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-1"><strong>Name:</strong> <span id="contact-name"></span></p>
                    <p class="mb-1"><strong>Email:</strong> <span id="contact-email"></span></p>
                    <p><strong>Mobile:</strong> <span id="contact-mobile"></span></p>
                    <p><strong>Message:</strong> <span id="contact-message"></span></p>
                    <p><strong>Created At:</strong> <span id="contact-created"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush