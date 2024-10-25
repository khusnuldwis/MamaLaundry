<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\CategoriLayanan;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LayananController extends Controller
{
    public function index()
    {
    $data= Layanan::orderBy('id', 'desc')->get();
    return view('admin.layanan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $data = $request->all();

        // Cek dan simpan file thumbnail
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail')->store('thumbnail_layanan', 'public');
            $data['thumbnail'] = $file;
        }

        // Simpan data ke dalam database menggunakan transaksi
            Layanan::create($data);

        return redirect()->route('layanan.index')->with('success', 'Data Berhasil Ditambahkan!');
    } catch (\Throwable $th) {
        return redirect()->route('layanan.index')->with('danger', 'Data Gagal Ditambahkan! ' . $th->getMessage());
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data =  Layanan::find($id);

        return view('admin.layanan.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data =  Layanan::find($id);
        return view('admin.layanan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->all();

            if ($request->hasFile('thumbnail')) {
                $file = $data['thumbnail']->store('thumbnail_layanan', 'public');
                $data['thumbnail'] = $file;
            }

            
                $update = Layanan::find($id)->update($data);

                return redirect()->route('layanan.index')->with('success', 'Data Berhasil DiUpdate!');
        } catch (\Throwable $th) {
            return redirect()->route('layanan.index')->with('danger', 'Data Gagal DiUpdate!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $layanan =  Layanan::findOrFail($id);
    $layanan->delete();

    return response()->json([
        'status' => true,
        'message' => 'Data Berhasil Dihapus!',
    ]);
}

    }
   
 
    
    


