<?php
    ob_start();
    $film = $stmtFilm->fetch();
?>

<h1><?= $film["titre_film"]; ?></h1>
<figure>
    <img src="public/img/films/<?= $film['affiche']; ?>" alt="<?= $film['affiche']; ?>" style="height: 400px; width: auto;">
    <figcaption>
        Note : <?= $film["note"]; ?><br>
        Durée : <?= $film["duree_heure"]; ?><br>
        Sortie en France le : <?= $film["date_sortiefr"]; ?><br>
    </figcaption>
</figure>
<article>
    <h2>Résumé</h2>
    <p>
        <?= $film['resume_film']; ?>
    </p>
</article>

<?php

    $contenu = ob_get_clean();
    $title = "Détail du film";
    require "./views/template.php";