<?php

    require_once "bdd/DAO.php";

    class GenreController {

        public function findAll(){

            $dao = new DAO;
    
            $sql = "SELECT g.id_genre, g.type_genre AS type_genre, GROUP_CONCAT(f.titre_film, ' ') AS liste_films
            FROM genre g
            INNER JOIN posseder po ON po.genre_id = g.id_genre
            INNER JOIN film f ON po.film_id = f.id_film
            GROUP BY g.id_genre, g.type_genre";
            
            $genres = $dao->executerRequete($sql);
    
            require "views/genre/listGenres.php";
        }

        public function findOneById($id) {
            $dao = new DAO;

            $sql1 = "SELECT g.id_genre AS id_genre, g.type_genre AS type_genre, COUNT(p.genre_id) AS nb_films
            FROM genre g 
            INNER JOIN posseder p ON g.id_genre = p.genre_id
            WHERE g.id_genre = :id
            GROUP BY g.id_genre";

            $sql2 = "SELECT f.titre_film AS titre_film, p.film_id AS film_id
            FROM genre g
            INNER JOIN posseder p ON g.id_genre = p.genre_id
            INNER JOIN film f ON p.film_id = f.id_film
            WHERE id_genre = :id GROUP BY g.type_genre, p.film_id";

            $stmt = $dao->executerRequete($sql1, ["id" => $id]);
            $stmtGenre = $dao->executerRequete($sql2, ["id" => $id]);
            

            require "./views/genre/detailGenre.php";
        }
    }

?>
