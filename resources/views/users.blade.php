@extends('adminlte')
@section('content')
    <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Pages</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li> --}}
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data User</h3>

        
      </div>
      <div class="card-body">
        {{-- <form action="{{ route('products.index') }}" method="get">
        <div class="input-group">
          <input type="search" name="search" class="form-control" placeholder="Search" value="{{$vcari}}">
          <button type="submit" class="btn btn-primary">Search</button>

          <a href="{{ route('products.index')}}">
            <button type="button" class="btn btn-danger">Reset</button>
        </div>
        </form> --}}
        
        @if($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
        @endif
        <a href="{{ route('users.create') }}" class="btn btn-success">Tambah Data +</a>
        {{-- <a href="{{ url('products/PDF') }}" class="btn btn-warning">Print FDF</a> --}}
        <br><br>
        <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Role</th>
            <th>Aksi</th>

          </tr>
        </thead>
          @if (count ($users) > 0)
          @foreach ($users as $data)
          <tr>    
            <td>{{ $data->username }}</td> 
            <td>{{ $data->name }}</td>
            <td>{{ $data->role }}</td> 

            <td>
              <a href="{{ route('users.edit', $data->id) }}" class="btn btn-xs btn-outline-warning">
                <i class="fas fa-pencil-alt"></i> 
            </a>


            <!-- Button untuk memunculkan modal konfirmasi -->
        <button type="button" class="btn btn-xs btn-outline-danger" data-toggle="modal" data-target="#deleteProductModal">
   <i class="fas fa-trash-alt"></i>
</button>

<a href="{{ route('users.changepassword', $data->id) }}" class="btn btn-xs btn-outline-warning">
  <i class="fas fa-lock"></i> Change Password
</a>


<!-- Modal konfirmasi -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        Apakah Anda yakin ingin menghapus produk ini?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <form action="{{ route('users.destroy', $data->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</div>
</div>
</div>

            
           
        </td>
                  
          </tr>    
          @endforeach
          @else
          <tr>
            <td colspan="5">Data tidak ditemukan</td>
          </tr>
          @endif
        </table>  
      
      </div>
      </div>
      <!-- /.card-footer-->
    
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection