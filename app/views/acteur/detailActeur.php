<?php
    ob_start();
    $acteur = $stmtActeur->fetch();
?>

<h1>
    <?= $acteur["prenom_acteur"]; ?>
    <?= $acteur["nom_acteur"]; ?>
</h1>
<figure>
    <img src="public/img/acteurs/<?= $acteur['photo_acteur']; ?>" alt="<?= $acteur['photo_acteur']; ?>" style="height: 400px; width: auto;">
    <figcaption>
        Date de naissance : <?= $acteur["date_naissance"]; ?> (<?= $acteur["age"]; ?> ans) <br>
        Sexe : <?= $acteur['sexe']; ?>
    </figcaption>
</figure>

<?php

    $contenu = ob_get_clean();
    $title = "Détail de l'acteur";
    require "./views/template.php";