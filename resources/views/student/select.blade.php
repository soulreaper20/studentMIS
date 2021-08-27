@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Student Dashboard</div>

                <div class="card-body">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('faculty.index') }}">Faculty</a>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Select  Faculty</div>

                <div class="card-body">
                  @include ('partials.error')
    <form action="" method="POST" enctype="multipart/form-data">
      @csrf
      @if(isset($faculty))
      @method('PUT')
      @endif
    @if($faculty->count()>0)
    <div class="form-group">
      <label for="tags">Faculty</label>
      <select class="form-control faculty-selector" name="faculty[]" id="faculty" multiple>
        @foreach($faculty as $f)
        <option value="{{ $f->id }}"
          @if(isset($student))
          @if($student->hasFaculty($f->id))
          selected
          @endif
          @endif> {{$f->name}}</option>
        @endforeach
      </select>
    </div>
    @endif
    <div class="form-group">
      <button class="btn btn-success" type="submit">{{ isset($faculty) ? 'Update Post' : 'Create Post' }}</button>
    </div>
  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.faculty-selector').select2();
})
</script>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
