
<?php

class TasksContr extends Tasks {
    public function createNewTask($projectId, $taskName, $taskDescription, $taskDev, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate) {
        $this->createTask($projectId, $taskName, $taskDescription, $taskDev, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate);
    }

    public function updatePriority($priority, $task_id){

        $this->changePriority($priority, $task_id);
    }

    public function updateStatus($status, $task_id){

        $this->changeStatus($status, $task_id);
    }

    public function updateDescription($description, $task_id){
        $this->changeDescription($description, $task_id);
    }


    public function updateDeveloper($developer_id, $task_id){
        $this->changeDeveloper($developer_id, $task_id );
    }

    public function updateDate($due_date, $task_id){
        $this->changeDate($due_date, $task_id );
    }

    public function updateHeading($updatedHeading, $task_id){
        $this->changeHeading($updatedHeading, $task_id );
    }
}