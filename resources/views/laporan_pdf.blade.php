<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Transaksi</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>

    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h3 {
            text-align: center;
            background-color: ;
            color: #000000;
            padding: 10px;
        }

        table {
            width: 100%;
            border: 1px solid #000000;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000000;
            padding: 5px;
            font-size: 10px
        }

        th {
            background-color: #ffffff;
            color: #0000000;
        }

        tr:nth-child(even) {
            background-color: #ffffff; /* Warna latar belakang baris genap */
        }

        tr:hover {
            background-color: #000000;
        }
    </style>
</head>
<body>
    <h3>Laporan Transaksi</h3>
    <table id="myTable">
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
    </table>
    <br>
   

  

    <br><br> 
    <div class="signature">
        <p>____________________</p>
        <p>Ceo . </p>
        <canvas id="signatureCanvas" width="300" height="100"></canvas>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
