<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\CategoriLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CategoryLayananController extends Controller
{
    public function index()
    {
        
        $data=CategoriLayanan::orderBy('id', 'desc')->get();
        return view('admin.jenis_layanan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.jenis_layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // $request->validate([
        //     'nama_jenis_layanan' => 'required',
        //     'harga' => 'required',
            
            
        // ]);

        $data = new CategoriLayanan([
            'nama_jenis_layanan' => $request->get('nama_jenis_layanan'),
                ]);
        $data->save();
        return redirect()->route('jenis_layanan.index')->with('success', 'Data Berhasil Ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = CategoriLayanan::find($id);

        return view('admin.jenis_layanan.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = CategoriLayanan::find($id);

        return view('admin.jenis_layanan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $data = CategoriLayanan::findOrFail($id);

    // Validasi data
    $request->validate([
        'nama_jenis_layanan' => 'required',
       
    ]);

    // Update data
    $data->update([
        'nama_jenis_layanan' => $request->input('nama_jenis_layanan'),
       
    ]);

    // Redirect setelah berhasil update
    return redirect()->route('jenis_layanan.index')->with('success', 'Data Berhasil Diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $jenis_layanan = CategoriLayanan::findOrFail($id);
    $jenis_layanan->delete();

    return response()->json([
        'status' => true,
        'message' => 'Data Berhasil Dihapus!',
    ]);
}

    }
   
 
    
    


