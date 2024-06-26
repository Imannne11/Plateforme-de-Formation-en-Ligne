<?php
require_once('Model/modelBDD.php');
class ControlleurForum
{
    private $model;
    function __construct()
    {
        $this->model = new ModelBDD();
    }

    function getComm()
    {
        // Récupérer les commentaires triés par ordre décroissant de date de création
        $req = $this->model->execute_query("SELECT * FROM commentaires JOIN utilisateur ON commentaires.id_utilisateur = utilisateur.id ORDER BY commentaires.date_creation DESC");
        $_SESSION['commentaires'] = $req->fetchAll(PDO::FETCH_ASSOC);
        $req = $this->model->execute_query("SELECT * FROM reponses , utilisateur Where reponses.id_utilisateur= utilisateur.id ");
        $_SESSION['reponse_utilisateur'] = $req->fetchAll(PDO::FETCH_ASSOC);
    }
    function getDiscussions()
    {
        $req = $this->model->execute_query("SELECT * FROM discussions");
        $_SESSION['discussions'] = $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // function getComm()
    // {
    //     $req = $this->model->execute_query("SELECT commentaires.*, utilisateur.*, reponses.* 
    //                                        FROM commentaires 
    //                                        LEFT JOIN utilisateur ON commentaires.id_utilisateur = utilisateur.id 
    //                                        LEFT JOIN reponses ON commentaires.id_commentaire = reponses.id_commentaire
    //                                        ");
    //     $comments = $req->fetchAll(PDO::FETCH_ASSOC);

    //     // Regrouper les réponses par id_commentaire
    //     $grouped_comments = [];
    //     foreach ($comments as $comment) {
    //         $comment_id = $comment['id_commentaire'];
    //         if (!isset($grouped_comments[$comment_id])) {
    //             $grouped_comments[$comment_id] = $comment;
    //             $grouped_comments[$comment_id]['reponses'] = [];
    //         }
    //         // Ajouter toutes les informations sur la réponse
    //         if (!empty($comment['texte_reponse'])) {
    //             $grouped_comments[$comment_id]['reponses'][] = [
    //                 'texte_reponse' => $comment['texte_reponse'],
    //                 'id_utilisateur_reponse' => $comment['id_utilisateur_reponse'],
    //                 'nom_repondant' => $comment['nom_repondant'],
    //                 'prenom_repondant' => $comment['prenom_repondant'],
    //                 'photo_repondant' => $comment['photo_repondant']
    //                 // Ajoutez d'autres informations sur la réponse si nécessaire
    //             ];
    //         }
    //     }

    //     $_SESSION['commentaires'] = $grouped_comments;
    // }


    function AjoutComm()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Vérifiez si l'identifiant de la discussion est présent dans les données postées
            if (isset($_POST['discussion_id'])) {
                // Assurez-vous que l'identifiant de la discussion est un nombre entier valide
                $discussion_id = intval($_POST['discussion_id']);

                // Récupérez le commentaire à partir des données postées
                $commentaire = $_POST['comment_box'];
                // Récupérez l'identifiant de l'utilisateur connecté à partir de la session
                $id_utilisateur = $_SESSION['id_utilisateur'];

                // Requête SQL pour insérer le commentaire dans la base de données
                $sql = "INSERT INTO commentaires (id_utilisateur, discussion_id, texte_commentaire) VALUES ('$id_utilisateur', '$discussion_id', '{$commentaire}')";

                // Exécutez la requête SQL
                $this->model->execute_query($sql);

                // Mettez à jour les commentaires après l'ajout du nouveau commentaire
                $this->getComm();

                // Retournez vrai pour indiquer que le commentaire a été ajouté avec succès
                return true;
            } else {
                // Si l'identifiant de la discussion n'est pas présent dans les données postées, retournez faux
                return false;
            }
        } else {
            // Si la méthode de requête n'est pas POST, retournez faux
            return false;
        }
    }

    function RepondreComm()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reponse = $_POST['reponse_box'];
            $id_utilisateur = $_SESSION['id_utilisateur'];
            $comment_id = $_POST['comment_id'];
            $sql = "INSERT INTO reponses (id_commentaire, id_utilisateur, texte_reponse) VALUES ('$comment_id', '$id_utilisateur', '$reponse')";
            $this->model->execute_query($sql);
            $req = $this->model->execute_query("SELECT * FROM reponses , utilisateur Where reponses.id_utilisateur= utilisateur.id ");
            $_SESSION['reponse_utilisateur'] = $req->fetchAll(PDO::FETCH_ASSOC);
            // $this->getComm();
            return true;
        } else {
            exit();
        }
    }
}


   // function getCommWithReponses()
    // {
    //     // Récupérer les commentaires
    //     $req = $this->model->execute_query("SELECT * FROM commentaires , utilisateur WHERE commentaires.id_utilisateur = utilisateur.id");
    //     $commentaires = $req->fetchAll(PDO::FETCH_ASSOC);
    
    //     // Récupérer les réponses pour chaque commentaire
    //     foreach ($commentaires as &$commentaire) {
    //         $commentaire_id = $commentaire['id_commentaire'];
    //         $req = $this->model->execute_query("SELECT * FROM reponses WHERE id_commentaire = :commentaire_id", array(':commentaire_id' => $commentaire_id));
    //         $reponses = $req->fetchAll(PDO::FETCH_ASSOC);
    //         $commentaire['reponses'] = $reponses;
    //     }
    
    //     // Stocker les commentaires avec les réponses dans la session
    //     $_SESSION['commentaires'] = $commentaires;
    // }  
    // function getComm2()
    // {
    //     $req = $this->model->execute_query("SELECT * FROM commentaires INNER JOIN utilisateur ON commentaires.id_utilisateur = utilisateur.id");
    //     return $req ? $req->fetchAll(PDO::FETCH_ASSOC) : [];
    // }
    
    //     function getCommWithReponses()
    //     {
    //         $commentaires = $this->getComm2();
    //         if ($commentaires) {
    //             foreach ($commentaires as $key => $comm) {
    //                 $reponses = $this->model->execute_query("SELECT * FROM reponses WHERE id_commentaire = " . $comm['id_commentaire']);
    //                 $commentaires[$key]['reponses'] = $reponses ? $reponses->fetchAll(PDO::FETCH_ASSOC) : [];
    //             }
    //         }
    //         return $commentaires;
    //     }