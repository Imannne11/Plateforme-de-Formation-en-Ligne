<?php
session_start();
$titre = 'warProg - Apprendre en Ligne';
$CSS = '../Style/User.css'; // Assurez-vous que ce chemin est correct
$JS = '../Assets/js/ConnexionInscription.js';

require_once('../Controller/ControlleurUser.php');
$conn = new ControlleurUser();
$user = $conn->getUser($_GET['id']);

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

    <body onload="basicCase()">

        <div class="container" id="container">
            <div class="form-container sign-in">
                <form method="post" action="../index.php?action=adminEditUser" enctype="multipart/form-data" id="userForm">
                    <h1>Inscription</h1>
                    <input type="text" value="<?php
                                                echo $user['id'];
                                                ?>" name='id' hidden>
                    <input type=" text" placeholder="Nom" name="nom" value="<?php
                                                                            echo $user['nom'];
                                                                            ?>" required>
                    <input type="text" placeholder="Prenom" name="prenom" value="<?php
                                                                                    echo $user['prenom'];
                                                                                    ?>" required>
                    <input type="file" id="filename" placeholder="Image" name="image" value="<?php
                                                                                                echo $user['photo'];
                                                                                                ?>" accept="image/png, image/gif, image/jpeg" onchange="validateFileType()">
                    <p id="msg-error" hidden></p>
                    <input type="email" placeholder="Email" name="email" value="<?php
                                                                                echo $user['email'];
                                                                                ?>" required>
                    <input type="password" placeholder="Mot de passe" name="mdp" value="<?php
                                                                                        echo $user['mdp'];
                                                                                        ?>" required>
                    <button type="submit" name="inscription" onclick="setAction2()">Modifier</button>
                    <button id="btn-spr" type="submit" name="inscription" onclick="setAction('../index.php?action=adminRemoveUser')">Supprimer</button>

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
        <script>
            function setAction2() {
                let role = "<?php echo $_SESSION['role'] ?>";
                if (role == 'basic') {
                    document.getElementById('userForm').action = '../index.php?action=userEditUser';
                }
            }

            function basicCase() {
                let role = "<?php echo $_SESSION['role'] ?>";
                if (role == 'basic') {
                    document.getElementById('btn-spr').style.display = 'none';
                } else {
                    document.getElementById('btn-spr').style.display = 'block';
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