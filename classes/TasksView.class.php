<?php

class TasksView extends Tasks {
    
    public function viewAllTasks($currentUserRole, $currentUserId, $projectId) {

        if($currentUserRole === 'developer') {
            $this->getTasksForDeveloper($currentUserId, $projectId);
        }

        else {
            $this->getTasksForAdminOrTeamLead($projectId);
        }
    }

    public function viewTaskDetail($task_id){

        $taskdetail = $this->viewTaskStmt($task_id);
        
        return $taskdetail;
    }

    public function getTaskIdByProject($project_id){

        $taskId = $this->getTaskId($project_id);
        
        return $taskId;
    }

    
}