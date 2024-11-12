<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Css/create.css') }}">
    <title>Form Menabung</title>
</head>
<body>
  <div class="form-container">
<h1>Form Category</h1>
<form action="{{ route('tabungan.update', $dataEditTabungan->id) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
     <div class="form-group">
    <label for="jumlah_tabungan">Tabungan</label>
    <input type="number" id="jumlah_tabungan" name="jumlah_tabungan" value="{{ $dataEditTabungan->jumlah_tabungan }}" required /></br> 
    </div>
     <div class="form-group">
    <label for="tanggal">Tanggal</label>
    <input type="date" id="tanggal" name="tanggal" value="{{ $dataEditTabungan->tanggal }}" required /></br>
    </div>
    <button type="submit">Save</button>
</form>
</d>
</body>
</html>