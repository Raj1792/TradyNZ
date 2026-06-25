const loginForm = document.querySelector('.login-form');
const loginEmailField = document.querySelector('#login-email');

function getLoginFieldWrapper(field) {
    return field.closest('.login-form__field');
}

function showLoginFieldError(field) {
    const fieldWrapper = getLoginFieldWrapper(field);
    const error = fieldWrapper.querySelector('.field-error');
    const message = field.type === 'email' && !field.validity.valueMissing
        ? 'Enter valid email address'
        : 'Required';

    fieldWrapper.classList.add('form-field--error');
    field.setAttribute('aria-invalid', 'true');
    error.textContent = message;
}

function clearLoginFieldError(field) {
    const fieldWrapper = getLoginFieldWrapper(field);
    const error = fieldWrapper.querySelector('.field-error');

    fieldWrapper.classList.remove('form-field--error');
    field.removeAttribute('aria-invalid');
    error.textContent = '';
}

if (loginForm && loginEmailField) {
    loginEmailField.addEventListener('input', () => {
        if (loginEmailField.value !== '' && !loginEmailField.checkValidity()) {
            showLoginFieldError(loginEmailField);
        } else if (loginEmailField.value !== '') {
            clearLoginFieldError(loginEmailField);
        }
    });

    loginForm.querySelectorAll('[required]').forEach((field) => {
        field.addEventListener('input', () => {
            if (field.checkValidity()) {
                clearLoginFieldError(field);
            } else if (field.getAttribute('aria-invalid') === 'true') {
                showLoginFieldError(field);
            }
        });

        field.addEventListener('change', () => {
            if (field.checkValidity()) {
                clearLoginFieldError(field);
            } else if (field.getAttribute('aria-invalid') === 'true') {
                showLoginFieldError(field);
            }
        });
    });

    function validateLoginFormAndPreventIfInvalid() {
        let firstInvalidField = null;

        loginForm.querySelectorAll('[required]').forEach((field) => {
            if (field.checkValidity()) {
                clearLoginFieldError(field);
                return;
            }

            if (!firstInvalidField) {
                firstInvalidField = field;
            }

            showLoginFieldError(field);
        });

        if (firstInvalidField) {
            firstInvalidField.focus();
            return false;
        }

        return true;
    }

    loginForm.addEventListener('submit', (event) => {
        const isValid = validateLoginFormAndPreventIfInvalid();
        if (!isValid) {
            event.preventDefault();
        }
    });

    // Your login button is type="button" so we must validate on click.
    const loginButton = loginForm.querySelector('.submit-button');
    if (loginButton) {
        loginButton.addEventListener('click', () => {
            validateLoginFormAndPreventIfInvalid();
        });
    }
}

