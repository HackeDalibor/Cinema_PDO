<?php

    require_once "bdd/DAO.php";

    class FilmController {

        public function findAll(){

            $dao = new DAO;

            $sql = "SELECT f.id_film AS id_film, f.titre_film AS titre_film, TIME_FORMAT(SEC_TO_TIME (f.duree_min *60 ),'%h:%i') AS duree , CONCAT(r.prenom_realisateur, ' ', r.nom_realisateur) AS nom_complet_realisateur, f.realisateur_id AS realisateur_id
            FROM film f
            INNER JOIN realisateur r ON r.id_realisateur = f.realisateur_id";
            
            $films = $dao->executerRequete($sql);

            require "views/film/listFilms.php";
        }

        public function findOneById($id) {
            $dao = new DAO;
            $sql = "SELECT titre_film AS titre_film, DATE_FORMAT(f.date_sortiefr, '%e/%m/%Y') AS date_sortiefr, TIME_FORMAT(SEC_TO_TIME (f.duree_min *60 ),'%hh%i') AS duree_heure, f.resume_film AS resume_film, f.note AS note, f.affiche AS affiche
                    FROM film f
                    WHERE id_film = :id";
            $stmtFilm = $dao->executerRequete($sql, ["id" => $id]);

            require "views/film/detailFilm.php";
        }
    }

?>