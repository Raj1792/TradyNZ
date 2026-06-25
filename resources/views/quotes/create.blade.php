<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Quote</title>
    <link rel="stylesheet" href="{{ asset('css/job-form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    <div class="job-page">
        <div class="job-layout">
            <aside class="job-sidebar">
                <h4>Quote request</h4>
                <p>Complete the steps below so the selected business can understand your job.</p>

                <div class="step active" data-sidebar-step="1">
                    <span>1</span>
                    <div>
                        <strong>Job details</strong>
                        <small>Business, service, and job information</small>
                    </div>
                </div>

                <div class="step" data-sidebar-step="2">
                    <span>2</span>
                    <div>
                        <strong>Contact details</strong>
                        <small>How the business can reach you</small>
                    </div>
                </div>

                <div class="step" data-sidebar-step="3">
                    <span>3</span>
                    <div>
                        <strong>Review and submit</strong>
                        <small>Check your request before sending</small>
                    </div>
                </div>
            </aside>

            <main class="job-form-area">
                <div class="form-heading">
                    <span>Customer request</span>
                    <h1>Request a quote</h1>
                    <p>Fill in the job details, add your contact details, then submit your request.</p>
                </div>

                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill"></div>
                    <p id="progressText">Step 1 of 3</p>
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

                <form action="{{ route('quote.store') }}" method="POST" class="job-form" id="quoteForm">
                    @csrf

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

                        <div class="form-row">
                            <div class="form-group">
                                <label>Business <span>*</span></label>
                                <select name="preferred_business" id="preferredBusiness" required>
                                    <option value="">Choose a business</option>
                                    @foreach($businesses as $item)
                                        <option
                                            value="{{ $item['name'] }}"
                                            data-service="{{ $item['category'] }}"
                                            data-location="{{ $item['location'] }}"
                                            {{ old('preferred_business', $business) === $item['name'] ? 'selected' : '' }}
                                        >
                                            {{ $item['name'] }} — {{ $item['category'] }} · {{ $item['location'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Service <span>*</span></label>
                                <input type="text" name="service" id="serviceInput" value="{{ old('service', $service) }}" placeholder="Plumbing, Electrical, Cleaning..." required>
                            </div>
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

                        <button type="button" class="continue-btn step-next">Continue to Contact Details</button>
                    </section>

                    <section class="form-step-section" data-form-step="2">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Your name <span>*</span></label>
                                <input type="text" name="customer_name" id="nameInput" value="{{ old('customer_name') }}" required>
                            </div>

                            <div class="form-group">
                                <label>Email <span>*</span></label>
                                <input type="email" name="email" id="emailInput" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-row one-column-row">
                            <div class="form-group">
                                <label>Phone <span>*</span></label>
                                <input type="text" name="phone" id="phoneInput" value="{{ old('phone') }}" required>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="back-btn step-back">Back</button>
                            <button type="button" class="continue-btn step-next">Review Request</button>
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
                                    <strong data-review="description">—</strong>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="back-btn step-back">Back</button>
                            <button type="submit" class="continue-btn">Submit Quote Request</button>
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
        const progressFill = document.getElementById('progressFill');
        const progressText = document.getElementById('progressText');
        let currentStep = 1;

        function showStep(step) {
            currentStep = step;

            sections.forEach((section) => {
                section.classList.toggle('active', Number(section.dataset.formStep) === step);
            });

            sidebarSteps.forEach((item) => {
                const itemStep = Number(item.dataset.sidebarStep);
                item.classList.toggle('active', itemStep === step);
                item.classList.toggle('completed', itemStep < step);
            });

            progressFill.style.width = `${(step / 3) * 100}%`;
            progressText.textContent = `Step ${step} of 3`;

            if (step === 3) {
                updateReview();
            }
        }

        function currentFieldsAreValid() {
            const currentSection = document.querySelector(`[data-form-step="${currentStep}"]`);
            const fields = [...currentSection.querySelectorAll('input, select, textarea')];

            for (const field of fields) {
                if (!field.checkValidity()) {
                    field.reportValidity();
                    return false;
                }
            }

            return true;
        }

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
                if (currentFieldsAreValid() && currentStep < 3) {
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

        const emailInput = document.getElementById('emailInput');

        if (emailInput) {
            function getFieldWrapper(field) {
                return field.closest('.form-group');
            }

            function showEmailError(field) {
                const wrapper = getFieldWrapper(field);
                const error = wrapper?.querySelector('.field-error');

                wrapper?.classList.add('form-field--error');
                field.setAttribute('aria-invalid', 'true');
                if (error) error.textContent = 'Enter valid email address';
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

            // Hook into the existing step validation: when step 2 -> 3, email must be valid.
            const originalCurrentFieldsAreValid = currentFieldsAreValid;
            currentFieldsAreValid = function () {
                return originalCurrentFieldsAreValid() && validateEmailAndPreventIfInvalid();
            };
        }

        document.getElementById('preferredBusiness')?.addEventListener('change', (event) => {
            const option = event.target.selectedOptions[0];
            const serviceInput = document.getElementById('serviceInput');
            const locationInput = document.getElementById('locationInput');

            if (option?.dataset.service && !serviceInput.value.trim()) {
                serviceInput.value = option.dataset.service;
            }

            if (option?.dataset.location && !locationInput.value.trim()) {
                locationInput.value = option.dataset.location;
            }
        });

        showStep(1);
    </script>
</body>
</html>
