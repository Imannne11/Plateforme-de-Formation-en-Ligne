<?php
require_once('../Config/configBDD.php');
class ControlleurCours
{
    private $model;
    function __construct()
    {
        $this->model = new PDO("mysql:host=localhost;dbname=projet", DB_USER, DB_PASS);
    }

    function getCours($id)
    {
        $req = "SELECT * FROM cours WHERE id = ?";
        $row = $this->model->prepare($req);
        $row->execute(array($_GET['id']));
        $coursToEdit = $row->fetch(PDO::FETCH_ASSOC);
        return $coursToEdit;
    }

    function getVideo($id_video)
    {
        $req = "SELECT * FROM video WHERE id = ?";
        $row = $this->model->prepare($req);
        $row->execute(array($id_video));
        $videoToEdit = $row->fetch(PDO::FETCH_ASSOC);
        return $videoToEdit;
    }

    function getPdf()
    {
        $req = "SELECT * FROM pdf WHERE id = ?";
        $row = $this->model->prepare($req);
        $row->execute(array($_GET['id_pdf']));
        $pdfToEdit = $row->fetch(PDO::FETCH_ASSOC);
        return $pdfToEdit;
    }

    function getVideos($id_cours)
    {
        $req = "SELECT * FROM video WHERE id_cours = ?";
        $row = $this->model->prepare($req);
        $row->execute(array($id_cours)); // Utilisez $id au lieu de $_GET['id']
        $videos = $row->fetchAll(PDO::FETCH_ASSOC);
        return $videos;
    }

    function getPdfs($id_cours)
    {
        $req = "SELECT * FROM pdf WHERE id_cours = ?";
        $row = $this->model->prepare($req);
        $row->execute(array($id_cours)); // Utilisez $id au lieu de $_GET['id']
        $pdfs = $row->fetchAll(PDO::FETCH_ASSOC);
        return $pdfs;
    }
}
