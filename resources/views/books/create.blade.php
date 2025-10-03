<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f8fafc;
        margin: 0;
        padding: 40px;
    }

    h4 {
        text-align: center;
        color: #4f8cff;
        margin-bottom: 24px;
    }

    .container {
        width: 50%;
        margin: 0 auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        border-radius: 8px;
    }

    form div {
        margin-bottom: 12px;
    }

    input[type="text"],
    input[type="number"] {
        width: calc(100% - 22px);
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #d0d7de;
        font-size: 14px;
    }

    button {
        background: #4f8cff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background: #3c6ed1;
    }

    a {
        display: inline-block;
        margin-top: 12px;
        color: #4f8cff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

</style>
<body>
    <div class="container">
        <h4>Add New Book</h4>
        <form method='POST' action="{{ route('books.store') }}">
            @csrf
            <div>Judul <input type="text" name="title"></div>
            <div>Penulis <input type="text" name="author"></div>
            <div>Harga <input type="number" name="price"></div>
            <div>Tahun Terbit <input type="date" name="published_date"></div>
            <div><button type="submit">Simpan</button></div>
            <a href="{{ route('books.index') }}">Kembali</a>
        </form>
    </div>
    
</body>
</html>