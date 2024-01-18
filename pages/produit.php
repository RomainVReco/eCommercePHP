<?php
    //Récupération d'informations dans la base
    try {
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=maquettisme;port=3306;charset=utf8mb4', 'root', '');
        $stmt = $dbh->query('SELECT * FROM produits WHERE id_produit = "13"');
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Récupère la première ligne du résultat
        $dbh = null;
    } catch (Exception $e) {
        $message = $e->getMessage();
        echo ''. $message .'';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Quête de Rêve</title>
    <link rel="stylesheet" href="page_produit.css">
</head>
<body>
        <div class=container>
                <img itemprop="image" loading="lazy" src="https://cdn.simba-dickie-group.de/media_new/shop-tamiya/products/300024362/00/detail_desktop/1-24-subaru-brz-td8-300024362-fr_00.jpeg?v=1654855948" title="1:24 Subaru BRZ (TD8)" alt="1:24 Subaru BRZ (TD8)" />                        
                <div class=infos_generales>
                         
                <?php
                            echo "<h1>" . $row['nom_produit'] . "</h1>";
                            echo "<p>Référence article : " . $row['id_produit'] . "</p>";
                            echo "<p>Age recommandé : " . $row['age_recommande'] . " ans</p>";
                            echo "<p>Prix : " . $row['prix'] . " €</p>";
                ?>
                    <form>
                        <label for="nombre">Qté :</label>
                        <select id="nombre" name="nombre">
                            <?php
                            // Gérer l'ajout de 1 à 30 articles
                            for ($i = 1; $i <= 30; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                        <input type="submit" value="Ajouter au panier">
                    </form>

                </div>
            </div>
        </div>
        <h1>Informations produit</h1>
    <?php
            echo "<p>Nom article : " . $row['nom_produit'] . "</p>";
            echo "<p>Référence article : " . $row['id_produit'] . "</p>";
            echo "<p>Description : </p>";
            echo "<p>" . $row['description'] . "</p>";
    ?>
    
</body>
</html>