<?php

class ShoppingDB
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "shopping";

    private $conn;

    // Constructor to establish database connection
    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->conn = new PDO($dsn, $this->user, $this->password);
            // Set PDO to throw exceptions on error
            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function connection()
    {
        return $this->conn;
    }

    // Function to read data from the products table
    public function readData()
    {
        $query = "SELECT * FROM products";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Function to read Categories from the products table
    public function readCategories()
    {
        $query = "SELECT * FROM categories";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to insert data into the products table
    public function insertData($name, $price)
    {
        $query = "INSERT INTO products (name, price) VALUES (:name, :price)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":price", $price);
        return $stmt->execute();
    }

    // Function to read data from the products table by ID
    public function readById($id)
    {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Function to close the database connection
    public function closeConnection()
    {
        $this->conn = null;
    }
}

// Example usage:
$shoppingDB = new ShoppingDB();

// Reading data
//$products = $shoppingDB->readData();
//print_r($products);

// Inserting data
//$shoppingDB->insertData('Product Name', 20.99);

// Reading data by ID
//$product = $shoppingDB->readById(1);
//print_r($product);

// Closing connection
//$shoppingDB->closeConnection();

?>
