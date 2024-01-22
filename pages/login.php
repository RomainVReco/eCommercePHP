<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Quête de Rêve</title>
    <?php require_once(__DIR__ . '/importCSS.php'); ?>
    <link rel="stylesheet" type="text/css" href="../css/login.css"> 
</head>
<body>
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <div class=partie-haute>
        <br><br>
        <h2>Identifiez-vous ou créez un compte</h2>
        <div class = panneau-titre>
            <div class=panneau-gauche>
                <p class="encadrement-fonce-titre">
                    <a href="login.php" class="lien-sans-soulignement-fonce">Login client</a>
                </p>
            </div>
            <div class=panneau-droite>
                <br>
                <p class="encadrement-clair-titre">
                <a href="creation-compte.php" class="lien-sans-soulignement">Créer un compte utilisateur</a>
            </p>
            </div>
        </div>
    </div>
    <div class=panneau-login>
        <div class=panneau-gauche>
            <form action="construction.html">
                <div class="form-group">
                    <label for="email">Adresse mail*</label>
                    <input type="email" class="form-control" id="email" required>
                    <br><br>
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe*</label>
                    <input type="password" class="form-control" id="pwd" required>
                    <br><br>
                </div>
                <a href="construction.html">Mot de passe oublié?</a>
                <br><br>
                <button class=bouton-bleu type="submit">Connexion</button>
                <br><br>
                <p>* Champs obligatoires</p>
            </form>
        </div>
        <div class=panneau-droit>
            <h3>Avez-vous des questions concernant votre compte utilisateur?</h3>
            <br>
            <p>N'hésitez pas à nous appeler ou à nous écrire un e-mail.</p>
            <p>Email: service@ma-quete-de-reve.com</p>
            <p>Tél: +33 (0) 1 23 45 67 89</p>
        </div>

    </div>


 
    
</body>
</html>