<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabungan</title>
    @include('style')
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tabungan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataTabungan as $v)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>Rp {{ number_format($v->jumlah_tabungan, 0, ',', '.') }}</td>
                    <td>{{ $v->tanggal }}</td>
                    <td>
                        <form action="{{ route('tabungan.destroy', $v->id) }}" method="POST" class="delete-form">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <a class="edit-link" href="{{ route('tabungan.edit', $v->id) }}">EDIT</a>
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">Total Tabungan: Rp {{ number_format($totalTabungan, 0, ',', '.') }}</p>

    <a class="add-button" href="{{ route('tabungan.create') }}">Menabung</a>
    <a class=" deduct-button" href="{{ route('pengurangan.index') }}">Pengeluaran</a>

</body>

</html>
