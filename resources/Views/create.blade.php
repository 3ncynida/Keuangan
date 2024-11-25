<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Css/create.css') }}">
    <title>Form Menabung</title>
    <script>
        // Fungsi untuk memformat angka dengan titik sebagai pemisah ribuan
        function formatRupiah(angka) {
            return angka.replace(/\D/g, '') // Hapus semua karakter non-digit
                       .replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Tambahkan titik
        }

        // Fungsi untuk menghapus format titik sebelum form dikirim
        function removeDots(element) {
            element.value = element.value.replace(/\./g, '');
        }

            // Fungsi untuk mendapatkan tanggal hari ini dalam format YYYY-MM-DD
    function setTodayDate() {
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
        const dd = String(today.getDate()).padStart(2, '0');
        document.getElementById('tanggal').value = `${yyyy}-${mm}-${dd}`;
    }

    // Panggil fungsi saat halaman dimuat
    window.onload = setTodayDate;
    </script>
</head>
<body>
    <div class="form-container">
        <h3>Form Menabung</h3>
        <form action="{{ route('tabungan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="jumlah_tabungan">Jumlah Menabung</label>
                <input type="number" 
                       name="jumlah_tabungan" 
                       required 
                       oninput="this.value = formatRupiah(this.value)" 
                       onblur="removeDots(this)">
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" required>
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
