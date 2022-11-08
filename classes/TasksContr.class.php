<?php

class TasksContr extends Tasks {
    public function createNewTask($projectId, $taskName, $taskDescription, $taskDev, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate) {
        $this->createTask($projectId, $taskName, $taskDescription, $taskDev, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate);
    }

    public function deleteATask($taskId) {
        $this->deleteTask($taskId);
    }

    public function getCurrentTaskId() {
        return $this->getCurrentTaskIdModel();
    }
}