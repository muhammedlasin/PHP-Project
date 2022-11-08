<?php

class Tasks extends Dbh
{
    //add task_due_date later 

    protected function createTask($projectId, $taskName, $taskDescription, $taskDev, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate)
    {

        $sql = "INSERT INTO Tasks (project_id, task_name, task_description, developer_id, task_priority, created_by, updated_by, task_due_date) VALUES (? , ?, ?, ?, ?, ?, ?, ?);";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$projectId, $taskName, $taskDescription, $taskDev, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate]);
    }


    protected function getTasksForAdminOrTeamLead($projectId) : array {
        $sql = "SELECT task_name, task_dev, task_status, task_due_date, task_priority FROM Tasks WHERE project_id = ?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$projectId]);

        return $stmt->fetchAll();
    }


    protected function getTasksForDeveloper($devId, $projectId) : array {
        $sql = "SELECT task_name, task_dev, task_status, task_due_date, task_priority FROM Tasks WHERE project_id = ? AND developer_id = ?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$projectId , $devId]);

        return $stmt->fetchAll();
    }

    protected function viewTaskStmt($task_id){

        
        $sql = "SELECT * FROM Tasks WHERE task_id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$task_id]);

        $results = $stmt -> fetchAll();

        return $results;

    
    }


    protected function getTaskId($project_id){
        
        $sql = "SELECT task_id FROM Tasks WHERE project_id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$project_id]);

        $results = $stmt -> fetchAll();

        return $results;

    }

    protected function changePriority($priority, $task_id){
        
        $sql = "UPDATE Tasks
        SET task_priority=?
        WHERE task_id =?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$priority, $task_id]);

    }

    protected function changeStatus($status, $task_id){
        
        $sql = "UPDATE Tasks
        SET task_status=?
        WHERE task_id =?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$status, $task_id]);

    }

    protected function changeDescription($description, $task_id){
        
        $sql = "UPDATE Tasks
        SET task_description=?
        WHERE task_id =?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$description, $task_id]);

    }

    protected function changeDeveloper($developer_id, $task_id ){

        $sql = "UPDATE Tasks
        SET developer_id = ?
        WHERE task_id = ?";

        $stmt = $this->connect()->prepare($sql);
        
        $stmt->execute([$developer_id, $task_id]);
   }

   protected function changeDate($due_date, $task_id ){

    $sql = "UPDATE Tasks
    SET task_due_date = ?
    WHERE task_id = ?";

    $stmt = $this->connect()->prepare($sql);
    
    $stmt->execute([$due_date, $task_id]);
}


protected function changeHeading($updatedHeading, $task_id){
        
    $sql = "UPDATE Tasks
    SET task_name=?
    WHERE task_id =?";

    $stmt = $this->connect()->prepare($sql);

    $stmt->execute([$updatedHeading, $task_id]);

}


}