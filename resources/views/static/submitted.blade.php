<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/businesses.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/submitted-fix.css') }}">
</head>
<body>
    <nav class="page-navbar">
        <a href="{{ route('home') }}" class="brand-link">NZ Business</a>
        <div class="page-nav-links">
            <a href="{{ route('businesses.index') }}">Browse</a>
            <a href="{{ route('contact.create') }}">Contact</a>
            <a href="{{ route('businesses.register') }}" class="primary-link">List Your Business</a>
        </div>
    </nav>

    <main class="page-container narrow-container">
        <section class="profile-card success-card">
            <span class="business-industry">Success</span>
            <h1>{{ $title }}</h1>
            <p class="profile-description">{{ $message }}</p>
            <div class="profile-actions single-action">
                <a href="{{ route('home') }}" class="get-quote-btn">Back to Home</a>
            </div>
        </section>
    </main>
    @include('partials.footer')
</body>
</html>
