<?php

// class Dbh{
//     public function connect(){
//         try {
//             $username = "root";
//             $password = "Farseen123*";
//             $dbh = new PDO("mysql:host=localhost;dbname=phpuser",$username, $password);
//             return $dbh;
//         } catch (PDOException $e) {
//             print "Error!: " . $e->getMessage() . "<br/>";
//             die();
//         }
//     }
// }

class Dbh{

    private $host = "localhost";
    private $user = "root";
    private $pwd = "Farseen123*";
    private $dbName = "phpuser";

    public function connect(){
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
        $pdo = new PDO($dsn, $this->user,$this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;

}
        
    

}