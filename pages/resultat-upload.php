<?php

// Modification de produit 
define("DIR_IMG_PRODUIT", "/Applications/XAMPP/xamppfiles/htdocs/Lotra3/Ressources/assets_produits/");


if (isset($_FILES["ficphoto"]) && $_FILES["ficphoto"]["error"] == UPLOAD_ERR_OK) {
    $msg_tele = '<p>Téléversement réussi</p>';
    $imageType = explode('/', $_FILES["ficphoto"]["type"])[1];
    var_dump($imageType);
    $uploadedFileName = $_POST['fileName'] . "." . $imageType;
    var_dump($uploadedFileName);
    $destinationPath = DIR_IMG_PRODUIT . $uploadedFileName;
    var_dump($destinationPath);
    
    if (move_uploaded_file($_FILES["ficphoto"]['tmp_name'], $destinationPath)) {
        $msg_copier = '<p>Copie réussie</p>';
    } else {
        $msg_copier = '<p>Echec de la copie du fichier téléversé</p>';
    }
} else {
    $msg_tele = '<p>C\'est la cata !!!</p>';
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Résultat</title>
    </head>
    <body>
        <h1>Résultat</h1>
        <?php echo $msg_tele; ?>
        <?php echo $msg_copier; ?>
        <p><a href="index.php">Accueil</a></p>
        <hr />
        <p>Contenu de $_FILES</p>
        <pre><?php var_dump($_FILES); ?></pre>
        <p>Contenu de $_POST</p>
        <pre><?php var_dump($_POST); ?></pre>
    </body>
</html>