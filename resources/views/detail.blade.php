@extends('layouts.front')

@section('content')

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-black">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('welcome') }}">
            <img src="{{ asset('assets/img/iqbal_hambali_logo_transparent.png') }}" alt="Logo IH" width="32" height="32">
            <span class="fw-bold">Project Detail ({{ $project->title }})</span>
        </a>
        <div class="d-flex">
            <a href="{{ route('welcome') }}" class="btn btn-outline-success">← Back</a>
        </div>
    </div>
</nav>

<!-- Project Detail -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!-- Project Header -->
            <div class="text-center mb-5">
                @if($project->files && $project->files->count() > 0)
                    <div class="position-relative overflow-hidden rounded border border-secondary mb-4" style="height: 300px;">
                        <img src="{{ asset($project->files->first()->file_path) }}" 
                            class="w-100 h-100" 
                            alt="{{ $project->title }}" 
                            style="object-fit: cover; object-position: center;">
                        <!-- Overlay gradient -->
                        <div class="position-absolute bottom-0 start-0 w-100 h-50" 
                            style="background: linear-gradient(transparent, rgba(0,0,0,0.7));"></div>
                    </div>
                @else
                    <div class="bg-gradient rounded border border-secondary mb-4 d-flex flex-column align-items-center justify-content-center text-white" 
                        style="height: 300px; background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);">
                        <i class="bi bi-image fs-1 mb-3 opacity-50"></i>
                        <h1 class="display-5 fw-bold mb-2">{{ $project->title }}</h1>
                        <p class="lead">{!! $project->description !!}</p>
                    </div>
                @endif
            </div>

            <style>
            .text-shadow {
                text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
            }
            </style>
            <div>
              <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-success mb-3">{{ $project->title }}</h1>
                <div class="mx-auto">
                    <p class="lead text-light fs-5 text-start">{{ $project->description }}</p>
                </div>
              </div>
            </div>

            <!-- Project Info -->
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="card bg-black border-secondary mb-4">
                        <div class="card-body">
                            <h5 class="card-title text-success">Technology Stack</h5>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($project->tech_stack_skills as $tech_skill)
                                    @php
                                        $colors = ['primary', 'success', 'danger', 'warning', 'info', 'secondary', 'dark'];
                                        $color = $colors[$loop->index % count($colors)];
                                    @endphp
                                    <span class="badge bg-{{ $color }}">{{ $tech_skill->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-black border-secondary mb-4">
                        <div class="card-body">
                            <h5 class="card-title text-success">Project Year</h5>
                            <p class="mb-0">{{ $project->year }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Gallery -->
            @if($project->files && $project->files->count() > 0)
            <div class="card bg-black border-secondary mb-4">
                <div class="card-body">
                    <h5 class="card-title text-success">Project Gallery</h5>
                    <div class="row g-3">
                        @foreach($project->files as $file)
                        <div class="col-md-4 col-sm-6">
                            <div class="position-relative">
                                <img src="{{ asset($file->file_path) }}" class="img-fluid rounded border border-secondary" alt="Project Image" style="width: 100%; height: 200px; object-fit: cover; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal{{ $loop->index }}">
                                
                                <!-- Modal for each image -->
                                <div class="modal fade" id="imageModal{{ $loop->index }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content bg-black border-secondary">
                                            <div class="modal-header border-secondary">
                                                <h5 class="modal-title text-success">{{ $project->title }}</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <img src="{{ asset($file->file_path) }}" class="img-fluid w-100" alt="Project Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="text-center">
                <a href="{{ route('welcome') }}#work" class="btn btn-outline-light">
                    <i class="bi bi-arrow-left me-2"></i>Back to Projects
                </a>
            </div>
        </div>
    </div>
</div>

@endsection