<?php

$_GET["reference_article"] = "10";
if (isset($_GET["reference_article"])) {
    $ref_article = intval($_GET["reference_article"]);
} else {
    echo "Probleme de recuperation de la variable reference_article!";
}    
//Récupération d'informations sur le produit
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=maquettisme;port=3306;charset=utf8mb4', 'root', '');
    $stmt = $dbh->prepare('SELECT * FROM produits WHERE id_produit = :ref_article');
    $stmt->bindParam(':ref_article', $ref_article, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Récupère la première ligne du résultat
    $dbh = null;
} catch (Exception $e) {
    $message = $e->getMessage();
    echo ''. $message .'';
}

$_GET["reference_client"] = "1";
if (isset($_GET["reference_client"])) {
    $ref_client = intval($_GET["reference_client"]);
} else {
    echo "Probleme de recuperation de la variable reference_client!";
}    

$_POST["reference_client"] = "1";
if (isset($_POST["reference_client"])) {
    $ref_client = intval($_POST["reference_client"]);
} else {
    echo "Probleme de recuperation de la variable reference_client!";
}    

//Récupération d'informations sur le client
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=maquettisme;port=3306;charset=utf8mb4', 'root', '');
    $stmt = $dbh->prepare('SELECT * FROM clients WHERE id_client = :ref_client');
    $stmt->bindParam(':ref_client', $ref_client, PDO::PARAM_INT);
    $stmt->execute();
    $row1 = $stmt->fetch(PDO::FETCH_ASSOC); // Récupère la première ligne du résultat
    $dbh = null;
} catch (Exception $e) {
    $message = $e->getMessage();
    echo ''. $message .'';
}


//$sql = "INSERT INTO `clients`(``, `nom_produit`, `echelle`, `id_categorie`, `quantite`, `prix`, `id_marque`, `description`, `age_recommande`, `reference_image`) VALUES  (:nom, :echelle, :categorie, :quantite, :prix, :marque, :description, :age_recommande, :reference_image);";

try {
    $mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=maquettisme;port=3306;charset=utf8mb4', 'root', '');
    $sql = "INSERT INTO `clients`(`nom_client`, `prenom_client`, `email`, `motdepasse`) VALUES (:nom, :prenom, :email, :motdepasse)";
    $stmt = $mysqlClient->prepare($sql);
    $stmt->bindValue(':nom', $_POST['nom']);
    $stmt->bindValue(':prenom', $_POST['prenom']);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':motdepasse', $_POST['motdepasse']);
    $stmt->execute();
    //$query_result[] = $_POST;
} catch (Exception $e) {
    $message = $e->getMessage();
    echo ''. $message .'';
}   


?>
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
            <form action="action_page.php">
            <div class="container">
                <label for="text">Prénom*</label>
                <input type="text" id="prenom" name="prenom" required>
                <label for="text">Nom*</label>
                <input type="text" id="nom" name="nom" required>
                <label for="email">Adresse mail*</label>
                <input type="email" id="email" name="email" required> 
                <br><br>
                <label for="psw">Mot de passe*</label>
                <input type="password"id="psw" name="psw" required>
                <br><br>
                <label for="psw-repeat">Confirmation*</label>
                <input type="password" id="psw-repeat" name="psw-repeat" required>
                <br><br>
                <button class=bouton-bleu type="submit">Enregistrement</button>
                <br><br>
                <p>* Champs obligatoires</p>
            </div>
            </form>
    </div>
    <h1>Informations client</h1>
    <?php
            echo "<p>Nom : " . $row1['nom_client'] . "</p>";
            echo "<p>Prénom : " . $row1['prenom_client'] . "</p>";
            echo "<p>Email : " . $row1['email'] . "</p>";
            echo "<p>Password : " . $row1['motdepasse'] . "</p>";
    ?>
    
</body>
</html>
