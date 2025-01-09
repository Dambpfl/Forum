<?php
use App\Session;

    $categorie = $result["data"]['categorie']; 
    $sujets = $result["data"]['sujet']; 
?>


<h1><?= $categorie->getNomCategorie(); ?></h1>
<a class="retour" href="index.php?ctrl=forum&action=listCategories&id=<?= $categorie->getId() ?>"><i class="fa-solid fa-arrow-left"> retour</i></a>



<?php
foreach($sujets as $sujet ){ 
    $verrouillage = $sujet->getVerrouillage();
    ?>
    
    <div class="container-sujet">        
            <p>
                <a class="sujet" href="index.php?ctrl=forum&action=listMessagesBySujet&id=<?= $sujet->getId() ?>">
                    <?= $sujet->getTitre(); ?>
                </a>
                <div class="name-user-sujet">
                    par <?= $sujet->getUtilisateur() ?>
                </div>
                <div class="date-post-sujet">
                    le <?= $sujet->getdateCreation() ?>
                </div>
            </p>
    </div>
    
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
    <?php if(App\Session::isAdmin()) {?>
        <a href="index.php?ctrl=forum&action=deleteSujet&id=<?= $sujet->getId() ?>">Supprimer</a>
    <?php } ?>

    <?php if(App\Session::getUser() && $verrouillage === 1 ){ ?>
        <i class="fa-solid fa-lock"></i>
    <?php } ?>
<?php } ?>


<h2>Crée un nouveau sujet</h2>
<div class="container-newSujet">

    <?php if(App\Session::getUser()){ ?>
    
            <form action="index.php?ctrl=forum&action=addSujet&id=<?= $categorie->getId() ?>" method="post">
                <div class="container-t-sujet">
                    <div class="t-sujet">
                            <label for="titre">Titre :</label>
                            <input type="text" name="titre">
                            <textarea name="texte" id="texte" placeholder="Tapez votre message ici.." rows="10" cols="50"></textarea>
                    </div>
                    
                </div>
                
                        <div class="container-submit">
                                <input class="s-submit" type="submit" name="submit" value="Poster">
                        </div>
                           
            </form>
    <?php } ?>
</div>