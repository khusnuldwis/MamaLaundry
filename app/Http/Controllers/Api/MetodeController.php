<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Metode_Layanan;
use Illuminate\Http\Request;

class MetodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Metode_Layanan::all();
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_metode_layanan' => 'required|string',
            'harga' => 'required|int',
        ]);

        $Metode=Metode_Layanan::create([
            'nama_metode_layanan' => $request->nama_metode_layanan,
            'harga' => $request->harga,
            
        ]);

        return response()->json(['pesan' => "Metode layanan berhasil ditambahkan"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data =Metode_Layanan::where('id', $id)->first();
        return response()->json(
            ['data' => $data],
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->all();

            

            $update =Metode_Layanan::find($id)->update($data);

            return response()->json(['pesan' => "Metode layanan berhasil diubah"], 200);
        } catch (\Throwable $th) {
            return response()->json(['pesan' => "Gagal mengubah Metode layanan"], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data =Metode_Layanan::where('id', $id)->delete();
        return response()->json(['data' => $data], 200);
    }
}
