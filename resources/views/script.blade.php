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
