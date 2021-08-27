@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"> Dashboard</div>

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
    <form action="{{ route('faculty.keep') }}" method="POST" enctype="multipart/form-data">
      @csrf
    @if($faculty->count()>0)
    <div class="form-group">
      <label for="faculty">Faculty</label>
      <select class="form-control" name="faculty" id="faculty">
        @foreach($faculty as $f)
        <option value="{{ $f->id }}">
          
          {{ $f->name}}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name"  value="{{ isset($user) ? $user->name : '' }}" readonly>
      </div>

      <div class="form-group">
        
        <input type="text" class="form-control" name="id" id="id"  value="{{ isset($user) ? $user->id : '' }}" hidden>
      </div>
    @endif
    <div class="form-group">
      <button class="btn btn-success" type="submit"> Add Faculty </button>
    </div>
  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
