<?php

    ob_start();
?>

<h1>BIENVENUE !  :D</h1>

<?php
    $contenu = ob_get_clean();
    $title   = "Page d'accueil";
    require "./views/template.php";