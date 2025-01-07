<?php
    $sujet = $result["data"]["sujet"];
    $messages = $result["data"]["messages"];
?>

<a href="index.php?ctrl=forum&action=listSujetsByCategorie&id=<?= $sujet->getCategorie()->getId() ?>"><i class="fa-solid fa-arrow-left"> retour</i></a>
<h2>Liste des messages</h2>

<h3><?= $sujet->getTitre() ?></h3>

<?php
foreach($messages as $message ){ ?>
    <p><?= $message->getTexte() ?></a> par : <?= $message->getUtilisateur() ?></p>
<?php } ?>

<?php if(App\Session::getUser() && $sujet->getVerrouillage() === 0){ ?>
<h1>Répondre</h1>

    <form action="index.php?ctrl=forum&action=addMessage&id=<?= $sujet->getId() ?>" method="post">
        <p>
            <label for="pseudo"><?= $message->getUtilisateur() ?> :<br><!-- A changer pour nom utilisateur connecter -->
            <textarea name="texte" id="texte" placeholder="Tapez votre message ici.." rows="10" cols="50"></textarea>
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Poster">
        </p>
      
    </form>
<?php } ?>
