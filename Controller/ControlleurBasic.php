<?php
require_once('Model/modelBDD.php');
class ControlleurBasic
{
    private $model;
    function __construct()
    {
        $this->model = new ModelBDD();
    }

    function userEditUser()
    {

        echo "Connected successfully";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $username = $_POST['nom'];
            $newprenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['mdp'];
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $image = $_FILES['image'];
                $file_p = "Media/" . $image['name'];
                $_SESSION['photo'] = $file_p;
                move_uploaded_file($image["tmp_name"], $file_p);
                $sql = "UPDATE utilisateur SET nom='$username',prenom='$newprenom', email='$email', mdp='$password', photo='$file_p' WHERE id=$id";
            } else {
                $sql = "UPDATE utilisateur SET nom='$username',prenom='$newprenom', email='$email', mdp='$password' WHERE id=$id";
            }
            $_SESSION['id_utilisateur'] = $id;
            $_SESSION['prenom'] = $newprenom;
            $_SESSION['nom'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['mdp'] = $password;
        }
        $this->model->execute_query($sql);
        return true;
    }

    function getCours()
    {
        $req = $this->model->execute_query("SELECT * FROM cours");
        $_SESSION['cours'] = $req->fetchAll(PDO::FETCH_ASSOC);
    }

    function getVideos($id_cours)
    {
        $req = $this->model->execute_query("SELECT * FROM video WHERE id_cours=$id_cours");
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    function getPdf($id_cours)
    {
        $req = $this->model->execute_query("SELECT * FROM pdf WHERE id_cours=$id_cours");
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    function getQcm()
    {
        $req = $this->model->execute_query("SELECT * FROM qcm");
        $_SESSION['qcm'] = $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
