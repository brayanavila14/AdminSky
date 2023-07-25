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
  if (inputPassword.value.length >= 4) {
    inputPassword.value = inputPassword.value.slice(0, 4);
  }
});

// Detener la escritura después de 10 caracteres en el codigo
inputUsuario.addEventListener('input', function() {
  if (inputUsuario.value.length >= 10) {
    inputUsuario.value = inputUsuario.value.slice(0, 10);
  }
});

// pasar de usuario a codigo
inputUsuario.addEventListener('keypress', function(event) {
  if (event.key === 'Enter') {
      event.preventDefault(); // Evita que se envíe el formulario
      inputPassword.focus(); // Mueve el foco al campo "Codigo"
  }
});