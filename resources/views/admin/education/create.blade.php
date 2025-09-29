@extends('layouts.backend')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Education</h4>
        <form action="{{ route('educations.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="institution" class="form-label">Institution</label>
            <input type="text" name="institution" id="institution" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" name="degree" id="degree" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="field_of_study" class="form-label">Field of Study</label>
            <input type="text" name="field_of_study" id="field_of_study" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection