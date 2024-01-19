<?php
require_once(__DIR__ . "/connexionBDD.php");

selectorFromContent(getAllBrands($mysqlClient));

function getAllBrands($mysqlClient) {
    $sql = "SELECT id_marque, nom_marque FROM marques;";
    $stmt = $mysqlClient->prepare($sql);
    $stmt->execute();
    $brands = $stmt->fetchAll(PDO::FETCH_NUM);  
    var_dump($brands); 
    return $brands;
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
