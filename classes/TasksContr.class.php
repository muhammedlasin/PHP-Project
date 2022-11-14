<?php

class TasksContr extends Tasks
{
    public function createNewTask($projectId, $taskName, $taskDescription, $taskDev, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate)
    {

        if ($this->emptyInput($taskName, $taskDescription) === true) {
            header("location: ../create-task.php?error=emptyinput&projid=$projectId");
            exit;
        }
        $this->createTask($projectId, $taskName, $taskDescription, $taskDev, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate);

    }


    public function deleteATask($taskId)
    {
        //attachments have to be deleted before deleting the task
        $attachmentsContrObj = new AttachmentsContr();
        $attachmentsContrObj->deleteAttachments($taskId);
        $commentContrObj = new CommentsContr();
        $commentContrObj->deleteCommentInTasks($taskId);
        $this->deleteTask($taskId);
    }

    public function getCurrentTaskId()
    {
        return $this->getCurrentTaskIdModel();
    }

    public function updatePriority($priority, $task_id)
    {

        $this->changePriority($priority, $task_id);
    }

    public function updateTaskUpdatedBy($taskId, $updatingUser)
    {
        $this->updateTaskUpdatedByModel($taskId, $updatingUser);
    }

    public function updateStatus($status, $task_id)
    {
       
        $this->changeStatus($status, $task_id);

        
    }

    public function updateDescription($description, $task_id)
    {
        $this->changeDescription($description, $task_id);

    }


    public function updateDeveloper($developer_id, $task_id)
    {
        $this->changeDeveloper($developer_id, $task_id);
    }

    public function updateDate($due_date, $task_id)
    {
        $this->changeDate($due_date, $task_id);
    }

    public function updateHeading($updatedHeading, $task_id)
    {
        $this->changeHeading($updatedHeading, $task_id);

    }




    public function emptyInput($taskName, $taskDescription)
    {

        if (empty($taskName) || empty($taskDescription)) {
            return true;
        }
        return false;
    }



}