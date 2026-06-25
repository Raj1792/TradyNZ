<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Trady App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/business.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="{{ asset('js/login.js') }}" defer></script>
</head>
<body>
    @include('partials.header-auth')

    <main class="login-page login-page--trady">

        <div class="container">
            <section class="login-panel" aria-labelledby="login-title">
                <div class="login-panel__intro">
                    <span class="login-panel__eyebrow">Business account</span>
                    <h1 id="login-title">Login to your Trady account</h1>
                    <p>Access your business profile, service areas, verification details, and customer requests.</p>
                </div>

                <form class="login-form" action="#" method="post" novalidate>
                    <div class="login-form__field">
                        <label for="login-email">Email <span class="required">*</span></label>
                        <input id="login-email" type="email" name="Email" placeholder="Enter your email" autocomplete="email" pattern="^[A-Za-z0-9.!#$%&'*+/=?^_`{|}~-]+@[A-Za-z0-9](?:[A-Za-z0-9-]{0,61}[A-Za-z0-9])?(?:\.[A-Za-z0-9](?:[A-Za-z0-9-]{0,61}[A-Za-z0-9])?)+$" title="Enter valid email address" required>
                        <span class="field-error" aria-live="polite"></span>
                    </div>

                    <div class="login-form__field">
                        <label for="login-password">Password <span class="required">*</span></label>
                        <input id="login-password" type="password" name="password" placeholder="Password" autocomplete="current-password" required>
                        <span class="field-error" aria-live="polite"></span>
                    </div>

                    <div class="login-form__meta">
                        <label class="login-form__remember">
                            <input type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>
                        <a href="#">Forgot password?</a>
                    </div>

                    <button class="submit-button" type="button">Login</button>





                </form>
            </section>
        </div>
    </main>
</body>
</html>
