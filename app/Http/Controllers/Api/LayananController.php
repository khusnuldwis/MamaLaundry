<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Layanan::with("category")->get();
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
        try {
            $data = $request->all();

            if ($request->hasFile('thumbnail')) {
                $file = $data['thumbnail']->store('thumbnail', 'public');
                $data['thumbnail'] = $file;
            }


            $create = Layanan::create($data);

            return response()->json(['pesan' => "Layanan berhasil ditambahkan"], 200);
        } catch (\Throwable $th) {
            return response()->json(['pesan' => "Layanan gagal ditambahkan"], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     // Ambil data layanan berdasarkan ID, jika tidak ditemukan, kirimkan response error
    //     $layanan = Layanan::with('category')->find($id);

    //     if (!$layanan) {
    //         return response()->json(['error' => 'Layanan tidak ditemukan'], 404);
    //     }

    //     return response()->json($layanan);
    // }
    public function show($id)
    {
        $data = Layanan::where('id', $id)->first();
        return response()->json(
            ['data' => $data],
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $layanan = Layanan::find($id);
    if (!$layanan) {
        return response()->json(['pesan' => "Layanan tidak ditemukan"], 404);
    }

    $validatedData = $request->validate([
        'nama_layanan' => 'required|string|max:255',
        'unit' => 'required',
        'harga' => 'required|numeric',
        'category_id' => 'required|exists:categorys,id',
        'thumbnail' => 'nullable',
    ]);

    if ($request->hasFile('thumbnail')) {
        $file = $request->file('thumbnail')->store('thumbnail', 'public');
        $validatedData['thumbnail'] = $file;
    }

    $updated = $layanan->update($validatedData);

    if ($updated) {
        return response()->json(['pesan' => "Layanan berhasil diubah"], 200);
    } else {
        return response()->json(['pesan' => "Layanan gagal diubah"], 500);
    }
}

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Layanan::where('id', $id)->delete();
        return response()->json(
            ['data' => $data],
            200
        );
    }
}
