<?php
    $sujets = $result["data"]["sujet"];
    $messages = $result["data"]["message"];
?>

<h2>Liste des messages</h2>

<h3><?= $sujets->getTitre() ?></h3>

<?php
foreach($messages as $message ){ ?>
    <p><?= $message->getTexte() ?></a> par : <?= $message->getUtilisateur() ?></p>
<?php } ?>

<?php if(App\Session::getUser()){ ?>
<h1>Répondre</h1>

    <form action="index.php?ctrl=forum&action=addMessage&id=<?= $sujets->getId() ?>" method="post">
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
