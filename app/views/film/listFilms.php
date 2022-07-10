<?php

    ob_start();

?>

<h1>liste films</h1>

<table>
    <thead>
        <tr>
            <th><strong>Titre</strong></th>
            <th><strong>Durée</strong></th>
            <th><strong>Réalisateur</strong></th>
        </tr>
    </thead>
    <tbody>

    <?php foreach($films->fetchAll() as $film) { ?>
        <tr>
                <td>
                    <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">
                        <?= $film['titre_film'] ?>
                    </a>
                </td>
                <td><?= $film['duree'] ?></td>
                <td>
                    <a href="index.php?action=detailReali&id=<?= $film['realisateur_id']; ?>">
                        <?= $film['nom_complet_realisateur'] ?>
                    </a>
                </td>
            </tr>
    <?php } ?>

    </tbody>
</table>

<?php
    $contenu = ob_get_clean();
    $title   = "Liste films";
    require "./views/template.php";