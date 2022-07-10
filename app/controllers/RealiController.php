<?php

    require_once "bdd/DAO.php";

    class RealiController {

        public function findAll(){

            $dao = new DAO;
    
            $sql = "SELECT id_realisateur AS id_realisateur, CONCAT(r.prenom_realisateur, ' ', r.nom_realisateur) AS nom_complet_realisateur
            FROM  realisateur r";
            
            $realisateurs = $dao->executerRequete($sql);
    
            require "views/realisateur/listRealis.php";
        }

        public function findOneById($id) {
            $dao = new DAO;
            $sql = "SELECT id_realisateur, nom_realisateur AS nom_realisateur, prenom_realisateur AS prenom_realisateur, photo_realisateur AS photo_realisateur FROM realisateur WHERE id_realisateur = :id";
            $stmtReali = $dao->executerRequete($sql, ["id" => $id]);

            require "views/realisateur/detailReali.php";
        }

        public function addReali() {
            
            if(isset($_POST['submit'])) {
                
                if(isset($_POST['nom_realisateur']) && isset($_POST['prenom_realisateur'])){

                    $nomReali = filter_input(INPUT_POST, 'nom_realisateur', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
                    $prenomReali = filter_input(INPUT_POST, 'prenom_realisateur', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);

                    $dao = new DAO;

                    $sql = ('SELECT nom_realisateur, prenom_realisateur FROM realisateur WHERE nom_realisateur = :nom_realisateur AND prenom_realisateur = :prenom_realisateur');
                    $checkIfRealiExist = $dao->executerRequete($sql, [ "nom_realisateur" => $nomReali, "prenom_realisateur" => $prenomReali ]);

                    if($checkIfRealiExist->rowCount() == 0) {

                        $sql1 = "INSERT INTO realisateur (nom_realisateur, prenom_realisateur) VALUES(:nom_realisateur, :prenom_realisateur)";

                        $insertReali = $dao->executerRequete($sql1, [ "nom_realisateur" => $nomReali, "prenom_realisateur" => $prenomReali ]);
                        $resultat = $insertReali->fetch();

                        header('Location:index.php?action=listRealis');
                    } else {
                        echo "Ce réalisateur est déjà ajouté :)";
                    }
                }
            }

            require "./views/realisateur/addReali.php";
        }

        public function removeReali() {
            
            if(isset($_POST['submit'])) {
                
                if(isset($_POST['nom_realisateur']) || isset($_POST['prenom_realisateur'])){

                    $nomReali = filter_input(INPUT_POST, 'nom_realisateur', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
                    $prenomReali = filter_input(INPUT_POST, 'prenom_realisateur', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);

                    $dao = new DAO;

                    $sql = ('SELECT nom_realisateur, prenom_realisateur FROM realisateur WHERE nom_realisateur = :nom_realisateur OR prenom_realisateur = :prenom_realisateur');
                    $checkIfRealiExist = $dao->executerRequete($sql, [ "nom_realisateur" => $nomReali, "prenom_realisateur" => $prenomReali ]);

                    if($checkIfRealiExist->rowCount() == 1) {

                        $sql1 = "DELETE FROM realisateur WHERE nom_realisateur = :nom_realisateur OR prenom_realisateur = :prenom_realisateur";

                        $insertReali = $dao->executerRequete($sql1, [ "nom_realisateur" => $nomReali, "prenom_realisateur" => $prenomReali ]);
                        $resultat = $insertReali->fetch();

                        header('Location:index.php?action=listRealis');
                    } else {
                        echo "Ce réalisateur n'existe pas :)";
                    }
                }
            }

            require "./views/realisateur/removeReali.php";
        }
        
        public function modifyReali($id) {
            

            $dao = new DAO;
            $sql = "SELECT id_realisateur AS id_realisateur, nom_realisateur AS nom_realisateur,prenom_realisateur AS prenom_realisateur FROM realisateur WHERE id_realisateur =:id";
            $stmtReali2 = $dao->executerRequete($sql, ["id" => $id]);

            if(isset($_POST['submit'])) {
                
                if(isset($_POST['nom_realisateur']) && isset($_POST['prenom_realisateur'])){

                    $nomReali = filter_input(INPUT_POST, 'nom_realisateur', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
                    $prenomReali = filter_input(INPUT_POST, 'prenom_realisateur', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);

                    // if($stmtReali2->rowCount() == 1) {

                        $dao1 = new DAO;

                        $sql1 = "UPDATE realisateur SET nom_realisateur = :nom_realisateur, prenom_realisateur = :prenom_realisateur WHERE id_realisateur = :id";

                        $insertReali = $dao1->executerRequete($sql1, [ "nom_realisateur" => $nomReali, "prenom_realisateur" => $prenomReali, "id" => $id ]);
                        $resultat = $insertReali->fetch();

                        header('Location:index.php?action=listRealis');
                        die;
                    // }  else {
                    //     echo "erreur de syntaxe";
                    // }             
                }
            }

            require "./views/realisateur/modifyReali.php";
        }
    }

?>