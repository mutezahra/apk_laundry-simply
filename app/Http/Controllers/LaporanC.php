<?php

namespace App\Http\Controllers;


use App\Models\ProductsM;
use Illuminate\Http\Request;
use App\Models\TransactionsM;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;

class LaporanC extends Controller
{
    public function index(Request $request) {

        $user = Auth::user();
        $subtitle = "Daftar Aktivity";
        $data = TransactionsM::with('products')->get();
     
        return view('laporan',compact('user','subtitle','data'));
      
    
        
    }


    public function filter(Request $request)
    {
        $subtitle = "Filter Transaksi";
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $data = TransactionsM::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->get();

        return view('laporan', compact('subtitle','data' ,'startDate','endDate'));

    }

public function export(Request $request)
{
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');

    if ($startDate && $endDate) {
        $data = TransactionsM::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->get();
    } else {
        $data = TransactionsM::all();
    }

    $pdf = PDF::loadView('laporan_pdf', compact('data', 'startDate', 'endDate'));
    return $pdf->stream();
}

}
