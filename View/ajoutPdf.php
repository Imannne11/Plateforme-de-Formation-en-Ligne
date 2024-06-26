<?php
session_start();
$titre = 'warProg - Apprendre en Ligne';
$CSS = '../Style/pdf.css'; // Assurez-vous que ce chemin est correct
$JS = '../Assets/js/ConnexionInscription.js';

ob_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo $CSS; ?>">
    <link rel="icon" type="image/png" sizes="64x64" href="../Media/file (3).png">
    <title><?php echo $titre; ?></title>
</head>

<body>

    <body>

        <div class="container" id="container">
            <div class="form-container sign-in">
                <form method="post" action="../index.php?action=adminAjoutPdf" enctype="multipart/form-data">
                    <h1>PDF</h1>
                    <input type="number" placeholder="id_cours" name="id_cours" value="<?php echo $_GET['id_cours'] ?>" hidden>
                    <input type="text" placeholder="Titre" name="titre" required>
                    <!-- <input type="text" placeholder="Catégorie" name="categorie" required> -->
                    <input type="file" id="filename" placeholder="Pdf" name="pdf" accept="application/pdf" onchange="validateFileType1()" required>
                    <p id="msg-error" hidden></p>
                    <!-- <input type="text" placeholder="Prix" name="prix" required> -->
                    <!-- <input type="password" placeholder="Mot de passe" name="mdp" required> -->
                    <button type="submit" name="inscription">Ajouter</button>
                </form>
            </div>
            <div class="form-container sign-up">
                <form method="post" action="../index.php?action=connexion">
                    <h1>Connexion</h1>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="password" placeholder="Mot de passe" name="mdp" required>
                    <!-- <a href="#">Forget Your Password?</a> -->
                    <button type="submit" name="connexion">Connexion</button>
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Content de vous revoir!</h1>
                        <p>Connectez-vous à votre compte et explorez vos cours préférés en toute facilité</p>
                        <!-- <button class="hidden" id="login">Connexion</button> -->
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Ajout PDF</h1>
                        <p>Vous êtes sur le point d'ajouter un PDF !</p>
                        <!-- <button class="hidden" id="register">Inscription</button> -->
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo $JS; ?>"></script>
    </body>

</html>
<?php
$contenu = ob_get_clean();
echo $contenu;
?>