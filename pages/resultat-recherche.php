<?php

require_once(__DIR__ . '/../Connexion/connexionBDD.php');
$query_result = null;
if (isset($_GET["recherche"])) {
    $query = $_GET["recherche"];
    $sql = "SELECT * 
    FROM produits as p
    WHERE p.nom_produit LIKE :query";
    $stmt = $mysqlClient->prepare($sql);
    $stmt->bindParam(':query', $param_query, PDO::PARAM_STR);
    $param_query = '%' . $query . '%';
    $stmt->execute();
    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat recherche</title>
    <?php require_once(__DIR__ . '/importCSS.php'); ?>
</head>

<body>
    <div class="container-page-grid">
        <header class="header-recherche">
            <?php require_once(__DIR__ . '/header.php'); ?>
        </header>
        <div class="sidebar">
            <ol>
                <li><a href="#">Maquettes de voiture</a></li>
                <li><a href="#">Maquettes de moto</a></li>
                <li><a href="#">Maquettes militaire</a></li>
                <li><a href="#">Peintures</a></li>
                <li><a href="#">Accessoires</a></li>
            </ol>
        </div>
        <div class="main-body">
            <div class="product-detail-container">
                <?php if (is_null($query_result) || count($query_result) == 0): ?>
                    <div class="no-result">Pas de résultat pour votre recherche :
                        <?= $query ?>
                    </div>
                <?php else: ?>
                    <?php foreach ($query_result as $value): ?>
                        <div class="product">
                            <a style="text-decoration:none ; color:black" class="product_main_container_link" href="produit.php?id_produit=<?= $value['id_produit'] ?>"
                                title="<?= $value['nom_produit'] ?>">
                                <img class="product__image-box" loading="lazy"
                                    src="../Ressources/assets_produits/<?= $value['reference_image'] ?>"
                                    title="<?= $value['nom_produit'] ?>" alt="<?= $value['nom_produit'] ?>">
                                <div class="product__content">
                                    <h3 class="product__title">
                                        <?= $value['nom_produit'] ?>
                                    </h3>
                                    <p class="product__sku">Quantité disponible :
                                        <?= $value['quantite'] ?>
                                    </p>
                                    <p class="product__price">
                                        <?= $value['prix'] . " €" ?>
                                    </p>
                                    <p class="product__text"></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </div>
    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>

    </footer>
</body>
</html>