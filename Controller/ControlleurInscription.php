<?php
require_once('model/modelBDD.php');

class ControlleurInscription
{

    private $model;

    function __construct()
    {
        $this->model = new ModelBDD();
    }

    function Remplir_Table_Etudiant()
    {
        $email = $_POST['email'];
        $req = $this->model->execute_query("SELECT * FROM utilisateur WHERE email='$email'");

        if ($req->rowCount() > 0) {
            return false;
        } else if ($email == 'web_master@root.com') {
            return false;
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupération des données du formulaire
            $Session_Nom = $_POST['nom'];
            $Session_Prenom = $_POST['prenom'];
            $Session_Mail = $_POST['email'];
            $Session_Pwd = $_POST['mdp'];
            $Session_Image = $_POST['image'];
            $image = $_FILES['image'];
            $file_p = "Media/" . $image['name'];
            move_uploaded_file($image["tmp_name"], $file_p);
            // Insértion de la BDD
            $sql = "INSERT INTO utilisateur (nom,prenom,email,mdp,role,photo) VALUES ('$Session_Nom','$Session_Prenom','$Session_Mail','$Session_Pwd','basic','$file_p')";
            $this->model->execute_query($sql);
            // Récupération de l'ID de l'utilisateur nouvellement inséré
            $conn = $this->model->getconn();
            $id_utilisateur = $conn->lastInsertId();
            //affectation dans la session
            $_SESSION['prenom'] = $Session_Prenom;
            $_SESSION['nom'] = $Session_Nom;
            $_SESSION['email'] = $Session_Mail;
            $_SESSION['mdp'] = $Session_Pwd;
            $_SESSION['id_utilisateur'] = $id_utilisateur;
            $_SESSION['photo'] = $file_p;

            setcookie("username" ,$_SESSION['email'], time() + 3600 );
            setcookie("password" ,$_SESSION['mdp'], time() + 3600 );
            return true;
        } else {
            return false;
            exit();
        }
    }
}
