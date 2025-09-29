@extends('layouts.backend')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Education</h4>
        <a href="{{ route('educations.create') }}" class="btn btn-primary mb-3">Add Education</a>
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Institution</th>
              <th>Degree</th>
              <th>Field of Study</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($educations as $education)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $education->institution }}</td>
                <td>{{ $education->degree }}</td>
                <td>{{ $education->field_of_study }}</td>
                <td>{{ $education->start_date }}</td>
                <td>{{ $education->end_date ?? 'Present' }}</td>
                <td>
                  <a href="{{ route('educations.edit', $education) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('educations.destroy', $education) }}" method="POST" style="display:inline;">
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