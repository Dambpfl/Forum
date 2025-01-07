<?php
use App\Session;

    $categorie = $result["data"]['categorie']; 
    $sujets = $result["data"]['sujet']; 
?>


<h1>Liste des Sujets</h1>
<a href="index.php?ctrl=forum&action=listCategories&id=<?= $categorie->getId() ?>"><i class="fa-solid fa-arrow-left"> retour</i></a>

<h2><?= $categorie->getNomCategorie(); ?></h2>


<?php
foreach($sujets as $sujet ){ 
    $verrouillage = $sujet->getVerrouillage();
    ?>
    
    <p>
        <a href="index.php?ctrl=forum&action=listMessagesBySujet&id=<?= $sujet->getId() ?>">
            <?= $sujet->getTitre(); ?>
        </a>
        par <?= $sujet->getUtilisateur() ?>
    </p>
    
    <?php if(App\Session::isAdmin()){
            if($verrouillage === 1) { ?>
                <a href="index.php?ctrl=forum&action=verrouillerSujet&id=<?= $sujet->getId() ?>">
                    <i class="fa-solid fa-lock"></i>
                </a>        
    <?php } else { ?>
                <a href="index.php?ctrl=forum&action=verrouillerSujet&id=<?= $sujet->getId() ?>">
                    <i class="fa-solid fa-lock-open"></i>
                </a> 
        <?php  } ?>    
    <?php } ?>
<?php } ?>

<?php if(App\Session::getUser()){ ?>
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
<?php } ?>