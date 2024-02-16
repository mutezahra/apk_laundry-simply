<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogM;

use Illuminate\Support\Facades\Hash;


// use PDF;

class UserC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $subtitle ="Daftar Pengguna";
        $users= User ::all();
        return view('users', compact('subtitle', 'users'));
        // $users  = users::search(request('search'))->paginate(10);
        // $vcari = request('search');
        // return view('users', compact('users', 'vcari'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subtitle = "Tambah Data User";
        return view('users_create', compact('subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'username'=> 'required',
            'password'=> 'required',
            'password'=> 'required|same:password',
            'role'=> 'required',
            
        ]);

        $user = new user([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role

        ]);
        $user->save();

        // User::create($request->post());
        return redirect()->route('users.index')->with('success', 'User Berhasil Ditambahkan');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subtitle = "Daftar edit";
        $users = User::find($id);
        return view ('users_edit', compact('subtitle','users'));
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
        $request->validate([
            'username'=> 'required',
            'name'=> 'required',
            'role'=> 'required',
            
        ]);

        $user= User::find($id);
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('users.index')->with('success', 'User Berhasil Diperbaharui');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find and delete related log records first
        LogM::where('id_user', $id)->delete();
    
        // Then, delete the user
        User::where('id', $id)->delete();
    
        return redirect()->route('users.index')->with('success', 'User Berhasil Dihapus');
    }
    

    public function changepassword($id)
    {
        $subtitle = "Edit Kata Sandi Pengguna";
        $data = User::find($id);
        return view('users_changepassword', compact('subtitle','data'));
    }

    public function change(Request $request, $id)
    {
        $request->validate([
            'username'=>'required',
            'password_new'=> 'required',
            'password_confirm'=> 'required|same:password_new',
            
        ]);

        $data= User::find($id);
        $data->password = Hash::make($request->input('password_new')) ;
        $data->save();

    return redirect()->route('users.index')->with('success', 'Password berhasil diperbarui.');
    }


    // public function change(request $request, $id)
    // {
    //     $data = User::findOrFail($id);

    //     $data->update([
    //         'username' => $request->username,  
    //         'password_old' => $request->password_old,  
    //         'password_new' => $request->password_new,  
    //         'password_confirm' => $request->password_confirm,
           
    //     ]);
    //     // Redirect ke halaman yang sesuai setelah data berhasil diupdate
    //     return redirect()->route('users.index')->with('success', 'Data User berhasil diupdate.');
    // }
    
//     public function pdf(){
//         $users = User::all();
//         //return view('pesertadidik_pdf', compact('pesertaM));
//         $pdf = PDF::loadview('users_pdf', ['users' => $users]);
//         return $pdf->stream('users.pdf');
//     }
}