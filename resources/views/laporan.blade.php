@extends('adminlte')
@section('content')

<title>Berbaju Laundry | {{ $subtitle }}</title>
  
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Laporan Pages</h1>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <form action="{{ route('laporan.filter', ['startDate' => '2024-01-01', 'endDate' => '2024-12-31']) }}" method="GET">
    <div class="form-row">
      <div class="form-group col-md-5">
        <label for="startDate">Tanggal Awal:</label>
        <input type="date" name="startDate" id="startDate" class="form-control">
      </div>
      <div class="form-group col-md-5">
        <label for="endDate">sampai</label>
        <input type="date" name="endDate" id="endDate" class="form-control">
      </div>
      <div class="form-group col-md-4">
        <button type="submit" class="btn btn-primary">Cari Data</button>
        <button type="button" class="btn btn-info btn-close" onclick="cancelFilter()">Cancel</button>
      </div>
    </div>
  </form>
  <div class="d-flex justify-content-between align-items-center col-md-4">
    @if(request()->has('startDate') && request()->has('endDate'))
    <a href="{{ route('laporan.export', ['startDate' => request('startDate'), 'endDate' => request('endDate')]) }}" class="btn btn-secondary">Export PDF</a>
    @else
    <a href="{{ route('laporan.export') }}" class="btn btn-secondary">Export PDF</a>
    @endif
  </div>

  @if(isset($data) && $data->count() > 0) <!-- Check if there is filtered data -->
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Produk</h3>
    </div>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <table class="table table-bordered text-nowrap" id="myTable" cellspacing="0">
      <thead>
        <tr>
          <th>Nomor Unik</th>
          <th>Nama Pelanggan</th>
          <th>Nama Produk</th>
          <th>Harga Produk</th>
          <th>Uang Bayar</th>
          <th>Uang Kembali</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor_unik = 1; // Initialize $nomor_unik ?>
      
        @foreach ($data as $p)
        <tr>
          <td>{{ $p->nomor_unik }}</td>
          <td>{{ $p->nama_pelanggan }}</td>
          <td>{{ $p->products->nama_produk }}</td>
          <td>{{ $p->products->harga_produk }}</td>
          <td>{{ $p->uang_bayar }}</td>
          <td>{{ $p->uang_kembali }}</td>
          <td>{{ $p->created_at }}</td>
        </tr>
       
        @endforeach
      </tbody>
      {{-- <tfoot>
        <tr>
          <th colspan="6">Total Pendapatan</th>
          <th id="total-harga">{{ number_format($grandTotal, 0, ',', '.') }}</th>
        </tr>
      </tfoot> --}}
    </table>
    <br>
  </div>
  <!-- /.card-footer-->
  </div>
  <!-- /.card -->
  @elseif(request()->has('startDate') && request()->has('endDate'))
  <p class="mt-3">Tidak ada data yang sesuai dengan filter.</p>
  @endif
</section>
<!-- /.content -->

@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
      $('#myTable').DataTable();
  });
</script>

<script>
function cancelFilter() {
  // Clear the input fields
  document.getElementById('startDate').value = '';
  document.getElementById('endDate').value = '';

  // Redirect to the laporan index page
  window.location.href = "{{ route('laporan.index') }}";
}
</script>

</script>

<script type="text/javascript">
  $(document).ready(function () {
      // Initialize DataTable
      var table = $('#myTable').DataTable();
      
      // Initialize total variables
      var totalHarga = 0;
    

      // Loop through each row in the DataTable
      table.rows().every(function () {
          var qty = parseFloat(this.data()[5]); // Assuming 'Qty' is in the 6th column
          var hargaProduk = parseFloat(this.data()[6].replace('Rp. ', '').replace(',', '')) || 0; // Assuming 'Harga Produk' is in the 7th column
          var totalHargaProduk = qty * hargaProduk;

          // Increment totalHarga and totalBanyakTransaksi
          totalHarga += totalHargaProduk;
         
      });


  });
</script>