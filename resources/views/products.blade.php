@extends('adminlte')
 @section('content')

    <!-- Content Header (Page header) -->
    <title>Berbaju Laundry | {{ $subtitle }}</title>
  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
        </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Produk</h3>
        </div>
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">


        <!-- /.card-body -->
        <div class="card-body">
          @if (Auth::user()->role == 'owner')
          <form action="{{ route('products.index') }}" method="get">
            <div class="input-group">
              <input type="search" name="search" class="form-control" placeholder="Masukan Nama Produk" value="{{$vcari}}">
              <button type="submit" class="btn btn-primary">Cari</button>
             <a href="{{url('products')}}">
                <button type="button" class="btn btn-danger">Reset</button>
             </a>
            </div>
            </form>
          @endif

          
            <br>
          @if (Auth::user()->role == 'admin')
          <a href="{{route('products.create')}}" class="btn btn-success">Tambah Produk</a>
          @endif
          {{-- <a href="{{ url('products/pdf') }}" class="btn btn-warning">
            <i class="fas fa-print"></i> Print PDF --}}
        </a>
        
          <br><br>
          @if ($message = Session::get('success'))
          <div class="alert alert-success">{{ $message }}</div>
          @endif
          <table id="myTable"class="cell-border" style="width:100%">
            <thead class="thead-dark">
              <tr>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                @if (Auth::user()->role == 'admin')
                <th scope="col">Aksi</th>
                @endif
              </tr>
            </thead>
            @if(count($productsM) >0) 
            @foreach($productsM as $products)
            <tr>
                <td>{{ $products->nama_produk }}</td>
                <td>{{ $products->harga_produk }}</td>
               
                @if (Auth::user()->role == 'admin')
                <td>
                  <a href="{{ route('products.edit', $products->id) }}" class="btn btn-xs btn-outline-warning">
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
              <form action="{{ route('products.destroy', $products->id) }}" method="POST" style="display: inline;">
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
            <td colspan="5" style="text-align: center; vertical-align: middle;"> Data Tidak Ditemukan</td>
        </tr>
        </tr>   
        @endif
           </table>
           <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
           <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
       
           
           <script type="text/javascript">
              $(document).ready(function() {
                   $('#myTable').DataTable();
               });
           </script>
           <br>
        
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  @endsection('content')