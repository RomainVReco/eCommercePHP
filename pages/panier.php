<?php

require_once(__DIR__ . '/../Connexion/connexionBDD.php');
require_once(__DIR__ . '/../Connexion/functions.php');

session_start();
checkIfSessionHasPanier($_SESSION);
if (isset($_SESSION['panier']) && (count($_SESSION['panier']->getContenuPanier()) != 0)) {
    $contenu_panier = $_SESSION['panier']->getContenuPanier();
    } else $contenu_panier =[];



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
                    <?php if (count($contenu_panier) != 0): ?>
                        <?php foreach ($contenu_panier as $item): ?>
                        <tr>
                            <td><?php echo "<img style=\"width=100px\" src=\"../Ressources/assets_produits/{$item->getImage()}\"
                title=\"{$item->getNom()}\" alt=\"{$item->getNom()}\"/>"; ?></td>
                            <td><?= $item->getNom() ?></td>
                            <td><?= $item->getQuantite() ?></td>
                            <td><?= $item->getPrix() ?></td>
                            <td><?= $item->getTotalProduit() ?></td>
                        </tr>
                    <?php endforeach?>
                    <?php else: ?>
                        <tr colspan="5"><td>Votre panier est vide</td></tr>
                    <?php endif; ?>
                </tbody>
    </table> 

    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>