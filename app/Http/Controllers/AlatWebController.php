<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatElektromedis;
use Illuminate\Support\Facades\Storage;

class AlatWebController extends Controller
{
    public function index(Request $request)
    {
        $query = AlatElektromedis::query();

        if ($request->search) {
            $query->where('nama_alat', 'like', '%'.$request->search.'%');
        }

        if ($request->kondisi) {
            $query->where('kondisi', $request->kondisi);
        }

        $data = $query->latest()->get();
        return view('alat.index', compact('data'));
    }

    public function create()
    {
        return view('alat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alat'        => 'required',
            'merk'             => 'required',
            'tipe'             => 'required',
            'tahun_pengadaan'  => 'required|integer',
            'kondisi'          => 'required',
            'lokasi'           => 'required',
            'gambar'           => 'nullable|image|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('alat', 'public');
        }

        AlatElektromedis::create($data);

        return redirect()->route('alat.index');
    }

    public function edit(AlatElektromedis $alat)
    {
        return view('alat.edit', compact('alat'));
    }

    public function update(Request $request, AlatElektromedis $alat)
    {
        $request->validate([
            'nama_alat'        => 'required',
            'merk'             => 'required',
            'tipe'             => 'required',
            'tahun_pengadaan'  => 'required|integer',
            'kondisi'          => 'required',
            'lokasi'           => 'required',
            'gambar'           => 'nullable|image|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            if ($alat->gambar) {
                Storage::disk('public')->delete($alat->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('alat', 'public');
        }

        $alat->update($data);

        return redirect()->route('alat.index');
    }

    public function destroy(AlatElektromedis $alat)
    {
        if ($alat->gambar) {
            Storage::disk('public')->delete($alat->gambar);
        }

        $alat->delete();
        return redirect()->route('alat.index');
    }
}
