<!DOCTYPE html>
<html>
<head>
    <title>Liste des produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
    
    <?php
    try {
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=maquettisme;port=3306;charset=utf8mb4', 'root', '');
        $stmt = $dbh->query('SELECT * FROM produits');
        $les_produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($les_produits) {
            // Afficher la liste des produits
            
            foreach ($les_produits as $produit) {
                echo "<ul>";
                echo "<li>" . $produit['nom_produit'] . "</li>";
                echo "<li>" . $produit['id_produit'] . "</li>";
                echo "<li>" . $produit['prix'] . "</li>";
                echo "</ul>";
            }
            
        } else {
            echo "Aucun produit trouvé dans la base de données.";
        }
        
        $dbh = null;
    } catch (Exception $e) {
        $message = $e->getMessage();
        echo ''. $message .'';
    }
    ?>
    
</body>
</html>