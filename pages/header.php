<?php

//Si session transmet l'information d'un id_client alors une connexion est en cours
if ((isset($_SESSION["id_client"])) && ($_SESSION["id_client"] > 0)){
    $isLogged=true;
} else  { 
    $isLogged=false;
}

?>
<head>
  <!-- Autres balises meta, liens CSS, etc. -->
  <title>Mon Super Site Web</title>
</head>
<div class="container-entete">
      <div class="upper-zone">
        <div class="upper-zone-content">
          <div class="zone-1-upper">
            <a href="/nouscontacter.html">Nous contacter</a>
            <a href="/a_propos.html">A propos</a>
          </div>
          <div class="zone-1-lower">
            <button id="button-open" class="style-button-open">
              <img src="/Lotra3/Ressources/ressources_entete/bx-menu.svg" alt="menu">
            </button>
            <a href="/index.html#nouveautes" class="link-zone-1-lower">Nouveautés</a>
            <a href="/index.html#best_sellers" class="link-zone-1-lower">Best-seller</a>
          </div>
          <div class="zone-2">
            <div class="zone-2-upper">
              <div class="bloc-image-entete">
                <a href="/index.html">
                  <img src="" alt="" class="img-logo">
                </a>
              </div>
            </div>
            <div class="zone-2-lower">
              <form action="resultat-recherche.php" method="get" class="champ-recherche">
                <button type="submit"><i class='bx bx-search'></i></button>
                <input type="text" name="recherche" class="barre-recherche" placeholder="Rechercher un produit">
              </form>
            </div>
          </div>
          <div class="zone-3-upper">
            <a href="#">Politique de retour</a>
            <a href="#">TVA réduite</a>
          </div>
          <div class="zone-3-lower">
            <div class="img-entete">
              <a href="#"><img src="/Lotra3/Ressources/ressources_entete/bxs-flag-alt.svg" alt="langue"></a>
            </div>
            <div class="img-entete">
              <a href="login.php"><img src="/Lotra3/Ressources/ressources_entete/bx-user-circle.svg" alt="langue"></a>
              <p><?php if ($isLogged == true) : echo "Connecté"; ?></p>
              <a href="logout.php">Se déconnecter</a>
              <?php else : ?>
                <a href="login.php">Se connecter</a>
              <?php endif; ?>
            </div>
            <div class="img-entete">
              <a href="panier.php"><img src="/Lotra3/Ressources/ressources_entete/bx-cart.svg" alt="langue"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom-zone">
        <nav class="menu-nav">
          <ol class="list-nav">
            <a class="categorie_nav" href="index.php">
              <li>Tous nos produits</li>
            </a>
            <a class="categorie_nav" href="">
              <li>Maquettes militaires</li>
            </a>
            <a class="categorie_nav" href="">
              <li>Maquettes motos</li>
            </a>
            <a class="categorie_nav" href="">
              <li>Maquettes voitures</li>
            </a>
            <a class="categorie_nav" href="">
              <li>Peintures</li>
            </a>
            <a class="categorie_nav" href="">
              <li>Accessoires</li>
            </a>
          </ol>
        </nav>
      </div>
    </div>