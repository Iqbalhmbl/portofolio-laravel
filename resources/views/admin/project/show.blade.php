@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Project Details</h1>
    <p><strong>Title:</strong> {{ $project->title }}</p>
    <p><strong>Year:</strong> {{ $project->year }}</p>
    <p><strong>Description:</strong> {{ $project->description }}</p>
    <p><strong>Tech Stack:</strong> {{ implode(', ', json_decode($project->tech_stack, true)) }}</p>
    <h3>Files</h3>
    <ul>
        @foreach($project->files as $file)
            <li>
                <img src="{{ asset($file->file_path) }}" alt="Uploaded File" style="max-width: 200px; max-height: 200px;">
                <form action="{{ route('projects.deleteFile', ['project' => $project->id, 'file' => $file->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection