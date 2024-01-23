<?php

require_once(__DIR__ . '/../Connexion/connexionBDD.php');
require_once(__DIR__ . '/../Connexion/functions.php');

session_start();
checkIfSessionHasPanier($_SESSION);
$_SESSION["derniere_page_produit"] = getCurrentPage($_SERVER);

$_GET["reference_article"] = "20";
if (isset($_GET["reference_article"])) {
    $ref_article = intval($_GET["reference_article"]);
} else {
    echo "Probleme de recuperation de la variable reference_article!";
}
//Récupération d'informations dans la base
$stmt = $mysqlClient->prepare('SELECT * FROM produits WHERE id_produit = :ref_article');
$stmt->bindParam(':ref_article', $ref_article, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC); // Récupère la première ligne du résultat

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Quête de Rêve</title>
    <?php require_once(__DIR__ . '/importCSS.php'); ?>
</head>

<body>
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <div class=container>
        <div class="boite-image">
            <img class="boite-image" src="../Ressources/assets_produits/<?= $row['reference_image'] ?>"
                title="<?= $row['reference_image'] ?>" alt="<?= $row['reference_image'] ?>" />
        </div>
        <div class=infos_generales>
            <?php
            echo "<h1>" . $row['nom_produit'] . "</h1>";
            echo "<p>Référence article : " . $row['id_produit'] . "</p>";
            echo "<p>Age recommandé : " . $row['age_recommande'] . " ans</p>";
            echo "<p>Prix : €" . $row['prix'] . " </p>";
            ?>
            <form action="./panier.php" method="post">
                <label for="nombre">Qté :</label>
                <select id="nombre" name="nombre">
                    <?php
                    // Gérer l'ajout de 1 à 30 articles
                    for ($i = 1; $i <= $row['quantite']; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                </select>
                <input type="hidden" name="nom" value="<?= $row['nom_produit']?>">
                <input type="hidden" name="id_produit" value="<?= $row['id_produit']?>">
                <input type="hidden" name="image" value="<?= $row['reference_image']?>">
                <button type="submit">Ajouter au panier</button>
            </form>
        </div>
    </div>

    <div class="description-produit">
        <h1>Informations produit</h1>
        <?php
        echo "<p>Nom article : " . $row['nom_produit'] . "</p>";
        echo "<p>Référence article : " . $row['id_produit'] . "</p>";
        echo "<p>Description : </p>";
        echo "<p>" . $row['description'] . "</p>";
        ?>
    </div>

    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>

</html>