<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabungan</title>
    @include('style')
</head>

<body>
    <h3>Riwayat Pengurangan Tabungan</h3>
    <table>
        <thead>
            <tr>
                <th>ID Tabungan</th>
                <th>Jumlah Pengurangan</th>
                <th>Tanggal</th>
                <th>Waktu Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengurangan as $item)
                <tr>
                    <td>{{ $item->tabungan_id }}</td>
                    <td>Rp{{ number_format($item->jumlah_pengurangan, 0, ',', '.') }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a class="add-button" href="{{ route('tabungan.index') }}">Kembali</a>

    <a class=" deduct-button" href="{{ route('pengurangan.create') }}">Pengurangan</a>

</body>

</html>
