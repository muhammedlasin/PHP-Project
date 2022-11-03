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
}
