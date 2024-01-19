<?php
require_once(__DIR__ . '/../Connexion/connexionBDD.php');

    $sql = "SELECT p.id_produit as id, p.nom_produit as nom, p.echelle, c.nom_categorie as categorie, p.quantite, p.prix, m.nom_marque as marque,
    p.description, p.age_recommande, p.reference_image
    FROM produits as p INNER JOIN categories as c ON p.id_categorie = c.id_categorie
    INNER JOIN marques as m ON p.id_marque = m.id_marque";
    $stmt = $mysqlClient->query($sql);
    $query_result = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php foreach ($query_result as $key => $value): ?>
                    <div class="product">
                        <div class="product__image">
                        <a class="product_main__link" quickfix="" href="/tamiya_fr/categories/maquettes-en-plastique/maquettes-de-voitures/maquettes-de-voitures-1-24/1-24-subaru-brz-td8-300024362-fr.html" title="1:24 Subaru BRZ (TD8)">
                            <img class="product__image-box" loading="lazy" src="/Lotra3/Ressources/assets_categories/maquette-char.jpg" title="1:24 Subaru BRZ (TD8)" alt="1:24 Subaru BRZ (TD8)">
                        </div>
                        <div class="product__content">
                            <p class="product__subtitle"><?=$value['nom_produit']?></p>
                            <h3 class="product__title"><?=$value['nom_produit']?></h3>
                            <small class="product__sku"><?=$value['id_produit']?></small>
                            <p class="product__price"><?=$value['prix']." €" ?></p>
                            <p class="product__text"></p> 
                        </div>
                        </a>
                    </div>
                <?php endforeach ?>
</body>
</html>
<?php 
// for ($i = 0; $i < count($query_result); $i++) {
//     $tab_result[] = $query_result[$i];
//     echo array_keys($query_result[$i]);
// }

foreach ($query_result as $key => $value){
    echo $key.PHP_EOL;
    for ($i = 0; $i < count($value); $i++) {
        echo $value[$i].PHP_EOL;
    }



}

// var_dump($tab_result).PHP_EOL;   
var_dump($query_result);


?>

