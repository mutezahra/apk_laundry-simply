@extends('adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Products Pages</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Edit Products</a></li>
          <li class="breadcrumb-item active">Produk Page</li>
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
      <h3 class="card-title">Edit Data Produk</h3>

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
      <a href="{{ route('products.index') }}" 
      class="btn btn-default">Kembali</a>
      <br><br>
      <form action ="{{ route('products.update', $products->id) }}"  method="POST">
        @csrf
        @method('put')
        <div class ="form-group">
            <label>Nama Produk</label>
            <input name="nama_produk" type="text" class="form-control" placeholder="..." value="{{ $products->nama_produk}}">
            @error('nama_produk')
             <p>{{ $message }}</p>
            @enderror
        </div>
        <div class ="form-group">
            <label>Harga Produk</label>
            <input name="harga_produk" type="text" class="form-control" placeholder="..." value="{{ $products->harga_produk}}">
            @error('harga_produk')
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