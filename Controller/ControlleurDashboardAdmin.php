<?php
require_once('Model/modelBDD.php');

class ControlleurDashboardAdmin
{

    private $model;

    function __construct()
    {
        $this->model = new ModelBDD();
    }

    function getUsers()
    {
        $req = $this->model->execute_query("SELECT * FROM utilisateur WHERE role ='basic' ORDER BY id DESC");
        $_SESSION['users'] = $req->fetchAll(PDO::FETCH_ASSOC);;
    }
    function getCours()
    {
        $req = $this->model->execute_query("SELECT * FROM cours where id_utilisateur={$_SESSION['id_utilisateur']}");
        $_SESSION['cours'] = $req->fetchAll(PDO::FETCH_ASSOC);
    }

    function getUser($id)
    {
        $req = $this->model->execute_query("SELECT * FROM utilisateurs where id='{$id}'");
        $user = $req->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    function getQcm()
    {
        $req = $this->model->execute_query("SELECT * FROM qcm ORDER BY id DESC");
        $_SESSION['qcm'] = $req->fetchAll(PDO::FETCH_ASSOC);;
    }
}
