<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatElektromedis;

class AlatWebController extends Controller
{
    public function index(Request $request)
    {
        $query = AlatElektromedis::query();

        if ($request->filled('search')) {
            $query->where('nama_alat', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('kondisi')) {
            $query->where('kondisi', $request->kondisi);
        }

        $data = $query->get();

        return view('alat.index', compact('data'));
    }

    public function create()
    {
        return view('alat.create');
    }

  public function store(Request $request)
{
    AlatElektromedis::create([
        'nama_alat'        => $request->nama_alat,
        'merk'             => $request->merk,
        'tipe'             => $request->tipe,
        'tahun_pengadaan'  => $request->tahun_pengadaan, // WAJIB
        'kondisi'          => $request->kondisi,
        'lokasi'           => $request->lokasi,
    ]);

    return redirect('/alat');
}



    public function edit($id)
    {
        $alat = AlatElektromedis::findOrFail($id);
        return view('alat.edit', compact('alat'));
    }

    public function update(Request $request, $id)
    {
        $alat = AlatElektromedis::findOrFail($id);

        $alat->update([
             'nama_alat'        => $request->nama_alat,
        'merk'             => $request->merk,
        'tipe'             => $request->tipe,
        'tahun_pengadaan'  => $request->tahun_pengadaan,
        'kondisi'          => $request->kondisi,
        'lokasi'           => $request->lokasi,
        ]);

        return redirect('/alat');
    }

    public function destroy($id)
    {
        AlatElektromedis::destroy($id);
        return redirect('/alat');
    }
}
