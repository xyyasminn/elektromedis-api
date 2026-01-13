{{-- resources/views/alat/create.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Alat Elektromedis</title>
    <style>
        body{background:#f4f6f9;font-family:'Segoe UI',sans-serif}
        .card{max-width:700px;margin:40px auto;background:#fff;padding:24px;border-radius:14px;box-shadow:0 10px 30px rgba(0,0,0,.08)}
        label{font-weight:600;display:block;margin-top:14px}
        input,select{width:100%;padding:10px;margin-top:6px;border-radius:8px;border:1px solid #ccc}
        button{margin-top:20px;padding:12px 18px;border-radius:10px;border:none;background:#22c55e;color:#fff;font-size:16px;cursor:pointer}
        a{margin-left:10px;color:#3b82f6;text-decoration:none}
    </style>
</head>
<body>
<div class="card">
    <h2>Tambah Alat Elektromedis</h2>

    <form action="{{ route('alat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama Alat</label>
        <input type="text" name="nama_alat" required>

        <label>Gambar Alat</label>
        <input type="file" name="gambar" accept="image/*">

        <label>Merk</label>
        <input type="text" name="merk" required>

        <label>Tipe / Nomor Seri</label>
        <input type="text" name="tipe" required>

        <label>Tipe</label>
<input type="text" name="tipe" required>

<label>Tahun Pengadaan</label>
<input type="number" name="tahun_pengadaan" required>



        <label>Kondisi</label>
        <select name="kondisi" required>
            <option value="">-- Pilih Kondisi --</option>
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
        </select>

        <label>Lokasi</label>
        <input type="text" name="lokasi" required>

        <button type="submit">Simpan</button>
        <a href="{{ route('alat.index') }}">Kembali</a>
    </form>
</div>
</body>
</html>
