// ===============================
// PASSWORD TOGGLE
// ===============================
export function togglePassword(id, btn) {
    const input = document.getElementById(id);
    const isHidden = input.type === "password";

    input.type = isHidden ? "text" : "password";

    const openIcon = btn.querySelector(".eye-open");
    const closedIcon = btn.querySelector(".eye-closed");

    openIcon.classList.toggle("hidden", !isHidden);
    closedIcon.classList.toggle("hidden", isHidden);
}


// ===============================
// PASSWORD MATCH CHECK
// ===============================
export function checkPasswordMatch() {
    const password = document.getElementById("password").value;
    const confirm = document.getElementById("password_confirmation").value;
    const text = document.getElementById("matchText");

    if (!confirm) {
        text.textContent = "";
        return;
    }

    if (password === confirm) {
        text.textContent = "Passwords match";
        text.className = "text-xs mt-2 text-emerald-400";
    } else {
        text.textContent = "Passwords do not match";
        text.className = "text-xs mt-2 text-red-400";
    }
}


// ===============================
// PASSWORD STRENGTH CHECK
// ===============================
export function checkPasswordStrength() {
    const password = document.getElementById("password").value;
    const strengthText = document.getElementById("strengthText");
    const strengthBar = document.getElementById("strengthBar");

    let strength = 0;

    if (password.length >= 8) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;

    let message = "";
    let color = "";
    let width = "0%";

    switch (strength) {
        case 0:
        case 1:
            message = "Very weak";
            color = "bg-red-500";
            width = "25%";
            break;
        case 2:
            message = "Weak";
            color = "bg-orange-500";
            width = "50%";
            break;
        case 3:
            message = "Good";
            color = "bg-yellow-500";
            width = "75%";
            break;
        case 4:
            message = "Strong";
            color = "bg-green-500";
            width = "100%";
            break;
    }

    strengthText.textContent = message;

    // safer Tailwind handling
    strengthText.className = "text-xs mt-1";
    if (color.includes("red")) strengthText.classList.add("text-red-400");
    else if (color.includes("orange")) strengthText.classList.add("text-orange-400");
    else if (color.includes("yellow")) strengthText.classList.add("text-yellow-400");
    else strengthText.classList.add("text-green-400");

    strengthBar.className = `h-1 mt-2 rounded transition-all ${color}`;
    strengthBar.style.width = width;
}

export function checkPasswordRules() {
    const pass = document.getElementById("password").value;
    const passwordError = document.getElementById("passwordError");

    if (!pass) {
        passwordError.classList.add("hidden");
        return;
    }

    if (pass.length < 8) {
        passwordError.textContent = "Password must be at least 8 characters";
        passwordError.classList.remove("hidden");
    } 
    else if (!/[A-Z]/.test(pass)) {
        passwordError.textContent = "Must contain 1 uppercase letter";
        passwordError.classList.remove("hidden");
    } 
    else if (!/[0-9]/.test(pass)) {
        passwordError.textContent = "Must contain 1 number";
        passwordError.classList.remove("hidden");
    } 
    else if (!/[^A-Za-z0-9]/.test(pass)) {
        passwordError.textContent = "Must contain 1 special character";
        passwordError.classList.remove("hidden");
    } 
    else {
        passwordError.textContent = "Password looks good";
        passwordError.classList.remove("hidden");
        passwordError.classList.remove("text-red-500");
        passwordError.classList.add("text-emerald-400");
    }
}

// ===============================
// REQUIRED FIELD CHECK
// ===============================
export function checkRequired(inputId, errorId) {
    const input = document.getElementById(inputId);
    const error = document.getElementById(errorId);

    if (!input) return true;

    if (!input.value.trim()) {
        error.classList.remove("hidden");
        input.classList.add("border-red-500");
        return false;
    } else {
        error.classList.add("hidden");
        input.classList.remove("border-red-500");
        return true;
    }
}


// ===============================
// FORM VALIDATION
// ===============================
export function validateForm() {
    let valid = true;

    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const confirm = document.getElementById("password_confirmation");

    const nameError = document.getElementById("nameError");
    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");
    const confirmError = document.getElementById("confirmError");

    // ======================
    // NAME
    // ======================
    if (!name.value.trim()) {
        nameError.classList.remove("hidden");
        name.classList.add("border-red-500");
        valid = false;
    } else {
        nameError.classList.add("hidden");
        name.classList.remove("border-red-500");
    }

    // ======================
    // EMAIL
    // ======================
    if (!email.value.includes("@")) {
        emailError.textContent = "Invalid email format";
        emailError.classList.remove("hidden");
        email.classList.add("border-red-500");
        valid = false;
    } else {
        emailError.classList.add("hidden");
        email.classList.remove("border-red-500");
    }

    // ======================
    // PASSWORD RULES
    // ======================
    const pass = password.value;

    if (pass.length < 8) {
        passwordError.textContent = "Password must be at least 8 characters";
        passwordError.classList.remove("hidden");
        valid = false;
    } else if (!/[A-Z]/.test(pass)) {
        passwordError.textContent = "Must contain 1 uppercase letter";
        passwordError.classList.remove("hidden");
        valid = false;
    } else if (!/[0-9]/.test(pass)) {
        passwordError.textContent = "Must contain 1 number";
        passwordError.classList.remove("hidden");
        valid = false;
    } else if (!/[^A-Za-z0-9]/.test(pass)) {
        passwordError.textContent = "Must contain 1 special character";
        passwordError.classList.remove("hidden");
        valid = false;
    } else {
        passwordError.classList.add("hidden");
    }

    // ======================
    // CONFIRM PASSWORD
    // ======================
   if (confirm.value !== pass) {
    confirmError.classList.remove("hidden");
    valid = false;
        } else {
            confirmError.classList.add("hidden");
        }

    return valid;
}