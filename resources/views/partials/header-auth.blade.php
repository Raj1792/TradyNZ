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
                <a href="{{ route('businesses.register') }}" class="nav-btn business-btn">Register</a>
            </div>

        </div>
    </nav>

