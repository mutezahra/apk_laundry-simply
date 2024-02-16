@extends('adminlte')
 @section('content')

    <!-- Content Header (Page header) -->
    <title>Berbaju Laundry | {{ $subtitle }}</title>
  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Log Pages</h1>
          </div>
        </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
      

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Log</h3>
        </div>


        <!-- /.card-body -->
        <div class="card-body">
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
         
     
          {{-- <a href="{{ url('products/pdf') }}" class="btn btn-warning">
            <i class="fas fa-print"></i> Print PDF --}}
        </a>
        
         
          @if ($message = Session::get('success'))
          <div class="alert alert-success">{{ $message }}</div>
          @endif
          <table class="table table-striped table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nama User</th>
                <th scope="col">Activity</th>
                <th scope="col">Tanggal & Waktu</th>
              </tr>
            </thead>
           
            @foreach($logM as $log)
            <tr>
                <td>{{ $log->name }}</td>
                <td>{{ $log->activity }}</td>
                <td>{{ $log->created_at }}</td>
            
            </tr>
        @endforeach
      
        
           </table>
           <br>
            <div class="text-right">


           {{ $logM->links() }}
        
            </div>
        </div>
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  @endsection('content')