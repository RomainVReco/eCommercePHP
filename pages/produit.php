<?php
    $_GET["reference_article"] = "21";
    if (isset($_GET["reference_article"])) {
        $ref_article = intval($_GET["reference_article"]);
    } else {
        echo "Probleme de recuperation de la variable reference_article!";
    }    
    //Récupération d'informations dans la base
    try {
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=maquettisme;port=3306;charset=utf8mb4', 'root', '');
        $stmt = $dbh->prepare('SELECT * FROM produits WHERE id_produit = :ref_article');
        $stmt->bindParam(':ref_article', $ref_article, PDO::PARAM_INT);
        $stmt->execute();
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
    <?php require_once(__DIR__ . '/importCSS.php'); ?>
    <link href="../css/page_produit.css" rel="stylesheet"> 
</head>
<body>
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
        <div class=container>
            <div class="boite-image">
                        <img class="boite-image" src="../<?php echo $row['reference_image']; ?>" title="1:24 Subaru BRZ (TD8)" alt="1:24 Subaru BRZ (TD8)" />
            </div>
                <div class=infos_generales>
                    <?php
                                echo "<h1>" . $row['nom_produit'] . "</h1>";
                                echo "<p>Référence article : " . $row['id_produit'] . "</p>";
                                echo "<p>Age recommandé : " . $row['age_recommande'] . " ans</p>";
                                echo "<p>Prix : €" . $row['prix'] . " </p>";
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