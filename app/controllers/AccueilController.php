<?php

class AccueilController {

    public function pageAccueil()
    {
        require "views/accueil/accueil.php";
    }

    public function searchAll($data) {
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);

        if(isset($_POST['data'])) {

            $dao = new DAO;
            $sql = "SELECT *
            FROM film
            WHERE titre_film LIKE :data";
            
            $resultats = $dao->executerRequete($sql, ['data' => '%'.$data.'%' ]);
    
            require "./views/accueil/searchAll.php";
        
        }
    }

}

?>