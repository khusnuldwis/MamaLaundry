<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Metode_Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MetodeLayananController extends Controller
{
    public function index()
    {
        
        $data=Metode_Layanan::orderBy('id', 'desc')->get();
        return view('admin.metode_layanan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.metode_layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // $request->validate([
        //     'nama_metode_layanan' => 'required',
        //     'harga' => 'required',
            
            
        // ]);

        $data = new Metode_Layanan([
            'nama_metode_layanan' => $request->get('nama_metode_layanan'),
            'harga' => $request->get('harga'),
                ]);
        $data->save();
        return redirect()->route('metode_layanan.index')->with('success', 'Data Berhasil Ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Metode_Layanan::find($id);

        return view('admin.metode_layanan.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Metode_Layanan::find($id);

        return view('admin.metode_layanan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $data = Metode_Layanan::findOrFail($id);

    // Validasi data
    $request->validate([
        'nama_metode_layanan' => 'required',
        'harga' => 'required',
       
    ]);

    // Update data
    $data->update([
        'nama_metode_layanan' => $request->input('nama_metode_layanan'),
        'harga' => $request->input('harga'),
       
    ]);

    // Redirect setelah berhasil update
    return redirect()->route('metode_layanan.index')->with('success', 'Data Berhasil Diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $metode_layanan = Metode_Layanan::findOrFail($id);
    $metode_layanan->delete();

    return response()->json([
        'status' => true,
        'message' => 'Data Berhasil Dihapus!',
    ]);
}

    }
   
 
    
    


