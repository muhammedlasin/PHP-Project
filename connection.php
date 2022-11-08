<?php
 
$conn = "";
 
try {
    $servername = "localhost";
    $dbname = "phpuser";
    $username = "root";
    $password = "Farseen123*";
 
    $conn = new PDO(
        "mysql:host=$servername; dbname=phpuser",
        $username, $password
    );
     
    $conn->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
     
} catch(PDOException $e) {
    echo "Connection failed: "
        . $e->getMessage();
}
 
?>