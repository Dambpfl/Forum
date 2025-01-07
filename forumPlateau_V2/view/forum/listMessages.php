<?php
    // $qujet = ...;
    $messages = $result["data"]['messages']; 
?>

<h2>Liste des messages</h2>

<h3>Nom du sujet</h3>

<?php
foreach($messages as $message ){ ?>
    <p><?= $message->getTexte() ?></a></p>
<?php }