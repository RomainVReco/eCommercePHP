<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Quête de Rêve</title>
    <?php require_once(__DIR__ . '/importCSS.php'); ?>
    <link href="../css/login.css" rel="stylesheet"> 
</head>
<body>
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <div class=partie-haute>
        <h2>Identifiez-vous ou créez un compte</h2>
        <div class = panneau-titre>
            <div class=panneau-gauche>
                <p class=encadrement-clair-titre>Login client</p>
            </div>
            <div class=panneau-droite>
                <br>
                <p class=encadrement-fonce-titre>Créer un compte utilisateur</p>
            </div>
        </div>
    </div>
    <div class=panneau-login>
            <form action="action_page.php">
            <div class="container">
                <label for="text">Prénom*</label>
                <input type="text" name="prenom" required>
                <label for="text">Nom*</label>
                <input type="text" name="nom" required>
                <label for="email">Adresse mail*</label>
                <input type="email" name="email" required> 
                <br><br>
                <label for="psw">Mot de passe*</label>
                <input type="password" name="psw" required>
                <br><br>
                <label for="psw-repeat">Confirmation*</label>
                <input type="password" name="psw-repeat" required>
                <br><br>
                <button class=bouton-bleu type="submit">Enregistrement</button>
                <br><br>
                <p>* Champs obligatoires</p>
            </div>
            </form>
    </div>
    
</body>
</html>
