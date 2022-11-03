<?php
class Users extends Dbh{

       public function getUsers(){
        
        $sql = "SELECT * FROM Users;";
        
        $stmt = $this->connect()->query($sql);

        $row = $stmt-> fetchAll();

        return $row;
       } 


       public function getUserStmt($team_lead_id){
        
        $sql = "SELECT users_name FROM Users WHERE users_id=?";
        
        $stmt = $this->connect()->prepare($sql);
    
        $stmt->execute([$team_lead_id]);

        $name = $stmt -> fetch();

        return $name['users_name'];

       } 


}