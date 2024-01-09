<?php

// Inclure les classes Product et Category
require_once 'classe/Product.php';
require_once 'classe/Category.php';

// Instanciation de la classe Product avec tous les paramètres spécifiés
$product1 = new Product(1, 'T-shirt', ['https://picsum.photos/200/300'], 1000, 'A beautiful T-shirt', 10, new DateTime(), new DateTime());

// Affichage des propriétés du produit 1
echo "Product 1 :\n";
var_dump($product1);

// Instanciation de la classe Product sans spécifier aucun paramètre
$product2 = new Product();

// Affichage des propriétés du produit 2
echo "\nProduct 2 :\n";
var_dump($product2);

?>
