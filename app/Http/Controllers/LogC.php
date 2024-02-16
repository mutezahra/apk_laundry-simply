<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogM;
use Illuminate\Support\Facades\Auth;

class LogC extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $subtitle = "Daftar Aktivity";
    
        $logM = LogM::select('users.name', 'log.activity', 'log.created_at')
            ->join('users', 'users.id', '=', 'log.id_user')
            ->orderBy('log.id', 'desc');
    
        if ($user->role == 'admin') {
            $logM = $logM->SimplePaginate(5);
        } elseif ($user->role == 'kasir') {
            $logM = $logM->where('users.role', 'kasir')->SimplePaginate(5);
        } elseif ($user->role == 'owner') {
            $logM = $logM->whereIn('users.role', ['kasir', 'owner'])->SimplePaginate(5);
        } else {
            // Handle other roles if needed
        }
    
        return view('log', compact('subtitle', 'logM'));
    }
    



//     public function index()
// {
//     $user = Auth::user();
//     $subtitle = "Daftar Aktivity";
//     $logM = LogM::select('users.*', 'log.*')
//         ->join('users', 'users.id', '=', 'log.id_user')
//         ->orderBy('log.id', 'desc');

//     // Menambahkan filter berdasarkan peran pengguna saat ini
//     if ($user->role == 'admin') {
//         // Admin dapat melihat semua log
//         $logM = $logM->get();
//     } elseif ($user->role == 'kasir') {
//         // Kasir hanya dapat melihat log kasir
//         $logM = $logM->where('users.role', 'kasir')->get();
//     } elseif ($user->role == 'owner') {
//         // Owner dapat melihat log kasir dan owner
//         $logM = $logM->whereIn('users.role', ['kasir', 'owner'])->get();
//     } else {
//         // Handle peran lain jika perlu
//     }

//     $logM = LogM::SimplePaginate(10);

//     return view('log', compact('subtitle', 'logM'));
// }

    // public function index()
    // {
    //     $logM = LogM::create([
    //         'id_user'=>Auth::user()->id,
    //         'activity'=> 'User Melihat Halaman Log'

    //     ]);
    //     $subtitle = "Daftar Aktivity";
    //     $logM = LogM::select('users.*','log.*')->join('users', 'users.id',
    //     '=', 'log.id_user')->orderBy('log.id','desc')->get();

    //     return view('log', compact('subtitle','logM'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
}
