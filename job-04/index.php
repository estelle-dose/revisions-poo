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

    // Créer un tableau associatif avec les données du produit
    $productData = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'photos' => json_decode($row['photos'], true),
        'price' => $row['price'],
        'description' => $row['description'],
        'quantity' => $row['quantity'],
        'createdAt' => new DateTime($row['createdAt']),
        'updatedAt' => new DateTime($row['updatedAt']),
        'category_id' => $row['category_id']
    );

    // Afficher le tableau associatif du produit avec l'id 7 sous forme de tableau HTML
    echo "Product with ID 7 (Associative Array) :\n";
    echo "<pre>";
    print_r($productData);
    echo "</pre>";
} else {
    echo "Aucun produit trouvé avec l'ID 7";
}

// Fermer la connexion à la base de données
$conn->close();

?>
