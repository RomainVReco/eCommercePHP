<?php
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=maquettisme;port=3306;charset=utf8mb4', 'root', '');
    //$stmt = $dbh->query('SELECT * FROM categories');
    $stmt = $dbh->query('SELECT * FROM produits WHERE id_produit = "13"');
    $les_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    var_dump($les_categories).PHP_EOL;
} catch (Exception $e) {
    $message = $e->getMessage();
    echo ''. $message .'';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
</head>
<body>
            <div class="products__row">
                        <div class="row">
                            <div data-aos="fade-up" class="col-6 col-md-4 col-lg-6 col-xl-4" data-page="1">
                                <div class="product">
                                    <div class="product__image">
                                        <!--<img loading="lazy" src="https://cdn.simba-dickie-group.de/media_new/shop-tamiya/products/300078007/00/overview_2020/1-350-us-cvn-65-enterprise-300078007-fr_00.jpeg?v=1585312601" title="1:350 US CVN-65 Enterprise" alt="1:350 US CVN-65 Enterprise" />
                                        -->                                    
                                    </div>
                                    <div class="product__content">
                                        <p class="product__subtitle">
                                            Maquettes de bateaux 1/350</p>
                                        <h3 class="product__title">1:350 US CVN-65 Enterprise</h3>
                                        <small class="product__sku">300078007</small>
                                            <p class="product__price">&euro;175.00</p>
                                            <p class="product__text">Enterprise Warning! Not suitable for children under 14 years.</p>
                                    </div>
                                                                        <a class="product_main__link" quickfix="" href="/tamiya_fr/categories/maquettes-en-plastique/maquettes-de-bateaux/maquettes-de-bateaux-1-350/1-350-us-cvn-65-enterprise-300078007-fr.html" title="1:350 US CVN-65 Enterprise"></a>
                                </div>
                            </div>
                        </div>
            </div>
                
</body>
</html>