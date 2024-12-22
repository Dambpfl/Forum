<?php
    $categories = $result["data"]['category']; 
    $sujets = $result["data"]['topics']; 
?>

<h1>Liste des Sujets</h1>

<h2><?= $categories->getNomCategorie(); ?></h2>

<?php
foreach($sujets as $sujet ){ ?>
    <p><a href="index.php?ctrl=forum&action=listMessagesBySujet&id=<?= $categories->getId() ?>"><?= $sujet ?></a> par <?= $sujet->getUtilisateur() ?></p>
<?php }
