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

                    <form action="{{ route('contact.store') }}" method="POST" class="service-request-form" data-contact-form novalidate>
                        @csrf

                        <div class="form-row form-row--full">
                            <div class="form-field {{ $errors->has('name') ? 'form-field--error' : '' }}">
                                <label>Your name <span class="required">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" required>
                                <span class="field-error" aria-live="polite">{{ $errors->has('name') ? 'Required' : '' }}</span>
                            </div>

                            <div class="form-field {{ $errors->has('email') ? 'form-field--error' : '' }}">
                                <label>Email <span class="required">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" title="Enter valid email address" required>
                                <span class="field-error" aria-live="polite">{{ $errors->has('email') ? (old('email') ? 'Enter valid email address' : 'Required') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-row form-row--full">
                            <div class="form-field {{ $errors->has('phone') ? 'form-field--error' : '' }}">
                                <label>Phone <span class="optional">optional</span></label>
                                <input type="text" name="phone" value="{{ old('phone') }}">
                                <span class="field-error" aria-live="polite">{{ $errors->has('phone') ? 'Required' : '' }}</span>
                            </div>

                            <div class="form-field {{ $errors->has('subject') ? 'form-field--error' : '' }}">
                                <label>Subject <span class="required">*</span></label>
                                <input
                                    type="text"
                                    name="subject"
                                    value="{{ old('subject') }}"
                                    placeholder="Business listing, quote request, website support..."
                                    required
                                >
                                <span class="field-error" aria-live="polite">{{ $errors->has('subject') ? 'Required' : '' }}</span>
                            </div>
                        </div>

                        <div class="form-row form-row--full">
                            <div class="form-field {{ $errors->has('message') ? 'form-field--error' : '' }}">
                                <label>Message <span class="required">*</span></label>
                                <textarea name="message" placeholder="Please write your message here" required>{{ old('message') }}</textarea>
                                <span class="field-error" aria-live="polite">{{ $errors->has('message') ? 'Required' : '' }}</span>
                            </div>
                        </div>

                        <div class="form-row form-row--full">
                            <button type="submit" class="submit-button">Submit Contact Message</button>
                        </div>

                        <script>
                            (function () {
                                const form = document.querySelector('[data-contact-form]');

                                if (!form) return;

                                function getFieldWrapper(field) {
                                    return field.closest('.form-field');
                                }

                                function getFieldError(field) {
                                    const wrapper = getFieldWrapper(field);
                                    let error = wrapper?.querySelector('.field-error');

                                    if (!error) {
                                        error = document.createElement('span');
                                        error.className = 'field-error';
                                        error.setAttribute('aria-live', 'polite');
                                        field.insertAdjacentElement('afterend', error);
                                    }

                                    return error;
                                }

                                function getFieldMessage(field) {
                                    if (field.validity.valueMissing || !field.value.trim()) {
                                        return 'Required';
                                    }

                                    if (field.type === 'email') {
                                        return 'Enter valid email address';
                                    }

                                    return 'Required';
                                }

                                function showFieldError(field) {
                                    const wrapper = getFieldWrapper(field);
                                    const error = getFieldError(field);

                                    wrapper?.classList.add('form-field--error');
                                    field.setAttribute('aria-invalid', 'true');
                                    error.textContent = getFieldMessage(field);
                                }

                                function clearFieldError(field) {
                                    const wrapper = getFieldWrapper(field);
                                    const error = wrapper?.querySelector('.field-error');

                                    wrapper?.classList.remove('form-field--error');
                                    field.removeAttribute('aria-invalid');

                                    if (error) {
                                        error.textContent = '';
                                    }
                                }

                                function validateField(field) {
                                    if (field.checkValidity()) {
                                        clearFieldError(field);
                                        return true;
                                    }

                                    showFieldError(field);
                                    return false;
                                }

                                form.querySelectorAll('[required]').forEach((field) => {
                                    field.addEventListener('input', () => {
                                        if (field.value !== '' || field.getAttribute('aria-invalid') === 'true') {
                                            validateField(field);
                                        }
                                    });

                                    field.addEventListener('change', () => {
                                        if (field.checkValidity()) {
                                            clearFieldError(field);
                                        } else if (field.getAttribute('aria-invalid') === 'true') {
                                            showFieldError(field);
                                        }
                                    });
                                });

                                form.addEventListener('submit', (event) => {
                                    let firstInvalidField = null;

                                    form.querySelectorAll('[required]').forEach((field) => {
                                        if (validateField(field)) {
                                            return;
                                        }

                                        if (!firstInvalidField) {
                                            firstInvalidField = field;
                                        }
                                    });

                                    if (firstInvalidField) {
                                        event.preventDefault();
                                        firstInvalidField.focus();
                                    }
                                });
                            })();
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
</body>
</html>
