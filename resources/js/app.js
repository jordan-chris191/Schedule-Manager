import './bootstrap';
import {
    togglePassword,
    checkPasswordMatch,
    checkPasswordStrength,
    validateForm,
    checkRequired,
    checkPasswordRules
} from "./register";

document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("registerForm");

    if (form) {
        form.addEventListener("submit", (e) => {
            if (!validateForm()) {
                e.preventDefault();
            }
        });
    }
});

// expose to Blade
window.checkPasswordRules = checkPasswordRules;
window.togglePassword = togglePassword;
window.checkPasswordMatch = checkPasswordMatch;
window.checkPasswordStrength = checkPasswordStrength;
window.validateForm = validateForm;
window.checkRequired = checkRequired;