<?php

require_once(__DIR__ . '/../Connexion/connexionBDD.php');
require_once(__DIR__ . '/../Connexion/functions.php');

session_start();
$_SESSION = checkIfSessionHasPanier($_SESSION);

if (isset($_POST['id_produit'])) {
    $produit = new Produit($_POST['nom'], intval($_POST['id_produit']), 
    $_POST['nombre'], $_POST['prix'], $_POST['image']);
    if (checkIfDuplicate($produit)) {
        echo "Doublon {$produit->getNom()}. Quantité ajouté au produit";
    } else $_SESSION['panier']->addItemtoPanier($produit);
}




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
                    <?php if (count($_SESSION['panier']->getContenuPanier()) != 0 ): ?>
                        <?php foreach ($_SESSION['panier']->getContenuPanier() as $item): ?>
                        <tr>
                            <td><?php echo "<img style=\"width:50px\" style=\"width:50px\" src=\"../Ressources/assets_produits/{$item->getImage()}\"
                title=\"{$item->getNom()}\" alt=\"{$item->getNom()}\"/>"; ?></td>
                            <td><?= $item->getNom() ?></td>
                            <td><?= $item->getQuantite() ?></td>
                            <td><?= $item->getPrix() ?> €</td>
                            <td><?= $item->getTotalProduit() ?> €</td>
                        </tr>
                    <?php endforeach?>
                    <?php else: ?>
                        <tr colspan="5">
                            <td></td>
                            <td></td>
                            <td>Votre panier est vide</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
    </table> 
    <div>Total de la commande : <?= $_SESSION['panier']->totalPanier() ?> €</div>
    <a href="./<?=$_SESSION["derniere_page_produit"]?>" class="btn btn-outline-info">Continuer mes achats</a>
    <button type="submit" class="btn btn-info">Passer au paiement</button>

    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>