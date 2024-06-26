<?php
session_start();
$titre = 'warProg - Apprendre en Ligne';
$CSS = '../Style/AdminAjoutUser.css'; // Assurez-vous que ce chemin est correct
$JS = '../Assets/js/ConnexionInscription.js';

ob_start();
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
</head>

<body>

    <body>

        <div class="container" id="container">
            <div class="form-container sign-in">
                <form method="post" action="../index.php?action=adminAjoutUser" enctype="multipart/form-data">
                    <h1>Inscription</h1>
                    <input type="text" placeholder="Nom" name="nom" required>
                    <input type="text" placeholder="Prenom" name="prenom" required>
                    <input type="file" id="filename" placeholder="Image" name="image" accept="image/png, image/gif, image/jpeg" onchange="validateFileType()" required>
                    <p id="msg-error" hidden></p>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="password" placeholder="Mot de passe" name="mdp" required>
                    <button type="submit" name="inscription">Inscription</button>
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
                        <h1>Bienvenue</h1>
                        <p>Entamez votre parcours d'apprentissage avec notre équipe d'experts !</p>
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