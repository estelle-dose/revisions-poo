<?php

require_once 'Category.php';

class Product
{
    private $id;
    private $name;
    private $photos;
    private $price;
    private $description;
    private $quantity;
    private $createdAt;
    private $updatedAt;
    private $category_id;

    // Constructeur avec des paramètres optionnels
    public function __construct(
        $id = null,
        $name = null,
        $photos = null,
        $price = null,
        $description = null,
        $quantity = null,
        $createdAt = null,
        $updatedAt = null,
        $category_id = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt ?: new DateTime(); // Utilisation de la date actuelle si null
        $this->updatedAt = $updatedAt ?: new DateTime(); // Utilisation de la date actuelle si null
        $this->category_id = $category_id;
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

    public function getPhotos()
    {
        return $this->photos;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getCategoryId()
    {
        return $this->category_id;
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

    public function setPhotos($photos)
    {
        $this->photos = $photos;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function getCategory()
    {
        // Vérifier si l'id de la catégorie est défini
        if ($this->category_id) {
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

            // Requête pour récupérer la catégorie associée au produit
            $sql = "SELECT * FROM category WHERE id = " . $this->category_id;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Récupérer les données sous forme de tableau associatif
                $row = $result->fetch_assoc();

                // Fermer la connexion à la base de données
                $conn->close();

                // Retourner un tableau associatif représentant la catégorie
                return [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'description' => $row['description'],
                    'createdAt' => new DateTime($row['createdAt']),
                    'updatedAt' => new DateTime($row['updatedAt']),
                ];
            }
        }

        return null; // Retourner null si l'id de la catégorie n'est pas défini
    }
}

?>