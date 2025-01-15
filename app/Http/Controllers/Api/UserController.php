<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with("role")->get();
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
     
             if ($request->hasFile('profil')) {
                 $file = $data['profil']->store('profil', 'public');
                 $data['profil'] = $file;
             }
     
                 $data['password'] = Hash::make($data['password']);
     
                 User::create($data);
     
                 return response()->json(['pesan' => "User berhasil ditambahkan"], 200);
             
         } catch (\Throwable $th) {
             return response()->json(['pesan' => "User gagal ditambahkan"], 500);
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
        $data = User::where('id', $id)->first();
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
        try {
            $data = $request->all();

            if ($request->hasFile('profil')) {
                $file = $data['profil']->store('profil', 'public');
                $data['profil'] = $file;
            }
            
                $update = User::find($id)->update($data);

                return response()->json(['pesan' => "User berhasil diupdate"], 200);
            
        } catch (\Throwable $th) {
            return response()->json(['pesan' => "User gagal diupdate"], 500);
        }
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::where('id', $id)->delete();
        return response()->json(
            ['data' => $data],
            200
        );
    }
}
