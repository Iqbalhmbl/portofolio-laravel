@extends('layouts.backend')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Education</h4>
        <form action="{{ route('educations.update', $education) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="institution" class="form-label">Institution</label>
            <input type="text" name="institution" id="institution" class="form-control" value="{{ $education->institution }}" required>
          </div>
          <div class="mb-3">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" name="degree" id="degree" class="form-control" value="{{ $education->degree }}" required>
          </div>
          <div class="mb-3">
            <label for="field_of_study" class="form-label">Field of Study</label>
            <input type="text" name="field_of_study" id="field_of_study" class="form-control" value="{{ $education->field_of_study }}" required>
          </div>
          <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $education->start_date }}" required>
          </div>
          <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $education->end_date }}">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $education->description }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection