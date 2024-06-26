<?php
$titre = 'warProg - Apprendre en Ligne';
$CSS = 'Style/Acceuil.css'; // Assurez-vous que ce chemin est correct
$lienQcm = 'View/Qcm.php';
$lienCntct = 'View/Contact.php';
session_start();

require_once('../Controller/ControlleurUser.php');
$conn = new ControlleurUser();

ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../Style/Discussion.css">
    <link rel="icon" type="image/png" sizes="64x64" href="../Media/file (3).png">
    <title><?php echo $titre; ?></title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <!-- <i class='bx bx-code-alt'></i> -->
            <img src="../Media/file (3).png" alt="">
            <div class="logo-name"><span>war</span>Prog</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="DashboardBasic.php" id="dashboard" onclick="onDashboardClick()"><i class='bx bxs-dashboard'></i>Tableau de bord</a>
            </li>
            <li><a href="DashboardBasic.php?section=cours" id="Cours"><i class='bx bx-store-alt'></i>Cours</a></li>
            <li><a href="DashboardBasic.php?section=qcm" id="Qcm"><i class='bx bx-analyse'></i>Qcm</a></li>
            <li><a href="DashboardBasic.php?section=forum" id="Forum" onclick="onForumclick()"><i class='bx bx-message-square-dots'></i>Forum</a></li>
            <!-- <li><a href="#"><i class='bx bx-group'></i>Users</a></li>
            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li> -->
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout" id="dcnx">
                    <i class='bx bx-log-out-circle'></i>
                    Déconnexion
                </a>
            </li>
        </ul>

    </div>
    <?php
    echo "<script>";
    echo "let dcnx = document.getElementById('dcnx');";
    echo "dcnx.addEventListener('click', () => {
                    document.location.href = '../index.php?action=deconnexion';
                });";
    echo "</script>";
    ?>
    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form method="post">
                <div class="form-input" Style="display : none ;">
                    <input type="search" placeholder="Search..." name="search" id="searchInput" value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
                    <button class="search-btn" onclick="reload()" type="submit" name="submit" id="searchButton"><i class='bx bx-search'></i></button>
                </div>
            </form>

            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <!-- <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a> -->
            <a href="#" class="profile">
                <img src="../<?php echo $_SESSION['photo'] ?>">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Tableau de bord</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Discussion
                            </a></li>
                        /
                        <li><a href="#" class="active">Forum</a></li>
                    </ul>
                </div>
        </main>
    </div>

    <section class="comments">
        <?php
        // Vérifie si l'identifiant de la discussion est présent dans l'URL
        if (isset($_GET['discussion_id'])) {
            $discussion_id = $_GET['discussion_id'];
            // Filtrer les commentaires pour afficher uniquement ceux de cette discussion
            $commentaires = array_filter($_SESSION['commentaires'], function ($comm) use ($discussion_id) {
                return $comm['discussion_id'] == $discussion_id;
            });
        ?>
            <h1 class="heading"><?php echo count($commentaires); ?> commentaires</h1>

            <form method="post" action="../index.php?action=ajoutComm" enctype="multipart/form-data" class="add-comment">
                <h3>ajouter un commentaire</h3>
                <textarea name="comment_box" placeholder="tapez votre commentaire" required maxlength="1000" cols="30" rows="10"></textarea>
                <!-- Champ caché pour stocker l'identifiant de la discussion -->
                <input type="hidden" name="discussion_id" value="<?php echo $_GET['discussion_id']; ?>">
                <input type="submit" value="ajouter un commentaire" class="inline-btn" name="add_comment">
            </form>


            <h1 class="heading">commentaires</h1>

            <div class="box-container">
                <article class="box">
                    <?php
                    if (!empty($commentaires)) {
                        foreach ($commentaires as $comm) {
                            echo '<header class="user">';
                            echo '<img src="../' . $comm['photo'] . '" alt="">';
                            echo "<div>";
                            echo "<h3>" . $comm['nom'] . " " . $comm['prenom'] . "</h3>";
                            echo "<p>Date de publication : " . $comm['date_creation'] . "</p>"; // Ajout de la date de publication
                            echo "</div>";
                            echo "</header>";
                            echo '<div class="comment-box">' . $comm['texte_commentaire'] . "</div>";
                            // Afficher les réponses s'il y en a
                            if (isset($_SESSION['reponse_utilisateur']) && is_array($_SESSION['reponse_utilisateur'])) {
                                echo '<h2 > Reponses : </h2>';
                                foreach ($_SESSION['reponse_utilisateur'] as $reponse) {
                                    if ($reponse['id_commentaire'] == $comm['id_commentaire']) {
                                        echo '<div class="reply-box">';
                                        echo '<header class="user">';
                                        echo '<img src="../' . $reponse['photo'] . '" alt="">';
                                        echo "<div>";
                                        echo "<h3>" . $reponse['nom'] . " " . $reponse['prenom'] . "</h3>";
                                        echo "<p>Date de reponse : " . $reponse['date_reponse'] . "</p>"; // Ajout de la date de publication
                                        echo "</div>";
                                        echo "</header>";
                                        echo '<div class="comment-box">' . $reponse['texte_reponse']  . "</div>";
                                        echo '</div>';
                                    }
                                }
                            }

                            // Formulaire de réponse
                            echo '<form method="post" action="../index.php?action=repondreComm" class="reply-box1">';
                            echo '<textarea name="reponse_box" placeholder="Répondre à ce commentaire" required maxlength="1000" cols="30" rows="3" class="reply-box1"></textarea>';
                            echo '<input type="hidden" name="comment_id" value="' . $comm['id_commentaire'] . '">';
                            echo '<input type="submit" value="Répondre" class="reply-box1" name="repondre_comment">';
                            echo '</form>';
                        }
                    } else {
                        echo "Aucun commentaire trouvé pour cette discussion.";
                    }
                    ?>
                </article>
            </div>
        <?php
        } else {
            // Si aucun identifiant de discussion n'est présent dans l'URL, affichez un message d'erreur ou redirigez l'utilisateur
            echo "Identifiant de discussion non spécifié.";
        }
        ?>
    </section>

    <script src="../Assets/js/DashboardBasic.js"></script>
</body>

</html>
<?php
$contenu = ob_get_clean();
echo $contenu;
?>