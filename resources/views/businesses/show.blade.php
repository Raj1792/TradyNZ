<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business['name'] }}</title>
    <link rel="stylesheet" href="{{ asset('css/businesses.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    <nav class="page-navbar">
        <a href="{{ route('home') }}" class="brand-link">NZ Businesses</a>
        <div class="page-nav-links">
            <a href="{{ route('businesses.index') }}">Browse</a>
            <a href="{{ route('contact.create') }}">Contact</a>
            <a href="{{ route('businesses.register') }}" class="primary-link">List Your Business</a>
        </div>
    </nav>

    <main class="page-container narrow-container">
        <a href="{{ url()->previous() }}" class="back-link">← Back</a>

        <section class="profile-card">
            <span class="business-industry">{{ $business['industry'] }}</span>
            <h1>{{ $business['name'] }}</h1>
            <div class="business-meta profile-meta">
                <span>{{ $business['category'] }}</span>
                <span>📍 {{ $business['location'] }}</span>
                <span>Verified business</span>
                @if(! empty($business['rating']))
                    <span>★ {{ number_format($business['rating'], 1) }}</span>
                @endif
            </div>

            <p class="profile-description">{{ $business['description'] }}</p>

            <div class="profile-info-grid">
                <div>
                    <strong>Phone</strong>
                    <p>{{ $business['phone'] }}</p>
                </div>
                <div>
                    <strong>Email</strong>
                    <p>{{ $business['email'] }}</p>
                </div>
                @if(! empty($business['jobs_completed']))
                    <div>
                        <strong>Jobs completed</strong>
                        <p>{{ $business['jobs_completed'] }} jobs</p>
                    </div>
                @endif
                @if(! empty($business['response_time']))
                    <div>
                        <strong>Response time</strong>
                        <p>{{ $business['response_time'] }}</p>
                    </div>
                @endif
            </div>

            @if(! empty($business['services']))
                <h3 class="profile-subheading">Services</h3>
                <div class="tag-row profile-tags">
                    @foreach($business['services'] as $item)
                        <span>{{ $item }}</span>
                    @endforeach
                </div>
            @endif

            @if(! empty($business['service_areas']))
                <h3 class="profile-subheading">Service areas</h3>
                <div class="tag-row profile-tags">
                    @foreach($business['service_areas'] as $area)
                        <span>{{ $area }}</span>
                    @endforeach
                </div>
            @endif

            <div class="profile-actions">
                <a href="{{ route('quote.create', ['business' => $business['name'], 'service' => $business['category'], 'location' => $business['location']]) }}" class="get-quote-btn">Request a Quote</a>
                <a href="mailto:{{ $business['email'] }}" class="view-profile-btn">Email Business</a>
            </div>
        </section>
    </main>

    @include('partials.footer')
</body>
</html>
