<body> 
    <h1>Inscription</h1>
    <div class="container-inscription">

        <form class="inscription" action="index.php?ctrl=security&action=register" method="POST">
            <label class="t-pseudo" for="pseudo">Pseudo :</label>
            <input class="pseudo" type="text" name="pseudo" id="pseudo" placeholder="Pseudo.."><br>
    
            <label class="t-email" for="email">Mail :</label>
            <input class="email" type="email" name="email" id="email"
            placeholder="Email.."><br>
    
            <label class="t-password" for="pass">Mot de passe :</label>
            <input class="password" type="password" name="pass1" id="pass1"
            placeholder="Mot de passe.."><br>
    
            <label class="t-password" for="pass2">Confirmer le mot de passe :</label>
            <input class="password" type="password" name="pass2" id="pass2" placeholder="Mot de passe.."><br>
    
            <input class="submit" type="submit" name="submit" value="Crée mon compte">
        </form>
    </div>
</body>
