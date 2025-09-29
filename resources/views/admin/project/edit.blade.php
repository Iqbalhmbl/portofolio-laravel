@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Edit Project</h1>
    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ $project->year }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $project->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tech_stack" class="form-label">Tech Stack</label>
            @foreach($skills as $skill)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tech_stack[]" value="{{ $skill->id }}" id="skill-{{ $skill->id }}" {{ in_array($skill->id, json_decode($project->tech_stack, true)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="skill-{{ $skill->id }}">
                        {{ $skill->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="files" class="form-label">Files</label>
            <div id="drop-area" class="drag-drop-area">
                <p>Drag and drop files here or click to upload</p>
                <input type="file" name="files[]" id="files" class="form-control d-none" multiple>
            </div>
            <div id="preview-area" class="preview-area">
                @foreach($project->files as $file)
                    <img src="{{ asset('storage/' . $file->file_path) }}" alt="Preview" class="preview-image">
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<link rel="stylesheet" href="{{ asset('css/drag-and-drop.css') }}">
<script src="{{ asset('js/drag-and-drop.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        height: 300
    });
</script>
@endsection