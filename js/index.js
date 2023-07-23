const inputUsuario = document.getElementById('input-usuario')
const inputPassword = document.getElementById('input-password');
const eye = document.getElementById('eye-password');

// Cambiar entre tipo de contraseña y número cuando se hace clic en el ojo
eye.addEventListener('click', function() {
  if (inputPassword.type === 'password') {
    inputPassword.type = 'number';
    eye.src = 'imagenes/ojo-ocultar.png';
  } else {
    inputPassword.type = 'password';
    eye.src = 'imagenes/ojo-ver.png';
  }
});

// Detener la escritura después de 4 caracteres en el codigo
inputPassword.addEventListener('input', function() {
  if (inputPassword.value.length > 4) {
    inputPassword.value = inputPassword.value.slice(0, 5);
  }
});

// pasar de usuario a codigo
inputUsuario.addEventListener('keypress', function(event) {
  if (event.key === 'Enter') {
      event.preventDefault(); // Evita que se envíe el formulario
      inputPassword.focus(); // Mueve el foco al campo "Codigo"
  }
});