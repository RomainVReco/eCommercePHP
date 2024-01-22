<?php 
require_once(__DIR__ . '/../../Connexion/connexionBDD.php');

session_start();
$role = 0;

if (isset($_POST['login'])){
    $username = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT role FROM admin WHERE login_employe = :login AND mot_de_passe = :password";
    $stmt = $mysqlClient->prepare($sql);
    $stmt->bindValue(":login", $username);
    $stmt->bindValue(":password", $password);
    $stmt->execute();
    $role = $stmt->fetch(PDO::FETCH_NUM );
    var_dump($role[0]);
    $_SESSION['role'] = $role[0];
}

if (isset($_SESSION["role"]) && ($_SESSION["role"] == 0 )) {
    header("Location: ./connecter_admin.php");
    exit;
} else {
    $div_admin_access = getEmployeeCategoryAccess($mysqlClient, $_SESSION["role"]);
}


?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin</title>
        <!-- Bootstrap 5.1 CSS -->
        <link href="/Lotra3/css/styles/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/Lotra3/css/styles/geo.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="container-fluid">
        <div>
            <h1>Admin Ma Quête de Rêve</h1>
        </div>
            <div class="admin-grid">
                <?= $div_admin_access ?>
            </div>
        </div>
        <!-- Bootstrap Bundle with Popper -->
        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>