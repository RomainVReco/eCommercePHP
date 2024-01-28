<?php  
  session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Quête de Rêve</title>
    <?php require_once(__DIR__ . '/importCSS.php'); ?>
    <link rel="stylesheet" type="text/css" href="../css/login.css"> 
</head>
<body>
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <div class=partie-haute>
        <br><br>
        <h2>Vous avez été déconnecté!!!</h2>
    </div>
    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer> 
</body>
</html>