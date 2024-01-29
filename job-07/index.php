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

// Utiliser la méthode findOneById pour trouver le produit avec l'id 3 (remplacez par l'id souhaité)
$productById3 = Product::findOneById(3);

if ($productById3 !== false) {
    // Afficher les propriétés du produit trouvé
    echo "Product with ID 3:\n";
    var_dump($productById3);
} else {
    echo "Product not found with ID 3\n";
}

// Utiliser la méthode findOneById pour trouver le produit avec un ID qui n'existe pas (par exemple, -1)
$productNotFound = Product::findOneById(8);

if ($productNotFound !== false) {
    // Afficher les propriétés du produit trouvé (ne devrait pas être atteint dans ce cas)
    echo "Product found with ID 8:\n";
    var_dump($productNotFound);
} else {
    echo "Product not found with ID 8\n";
}

// Fermer la connexion à la base de données
$conn->close();

?>
