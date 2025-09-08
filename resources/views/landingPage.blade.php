<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        header {
            background: #4CAF50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .hero {
            padding: 60px 20px;
            text-align: center;
            background: #f4f4f4;
        }
        .hero h1 {
            margin-bottom: 10px;
            font-size: 2.5rem;
        }
        .features {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 40px 20px;
        }
        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            flex: 1;
            text-align: center;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
        }
        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }
        @media(max-width:768px){
            .features {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <header>
        <h2>{{ $title }}</h2>
    </header>

    <section class="hero">
        <h1>{{ $tagline }}</h1>
        <p>Kami menyediakan layanan untuk mengembangkan website modern sesuai kebutuhan bisnis Anda.</p>
        <a href="#contact" style="display:inline-block; padding:10px 20px; background:#4CAF50; color:#fff; text-decoration:none; border-radius:5px;">Hubungi Kami</a>
    </section>

    <section class="features">
        @foreach($features as $f)
            <div class="card">
                <h3>{{ $f }}</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        @endforeach
    </section>

    <footer id="contact">
        <p>&copy; {{ date('Y') }} - {{ $title }}. All rights reserved.</p>
    </footer>

</body>
</html>
