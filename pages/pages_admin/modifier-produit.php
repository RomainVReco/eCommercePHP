<?php
require_once(__DIR__ . '/../../Connexion/connexionBDD.php');
require_once(__DIR__ . '/../../Connexion/functions.php');

$_GET["id_produit"] = 11;
$hasBeenModified = false;

if (isset($_POST["id"])) {
        $sql = "UPDATE produits SET nom_produit = :nom, echelle = :echelle, id_categorie= :categorie, 
            quantite = :quantite, prix = :prix, id_marque = :marque, description = :description,
            age_recommande = :age_recommande, reference_image = :reference_image
            WHERE id_produit = :id ;";
        $stmt = $mysqlClient->prepare($sql);
        $stmt->bindValue(':id', $_POST["id"]);
        $stmt->bindValue(':nom', $_POST['nom']);
        $stmt->bindValue(':echelle', $_POST['echelle']);
        $stmt->bindValue(':categorie', $_POST['categorie']);
        $stmt->bindValue(':quantite', $_POST['quantite']);
        $stmt->bindValue(':prix', $_POST['prix']);
        $stmt->bindValue(':marque', $_POST['marque']);
        $stmt->bindValue(':description', $_POST['description']);
        $stmt->bindValue(':age_recommande', $_POST['age_recommande']);
        $stmt->bindValue(':reference_image', $_POST['image']);
        $stmt->execute();
        $query_result[] = $_POST;
    
        $message = "Modification effectuée avec succès du produit : {$_POST['id']} - {$_POST['nom']} " ;
        $hasBeenModified = true ;
        $back_button = "Revenir";
} else {
    $id = $_GET["id_produit"];
    $sql = "SELECT p.id_produit as id, p.nom_produit as nom, p.echelle, c.nom_categorie as categorie, p.quantite, p.prix, m.nom_marque as marque,
    p.description, p.age_recommande, p.reference_image as image
    FROM produits as p INNER JOIN categories as c ON p.id_categorie = c.id_categorie
    INNER JOIN marques as m ON p.id_marque = m.id_marque
    WHERE p.id_produit = :id";
    $stmt = $mysqlClient->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $back_button = "Annuler";
}

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
        <?php if ($hasBeenModified) {
            echo "<div class=\"alert-info\">$message</div>";
        } ?>
        <div class="container-fluid">
                <form action="modifier-produit.php" method="post">
                    <?php foreach ($query_result as $value): ?>
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label class="form-label">id :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id" value="<?= $value['id'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="nom" class="form-label">Nom :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nom" name="nom" value="<?= $value["nom"] ?>">
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="echelle" class="form-label">Echelle :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="echelle" name="echelle" value="<?= $value["echelle"] ?>">
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="categorie" class="form-label">Catégorie :</label>
                        </div>
                        <div class="col-sm-10">
                            <select name="categorie" id="categorie" class="form-control">
                                <?php 
                                    $categories = getAllCategories($mysqlClient);
                                    echo selectorFromContent($categories, $value["categorie"]);
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="quantite" class="form-label">Quantite :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="quantite" name="quantite" value="<?= $value["quantite"] ?>" required>
                        </div>
                    </div>
                    <!-- zefsd -->
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="prix" class="form-label">Prix :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="prix" name="prix" value="<?= $value["prix"] ?>" required>
                        </div>
                    </div>                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="Marque" class="form-label">Marque :</label>
                        </div>
                        <div class="col-sm-10">
                            <select name="marque" id="Marque" class="form-control">
                                <?php 
                                    $brands = getAllBrands($mysqlClient);
                                    echo selectorFromContent($brands, $value["marque"]);
                                ?>  
                            </select>
                        </div>
                    </div>                  
                    
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="description" class="form-label">Description :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="textarea" class="form-control" id="description" name="description" value="<?= $value["description"] ?>" required>
                        </div>
                    </div>                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="age_recommande" class="form-label">Age :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="age_recommande" name="age_recommande" value="<?= $value["age_recommande"] ?>" required>
                        </div>
                    </div>                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="image" class="form-label">Image :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="image" name="image" value="<?= $value["image"] ?>" required>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="row m-2">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            <a href="./index_admin.php" class="btn btn-outline-info"><?=$back_button?></a>
                            <button type="submit" class="btn btn-info">Modifier</button>
                        </div>
                    </div>
                </form>
        </div>
        <!-- Bootstrap Bundle with Popper -->
        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>