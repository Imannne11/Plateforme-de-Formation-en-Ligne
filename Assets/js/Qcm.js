// Fonction pour définir le score dans le stockage local
function setScore(score) {
    localStorage.setItem('score', score);
}

// Fonction pour récupérer le score du stockage local
function getScore() {
    return parseInt(localStorage.getItem('score')) || 0;
}

// Déclaration des variables globales
var id_question, question_id, next_question_id, question, xmlfile;
// Utilisez la variable JavaScript xmlPath pour obtenir le chemin d'accès au fichier XML
var pathToXml = '../' + xmlPath;

// Récupérer le score à partir du stockage local
var score = getScore();

// Fonction pour rediriger vers le début du quiz et réinitialiser le score
function restartQuiz() {
    setScore(0); // Réinitialiser le score dans le stockage local
    window.location.href = "../View/qcm.php?path=" + encodeURIComponent(xmlPath) + "&q=1";
}


// Fonction pour rediriger vers la page d'accueil et réinitialiser le score
function returnHome() {
    setScore(0); // Réinitialiser le score dans le stockage local
    window.location.href = "DashboardBasic.php"; // Remplacez "accueil.php" par l'URL de votre page d'accueil
}

document.addEventListener("DOMContentLoaded", function () {
    // Assurez-vous que l'élément avec l'ID 'nextButton' est disponible dans le DOM avant d'attacher l'événement click
    var nextButton = document.getElementById('nextButton');

    // Vérifiez si le bouton existe avant d'attacher l'événement
    if (nextButton) {
        nextButton.addEventListener('click', function () {
            var radios = document.getElementsByName('reponse[' + id_question + ']');
            var checked = false;
            var selectedAnswer = null;
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    checked = true;
                    selectedAnswer = radios[i].value;
                    radios[i].parentElement.classList.add('selected-answer'); // Appliquer la classe CSS
                } else {
                    radios[i].parentElement.classList.remove('selected-answer'); // Retirer la classe CSS des autres choix
                }
            }
            if (checked) {
                // Vérifier si la réponse sélectionnée est correcte
                var correctAnswer = question.correct_answer;
                if (selectedAnswer === correctAnswer) {
                    // Si la réponse est correcte, incrémenter le score
                    score++;
                }

                // Mettre à jour le score dans le stockage local
                setScore(score);

                // Vérifier si c'est la dernière question
                var lastQuestionId = xmlfile.question.length;
                var currentQuestionId = question_id;
                if (currentQuestionId === lastQuestionId) {
                    // Si c'est la dernière question, afficher le score final
                    // var scoreContainer = document.createElement('div');
                    // scoreContainer.innerHTML = "<h2>Score final:</h2><p>" + score + "/" + xmlfile.question.length + "</p><p>Merci d'avoir soumis vos réponses!</p>";
                    var scoreContainer = document.createElement('div');
                    scoreContainer.innerHTML = "<h2>Score final:</h2><p>" + score + "/" + xmlfile.question.length + "</p><p>Merci d'avoir soumis vos réponses!</p>";

                    if (score < 5) {
                        var message = document.createElement('p');
                        message.textContent = "Votre score est en deçà de nos attentes. Nous vous encourageons vivement à envisager de suivre le cours pour approfondir vos connaissances.";
                        scoreContainer.appendChild(message);
                    } else {
                        var message = document.createElement('p');
                        message.textContent = "Félicitations pour votre score! Pour enrichir davantage vos connaissances, nous vous recommandons également de suivre le cours.";
                        scoreContainer.appendChild(message);
                    }



                    // Ajouter les boutons de recommencement et de retour à l'accueil
                    var buttonContainer = document.createElement('div');
                    buttonContainer.className = "button-container";

                    // Bouton pour recommencer le quiz
                    var restartButton = document.createElement('button');
                    restartButton.innerHTML = "Recommencer le quiz";
                    restartButton.className = "button-qcm"; // Ajouter la classe du bouton
                    restartButton.addEventListener('click', restartQuiz);
                    buttonContainer.appendChild(restartButton);

                    // Bouton pour retourner à l'accueil
                    var homeButton = document.createElement('button');
                    homeButton.innerHTML = "Retour à l'accueil";
                    homeButton.className = "button-qcm"; // Ajouter la classe du bouton
                    homeButton.addEventListener('click', returnHome);
                    buttonContainer.appendChild(homeButton);

                    // Ajouter le score et les boutons au conteneur du quiz
                    var quizContainer = document.querySelector('.game-quiz-container');
                    quizContainer.innerHTML = ''; // Effacer le contenu précédent
                    quizContainer.appendChild(scoreContainer);
                    quizContainer.appendChild(buttonContainer);
                }
                else {
                    // Passer à la question suivante
                    var nextQuestionId = next_question_id;
                    // Obtenir le chemin d'accès actuel
                    var currentPath = window.location.pathname;

                    // Obtenir les paramètres de la requête actuelle
                    var queryParams = window.location.search;

                    // Construire l'URL de redirection en incluant à la fois le chemin d'accès et les paramètres de requête actuels
                    var redirectTo = currentPath + queryParams + "&q=" + nextQuestionId;

                    // Rediriger vers la prochaine question en conservant le chemin et les autres paramètres de la requête
                    window.location.href = redirectTo;

                }
            } else {
                alert('Veuillez sélectionner une réponse.');
            }
        });
    }

    // Création des boutons de recommencement et de retour à l'accueil
    var buttonContainer = document.createElement('div');
    buttonContainer.className = "button-container";

    // Bouton pour recommencer le quiz
    if (question_id > 1) {
        var restartButton = document.createElement('button');
        restartButton.innerHTML = "Recommencer le quiz";
        restartButton.className = "button-qcm"; // Ajouter la classe du bouton
        restartButton.addEventListener('click', restartQuiz);
        buttonContainer.appendChild(restartButton);
    }

    // Bouton pour retourner à l'accueil
    var homeButton = document.createElement('button');
    homeButton.innerHTML = "Retour à l'accueil";
    homeButton.className = "button-qcm"; // Ajouter la classe du bouton
    homeButton.addEventListener('click', returnHome);
    buttonContainer.appendChild(homeButton);

    // Ajouter les boutons au conteneur du quiz
    var quizContainer = document.querySelector('.game-quiz-container');
    quizContainer.appendChild(buttonContainer);
});
document.addEventListener("DOMContentLoaded", function () {
    // Sélectionner toutes les options
    var options = document.querySelectorAll('.game-options-container label');

    // Fonction pour sélectionner une option et changer la couleur du texte
    function selectOption(label) {
        // Réinitialiser la couleur de toutes les options
        options.forEach(option => {
            option.style.color = ''; // Réinitialiser la couleur
        });

        // Changer la couleur de l'option sélectionnée en rouge
        label.style.color = 'red'; // Changer la couleur en rouge (ou la couleur souhaitée)
    }

    // Ajouter un événement click à chaque option
    options.forEach(option => {
        option.addEventListener('click', function () {
            selectOption(this);
        });
    });
});