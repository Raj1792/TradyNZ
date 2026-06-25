<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/business.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <link rel="stylesheet" href="{{ asset('css/job-form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    @include('partials.header')

    <div class="service-request-page">
        <div class="container">
            <div class="service-request">
                <aside class="service-request__sidebar">
                    <div class="sidebar-heading">
                        <h3>Contact support</h3>
                        <span>Use this page for general website questions, business listing questions, or support requests.</span>
                    </div>

                    <ol class="step-list">
                        <li class="step-list__item step-list__item--active" data-step="1">
                            <div class="step-list__number"><span>1</span></div>
                            <div class="step-list__content">
                                <h2>Your details</h2>
                                <p>Contact information and message</p>
                            </div>
                        </li>

                        <li class="step-list__item" data-step="2">
                            <div class="step-list__number"><span>2</span></div>
                            <div class="step-list__content">
                                <h2>Submit</h2>
                                <p>Send your message</p>
                            </div>
                        </li>
                    </ol>
                </aside>

                <div class="service-request__main">
                    <div class="form-heading">
                        <span class="form-heading__eyebrow">Contact form</span>
                        <h2>Send us a message</h2>
                        <p>Complete the form below and we will receive your enquiry.</p>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST" class="service-request-form" novalidate>
                        @csrf

                        <script>
                            (function () {
                                const form = document.querySelector('.service-request-form');
                                const emailInput = document.querySelector('input[name="email"]');

                                if (!form || !emailInput) return;

                                function getFieldWrapper(field) {
                                    return field.closest('.form-field');
                                }

                                function showEmailError(field) {
                                    const wrapper = getFieldWrapper(field);
                                    const error = wrapper?.querySelector('.field-error');

                                    wrapper?.classList.add('form-field--error');
                                    field.setAttribute('aria-invalid', 'true');
                                    if (error) error.textContent = field.type === 'email'
                                        ? 'Enter valid email address'
                                        : 'Required';
                                }

                                function clearEmailError(field) {
                                    const wrapper = getFieldWrapper(field);
                                    const error = wrapper?.querySelector('.field-error');

                                    wrapper?.classList.remove('form-field--error');
                                    field.removeAttribute('aria-invalid');
                                    if (error) error.textContent = '';
                                }

                                emailInput.addEventListener('input', () => {
                                    if (emailInput.value !== '' && !emailInput.checkValidity()) {
                                        emailInput.setCustomValidity('');
                                        showEmailError(emailInput);
                                    } else if (emailInput.value !== '') {
                                        clearEmailError(emailInput);
                                    }
                                });

                                emailInput.addEventListener('change', () => {
                                    if (emailInput.checkValidity()) {
                                        clearEmailError(emailInput);
                                    }
                                });

                                function validateEmailAndPreventIfInvalid() {
                                    if (emailInput.value === '' || !emailInput.checkValidity()) {
                                        emailInput.focus();
                                        showEmailError(emailInput);
                                        return false;
                                    }

                                    clearEmailError(emailInput);
                                    return true;
                                }

                                form.addEventListener('submit', (e) => {
                                    if (!validateEmailAndPreventIfInvalid()) {
                                        e.preventDefault();
                                    }
                                });
                            })();
                        </script>


                        <div class="form-row form-row--full">
                            <div class="form-field @error('name') form-field--error @enderror">
                                <label>Your name <span class="required">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="field-error" aria-live="polite">Required</span>
                                @enderror
                            </div>

                            <div class="form-field @error('email') form-field--error @enderror">
                                <label>Email <span class="required">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="field-error" aria-live="polite">Required</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row form-row--full">
                            <div class="form-field @error('phone') form-field--error @enderror">
                                <label>Phone <span class="optional">optional</span></label>
                                <input type="text" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="field-error" aria-live="polite">Required</span>
                                @enderror
                            </div>

                            <div class="form-field @error('subject') form-field--error @enderror">
                                <label>Subject <span class="required">*</span></label>
                                <input
                                    type="text"
                                    name="subject"
                                    value="{{ old('subject') }}"
                                    placeholder="Business listing, quote request, website support..."
                                    required
                                >
                                @error('subject')
                                    <span class="field-error" aria-live="polite">Required</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row form-row--full">
                            <div class="form-field @error('message') form-field--error @enderror">
                                <label>Message <span class="required">*</span></label>
                                <textarea name="message" placeholder="Please write your message here" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="field-error" aria-live="polite">Required</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row form-row--full">
                            <button type="submit" class="submit-button">Submit Contact Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
</body>
</html>

