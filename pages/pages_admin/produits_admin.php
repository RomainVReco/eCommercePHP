<?php
session_start();

require_once(__DIR__ . '/../../Connexion/connexionBDD.php');
require_once(__DIR__ . '/../../Connexion/functions.php');

checkRoleAdmin($_SESSION);

    $sql = "SELECT p.id_produit as id, p.nom_produit as nom, p.echelle, c.nom_categorie as categorie, p.quantite, p.prix, m.nom_marque as marque,
    p.description, p.age_recommande, p.reference_image
    FROM produits as p INNER JOIN categories as c ON p.id_categorie = c.id_categorie
    INNER JOIN marques as m ON p.id_marque = m.id_marque";
    $stmt = $mysqlClient->prepare($sql);
    $stmt->execute();
    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/styles/geo.css" rel="stylesheet" type="text/css">
</head>
<body>
    <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" colspan="11">Produits référencés</th>
                        <a href="./index_admin.php" class="btn btn-outline-info">Revenir à l'accueil</a>
                        <?php if ($_SESSION['role'] != 3) :?>
                        <a href="./creer_produit.php" class="btn btn-info">Ajouter produit</a>
                        <?php endif; ?>
                    </tr>
                    <tr class="table-info">
                        <th>id</th>
                        <th>nom du produit</th>
                        <th>échelle</th>
                        <th>nom catégorie</th>
                        <th>quantité en stock</th>
                        <th>prix</th>
                        <th>marque</th>
                        <th>description</th>
                        <th>age recommandé</th>
                        <th>image</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query_result as $produit): ?>
                        <tr>
                            <td><?= $produit["id"] ?></td>
                            <td><?= $produit["nom"] ?></td>
                            <td><?php if (is_null($produit["echelle"])) echo "-";
                            else echo $produit["echelle"] ?> 
                            </td>
                            <td><?= $produit["categorie"] ?></td>
                            <td><?= $produit["quantite"] ?></td>
                            <td><?= $produit["prix"]." €" ?></td>
                            <td><?= $produit["marque"] ?></td>
                            <td><?= $produit["description"] ?></td>
                            <td><?= $produit["age_recommande"] ?></td>
                            <td><?= $produit["reference_image"] ?></td>
                            <?php echo defineEmployeeActions($_SESSION, $produit); ?>
                        </tr>
                    <?php endforeach?>
                </tbody>
    </table> 
</body>
</html>