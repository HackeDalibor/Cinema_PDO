<?php
    ob_start();
    $realisateur = $stmtReali->fetch();
?>

<h1>
    <?=  $realisateur["nom_realisateur"]; ?>
    <?= $realisateur["prenom_realisateur"]; ?>
</h1>
<figure>
    <img src="public/img/realisateurs/<?= $realisateur['photo_realisateur']; ?>" alt="<?= $realisateur['photo_realisateur']; ?>" style="height: 400px; width: auto;">
</figure>

<br>


<?php

    $contenu = ob_get_clean();
    $title = "Réalisateur";
    require "./views/template.php";