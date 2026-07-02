<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/businesses.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/businesses.css') }}">
</head>
<body>
    @include('partials.header')

    <main class="page-container narrow-container">
        <section class="profile-card">
            <span class="business-industry">Information</span>
            <h1>{{ $heading }}</h1>
            <p class="profile-description">{{ $body }}</p>
            <div class="profile-actions">
                <a href="{{ route('businesses.index') }}" class="get-quote-btn">Browse Businesses</a>
                <a href="{{ route('home') }}" class="view-profile-btn">Back Home</a>
            </div>
        </section>
    </main>
    @include('partials.footer')
</body>
</html>
