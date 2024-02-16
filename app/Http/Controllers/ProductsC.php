<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsM;
use App\Models\LogM;
use Illuminate\Support\Facades\Auth;

class ProductsC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LogM = LogM::create([
            'id_user'=>Auth::user()->id,
            'activity'=> 'User Melihat Halaman Produk'

        ]);
        
        $subtitle = "Daftar Produk";
        $productsM = ProductsM::search(request('search'))->paginate(10);
        $vcari= request('search');
       
        return view('products', compact('subtitle','productsM','vcari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $LogM = LogM::create([
            'id_user'=>Auth::user()->id,
            'activity'=> 'User Berada Di Halaman Tambah Produk'

        ]);
        // LogM::activity("User Membuat  Data  Produk");
        $subtitle = "Tambah Data Produk";
        return view('products_create', compact('subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        $LogM = LogM::create([
            'id_user'=>Auth::user()->id,
            'activity'=> 'User Memperosess Produk'

        ]);
        $request->validate([
            'nama_produk'=> 'required',
            'harga_produk'=> 'required',  
        ]);

        ProductsM::create($request->post());
        return redirect()->route('products.index')->with('success', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {

        $LogM = LogM::create([
            'id_user'=>Auth::user()->id,
            'activity'=> 'User Melihat Produk'

        ]);
        $productsM = ProductsM::find($id);
        return view ('products_edit', compact('productsM'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $LogM = LogM::create([
            'id_user'=>Auth::user()->id,
            'activity'=> 'User Mengedit Produk'

        ]);
        $subtitle = "Daftar Edit";
        $products = ProductsM::find($id);
        return view ('products_edit', compact('products','subtitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $LogM = LogM::create([
            'id_user'=>Auth::user()->id,
            'activity'=> 'User Memperoses Produk'

        ]);

        $request->validate([
            'nama_produk'=> 'required',
            'harga_produk'=> 'required',
            
        ]);

        $data = request()->except(['_token', '_method', 'submit']);

        ProductsM::where('id',$id)->update($data);
        return redirect()->route('products.index')->with('success', 'Produk Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $LogM = LogM::create([
            'id_user'=>Auth::user()->id,
            'activity'=> 'User Menghapus Produk'

        ]);

     
        ProductsM::where('id',$id)->delete();
        return redirect()->route('products.index')->with('success', 'Produk Berhasil Dihapus');
        
    }
}
