<?php
    // index.php

    require_once "controllers/AccueilController.php";
    require_once "controllers/ActeurController.php";
    require_once "controllers/FilmController.php";
    require_once "controllers/GenreController.php";
    require_once "controllers/RealiController.php";

    $ctrlAccueil = new AccueilController;
    $ctrlFilm    = new FilmController;
    $ctrlActeur  = new ActeurController;
    $ctrlGenre   = new GenreController;
    $ctrlReali   = new RealiController;

    if(isset($_GET['action'])) {

        switch($_GET['action']){
            case "searchAll" : $ctrlAccueil->searchAll($_POST["data"]);break;
            case "listFilms" : $ctrlFilm->findAll();break;
            case "detailFilm" : $ctrlFilm->findOneById($_GET["id"]);break;
            case "listActeurs" : $ctrlActeur->findAll();break;
            case "detailActeur" : $ctrlActeur->findOneById($_GET["id"]);break;
            case "listGenres" : $ctrlGenre->findAll();break;
            case "detailGenre" : $ctrlGenre->findOneById($_GET["id"]);break;
            case "listRealis" : $ctrlReali->findAll();break;
            case "detailReali" : $ctrlReali->findOneById($_GET["id"]);break;
            case "addReali" : $ctrlReali->addReali();break;
            case "removeReali" : $ctrlReali->removeReali();break;
            case "modifyReali" : $ctrlReali->modifyReali($_GET["id"]);break;
        }

    } else {

        $ctrlAccueil->pageAccueil();
        
    }