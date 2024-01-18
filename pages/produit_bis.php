<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Quête de Rêve</title>
    <link rel="stylesheet" href="page_produit.css">
</head>
<body>
    <h1>Informations sur l'article</h1>
        <div class=container>
                <img itemprop="image" loading="lazy" src="https://cdn.simba-dickie-group.de/media_new/shop-tamiya/products/300024362/00/detail_desktop/1-24-subaru-brz-td8-300024362-fr_00.jpeg?v=1654855948" title="1:24 Subaru BRZ (TD8)" alt="1:24 Subaru BRZ (TD8)" />                        
                <?php
                try {
                    $dbh = new PDO('mysql:host=127.0.0.1;dbname=maquettisme;port=3306;charset=utf8mb4', 'root', '');
                    $stmt = $dbh->query('SELECT * FROM produits WHERE id_produit = "13"');
                    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Récupère la première ligne du résultat
                    
                    if ($row) {
                        // Afficher le contenu du champ spécifique (par exemple, le champ 'nom')
                        echo "<p>Nom article : " . $row['nom_produit'] . "</p>";
                        echo "<p>Référence article : " . $row['id_produit'] . "</p>";
                        echo "<p>Prix : " . $row['prix'] . "</p>";
                    } else {
                        echo "Aucun résultat trouvé pour cet ID de produit.";
                    }
                    
                    $dbh = null;
                } catch (Exception $e) {
                    $message = $e->getMessage();
                    echo ''. $message .'';
                }
                ?>
                <img itemprop="image" loading="lazy" src="https://cdn.simba-dickie-group.de/media_new/shop-tamiya/products/300024362/00/detail_desktop/1-24-subaru-brz-td8-300024362-fr_00.jpeg?v=1654855948" title="1:24 Subaru BRZ (TD8)" alt="1:24 Subaru BRZ (TD8)" />                        
                <img itemprop="image" loading="lazy" src="https://cdn.simba-dickie-group.de/media_new/shop-tamiya/products/300024362/00/detail_desktop/1-24-subaru-brz-td8-300024362-fr_00.jpeg?v=1654855948" title="1:24 Subaru BRZ (TD8)" alt="1:24 Subaru BRZ (TD8)" />                                    
                <img itemprop="image" loading="lazy" src="https://cdn.simba-dickie-group.de/media_new/shop-tamiya/products/300024362/00/detail_desktop/1-24-subaru-brz-td8-300024362-fr_00.jpeg?v=1654855948" title="1:24 Subaru BRZ (TD8)" alt="1:24 Subaru BRZ (TD8)" />                        
            </div>
        </div>
    
    <?php
    try {
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=maquettisme;port=3306;charset=utf8mb4', 'root', '');
        $stmt = $dbh->query('SELECT * FROM produits WHERE id_produit = "13"');
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Récupère la première ligne du résultat
        
        if ($row) {
            // Afficher le contenu du champ spécifique (par exemple, le champ 'nom')
            echo "<p>Nom article : " . $row['nom_produit'] . "</p>";
            echo "<p>Référence article : " . $row['id_produit'] . "</p>";
            echo "<p>Prix : " . $row['prix'] . "</p>";
        } else {
            echo "Aucun résultat trouvé pour cet ID de produit.";
        }
        
        $dbh = null;
    } catch (Exception $e) {
        $message = $e->getMessage();
        echo ''. $message .'';
    }
    ?>
    
</body>
</html>