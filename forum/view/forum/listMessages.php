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

<h1>Répondre</h1>

<form action="index.php?ctrl=forum&action=addMessage&id=<?= $sujets->getId() ?>" method="post">
    <p>
        <label for="pseudo"><?= $message->getUtilisateur() ?> <!-- A changer pour nom utilisateur connecter -->
            <input type="text" name="texte">
        </label>
    </p>
    <p>
        <input type="submit" name="submit" value="Poster">
    </p>
  
</form>