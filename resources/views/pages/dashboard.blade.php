@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

<section class="admin-visitor-area">
    <div class="container-fluid">
        {{-- <div class="row g-4 mb-4">

            <!-- Total Projects -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 rounded-3 text-white bg-primary h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title text-white mb-1">Total Projects</h6>
                            <h3 class="mb-0 text-white">{{ $totalProjects ?? 0 }}</h3>
                        </div>
                        <div class="display-6 opacity-50">
                            <i class="bi bi-folder-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Published Projects -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 rounded-3 text-white bg-success h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title text-white mb-1">Published Projects</h6>
                            <h3 class="mb-0 text-white">{{ $publishedProjects ?? 0 }}</h3>
                        </div>
                        <div class="display-6 opacity-50">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Draft Projects -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 rounded-3 text-white bg-secondary h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title text-white mb-1">Draft Projects</h6>
                            <h3 class="mb-0 text-white">{{ $draftProjects ?? 0 }}</h3>
                        </div>
                        <div class="display-6 opacity-50">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Contacts -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 rounded-3 text-white bg-warning h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title text-white mb-1">Total Contacts</h6>
                            <h3 class="mb-0 text-white">{{ $totalContacts ?? 0 }}</h3>
                        </div>
                        <div class="display-6 opacity-50">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}

        <div class="row g-4 mb-4">
            <!-- Total Projects -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 rounded-3 text-white bg-primary h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title text-white mb-1">Total Projects</h6>
                            <h3 class="mb-0 text-white">{{ $totalProjects ?? 0 }}</h3>
                        </div>
                        <div class="display-6 opacity-50">
                            <i data-feather="folder"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Published Projects -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 rounded-3 text-white bg-success h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title text-white mb-1">Published Projects</h6>
                            <h3 class="mb-0 text-white">{{ $publishedProjects ?? 0 }}</h3>
                        </div>
                        <div class="display-6 opacity-50">
                            <i data-feather="check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Draft Projects -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 rounded-3 text-white bg-secondary h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title text-white mb-1">Draft Projects</h6>
                            <h3 class="mb-0 text-white">{{ $draftProjects ?? 0 }}</h3>
                        </div>
                        <div class="display-6 opacity-50">
                            <i data-feather="edit-2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Contacts -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 rounded-3 text-white bg-warning h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title text-white mb-1">Total Contacts</h6>
                            <h3 class="mb-0 text-white">{{ $totalContacts ?? 0 }}</h3>
                        </div>
                        <div class="display-6 opacity-50">
                            <i data-feather="users"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Recent Projects Table -->
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="mb-0">Recent Projects</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentProjects as $key => $project)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $project->title }}</td>
                                <td>
                                    @if($project->status == 'published')
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $project->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No projects found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Contacts Table -->
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="mb-0">Recent Contacts</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentContacts as $key => $contact)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->mobile ?? 'N/A' }}</td>
                                <td>{{ \Str::limit($contact->message, 50) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No contacts found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

@endsection
