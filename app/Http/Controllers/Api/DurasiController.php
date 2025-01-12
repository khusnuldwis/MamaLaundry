<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Durasi;
use Illuminate\Http\Request;

class DurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Durasi::all();
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
            'nama' => 'required|string',
            'waktu' => 'required|string',
            'harga' => 'required|int',
        ]);

        $Durasi = Durasi::create([
            'nama' => $request->nama,
            'waktu' => $request->waktu,
            'harga' => $request->harga,
            
        ]);

        return response()->json(['pesan' => "Kategori layanan berhasil ditambahkan"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Durasi::where('id', $id)->first();
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

            

            $update = Durasi::find($id)->update($data);

            return response()->json(['pesan' => "Kategori layanan berhasil diubah"], 200);
        } catch (\Throwable $th) {
            return response()->json(['pesan' => "Gagal mengubah kategori layanan"], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Durasi::where('id', $id)->delete();
        return response()->json(['data' => $data], 200);
    }
}
