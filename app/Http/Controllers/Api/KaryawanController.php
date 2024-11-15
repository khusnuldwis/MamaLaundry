<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index()
    {
        
    $data=Karyawan::orderBy('id', 'desc')->get();
        return view('admin.karyawan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nama_karyawan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'password' => 'required'
            
        ]);

        $data = new Karyawan([
            'nama_karyawan' => $request->get('nama_karyawan'),
            'no_hp' => $request->get('no_hp'),
            'alamat' => $request->get('alamat'),
            'password' => Hash::make($request->get('password')),
                ]);
        $data->save();
        return redirect()->route('karyawan.index')->with('success', 'Data Berhasil Ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Karyawan::find($id);

        return view('admin.karyawan.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Karyawan::find($id);

        return view('admin.karyawan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $data = Karyawan::findOrFail($id);

    // Validasi data
    $request->validate([
        'nama_karyawan' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'password' => 'required'
    ]);

    // Update data
    $data->update([
        'nama_karyawan' => $request->input('nama_karyawan'),
        'no_hp' => $request->input('no_hp'),
        'alamat' => $request->input('alamat'),
        'password' => $request->has('password') ? Hash::make($request->get('password')) : $data->password,
    ]);

    // Redirect setelah berhasil update
    return redirect()->route('karyawan.index')->with('success', 'Data Berhasil Diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $Karyawan = Karyawan::findOrFail($id);
    $Karyawan->delete();

    return response()->json([
        'status' => true,
        'message' => 'Data Berhasil Dihapus!',
    ]);
}

    }
   
 
    
    


