@extends('adminlte')
 @section('content')

    <!-- Content Header (Page header) -->
    <title>Berbaju Laundry | {{ $subtitle }}</title>
  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaksi</h1>
          </div>
        </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Transaksi</h3>
        </div>


        <!-- /.card-body -->
        <div class="card-body">

          {{-- <form action="{{ route('transactions.index') }}" method="get">
            <div class="input-group">
              <input type="search" name="search" class="form-control" placeholder="Masukan Produk Atau Tanggal" value="{{$vcari}}">
              
              <button type="submit" class="btn btn-primary">Cari</button>
             <a href="{{url('transactions')}}">
                <button type="button" class="btn btn-danger">Reset</button>
             </a>
            </div>
            </form> --}}
          {{-- <form action="{{ route('products.index') }}" method="get">
            <div class="input-group">
              <input type="search" name="search" class="form-control" placeholder="Masukan Nama Produk" value="{{$vcari}}">
              <button type="submit" class="btn btn-primary">Cari</button>
             <a href="{{url('products')}}">
                <button type="button" class="btn btn-danger">Reset</button>
             </a>
            </div>
            </form> --}}
            <br>
          @if (Auth::user()->role == 'kasir')
          <a href="{{route('transactions.create')}}" class="btn btn-success">Tambah Transaksi</a>
          @endif
         
        
          <br><br>
          @if ($message = Session::get('success'))
          <div class="alert alert-success">{{ $message }}</div>
          @endif
          <table class="table table-striped table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nomor Unik</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga Produk</th>
                <th scope="col">Uang Bayar</th>
                <th scope="col">Uang Kembali</th>
                <th scope="col">Tanggal</th>
                @if (Auth::user()->role !== 'owner')
                <th scope="col">Aksi</th>
                @endif
              </tr>
            </thead>
            @if(count($transactionsM) >0) 
            @foreach($transactionsM as $data)
            <tr>
                <td>{{ $data->nomor_unik }}</td>
                <td>{{ $data->nama_pelanggan }}</td>
                <td>{{ $data->nama_produk }}</td>
                <td>{{ $data->harga_produk }}</td>
                <td>{{ $data->uang_bayar }}</td>
                <td>{{ $data->uang_kembali }}</td>
                <td>{{ $data->created_at }}</td>
              
              <td> 
                @if (Auth::user()->role == 'kasir')
                <a href="{{ route('transactions.pdf', $data->id_trans) }}" class="btn-xs btn-info"> <i class="fas fa-print">Cetak</i> 
              </a>
              @endif
          
          
                @if (Auth::user()->role == 'admin')
             
                  <a href="{{ route('transactions.edit', $data->id_trans) }}" class="btn btn-xs btn-outline-warning">
                      <i class="fas fa-pencil-alt"></i> 
                  </a>

                  <!-- Button untuk memunculkan modal konfirmasi -->
              <button type="button" class="btn btn-xs btn-outline-danger" data-toggle="modal" data-target="#deleteProductModal">
                    <i class="fas fa-trash-alt"></i>
                </button>

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
              <form action="{{ route('transactions.delete', $data->id_trans) }}" method="POST" style="display: inline;">
              
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
                @endif


               
          </div>
      </div>
  </div>
</div>         
              </td>
            </tr>
        @endforeach
        @else
        <tr>
          <tr>
            <td colspan="8" style="text-align: center; vertical-align: middle;"> Data Tidak Ditemukan</td>
        </tr>
        </tr>   
        @endif
           </table>

        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  @endsection('content')