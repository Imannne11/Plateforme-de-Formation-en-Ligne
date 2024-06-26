<?php
ob_start();
session_start();
require_once('View/Acceuill.php');

require_once('Controller/ControlleurInscription.php');
require_once('Controller/ControlleurConnexion.php');
require_once('Controller/ControlleurDashboardAdmin.php');
require_once('Controller/ControlleurAdmin.php');
require_once('Controller/ControlleurBasic.php');
require_once('Controller/ControlleurForum.php');

try {
    if (isset($_GET['action'])) {

        switch ($_GET['action']) {

            case "inscription":
                $inscri = new ControlleurInscription();
                if ($inscri->Remplir_Table_Etudiant()) {
                    header("Location:View/DashboardBasic.php");
                    $student = new ControlleurBasic();
                    $student->getCours();
                    $student->getQcm();
                    $forum = new ControlleurForum();
                    $forum->getComm();
                    $forum->getDiscussions();
                } else {
                    header("Location: View/ConnexionInscription.php?error=errori");
                }
                exit;
                break;

            case "connexion":
                $connect = new ControlleurConnexion();
                if ($connect->Recup_Client()) {
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                        $admin = new ControlleurDashboardAdmin();
                        $admin->getUsers();
                        $admin->getCours();
                        $admin->getQcm();
                        header("Location: View/DashboardAdmin.php");
                    } else {
                        $student = new ControlleurBasic();
                        $student->getCours();
                        $student->getQcm();
                        $forum = new ControlleurForum();
                        $forum->getComm();
                        $forum->getDiscussions();
                        header("Location: View/DashboardBasic.php");
                    }
                } else {
                    header("Location: View/ConnexionInscription.php?error=error");
                }
                exit;
                break;

            case "deconnexion":
                session_destroy();
                header("Location: index.php");
                exit;
                break;

            case "adminAjoutUser":
                $connect = new ControlleurAdmin();
                if ($connect->adminAjoutUser()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminEditUser":
                $connect = new ControlleurAdmin();
                if ($connect->adminEditUser()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminRemoveUser":
                $connect = new ControlleurAdmin();
                if ($connect->adminRemoveUser()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminAjoutCours":
                $connect = new ControlleurAdmin();
                if ($connect->adminAjoutCours()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminEditCours":
                $connect = new ControlleurAdmin();
                if ($connect->adminEditCours()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminRemoveCours":
                $connect = new ControlleurAdmin();
                if ($connect->adminRemoveCours()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "userEditUser":
                // header("Location: View/profile.php");
                $connect = new ControlleurBasic();
                if ($connect->userEditUser()) {
                    header("Location: View/profile.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminAjoutQcm":
                $connect = new ControlleurAdmin();
                if ($connect->adminAjoutQcm()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminEditQcm":
                $connect = new ControlleurAdmin();
                if ($connect->adminEditQcm()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminRemoveQcm":
                $connect = new ControlleurAdmin();
                if ($connect->adminRemoveQcm()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminAjoutVideo":
                $connect = new ControlleurAdmin();
                if ($connect->adminAjoutVideo()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminEditVideo":
                $connect = new ControlleurAdmin();
                if ($connect->adminEditVideo()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminRemoveVideo":
                $connect = new ControlleurAdmin();
                if ($connect->adminRemoveVideo()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminAjoutPdf":
                $connect = new ControlleurAdmin();
                if ($connect->adminAjoutPdf()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminEditPdf":
                $connect = new ControlleurAdmin();
                if ($connect->adminEditPdf()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "adminRemovePdf":
                $connect = new ControlleurAdmin();
                if ($connect->adminRemovePdf()) {
                    header("Location: View/DashboardAdmin.php");
                } else {
                    header("Location: view/test.php");
                }
                exit;
            case "ajoutComm":
                $controlleurForum = new ControlleurForum();
                $controlleurForum->AjoutComm();
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            case "repondreComm":
                $controlleurForum = new ControlleurForum();
                $controlleurForum->getComm();
                $controlleurForum->RepondreComm();
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            default:
                throw new Exception("Argument non valide");
        }
    } else {
        if (isset($_SESSION['nom']) && $_SESSION['role'] == 'admin') {
            header("Location: View/DashboardAdmin.php");
            exit;
        } else if (isset($_SESSION['nom']) && $_SESSION['role'] == 'basic') {
            header("Location: View/DashboardBasic.php");
            exit;
        }
    }
} catch (Exception $e) {
    echo ($e->getMessage());
}
