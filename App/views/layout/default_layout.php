<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        .hero {
            height: 500px;
            background-image: linear-gradient(#00000070, #00000070), url('https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            color: #fff;
        }
    </style>
</head>

<body>
    <section class="hero">
        <h2>My New Page </h2>
    </section>

    <section id="content">
        @yield('content')
    </section>
</body>

</html>