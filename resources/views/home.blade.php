<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Zealand Businesses</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
</head>
<body>

    <!-- Navbar Start -->
    <nav class="navbar">
        <div class="navbar-container">

            <div class="navbar-left">
                <a href="{{ route('home') }}" class="logo-placeholder">NZ Businesses</a>

                <a href="{{ route('businesses.index') }}" class="browse-btn">
                    Browse
                </a>
            </div>

            <div class="navbar-actions">
                <a href="{{ route('contact.create') }}" class="nav-btn light-btn">Contact</a>
                <a href="{{ route('businesses.register') }}" class="nav-btn business-btn">List Your Business</a>
            </div>

        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Hero Section Start -->
    <section class="hero-section" id="heroSection">
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <div class="hero-badge">Trusted businesses across New Zealand</div>

            <h1>
                Find Trusted Businesses<br>
                Across New Zealand
            </h1>

            <p>Search reliable tradies and local service providers near you.</p>

            <form action="{{ route('businesses.index') }}" method="GET" class="hero-search-box">

    <input 
        type="text" 
        name="service"
        placeholder="What service do you need?"
        required
    >

    <div class="location-field">
        <span class="location-icon">📍</span>

        <input 
            type="text"
            name="location"
            placeholder="Location"
        >
    </div>

    <button type="submit" class="hero-search-btn">
        Search
    </button>

</form>
        </div>
    </section>

    <!-- Hero Section End -->



    <!-- Trust Section Start -->
    <section class="trust-section">
        <div class="trust-container">

            <div class="trust-card">
                <div class="trust-icon">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M12 2L4 6V11C4 16 7.5 20.7 12 22C16.5 20.7 20 16 20 11V6L12 2Z" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
                <h3>Trusted by Locals</h3>
                <p>Find businesses used and trusted across New Zealand.</p>
            </div>

            <div class="trust-card">
                <div class="trust-icon">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2"/>
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
                <h3>Verified Tradies</h3>
                <p>Browse reliable professionals with verified details.</p>
            </div>

            <div class="trust-card">
                <div class="trust-icon">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
                <h3>Fast Responses</h3>
                <p>Quick connections with the right tradies.</p>
            </div>

            <div class="trust-card">
                <div class="trust-icon">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M21 15A4 4 0 0 1 17 19H8L3 22V5A4 4 0 0 1 7 1H17A4 4 0 0 1 21 5V15Z" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
                <h3>Free Quotes</h3>
                <p>Request quotes without paying upfront.</p>
            </div>

        </div>
    </section>
    <!-- Trust Section End -->


    <!-- Category Section Start -->
    <section class="category-section">
        <div class="section-header">
            <span class="section-badge">Popular Services</span>
            <h2>Explore Services Across Industries</h2>
            <p>Explore services across a range of industries and connect with trusted businesses across New Zealand. Choose a category to get started.</p>
        </div>

        <div class="category-grid">

            <div class="category-card">
                <img src="{{ asset('Images/categories/builder.jpg') }}" alt="Builder">
                <div class="category-content">
                    <h3>Home Services</h3>
                    <p>Find trusted professionals for repairs, maintenance, and home improvement projects.</p>
                    <a href="{{ route('businesses.index', ['industry' => 'Construction & Trades']) }}">View category →</a>
                </div>
            </div>

            <div class="category-card">
                <img src="{{ asset('Images/categories/automative.jpg') }}" alt="Automative">
                <div class="category-content">
                    <h3>Automotive</h3>
                    <p>Connect with experts for vehicle repairs, servicing, and maintenance needs.</p>
                    <a href="{{ route('businesses.index', ['industry' => 'Automotive']) }}">View category →</a>
                </div>
            </div>

            <div class="category-card">
                <img src="{{ asset('Images/categories/beautycare.jpg') }}" alt="Beauty Care">
                <div class="category-content">
                    <h3>Beauty & Personal Care</h3>
                    <p>Discover salons and specialists for grooming, beauty, and self-care services.</p>
                    <a href="{{ route('businesses.index', ['industry' => 'Beauty & Wellness']) }}">View category →</a>
                </div>
            </div>

            <div class="category-card">
                <img src="{{ asset('Images/categories/food&hospitality.jpg') }}" alt="Food & Hospitality">
                <div class="category-content">
                    <h3>Food & Hospitality</h3>
                    <p>Explore restaurants, cafés, and catering services for every occasion.</p>
                    <a href="{{ route('businesses.index', ['industry' => 'Food & Hospitality']) }}">View category →</a>
                </div>
            </div>

            <div class="category-card">
                <img src="{{ asset('Images/categories/professionalservices.jpg') }}" alt="Professional Services">
                <div class="category-content">
                    <h3>Professional Services</h3>
                    <p>Access qualified experts for legal, financial, and business-related services.</p>
                    <a href="{{ route('businesses.index', ['industry' => 'Professional Services']) }}">View category →</a>
                </div>
            </div>

            <div class="category-card">
                <img src="{{ asset('Images/categories/techservices.jpg') }}" alt="Tech Services">
                <div class="category-content">
                    <h3>IT & Technology</h3>
                    <p>Get support for digital solutions, including web development, repairs, and IT support.</p>
                    <a href="{{ route('businesses.index', ['industry' => 'IT & Technology']) }}">View category →</a>
                </div>
            </div>

        </div>

        <div class="category-cta">
            <a href="{{ route('businesses.index') }}" class="view-all-btn">View All Services</a>
        </div>
    </section>
    <!-- Category Section End -->


    <!-- How It Works Section Start -->
    <section class="how-section" id="how-it-works">
        <div class="section-header">
            <span class="section-badge">Simple Process</span>
            <h2>How it works</h2>
            <p>Whether you are looking for a tradie or listing your business, the process is simple and quick.</p>
        </div>

        <div class="how-grid">

            <div class="how-card homeowner-card">
                <div class="how-card-header">
                    <span class="how-label">For Homeowners</span>
                    <h3>Get matched with the right tradie</h3>
                </div>

                <div class="how-steps">
                    <div class="how-step">
                        <span class="step-number">01</span>
                        <div>
                            <h4>Tell Us What You Need</h4>
                            <p>Search for a service and location to get started.</p>
                        </div>
                    </div>

                    <div class="how-step">
                        <span class="step-number">02</span>
                        <div>
                            <h4>Explore Your Options</h4>
                            <p>Browse industries or view matching businesses near you.</p>
                        </div>
                    </div>

                    <div class="how-step">
                        <span class="step-number">03</span>
                        <div>
                            <h4>Choose the Right Business</h4>
                            <p>Check profiles, services, and details before deciding.</p>
                        </div>
                    </div>

                    <div class="how-step">
                        <span class="step-number">04</span>
                        <div>
                            <h4>Get Quotes</h4>
                            <p>Send your request and receive responses from businesses.</p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('businesses.index') }}" class="how-btn get-started-btn">Get Started</a>
            </div>

            <div class="how-card business-card">
                <div class="how-card-header">
                    <span class="how-label">For Businesses</span>
                    <h3>List your business and receive leads</h3>
                </div>

                <div class="how-steps">
                    <div class="how-step">
                        <span class="step-number">01</span>
                        <div>
                            <h4>Create Profile</h4>
                            <p>Add your business details and services for customers to view.</p>
                        </div>
                    </div>

                    <div class="how-step">
                        <span class="step-number">02</span>
                        <div>
                            <h4>Get Listed</h4>
                            <p>Your business can appear in the directory for customers to find.</p>
                        </div>
                    </div>

                    <div class="how-step">
                        <span class="step-number">03</span>
                        <div>
                            <h4>Receive Leads</h4>
                            <p>Customer quote requests can later be matched to businesses or sent to the connected system.</p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('businesses.register') }}" class="how-btn business-btn">List Your Business</a>
            </div>

        </div>
    </section>
    <!-- How It Works Section End -->

    @include('partials.footer')



    <script>
        const heroImages = @json($imageUrls);

        if (heroImages.length > 0) {
            const randomImage = heroImages[Math.floor(Math.random() * heroImages.length)];
            document.getElementById("heroSection").style.backgroundImage = `url('${randomImage}')`;
        }
    </script>

</body>
</html>