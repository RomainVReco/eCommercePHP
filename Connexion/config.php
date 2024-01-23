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
        $this->illustration = $illustration;
    }

    public String $nom;
    public String $id;
    public int $quantite;
    public float $prix;
    public String $illustration;

    public function getNom(): string {
        return $this->nom;
    }

    public function getId(): String {
        return $this->id;
    }

    public function getQuantite(): int {
        return $this->quantite;
    }

    public function getPrix():float {
        return $this->prix;
    }

    public function getillustration():string {
        return $this->illustration;
    }

    public function setQuantite($nombre) {
        $this->quantite = $nombre;
    }

}

class Panier {
    public $contenu_panier = [];

    public function totalPanier(): float {    
        $total = 0;
        foreach ($this->contenu_panier as $item) {
            $total = $item->getQuantite()*$item->getPrix();
        }
        return $total;
    }

    public function addItemtoPanier($item){
        $this->contenu_panier[] = $item;
    }

}