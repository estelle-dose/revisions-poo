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

// Utiliser la méthode findAll pour récupérer tous les produits
$allProducts = Product::findAll();

// Afficher les propriétés de tous les produits
echo "All Products:\n";
foreach ($allProducts as $product) {
    var_dump($product);
}

// Fermer la connexion à la base de données
$conn->close();

?>
