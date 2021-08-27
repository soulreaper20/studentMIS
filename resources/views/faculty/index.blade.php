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
                <div class="card-header">Faculty
                @if(Auth::user()->role =='superAdmin') <a href="{{ route('faculty.create') }}" class="btn btn-primary float-right">Add Faculty</a>
                @endif</div>

                <div class="card-body">
                     @if($faculty->count()>0)
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Faculty</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="light">
                @foreach($faculty as $f)
                <tr>
                  <th scope="row">{{$f->id }}</th>
                  <td> {{ $f->name }}</td>
                  <!-- <td> <a href="" class="btn btn-primary btn-sm"> View Teachers </a> </td>  -->
                   @if(Auth::user()->role =='superAdmin')
                  <td>
                     <button class="btn btn-danger btn-sm float-right mx-2" onclick="handleDelete({{ $f->id }})">Delete</button>
                    <a href="{{ route('faculty.edit', $f->id) }}" class="btn btn-secondary btn-sm float-right">Edit</a> </td>
                  @endif
               </tr>
               @endforeach
           </tbody>
                        </table>
                        <form action="" method="POST" id="deletefacultyForm">
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
</div>
   @else 
   <h3 class="text-center">No Faculty Yet</h3>
   @endif
@endsection

@section('scripts')
<script>
function handleDelete(id) {
var form = document.getElementById('deletefacultyForm')
form.action = '/faculty/' + id
$('#deleteModal').modal('show')
}
</script>
@endsection