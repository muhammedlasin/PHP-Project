<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
class Users extends Dbh{

    protected function getUsers(){
        
            $sql = "SELECT * FROM Users;";
            
            $stmt = $this->connect()->query($sql);
    
            $row = $stmt-> fetchAll();
    
            return $row;
           } 
           


    protected function setdeleteStmt($id){
        $sql = "DELETE FROM Users WHERE users_id= ?";
        $stmt = $this->connect()->prepare($sql);
        
        // $stmt->execute([':id'=>$id]);
        $stmt->execute([$id]);
        header("Location: ../Users.php?status=deleted");
    }
    

    // protected function filteruserStmt($role){

    //     $sql = "SELECT * FROM Users WHERE users_role=?";
    //     $stmt = $this->connect()->prepare($sql);
        
    //     // $stmt->execute([':id'=>$id]);
    //     $stmt->execute([$role]);
    // }
    protected function filterusersStmt($roles){
        
        $sql = "SELECT users_id,users_name,email,users_role FROM Users WHERE users_role=?";
        // $stmt = $this->connect()->prepare($sql);
        
        // // $stmt->execute([':id'=>$id]);
        // $stmt->execute([$roles]);
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$roles]);
        // echo $roles; 
            $row = $stmt-> fetchAll();
    
            return $row;
        // header("Location: ../Users.php?status=filtered");
       } 

       protected function getEmailFromUserIdModel($userId) {
        $sql = "SELECT email FROM Users WHERE users_id = ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$userId]);

        $name = $stmt->fetch();

        return $name['email'];
    }
    
}