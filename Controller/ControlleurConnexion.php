<?php
require_once('model/modelBDD.php');

class ControlleurConnexion
{

    private $model;

    function __construct()
    {
        $this->model = new ModelBDD();
    }

    function Recup_Client()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $mot_de_passe = $_POST['mdp'];
            $req = $this->model->execute_query("SELECT * FROM utilisateur WHERE email='$email' AND mdp='$mot_de_passe'");
            if ($req->rowCount() > 0) {
                while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                    $_SESSION['id_utilisateur'] = $row['id'];
                    $_SESSION['prenom'] = $row['prenom'];
                    $_SESSION['nom'] = $row['nom'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['mdp'] = $row['mdp'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['photo'] = $row['photo'];
                }
                setcookie("username" ,$email, time() + 3600 );
                setcookie("password" ,$mot_de_passe, time() + 3600 );
                return true;
            } else {
                return false;
            }
        } else {
            exit();
        }
    }
}
