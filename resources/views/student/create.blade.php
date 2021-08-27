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
                {{ isset($student) ? 'Edit Student' : 'Create Student' }}</div>

                <div class="card-body">
                 @include ('partials.error')
                  <form action="{{ isset($student) ? route('student.update', $student->id) : route('student.store') }}" method="POST">
                    @csrf
                    @if(isset($student))
                    @method('PUT')
                    @endif
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($student) ? $student->name : '' }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($student) ? $student->email : '' }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
      <label for="faculty" class="col-md-4 col-form-label text-md-right">Faculty</label>
       <div class="col-md-6">
      <select class="form-control" name="faculty" id="faculty">
        @foreach($faculty as $f)
        <option value="{{ $f->name }}"
            @if(isset($student))
          @if($student->faculty == $f->name)
          selected
          @endif
          @endif>
          {{ $f->name}}
        </option>
        @endforeach
      </select>
    </div>
</div>



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    <div class="form-group">
                      <button class="btn btn-success">
                        {{ isset($student) ? 'Update Student' : 'Add Student
                        ' }}
                      </button>
                    </div>
                  </form>
                </div>
</div>
@endsection
