<body>
    <h1>Se connecter</h1>
    <form class="connexion" action="index.php?ctrl=security&action=login" method="POST">
        <label class="t-email" for="email">Email</label>
        <input class="email" type="email" name="email" id="email"><br>

        <label class="t-password" for="password">Mot de passe</label>
        <input class="password" type="password" name="password" id="password"><br>

        <input class="submit" type="submit" name="submit" value="Se connecter">
    </form>
</body>