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
          <li class="breadcrumb-item active">Edit User Page</li>
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
      <h3 class="card-title">Edit Data User</h3>

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
      <form action ="{{ route('users.update', $users->id) }}"  method="POST">
        @csrf
        @method('put')
        <div class ="form-group">
            <label>Username</label>
            <input name="username" type="text" class="form-control" placeholder="..." value="{{ $users->username}}">
            @error('username')
             <p>{{ $message }}</p>
            @enderror
        </div>
        <div class ="form-group">
            <label>Nama Lengkap</label>
            <input name="name" type="text" class="form-control" placeholder="..." value="{{ $users->name}}">
            @error('name')
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
  
        <input type="submit" name="submit" class="btn btn-success" value="Edit"/> 
      </form>
    <!-- /.card-body -->
    <!-- /.card-footer-->
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection