const form = document.querySelector('form');
const inputs = form.querySelectorAll('input[type="text"], input[type="password"]');
const btnModifier = form.querySelector('button');
const btnEnregistrer = document.createElement('button');
btnEnregistrer.innerText = 'Enregistrer';
btnEnregistrer.style.display = 'none';
btnEnregistrer.type = 'submit';
form.appendChild(btnEnregistrer);

btnModifier.addEventListener('click', function() {
  inputs.forEach(input => input.disabled = false);
  btnModifier.style.display = 'none';
  btnEnregistrer.style.display = 'block';
  for (var i = 0; i < inputs.length; i++) {
    inputs[i].removeAttribute("disabled");
  }
  document.getElementById("btnSave").removeAttribute("disabled");
});

// previsualisation
const imageInput = document.getElementById('image-input');
const imagePreview = document.getElementById('image-preview');

imageInput.addEventListener('change', () => {
    const file = imageInput.files[0];
    const fileReader = new FileReader();
    fileReader.onload = () => {
        const image = new Image();
        image.src = fileReader.result;
        imagePreview.innerHTML = '';
        imagePreview.appendChild(image);
    }
    fileReader.readAsDataURL(file);
});