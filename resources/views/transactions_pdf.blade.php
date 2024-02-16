<!DOCTYPE html>
<html>
<head>
  <title>Berbaju Laundry</title>
  <style>
    body {
      font-family: "Arial, sans-serif";
      width: 300px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f4f4f4;
    }
    .header {
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
      text-transform: uppercase;
    }
    .sub-header {
      text-align: center;
      font-size: 18px;
      margin-bottom: 20px;
      color: #333;
      text-transform: uppercase;
    }
    .transaction-info {
      font-size: 14px;
      margin-bottom: 10px;
      background-color: #5a5252;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }
    .transaction-info p {
      margin: 5px 0;
    }
    .transaction-info .total {
      font-weight: bold;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="header">
    BerLAUNDRY 
  </div>
  <div class="sub-header">
    Struk Transaksi
  </div>
  <p>Tanggal: <?php echo date("Y-m-d"); ?></p>
  <p>Nama Kasir: {{ Auth::user()->name }}</p>

  @foreach ($TransactionsM as $transactions)
    <div class="transaction-info">
      <p>No Unik: {{ $transactions->nomor_unik }}</p>
      <p>Nama Pelanggan: {{ $transactions->nama_pelanggan }}</p>
      <p>Nama Produk: {{ $transactions->nama_produk }}</p>
      <p>Harga Produk: {{ $transactions->harga_produk }}</p>
      <p>Tanggal Beli: {{ $transactions->created_at }}</p>
    </div>
  @endforeach
  <div class="transaction-info total">
    <p>Uang Bayar: {{ $transactions->uang_bayar }}</p>
    <p>Uang Kembali: {{ $transactions->uang_kembali }}</p>
  </div>
  <div class="sub-header">
    Terima Kasih Telah Berbelanja
  </div>
</body>
</html>
