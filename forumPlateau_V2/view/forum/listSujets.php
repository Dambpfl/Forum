<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des Sujets</h1>

<h2><?= $category->getNomCategorie(); ?></h2>

<?php
foreach($topics as $topic ){ ?>
    <p><a href="index.php?ctrl=forum&action=listMessagesBySujet&id=<?= $category->getId() ?>"><?= $topic ?></a> par <?= $topic->getUtilisateur() ?></p>
<?php }
