const password = document.getElementById('password');
const confirm_password = document.getElementById('confirmPassword');

function validatePassword() {
  if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Las contraseñas no coinciden");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.addEventListener('change', validatePassword);
confirm_password.addEventListener('keyup', validatePassword);