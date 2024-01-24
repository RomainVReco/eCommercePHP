<?php

session_start();

try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=maquettisme;port=3306;charset=utf8mb4', 'root', '');
    $stmt = $dbh->query('SELECT * FROM categories');
    $les_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $nb = count($les_categories);
    $dbh = null;
} catch (Exception $e) {
    $message = $e->getMessage();
    echo ''. $message .'';
}

$tab_classe = ["main-category", "simple-1-category", "simple-2-category", "other-category"]
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma quête de rêve</title>
    <?php require_once(__DIR__ . '/importCSS.php'); ?>
</head>
<body>
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <div class="space"></div>
    <h2>PRINCIPAUX PRODUITS</h2>
    <div class="container-category">
        <?php for ($i = 0; $i < 4; $i++) : ?>
        <div class=<?=$tab_classe[$i]?>>
            <a href="#">
                <div class="titre-category">
                    <?php echo $les_categories[$i]['nom_categorie']?>
                </div>
                <div class="category-image">
                    <img src="../<?=$les_categories[$i]['image_categorie']?>"alt="">
                </div>
            </a>
        </div>
        <?php endfor; ?>
    </div>
    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>