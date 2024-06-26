function handleSubmit(event) {
    event.preventDefault(); // Empêche le rechargement de la page
    var form = document.querySelector('.contact-form');
    var inputs = form.querySelectorAll('input, textarea');

    // Vider les champs
    inputs.forEach(function(input) {
        input.value = '';
    });

    // Afficher le message de remerciement
    var thankYouMessage = document.getElementById('thank-you-message');
    thankYouMessage.style.display = 'block'; // Affiche le message

    // // Afficher le bouton "Retour à l'accueil"
    // var backToHomeButton = document.getElementById('back-to-home');
    // backToHomeButton.style.display = 'block';
}
