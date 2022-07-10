<?php

    ob_start();

?>

<h1>liste acteurs</h1>


<table>
    <thead>
        <tr>
            <th><strong>Nom et prénom</strong></th>
            <th><strong>Sexe</strong></th>
            <th><strong>Age</strong></th>
        </tr>
    </thead>
    <tbody>
       <?php foreach($acteurs->fetchAll() as $acteur) { ?>
        <tr>
            <td><a href="index.php?action=detailActeur&id=<?= $acteur['id_acteur']; ?>"><?= $acteur['nom_acteur']; ?></a></td>
            <td><a href='#'><?= $acteur['sexe_acteur']; ?></a></td>
            <td><?= $acteur['age_acteur']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>


<?php
    $contenu = ob_get_clean();
    $title   = "Liste acteurs";
    require "./views/template.php";