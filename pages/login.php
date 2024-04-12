<?php  
require_once(__DIR__ . '/../Connexion/connexionBDD.php');

session_start();

//tentative récupération id_client via la combinaison email-mot de passe saisie par l'utilisateur
if (isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $sql = "SELECT id_client FROM clients WHERE email = :email AND motdepasse = :pwd";

    $stmt = $mysqlClient->prepare($sql);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":pwd", $password);
    $stmt->execute();
    $id_client= $stmt->fetch(PDO::FETCH_NUM);

    //Test récupération id_client (ce qui valide que la combinaison email-mdp est correcte)
    if (!$id_client) {
        $_SESSION["id_client"] = 0;
        echo "Cette combinaison compte/mot de passe n'existe pas. Veuillez recommencer.";
    } else  { 
        //echo "Nous avons bien un id client";
        $_SESSION["id_client"] = $id_client[0];

        header("Location: index.php");
        exit; // fin du script après la redirection
    }
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Quête de Rêve</title>
    <?php require_once(__DIR__ . '/importCSS.php'); 
    echo "<pre>"; var_dump(__DIR__ . '/importCSS.php'); echo "</pre>";?>

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

            <!--<form action="construction.html"> -->
            <form method="post">
                <!-- Vos champs de formulaire ici -->
                <div class="form-group">
                    <label for="email">Adresse mail*</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <br><br>
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe*</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" required>
                    <br><br>
                </div>
                <a href="construction.html">Mot de passe oublié?</a>
                <br><br>
                

                    <button class="bouton-bleu" type="submit">Connexion</button>
                </form>

                <!--<button class=bouton-bleu type="submit">Connexion</button> -->
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
    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer> 
</body>
</html>