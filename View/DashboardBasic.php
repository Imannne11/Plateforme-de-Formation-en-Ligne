<?php
$titre = 'warProg - Apprendre en Ligne';
$CSS = 'Style/Acceuil.css'; // Assurez-vous que ce chemin est correct
$lienQcm = 'View/Qcm.php';
$lienCntct = 'View/Contact.php';
session_start();

require_once('../Controller/ControlleurUser.php');
$conn = new ControlleurUser();
if (isset($_GET['id_cours'])) {
    $videos = $conn->getVideos($_GET['id_cours']);
    $pdfs = $conn->getPdf($_GET['id_cours']);
}
if (isset($_SESSION['searchResults'])) {

    $searchResults = $_SESSION['cours'];
} else {
    // Réinitialiser les résultats de recherche
    $searchResults = $_SESSION['cours'];
    $_SESSION['searchResults'] = $_SESSION['cours'];
}
// Utiliser les résultats de recherche s'ils existent, sinon utiliser les cours par défaut
$searchResults = isset($_SESSION['searchResults']) ? $_SESSION['searchResults'] : $_SESSION['cours'];


ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../Style/DashboardBasic.css">
    <link rel="icon" type="image/png" sizes="64x64" href="../Media/file (3).png">

    <title><?php echo $titre; ?></title>
</head>

<body onload="onload('<?php if (isset($_GET['section'])) {
                            echo $_GET['section'];
                        } ?>')">
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
            <li><a href="#" id="Cours" onclick="onCoursClick()"><i class='bx bx-store-alt'></i>Cours</a></li>
            <li><a href="#" id="Qcm" onclick="onQcmClick()"><i class='bx bx-analyse'></i>Qcm</a></li>
            <li><a href="#" id="Forum" onclick="onForumClick()"><i class='bx bx-message-square-dots'></i>Forum</a></li>

        </ul>
        <script>
            function reload() {
                let input = document.querySelector('.content form .form-input input');
                if (input.value === "") { // Vérifie si le champ de saisie est vide
                    window.location.href = 'DashboardBasic.php'; // Redirige vers Google
                } else {
                    window.location.href = 'DashboardBasic.php'; // Redirige vers DashboardBasic.php
                }
            }
        </script>
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
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form method="post">
                <div class="form-input">
                    <input type="search" placeholder="Search..." name="search" id="searchInput" value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
                    <button class="search-btn" onclick="reload()" type="submit" name="submit" id="searchButton"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <p>
                <?php
                // Vérifie si la clé 'search' existe dans $_POST avant de l'utiliser
                $searchTerm = isset($_POST['search']) ? $_POST['search'] : '';

                if (isset($_POST['submit'])) {
                    // Assurez-vous de nettoyer et valider les données de recherche pour éviter les injections SQL
                    // Effectuez la recherche des cours correspondants dans votre base de données ou autre source de données
                    $searchResults = $conn->searchCourses($searchTerm); // Supposons que vous avez une méthode searchCourses dans votre ControlleurUser
                }
                ?>



            </p>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="profile">
                <img src="../<?php echo $_SESSION['photo'] ?>">
            </a>
        </nav>


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

            </div>
            <ul class="insights discussion4">
                <?php if (isset($_SESSION['discussions']) && !empty($_SESSION['discussions'])) {
                    // Ouvrir le conteneur de la grille

                    // Boucle à travers les discussions stockées dans la session
                    for ($i = 0; $i <= 3; $i++) {
                        $discussion = $_SESSION['discussions'][$i];
                ?>
                        <li onclick="afficherDiscussion(<?php echo $discussion['id'] ?>)">
                            <!-- <i class='bx bx-calendar-check'></i> -->
                            <span class="info">
                                <h3>
                                    <?php echo $discussion['sujet'] ?>
                                </h3>
                                <!-- <p>Paid Order</p> -->
                            </span>
                        </li>
                <?php }
                } ?>
            </ul>
            <ul class="insights discussionAll">
                <?php if (isset($_SESSION['discussions']) && !empty($_SESSION['discussions'])) {
                    // Ouvrir le conteneur de la grille

                    // Boucle à travers les discussions stockées dans la session
                    foreach ($_SESSION['discussions'] as $discussion) {
                ?>
                        <li onclick="afficherDiscussion(<?php echo $discussion['id'] ?>)">
                            <!-- <i class='bx bx-calendar-check'></i> -->
                            <span class="info">
                                <h3>
                                    <?php echo $discussion['sujet'] ?>
                                </h3>
                                <!-- <p>Paid Order</p> -->
                            </span>
                        </li>
                <?php }
                } ?>
            </ul>


            <div class="bottom-data">
                <div class="orders cours3">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Cours Récents</h3>
                        <!-- <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i> -->
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Prof</th>
                                <th>Titre</th>
                            </tr>
                        </thead>
                        <!-- <tbody>
                            <?php
                            if (isset($_SESSION['cours']) && !empty($_SESSION['cours'])) {
                                // Affichage des utilisateurs à partir de la session
                                foreach ($_SESSION['cours'] as $cours) {
                                    // $qcm = $_SESSION['qcm'][$i];
                                    $idUtilisateur = $cours['id_utilisateur'];
                                    $user = $conn->getUserC($idUtilisateur);
                                    echo "<tr onclick=\"afficherPlaylist('{$cours['id']}')\">";
                                    // echo "<tr onclick=$videos = $conn->getVideos({$cours['id']})";
                                    echo "<td>
                                <img src='../{$user['photo']}'>
                                <p>{$user['nom']} {$user['prenom']}</p>
                            </td>";
                                    echo "<td>" . $cours['titre'] . "</td>
                                <td><span class='status completed'>Completed</span></td>";
                                    // echo "<td><span class='status completed'>Completed</span></td>";
                                    echo '</tr>';
                                }
                            } else {
                                echo "<tr><td colspan='3'>Aucun utilisateur trouvé.</td></tr>";
                            }
                            ?>

                        </tbody> -->
                        <tbody>
                            <!-- <?php
                                    if (!empty($searchResults)) {
                                        // Affichage des cours trouvés après la recherche
                                        foreach ($searchResults as $cours) {
                                            $idUtilisateur = $cours['id_utilisateur'];
                                            $user = $conn->getUserC($idUtilisateur);
                                            // echo "<tr onclick=\"afficherPlaylist('{$cours['id']}')\">";
                                            echo '<tr>';
                                            echo "<td>
                        <img src='../{$user['photo']}'>
                        <p>{$user['nom']} {$user['prenom']}</p>
                    </td>";
                                            echo "<td>{$cours['titre']}</td>";
                                            // echo "<td><span class='status completed'>Completed</span></td>";
                                            echo "<td onclick=\"afficherPlaylist('{$cours['id']}')\">  <span class='material-icons-sharp'> videocam </span></td>";
                                            echo "<td><a href='DashboardBasic.php?id_cours_pdf=" . $cours['id'] . "'><span class='material-icons-sharp'> picture_as_pdf </span></td>";
                                            echo "<td><a href='AfficherPDF.php'><span class='material-icons-sharp'> picture_as_pdf </span></td>";
                                            echo '</tr>';
                                            $_SESSION['searchResults'] = $_SESSION['cours'];
                                            // Nettoyer les données de session après avoir utilisé les résultats de recherche


                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>Aucun cours trouvé.</td></tr>";
                                    }
                                    ?> -->
                            <?php
                            if (!empty($searchResults)) {
                                // Affichage des cours trouvés après la recherche
                                foreach ($searchResults as $cours) {
                                    $idUtilisateur = $cours['id_utilisateur'];
                                    $user = $conn->getUserC($idUtilisateur);
                                    // echo "<tr onclick=\"afficherPlaylist('{$cours['id']}')\">";
                                    echo '<tr>';
                                    echo "<td>
                    <img src='../{$user['photo']}'>
                    <p>{$user['nom']} {$user['prenom']}</p>
                </td>";
                                    echo "<td>{$cours['titre']}</td>";
                                    // echo "<td><span class='status completed'>Completed</span></td>";
                                    echo "<td onclick=\"afficherPlaylist('{$cours['id']}')\">  <span class='material-icons-sharp'> videocam </span></td>";
                                    // echo "<td onclick=\"afficherPDF('{$cours['id']}')\"><span class='material-icons-sharp'>picture_as_pdf</span></td>";
                                    echo "<td><a href='AfficherPDF.php?id_cours_pdf=" . $cours['id'] . "'><span class='material-icons-sharp'> picture_as_pdf </span></td>";
                                    echo '</tr>';
                                    $_SESSION['searchResults'] = $_SESSION['cours'];
                                }
                            } else {
                                echo "<tr><td colspan='3'>Aucun cours trouvé.</td></tr>";
                            }

                            if (isset($_GET['id_cours_pdf'])) {
                                $id_cours_pdf = $_GET['id_cours_pdf'];
                                $pdf = $conn->getPdf($id_cours_pdf);
                                if ($pdf !== null) {
                                    header('Location: ../' . $pdf['path']);
                                    exit;
                                } else {
                                    echo "Aucun PDF trouvé pour ce cours.";
                                }
                            }
                            ?>


                        </tbody>
                    </table>


                </div>
                <div class="orders coursAll" hidden>
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Cours Récents</h3>
                        <!-- <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i> -->
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Prof</th>
                                <th>Titre</th>
                                <!-- <th>Status</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['cours']) && !empty($_SESSION['cours'])) {
                                // Affichage des utilisateurs à partir de la session
                                foreach ($_SESSION['cours'] as $cours) {
                                    // $qcm = $_SESSION['qcm'][$i];
                                    $idUtilisateur = $cours['id_utilisateur'];
                                    $user = $conn->getUserC($idUtilisateur);
                                    echo "<tr>";
                                    // echo "<tr onclick=$videos = $conn->getVideos({$cours['id']})";
                                    echo "<td>
                                <img src='../{$user['photo']}'>
                                <p>{$user['nom']} {$user['prenom']}</p>
                            </td>";
                                    echo "<td>{$cours['titre']}</td>";
                                    //     echo "<td>" . $cours['titre'] . "</td>
                                    // <td><span class='status completed'>Completed</span></td>";
                                    // echo "<td><span class='status completed'>Completed</span></td>";
                                    echo "<td onclick=\"afficherPlaylist('{$cours['id']}')\">  <span class='material-icons-sharp'> videocam </span></td>";
                                    echo "<td><a href='AfficherPDF.php?id_cours_pdf=" . $cours['id'] . "'><span class='material-icons-sharp'> picture_as_pdf </span></td>";
                                    echo '</tr>';
                                }
                            } else {
                                echo "<tr><td colspan='3'>Aucun utilisateur trouvé.</td></tr>";
                            }
                            if (isset($_GET['id_cours_pdf'])) {
                                $id_cours_pdf = $_GET['id_cours_pdf'];
                                $pdf = $conn->getPdf($id_cours_pdf);
                                if ($pdf !== null) {
                                    header('Location: ../' . $pdf['path']);
                                    exit;
                                } else {
                                    echo "Aucun PDF trouvé pour ce cours.";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Reminders -->
                <!-- <div class="reminders qcm3">
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h3>Qcm Récents</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-plus'></i>
                    </div>
                    <ul class="task-list">
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>Start Our Meeting</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>Analyse Our Site</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <div class="task-title">
                                <i class='bx bx-x-circle'></i>
                                <p>Play Footbal</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div> -->
                <div class="reminders qcm3">
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h3>Qcm Récents</h3>
                        <!-- <i class='bx bx-filter'></i>
                        <i class='bx bx-plus'></i> -->
                    </div>
                    <ul class="task-list">
                        <?php foreach ($_SESSION['qcm'] as $qcm) : ?>
                            <li class="completed" onclick="qcm('<?= isset($qcm['path']) ? 'path=' . urlencode($qcm['path']) . '&' : '' ?>')">
                                <div class="task-title">
                                    <i class='bx bx-check-circle'></i>
                                    <a>
                                        <p><?= $qcm['titre'] ?></p>
                                    </a>
                                </div>
                                <!-- <i class='bx bx-dots-vertical-rounded'></i> -->
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- <div class="reminders qcmAll" hidden>
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h3>Qcm</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-plus'></i>
                    </div>
                    <ul class="task-list">
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>Start Our Meeting</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>Analyse Our Site</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <div class="task-title">
                                <i class='bx bx-x-circle'></i>
                                <p>Play Footbal</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div> -->
                <div class="reminders qcmAll" hidden>
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h3>Qcm</h3>
                        <!-- <i class='bx bx-filter'></i>
                        <i class='bx bx-plus'></i> -->
                    </div>
                    <ul class="task-list">
                        <?php foreach ($_SESSION['qcm'] as $qcm) : ?>
                            <li class="completed" onclick="qcm('<?= isset($qcm['path']) ? 'path=' . urlencode($qcm['path']) . '&' : '' ?>')">
                                <div class="task-title">
                                    <i class='bx bx-check-circle'></i>
                                    <a>
                                        <p><?= $qcm['titre'] ?></p>
                                    </a>
                                </div>
                                <!-- <i class='bx bx-dots-vertical-rounded'></i> -->
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>



                <!-- End of Reminders-->

            </div>

        </main>
        <?php
        if (isset($_GET['id_cours'])) {
            echo '<script>';
            echo "document.getElementsByTagName('main')[0].style.display = 'none';";
            echo "</script>";
        ?>
            <main class="main1" id="videos-section">
                <div class="video-container">
                    <video controls id="video">
                        <source src="../<?php echo $videos[0]['path'] ?>" type="video/mp4">
                        <!-- You can add additional <source> elements for different video formats -->
                        Your browser does not support the video tag.
                    </video>
                    <!-- <h1><?php
                                $video = $videos[0];
                                echo $video['titre'];
                                ?> </h1> -->
                </div>
                <ul class="insights">
                    <?php
                    foreach ($videos as $video) {
                        echo "<li onclick=\"changeVideo('../{$video['path']}',this)\">";
                        // echo "<video src='../{$video['path']}' muted poster='../Media/thumb-1.png' class='video-list'></video>";
                        // echo "<img src='../Media/thumb-1.png'></img>";
                        echo ' <span class="info " >';
                        echo "<h3 class=''>";
                        echo "{$video['titre']}";
                        echo "</h3>";
                        echo "</span>";
                        echo "</li>";
                    }
                    ?>
                </ul>
                <div>

                </div>

            </main>

        <?php
            echo '<script>';
            echo "let lis = document.querySelector('.main1 .insights li');";
            echo "lis.style.background = '#388E3C';";
            echo '</script>';
        }
        ?>
    </div>
    <?php
    ?>
    <script src="../Assets/js/DashboardBasic.js"></script>
</body>

</html>
<?php
$contenu = ob_get_clean();
echo $contenu;
?>