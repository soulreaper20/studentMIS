@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @include ('partials.error')
        <div class="col-md-4">
            @include('partials.sidebar')
        </div>
        <div class="col-md-8">
<div class="card card-default">
                <div class="card-header">
                {{ isset($faculty) ? 'Edit Faculty' : 'Create Faculty' }}</div>

                <div class="card-body">
                 @include ('partials.error')
                  <form action="{{ isset($faculty) ? route('faculty.update', $faculty->id) : route('faculty.store') }}" method="POST">
                    @csrf
                    @if(isset($faculty))

                    @method('PUT')
                    @endif
                    <div class="form-group">
                      <label for = "name">Name</label>
                      <input type="text" name="name" class="form-control" id="name" 
                      value="{{ isset($faculty) ? $faculty->name : '' }}">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-success">
                        {{ isset($faculty) ? 'Update faculty' : 'Add faculty
                        ' }}
                      </button>
                    </div>
                  </form>
                </div>
</div>
@endsection
