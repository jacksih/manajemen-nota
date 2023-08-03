<!-- resources/views/nota/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Nota</title>
</head>
<body>
    <h1>Daftar Nota</h1>

    <ul>
        @foreach ($notas as $nota)
            <li>
                <strong>Judul Nota: </strong>{{ $nota->judul }}
                <ul>
                    @foreach ($nota->transaksis as $transaksi)
                        <li>{{ $transaksi->deskripsi }} - {{ $transaksi->jumlah }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</body>
</html>
