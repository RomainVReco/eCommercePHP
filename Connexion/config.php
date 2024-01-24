<?php
define("DIR_IMG_PRODUIT", "/Applications/XAMPP/xamppfiles/htdocs/Lotra3/Ressources/assets_produits/"); 
define("DIR_IMG_CATEGORIE","/Applications/XAMPP/xamppfiles/htdocs/Lotra3/Ressources/assets_categories/");

const MYSQL_HOST = 'localhost';
const MYSQL_PORT = 3306;
const MYSQL_NAME = 'maquettisme';
const MYSQL_USER = 'root';
const MYSQL_PASSWORD = '';

class Produit {

    function __construct($nom, $id, $quantite, $prix, $illustration){
        $this->nom = $nom;
        $this->id = $id;
        $this->quantite = $quantite;
        $this->prix = $prix;
        $this->image = $illustration;
    }

    public String $nom;
    public int $id;
    public int $quantite;
    public float $prix;
    public String $image;

    public function getNom(): string {
        return $this->nom;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getQuantite(): int {
        return $this->quantite;
    }

    public function getPrix():float {
        return $this->prix;
    }

    public function getImage():string {
        return $this->image;
    }

    public function setQuantite($nombre) {
        $this->quantite = $nombre;
    }

    public function getTotalProduit() {
        return $this->quantite*$this->prix;
    }

    public function ajouterQuantite($adding) {  
        $this->quantite += $adding;
    }

}

class Panier {

    public int $nb;
    public $contenu_panier = [];
    function __construct() {
        $this->nb = 1 ;
    }


    public function totalPanier(): float {    
        $total = 0;
        foreach ($this->contenu_panier as $item) {
            $q =  $item->getQuantite();
            $prix = $item->getPrix();
            $total += $q*$prix;
        }
        return $total;
    }

    public function addItemtoPanier($item){
        $this->contenu_panier[] = $item;
    }

    public function getContenuPanier(): array {
        return $this->contenu_panier;
    }

}