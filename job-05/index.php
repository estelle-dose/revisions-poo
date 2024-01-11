<?php

// Inclure la classe Product
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

// Requête pour récupérer le produit avec l'id 7
$sql = "SELECT * FROM product WHERE id = 7";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Récupérer les données sous forme de tableau associatif
    $row = $result->fetch_assoc();

    // Créer une instance de la classe Product
    $product7 = new Product();
    $product7->setId($row['id']);
    $product7->setName($row['name']);
    $product7->setPhotos(json_decode($row['photos'], true));
    $product7->setPrice($row['price']);
    $product7->setDescription($row['description']);
    $product7->setQuantity($row['quantity']);
    $product7->setCreatedAt(new DateTime($row['createdAt']));
    $product7->setUpdatedAt(new DateTime($row['updatedAt']));
    $product7->setCategoryId($row['category_id']);

    // Utiliser la méthode getCategory pour récupérer l'instance de la catégorie associée
    $category7 = $product7->getCategory();

    // Afficher les propriétés de la catégorie associée
    echo "Category of Product with ID 7 :\n";
    var_dump($category7);
} else {
    echo "Aucun produit trouvé avec l'ID 7";
}

// Fermer la connexion à la base de données
$conn->close();

?>
