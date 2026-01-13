<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AlatElektromedis;
use Illuminate\Http\Request;

class AlatElektromedisController extends Controller
{
    /**
     * GET - All Data Alat
     * http://localhost:8000/api/alat-elektromedis
     */
    public function index()
    {
        $data = AlatElektromedis::all();

        return response()->json([
            'success' => true,
            'message' => 'Data alat elektromedis berhasil diambil',
            'total'   => $data->count(),
            'data'    => $data
        ], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * GET - Detail Alat
     * http://localhost:8000/api/alat-elektromedis/{id}
     */
    public function show($id)
    {
        $data = AlatElektromedis::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail alat elektromedis',
            'data'    => $data
        ], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * POST - Tambah Alat Baru
     * (Dipakai via Postman)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_alat'        => 'required',
            'merk'             => 'required',
            'tipe'             => 'required',
            'tahun_pengadaan'  => 'required|digits:4',
            'kondisi'          => 'required',
            'lokasi'           => 'required',
        ]);

        $alat = AlatElektromedis::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data alat elektromedis berhasil ditambahkan',
            'data'    => $alat
        ], 201, [], JSON_PRETTY_PRINT);
    }

    /**
     * PUT - Update Alat
     * (Dipakai via Postman)
     */
    public function update(Request $request, $id)
    {
        $alat = AlatElektromedis::findOrFail($id);
        $alat->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data alat elektromedis berhasil diperbarui',
            'data'    => $alat
        ], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * DELETE - Hapus Alat
     * (Dipakai via Postman)
     */
    public function destroy($id)
    {
        AlatElektromedis::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data alat elektromedis berhasil dihapus'
        ], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * GET - Search Alat
     * http://localhost:8000/api/alat-elektromedis/search?search=ventilator
     */
    public function search(Request $request)
    {
        $keyword = $request->query('search');

        $data = AlatElektromedis::where('nama_alat', 'like', "%$keyword%")
            ->orWhere('merk', 'like', "%$keyword%")
            ->orWhere('lokasi', 'like', "%$keyword%")
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Hasil pencarian alat elektromedis',
            'keyword' => $keyword,
            'total'   => $data->count(),
            'data'    => $data
        ], 200, [], JSON_PRETTY_PRINT);
    }
}
