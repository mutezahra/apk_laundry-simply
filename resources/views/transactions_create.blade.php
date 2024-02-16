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
          <li class="breadcrumb-item active">Transactions Page</li>
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
      <h3 class="card-title">Tambah Data Transactions</h3>

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
      <form action ="{{ route('transactions.store') }}"  method="POST">
        @csrf
        <div class ="form-group">
            <label>Nomor Unik</label>
            <input name="nomor_unik" type="number" class="form-control" placeholder="..."
            value="{{ random_int(1000000000, 9999999999)}}">
            @error('nomor_unik')
             <p>{{ $message }}</p>
            @enderror
        </div>


        <div class ="form-group">
            <label>Nama Pelanggan</label>
            <input name="nama_pelanggan" type="text" class="form-control" placeholder="...">
            @error('nama_pelanggan')
             <p>{{ $message }}</p>
            @enderror
        </div>

        <div class ="form-group">
            <label>Nama Produk + Harga</label>
            <select id="id_produk" name="id_produk" class="form-control" required>
                <option value="">- Pilih Produk -</option>
                @foreach ($productsM as $data)
                <option value="{{ $data->id}}" data-harga="{{ $data->harga_produk }}">
                  {{ $data->nama_produk }} - {{ $data->harga_produk }}
              </option>
              
                @endforeach
            </select>
            @error('id_produk')
             <p>{{ $message }}</p>
            @enderror
        </div>

        <div class ="form-group">
            <label>Kilogram</label>
            <input name="kilogram" type="text" class="form-control" placeholder="...">
            @error('kilogram')
             <p>{{ $message }}</p>
            @enderror
        </div>  

        <div class ="form-group">
          <label>Uang Bayar</label>
          <input name="uang_bayar" type="number" class="form-control" placeholder="...">
          @error('uang_bayar')
           <p>{{ $message }}</p>
          @enderror
      </div>

      {{-- <div class="form-group">
        <label>Uang Kembali</label>
        <input name="uang_kembali" id="uang_kembali" type="text" class="form-control" readonly Rp.(number_format)>
        @error('uang_bayar')
        <p>{{ $message }}</p>
       @enderror
    </div> --}}
        <input type="submit" name="submit" class="btn btn-success" value="Tambah"/> 
      </form>

      <script>
        // Menangkap peristiwa perubahan pada input uang bayar
        document.getElementById('uang_bayar').addEventListener('input', function() {
            // Mengambil nilai uang bayar dari input
            var uangBayar = parseFloat(this.value) || 0; // Konversi ke float atau gunakan nilai 0 jika tidak valid
      
            // Mengambil nilai harga_produk dari koleksi produk (gantilah dengan nilai yang sesuai)
            var hargaProduk = parseFloat({{ $data->first()->harga_produk }}) || 0;
      
            // Menghitung uang kembali
            var uangKembali = uangBayar - hargaProduk;
      
            // Menetapkan nilai uang kembali ke input
            document.getElementById('uang_kembali').value = uangKembali.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
        });
      </script>
</section>
<!-- /.content -->
<script>
  // Function untuk menghitung uang kembali
  function hitungUangKembali() {
    // Ambil nilai uang bayar
    var uangBayar = parseFloat(document.getElementById('uang_bayar').value);

    // Ambil harga produk
    var hargaProduk = parseFloat(document.getElementById('id_produk').selectedOptions[0].getAttribute('data-harga'));

    // Hitung uang kembali
    var uangKembali = uangBayar - hargaProduk;

    // Tampilkan hasil pada input uang_kembali
    document.getElementById('uang_kembali').value = isNaN(uangKembali) ? '' : uangKembali.toFixed(2);
  }

  // Panggil fungsi hitungUangKembali setiap kali ada perubahan pada input uang_bayar atau id_produk
  document.getElementById('uang_bayar').addEventListener('input', hitungUangKembali);
  document.getElementById('id_produk').addEventListener('change', hitungUangKembali);
</script>
@endsection




