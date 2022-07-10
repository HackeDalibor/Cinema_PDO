<?php

    ob_start();

?>

<h1>liste genres</h1>



    <?php foreach($genres->fetchAll() as $genre) { ?>
        *<a href='index.php?action=detailGenre&id=<?= $genre["id_genre"]; ?>'><?= $genre['type_genre'] ?></a>
    <?php } ?>
    </tbody>
</table>

<?php      

    $contenu = ob_get_clean();
    $title   = "Liste genres";
    require "./views/template.php";