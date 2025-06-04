<?php
// Données des produits
$products = [
    1 => [
        "id" => 1,
        "nom" => "Truelle",
        "prix" => 999,
        "discount" => 10,
        "stock" => 50,
        "actif" => true,
        "imageURL" => "images/truelle.jpg",
        "description" => "Truelle robuste avec lame fine pour les décapages délicats. Manche antidérapant, idéale pour les fouilles de précision."
    ],
    2 => [
        "id" => 2,
        "nom" => "Pinceau",
        "prix" => 450,
        "discount" => 0,
        "stock" => 100,
        "actif" => true,
        "imageURL" => "images/pinceau.jpg",
        "description" => "Pinceau à poils souples parfait pour nettoyer les fragments fragiles et les céramiques anciennes sans les abîmer."
    ],
    3 => [
        "id" => 3,
        "nom" => "Tamis",
        "prix" => 1500,
        "discount" => 10,
        "stock" => 30,
        "actif" => true,
        "imageURL" => "images/tamis.jpg",
        "description" => "Tamis en acier avec deux tailles de mailles pour trier les sédiments et repérer les petits objets en contexte archéologique."
    ],
    4 => [
        "id" => 4,
        "nom" => "Carnet de terrain",
        "prix" => 350,
        "discount" => 0,
        "stock" => 200,
        "actif" => true,
        "imageURL" => "images/carnet.jpg",
        "description" => "Carnet résistant à l’eau avec quadrillage pour croquis. Papier indéchirable, 60 pages, indispensable sur les chantiers."
    ],
    5 => [
        "id" => 5,
        "nom" => "Pelle",
        "prix" => 2000,
        "discount" => 20,
        "stock" => 25,
        "actif" => true,
        "imageURL" => "images/pelle.jpg",
        "description" => "Pelle légère en aluminium, parfaite pour les fouilles. Manche ergonomique et tête en acier inoxydable résistante."
    ],
    6 => [
        "id" => 6,
        "nom" => "Pince",
        "prix" => 1200,
        "discount" => 10,
        "stock" => 40,
        "actif" => true,
        "imageURL" => "images/pince.jpg",
        "description" => "Pince de précision pour manipuler les objets délicats. Poignée antidérapante et tête fine pour un contrôle optimal."
    ],
    7 => [
        "id" => 7,
        "nom" => "Gants de protection",
        "prix" => 500,
        "discount" => 10,
        "stock" => 100,
        "actif" => true,
        "imageURL" => "images/gants.jpg",
        "description" => "Gants en latex pour protéger vos mains lors des fouilles. Résistants à l’eau et aux produits chimiques, confortables et flexibles."
    ],
    8 => [
        "id" => 8,
        "nom" => "Masque de protection",
        "prix" => 750,
        "discount" => 10,
        "stock" => 80,
        "actif" => true,
        "imageURL" => "images/masque.jpg",
        "description" => "Masque de protection respiratoire pour les fouilles en milieu poussiéreux. Filtration efficace, ajustable et confortable."
    ],
    9 => [
        "id" => 9,
        "nom" => "Casque de sécurité",
        "prix" => 2500,
        "discount" => 20,
        "stock" => 60,
        "actif" => true,
        "imageURL" => "images/casque.jpg",
        "description" => "Casque de sécurité léger et confortable, conforme aux normes de sécurité. Idéal pour les chantiers archéologiques."
    ],
];
// Tri des produits par ordre alphabétique
ksort($products, SORT_NATURAL);

/*
function validateProduct($product_id, $products) {
    $result = new ValidationResult();

    // Vérifier si le produit existe
    if (!isset($products[$product_id])) {
        $result->addError("Le produit n'existe pas.");
        return $result;
    }
    
    $product = $products[$product_id];
    
    // Vérifier si le produit est actif
    if (!$product['actif']) {
        $result->addError("Le produit n'est plus disponible.");
        return $result;
    }
    
    // Vérifier si le stock est suffisant
    if ($product['stock'] <= 0) {
        $result->addError("Le produit est en rupture de stock.");
        return $result;
    }
    
    // Stock faible (warning)
    if ($product['stock'] < 5) {
        $result->addWarning("Stock faible : seulement {$product['stock']} restant(s).");
    }
    return $result;
}*/
?>