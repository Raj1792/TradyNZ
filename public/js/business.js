const serviceRequestForm = document.querySelector('.service-request-form');
const formSteps = serviceRequestForm ? serviceRequestForm.querySelectorAll('.form-step') : [];
const nextButtons = serviceRequestForm ? serviceRequestForm.querySelectorAll('[data-next-step]') : [];
const backButtons = serviceRequestForm ? serviceRequestForm.querySelectorAll('[data-back-step]') : [];
const formHeadingStep = document.querySelector('.form-heading__eyebrow');
const formHeadingTitle = document.querySelector('.form-heading h2');
const formHeadingDescription = document.querySelector('.form-heading p');
const stepProgressLabel = document.querySelector('.step-progress__label');
const stepProgressBars = document.querySelectorAll('.step-progress__bar');
const sidebarStepItems = document.querySelectorAll('.step-list__item');
const totalSteps = sidebarStepItems.length;
const passwordField = serviceRequestForm ? serviceRequestForm.querySelector('input[name="password"]') : null;
const confirmPasswordField = serviceRequestForm ? serviceRequestForm.querySelector('input[name="confirmPassword"]') : null;

function getFieldWrapper(field) {
    return field.closest('.form-field');
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

    if (field.type === 'file' && field.validity.customError) {
        errorMessage = 'Upload a PDF, JPG or PNG file';
    } else if (field.validity.valueMissing || !field.value.trim()) {
        errorMessage = 'Required';
    } else if (field.type === 'email') {
        errorMessage = 'Enter valid email address';
    } else if (field.type === 'tel') {
        errorMessage = 'Enter valid phone number';
    } else if (field.name === 'NZBN' && field.validity.patternMismatch) {
        errorMessage = 'Enter valid 13 digit NZBN number';
    } else if (field.name === 'password' && field.validity.patternMismatch) {
        errorMessage = 'Minimum 8 characters with uppercase, lowercase, number and symbol';
    } else if (field.name === 'confirmPassword' && field.validity.customError) {
        errorMessage = 'Passwords do not match';
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

function validateStep(step) {
    if (step.contains(confirmPasswordField)) {
        updatePasswordMatch();
    }

    const requiredFields = step.querySelectorAll('[required]');
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

function isStepComplete(stepNumber) {
    const step = serviceRequestForm.querySelector(`[data-step="${stepNumber}"]`);

    if (!step) {
        return false;
    }

    const requiredFields = step.querySelectorAll('[required]');

    return [...requiredFields].every((field) => field.checkValidity());
}

function showFormStep(stepNumber) {
    const activeStep = serviceRequestForm.querySelector(`[data-step="${stepNumber}"]`);

    formSteps.forEach((step) => {
        step.classList.toggle('form-step--active', step.dataset.step === String(stepNumber));
    });

    const stepText = `Step ${stepNumber} of ${totalSteps}`;
    if (formHeadingStep) formHeadingStep.textContent = stepText;
    if (formHeadingTitle) formHeadingTitle.textContent = activeStep.dataset.title;
    if (formHeadingDescription) formHeadingDescription.textContent = activeStep.dataset.description;
    if (stepProgressLabel) stepProgressLabel.textContent = stepText;

    stepProgressBars.forEach((bar, index) => {
        const barStepNumber = index + 1;

        bar.classList.toggle('step-progress__bar--active', barStepNumber === stepNumber);
        bar.classList.toggle('step-progress__bar--complete', barStepNumber < stepNumber && isStepComplete(barStepNumber));
    });

    sidebarStepItems.forEach((item) => {
        const itemStepNumber = Number(item.dataset.step);

        item.classList.toggle('step-list__item--active', itemStepNumber === stepNumber);
        item.classList.toggle('step-list__item--complete', itemStepNumber < stepNumber && isStepComplete(itemStepNumber));
    });
}

function showRegistrationComplete() {
    stepProgressBars.forEach((bar, index) => {
        const barStepNumber = index + 1;

        bar.classList.remove('step-progress__bar--active');
        bar.classList.toggle('step-progress__bar--complete', barStepNumber <= totalSteps && isStepComplete(barStepNumber));
    });

    sidebarStepItems.forEach((item) => {
        const itemStepNumber = Number(item.dataset.step);

        item.classList.remove('step-list__item--active');
        item.classList.toggle('step-list__item--complete', itemStepNumber <= totalSteps && isStepComplete(itemStepNumber));
    });
}

if (serviceRequestForm) {
    sidebarStepItems.forEach((item) => {
        const stepNumber = Number(item.dataset.step);
        const linkedStep = serviceRequestForm.querySelector(`[data-step="${stepNumber}"]`);

        if (!linkedStep) {
            return;
        }

        item.classList.add('step-list__item--available');
        item.setAttribute('role', 'button');
        item.setAttribute('tabindex', '0');

        function openStep() {
            showFormStep(stepNumber);
        }

        item.addEventListener('click', openStep);
        item.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                openStep();
            }
        });
    });

    nextButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const activeStep = serviceRequestForm.querySelector('.form-step--active');

            if (validateStep(activeStep)) {
                showFormStep(Number(button.dataset.nextStep));
            }
        });
    });

    backButtons.forEach((button) => {
        button.addEventListener('click', () => {
            showFormStep(Number(button.dataset.backStep));
        });
    });

    function updatePasswordMatch() {
        const hasMismatch = confirmPasswordField.value !== '' && confirmPasswordField.value !== passwordField.value;
        confirmPasswordField.setCustomValidity(hasMismatch ? 'Passwords do not match' : '');

        if (hasMismatch) {
            showFieldError(confirmPasswordField);
            return;
        }

        if (confirmPasswordField.value !== '') {
            clearFieldError(confirmPasswordField);
        }
    }

    function updatePasswordStrength() {
        if (passwordField.value !== '' && !passwordField.checkValidity()) {
            showFieldError(passwordField);
        } else if (passwordField.value !== '') {
            clearFieldError(passwordField);
        }

        updatePasswordMatch();
    }

    if (passwordField && confirmPasswordField) {
        passwordField.addEventListener('input', updatePasswordStrength);
        confirmPasswordField.addEventListener('input', updatePasswordMatch);
    }

    const phoneNumberPattern = /^(?=(?:.*\d){7,})[\d\s+()-]+$/;
    const nzbnField = serviceRequestForm.querySelector('[name="NZBN"]');

    if (nzbnField) {
        nzbnField.addEventListener('input', () => {
            nzbnField.value = nzbnField.value.replace(/\D/g, '').slice(0, 13);

            if (nzbnField.getAttribute('aria-invalid') === 'true') {
                if (nzbnField.checkValidity()) {
                    clearFieldError(nzbnField);
                } else {
                    showFieldError(nzbnField);
                }
            }
        });
    }

    serviceRequestForm.querySelectorAll('[data-step="1"] input[type="email"], [data-step="1"] input[type="tel"]').forEach((field) => {
        field.addEventListener('input', () => {
            const hasInvalidPhoneNumber = field.type === 'tel' && field.value !== '' && !phoneNumberPattern.test(field.value);

            if (field.type === 'tel') {
                field.setCustomValidity(hasInvalidPhoneNumber ? 'Enter valid phone number' : '');
            }

            if (field.value !== '' && (hasInvalidPhoneNumber || !field.checkValidity())) {
                showFieldError(field);
            } else if (field.value !== '') {
                clearFieldError(field);
            }
        });
    });

    serviceRequestForm.querySelectorAll('[required]').forEach((field) => {
        field.addEventListener('input', () => {
            if (field.checkValidity()) {
                clearFieldError(field);
            } else if (field.getAttribute('aria-invalid') === 'true') {
                showFieldError(field);
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

    serviceRequestForm.addEventListener('submit', (event) => {
        const activeStep = serviceRequestForm.querySelector('.form-step--active');
        const activeStepNumber = Number(activeStep.dataset.step);

        if (activeStepNumber < totalSteps) {
            event.preventDefault();

            if (validateStep(activeStep)) {
                showFormStep(activeStepNumber + 1);
            }

            return;
        }

        if (!validateStep(activeStep)) {
            event.preventDefault();
            return;
        }

        event.preventDefault();
        const successMessage = activeStep.querySelector('.registration-success');
        const submitButton = activeStep.querySelector('button[type="submit"]');

        successMessage.hidden = false;
        submitButton.disabled = true;
        submitButton.textContent = 'Registration Complete';
        showRegistrationComplete();
    });
}
