<?php
    ob_start();
    $realisateur = $stmtReali2->fetch();
?>

<div class="container">
    <h2>Trouvez le réalisateur</h2>
    <form action="index.php?action=modifyReali&id=<?= $realisateur['id_realisateur']; ?>" method="POST">
        <input type="text" name="nom_realisateur" value="<?= $realisateur['nom_realisateur']; ?>" required>
        <input type="text" name="prenom_realisateur" value="<?= $realisateur['prenom_realisateur']; ?>" required>
        <input type="submit" name="submit" value="Valider">
    </form>
</div>

<?php

    $contenu = ob_get_clean();
    $title   = "Modifier realisateurs";
    require "./views/template.php";