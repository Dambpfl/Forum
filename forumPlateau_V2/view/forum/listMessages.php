<?php
    $sujets = $result["data"]["sujet"];
    $messages = $result["data"]["message"];
?>

<h2>Liste des messages</h2>

<h3>Nom du sujet</h3>

<?php
foreach($messages as $message ){ ?>
    <p><?= $message->getTexte() ?></a></p>
<?php }