<?php
    ob_start();
?>

<div class="container">
    <h2>Nouveau réalisateur</h2>
    <form action="index.php?action=addReali" method="POST">
        <input type="text" name="nom_realisateur" placeholder="Entrez le nom du réalisateur" required>
        <input type="text" name="prenom_realisateur" placeholder="Entrez le prénom du réalisateur" required>
        <button type="submit" name="submit">Valider</button>
    </form>
</div>

<?php
    $contenu = ob_get_clean();
    $title   = "Ajouter realisateurs";
    require "./views/template.php";