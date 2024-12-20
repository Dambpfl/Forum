<?php
    $categories = $result["data"]['categorie']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>

<h2><?= $category->getNomCategorie(); ?></h2>

<?php
foreach($topics as $topic ){ ?>
    <p><a href="index.php?ctrl=forum&action=listMessagesBySujet&id=<?= $categorie->getId() ?>"><?= $topic ?></a> par <?= $topic->getUtilisateur() ?></p>
<?php }
