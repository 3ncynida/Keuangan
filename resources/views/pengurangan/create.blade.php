<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Css/create.css') }}">
    <title>Document</title>
    @include('script')
</head>

<body>

</html>
<div class="form-container">
    <h3>Kurangi Tabungan</h3>
    <form action="{{ route('pengurangan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tabungan_id">Pilih Tabungan</label>
            <select name="tabungan_id" required>
                @foreach ($tabungan as $item)
                    <option value="{{ $item->id }}">{{ $item->id }} -
                        Rp{{ number_format($item->jumlah_tabungan, 0, ',', '.') }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah_pengurangan">Jumlah Pengurangan</label>
            <input type="number" name="jumlah_pengurangan" required oninput="this.value = formatRupiah(this.value)"
                onblur="removeDots(this)">
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" required>
        </div>
        <button type="submit">Kurangi</button>
    </form>
</div>
</body>
