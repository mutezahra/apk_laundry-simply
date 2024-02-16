@extends('adminlte')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>PetShop Lontar | Password</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
  
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Ganti Password</h3>
  
          </div>
          <div class="card-body">
            <a href="{{ route('users.index') }}" class="btn btn-outline-info">Kembali</a>
            <br><br>

            <form action="{{ route('users.change', $data->id) }}" method="POST">
            @csrf
            @method('put')
                <div class="form-group">
                    <label>User Name</label>
                    <input name="username" type="text" class="form-control" placeholder="..." value="{{ $data->username }}" readonly>
                    @error('username')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label>Password Lama</label>
                    <input name="passwor_old" type="password" class="form-control" placeholder="...">
                    @error('passwor_old')
                    <p>{{ $message }}</p>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label>Password Baru</label>
                    <input name="password_new" type="password" class="form-control" placeholder="">
                    @error('password_new')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Ulangi Password Baru</label>
                    <input name="password_confirm" type="password" class="form-control" placeholder="">
                    @error('password_confirm')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                
                <input type="submit" name="submit" class="btn btn-dark" value="Simpan">
            </form>
          </div>
        </div>
        <!-- /.card -->
  
      </section>
      <!-- /.content -->
@endsection