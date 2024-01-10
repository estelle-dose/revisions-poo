<?php

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
}

?>