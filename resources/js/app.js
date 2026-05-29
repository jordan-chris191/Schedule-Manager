import './bootstrap';
import { togglePassword, checkPasswordMatch } from "./register";

// make functions global so Blade can use them
window.togglePassword = togglePassword;
window.checkPasswordMatch = checkPasswordMatch;