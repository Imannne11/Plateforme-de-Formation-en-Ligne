<?php
session_start();

$titre = 'warProg - Apprendre en Ligne';
$CSS = '../Style/Qcm.css'; // Chemin vers le fichier CSS
ob_start();

function calculerScore($reponses)
{

    if (isset($_GET['path'])) {
        $xml_path = '../' . $_GET['path']; // Préfixez avec '../' si nécessaire
        $xmlfile = simplexml_load_file($xml_path);
        if ($xmlfile === false) {
            die('Erreur de chargement du fichier XML.');
        }
    } else {
        die('Le chemin vers le fichier XML est manquant.');
    }


    $score = 0;

    foreach ($reponses as $id_question => $reponse) {
        $reponse_correcte = (string)$xmlfile->question[intval($id_question) - 1]->correct_answer;
        if ($reponse == $reponse_correcte) {
            $score++;
        }
    }
    return $score;
}
$question_id = isset($_GET['q']) ? intval($_GET['q']) : 1;
if (isset($_GET['path'])) {
    $xml_path = '../' . $_GET['path'];
    $xmlfile = simplexml_load_file($xml_path);
    if ($xmlfile === false) {
        die('Erreur de chargement du fichier XML.');
    }
} else {
    die('Le chemin vers le fichier XML est manquant.');
}



if ($question_id < 1 || $question_id > count($xmlfile->question)) {
    die('Question non trouvée.');
}

$question = $xmlfile->question[$question_id - 1];
$id_question = (string) $question['id'];
$text_question = (string) $question->text;
$lettres_options = ['A', 'B', 'C', 'D'];

$next_question_id = $question_id + 1;

// Variable pour stocker le score
$score = 0;

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les réponses fournies par l'utilisateur depuis le formulaire
    $reponses_utilisateur = $_POST['reponse'];

    // Calculer le score
    $score = calculerScore($reponses_utilisateur);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre; ?></title>
    <link rel="stylesheet" href="<?php echo $CSS; ?>">
    <link rel="icon" type="image/png" sizes="64x64" href="../Media/file (3).png">
    <title><?php echo $titre; ?></title>
    <style>
        /* Définissez la couleur du texte de la classe selected-answer en rouge */
        .selected-answer {
            color: red;
        }
    </style>
</head>

<body>
    <main>
        <div class="game-quiz-container">
            <div class="game-details-container">
                <h1>Quiz : Question à choix multiples</h1>
            </div>

            <div class="game-question-container">
                <h1><?php echo $text_question; ?></h1>
            </div>

            <form id="quizForm" class="game-options-container" action="..\Controller\ControlleurQcm.php" method="POST">
                <?php foreach ($question->option as $option) : ?>
                    <?php
                    $id_option = (string) $option['id'];
                    $text_option = (string) $option;
                    ?>
                    <span id>
                        <input type='radio' style="display: none;" class='selected' name='reponse[<?php echo $id_question; ?>]' value='<?php echo $id_option; ?>' id="<?php echo $id_option; ?>">
                        <!-- Ajoutez un événement onclick à chaque option -->
                        <label for="<?php echo $id_option; ?>" onclick="selectOption(this)"><?php echo $text_option; ?></label>
                    </span>
                <?php endforeach; ?>
            </form>

            <div class="next-button-container">
                <!-- Ajoutez ces lignes à votre fichier PHP -->
                <button id="nextButton" class="button-qcm">Suivant</button>
            </div>

        </div>
    </main>

    <script>
        // Passer les variables PHP à JavaScript
        var id_question = <?php echo json_encode($id_question); ?>;
        var question_id = <?php echo json_encode($question_id); ?>;
        var next_question_id = <?php echo json_encode($next_question_id); ?>;
        var score = <?php echo json_encode($score); ?>;
        var question = <?php echo json_encode($question); ?>;
        var xmlfile = <?php echo json_encode($xmlfile); ?>;
        var xmlPath = "<?php echo htmlspecialchars($_GET['path']); ?>";
    </script>

    <script src="../Assets/js/Qcm.js"></script>

</body>

</html>

<?php
$contenu = ob_get_clean(); // Récupère le contenu du tampon de sortie et le vide
echo $contenu; // Affiche le contenu de la page
// require_once('../controller/controlleurQCM.php');
?>
















<!-- <script>
    // Fonction pour rediriger vers le début du quiz
    function restartQuiz() {
        window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>";
    }

    // Fonction pour rediriger vers la page d'accueil
    function returnHome() {
        window.loca   <script src="quiz.js"></script>
<script>
    // Pass PHP variables to JavaScript
    var id_question = <?php echo $id_question; ?>;
    var question_id = <?php echo $question_id; ?>;
    var next_question_id = <?php echo $next_question_id; ?>;
    var score = <?php echo $score; ?>;
    var question = <?php echo json_encode($question); ?>;
    var xmlfile = <?php echo json_encode($xmlfile); ?>;
</script>tion.href = "Acceuil.php"; // Remplacez "accueil.php" par l'URL de votre page d'accueil
    }

    document.getElementById('nextButton').addEventListener('click', function() {
        var radios = document.getElementsByName('reponse[<?php echo $id_question; ?>]');
        var checked = false;
        var selectedAnswer = null;
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                checked = true;
                selectedAnswer = radios[i].value;
            }
        }
        if (checked) {
            // Vérifier si la réponse sélectionnée est correcte
            var correctAnswer = "<?php echo $question->correct_answer; ?>";
            if (selectedAnswer === correctAnswer) {
                // Si la réponse est correcte, incrémenter le score
                <?php $score++; ?>
            }

            // Vérifier si c'est la dernière question
            var lastQuestionId = <?php echo count($xmlfile->question); ?>;
            var currentQuestionId = <?php echo $question_id; ?>;
            if (currentQuestionId === lastQuestionId) {
                // Si c'est la dernière question, afficher le score final
                var scoreContainer = document.createElement('div');
                scoreContainer.innerHTML = "<h2>Score final:</h2><p><?php echo $score; ?>/<?php echo count($xmlfile->question); ?></p><p>Merci d'avoir soumis vos réponses!</p>";

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
            } else {
                // Passer à la question suivante
                var nextQuestionId = <?php echo $next_question_id; ?>;
                window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?q=" + nextQuestionId;
            }
        } else {
            alert('Veuillez sélectionner une réponse.');
        }
    });

    // Création des boutons de recommencement et de retour à l'accueil
    var buttonContainer = document.createElement('div');
    buttonContainer.className = "button-container";

    // Bouton pour recommencer le quiz
    <?php if ($question_id > 1) : ?>
    var restartButton = document.createElement('button');
    restartButton.innerHTML = "Recommencer le quiz";
    restartButton.className = "button-qcm"; // Ajouter la classe du bouton
    restartButton.addEventListener('click', restartQuiz);
    buttonContainer.appendChild(restartButton);
    <?php endif; ?>

    // Bouton pour retourner à l'accueil
    var homeButton = document.createElement('button');
    homeButton.innerHTML = "Retour à l'accueil";
    homeButton.className = "button-qcm"; // Ajouter la classe du bouton
    homeButton.addEventListener('click', returnHome);
    buttonContainer.appendChild(homeButton);

    // Ajouter les boutons au conteneur du quiz
    var quizContainer = document.querySelector('.game-quiz-container');
    quizContainer.appendChild(buttonContainer);
</script> -->