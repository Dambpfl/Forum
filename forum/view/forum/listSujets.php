<?php
use App\Session;

    $categorie = $result["data"]['categorie']; 
    $sujets = $result["data"]['sujet']; 
?>


<h1><?= $categorie->getNomCategorie(); ?></h1>
<a class="retour" href="index.php?ctrl=forum&action=listCategories&id=<?= $categorie->getId() ?>"><i class="fa-solid fa-arrow-left"> retour</i></a>



<div class="container-sujet">        
    <?php foreach($sujets as $sujet ){ 
        $verrouillage = $sujet->getVerrouillage();
    ?>
            <div class="sujet-wrapper">
                <a class="sujet" href="index.php?ctrl=forum&action=listMessagesBySujet&id=<?= $sujet->getId() ?>">
                    <div class="sujet-lock">
                        <?php if(App\Session::getUser() && $verrouillage === 1 ){ ?>
                                <i class="fa-solid fa-lock"></i>
                        <?php } ?>
                    </div>
                    <div class="titre-sujet">
                        <?= $sujet->getTitre(); ?>
                    </div>
                    <div class="name-user-sujet">
                        Créer par : <?= $sujet->getUtilisateur() ?>
                    </div>
                    <div class="date-post-sujet">
                        le <?= $sujet->getdateCreation() ?>
                    </div>
                </a>

                <div class="sujet-lock-admin">
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
                            <a class="supp-sujet" href="index.php?ctrl=forum&action=deleteSujet&id=<?= $sujet->getId() ?>"><i class="fa-solid fa-x"></i></a>
                        <?php } ?>
                </div>
                            
                </div>
        <?php } ?>
</div>


<h2>Crée un nouveau sujet</h2>
<div class="container-newSujet">

    <?php if(App\Session::getUser()){ ?>
    
            <form action="index.php?ctrl=forum&action=addSujet&id=<?= $categorie->getId() ?>" method="post">
                <div class="container-t-sujet">
                    <div class="t-sujet">
                        <label for="titre">Titre du sujet :</label>
                        <input type="text" name="titre">
                    </div>
                        <textarea name="texte" id="texte" placeholder="Tapez votre message ici.." rows="10" cols="50" style="width:760px; height: 160px;"></textarea>
                </div>
                
                        <div class="container-submit">
                                <input class="s-submit" type="submit" name="submit" value="Poster">
                        </div>
                           
            </form>
    <?php } ?>
</div>