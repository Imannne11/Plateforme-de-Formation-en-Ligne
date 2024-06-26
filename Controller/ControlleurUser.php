<?php
require_once('../Config/configBDD.php');
class ControlleurUser
{
    private $model;
    function __construct()
    {
        $this->model = new PDO("mysql:host=localhost;dbname=projet", DB_USER, DB_PASS);
    }

    function getUser($id)
    {
        $req = "SELECT * FROM utilisateur WHERE id = ?";
        $row = $this->model->prepare($req);
        $row->execute(array($_GET['id']));
        $userToEdit = $row->fetch(PDO::FETCH_ASSOC);
        return $userToEdit;
    }
    function getUserC($id)
    {
        $req = "SELECT * FROM utilisateur WHERE id = ?";
        $row = $this->model->prepare($req);
        $row->execute(array($id)); // Utilisez $id au lieu de $_GET['id']
        $userToEdit = $row->fetch(PDO::FETCH_ASSOC);
        return $userToEdit;
    }

    function getVideos($id_cours)
    {
        $req = "SELECT * FROM video WHERE id_cours = ?";
        $row = $this->model->prepare($req);
        $row->execute(array($id_cours)); // Utilisez $id au lieu de $_GET['id']
        $videos = $row->fetchAll(PDO::FETCH_ASSOC);
        return $videos;
    }
    function getPdf($id_cours)
    {
        $req = "SELECT * FROM pdf WHERE id_cours = ?";
        $row = $this->model->prepare($req);
        $row->execute(array($id_cours));
        $pdfs = $row->fetchAll(PDO::FETCH_ASSOC); // Utilisez fetch() pour récupérer un seul résultat
        return $pdfs;
    }

    function searchCourses($search)
    {
        $req = "SELECT * FROM cours WHERE titre LIKE ? OR categorie LIKE ?";
        $row = $this->model->prepare($req);
        $searchTerm = "%" . $search . "%"; // Ajoute des wildcards pour chercher des correspondances partielles
        $row->execute(array($searchTerm, $searchTerm)); // Utilisez $searchTerm pour rechercher les titres et catégories
        $courses = $row->fetchAll(PDO::FETCH_ASSOC);
        // $_SESSION['$searchResults']=$courses;
        return $courses;
    }
}
