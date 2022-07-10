<?php
    ob_start();
    $genre = $stmt->fetch();
?>

<h1>Genre : <?= $genre["type_genre"]; ?> (<?= $genre["nb_films"] ?>)</h1>
<?php foreach( $stmtGenre->fetchAll() as $gnre) {?>
    <a href="index.php?action=detailFilm&id=<?= $gnre["film_id"]; ?>"><?= $gnre['titre_film']; ?></a><br>


<?php }

    $contenu = ob_get_clean();
    $title = "Détail du genre";
    require "./views/template.php";