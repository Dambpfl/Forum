<?php
    $categories = $result["data"]['categories']; 
?>

<h1>Catégories</h1>

<div class="container-categorie">
    <?php foreach($categories as $categorie ){ ?>
        <div class="categorie-wrapper">
            <p><a class="categorie" href="index.php?ctrl=forum&action=listSujetsByCategorie&id=<?= $categorie->getId() ?>"><?= $categorie->getNomCategorie() ?></a></p>  
        </div>
    <?php } ?>
</div>


  
