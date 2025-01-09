<?php
    $categories = $result["data"]['categories']; 
?>

<h1>Catégories</h1>

<?php
foreach($categories as $categorie ){ ?>
    <div class="container-categorie">
        
            <p><a class="categorie" href="index.php?ctrl=forum&action=listSujetsByCategorie&id=<?= $categorie->getId() ?>"><?= $categorie->getNomCategorie() ?></a></p>
        
    </div>
<?php }


  
