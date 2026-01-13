{{-- resources/views/alat/edit.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Alat Elektromedis</title>
    <style>
        body{background:#f4f6f9;font-family:'Segoe UI',sans-serif}
        .card{max-width:700px;margin:40px auto;background:#fff;padding:24px;border-radius:14px;box-shadow:0 10px 30px rgba(0,0,0,.08)}
        label{font-weight:600;display:block;margin-top:14px}
        input,select{width:100%;padding:10px;margin-top:6px;border-radius:8px;border:1px solid #ccc}
        img{margin-top:10px;border-radius:10px}
        button{margin-top:20px;padding:12px 18px;border-radius:10px;border:none;background:#3b82f6;color:#fff;font-size:16px;cursor:pointer}
        a{margin-left:10px;color:#3b82f6;text-decoration:none}
    </style>
</head>
<body>
<div class="card">
    <h2>Edit Alat Elektromedis</h2>

    <form action="{{ route('alat.update',$alat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama Alat</label>
        <input type="text" name="nama_alat" value="{{ $alat->nama_alat }}" required>

        <label>Gambar Alat</label>
        <input type="file" name="gambar" accept="image/*">
        @if($alat->gambar)
            <img src="{{ asset('storage/'.$alat->gambar) }}" width="120">
        @endif

        <label>Merk</label>
        <input type="text" name="merk" value="{{ $alat->merk }}" required>

        <label>Tipe / Nomor Seri</label>
        <input type="text" name="tipe" value="{{ $alat->tipe }}" required>

<label>Tahun Pengadaan</label>
<input type="number" name="tahun_pengadaan" value="{{ $alat->tahun_pengadaan }}" required>

        <label>Kondisi</label>
        <select name="kondisi" required>
            <option value="Baik" {{ $alat->kondisi=='Baik'?'selected':'' }}>Baik</option>
            <option value="Rusak Ringan" {{ $alat->kondisi=='Rusak Ringan'?'selected':'' }}>Rusak Ringan</option>
            <option value="Rusak Berat" {{ $alat->kondisi=='Rusak Berat'?'selected':'' }}>Rusak Berat</option>
        </select>

        <label>Lokasi</label>
        <input type="text" name="lokasi" value="{{ $alat->lokasi }}" required>

        <button type="submit">Update</button>
        <a href="{{ route('alat.index') }}">Kembali</a>
    </form>
</div>
</body>
</html>
