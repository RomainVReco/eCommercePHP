<?php
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=maquettisme;port=3306;charset=utf8mb4', 'root', '');
    $stmt = $dbh->query('SELECT * FROM categories');
    $les_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    var_dump($les_categories).PHP_EOL;
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
    <title>Ma quête de rêve</title>
    <?php require_once(__DIR__ . '/importCSS.php'); ?>

</head>
<body>
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <div class="space"></div>
    <h2>PRINCIPAUX PRODUITS</h2>
    <?php echo "Nombre de catégories récupérées : ". count($les_categories) . PHP_EOL;
    ?>
    <div class="container-category">
        <div class="main-category">Je suis main</div>
        <div class="simple-category">je suis simple</div>
        <div class="simple-category">je suis simple</div>
        <div class="other-category">je suis main</div>
    </div>
    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
</body>
</html>
