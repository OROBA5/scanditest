<?php

// abstract class for the products

abstract class Product {
    // declare primary product fields
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $product_type_id;

    //declares constructor for products
    public function __construct($id, $sku, $name, $price, $product_type_id)
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->product_type_id = $product_type_id;

    }

    //setters and getters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getProductTypeId()
    {
        return $this->product_type_id;
    }

    public function setProductTypeId($product_type_id)
    {
        $this->product_type_id = $product_type_id;
    }

    //utilises delete funcion for deleting a product
    public function delete()
    {
        $database = new Database('localhost', 'root', '', 'juniordev.liga.lomakina');
        $connection = $database->getConnection();

        // Delete from product table
        $query = "DELETE FROM product WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
    }

    //utilises display funcionality for a product
    public function display()
    {
        echo '<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">';
        echo '<strong>Product ID:</strong> ' . $this->getId() . '<br>';
        echo '<strong>SKU:</strong> ' . $this->getSku() . '<br>';
        echo '<strong>Product Name:</strong> ' . $this->getName() . '<br>';
        echo '<strong>Price:</strong> $' . $this->getPrice() . '<br>';
        echo '</div>';
    }

}