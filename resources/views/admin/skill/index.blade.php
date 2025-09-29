@extends('layouts.backend')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Skills</h4>
        <a href="{{ route('skills.create') }}" class="btn btn-primary mb-3">Add Skill</a>
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($skills as $skill)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->description }}</td>
                <td>
                  <a href="{{ route('skills.edit', $skill) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('skills.destroy', $skill) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection