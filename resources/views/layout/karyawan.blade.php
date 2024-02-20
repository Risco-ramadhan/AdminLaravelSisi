@extends('template.main')
{{-- @include('partials.cssdatatables') --}}

@section('container') 


<main class="py-4">
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">Daftar User</div>
  
                  <div class="card-body">
                                         <!-- Button trigger modal -->
                      <button type="button" class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                      </button>
                      <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                  

                    </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/tambahuser')}}" method="POST" id="tambahUser" >
          @csrf
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama User</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Username</label>
            <input name="username" type="text" class="form-control" id="exampleFormControlInput1" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input name="email" type="text" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Password </label>
            <input name="password" type="password" class="form-control" id="exampleFormControlInput1">
          </div>
        
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="tambahUser" class="btn btn-primary">Tambah User</button>
      </div>
    </div>
  </div>
</div>

  <!-- Button trigger modal -->
  @foreach ($users as $user)
        <!-- Modal -->
  <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit data {{ $user->id }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ url('/edituser').'/'.$user->id}}" method="POST" id="editUser{{ $user->id }}" >
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama User</label>
              <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $user->NAMA_USER }}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Username</label>
              <input name="username" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $user->USERNAME }}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Email</label>
              <input name="email" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $user->email }}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Password *Ganti password</label>
              <input name="password" type="password" class="form-control" id="exampleFormControlInput1" value="">
            </div>
          
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="editUser{{ $user->id }}">Save changes</button>
        </div>
      </div>
    </div>
  </div>


    {{-- DELETE --}}

    <div class="modal fade" id="HapusMenu{{ $user->id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <a>Apakah anda yakin ingin menghapus ?</a>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="{{ url('/deleteuser').'/'. $user->id }}">
                <button type="button" class="btn btn-danger">Delete</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  @endforeach



  @include('partials.jsdatatables')
  <script type="text/javascript">
    $(document).ready(function () {
       $('#tbl_list').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/karyawanData') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'NAMA_USER', name: 'nama_user' },
                { data: 'USERNAME', name: 'username' },
                { data: 'email', name: 'email' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
        
            ]
        });
     });
    </script>
@endsection



