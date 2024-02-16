<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\ProductsM;
use App\Models\TransactionsM;
use App\Models\LogM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransactionsC extends Controller
{
    public function index(){
        $subtitle = "Daftar Transaksi Produk";
    
        // Melakukan query dan join terlebih dahulu
        $query = TransactionsM::select('transactions.*', 'products.*', 'transactions.id AS id_trans')
            ->join('products', 'products.id', '=', 'transactions.id_produk');
    
        // Melakukan pencarian jika ada input pencarian
        if (request('search')) {
            $query->search(request('search'));
        }
    
        // Menjalankan query dan menggunakan paginate()
        $transactionsM = $query->paginate(10);
    
        $vcari = request('search');
        return view ('transactions', compact('subtitle', 'transactionsM', 'vcari'));
    }
    
    public function create(){
        $subtitle = "Tambah Transaksi Produk";
        $productsM = ProductsM::all();
        return view('transactions_create', compact('subtitle', 'productsM'));
    }

    public function store(Request $request){
        $request->validate([
            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'id_produk' => 'required',
            'kilogram' => 'required',
        ]);
    
        $product = ProductsM::find($request->input('id_produk'));
        $hargaProduk = $product->harga_produk;
    
        $transactions = new TransactionsM;
        $transactions->nomor_unik = $request->input('nomor_unik');
        $transactions->nama_pelanggan = $request->input('nama_pelanggan');
        $transactions->kilogram = $request->input('kilogram');
        $transactions->id_produk = $request->input('id_produk');
        $transactions->uang_bayar = $request->input('uang_bayar');
        $transactions->uang_kembali = $request->input('uang_bayar') - $hargaProduk;
        $transactions->save();
    
        return redirect()->route('transactions.index')->with('success', 'Transaksi Berhasil Ditambahkan');
    }
    
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nomor_unik' => 'required',
    //         'nama_pelanggan' => 'required',
    //         'id_produk' => 'required',
    //         'uang_bayar' => 'required',
    //     ]);
    
    //     $product = ProductsM::find($request->input('id_produk'));
    //     $hargaProduk = $product->harga_produk;
    
    //     $transactions = TransactionsM::find($id);
    //     $transactions->nomor_unik = $request->input('nomor_unik');
    //     $transactions->nama_pelanggan = $request->input('nama_pelanggan');
    //     $transactions->id_produk = $request->input('id_produk');
    //     $transactions->uang_bayar = $request->input('uang_bayar');
    //     $transactions->uang_kembali = $request->input('uang_bayar') - $hargaProduk;
    //     $transactions->save();
    
    //     return redirect()->route('transactions.index')->with('success', 'Data Transaksi Berhasil Diperbaharui');
    // }
    

    public function edit($id)
    {

        $subtitle = "Edit Transaksi Produk";
        $transactionsM = TransactionsM::find($id);
        $productsM = ProductsM::all();
        return view('transactions_edit', compact('subtitle', 'productsM', 'transactionsM'));
    }

    public function update(Request $request, $id)
    {
        $products = ProductsM::where("id", $request->input('id_produk'))->first();
        $request->validate([

            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'id_produk' => 'required',
            'uang_bayar' => 'required',
        ]);
        $transactions = TransactionsM::find($id);
        $transactions ->nomor_unik = $request->input('nomor_unik');
        $transactions ->nama_pelanggan = $request->input('nama_pelanggan');
        $transactions ->id_produk = $request->input('id_produk');
        $transactions ->uang_bayar = $request->input('uang_bayar');
        $transactions ->uang_kembali = $request->input('uang_bayar') - $products->harga_produk;
        $transactions->save();

        return redirect()->route('transactions.index')->with('success', 'Data Transaksi Berhasil Diperbaharui');

    }

    public function delete($id)
    {
        TransactionsM::where('id', $id)->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi Berhasil Dihapus');
    }

//    public function pdf ($id) {
//     $LogM = LogM::create([
//         'id_user' => Auth::user()->id,
//         'activity' => 'user mencetak struk transaksi'
//     ]);
//     $t = TransactionsM::select('transactions.*', 'products.*', 'transactions.id AS id_trans', 'transactions.created_at AS tg')
//     ->join('products', 'products.id', '=', 'transactions.id_produk')
//     ->where('transactions.id', $id)->get();

//     $pdf = PDF::loadview('transactions_pdf', ['t' => $t]);
//     return $pdf->stream('trasanctions.pdf');
//    }
public function Pdf($id){
    $log = LogM::create([
        'id_user' =>Auth::user()->id,
        'activity' => 'user melihat halaman PDF Satu transaksi'
    ]);
    $TransactionsM = TransactionsM::select('transactions.*', 'products.*', 'transactions.id AS id_trans')
    ->join('products', 'products.id', '=', 'transactions.id_produk')->where('transactions.id',$id)->get();
    $pdf= Pdf ::loadView('transactions_pdf',['TransactionsM'=>$TransactionsM]);
   return $pdf->stream('transactions.pdf');

}



}
   
    
    
  


 


    




    // public function Pdf(){
    //     $transactionsM = TransactionsM::all();
    //     $productsM = ProductsM::all();
        
    //     // Menggabungkan data dari kedua model menjadi satu array
    //     $TransactionsPdf = [];
        
    //     foreach ($transactionsM as $data) {
    //         $TransactionsPdf[] = [
    //             'nomor_unik' => $data->nomor_unik,
    //             'nama_pelanggan' => $data->nama_pelanggan,
    //             'uang_bayar' => $data->uang_bayar,
    //             'uang_kembali' => $data->uang_kembali,
    //             'created_at' => $data->created_at,
    //         ];
    //     }
        
    //     foreach ($productsM as $products) {
    //         $TransactionsPdf[] = [
    //             'nama_produk' => $products->nama_produk,
    //             'harga_produk' => $products->harga_produk,
    //         ];
    //     }
        
    //     $pdf = PDF::loadView('transactions_pdf', ['TransactionsPdf' => $TransactionsPdf]);
        
    //     return $pdf->stream('transactions.pdf');
    // }
    
    

