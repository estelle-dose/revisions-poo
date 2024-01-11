<?php

// Inclure la classe Product
require_once 'classe/Category.php';
require_once 'classe/Product.php';

// Connexion à la base de données (Assurez-vous d'ajuster les paramètres selon votre configuration)
$servername = "localhost";
$username = "root";
$password = "Etoile19*";
$dbname = "draft-shop";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Créer une instance de la classe Category (par exemple, avec l'id 2)
$category = new Category();
$category->setId(2); // Remplacez par l'id de la catégorie que vous souhaitez récupérer

// Utiliser la méthode getProducts pour récupérer tous les produits de la catégorie
$productsInCategory = $category->getProducts();

// Afficher les propriétés des produits
echo "Products in Category with ID " . $category->getId() . ":\n";
foreach ($productsInCategory as $product) {
    var_dump($product);
}

// Fermer la connexion à la base de données
$conn->close();

?>
