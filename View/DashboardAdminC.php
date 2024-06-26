<?php
$titre = 'warProg - Apprendre en Ligne';
$CSS = 'Style/Acceuil.css'; // Assurez-vous que ce chemin est correct
$lienQcm = 'View/Qcm.php';
$lienCntct = 'View/Contact.php';
session_start();

require_once('../Controller/ControlleurCours.php');
$conn = new ControlleurCours();
if (isset($_GET['id_cours'])) {
    $videos = $conn->getVideos($_GET['id_cours']);
}

if (isset($_GET['id_cours_pdf'])) {
    $pdfs = $conn->getPdfs($_GET['id_cours_pdf']);
}



ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../Style/DashboardAdmin.css">
    <link rel="icon" type="image/png" sizes="64x64" href="../Media/file (3).png">
    <title><?php echo $titre; ?></title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../Media/file (3).png">
                    <h2>war<span class="danger">Prog</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="DashboardAdmin.php" id="dashboard">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Tableau de bord</h3>
                </a>
                <a href="DashboardAdminE.php" id="users">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Étudiants</h3>
                </a>
                <a href="DashboardAdminC.php" id="cours" class="active">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>Cours</h3>
                </a>
                <a href="DashboardAdminQ.php" id="qcm">
                    <span class="material-icons-sharp">
                        quiz
                    </span>
                    <h3>Qcm</h3>
                </a>
                <a href="#" id="dcnx">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Déconnexion</h3>
                </a>

            </div>
        </aside>
        <?php
        echo "<script>";
        echo "let dcnx = document.getElementById('dcnx');";
        echo "dcnx.addEventListener('click', () => {
                    document.location.href = '../index.php?action=deconnexion';
                });";
        echo "</script>";
        ?>

        <main>


            <div class="recent-orders coursAll">
                <h2>Cours</h2>
                <table>
                    <thead>
                        <tr>
                            <!-- <th class="hide-on-small">Nombre</th> -->
                            <th>Nom</th>
                            <th class="hide-on-small">Catégorie</th>
                            <th>Prix</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                        if (isset($_SESSION['cours'])) {
                            // Affichage des utilisateurs à partir de la session
                            foreach ($_SESSION['cours'] as $cour) {
                                echo "<tr>";
                                // echo "<td class='hide-on-small'>" . $cour['id'] . "</td>";
                                echo "<td>" . $cour['titre'] . "</td>";
                                echo "<td class='hide-on-small'>" . $cour['categorie'] . "</td>";
                                echo "<td>" . $cour['prix'] . "€</td>";
                                echo "<td><a href='DashboardAdminC.php?id_cours=" . $cour['id'] . "' >
                                <span class='material-icons-sharp'>
                                    videocam
                                </span>
                            </a></td>";
                                echo "<td><a href='DashboardAdminC.php?id_cours_pdf=" . $cour['id'] . "'>
                                <span class='material-icons-sharp'>
                                    picture_as_pdf
                                </span>
                            </a></td>";
                                echo "<td><a href='CoursEdit.php?id={$cour["id"]}' >
                                <span class='material-icons-sharp'>
                                    edit
                                </span>
                            </a></td>";
                                echo '</tr>';
                            }
                        } else {
                            echo "<tr><td colspan='3'>Aucun cours trouvé.</td></tr>";
                        }
                        ?>
                    </thead>
                    <tbody></tbody>
                </table>
                <a href="Cours.php">Ajoutez un cours</a>
            </div>



        </main>
        <!-- End of Main Content -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp ">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php
                                    echo "" . $_SESSION['prenom'] . "";
                                    ?>
                            </b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../<?php echo $_SESSION['photo'] ?>">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->


            <?php
            if (isset($_GET['id_cours'])) {
            ?>
                <div class=" user-profile">
                    <div class="logo">
                        <!-- <img src="../Media/file (3).png"> -->
                        <video src="../<?php echo $videos[0]['path'] ?>" id="video" type="video/mp4" controls onpause=""></video>
                        <h2 id="vidTitle"></h2>
                    </div>
                </div>

                <div class="reminders">
                    <div class="header">
                        <h2>Vidéos</h2>
                        <span class="material-icons-sharp">
                            videocam
                        </span>
                    </div>
                    <?php
                    foreach ($videos as $video) {
                    ?>
                        <div class="notification" onclick="changeVideo('../<?php echo $video['path'] ?>','<?php echo $video['titre'] ?>' ,this)">
                            <div class="icon">
                                <span class="material-icons-sharp">
                                    play_circle
                                </span>
                            </div>
                            <div class="content">
                                <div class="info">
                                    <h3><?php echo $video['titre'] ?></h3>
                                    <!-- <small class="text_muted">
                                        08:00 AM - 12:00 PM
                                    </small> -->
                                </div>
                                <span class="material-icons-sharp" onclick="modifVideo(<?php echo $video['id'] ?>)">
                                    edit
                                </span>
                            </div>
                        </div>
                    <?php } ?>


                    <div class="notification add-reminder" onclick="ajoutVideo(<?php echo $_GET['id_cours'] ?>)">
                        <div>
                            <span class="material-icons-sharp">
                                add
                            </span>
                            <h3>Ajoutez une vidéo</h3>
                        </div>
                    </div>

                </div>
            <?php

            } elseif (isset($_GET['id_cours_pdf'])) {

            ?>
                <div class=" user-profile">
                    <div class="logo">
                        <img src="../Media/file (3).png">
                        <h2>warProg</h2>
                        <p>Fullstack Web Developers</p>
                    </div>
                </div>
                <div class="reminders">

                    <div class="header">
                        <h2>PDF</h2>
                        <span class="material-icons-sharp">
                            picture_as_pdf
                        </span>
                    </div>
                    <?php
                    foreach ($pdfs as $key => $pdf) {
                    ?>
                        <div class="notification " onclick="afficherPdf('<?php echo $pdf['path'] ?>')">
                            <!-- <div class="icon">
                                <span class="material-symbols-outlined">
                                    draft
                                </span>
                            </div> -->
                            <div class="content">
                                <div class="info">
                                    <h3><?php echo $pdf['titre'] ?></h3>
                                    <!-- <small class="text_muted">
                                    08:00 AM - 12:00 PM
                                </small> -->
                                </div>
                                <span class="material-icons-sharp" onclick="modifPdf(<?php echo $pdf['id'] ?>)">
                                    edit
                                </span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="notification add-reminder" onclick="ajoutPdf(<?php echo $_GET['id_cours_pdf'] ?>)">
                        <div>
                            <span class="material-icons-sharp">
                                add
                            </span>
                            <h3>Ajouter un PDF</h3>
                        </div>
                    </div>

                </div>
            <?php
            } else {
            ?>


                <div class=" user-profile">
                    <div class="logo">
                        <img src="../Media/file (3).png">
                        <h2>warProg</h2>
                        <p>Fullstack Web Developers</p>
                    </div>
                </div>

            <?php  } ?>
        </div>



    </div>
    <script src="../Assets/js/index.js"></script>
    <script src="../Assets/js/orders.js"></script>
</body>

</html>
<?php
$contenu = ob_get_clean();
echo $contenu;
?>