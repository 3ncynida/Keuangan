<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Css/create.css') }}">
    <title>Form Menabung</title>
    @include('script')
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
