<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Lotra3/css/styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/Lotra3/css/styles/geo.css" rel="stylesheet" type="text/css">
    <?php require_once(__DIR__ . '/importCSS.php'); ?>
    <title>Panier</title>
</head>
<body>
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" colspan="5">Votre panier</th>
                    </tr>
                    <tr class="table-info">
                        <th></th>
                        <th>Nom du produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
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

    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>