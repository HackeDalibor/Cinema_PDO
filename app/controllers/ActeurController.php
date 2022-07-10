<?php

    require_once "bdd/DAO.php";

    class ActeurController {

        public function findAll(){

            $dao = new DAO;
    
            $sql = "SELECT ac.id_acteur AS id_acteur, CONCAT(ac.prenom_acteur, ' ',  ac.nom_acteur) AS nom_acteur, ac.sexe AS sexe_acteur, ROUND(DATEDIFF(NOW(), ac.date_naissance)/365) AS age_acteur
            FROM acteur ac";
            
            $acteurs = $dao->executerRequete($sql);
    
            require "views/acteur/listActeurs.php";
        }

        public function findOneById($id) {
            $dao = new DAO;
            $sql = "SELECT ac.nom_acteur AS nom_acteur, ac.prenom_acteur AS prenom_acteur, photo_acteur AS photo_acteur, DATE_FORMAT(date_naissance, '%e/%m/%Y') AS date_naissance, ROUND(DATEDIFF(NOW(), ac.date_naissance) / 365) AS age, sexe AS sexe FROM acteur ac WHERE id_acteur = :id";
            $stmtActeur = $dao->executerRequete($sql, ["id" => $id]);

            require "./views/acteur/detailActeur.php";
        }
    }

?>