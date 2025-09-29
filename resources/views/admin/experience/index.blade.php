@extends('layouts.backend')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Experiences</h4>
        <a href="{{ route('experiences.create') }}" class="btn btn-primary mb-3">Add Experience</a>
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Company</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($experiences as $experience)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $experience->title }}</td>
                <td>{{ $experience->company }}</td>
                <td>{{ $experience->start_date }}</td>
                <td>{{ $experience->end_date ?? 'Present' }}</td>
                <td>
                  <a href="{{ route('experiences.edit', $experience) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('experiences.destroy', $experience) }}" method="POST" style="display:inline;">
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