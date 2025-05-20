<?php
$products = array(
    "truelle" => [
        "id" => 1,
        "nom" => "Truelle",
        "prix" => 9.99,
        "discount" => 10,
        "imageURL" => "images/truelle.jpg",
        "description" => "Truelle robuste avec lame fine pour les décapages délicats. Manche antidérapant, idéale pour les fouilles de précision."
    ],
    "pinceau" => [
        "id" => 2,
        "nom" => "Pinceau",
        "prix" => 4.50,
        "discount" => 10,
        "imageURL" => "images/pinceau.jpg",
        "description" => "Pinceau à poils souples parfait pour nettoyer les fragments fragiles et les céramiques anciennes sans les abîmer."
    ],
    "tamis" => [
        "id" => 3,
        "nom" => "Tamis",
        "prix" => 15.00,
        "discount" => 10,
        "imageURL" => "images/tamis.jpg",
        "description" => "Tamis en acier avec deux tailles de mailles pour trier les sédiments et repérer les petits objets en contexte archéologique."
    ],
    "carnet" => [
        "id" => 4,
        "nom" => "Carnet de terrain",
        "prix" => 3.50,
        "discount" => 10,
        "imageURL" => "images/carnet.jpg",
        "description" => "Carnet résistant à l’eau avec quadrillage pour croquis. Papier indéchirable, 60 pages, indispensable sur les chantiers."
    ],
    "pelle" => [
        "id" => 5,
        "nom" => "Pelle",
        "prix" => 20.00,
        "discount" => 10,
        "imageURL" => "images/pelle.jpg",
        "description" => "Pelle légère en aluminium, parfaite pour les fouilles. Manche ergonomique et tête en acier inoxydable résistante."
    ],
    "pince" => [
        "id" => 6,
        "nom" => "Pince",
        "prix" => 12.00,
        "discount" => 10,
        "imageURL" => "images/pince.jpg",
        "description" => "Pince de précision pour manipuler les objets délicats. Poignée antidérapante et tête fine pour un contrôle optimal."
    ],
    "gants" => [
        "id" => 7,
        "nom" => "Gants de protection",
        "prix" => 5.00,
        "discount" => 10,
        "imageURL" => "images/gants.jpg",
        "description" => "Gants en latex pour protéger vos mains lors des fouilles. Résistants à l’eau et aux produits chimiques, confortables et flexibles."
    ],
    "masque" => [
        "id" => 8,
        "nom" => "Masque de protection",
        "prix" => 7.50,
        "discount" => 10,
        "imageURL" => "images/masque.jpg",
        "description" => "Masque de protection respiratoire pour les fouilles en milieu poussiéreux. Filtration efficace, ajustable et confortable."
    ],
    "casque" => [
        "id" => 9,
        "nom" => "Casque de sécurité",
        "prix" => 25.00,
        "discount" => 10,
        "imageURL" => "images/casque.jpg",
        "description" => "Casque de sécurité léger et confortable, conforme aux normes de sécurité. Idéal pour les chantiers archéologiques."
    ],
);
ksort($products, SORT_NATURAL);
?>