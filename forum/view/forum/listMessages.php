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

<form action="???" method="post">
    <label for="pseudo"><?= $message->getUtilisateur() ?></label> <!-- A changer pour nom utilisateur connecter -->
    <input type="text">
    <button type="submit">Poster</button>
  
</form>