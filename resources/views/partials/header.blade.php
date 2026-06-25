<nav class="navbar">
        <div class="navbar-container">

            <div class="navbar-left">
                <a href="{{ route('home') }}" class="logo-placeholder">NZ Businesses</a>

                <a href="{{ route('businesses.index') }}" class="browse-btn">
                    Browse
                </a>
            </div>

            <div class="navbar-actions">
                @if(!Route::is('contact.create'))
                    <a href="{{ route('contact.create') }}" class="nav-btn light-btn">Contact</a>
                @endif
                <a href="{{ route('login') }}" class="nav-btn business-btn">Login</a>



            </div>

        </div>
    </nav>
