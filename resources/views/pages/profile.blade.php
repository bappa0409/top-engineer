@extends('layouts.app')
@section('title', 'Profile')
@push('css')
<link rel="stylesheet" href="{{asset('assets/admin/css/image-preview.css')}}">
@endpush

@section('content')
@include('include.validation-message')
<section>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-6">
                    <h1 class="mb-0">Profile Information</h1>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form class="needs-validation" action="{{route('admin.profile.update', $user->id)}}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <label class="col-form-label col-sm-2">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Your Name" name="name"
                            value="{{$user->name}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-form-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{$user->email}}">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-form-label col-sm-2">Profile Picture</label>
                    <div class="col-sm-10">
                        <div class="basic-image-upload">
                            <div class="image-edit">
                                <input type='file' name="profile_photo_path" id="basic-image"
                                    accept=".png, .jpg, .jpeg" />
                                <label for="basic-image">
                                    <i data-feather="edit"></i>
                                </label>
                            </div>
                            <div class="image-preview">
                                <div id="image-preview"
                                    style="background-image: url({{ $user->profile_photo_path ? asset('upload/profile/' . $user->profile_photo_path) : asset('assets/admin/img/avatar.jpg') }});"
                                    class="img-fluid img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <h5>Leave Password blank if you do not want to change</h5>

                <div class="mb-3 row">
                    <label class="col-form-label col-sm-2">Password</label>
                    <div class="col-sm-10">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                            autocomplete="new-password">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-form-label col-sm-2">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control" placeholder="Password" autocomplete="new-password">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10 ms-sm-auto">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<section>
@endsection

@push('scripts')
@endpush