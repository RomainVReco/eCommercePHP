<?php
require_once(__DIR__ . '/../../Connexion/connexionBDD.php');
require_once(__DIR__ . '/../../Connexion/functions.php');
require_once(__DIR__ . '/../../Connexion/config.php');
$js_path = __DIR__ .'/../../javascript/functions_js.js';

$hasBeenCrated = false;
$status_image = "";
$back_button = "Annuler";

if (isset($_POST["id"])) {
    if (isset($_FILES['ficphoto']) && ($_FILES["ficphoto"]["error"] == UPLOAD_ERR_OK)) {
        echo"FILES OK";
        $image_type = explode('/', $_FILES["ficphoto"]["type"])[1];
        var_dump($image_type);
        $uploaded_file_name = $_POST['image'] . "." . $image_type;
        var_dump($uploaded_file_name);
        $destination_path = DIR_IMG_PRODUIT . $uploaded_file_name;
        var_dump($destination_path);
        if (file_exists($destination_path)) {
            echo "Le fichier existe déjà";
            $status_image = "L'image existe déjà dans les assets";
        } else {
            (move_uploaded_file($_FILES["ficphoto"]['tmp_name'], $destination_path)) ;
            $status_image = "L'image a bien été enregistrée";
        }
    } 
    echo "requete sql update";
    $sql = "INSERT INTO `produits`(`id_produit`, `nom_produit`, `echelle`, `id_categorie`, `quantite`, `prix`, `id_marque`, `description`, `age_recommande`, `reference_image`) 
            VALUES  (:nom, :echelle, :categorie, :quantite, :prix, :marque, :description, :age_recommande, :reference_image);";
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
        $stmt->bindValue(':reference_image', $uploaded_file_name);
        $stmt->execute();
        $query_result[] = $_POST;
    
        $message = "Modification effectuée avec succès du produit : {$_POST['id']} - {$_POST['nom']} <br/>
        {$status_image}" ;
        $hasBeenModified = true ;
        $back_button = "Revenir";
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
            <h1>Créer une fiche produit</h1>
        </div>
        <?php if ($hasBeenModified) {
            echo "<div class=\"alert-info\">$message</div>";
        } ?>
        <div class="container-fluid">
                <form action="creer-produit.php" method="post" enctype="multipart/form-data">
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="nom" class="form-label">Nom :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="echelle" class="form-label">Echelle :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="echelle" name="echelle">
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
                            <input type="number" class="form-control" id="quantite" name="quantite"required>
                        </div>
                    </div>
                    <!-- zefsd -->
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="prix" class="form-label">Prix :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="prix" name="prix" required>
                        </div>
                    </div>     
                    <div class="row m-2">
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
                            <input type="textarea" class="form-control" id="description" name="description" required>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="age_recommande" class="form-label">Age :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="age_recommande" name="age_recommande" required>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                            <label for="image" class="form-label">Image :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="image" name="image" required>
                            <input type="file" name="ficphoto" id="photo" accept="image/jpg, image/jpeg, image/png" required>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            <a href="./produits_admin.php" class="btn btn-outline-info"><?=$back_button?></a>
                            <button type="submit" class="btn btn-info">Créer le produit</button>
                        </div>
                    </div>
                </form>
        </div>
        <!-- Bootstrap Bundle with Popper -->
        <script src="./js/bootstrap.bundle.min.js"></script>
        <script type="module" src="/Lotra3/javascript/functions_js.js"></script>
    </body>
</html>