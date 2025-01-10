<?php
    $sujet = $result["data"]["sujet"];
    $messages = $result["data"]["messages"];
?>

<h1><?= $sujet->getTitre() ?></h1>


<!-- Affiche les informations des messages -->
<div class="container-message">
    <a class="retour" href="index.php?ctrl=forum&action=listSujetsByCategorie&id=<?= $sujet->getCategorie()->getId() ?>"><i class="ri-arrow-left-box-fill"></i></a>
    <?php foreach($messages as $message ){ ?>
        <div class="message-content">
            <div class="mess-user-role">
                <div class="message-user"><p><?= $message->getUtilisateur() ?></p></div>
                <div class="message-role"><p><?= $message->getUtilisateur()->getRole() ?></p></div>
            </div>
            <div class="message-date"><p>le <?= $message->getDateCreation() ?></p></div>
            <div class="message-text"><p><?= $message->getTexte() ?></a></p></div>
            <!-- Si l'utilisateur à le meme pseudo que le message alors supprimer OU admin supp n'importe quel message -->
            <?php if(App\Session::getUser() && $message->getUtilisateur()->getPseudo() === $_SESSION['user']->getPseudo() || App\Session::isAdmin()) { ?>
                <a class= "supp-message" href="index.php?ctrl=forum&action=deleteMessage&id=<?= $message->getId() ?>"><i class="fa-solid fa-rectangle-xmark"></i></a>
            <?php } ?>
        </div>
        
    <?php } ?>
</div>
            
            <!-- Si utilisateur et sujet non verrouiller -->
<?php if(App\Session::getUser() && $sujet->getVerrouillage() === 0){ ?>
                
    <h2>Répondre</h2>
    <div class="container-newMessage">
        <form action="index.php?ctrl=forum&action=addMessage&id=<?= $sujet->getId() ?>" method="post">
            <div class="container-t-message">
                <div class="t-message">
                    <label for="pseudo"><?= $_SESSION['user'] ?> :<br>
                </div>
                <textarea name="texte" id="texte" placeholder="Tapez votre message ici.." rows="10" cols="50"></textarea>
            <div class="container-mSubmit">
                <input class="m-submit"type="submit" name="submit" value="Poster">
            </div>     
        </form>
    </div>
<?php } ?>     