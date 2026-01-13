<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Alat Elektromedis</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
        }

        .header {
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #2c3e50;
        }

        .subtitle {
            color: #7f8c8d;
            font-size: 13px;
            margin-bottom: 10px;
        }

        a.add-btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 14px;
            background: #2ecc71;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        form {
            margin-bottom: 15px;
        }

        input, select, button, a.reset {
            padding: 6px 10px;
            font-size: 13px;
            margin-right: 5px;
        }

        a.reset {
            text-decoration: none;
            border: 1px solid #ccc;
            color: #333;
            background: #eee;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: #ffffff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
        }

        th {
            background: #2c3e50;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .kondisi.baik { background:#2ecc71; color:#fff; }
        .kondisi.rusak-ringan { background:#f1c40f; color:#000; }
        .kondisi.rusak-berat { background:#e74c3c; color:#fff; }

        .status.aktif { background:#3498db; color:#fff; }
        .status.maintenance { background:#9b59b6; color:#fff; }
        .status.nonaktif { background:#95a5a6; color:#fff; }
    </style>
</head>
<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">
        <h2>Data Alat Elektromedis</h2>
        <div class="subtitle">Sistem Informasi Manajemen Alat Elektromedis</div>
        <a href="/alat/create" class="add-btn">+ Tambah Alat Baru</a>
    </div>

    <!-- FILTER -->
    <form method="GET">
        <input type="text" name="search" placeholder="Cari nama alat..." value="{{ request('search') }}">

        <select name="kondisi">
            <option value="">-- Kondisi --</option>
            <option value="Baik" {{ request('kondisi')=='Baik' ? 'selected' : '' }}>Baik</option>
            <option value="Rusak Ringan" {{ request('kondisi')=='Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
            <option value="Rusak Berat" {{ request('kondisi')=='Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
        </select>

        <button type="submit">Filter</button>
        <a href="/alat" class="reset">Reset</a>
    </form>

    <!-- TABLE -->
    <table>
        <thead>
<tr>
    <th>No</th>
    <th>Nama Alat</th>
    <th>Merk</th>
    <th>Nomor Seri</th>
    <th>Kondisi</th>
    <th>Lokasi</th>
    <th>Aksi</th>
</tr>
</thead>

        <tbody>
        @forelse ($data as $i => $alat)
            <tr>
                <td>{{ $i + 1 }}</td>
<td>{{ $alat->nama_alat }}</td>
<td>{{ $alat->merk }}</td>
<td>{{ $alat->nomor_seri ?? '-' }}</td>

<td>
    <span class="badge kondisi {{ strtolower(str_replace(' ', '-', $alat->kondisi)) }}">
        {{ $alat->kondisi }}
    </span>
</td>

<td>{{ $alat->lokasi }}</td>

<td>
    <a href="/alat/{{ $alat->id }}/edit">Edit</a>
    <form action="/alat/{{ $alat->id }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
    </form>
</td>

            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align:center;">Data tidak tersedia</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

</body>
</html>
