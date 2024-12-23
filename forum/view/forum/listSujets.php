<?php
    $categories = $result["data"]['category']; 
    $sujets = $result["data"]['topics']; 
?>

<h1>Liste des Sujets</h1>

<h2><?= $categories->getNomCategorie(); ?></h2>

<?php
foreach($sujets as $sujet ){ ?>
    <p><a href="index.php?ctrl=forum&action=listMessagesBySujet&id=<?= $categories->getId() ?>"><?= $sujet ?></a> par <?= $sujet->getUtilisateur() ?></p>
<?php } ?>

<h2>Crée un nouveau sujet</h2>
<form action="index.php?ctrl=forum&action=addSujet&id=<?= $categories->getId() ?>" method="post">
    <p>
        <label for="titre">Titre :</label>
        <input type="text" name="titre">
    </p>
    <p>
        <textarea name="message" id="message" placeholder="Tapez votre message ici.." rows="10" cols="50"></textarea>
    </p>
    <p>
        <input type="submit" name="submit" value="Poster">
    </p>
</form>