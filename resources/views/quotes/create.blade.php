<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Quote</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/job-form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body class="quote-request-page">
    <div class="job-page">
        <div class="job-layout">
            <aside class="job-sidebar">
                <div class="sidebar-heading">
                    <h3>Quote request</h3>
                    <span>Complete all steps to request a quote</span>
                </div>

                <ol class="step-list">
                    <li class="step-list__item step-list__item--active" data-sidebar-step="1">
                        <div class="step-list__number">
                            <span>1</span>
                        </div>
                        <div class="step-list__content">
                            <h2>Job details</h2>
                            <p>Service, location, and job information</p>
                        </div>
                    </li>

                    <li class="step-list__item" data-sidebar-step="2">
                        <div class="step-list__number">
                            <span>2</span>
                        </div>
                        <div class="step-list__content">
                            <h2>Contact details</h2>
                            <p>How the business can reach you</p>
                        </div>
                    </li>

                    <li class="step-list__item" data-sidebar-step="3">
                        <div class="step-list__number">
                            <span>3</span>
                        </div>
                        <div class="step-list__content">
                            <h2>Review and submit</h2>
                            <p>Check your request before sending</p>
                        </div>
                    </li>
                </ol>
            </aside>

            <main class="job-form-area">
                <div class="form-heading">
                    <span>Customer request</span>
                    <h1>Request a quote</h1>
                    <p>Fill in the job details, add your contact details, then submit your request.</p>
                </div>

                <div class="step-progress" aria-label="Quote request progress">
                    <span class="step-progress__bar step-progress__bar--active" aria-hidden="true"></span>
                    <span class="step-progress__bar" aria-hidden="true"></span>
                    <span class="step-progress__bar" aria-hidden="true"></span>
                    <span class="step-progress__label" aria-live="polite">Step 1 of 3</span>
                </div>

                @if ($errors->any())
                    <div class="error-box">
                        <strong>Please fix the following:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('quote.store') }}" method="POST" class="job-form" id="quoteForm" novalidate>
                    @csrf
                    <input type="hidden" name="preferred_business" value="{{ old('preferred_business', $business) }}">

                    <section class="form-step-section active" data-form-step="1">
                        @if($selectedBusiness)
                            <div class="selected-business-card">
                                <div>
                                    <span>Selected business</span>
                                    <strong>{{ $selectedBusiness['name'] }}</strong>
                                    <small>{{ $selectedBusiness['category'] }} · {{ $selectedBusiness['location'] }}</small>
                                </div>
                                <a href="{{ route('businesses.index') }}">Change</a>
                            </div>
                        @endif

                        <div class="form-group full-width">
                            <label>Service <span>*</span></label>
                            <input type="text" name="service" id="serviceInput" value="{{ old('service', $service) }}" placeholder="Plumbing, Electrical, Cleaning..." required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Location <span>*</span></label>
                                <input type="text" name="location" id="locationInput" value="{{ old('location', $location) }}" placeholder="Auckland" required>
                            </div>

                            <div class="form-group">
                                <label>Budget <span class="optional">optional</span></label>
                                <input type="text" name="budget" id="budgetInput" value="{{ old('budget') }}" placeholder="$500 - $1,000">
                            </div>
                        </div>

                        <div class="form-group full-width">
                            <label>Job description <span>*</span></label>
                            <textarea name="description" id="descriptionInput" placeholder="Describe the job, problem, or service you need" required>{{ old('description') }}</textarea>
                        </div>

                        <button type="button" class="continue-btn step-next">Continue to Contact Details →</button>
                    </section>

                    <section class="form-step-section" data-form-step="2">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Your Name <span>*</span></label>
                                <input type="text" name="customer_name" id="nameInput" value="{{ old('customer_name') }}" required>
                            </div>

                            <div class="form-group">
                                <label>Email <span>*</span></label>
                                <input type="email" name="email" id="emailInput" value="{{ old('email') }}" placeholder="Enter your email" title="Enter valid email address" required>
                                <span class="field-error"></span>
                            </div>
                        </div>

                        <div class="form-row one-column-row">
                            <div class="form-group">
                                <label>Phone <span>*</span></label>
                                <input type="tel" name="phone" id="phoneInput" value="{{ old('phone') }}" placeholder="Enter your phone number" title="Enter valid phone number" required>
                                <span class="field-error"></span>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="back-btn step-back">Back</button>
                            <button type="button" class="continue-btn step-next">Review Request →</button>
                        </div>
                    </section>

                    <section class="form-step-section" data-form-step="3">
                        <div class="review-card">
                            <div class="review-card-header">
                                <h3>Review your request</h3>
                                <button type="button" class="text-edit-btn" data-go-step="1">Edit job details</button>
                            </div>

                            <div class="review-grid">
                                <div>
                                    <span>Business</span>
                                    <strong data-review="preferred_business">—</strong>
                                </div>
                                <div>
                                    <span>Service</span>
                                    <strong data-review="service">—</strong>
                                </div>
                                <div>
                                    <span>Location</span>
                                    <strong data-review="location">—</strong>
                                </div>
                                <div>
                                    <span>Budget</span>
                                    <strong data-review="budget">—</strong>
                                </div>
                                <div>
                                    <span>Name</span>
                                    <strong data-review="customer_name">—</strong>
                                </div>
                                <div>
                                    <span>Phone</span>
                                    <strong data-review="phone">—</strong>
                                </div>
                                <div>
                                    <span>Email</span>
                                    <strong data-review="email">—</strong>
                                </div>
                                <div class="review-full">
                                    <span>Job description</span>
                                    <p class="review-description" data-review="description">—</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="back-btn step-back">Back</button>
                            <button type="submit" class="continue-btn">Submit Quote Request →</button>
                        </div>
                    </section>
                </form>
            </main>
        </div>
    </div>
    @include('partials.footer')

    <script>
        const form = document.getElementById('quoteForm');
        const sections = [...document.querySelectorAll('[data-form-step]')];
        const sidebarSteps = [...document.querySelectorAll('[data-sidebar-step]')];
        const progressBars = [...document.querySelectorAll('.step-progress__bar')];
        const progressText = document.querySelector('.step-progress__label');
        const totalSteps = sections.length;
        let currentStep = 1;

        function isStepComplete(stepNumber) {
            const section = form.querySelector(`[data-form-step="${stepNumber}"]`);

            if (!section) {
                return false;
            }

            const requiredFields = [...section.querySelectorAll('[required]')];

            return requiredFields.every((field) => field.checkValidity());
        }

        function showStep(step) {
            currentStep = step;

            sections.forEach((section) => {
                section.classList.toggle('active', Number(section.dataset.formStep) === step);
            });

            sidebarSteps.forEach((item) => {
                const itemStep = Number(item.dataset.sidebarStep);
                item.classList.toggle('step-list__item--active', itemStep === step);
                item.classList.toggle('step-list__item--complete', itemStep < step && isStepComplete(itemStep));
            });

            progressBars.forEach((bar, index) => {
                const barStep = index + 1;

                bar.classList.toggle('step-progress__bar--active', barStep === step);
                bar.classList.toggle('step-progress__bar--complete', barStep < step && isStepComplete(barStep));
            });

            progressText.textContent = `Step ${step} of ${totalSteps}`;

            if (step === totalSteps) {
                updateReview();
            }
        }

        function getFieldWrapper(field) {
            return field.closest('.form-group');
        }

        function getFieldError(field) {
            const wrapper = getFieldWrapper(field);
            let error = wrapper.querySelector('.field-error');

            if (!error) {
                error = document.createElement('span');
                error.className = 'field-error';
                field.insertAdjacentElement('afterend', error);
            }

            return error;
        }

        function showFieldError(field) {
            const wrapper = getFieldWrapper(field);
            const error = getFieldError(field);
            let errorMessage = 'Required';

            if (field.validity.valueMissing || !field.value.trim()) {
                errorMessage = 'Required';
            } else if (field.type === 'email') {
                errorMessage = 'Enter valid email address';
            } else if (field.type === 'tel') {
                errorMessage = 'Enter valid phone number';
            }

            wrapper.classList.add('form-field--error');
            field.setAttribute('aria-invalid', 'true');
            error.textContent = errorMessage;
        }

        function clearFieldError(field) {
            const wrapper = getFieldWrapper(field);
            const error = wrapper.querySelector('.field-error');

            wrapper.classList.remove('form-field--error');
            field.removeAttribute('aria-invalid');

            if (error) {
                error.textContent = '';
            }
        }

        function currentFieldsAreValid() {
            const currentSection = form.querySelector(`[data-form-step="${currentStep}"]`);
            const requiredFields = [...currentSection.querySelectorAll('[required]')];
            let firstInvalidField = null;

            requiredFields.forEach((field) => {
                if (field.checkValidity()) {
                    clearFieldError(field);
                    return;
                }

                showFieldError(field);

                if (!firstInvalidField) {
                    firstInvalidField = field;
                }
            });

            if (firstInvalidField) {
                firstInvalidField.focus();
                return false;
            }

            return true;
        }

        sidebarSteps.forEach((item) => {
            const stepNumber = Number(item.dataset.sidebarStep);
            const linkedSection = form.querySelector(`[data-form-step="${stepNumber}"]`);

            if (!linkedSection) {
                return;
            }

            item.classList.add('step-list__item--available');
            item.setAttribute('role', 'button');
            item.setAttribute('tabindex', '0');

            function openStep() {
                showStep(stepNumber);
            }

            item.addEventListener('click', openStep);
            item.addEventListener('keydown', (event) => {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    openStep();
                }
            });
        });

        function fieldValue(name) {
            const field = form.elements[name];
            if (!field) return '—';
            return field.value.trim() || '—';
        }

        function updateReview() {
            document.querySelectorAll('[data-review]').forEach((item) => {
                item.textContent = fieldValue(item.dataset.review);
            });
        }

        document.querySelectorAll('.step-next').forEach((button) => {
            button.addEventListener('click', () => {
                if (currentFieldsAreValid() && currentStep < totalSteps) {
                    showStep(currentStep + 1);
                }
            });
        });

        document.querySelectorAll('.step-back').forEach((button) => {
            button.addEventListener('click', () => {
                if (currentStep > 1) {
                    showStep(currentStep - 1);
                }
            });
        });

        document.querySelectorAll('[data-go-step]').forEach((button) => {
            button.addEventListener('click', () => showStep(Number(button.dataset.goStep)));
        });

        form.addEventListener('submit', (event) => {
            const firstIncompleteIndex = sections.findIndex((section, index) => !isStepComplete(index + 1));

            if (firstIncompleteIndex === -1) {
                return;
            }

            event.preventDefault();

            const incompleteStep = firstIncompleteIndex + 1;
            showStep(incompleteStep);
            currentFieldsAreValid();
        });

        const emailInput = document.getElementById('emailInput');
        const phoneInput = document.getElementById('phoneInput');
        const phoneNumberPattern = /^(?=(?:.*\d){7,})[\d\s+()-]+$/;

        [emailInput, phoneInput].filter(Boolean).forEach((field) => {
            function updateContactValidity() {
                const hasInvalidPhoneNumber = field.type === 'tel'
                    && field.value !== ''
                    && !phoneNumberPattern.test(field.value);

                if (field.type === 'tel') {
                    field.setCustomValidity(hasInvalidPhoneNumber ? 'Enter valid phone number' : '');
                }

                if (field.value !== '' && (hasInvalidPhoneNumber || !field.checkValidity())) {
                    showFieldError(field);
                } else if (field.value !== '') {
                    clearFieldError(field);
                }
            }

            field.addEventListener('input', updateContactValidity);
            field.addEventListener('change', updateContactValidity);

            if (field.value !== '') {
                updateContactValidity();
            }
        });

        form.querySelectorAll('[required]').forEach((field) => {
            function updateRequiredFieldError() {
                if (field.checkValidity()) {
                    clearFieldError(field);
                } else if (field.getAttribute('aria-invalid') === 'true') {
                    showFieldError(field);
                }
            }

            field.addEventListener('input', updateRequiredFieldError);
            field.addEventListener('change', updateRequiredFieldError);
        });

        showStep(1);
    </script>
</body>
</html>
