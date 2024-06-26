<?php

session_start();
unset($_SESSION["role"]);
$role = 0;
$_SESSION["role"] = $role;

if (isset($_SESSION["role"]) && $_SESSION["role"]!=0) {
    header("Location: index_admin.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Se connecter</title>
        <!-- Bootstrap 5.1 CSS -->
        <link href="../css/styles/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../css/styles/geo.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1>Se connecter</h1>
        </div>
        <div class="container-fluid">
            <form action="./index_admin.php" method="post">
                <div class="row m-2">
                    <div class="col-sm-2">
                        <label for="compte" class="form-label">Compte :</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="login" name="login" required>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-sm-2">
                        <label for="mdp" class="form-label">Mot de passe :</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="mdp" name="password" required>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
                        <a href="./index.php" class="btn btn-outline-info">Annuler</a>
                        <button type="submit" class="btn btn-info">Connexion</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Bootstrap Bundle with Popper -->
        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>