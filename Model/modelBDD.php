<?php

class ModelBDD
{
    private $conn;
    // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
    private function getBdd()
    {
        if ($this->conn == null) {
            // Création de la connexion
            try {
                require_once('Config/configBDD.php');
                $this->conn = new PDO("mysql:host=localhost;dbname=projet", DB_USER, DB_PASS);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erreur de connexion : ";
            }
        }
        return $this->conn;
    }

    function execute_query($sql)
    {
        $conn = $this->getBdd();
        $result = $conn->query($sql);
        if (!$result) {
            die('Erreur d\'exécution de la requête : ');
        }
        return $result;
    }

    public function getconn()
    {

        return $this->conn;
    }
}
