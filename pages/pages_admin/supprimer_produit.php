<?php
session_start();

require_once(__DIR__ . '/../../Connexion/connexionBDD.php');
require_once(__DIR__ . '/../../Connexion/functions.php');

checkRoleAdmin($_SESSION);

$message = 'Message ';
if (isset($_GET["id_produit"])) {
    $id = $_GET["id_produit"];
    $sql = "DELETE FROM produits WHERE produits.id_produit = :id ;";
    $stmt = $mysqlClient->prepare($sql);
    $stmt->bindValue(":id", $id);
    $hasBeenDeleted = $stmt->execute();

    if ($hasBeenDeleted) $message = "Le produit {$_GET["id_produit"]} - {$_GET["nom"]} a été supprimé";
    else $message = "Echec suppression du produit {$_GET["id_produit"]} - {$_GET["nom"]}";
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Supprimer un produit</title>
        <!-- Bootstrap 5.1 CSS -->
        <link href="../css/styles/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../css/styles/geo.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1>Suppression d'un produit</h1>
        </div>
        <div class="container-fluid">
            <?= $message; ?>
            <p><a href="./index_admin.php" class="btn btn-outline-info">Accueil admin</a></p>
        </div>
        <!-- Bootstrap Bundle with Popper -->
        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>