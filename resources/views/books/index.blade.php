<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
            margin: 0;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #4f8cff;
            margin-bottom: 24px;
        }

        .filter-search {
            width: 80%;
            margin: 0 auto 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .filter-search form {
            display: flex;
            gap: 10px;
        }

        .filter-search select,
        .filter-search input,
        .filter-search button {
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #d0d7de;
            font-size: 14px;
        }

        .filter-search button {
            background: #4f8cff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .filter-search button:hover {
            background: #3c6ed1;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: separate;
            border-spacing: 0;
            background: #fff;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            padding: 14px 18px;
            text-align: left;
        }

        th {
            background: linear-gradient(90deg, #4f8cff 0%, #6ed6ff 100%);
            color: #fff;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        tr:not(:last-child) td {
            border-bottom: 1px solid #e3e8ee;
        }

        tr:hover {
            background: #f0f6ff;
            transition: background 0.2s;
        }

        .card {
            width: 80%;
            margin: 32px auto 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 24px 32px;
        }

        .card h3 {
            margin-top: 0;
            color: #4f8cff;
            font-size: 1.3em;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
        }

        .card ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .card li {
            padding: 8px 0;
            border-bottom: 1px solid #e3e8ee;
            font-size: 1.05em;
        }

        .card li:last-child {
            border-bottom: none;
        }

        .empty {
            text-align: center;
            padding: 20px;
            color: #888;
        }
        .button {
            width: 10%;
            margin: 20px auto 0 auto;
           
        }

        .btn.btn-primary {
            display: inline-block;
            padding: 10px 16px;
            font-size: 14px;
            border-radius: 6px;
            text-decoration: none;
            background: #4f8cff;
            color: #fff;
            border: none;
            cursor: pointer;
            
            
        }

        .btn.btn-primary:hover {
            background: #3c6ed1;
        }

            margin-top: 20px;
        .float-end {
            float: right;
        }


    </style>
</head>
<body>

    <h2>📚 Data Buku</h2>

    <!-- Filter Penulis & Pencarian -->
    <div class="filter-search">
        <form method="GET" action="{{ url('/buku') }}">
            <select name="author" onchange="this.form.submit()">
                <option value="all">Semua Penulis</option>
                @foreach($daftar_penulis as $p)
                    <option value="{{ $p->author }}" {{ (isset($penulis) && $penulis==$p->author) ? 'selected' : '' }}>
                        {{ $p->author }}
                    </option>
                @endforeach
            </select>
        </form>

        <form method="GET" action="{{ url('/buku') }}">
            <input type="text" name="keyword" placeholder="Cari judul..." value="{{ $keyword ?? '' }}">
            <button type="submit">Cari</button>
        </form>
    </div>

    <!-- Tabel Buku -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tanggal Terbit</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($book_data as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ "Rp " . number_format($book->price, 0, ',', '.') }}</td>
                    <td>{{ date('d-m-Y', strtotime($book->published_date)) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="empty">Tidak ada data buku ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="button">
        <a href="{{ route('books.create') }}" class="btn btn-primary float-end">Tambah Buku</a>
    </div>




    <!-- Statistik -->
    <div class="card">
        <h3>📊 Statistik Buku</h3>
        <ul>
            <li>Total Buku: {{ $total_books }}</li>
            <li>Total Harga: {{ "Rp " . number_format($total_price, 0, ',', '.') }}</li>
            <li>Rata-rata Harga: {{ "Rp " . number_format($average_price, 0, ',', '.') }}</li>
            <li>Harga Maksimum: {{ "Rp " . number_format($max_price, 0, ',', '.') }}</li>
            <li>Harga Minimum: {{ "Rp " . number_format($min_price, 0, ',', '.') }}</li>
        </ul>
    </div>

</body>
</html>
