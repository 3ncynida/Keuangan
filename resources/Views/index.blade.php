<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabungan</title>
    <link rel="stylesheet" href="{{ asset('Css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .edit-link {
            color: #007BFF;
            text-decoration: none;
            margin-right: 10px;
        }
        .edit-link:hover {
            text-decoration: underline;
        }
        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #c82333;
        }
        .total {
            font-size: 1.2em;
            font-weight: bold;
            margin: 20px 0;
        }
        .add-button {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .add-button:hover {
            background-color: #218838;
        }
        .deduct-all-form {
            margin: 20px 0;
        }
        input[type="number"] {
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
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

<center>
<form action="{{ route('tabungan.deductAll') }}" method="POST" class="deduct-all-form">
    @csrf
    <input type="number" name="jumlah_pengurangan" min="1" required placeholder="Pengurangan">
    <button type="submit">Kurangi Semua</button>
</form>
</center>

<p class="total">Total Tabungan: Rp {{ number_format($totalTabungan, 0, ',', '.') }}</p>

<a class="add-button" href="{{ route('tabungan.create') }}">Menabung</a>

<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                event.preventDefault();
            }
        });
    });
</script>

</body>
</html>
