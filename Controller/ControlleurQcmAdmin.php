<?php
require_once('../Config/configBDD.php');
class ControlleurQcmAdmin
{
    private $model;
    function __construct()
    {
        $this->model = new PDO("mysql:host=localhost;dbname=projet", DB_USER, DB_PASS);
    }

    function getQcm($id)
    {
        $req = "SELECT * FROM qcm WHERE id = ?";
        $row = $this->model->prepare($req);
        $row->execute(array($_GET['id']));
        $coursToEdit = $row->fetch(PDO::FETCH_ASSOC);
        return $coursToEdit;
    }
}
