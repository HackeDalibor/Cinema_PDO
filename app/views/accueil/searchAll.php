<?php

    ob_start();

?>

<?php foreach ($resultats->fetchAll() as $resultat) : ?>
    <p><?= $resultat['titre_film']; ?></p>
<?php endforeach; ?>
<?php
    
    $contenu = ob_get_clean();
    $title = "Résultats";
    require "./views/template.php";