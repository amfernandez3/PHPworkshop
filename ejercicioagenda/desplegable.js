const button = document.getElementById('buttonAct');
const text = document.getElementById('formEventos');

button.addEventListener('click', function() {
    console.log("activo");
  if (text.style.display === 'none') {
    text.style.display = 'block';
    
  } else {
    text.style.display = 'none';
  }
});
