<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
   
    public function index()
    {
    $data= User::orderBy('id', 'desc')->get();
    return view('admin.user.index');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
            
        ]);

        $data = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
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
        $data =  User::find($id);

        return view('admin.User.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data =  User::find($id);
        return view('admin.User.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->all();

            if ($request->hasFile('thumbnail')) {
                $file = $data['thumbnail']->store('thumbnail_User', 'public');
                $data['thumbnail'] = $file;
            }

            
                $update = User::find($id)->update($data);

                return redirect()->route('User.index')->with('success', 'Data Berhasil DiUpdate!');
        } catch (\Throwable $th) {
            return redirect()->route('User.index')->with('danger', 'Data Gagal DiUpdate!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $User =  User::findOrFail($id);
    $User->delete();

    return response()->json([
        'status' => true,
        'message' => 'Data Berhasil Dihapus!',
    ]);
}

    }
   
 
    
    



