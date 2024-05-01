// script.js

function updateSelectedCategories(selectElement) {
    var selectedCategoriesDiv = document.getElementById("selectedCategories");
    selectedCategoriesDiv.innerHTML = ""; // Effacez le contenu précédent

    for (var i = 0; i < selectElement.selectedOptions.length; i++) {
        var selectedOption = selectElement.selectedOptions[i];
        selectedCategoriesDiv.innerHTML += '<span class="selectedCategory">' + selectedOption.text + '</span>';
    }
}

/*document.getElementById('uploadForm').addEventListener('submit', function (event) {
    event.preventDefault();

    // Reste du code pour envoyer la requête AJAX vers votre script PHP
});*/

// script.js

function submitForm() {
    document.getElementById("categorieForm").submit();
}

document.getElementById('photo').addEventListener('change', function() {
    validerExtensionFichier(this);
});

function validerExtensionFichier(champFichier) {
    var extensionsAutorisees = ['png', 'jpeg', 'jpg'];

    // Récupérer le nom du fichier
    var nomFichier = champFichier.value.split('\\').pop();

    // Si le champ de fichier est vide, ne rien faire
    if (nomFichier.trim() === '') {
        alert('Veuillez sélectionner un fichier.');
        champFichier.value = ''; // Effacer le champ de fichier
        return false; // Validation échouée
    }

    // Récupérer l'extension du fichier
    var extensionFichier = nomFichier.split('.').pop().toLowerCase();

    // Vérifier si l'extension est autorisée
    if (extensionsAutorisees.indexOf(extensionFichier) === -1) {
        alert('Veuillez sélectionner un fichier en format PNG, JPEG ou JPG.');
        champFichier.value = ''; // Effacer le champ de fichier
        return false; // Validation échouée
    }

    return true; // Validation réussie
}

function Valide(event) {
    // Récupérer le bouton de soumission du formulaire
    var boutonSoumission = document.getElementById('submit-button');

    // Récupérer les valeurs des champs
    var nomPhoto = document.getElementById('nomphoto').value;
    var prix = document.getElementById('prix').value;

    // Validation du nombre de caractères dans "nomPhoto"
    if (nomPhoto.length < 4) {
        alert('Le nom de la photo doit comporter au moins 4 caractères.');
        // Réactiver le bouton
        boutonSoumission.disabled = false;
        return false; // Empêche l'envoi du formulaire
    }

    // Validation de la positivité du champ "prix"
    if (prix <= 0) {
        alert('Le prix doit être un nombre positif.');
        // Réactiver le bouton
        boutonSoumission.disabled = false;
        return false; // Empêche l'envoi du formulaire
    }

    // Validation de l'extension du fichier
    var champPhoto = document.getElementById('photo');
    if (!validerExtensionFichier(champPhoto)) {
        // Réactiver le bouton
        boutonSoumission.disabled = false;
        return false; // Empêche l'envoi du formulaire
    }

    // Autres validations à ajouter selon vos besoins

    return true; // Permet l'envoi du formulaire si toutes les validations sont réussies
}

// fonction pour valider le formulaire vers de affichage_Photos.php
function valideForm(formID) {
    document.getElementById(formID).submit();
}
