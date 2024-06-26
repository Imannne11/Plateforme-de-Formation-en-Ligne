<?php
$titre = 'warProg - Apprendre en Ligne';
$CSS = 'Style/Acceuil.css'; // Assurez-vous que ce chemin est correct
$lienQcm = 'View/Qcm.php';
$lienCntct = 'View/Contact.php';
session_start();


require_once('../Controller/ControlleurUser.php');
$conn = new ControlleurUser();
if (isset($_GET['id_cours_pdf'])) {
    $videos = $conn->getVideos($_GET['id_cours_pdf']);
    $pdfs = $conn->getPdf($_GET['id_cours_pdf']);
}

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
    <!-- End of Sidebar -->

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
                                Cours
                            </a></li>
                        /
                        <li><a href="#" class="active">PDF</a></li>
                    </ul>
                </div>
                <!-- <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a> -->
            </div>
            <div class="bottom-data">
                <div class="reminders qcm3">
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h3>Nos cours</h3>
                        <!-- <i class='bx bx-filter'></i>
                        <i class='bx bx-plus'></i> -->
                    </div>
                    <!--  -->
                    <?php
                    if (isset($_GET['id_cours_pdf']) && !empty($pdfs)) :
                        $id_cours_pdf = $_GET['id_cours_pdf'];
                    ?>
                        <main class="qcm3" id="pdfs-sections">
                            <ul class="pdf">
                                <?php foreach ($pdfs as $pdf) : ?>
                                    <li onclick="ouvrirPDFNouvelOnglet('../<?php echo $pdf['path']; ?>')">
                                        <span class='pdf-icon'><i class='bx bxs-file-pdf'></i></span>
                                        <span class='pdf-title'><?php echo $pdf['titre']; ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </main>
                    <?php else : ?>
                        <p>Aucun PDF disponible pour ce cours.</p>
                    <?php endif; ?>
                    <!-- </ul> -->
                </div>
            </div>
        </main>
    </div>
    <script src="../Assets/js/DashboardBasic.js"></script>
</body>

</html>
<?php
$contenu = ob_get_clean();
echo $contenu;
?>