export function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === "password" ? "text" : "password";
}

export function checkPasswordMatch() {
    const password = document.getElementById("password").value;
    const confirm = document.getElementById("password_confirmation").value;
    const text = document.getElementById("matchText");

    if (confirm.length === 0) {
        text.innerHTML = "";
        return;
    }

    if (password === confirm) {
        text.innerHTML = "✅ Passwords match";
        text.className = "text-green-600 text-xs mt-2";
    } else {
        text.innerHTML = "❌ Passwords do not match";
        text.className = "text-red-600 text-xs mt-2";
    }
}