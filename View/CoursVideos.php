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
            <li class="active"><a href="#" id="dashboard" onclick="onDashboardClick()"><i class='bx bxs-dashboard'></i>Tableau de bord</a>
            </li>
            <li><a href="#" id="Cours" onclick="onCoursClick()"><i class='bx bx-store-alt'></i>Cours</a></li>
            <li><a href="#" id="Qcm" onclick="onQcmClick()"><i class='bx bx-analyse'></i>Qcm</a></li>
            <li><a href="#" id="Forum" onclick=""><i class='bx bx-message-square-dots'></i>Forum</a></li>
            <!-- <li><a href="#"><i class='bx bx-group'></i>Users</a></li>
            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li> -->
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Déconnexion
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="../<?php echo $_SESSION['photo'] ?>">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">Shop</a></li>
                    </ul>
                </div>
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a>
            </div>

            <!-- Insights -->
            <ul class="insights">
                <li>
                    <i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                            1,074
                        </h3>
                        <p>Paid Order</p>
                    </span>
                </li>
                <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                            3,944
                        </h3>
                        <p>Site Visit</p>
                    </span>
                </li>
                <li><i class='bx bx-line-chart'></i>
                    <span class="info">
                        <h3>
                            14,721
                        </h3>
                        <p>Searches</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $6,742
                        </h3>
                        <p>Total Sales</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $6,742
                        </h3>
                        <p>Total Sales</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $6,742
                        </h3>
                        <p>Total Sales</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->
        </main>

    </div>

    <script src="../Assets/js/DashboardBasic.js"></script>
</body>

</html>
<?php
$contenu = ob_get_clean();
echo $contenu;
?>