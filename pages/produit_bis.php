<html>
<head>
    <title>Afficher un champ spécifique depuis une requête SQL</title>
</head>
<body>
    <h1>Contenu d'un champ spécifique</h1>
    
    <?php
    try {
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=maquettisme;port=3306;charset=utf8mb4', 'root', '');
        $stmt = $dbh->query('SELECT * FROM produits WHERE id_produit = "13"');
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Récupère la première ligne du résultat
        
        if ($row) {
            // Afficher le contenu du champ spécifique (par exemple, le champ 'nom')
            echo "<p>Contenu du champ 'nom_produit : " . $row['nom_produit'] . "</p>";
            echo "<p>Contenu du champ 'id_produit : " . $row['id_produit'] . "</p>";
            echo "<p>Contenu du champ 'prix : " . $row['prix'] . "</p>";
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