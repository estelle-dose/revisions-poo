<?php

// Inclure la classe Product
require_once 'job-01/Product.php';

// Instanciation de la classe Product
$product = new Product(1, 'T-shirt', ['https://picsum.photos/200/300'], 1000, 'A beautiful T-shirt', 10, new DateTime(), new DateTime());

// Affichage des propriétés avec var_dump
echo "Avant modification :\n";
var_dump($product);

// Utilisation des setters pour modifier certaines valeurs
$product->setName('New T-shirt');
$product->setPrice(1200);
$product->setQuantity(15);

// Affichage des propriétés après modification
echo "\nAprès modification :\n";
var_dump($product);
