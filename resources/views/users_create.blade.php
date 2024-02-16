@extends('adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard Pages</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">User Page</li>
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
      <h3 class="card-title">Tambah Data User</h3>

      <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
      </div>
    </div>
    <div class="card-body">
      <a href="{{ route('users.index') }}" 
      class="btn btn-default">Kembali</a>
      <br><br>
      <form action ="{{ route('users.store') }}"  method="POST">
        @csrf
        <div class ="form-group">
            <label>Username</label>
            <input name="username" type="text" class="form-control" placeholder="...">
            @error('username')
             <p>{{ $message }}</p>
            @enderror
        </div>

        <div class ="form-group">
            <label>Nama Lengkap</label>
            <input name="name" type="text" class="form-control" placeholder="...">
            @error('name')
             <p>{{ $message }}</p>
            @enderror
        </div>

        <div class ="form-group">
          <label>Password</label>
          <input name="password" type="password" class="form-control" placeholder="...">
          @error('password')
           <p>{{ $message }}</p>
          @enderror
        </div>

        <div class ="form-group">
          <label>Ulangi Password</label>
          <input name="password_confirm" type="password" class="form-control" placeholder="...">
          @error('password_confirm')
           <p>{{ $message }}</p>
          @enderror
      </div>

        <div class ="form-group">
          <label>Role</label>
          <select name="role" class="form-control">
              <option>-Pilih Role Anda-</option>
              <option value="admin">Admin</option>
              <option value="owner">Owner</option>
              <option value="kasir">Kasir</option>
          </select>
          @error('role')
           <p>{{ $message }}</p>
          @enderror
      </div>

        
        {{-- <div class ="form-group">
            <label>Nama Produk + Harga</label>
            <select name="id_produk" class="form-control" required>
                <option value="">- Pilih Produk -</option>
                @foreach ($usersM as $data)
                <option value="{{ $data->id}}">
                    {{ $data->nama_produk }} - {{ $data->harga_produk }}
                </option>
                @endforeach
            </select>
            @error('id_produk')
             <p>{{ $message }}</p>
            @enderror
        </div> --}}

        <input type="submit" name="submit" class="btn btn-success" value="Tambah"/> 
      </form>
</section>
<!-- /.content -->
@endsection