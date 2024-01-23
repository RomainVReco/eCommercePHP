<?php
require_once(__DIR__ . "/connexionBDD.php");

function getAllBrands($mysqlClient) {
    $sql = "SELECT id_marque, nom_marque FROM marques;";
    $stmt = $mysqlClient->prepare($sql);
    $stmt->execute();
    $brands = $stmt->fetchAll(PDO::FETCH_NUM);  
    return $brands;
}

function getAllCategories($mysqlClient) {
    $sql = "SELECT id_categorie, nom_categorie FROM categories;";
    $stmt = $mysqlClient->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_NUM);  
    return $categories;
}

/*
La fonction permet, à partir d'un résultat de requete SQL $content, de récupérer les deux premiers éléments de chaque tableau pour créer
des balises <options> à placer dans une balise <selector>, soit l'id et et le nom.

Return : une chaine de caractères contenant les balises options créées
*/
function selectorFromContent($content, $selected) {
    $html_selector="";
    foreach ($content as $value) {
        if ($value[1] == $selected) {
            $html_selector .= "<option value=\"$value[0]\" selected>$value[1]</option>";
        } else $html_selector .= "<option value=\"$value[0]\">$value[1]</option>";
    }
    return $html_selector;
}

function getEmployeeCategoryAccess($mysqlClient, $role) {
    $sql = "SELECT l_c_a.page_php as page, l_c_a.nom_cat_admin as nom
            FROM roles as r INNER JOIN role_cat_admin as r_c_a ON r.id_role = r_c_a.id_role
            INNER JOIN liste_cat_admin as l_c_a ON l_c_a.id_cat_admin = r_c_a.id_cat_admin
            WHERE r.id_role = :id";
    $stmt = $mysqlClient->prepare($sql);
    $stmt->bindValue(":id", $role, PDO::PARAM_INT);
    $stmt->execute();
    $admin_access = $stmt->fetchAll(PDO::FETCH_NUM);

    $div_admin_access="";

    foreach ($admin_access as $nom_categorie) {
            $div_admin_access .= "<a href=\"./$nom_categorie[0]\" class=\"btn btn-info\">$nom_categorie[1]</a>";
    }
    return $div_admin_access;
}

function defineEmployeeActions($session, $produit){
    $modify_button = "<td>
    <form action=\"./modifier_produit.php\" method=\"get\">
        <input type=\"hidden\" name=\"id_produit\" value=\"".$produit["id"]."\">
        <button type=\"submit\" class=\"btn btn-sm btn-info\">Modifier</a>
    </form>
</td>";

    $delete_button = "<td>
    <form action=\"./supprimer_produit.php\" method=\"get\">
        <input type=\"hidden\" name=\"id_produit\" value=\"".$produit["id"]."\">
        <input type=\"hidden\" name=\"nom\" value=\"".$produit["nom"]."\">
        <button type=\"submit\" class=\"btn btn-sm btn-danger\">Supprimer</a>
    </form>
</td>";
    if ($session['role']==1) return $modify_button . $delete_button;
    else if ($session['role']==2) return $modify_button;
    else return "<td></td><td></td>";
}

function checkRoleAdmin($session){
    echo 'checkRoleAdmin' . PHP_EOL;

    if (!isset($session['role']) || (isset($session["role"]) && ($session["role"] == 0 ))) {
        echo 'Renvoie vers la page connexion_admin.php' . PHP_EOL ;
        header("Location: connexion_admin.php");
        exit;
    }
}
