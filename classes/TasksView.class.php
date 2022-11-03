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
}