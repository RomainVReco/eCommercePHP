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
    <title>Ma Quête de Rêve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require_once(__DIR__ . '/importCSS.php'); ?>
</head>
<body>
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <div class="space"></div>
    <!--<h2>PRINCIPAUX PRODUITS</h2> -->
    <div class="container text-center">
      <div class="row row-cols-2">
        <div class="col">
          <h3 class="modern-sans-serif">Voitures</h3>
          <img src="../Ressources/assets_categories/maquette-voiture.jpg" alt="Image 1">
        </div>
        <div class="col">
          <h3 class="modern-sans-serif">Motos</h3>
          <img src="../Ressources/assets_categories/maquette-moto.jpg" alt="Image 2">
        </div>
        <div class="col">
          <h3 class="modern-sans-serif">Militaire</h3>
          <img src="../Ressources/assets_categories/maquette-char.jpg" alt="Image 3">
        </div>
        <div class="col">
          <h3 class="modern-sans-serif">Peinture</h3>
          <img src="../Ressources/assets_categories/pinceaux.jpg" alt="Image 4">
        </div>
      </div>
    </div>
    <div class="container-category">
        <!--
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
        -->
    </div>
    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>