<footer>
    <div class="footer">
        <ul class="list1">
            <li class="line">Politique de Confidentialité</li>
            <li class="montserrat">test</li>
            <li class="montserrat">test</li>
            <li class="montserrat">test</li>
        </ul>
        <ul class="list2">
            <li class="line">Politique d'utilisation des cookies</li>
            <li class="montserrat">test</li>
            <li class="montserrat">test</li>
            <li class="montserrat">test</li>
        </ul>
        <ul class="list3">
            <li class="line">Conditions d'utilisation</li>
            <li class="montserrat">test</li>
            <li class="montserrat">test</li>
            <li class="montserrat">test</li>
        </ul>
    </div>
</footer>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const btnUpdateProfile = document.getElementById("btnUpdate");
  const btnSaveProfile = document.getElementById("btnSave");
  const inputs = document.querySelectorAll("#change");

  // Ajouter un écouteur d'événement au bouton "Modifier"
  btnUpdateProfile.addEventListener("click", function() {
    // Activer les champs de saisie
    inputs.forEach(input => {
      input.disabled = false;
    });

    // Changer le texte du bouton en "Enregistrer"
    btnUpdateProfile.style.display = "none";
    btnSaveProfile.style.display = "inline-block";
    btnSaveProfile.focus();
  });

  // Ajouter un écouteur d'événement au bouton "Enregistrer"
  btnSaveProfile.addEventListener("click", function() {
    // Restaurer le texte du bouton en "Modifier"
    btnSaveProfile.style.display = "none";
    btnUpdateProfile.style.display = "inline-block";

    // Rétablir les champs de saisie en lecture seule
    inputs.forEach(input => {
      input.readOnly = true;
    });
    for (var i = 0; i < inputs.length; i++) {
    inputs[i].removeAttribute("disabled");
  }
  document.getElementById("btnSave").removeAttribute("disabled");

    // Soumettre le formulaire
    document.getElementById("btnSave").submit();
  });
});
</script>
</body>

</html>