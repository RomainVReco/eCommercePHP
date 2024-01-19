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
    <h2>Identifiez-vous ou créez un compte</h2>
    <div class=panneau-login>
        <div class=panneau-gauche>
            <form action="/action_page.php">
                <div class="form-group">
                    <label for="email">Adresse mail*</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe*</label>
                    <input type="password" class="form-control" id="pwd">
                </div>
                <a href="construction.html" alt="Mot de passe oublié?">Mot de passe oublié?</a>
                <br>
                <button class=bouton-bleu type="submit" class="btn btn-default">Connexion</button>
                <br>
                <br>
                <p>* Champs obligatoires</p>
            </form>
        </div>
        <div class=panneau-droit>
            <h3>Avez-vous des questions concernant votre compte utilisateur?</h3>
            <br>
            <p>N'hésitez pas à nous appeler ou à nous écrire un e-mail.</p>
            <p>Email: service@ma-quete-de-reve.com</p>
            <p>Tél: +33 (0) 1 55 65 53 67 (ESIEE-IT)</p>
        </div>

    </div>


 
    
</body>
</html>