<?php

namespace App\Http\Controllers;

use App\Models\TransaksiDetail;
use App\Models\Transaksi;
use App\Models\Transaksi_Detail;
use Illuminate\Http\Request;

class TransaksiDetailController extends Controller
{
    public function create($transaksiId)
    {
        $transaksi = Transaksi::findOrFail($transaksiId);
        return view('transaksi_detail.create', compact('transaksi'));
    }

    public function store(Request $request, $transaksiId)
    {
        $request->validate([
            'layanan' => 'required|string',
            'berat' => 'required|numeric',
            'total_pembayaran' => 'required|numeric',
        ]);

        Transaksi_Detail::create([
            'transaksi_id' => $transaksiId,
            'layanan' => $request->layanan,
            'berat' => $request->berat,
            'total_pembayaran' => $request->total_pembayaran,
        ]);

        return redirect()->route('transaksi.show', $transaksiId)->with('success', 'Detail transaksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $transaksiDetail = Transaksi_Detail::findOrFail($id);
        return view('transaksi_detail.edit', compact('transaksiDetail'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'layanan' => 'required|string',
            'berat' => 'required|numeric',
            'total_pembayaran' => 'required|numeric',
        ]);

        $transaksiDetail = Transaksi_Detail::findOrFail($id);
        $transaksiDetail->update([
            'layanan' => $request->layanan,
            'berat' => $request->berat,
            'total_pembayaran' => $request->total_pembayaran,
        ]);

        return redirect()->route('transaksi.show', $transaksiDetail->transaksi_id)->with('success', 'Detail transaksi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $transaksiDetail = Transaksi_Detail::findOrFail($id);
        $transaksiDetail->delete();

        return redirect()->route('transaksi.show', $transaksiDetail->transaksi_id)->with('success', 'Detail transaksi berhasil dihapus');
    }
}

