@extends('template.main')
{{-- @include('partials.cssdatatables') --}}

@section('container') 


<main class="py-4">
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                
                <div class="card-body">
                    <button type="button" class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#tambahMenu">
                      Tambah Data
                    </button>
                  
                      <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>Nama Menu</th>
                              <th>Link</th>
                              <th>Logo</th>
                              <th>Status</th>
                              <th>Level</th>
                              <th>Aksi</th>
                    
  
                          </tr>
                      </thead>
                    </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Button trigger modal -->
</main>
<!-- Modal -->
<div class="modal fade" id="tambahMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/tambahmenu')}}" method="POST" id="tambahUser" >
          @csrf
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama Menu</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">link</label>
            <input name="link" type="text" class="form-control" id="exampleFormControlInput1" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">logo</label>
            <input name="icon" type="text" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select name="status" class="form-control" id="exampleFormControlSelect1">
              <option>Active</option>
              <option>Nonactive</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Level</label>
            <select name="level" class="form-control" id="exampleFormControlSelect1">
              <option>1</option>
              <option>2</option>
            </select>
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


  @foreach ($allMenus as $detailMenu)
        <!-- EDIT -->
  <div class="modal fade" id="editMenu{{ $detailMenu->MENU_ID  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit data {{ $detailMenu->MENU_ID  }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/editdatamenu').'/'.$detailMenu->MENU_ID}}" method="POST" id="editmenuform{{ $detailMenu->MENU_ID }}" >
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama Menu</label>
                  <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $detailMenu->MENU_NAME }}">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Link</label>
                  <input name="link" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $detailMenu->MENU_LINK }}">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Logo</label>
                  <input name="icon" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $detailMenu->MENU_ICON }}">
                </div>
                @php
                
                    if ( $detailMenu->STATUS_MENU=="Active") {
                        $status = array(["Active","Nonactive"]);
                    }else {
                        $status = array(["Nonactive","Active"]);
                    }  
         
                @endphp
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Status</label>
                  <select name="status" class="form-control" id="exampleFormControlSelect1">  
                    @php
                        for ($i=0; $i < 2; $i++) { 
                            # code...
                        
                    @endphp     
                       <option>{{ $status[0][$i] }}</option>
                    @php
                        }
                       @endphp
                 </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Level</label>
                  <select name="level" class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                  </select>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="Submit" class="btn btn-primary" form="editmenuform{{$detailMenu->MENU_ID}}">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{-- DELETE --}}

  <div class="modal fade" id="HapusMenu{{ $detailMenu->MENU_ID  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a href="{{ url('/deletemenu').'/'. $detailMenu->MENU_ID }}">
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
            ajax: '{{ url('/DataMenu') }}',
            columns: [
                { data: 'MENU_NAME', name: 'nama_menu' },
                { data: 'MENU_LINK', name: 'menu_link' },
                { data: 'MENU_ICON', name: 'menu_icon' },
                { data: 'STATUS_MENU', name: 'status_menu' },
                { data: 'ID_LEVEL', name: 'status_menu' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
        
            ]
        });
     });
    </script>


@endsection



