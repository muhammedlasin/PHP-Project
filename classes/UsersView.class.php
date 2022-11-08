<?php

class UsersView extends Users{
    public function displayUser(){
        $result = $this->getUsers();
        return $result;
    }
    public function filterUsers($roles){
    
        $results = $this->filterusersStmt($roles);
        return $results;
        
    }
}