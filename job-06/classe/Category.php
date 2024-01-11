<?php

class Category
{
    private $id;
    private $name;
    private $description;
    private $createdAt;
    private $updatedAt;

     // Constructeur avec des valeurs par défaut
     public function __construct(
        $id = null,
        $name = '',
        $description = '',
        $createdAt = null,
        $updatedAt = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt ?: new DateTime();
        $this->updatedAt = $updatedAt ?: new DateTime();
    }

    // Getters pour accéder aux propriétés privées
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    // Setters pour modifier les valeurs des propriétés
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function getProducts()
    {
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

        // Requête pour récupérer tous les produits de la catégorie
        $sql = "SELECT * FROM product WHERE category_id = " . $this->id;
        $result = $conn->query($sql);

        $products = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Créer une instance de la classe Product
                $product = new Product();
                $product->setId($row['id']);
                $product->setName($row['name']);
                $product->setPhotos(json_decode($row['photos'], true));
                $product->setPrice($row['price']);
                $product->setDescription($row['description']);
                $product->setQuantity($row['quantity']);
                $product->setCreatedAt(new DateTime($row['createdAt']));
                $product->setUpdatedAt(new DateTime($row['updatedAt']));
                $product->setCategoryId($row['category_id']);

                // Ajouter le produit au tableau
                $products[] = $product;
            }
        }

        // Fermer la connexion à la base de données
        $conn->close();

        // Retourner le tableau d'instances de la classe Product
        return $products;
    }
}

?>
