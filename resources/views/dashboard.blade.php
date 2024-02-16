@extends('adminlte')
 @section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard Pages</h1>
          </div>
        </div>
        </div>
    </section>

    
     <!-- Main content -->
     <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Products</span>
                      <span class="info-box-number">
                        10
                        <small>items</small>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Transactions</span>
                      <span class="info-box-number">50
                        <small>tr</small>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
      
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
      
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Income</span>
                      <span class="info-box-number">
                        500.000
                        <small>Rupiah</small>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Members</span>
                      <span class="info-box-number">5
                        <small>Person</small>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Income</h3>
                    <a href="javascript:void(0);">View Report</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span class="text-bold text-lg">820</span>
                      <span>Transactions</span>
                    </p>
                    
                  </div>
                  <!-- /.d-flex -->
  
                  <div class="position-relative mb-4">
                    <canvas id="visitors-chart" height="200"></canvas>
                  </div>
  
                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> This Week
                    </span>
  
                    
                  </div>
                </div>
              </div>
              <!-- /.card -->
  
              
              <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Products</h3>
                    <a href="javascript:void(0);">View Report</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column"> 
                      <span class="text-bold text-lg">Rp.18,230.00</span>
                      <span>Products</span>
                    </p>
                   
                  </div>
                  <!-- /.d-flex -->
  
                  <div class="position-relative mb-4">
                    <canvas id="sales-chart" height="200"></canvas>
                  </div>
  
                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> This year
                    </span>
  
                   
                </div>
              </div>
              <!-- /.card -->
  
             
                  <!-- /.d-flex -->
                
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
  <!-- /.content-wrapper -->

<script src="{{('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{('dist/js/pages/dashboard3.js')}}"></script>
  @endsection('content')