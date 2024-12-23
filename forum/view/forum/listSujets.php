<?php
    $categorie = $result["data"]['categorie']; 
    $sujets = $result["data"]['sujet']; 
?>

<h1>Liste des Sujets</h1>

<h2><?= $categorie->getNomCategorie();  ?></h2>

<?php
foreach($sujets as $sujet ){ 
    $verrouillage = $sujet->getVerrouillage();
    ?>
    
    <p><a href="index.php?ctrl=forum&action=listMessagesBySujet&id=<?= $sujet->getId() ?>">
        <?= $sujet->getTitre(); ?>
    </a>
    par <?= $sujet->getUtilisateur() ?></p>

    <?php if($verrouillage === 1) { ?>
        <a href="index.php?ctrl=forum&action=verrouillerSujet&id=<?= $sujet->getId() ?>">Deverrouiller</a>
       
    <?php } else { ?>
            <a href="index.php?ctrl=forum&action=verrouillerSujet&id=<?= $sujet->getId() ?>">Verrouiller</a> 
        <?php  } ?>
        
<?php } ?>

<h2>Crée un nouveau sujet</h2>
<form action="index.php?ctrl=forum&action=addSujet&id=<?= $categorie->getId() ?>" method="post">
    <p> 
        <label for="titre">Titre :</label>
        <input type="text" name="titre">
    </p>
    <p>
        <textarea name="texte" id="texte" placeholder="Tapez votre message ici.." rows="10" cols="50"></textarea>
    </p>
    <p>
        <input type="submit" name="submit" value="Poster">
    </p>
</form>