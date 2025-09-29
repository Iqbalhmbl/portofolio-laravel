@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Add New Project</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>{{ $project->year }}</td>
                <td>
                    <a href="{{ route('projects.show', $project) }}" class="btn btn-info">View</a>
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection