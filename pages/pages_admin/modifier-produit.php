<?php
require_once(__DIR__ . '/../../Connexion/connexionBDD.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Modifier un pays</title>
        <!-- Bootstrap 5.1 CSS -->
        <link href="/Lotra3/css/styles/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/Lotra3/css/styles/geo.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1>Modifier un produit</h1>
        </div>
        <div class="container-fluid">
                <form action="" method="post">
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label class="form-label">Code :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="hidden" name="code" value="<?= $code ?>">
                            <?= $code ?>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="nom" class="form-label">Nom :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nom" name="nom" value="<?= $un_pays["nom"] ?>" required>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="capitale" class="form-label">Capitale :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="capitale" name="capitale" value="<?= $un_pays["capitale"] ?>" required>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="popu" class="form-label">Population :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="popu" name="popu" value="<?= $un_pays["population"] ?>" required>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="super" class="form-label">Superficie :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="super" name="super" value="<?= $un_pays["superficie"] ?>" required>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            <a href="./index.php" class="btn btn-outline-info">Annuler</a>
                            <button type="submit" class="btn btn-info">Modifier</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
        <!-- Bootstrap Bundle with Popper -->
        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>