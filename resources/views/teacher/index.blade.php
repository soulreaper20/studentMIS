@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.error')
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('partials.sidebar')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teachers
                     @if(Auth::user()->role =='superAdmin')
                    <a href="{{ route('teacher.create')}}" class="btn btn-info btn-sm float-right">Add Teacher</a>
                    @endif
                </div>

                <div class="card-body">
                     @if($teacher->count()>0)
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Faculty</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="light">
                @foreach($teacher as $f)
                <tr>
                  <th scope="row">{{$f->id }}</th>
                  <td> {{ $f->name }}</td>
                  <td>{{ $f->faculty }}</td>
                  @if(Auth::user()->role =='superAdmin')
                  
                  <td>
                    <button class="btn btn-danger btn-sm float-right mx-2" onclick="handleDelete({{ $f->id }})">Delete</button> <a href="{{ route('teacher.edit', $f->id) }}" class="btn btn-secondary btn-sm float-right">Edit</a> </td>
                  @endif
               </tr>
               @endforeach
           </tbody>
                        </table>

                    </div>
                        @endif
                         <form action="" method="POST" id="deleteteacherForm">
    @csrf
    @method('DELETE')
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete Notice</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="text-center text-bold">Are you sure want to delete this? </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go back</button>
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
          </div>
        </div>
      </div>
    </div>
  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
function handleDelete(id) {
var form = document.getElementById('deleteteacherForm')
form.action = '/teacher/' + id
$('#deleteModal').modal('show')
}
</script>
@endsection