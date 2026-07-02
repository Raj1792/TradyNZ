<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Listings</title>
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

    <main class="page-container">
        <div class="page-heading">
            <span>Business Directory</span>
            <h1>Search businesses</h1>
            <p>
                Showing results for
                <strong>{{ $service ?: 'all services' }}</strong>
                @if($location)
                    in <strong>{{ $location }}</strong>
                @endif
            </p>
        </div>

        <form action="{{ route('businesses.index') }}" method="GET" class="filter-box">
            <input
                type="text"
                name="service"
                placeholder="Service, keyword, or business name"
                value="{{ $service }}"
            >

            <input
                type="text"
                name="location"
                placeholder="Location or suburb"
                value="{{ $location }}"
            >

            <select name="industry">
                <option value="">All Industries</option>

                @foreach($industries as $industryName => $categories)
                    <option value="{{ $industryName }}" {{ $selectedIndustry == $industryName ? 'selected' : '' }}>
                        {{ $industryName }}
                    </option>
                @endforeach
            </select>

            <select name="category">
                <option value="">All Categories</option>

                @foreach($industries as $industryName => $categories)
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ $selectedCategory == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                @endforeach
            </select>

            <button type="submit">Apply Filters</button>
        </form>

        <div class="quick-filter-row">
            <a href="{{ route('businesses.index', ['category' => 'Plumbing', 'location' => 'Auckland']) }}">Plumbers in Auckland</a>
            <a href="{{ route('businesses.index', ['category' => 'Electrical']) }}">Electricians</a>
            <a href="{{ route('businesses.index', ['category' => 'Renovations']) }}">Builders / Renovations</a>
            <a href="{{ route('businesses.index', ['category' => 'Home Cleaning']) }}">Cleaners</a>
            <a href="{{ route('businesses.index', ['service' => 'roof']) }}">Roofing</a>
        </div>

        <div class="result-summary">
            <span>{{ $businesses->count() }} business{{ $businesses->count() === 1 ? '' : 'es' }} found</span>
            <a href="{{ route('businesses.index') }}">Clear filters</a>
        </div>

        <div class="business-grid">
            @forelse($businesses as $business)
                @php($slug = \Illuminate\Support\Str::slug($business['name']))

                <div class="business-card">
                    <div class="business-top">
                        <div>
                            <span class="business-industry">
                                {{ $business['industry'] }}
                            </span>

                            <h2>{{ $business['name'] }}</h2>
                        </div>

                        <div class="verified-badge">
                            Verified
                        </div>
                    </div>

                    <div class="business-meta">
                        <span>{{ $business['category'] }}</span>
                        <span>📍 {{ $business['location'] }}</span>
                        @if(! empty($business['rating']))
                            <span>★ {{ number_format($business['rating'], 1) }}</span>
                        @endif
                    </div>

                    <p class="business-description">
                        {{ $business['description'] }}
                    </p>

                    @if(! empty($business['services']))
                        <div class="tag-row">
                            @foreach(array_slice($business['services'], 0, 4) as $item)
                                <span>{{ $item }}</span>
                            @endforeach
                        </div>
                    @endif

                    @if(! empty($business['service_areas']))
                        <p class="area-line">
                            <strong>Service areas:</strong> {{ implode(', ', array_slice($business['service_areas'], 0, 5)) }}
                        </p>
                    @endif

                    <div class="business-contact">
                        <div>
                            <strong>Phone:</strong><br>
                            {{ $business['phone'] }}
                        </div>

                        <div>
                            <strong>Email:</strong><br>
                            {{ $business['email'] }}
                        </div>
                    </div>

                    <div class="business-actions">
                        <a href="{{ route('businesses.show', $slug) }}" class="view-profile-btn">
                            View Profile
                        </a>

                        <a href="{{ route('quote.create', ['business' => $business['name'], 'service' => $business['category'], 'location' => $business['location']]) }}" class="get-quote-btn">
                            Get Quotation
                        </a>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <h2>No businesses found</h2>
                    <p>Try a different service, category, or location.</p>
                    <div class="profile-actions">
                        <a href="{{ route('businesses.index') }}" class="view-profile-btn">Reset search</a>
                        <a href="{{ route('businesses.index') }}" class="get-quote-btn">View All Businesses</a>
                    </div>
                </div>
            @endforelse
        </div>
    </main>

    @include('partials.footer')
</body>
</html>
