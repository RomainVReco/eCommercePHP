<?php  
require_once(__DIR__ . '/../Connexion/connexionBDD.php');

if (isset($_POST["nom"])) {
    try {
        $sql = "INSERT INTO `clients`(`nom_client`, `prenom_client`, `email`, `motdepasse`) VALUES (:nom, :prenom, :email,:motdepasse)";
        $stmt = $mysqlClient->prepare($sql);
        $stmt->bindValue(':nom', $_POST['nom']);
        $stmt->bindValue(':prenom', $_POST['prenom']);
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->bindValue(':motdepasse', $_POST['motdepasse']);
        $mdp=$_POST['motdepasse'];
        $mdpbis=$_POST['mdp-repete'];

        if ( $mdp == $mdpbis ) {
            
            //echo "Le mot de passe est bien répété 2 fois.";
            $stmt->execute();
            $mysqlClient= null;
        } else {
            //echo 'Le mot de passe n a pas été saisie de manière identique lors de la re-saisie...';
            $mysqlClient= null;
        }


    } catch (Exception $e) {
        $message = $e->getMessage();
        echo ''. $message .'';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
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
                <p class="encadrement-clair-titre">
                    <a href="login.php" class="lien-sans-soulignement">Login client</a>
                </p>
            </div>
            <div class=panneau-droite>
                <br>
                <p class="encadrement-fonce-titre">
                    <a href="creation-compte.php" class="lien-sans-soulignement-fonce">Créer un compte utilisateur</a>
                </p>
            </div>
        </div>
    </div>
    <div class=panneau-login>
            <form method='POST'>
                <div class="container">
                    <label>Prénom*</label>
                    <input type="text" id="prenom" name="prenom" required>
                    <label>Nom*</label>
                    <input type="text" id="nom" name="nom" required>
                    <label>Adresse mail*</label>
                    <input type="email" id="email" name="email" required> 
                    <br><br>
                    <label>Mot de passe*</label>
                    <input type="password" id="motdepasse" name="motdepasse" required>
                    <br><br>
                    <label>Confirmation*</label>
                    <input type="password" id="mdp-repete" name="mdp-repete" required>
                    <br><br>
                    <button class=bouton-bleu type="submit">Enregistrement</button>
                    <br><br>
                    <p>* Champs obligatoires</p>
                </div>
            </form>
    </div>
    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>
