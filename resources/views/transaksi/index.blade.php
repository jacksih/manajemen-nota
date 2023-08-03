<!DOCTYPE html>
<html>
<head>
    <title>Daftar Transaksi</title>
</head>
<body>
    <h1>Daftar Transaksi</h1>

    <a href="{{ route('transaksi.create') }}">Tambah Transaksi</a>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksis as $transaksi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaksi->deskripsi }}</td>
                    <td>{{ $transaksi->jumlah }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Tidak ada transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
