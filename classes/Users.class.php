<?php
class Users extends Dbh{

       protected function createUser()
       {
       }
   
       protected function getUsers($userRole)
       {
           //to get a list of all users by user role
       }
   
       protected function getAllUsers()
       {
   
           $sql = "SELECT * FROM Users;";
   
           $stmt = $this->connect()->query($sql);
   
           $row = $stmt->fetchAll();
   
           return $row;
       }
   
   
       protected function getUserStmt($userId)
       {
   
           $sql = "SELECT users_name FROM Users WHERE users_id=?";
   
           $stmt = $this->connect()->prepare($sql);
   
           $stmt->execute([$userId]);
   
           $name = $stmt->fetch();
   
           return $name['users_name'];
       }

       protected function getUsersByRole($users_role)
       {
   
           $sql = "SELECT * FROM Users WHERE users_role=?";
   
           $stmt = $this->connect()->prepare($sql);
   
           $stmt->execute([$users_role]);
   
           $names = $stmt->fetchAll();
   
           return $names;
       }



}