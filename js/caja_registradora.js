const Input = document.getElementById('code_input');
const ResultsCode = document.getElementById('search-results');

Input.addEventListener('input', function() {
  const query = Input.value;

  if (query.length >= 1) {
    // Realizar la solicitud AJAX al servidor
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `busqueda_codigo.php?query=${query}`, true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Obtener los resultados como un array de objetos JSON
        const results = JSON.parse(xhr.responseText);

        // Limpiamos los resultados anteriores
        ResultsCode.innerHTML = '';

        // Mostramos los resultados
        results.forEach(result => {
          const resultItem = document.createElement('div');
          resultItem.textContent = result.Código;
          ResultsCode.appendChild(resultItem);
        });
      }
    };
    xhr.send();
  } else {
    // Si el código ingresado es menor a 3 caracteres, limpiamos los resultados
    ResultsCode.innerHTML = '';
  }
});


