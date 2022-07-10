<?php
    ob_start();
?>

<div class="container">
    <h2>Supression d'un réalisateur</h2>
    <p>Un champ doit obligatoirement être complété !</p>
    <form action="index.php?action=removeReali" method="POST">
        <input type="text" name="nom_realisateur" placeholder="Entrez le nom du réalisateur">
        <input type="text" name="prenom_realisateur" placeholder="Entrez le prénom du réalisateur">
        <button type="submit" name="submit">Valider</button>
    </form>
</div>

<?php
    $contenu = ob_get_clean();
    $title   = "Supprimer realisateurs";
    require "./views/template.php";