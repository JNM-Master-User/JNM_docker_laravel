const button_w_toggling_spinner_login = document.getElementById("button_w_toggling_spinner_login");
const button_w_toggling_spinner_log_out = document.getElementById("button_w_toggling_spinner_log_out");

button_w_toggling_spinner_login.addEventListener('click', () => {
    button_w_toggling_spinner_login.firstElementChild.classList.toggle('hidden');
});

button_w_toggling_spinner_log_out.addEventListener('click', () => {
    button_w_toggling_spinner_log_out.firstElementChild.classList.toggle('hidden');
});