<?php

// Inclure les classes Product et Category
require_once 'classe/Product.php';
require_once 'classe/Category.php';

// Instanciation d'une catégorie
$category = new Category(1, 'Clothing', 'Category for clothing items', new DateTime(), new DateTime());

// Instanciation d'un produit avec une catégorie associée
$product = new Product(1, 'T-shirt', ['https://picsum.photos/200/300'], 1000, 'A beautiful T-shirt', 10, new DateTime(), new DateTime(), $category->getId());

// Affichage des propriétés de la catégorie
echo "Category :\n";
var_dump($category);

// Affichage des propriétés du produit avec la catégorie associée
echo "\nProduct :\n";
var_dump($product);

?>
