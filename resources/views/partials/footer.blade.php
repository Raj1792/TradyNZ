<footer class="footer">
    <div class="footer-container">
        <div class="footer-brand">
            <h3>New Zealand Businesses</h3>
            <p>Connecting customers with trusted tradies and service providers across New Zealand.</p>
        </div>

        <div class="footer-links">
            <div>
                <h4>Services</h4>
                <ul>
                    <li><a href="{{ route('businesses.index', ['category' => 'Electrical']) }}">Electricians</a></li>
                    <li><a href="{{ route('businesses.index', ['category' => 'Plumbing']) }}">Plumbers</a></li>
                    <li><a href="{{ route('businesses.index', ['category' => 'Renovations']) }}">Builders</a></li>
                    <li><a href="{{ route('businesses.index', ['category' => 'Home Cleaning']) }}">Cleaners</a></li>
                </ul>
            </div>

            <div>
                <h4>For Customers</h4>
                <ul>
                    <li><a href="{{ route('businesses.index') }}">Get Quotes</a></li>
                    <li><a href="{{ route('home') }}#how-it-works">How it Works</a></li>
                    <li><a href="{{ route('businesses.index') }}">Browse Businesses</a></li>
                </ul>
            </div>

            <div>
                <h4>For Businesses</h4>
                <ul>
                    <li><a href="{{ route('businesses.register') }}">List Your Business</a></li>
                    <li><a href="{{ route('pages.show', 'receive-leads') }}">Receive Leads</a></li>
                    <li><a href="{{ route('pages.show', 'pricing') }}">Pricing</a></li>
                </ul>
            </div>

            <div>
                <h4>Company</h4>
                <ul>
                    <li><a href="{{ route('home') }}">About</a></li>
                    <li><a href="{{ route('contact.create') }}">Contact</a></li>
                    <li><a href="{{ route('home') }}">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© {{ date('Y') }} New Zealand Businesses. All rights reserved.</p>
    </div>
</footer>
