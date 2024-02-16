<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class TransactionsM extends Model
{
    use HasFactory,Searchable;
    protected $table = "transactions";
    protected $fillable = ["id", "nama_pelanggan", "kilogram","nomor_unik", "uang_bayar", "uang_kembali"];


    public function searchableAs()
    {
        return 'transactions';
    }

    public function toSearchableArray()
    {
        return [
            'created_at'=> $this->created_at,
            'nama_produk'=> $this->nama_produk,
        ];
    }

    public function products()
{
    return $this->belongsTo(ProductsM::class, 'id_produk'); // Adjust the column name accordingly
}
}
