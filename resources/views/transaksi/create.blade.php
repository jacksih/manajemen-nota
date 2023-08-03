<!-- resources/views/transaksi/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
</head>
<body>
    <h1>Tambah Transaksi untuk Nota: {{ $nota->judul }}</h1>

    <form method="post" action="{{ route('nota.store') }}">
        @csrf
        <label>Judul Nota:</label>
        <input type="text" name="judul" required>
        <br>
    
        <!-- Tambahkan input untuk transaksi -->
        <label>Transaksi:</label>
        <div id="transaksi-container">
            <div>
                <input type="text" name="deskripsi[]" required>
                <input type="number" name="jumlah[]" required>
            </div>
        </div>
        <button type="button" onclick="tambahTransaksi()">Tambah Transaksi</button>
        <br>
        <input type="submit" value="Simpan Nota">
    </form>
    
    <script>
        let transaksiIndex = 1;
    
        function tambahTransaksi() {
            const transaksiContainer = document.getElementById('transaksi-container');
            const div = document.createElement('div');
            div.innerHTML = `
                <input type="text" name="deskripsi[]" required>
                <input type="number" name="jumlah[]" required>
            `;
            transaksiContainer.appendChild(div);
            transaksiIndex++;
        }
    </script>
    
</body>
</html>