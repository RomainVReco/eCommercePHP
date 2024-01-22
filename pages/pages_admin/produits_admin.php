<?php
session_start();

require_once(__DIR__ . '/../../Connexion/connexionBDD.php');

    $sql = "SELECT p.id_produit as id, p.nom_produit as nom, p.echelle, c.nom_categorie as categorie, p.quantite, p.prix, m.nom_marque as marque,
    p.description, p.age_recommande, p.reference_image
    FROM produits as p INNER JOIN categories as c ON p.id_categorie = c.id_categorie
    INNER JOIN marques as m ON p.id_marque = m.id_marque";
    $stmt = $mysqlClient->prepare($sql);
    $stmt->execute();
    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/Lotra3/css/styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/Lotra3/css/styles/geo.css" rel="stylesheet" type="text/css">
</head>
<body>
    <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" colspan="11">Produits référencés</th>
                        <a href="./index_admin.php" class="btn btn-outline-info">Revenir à l'accueil</a>
                        <a href="./creer-produit.php" class="btn btn-info">Ajouter produit</a>
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
                            <td>
                                <form action="./modifier-produit.php" method="get">
                                    <input type="hidden" name="id_produit" value="<?= $produit["id"] ?>">
                                    <button type="submit" class="btn btn-sm btn-info">Modifier</a>
                                </form>
                            </td>
                            <td>
                                <form action="./supprimer-produit.php" method="get">
                                    <input type="hidden" name="id_produit" value="<?= $produit["id"] ?>">
                                    <input type="hidden" name="nom" value="<?= $produit["nom"] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</a>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach?>
                </tbody>
    </table> 
</body>
</html>