<?php

class Tasks extends Dbh
{

    protected function createTask($projectId, $taskName, $taskDescription, $taskDev, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate)
    {

        $sql = "INSERT INTO Tasks (project_id, task_name, task_description, developer_id, task_priority, created_by, updated_by, task_due_date) VALUES (? , ?, ?, ?, ?, ?, ?, ?);";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$projectId, $taskName, $taskDescription, $taskDev, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate]);
        
    }

    protected function deleteTask($taskId) {
        $sql = "DELETE FROM Tasks WHERE task_id = ?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$taskId]); 
    }


    protected function getTasksForAdminOrTeamLead($projectId) : array {
        $sql = "SELECT task_id, task_name, developer_id , task_status, task_due_date, task_priority FROM Tasks WHERE project_id = ?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$projectId]);

        $row = $stmt->fetchAll();

        return $row;
    }


    protected function getTasksForDeveloper($devId, $projectId) : array {
        $sql = "SELECT task_id, task_name, developer_id , task_status, task_due_date, task_priority FROM Tasks WHERE project_id = ? AND developer_id = ?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$projectId , $devId]);

        return $stmt->fetchAll();
    }

    protected function getCurrentTaskIdModel() {
        $sql = "SELECT * FROM Tasks ORDER BY task_id DESC LIMIT 1;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        $row = $stmt->fetchAll();

        return $row[0]["task_id"];
    }
}
