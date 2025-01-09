<body>
    <h1>Connexion</h1>
    <div class="container-connexion">
        <form class="connexion" action="index.php?ctrl=security&action=login" method="POST">
            
            <label class="t-email" for="email">Email</label>
            <input class="email" type="email" name="email" id="email"
            placeholder="E-mail.."><br>
    
            <label class="t-password" for="password">Mot de passe</label>
            <input class="password" type="password" name="password" id="password" placeholder="Mot de passe.."><br>
    
            <input class="submit" type="submit" name="submit" value="Se connecter">
        </form>
    </div>
</body>