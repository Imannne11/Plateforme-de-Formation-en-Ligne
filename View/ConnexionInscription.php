<?php
session_start();
$titre = 'warProg - Apprendre en Ligne';
$CSS = '../Style/ConnexionInscription.css'; // Assurez-vous que ce chemin est correct
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

    <body onload="auth()">

        <div class="container" id="container">
            <div class="form-container sign-up">
                <form method="post" action="../index.php?action=inscription" enctype="multipart/form-data">
                    <h1>Inscription</h1>
                    <input type="text" placeholder="Nom" name="nom" required>
                    <input type="text" placeholder="Prenom" name="prenom" required>
                    <input type="file" id="filename" placeholder="Image" name="image" accept="image/png, image/gif, image/jpeg" onchange="validateFileType()" required>
                    <p id="msg-error" class="msg-error" hidden></p>
                    <input type="email" placeholder="Email" name="email" required>
                    <input id="mdp1" type="password" placeholder="Mot de passe" name="mdp" required>
                    <input id="mdp2" type="password" placeholder="Confirmer Mot de passe" name="mdp" onchange="confimerMDP()" required>
                    <p id="msg-mdp" class="msg-error" hidden></p>
                    <button type="submit" name="inscription" id="insc">Inscription</button>
                    <label for="">

                    </label>
                </form>
            </div>
            <div class="form-container sign-in">
                <form method="post" action="../index.php?action=connexion">
                    <h1>Connexion</h1>

                    <input type="email" placeholder="Email" name="email" required>
                    <input type="password" placeholder="Mot de passe" name="mdp" required>
                    <!-- <a href="#">Forget Your Password?</a> -->
                    <p id="auth" class="msg-error" hidden></p>
                    <button type="submit" name="connexion">Connexion</button>
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Content de vous revoir!</h1>
                        <p>Connectez-vous à votre compte et explorez vos cours préférés en toute facilité</p>
                        <button class="hidden" id="login">Connexion</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Bienvenue</h1>
                        <p>Entamez votre parcours d'apprentissage avec notre équipe d'experts !</p>
                        <button class="hidden" id="register">Inscription</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function auth() {
                let e = "<?php echo $_GET['error'] ?>";
                if (e == "error") {
                    document.getElementById('auth').style.display = 'block';
                    document.getElementById('auth').innerHTML = "Informations incorrect !";
                } else if (e == "errori") {
                    document.getElementById('msg-mdp').style.display = 'block';
                    document.getElementById('msg-mdp').innerHTML = "Email déjà souscrit";
                    container.classList.add("active");
                } else {
                    document.getElementById('msg-mdp').style.display = 'none';
                    document.getElementById('msg-mdp').innerHTML = "";
                    document.getElementById('msg-mdp').style.display = 'none';
                    document.getElementById('msg-mdp').innerHTML = "";
                }
            }
        </script>
        <script src="<?php echo $JS; ?>"></script>
    </body>

</html>
<?php
$contenu = ob_get_clean();
echo $contenu;
?>