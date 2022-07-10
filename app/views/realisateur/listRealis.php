<?php

    ob_start();

?>

<h1>liste réalisateurs</h1>


<?php foreach($realisateurs->fetchAll() as $realisateur) { ?>

    <a href='index.php?action=detailReali&id=<?= $realisateur['id_realisateur']; ?>'><?= $realisateur['nom_complet_realisateur'] ?> </a>
    <a href="index.php?action=modifyReali&id=<?= $realisateur['id_realisateur']; ?>"> Modifier</a><br/>

<?php } ?>
<br>
<br>
<a href="index.php?action=addReali">Ajouter un réalisateur +</a><br>
<a href="index.php?action=removeReali">Supprimer un réalisateur -</a><br><br>



<?php

    $contenu = ob_get_clean();
    $title   = "Liste realisateurs";
    require "./views/template.php";