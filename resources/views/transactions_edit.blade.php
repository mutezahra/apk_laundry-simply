@extends('adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Transactions Pages</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">transactions</a></li>
          <li class="breadcrumb-item active">Edit Transactions Page</li>
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
      <h3 class="card-title">Edit Transactions</h3>

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
      <a href="{{ route('transactions.index') }}" 
      class="btn btn-default">Kembali</a>
      <br><br>
      <form action ="{{ route('transactions.update', $transactionsM->id) }}"  method="POST">
        @csrf
        @method('put')
        <div class ="form-group">
            <label>Nomor Unik</label>
            <input name="nomor_unik" type="number" class="form-control" placeholder="..."
            value="{{ $transactionsM->nomor_unik }}" readonly>
            @error('nomor_unik')
             <p>{{ $message }}</p>
            @enderror
        </div>

        <div class ="form-group">
            <label>Nama Pelanggan</label>
            <input name="nama_pelanggan" type="text" class="form-control" placeholder="..."
            value="{{ $transactionsM->nama_pelanggan }}">
            @error('nama_pelanggan')
             <p>{{ $message }}</p>
            @enderror
        </div>

        <div class ="form-group">
            <label>Nama Produk + Harga</label>
            <select name="id_produk" class="form-control" required>
                <option value="">- Pilih Produk -</option>
                @foreach ($productsM as $data)
                <?php
                if ($data->id == $transactionsM->id_produk):
                     $selected = "selected";
                else :
                     $selected = "";
                endif;
                ?>
                <option {{ $selected }} value="{{ $data->id}}">
                    {{ $data->nama_produk }} - {{ $data->harga_produk }}
                </option>
                @endforeach
            </select>
            @error('id_produk')
             <p>{{ $message }}</p>
            @enderror
        </div>

        <div class ="form-group">
            <label>Uang Bayar</label>
            <input name="uang_bayar" type="number" class="form-control" placeholder="..."
            value="{{ $transactionsM->uang_bayar }}">
            @error('uang_bayar')
             <p>{{ $message }}</p>
            @enderror
        </div>

        <input type="submit" name="submit" class="btn btn-success" value="Tambah"/> 
      </form>
</section>
<!-- /.content -->
@endsection