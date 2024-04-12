<?php

require_once(__DIR__ . '/../Connexion/connexionBDD.php');
require_once(__DIR__ . '/../Connexion/functions.php');

session_start();
$_SESSION = checkIfSessionHasPanier($_SESSION);
var_dump($_SESSION['panier']);
var_dump($_SESSION['panier']->getContenuPanier());

if ($_SESSION['panier']->getHasBeenOrdered()){
    $message = "Commande déjà passée !";
    // Ajouter un redirect vers la page Mon Profil
} else if (count($_SESSION['panier']->getContenuPanier()) ==0){
    $message = "Votre panier est vide !";
} else {
    /**
     * Il faut d'abord créer la commande dans la BDD, afin de récupérer l'id_commande qui nous servira pour la table de liaison
     * commande_produit
     */
    $date = new DateTime();
    $date_du_jour = $date->format('Y/m/d');
    $total_commande = $_SESSION['panier']->totalPanier();
    $hash = hash('sha256', json_encode($_SESSION['panier']));
    $sql = "INSERT INTO commandes (date_commande, total_commande, id_client, hash_code) VALUES (:date_jour, :total_commande, 0, :hash)" ;
    $stmt = $mysqlClient->prepare($sql);
    $stmt->bindParam(":date_jour", $date_du_jour, PDO::PARAM_STR) ;
    $stmt->bindParam(":total_commande", $total_commande) ;
    $stmt->bindParam(":hash", $hash, PDO::PARAM_STR) ;
    $commandeHasBeenCreated = $stmt->execute();
    unset($stmt);

    /**
     * Récupération de l'id_commande
     */
    $sql_id_commande = "SELECT id_commande FROM commandes WHERE hash_code = :hash;";
    $stmt = $mysqlClient->prepare($sql_id_commande);
    $stmt->bindParam(":hash",$hash,PDO::PARAM_STR);
    $stmt->execute();
    $id_commande = $stmt->fetch(PDO::FETCH_NUM)[0];
    unset($stmt);

    /**
     * Insert du contenu du panier dans la table d'association commande_produit
     */

     $all_inserts = "";
     $i = 1;
    foreach($_SESSION['panier']->getContenuPanier() as $key => $item) {
         $insert = "(";
         $insert .= $id_commande .",";
         $insert .= $item->getId() .",";
         $insert .= $item->getQuantite() .",";
         $insert .= $item->getPrix() .",";
         $insert .= $item->getTotalProduit();
         $insert .= "),";
         $i++;
         $all_inserts .= $insert;
     }
    $insert_param = substr($all_inserts,0,-1);

    $sql_detail_commande ="INSERT INTO commande_produit (id_commande, id_produit, quantite, prix, total_ligne) VALUES $insert_param ;";
    $stmt = $mysqlClient->prepare($sql_detail_commande);
    $panierContentHasBeenInserted = $stmt->execute();

    if ($commandeHasBeenCreated && $panierContentHasBeenInserted) {
        $message = "Votre commande a bien été enregistrée !";
        $_SESSION['panier']->validatePanier($id_commande);
        unset($_SESSION['panier']);
    }
    else $message = "Oups, votre commande n'a pas pu être enregistrée. Nous vous invitons à contacter notre Service Client";

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande terminée</title>
    <?php require_once(__DIR__ . '/importCSS.php'); ?>
    <link href="../css/styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/styles/geo.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php echo $message;?>
    <br/>
    <br/>
    <a href="index.php" class="btn btn-outline-info">Revenir à l'accueil</a>
</body>
</html>