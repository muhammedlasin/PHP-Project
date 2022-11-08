<?php


class Users extends Dbh
{
    

  

 



    protected function getCurrentUserIdModel() {

    }

    protected function getUserIdFromNameModel($userName) {
        //given the user's name, we have to return the id
        $sql = "SELECT users_id FROM Users WHERE users_name = ?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$userName]);

        $name = $stmt->fetch();

        return $name['users_id'];

    }

    protected function getEmailFromUserIdModel($userId) {
        $sql = "SELECT email FROM Users WHERE users_id = ?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$userId]);

        $name = $stmt->fetch();

        return $name['email'];
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

