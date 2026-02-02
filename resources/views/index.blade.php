<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExpoPeças - Clone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
</head>

<body>
    <div class="wrapper">
        <header id="navbar">
            @include('components.navbar')
        </header>
        <main>
            <section id="hero">
                @include('components.hero')
            </section>

            <section id="about">
                @include('components.about')
            </section>

            <section id="countdown" class="section-countdown">
                @include('components.countdown')
            </section>
            <section id="publications" class="section-publications">
                @include('components.publications')
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
