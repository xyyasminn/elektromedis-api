<?php

namespace App\Http\Controllers;

use App\Models\AlatElektromedis;
use Illuminate\Http\Request;

class AlatElektromedisController extends Controller
{
    public function index()
    {
        return response()->json(AlatElektromedis::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_alat' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'tahun_pengadaan' => 'required|digits:4',
            'kondisi' => 'required',
            'lokasi' => 'required',
        ]);

        return response()->json(
            AlatElektromedis::create($data),
            201
        );
    }

    public function show($id)
    {
        return response()->json(
            AlatElektromedis::findOrFail($id)
        );
    }

    public function update(Request $request, $id)
    {
        $alat = AlatElektromedis::findOrFail($id);
        $alat->update($request->all());

        return response()->json($alat);
    }

    public function destroy($id)
    {
        AlatElektromedis::destroy($id);
        return response()->json(['message' => 'Data deleted']);
    }
}
